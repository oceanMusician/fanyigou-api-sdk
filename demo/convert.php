<?php
/**
 * 文档转换
 * convert.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$filePath = __DIR__.'/file/1746-5354-8-1-53.pdf'; //文档路径

$params = [
    'from' => 'en', // 扫描件需设置语言
    'conversionFormat' => -1 // 文档转换类型
];

try {
    $result = $dispatch->convert($params, $filePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
