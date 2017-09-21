<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx']) {
	$covery_idx = isset($_GET['cidx']) ? (int)$_GET['cidx'] : 1;
	$works_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
	$flag = isset($_GET['flag']) ? $_GET['flag'] : null;

	if (is_numeric($works_idx)) {
		$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
		$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);

		$Pin = new Pin();
		$Pin->setAttr('user_idx', $user_idx);
		$Pin->setAttr('covery_idx', $covery_idx);

		if ($user_level == '99') {
			$myPinCount = 0;
		}
		else {
			$myPinCount = $Pin->getMyPinCount($dbh);
		}

		require 'skin/pin.skin.php';

		$dbh = null;
		$Pin = null;
		unset($dbh);
		unset($Pin);
	}
}
