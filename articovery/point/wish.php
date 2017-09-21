<?php
if (!defined('OKTOMATO')) exit;

$categoriName = 'articovery';
$pageName = 'articovery';
$pageNum = '5';
$subNum = '1';
$thirdNum = '0';
$pathType = 'b';

$covery_idx = 1; // 임시용
$list = null;
$aryArtistIdx = array();

$Point = new Point();
$Point->setAttr('covery_idx', $covery_idx);

if ($_SESSION['user_idx']) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$Point->setAttr('user_idx', $user_idx);
	$list = $Point->getMyPointList($dbh);
}
else {
	$list = null;
}

$select = $Point->getArtistSelected($dbh);

$aryImage[0] = '/images/articovery/top9/top9_1_1.jpg';
$aryImage[1] = '/images/articovery/top9/top9_1_2.jpg';
$aryImage[2] = '/images/articovery/top9/top9_1_3.jpg';
$aryImage[3] = '/images/articovery/top9/top9_1_4.jpg';
$aryImage[4] = '/images/articovery/top9/top9_1_5.jpg';
$aryImage[5] = '/images/articovery/top9/top9_1_6.jpg';
$aryImage[6] = '/images/articovery/top9/top9_1_7.jpg';
$aryImage[7] = '/images/articovery/top9/top9_1_8.jpg';
$aryImage[8] = '/images/articovery/top9/top9_1_9.jpg';

$aryWorksName[0] = 'Flowers in Chaos';
$aryWorksName[1] = 'Fake Life - Luxury Store 5F';
$aryWorksName[2] = 'Universe (宇宙)';
$aryWorksName[3] = 'The Tower of Card';
$aryWorksName[4] = 'Fabric Drawing - 감각의 전환';
$aryWorksName[5] = 'Multi';
$aryWorksName[6] = 'Abuse';
$aryWorksName[7] = 'Before Sunset';
$aryWorksName[8] = '기호들의 순환';

if (is_array($list) && sizeof($list) > 0) {
	foreach ($list as $key => $row) {
		$aryArtistIdx[$key] = $row['artist_idx'];
	}
}

include ROOT.'inc/link.php';
include ROOT.'inc/top.php';
include ROOT.'inc/header.php';
require 'skin/wish.skin.php';
include ROOT.'inc/footer.php';
include ROOT.'inc/bot.php';

$dbh = null;
$Point = null;
unset($dbh);
unset($Point);
