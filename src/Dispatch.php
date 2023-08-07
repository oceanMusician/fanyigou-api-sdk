<?php
/**
 * Trans.php
 * Create on 2023/3/24 11:05
 * Create by lihailiang@fanyigou.com
 */

namespace Fanyigou\ApiSdkPhp;

/**
 * @method array text($params)
 * @method array uploadTranslate($params, $filePath)
 * @method array downloadFile($params)
 * @method array queryTransProgress($params)
 * @method array detectDocPage($params, $filePath)
 * @method array submitForDetectDoc($params)
 * @method array convert($params, $filePath)
 * @method array getAccount($params)
 * @method array uploadTranslateImage($params, $filePath)
 * @method array queryImageTransProgress($params)
 * @method array downloadImage($params)
 * @method array ocrUploadImage($params, $filePath)
 * @method array dictSearch($params)
 * @method array getConnectionId($params)
 * @method array getTransAudioLink($params)
 * @method array voiceAudioUpload($params, $voicePath)
 * @method array voiceAudioQueryProgress($params)
 * @method array voiceAudioDownload($params)
 */
class Dispatch
{
    private Trans $trans;

    public function __construct($config)
    {
        $this->trans = new Trans($config['app_key'], $config['sec_key']);
    }

    public function __call($name, $arguments)
    {
        return $this->trans->{$name}(...$arguments);
    }

}