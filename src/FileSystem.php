<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2030 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author: yanghongwei  Date:2023/9/27 Time:18:09
// +----------------------------------------------------------------------

namespace Sxqibo\FastUtils;

/**
 * 访问和操作文件系统
 */
class FileSystem
{
    /**
     * 递归删除目录
     */
    public static function delDir(string $dir, bool $delSelf = true): bool
    {
        // 检查目录是否存在
        if (!is_dir($dir)) {
            return false;
        }

        // 迭代目录中的文件和子目录
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        // 遍历$files中的每个文件和子目录
        foreach ($files as $fileInfo) {
            if ($fileInfo->isDir()) {
                // 删除该目录及其内容
                self::delDir($fileInfo->getRealPath());
            } else {
                // 如果不是目录，就使用@unlink函数来删除文件
                @unlink($fileInfo->getRealPath());
            }
        }

        if ($delSelf) {
            @rmdir($dir);
        }

        return true;
    }

    /**
     * 是否是空目录
     */
    public static function dirIsEmpty(string $dir): bool
    {
        if (!file_exists($dir)) return true;
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                closedir($handle);
                return false;
            }
        }
        closedir($handle);
        return true;
    }
}
