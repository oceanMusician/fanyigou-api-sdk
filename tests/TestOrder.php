<?php

use Fanyigou\ApiSdkPhp\Dispatch;
use PHPUnit\Framework\TestCase;

/**
 * TestOrder.php
 * Create on 2023/3/24 18:37
 * Create by lihailiang@fanyigou.com
 */

class TestOrder extends TestCase
{
    protected string $appKey = '1635842463135';

    protected string $appSec = '88dc8357768cd6f733fcbfb1b73398cfd1340cf5';

    public function testText()
    {
        $params   = [
            'from' => 'jp',
            'to'   => 'zh',
            'text' => 'こんにちは'
        ];

        $dispatch = new Dispatch([$this->appKey, $this->appSec]);
        $result = $dispatch->text($params);
        print_r($result);
    }
}