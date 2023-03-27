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
 * @method array detectDocPage($filePath)
 * @method array submitForDetectDoc($params)
 * @method array convert($params, $filePath)
 * @method array getAccount()
 * @method array uploadTranslateImage($params, $filePath)
 * @method array queryImageTransProgress($params)
 * @method array downloadImage($params)
 */
class Dispatch
{
    private $trans;

    public function __construct($config)
    {
        $this->trans = new Trans($config['app_key'], $config['sec_key']);
    }

    public function __call($name, $arguments)
    {
        return $this->trans->{$name}(...$arguments);
    }

}