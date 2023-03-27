<?php
/**
 * 上传文件检测页数
 * detectDocPage.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '1523160518334';
$secKey = '64954f4c830b53db30f24cdff6c0e0833d1e7ebe';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$filePath = __DIR__.'/file/1746-5354-8-1-53.pdf'; //文档路径

try {
    $result = $dispatch->detectDocPage($filePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
