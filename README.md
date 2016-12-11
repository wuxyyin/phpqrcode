# phpqrcode
php使用phpqrcode生成二维码

# qrconfig.php文件修改
修改QR__DIR目录为cache目录
define('QR__DIR', dirname(dirname(__FILE__)) .DIRECTORY_SEPARATOR . 'cache' .DIRECTORY_SEPARATOR.''.DIRECTORY_SEPARATOR);  // used when QR_ABLE === true

修改QR_LOG_DIR目录为cache目录
define('QR_LOG_DIR', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR . 'cache' .DIRECTORY_SEPARATOR);                       // default error logs dir



