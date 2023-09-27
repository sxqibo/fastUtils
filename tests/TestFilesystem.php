<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2030 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author: yanghongwei  Date:2023/9/27 Time:18:21
// +----------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Sxqibo\FastUtils\FileSystem;

class TestFilesystem  extends TestCase
{

    public function testOne()
    {
        // test目录
        $directoryToDelete = dirname(__FILE__).'/../public/runtime/test';

        // 调用 delDir 方法，将 $delSelf 参数设为 true，表示删除目录本身
        if (FileSystem::delDir($directoryToDelete, true)) {
            echo "目录删除成功！";
        } else {
            echo "无法删除目录。";
        }
    }

    public function testTwo()
    {
        // test目录
        $directoryToDelete = dirname(__FILE__).'/../public/runtime/test';

        // 调用 delDir 方法，将 $delSelf 参数设为 true，表示删除目录本身
        if (FileSystem::delDir($directoryToDelete, false)) {
            echo "目录删除成功！";
        } else {
            echo "无法删除目录。";
        }
    }
}