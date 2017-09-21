<?php
if (!defined('OKTOMATO')) exit;

if ($_SESSION['user_idx'])
{
	$covery = isset($_POST['covery']) ? (int)$_POST['covery'] : null;
	$user_level = AES256::dec($_SESSION['user_level_code'], AES_KEY);
	if (is_numeric($covery))
	{
		$Point = new Point();
		$isPointAble = $Point->getIsPointAble($user_level);
		if ($isPointAble)
		{
			require 'skin/contact.skin.php';
		}
	}
}

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
