<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require $_SERVER['DOCUMENT_ROOT'].'oktomato/news/news/inc_water_mark.php';

$ori_img = '1421196716USGP6TQQXH.jpg';
$water_img = '14211958713C2CQWTTXH.png';

// imageWaterMaking(워터마크를 집어넣을 이미지경로/이미지화일명, 워터마크로 쓸 이미지, 이미지의퀄리티)
//echo newsUploadPath ;
$newsUploadPath11 = '/home/arthongs/www/'.newsUploadPath;

$ARGimagePath = $newsUploadPath11.$ori_img;
$ARGwaterMakeSourceImage = $newsUploadPath11.$water_img;
$result = imageWaterMaking($ARGimagePath, $ARGwaterMakeSourceImage, 100);
//JS::ConsoleLog($result);
echo print_r($result);

//exit;

?>
<div style="background-color:red"><img src="http://arthongs.oktomato.net/upload/news/<?php echo $water_img;?>"></div>
<img src="http://arthongs.oktomato.net/upload/news/<?php echo $ori_img;?>">