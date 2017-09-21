<?php
require_once('../../lib/include/global.inc.php');
require_once('../../lib/class/member/login.class.php');

$user_id = isset($_POST['uid']) ? Xss::chkXSS($_POST['uid']) : null;
$user_pwd = isset($_POST['upwd']) ? Xss::chkXSS($_POST['upwd']) : null;

if (empty($user_id) || empty($user_pwd)) {
	JS::LocationHref('입력값이 유효하지 않습니다.', '/oktomato/', 'parent');
	exit();
}
else {
	if (!LIB_LIB::chkMail($user_id)) {
		JS::LocationHref('유효한 아이디가 아닙니다.', '/oktomato/', 'parent');
		exit();
	}

	$login = new Login();
	$login->setAttr('user_id', $user_id);
	$login->setAttr('user_pwd', $user_pwd);

	try {
		if ($login->getAdminLogin($dbh)) {
			//echo "code:".$login->attr['user_level_code'];
			//@session_cache_limiter('nocache');
			@session_start(); // 세션 데이터 초기화

			$_SESSION['user_idx'] = AES256::enc($login->attr['user_idx'], AES_KEY);
			$_SESSION['user_id'] = AES256::enc($login->attr['user_id'], AES_KEY);
			$_SESSION['user_name'] = AES256::enc($login->attr['user_name'], AES_KEY);
			$_SESSION['user_level_code'] = AES256::enc($login->attr['user_level_code'], AES_KEY);
			$_SESSION['mst'] = AES256::enc($login->attr['mst'], AES_KEY);
			$_SESSION['logged_in'] = 1;
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];

			JS::LocationHref($login->attr['user_name'].'님 환영합니다.', '/oktomato/', 'parent');
		}
		else {
			throw new Exception('정보가 일치하지 않습니다.');
		}
	}
	catch(Exception $e) {
		JS::LocationHref($e->getMessage(), '/oktomato/', 'parent');
	}

	$login = null;
	$dbh = null;
	unset($login);
	unset($dbh);
}
?>