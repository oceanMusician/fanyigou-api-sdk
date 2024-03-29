<?php
/**
 * OCR(图像识别)
 * ocrUploadImage.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$filePath = __DIR__.'/file/WechatIMG263.png'; //文档路径

$params = [
    'from' => 'en',
];

try {
    $result = $dispatch->ocrUploadImage($params, $filePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
