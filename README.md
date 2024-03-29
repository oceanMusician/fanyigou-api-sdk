## PHP-SDK

### 环境说明
* PHP 7.1+
* cURL extension
### 操作步骤
* 使用Composer来管理项目依赖项，请在项目的根目录中运行以下命令：
```php
composer require fanyigou/api-sdk-php
```
* 在Composer依赖管理器安装完成后，在您的PHP代码中导入该依赖项：
```php
require_once __DIR__ . '/vendor/autoload.php';
```
### 示例代码
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