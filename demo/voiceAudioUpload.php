<?php
/**
 * 音频文件上传接口
 * voiceAudioUpload.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$voicePath = __DIR__.'/file/test.wav'; //文档路径

$params = [
    'from' => 'en',
    'to' => 'zh',
];

try {
    $result = $dispatch->voiceAudioUpload($params, $voicePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
