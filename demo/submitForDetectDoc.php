<?php
/**
 * 检测页数文件提交翻译
 * submitForDetectDoc.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$params = [
    'from' => 'en',
    'to' => 'zh',
    'tid' => '45436258', // 检测文档页数接口返回的tid
];

try {
    $result = $dispatch->submitForDetectDoc($params);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
