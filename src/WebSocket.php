<?php
/**
 * WebSocket.php
 * Create on 2023/7/20 13:41
 * Create by lihailiang@fanyigou.com
 */

namespace Fanyigou\ApiSdkPhp;

use Exception;
use React\EventLoop\Loop;
use React\Promise\Deferred;
use WebSocket\Client;

class WebSocket
{
    /**
     * @var string
     */
    private string $appKey;

    /**
     * @var string
     */
    private string $secKey;

    private string $url = 'wss://www.fanyigou.com/TranslateApi/api/voice/trans/online/';

    public function __construct(string $appKey, string $secKey)
    {
        $this->appKey = $appKey;
        $this->secKey = $secKey;
    }

    public function connection($connectionId): Client
    {
        $url = $this->getConnectionUrl($connectionId);

        $client = new Client($url, [
            'filter' => ['text', 'binary', 'close'],
            'return_obj' => true
        ]);

        $deferred = new Deferred();
        $asyncTask = function () use ($client, $deferred) {
            try {
                $this->messageHandler($client);
            } catch (Exception $e) {
                $deferred->reject($e);
            }
        };
        $loop = Loop::get();
        $loop->futureTick($asyncTask);
        return $client;
    }

    private function getConnectionUrl($connectionId): string
    {
        $params = [
            'appid' => $this->appKey,
            'privatekey' => $this->secKey,
            'nonce_str' =>  (string)time(),
        ];

        $params['token'] = $this->signature($params);
        $data = http_build_query($params);

        return $this->url . $connectionId . '?' . $data;
    }

    private function signature(array $params): string
    {
        ksort($params);

        $query = http_build_query($params);

        return strtoupper(md5($query));
    }

    public function messageHandler($client)
    {
        while (true) {
            try {
                $message = $client->receive();
                $opcode = $message->getOpcode();
                if ($opcode == 'text') {
                    $text = $message->getContent();
                    echo "received text message: " . $text . "\n";
                    if (!strpos($text, "\"errorCode\":\"0\"")) {
                        // 退出程序
                        exit();
                    }
                } else if ($opcode == 'binary') {
                    $binary = $message->getContent();
                    echo "received binary message length: " . count($binary) . "\n";
                } else if ($opcode == 'close') {
                    echo "connect closed\n";
                    // 退出程序
                    exit();
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
    }
}