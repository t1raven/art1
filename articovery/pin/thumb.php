<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx']) {
	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
	$covery_idx = isset($_POST['idx']) ? (int)$_POST['idx'] : null;

	$Pin = new Pin();
	$Pin->setAttr('covery_idx', $covery_idx);
	$Pin->setAttr('user_idx', $user_idx);
	$Pin->setAttr('user_level', $user_level);
	$myPinList = $Pin->getMyPin($dbh);

	require 'skin/thumb.skin.php';
}

$dbh = null;
$Pin = null;
unset($dhb);
unset($Pin);
