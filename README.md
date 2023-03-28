## PHP-SDK

### 运行环境
* PHP 7.1+
* CURL extension
### 安装方法

### 快速使用
##### 文件上传
```php
<?php
include_once __DIR__.'/vendor/autoload.php';

use Fanyigou\ApiSdkPhp\Dispatch;
use Fanyigou\ApiSdkPhp\DispatchException;

$appKey = '您的应用ID';
$secKey = '您的密钥';

$dispatch = new Dispatch(['app_key' => $appKey, 'sec_key' => $secKey]);

$filePath = '文档路径'; //文档路径

$params = [
    'from' => 'en',
    'to' => 'zh',
];

try {
    $result = $dispatch->uploadTranslate($params, $filePath);
    print_r($result);
} catch (DispatchException $e) {
    print_r($e->getMessage());
}
```
更多示例/demo   

#### License
*  MIT