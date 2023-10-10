<?php
// +----------------------------------------------------------------------
// | NewThink [ Think More,Think Better! ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2030 http://www.sxqibo.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权所有：山西岐伯信息科技有限公司
// +----------------------------------------------------------------------
// | Author: yanghongwei  Date:2023/10/10 Time:09:38
// +----------------------------------------------------------------------

namespace Sxqibo\FastUtils;

use think\Exception as E;
class Exception extends E
{
    public function __construct(protected $message, protected $code = 0, protected $data = [])
    {
        parent::__construct($message, $code);
    }
}