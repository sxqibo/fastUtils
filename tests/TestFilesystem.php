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

    /**
     * 示例 1：删除目录及其内容
     * @return void
     */
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

    /**
     * 示例 2：只删除目录中的内容，保留目录本身
     * @return void
     */
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

    /**
     * 测试 dirIsEmpty 方法
     */
    public function testDirIsEmpty()
    {
        // 创建一个临时测试目录
        $testDir = __DIR__ . '/test_dir';
        mkdir($testDir);

        // 测试空目录
        $this->assertTrue(Filesystem::dirIsEmpty($testDir));

        // 在目录中创建一个文件
        $filePath = $testDir . '/test_file.txt';
        file_put_contents($filePath, 'Hello, World!');

        // 测试非空目录
        $this->assertFalse(Filesystem::dirIsEmpty($testDir));

        // 删除测试文件
        unlink($filePath);

        // 再次测试空目录
        $this->assertTrue(Filesystem::dirIsEmpty($testDir));

        // 删除临时测试目录
        rmdir($testDir);
    }

    /**
     * 测试 fsFit 方法
     */
    public function testFsFit()
    {
        // 测试在Windows下的路径
        $windowsPath = 'C:\\Users\\Username\\Documents\\file.txt';
        $this->assertEquals($windowsPath, Filesystem::fsFit($windowsPath));

        // 测试在Unix/Linux下的路径
        $unixPath = '/home/username/documents/file.txt';
        $this->assertEquals($unixPath, Filesystem::fsFit($unixPath));

        // 测试混合斜杠和反斜杠的路径
        $mixedPath = 'C:/Users\\Username/Documents/file.txt';
        $this->assertEquals($windowsPath, Filesystem::fsFit($mixedPath));
    }

}
