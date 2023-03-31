<?php

use Fanyigou\ApiSdkPhp\Dispatch;
use PHPUnit\Framework\TestCase;

/**
 * TestOrder.php
 * Create on 2023/3/24 18:37
 * Create by lihailiang@fanyigou.com
 */

class TestTrans extends TestCase
{
    public function testText()
    {
        $appKey = '';
        $appSec  = '';
        $params   = [
            'from' => 'jp',
            'to'   => 'zh',
            'text' => 'こんにちは'
        ];

        $dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $appSec]);
        $result = $dispatch->text($params);
        $this->assertEquals(0, $result['code']);
    }

    public function testQueryTransProgress()
    {
        $appKey = '';
        $appSec  = '';
        $params = [
            'tid' => '45436258',
        ];

        $dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $appSec]);
        $result = $dispatch->queryTransProgress($params);
        $this->assertEquals(100, $result['code']);
    }

}