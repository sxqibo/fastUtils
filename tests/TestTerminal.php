<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2022 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author:  apple  Date:2023/9/26 Time:21:38
// +----------------------------------------------------------------------

use PHPUnit\Framework\TestCase;
use Sxqibo\FastUtils\Terminal;

class TestTerminal extends TestCase
{

    public function testOne()
    {
        $result = Terminal::getCommand('migrate.run');
        print_r($result);
        $this->assertIsArray($result);
    }
}
