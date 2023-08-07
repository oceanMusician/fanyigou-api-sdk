<?php
/**
 * 音频翻译任务查询接口
 * voiceAudioQueryProgress.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$params   = [
    'recordId' => '12',
];

try {
    $result = $dispatch->voiceAudioQueryProgress($params);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
