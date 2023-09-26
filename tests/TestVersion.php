<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2030 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author: yanghongwei  Date:2023/9/25 Time:17:14
// +----------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Sxqibo\FastUtils\Version;

class TestVersion extends TestCase
{
    // 比较两个相等的版本号
    public function testOne()
    {
        $requiredVersion = "1.2.3";
        $currentVersion = "1.2.3";

        $result = Version::compare($requiredVersion, $currentVersion);

        // 预期：当前版本满足要求
        $this->assertTrue($result);
    }


    // 比较带有前导 "v" 的版本号
    public function testTwo()
    {
        $requiredVersion = "v2.0.0";
        $currentVersion = "2.0.0";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本满足要求
        $this->assertTrue($result);
    }


    // 比较版本号中的部分版本
    public function testThree()
    {
        $requiredVersion = "1.2";
        $currentVersion = "1.2.3";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本满足要求
        $this->assertTrue($result);
    }

    // 比较包含连字符的版本号
    public function testFour()
    {
        $requiredVersion = "2.0.0-beta";
        $currentVersion = "2.0.0";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本满足要求
        $this->assertTrue($result);
    }

    // 比较带有通配符的版本号
    public function testFive()
    {
        $requiredVersion = "*";
        $currentVersion = "1.2.3";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本满足要求
        $this->assertTrue($result);

    }

    // 比较版本号的不满足情况
    public function testSix()
    {
        $requiredVersion = "2.0.0";
        $currentVersion = "1.0.0";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本不满足要求
        $this->assertFalse($result);
    }

    // 比较版本号中不同部分的情况
    public function testSeven()
    {
        $requiredVersion = "1.2.3";
        $currentVersion = "1.2.4";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本不满足要求
        $this->assertTrue($result);
    }

    // 比较版本号部分个数不同的情况
    public function testEight()
    {
        $requiredVersion = "1.2.3";
        $currentVersion = "1.2";

        $result = Version::compare($requiredVersion, $currentVersion);
        // 预期：当前版本不满足要求
        $this->assertFalse($result);
    }
}
