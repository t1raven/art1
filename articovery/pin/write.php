<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx']) {
	$covery = isset($_GET['covery']) ? (int)$_GET['covery'] : null;
	require 'skin/write.skin.php';
}
else{
	exit;
}
