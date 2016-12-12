<?php
/**
 * Created by PhpStorm.
 * User: wuxy
 * Time: 2016/12/12 14:58
 * 使用phpqrcode生成二维码演示程序
 */

//定义网站根目录
define('ROOT_PATH', dirname(dirname(__FILE__)) . '/');

//定义网站根URL
$href_url = 'http://' . $_SERVER['HTTP_HOST'];
define('ROOT_HOST', $href_url);

$href_url .= $_SERVER["PHP_SELF"];
define('ROOT_URL', dirname(dirname($href_url)));

//定义图片源路径
define('ORIGIN_PATH', ROOT_PATH . 'origin/');

//定义图片产生目标路径
define('TARGET_PATH', ROOT_PATH . 'target/');

//require lib
require_once ROOT_PATH . 'lib/qrlib.php';

$originalContent = isset($_POST['data']) && !empty($_POST['data']) ? $_POST['data'] : 'https://github.com/wuxyyin/phpqrcode';
$errorCorrectionLevel = isset($_POST['level']) && !empty($_POST['level']) ? $_POST['level'] : 'L';
$matrixPointSize = isset($_POST['size']) && intval($_POST['size']) ? intval($_POST['size']) : 4;

$targetFilename = md5("{$originalContent}-{$errorCorrectionLevel}-{$matrixPointSize}") . '.png';
$targetPath = TARGET_PATH . $targetFilename;

QRcode::png($originalContent, $targetPath, $errorCorrectionLevel, $matrixPointSize, 2);

$qrcode_host_url = ROOT_URL . "/target/{$targetFilename}";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHPQRCode Demo</title>
		<script type="text/javascript" src="lib/js/qrcanvas.js"></script>
	</head>
	<body>
		<h1>PHPQRCode Demo</h1>
		<hr/>
		<form name="form" action="" method="post">
    Data:&#160;
            <input name="data" value="<?php echo $originalContent; ?>" />
            &#160;
			ECC:&#160;
			<select name="level">
                <?php
                $levelList = array(
                    'L' => 'L - smallest',
                    'M' => 'M',
                    'Q' => 'Q',
                    'H' => 'H - best',
                );
                foreach ((array)$levelList as $_key=>$_value) {
                    if ($_key == $errorCorrectionLevel) {
                        echo "<option value=\"{$_key}\" selected=\"true\">{$_value}</option>";
                    } else {
                        echo "<option value=\"{$_key}\">{$_value}</option>";
                    }
                }
                ?>
			</select>&#160;
			Size:&#160;
			<select name="size">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    if ($i == $matrixPointSize) {
                        echo "<option value=\"{$i}\" selected=\"true\">{$i}</option>";
                    } else {
                        echo "<option value=\"{$i}\">{$i}</option>";
                    }
                }
                ?>
			</select>&#160;
			<input type="submit" value="GENERATE" />
		</form>
		<hr/>
		<img src="<?php echo $qrcode_host_url; ?>" />
        <hr />
	</body>
</html>