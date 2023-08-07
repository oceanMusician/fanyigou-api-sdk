<?php
/**
 * Api.php
 * Create on 2023/3/24 11:06
 * Create by lihailiang@fanyigou.com
 */

namespace Fanyigou\ApiSdkPhp;

use Curl\Curl;

class Api
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $secKey;

    const URL = 'https://www.fanyigou.com/TranslateApi/api/';

    public function __construct(string $appKey, string $secKey)
    {
        $this->appKey = $appKey;
        $this->secKey = $secKey;
    }

    /**
     * @param string $method
     * @param array $params
     * @param string $filePath
     * @param string $voicePath
     * @return mixed|null
     * @throws DispatchException
     */
    public function request(string $method, array $params = [], string $filePath = '', string $voicePath = '')
    {
        $params = array_merge($params, [
            'appid'      => $this->appKey,
            'privatekey' => $this->secKey,
            'nonce_str'  => (string)time(),
        ]);

        if (!empty($filePath)) {
            $params['md5'] = md5_file($filePath);
        }
        $params['token'] = $this->signature($params);

        if (!empty($filePath)) {
            $params['file'] = new \CURLFile(realpath($filePath));
        }

        if (!empty($voicePath)) {
            $params['file'] = new \CURLFile(realpath($voicePath));
        }

        $curl = new Curl();
        $curl->post(self::URL . $method, $params);

        if (isset($curl->responseHeaders['content-type'])
            && stripos($curl->responseHeaders['content-type'], 'application/octet-stream') !== false) {
            return $curl->response; // 直接返回文件流
        }

        $result = json_decode(is_object($curl->response) ? json_encode($curl->response) : $curl->response, true);
        $this->checkErrorAndThrow($result);
        return $result;

    }

    public function signature(array $params): string
    {
        ksort($params);

        $query = '';
        foreach ($params as $key => $value) {
            $query .= $key . '=' . $value . '&';
        }
        $query = substr($query, 0, -1);

        return strtoupper(md5($query));
    }

    /**
     * @param array $result
     * @throws DispatchException
     */
    private function checkErrorAndThrow(array $result)
    {
        if (isset($result['status']) && $result['status'] == 500) {
            $errorMessage = $result['message'] ?? '';
            $errorCode = $result['status'];
            throw new DispatchException($errorMessage, $errorCode);
        }

        $validCodes = [0, 100];
        if (isset($result['code']) && !in_array($result['code'], $validCodes)) {
            $errorMessage = $result['msg'] ?? '';
            $errorCode = $result['code'];
            throw new DispatchException($errorMessage, $errorCode);
        }
    }
}