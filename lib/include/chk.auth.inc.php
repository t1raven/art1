<?php
if (empty($_SESSION['user_idx']) || empty($_SESSION['user_id']) || $_SESSION['logged_in'] !== 1 || empty($_SESSION['user_ip']))
{
	Js::LocationReplace('회원만 사용할 수 있습니다. 로그인하여 주세요.', '/member/login.php', 'top');
	exit;
}
else
{
	if ($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR'])
	{
		Js::LocationReplace('회원만 사용할 수 있습니다. 로그인하여 주세요.', '/member/login.php', 'top');
		exit;
	}
}
?>