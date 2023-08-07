<?php
/**
 * 连接webscoket进行语音识别翻译
1.语音识别获取链接标识接口与当前的websocket传入的appid必须一致
2.connectionId的只有二十分钟有效期
3.connenctionId连接成功并发送音频数据后不能再使用当前connectionId进行二次连接
 * getTransAudioLink.php
 * Create on 2023/3/24 17:51
 * Create by lihailiang@fanyigou.com
 */
include_once __DIR__.'/../vendor/autoload.php';

use Fanyigou\ApiSdkPhp\WebSocket;

$appKey = '';
$secKey = '';

$connectionId = '';
$filePath = __DIR__.'/file/test.wav'; //文档路径

// 初始化websocket连接
$socket = new WebSocket($appKey, $secKey);
$client = $socket->connection($connectionId);

// 模拟发送流式数据
send_data($client, $filePath, 6400);

function send_data($client, $path, $step)
{
    if (!file_exists($path)) {
        echo "file not exist";
        return;
    }
    $file = fopen($path, "r");
    // 发送消息的时间
    $pre_timestamp = return_mills_timestamp();
    while (!feof($file)) {
        $cur_timestamp = return_mills_timestamp();
        // 流式数据传输间隔推荐每6400bytes间隔200ms
        if ($cur_timestamp - $pre_timestamp < 200) {
            continue;
        }
        $pre_timestamp = $cur_timestamp;
        $buffer = fread($file, $step);
        send_binary_message($client, $buffer);
    }
    send_binary_message($client, "{\"end\": \"true\"}");
}

// 获取毫秒级时间戳
function return_mills_timestamp(): float
{
    $micrometer = microtime(true);
    return round($micrometer * 1000);
}

//function send_text_message($client, $message)
//{
//    $client->text($message);
//    echo 'send text message: ' . $message . "\n";
//}

function send_binary_message($client, $message)
{
    $binary = pack("H*", bin2hex($message));
    $client->binary($binary);
    echo 'send binary message length: ' . strlen($binary) . "\n";
}
