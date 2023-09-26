<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2030 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author: yanghongwei  Date:2023/9/26 Time:15:16
// +----------------------------------------------------------------------

namespace Sxqibo\FastUtils;

class Terminal
{
    /**
     * 获取命令
     * @param string $key
     * @return bool|array
     */
    public static function getCommand(string $key): bool|array
    {
        if (!$key) {
            return false;
        }

        $commands = [
            // 数据库迁移命令
            'migrate'      => [
                'run'        => 'php think migrate:run',
                'rollback'   => 'php think migrate:rollback',
                'breakpoint' => 'php think migrate:breakpoint',
            ],
            // 安装包管理器的命令
            'install'      => [
                'cnpm' => 'npm install cnpm -g --registry=https://registry.npmmirror.com',
                'yarn' => 'npm install -g yarn',
                'pnpm' => 'npm install -g pnpm',
                'ni'   => 'npm install -g @antfu/ni',
            ],
            // 查看版本的命令
            'version'      => [
                'npm'  => 'npm -v',
                'cnpm' => 'cnpm -v',
                'yarn' => 'yarn -v',
                'pnpm' => 'pnpm -v',
                'node' => 'node -v',
            ],
        ];

        if (stripos($key, '.')) {
            $key = explode('.', $key);
            if (!array_key_exists($key[0], $commands) || !is_array($commands[$key[0]]) || !array_key_exists($key[1], $commands[$key[0]])) {
                return false;
            }
            $command = $commands[$key[0]][$key[1]];
        } else {
            if (!array_key_exists($key, $commands)) {
                return false;
            }
            $command = $commands[$key];
        }
        if (!is_array($command)) {
            $command = [
                'cwd'     => root_path(),
                'command' => $command,
            ];
        } else {
            $command = [
                'cwd'     => root_path() . $command['cwd'],
                'command' => $command['command'],
            ];
        }
        $command['cwd'] = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $command['cwd']);
        return $command;
    }
}
