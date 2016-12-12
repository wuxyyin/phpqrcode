# phpqrcode
php使用phpqrcode生成二维码

# qrconfig.php文件修改
修改QR__DIR目录为cache目录
define('QR__DIR', dirname(dirname(__FILE__)) .DIRECTORY_SEPARATOR . 'cache' .DIRECTORY_SEPARATOR.''.DIRECTORY_SEPARATOR);  // used when QR_ABLE === true

修改QR_LOG_DIR目录为cache目录
define('QR_LOG_DIR', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR . 'cache' .DIRECTORY_SEPARATOR);                       // default error logs dir

# 使用方法
1、引入phpqrcode的lib文件
require_once ROOT_PATH . 'lib/qrlib.php';

2、调用QRcode::png方法生成png格式的二维码
QRcode::png($originalContent, $targetPath, $errorCorrectionLevel, $matrixPointSize, 2);
$originalContent：需要生成二维码的原始字符串
$targetPath：生成二维码图片的保存路径
$errorCorrectionLevel：二维码纠错级别
$matrixPointSize：二维码尺寸
