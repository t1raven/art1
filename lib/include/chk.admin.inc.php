<?php
$isAuth = true;

if (empty($_SESSION['user_idx']) || empty($_SESSION['user_id']) || $_SESSION['logged_in'] !== 1 || empty($_SESSION['user_ip'] || empty($_SESSION['user_level_code'])))
{
	$isAuth = false;
}
else
{
	if ($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR'])
	{
		$isAuth = false;
	}

	$userLevelCode = AES256::dec($_SESSION['user_level_code'], AES_KEY);

	if (!is_numeric($userLevelCode))
	{
		$isAuth = false;
	}
	else
	{
		if ((int)$userLevelCode !== 99)
		{
			$isAuth = false;
		}
	}
}

if (!$isAuth)
{
	if (!empty($_SESSION['mst']) && AES256::dec($_SESSION['mst'], AES_KEY) === 'true')
	{
		if (AES256::dec($_SESSION['user_id'], AES_KEY) !== MASTER)
		{
			Js::LocationReplace('잘못된 접근입니다.', '/', 'top');
			exit();
		}
	}
	else
	{
		Js::LocationReplace('잘못된 접근입니다.', '/', 'top');
		exit;
	}
}
?>