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
    'from' => '文件的源语言',
    'to' => '文件的目标语言',
    'tid' => '检测文档页数接口返回的tid', // 检测文档页数接口返回的tid
    'industryId' => '行业代码',
    'transImg' => '文档内图片翻译', // 0：不翻译文档内图片（默认），1：翻译文档内图片。目前支持中、英、日、韩的文档内图片翻译。（如有需要请联系销售开通）
    'bilingualControl' => '指定翻译模式' // 0：译文单独为一个文档（默认），1：双语对照（原文和译文在一个文档）
];

try {
    $result = $dispatch->submitForDetectDoc($params);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
