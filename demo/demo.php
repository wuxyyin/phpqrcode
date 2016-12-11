<?php
/**
* Created by PhpStorm.
 * User: wuxy
* Date: 2016/12/11
* Time: 14:48
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

$originalContent = 'author:wuxyyin';
$targetFilename = 'target.png';
$targetPath = TARGET_PATH . $targetFilename;
$errorCorrectionLevel = 'L';
$matrixPointSize = 4;

QRcode::png($originalContent, $targetPath, $errorCorrectionLevel, $matrixPointSize, 2);

$qrcode_host_url = ROOT_URL . "/target/{$targetFilename}";

echo "<img src=\"{$qrcode_host_url}\" />";


