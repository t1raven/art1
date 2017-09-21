<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_POST['cidx']) ? $_POST['cidx'] : 1;
	$point_idx = isset($_POST['pidx']) ? $_POST['pidx'] : 1;
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);

	$Point = new Point();
	$Point->setAttr('covery_idx', $covery_idx);
	$Point->setAttr('point_idx', $point_idx);
	$Point->setAttr('user_idx', $user_idx);
	$isPointAble = $Point->getIsPointAble($user_level);

	if ($isPointAble) {
		$artist = $Point->getArtist($dbh);
		$list = $Point->getMyPointList($dbh);
		$select = $Point->getArtistSelected($dbh);

		$aryImage[0] = '/images/articovery/thum_complete_1_1.jpg';
		$aryImage[1] = '/images/articovery/thum_complete_1_2.jpg';
		$aryImage[2] = '/images/articovery/thum_complete_1_3.jpg';
		$aryImage[3] = '/images/articovery/thum_complete_1_4.jpg';
		$aryImage[4] = '/images/articovery/thum_complete_1_5.jpg';
		$aryImage[5] = '/images/articovery/thum_complete_1_6.jpg';
		$aryImage[6] = '/images/articovery/thum_complete_1_7.jpg';
		$aryImage[7] = '/images/articovery/thum_complete_1_8.jpg';
		$aryImage[8] = '/images/articovery/thum_complete_1_9.jpg';

		if (is_array($list)) {
			foreach ($list as $key => $row) {
				$aryArtistIdx[$key] = $row['artist_idx'];
			}
		}
		else {
			$aryArtistIdx = array(0);
		}
	}

	require 'skin/complete.skin.php';
}
else{
	exit;
}

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
