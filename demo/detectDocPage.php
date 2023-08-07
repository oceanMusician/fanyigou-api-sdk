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

$appKey = '';
$secKey = '';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$filePath = __DIR__.'/file/1746-5354-8-1-53.pdf'; //文档路径

$params = array(
    'excelMode' => 0, //  0：只翻译当前打开sheet（默认），1：翻译全部sheet（页数按全部sheet字符数来计算）
);

try {
    $result = $dispatch->detectDocPage($params, $filePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
