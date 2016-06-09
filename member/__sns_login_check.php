<?php
require_once('../lib/include/global.inc.php');
require_once('../lib/class/member/login.class.php');

$user_id = isset($_POST['email']) ? Xss::chkXSS($_POST['email']) : null;
$sns = isset($_POST['sns']) ? Xss::chkXSS(trim($_POST['sns'])) : null;

if (empty($user_id) ) {
	echo '{"cnt":92}'; //아이디 값이 없다.
	exit; 
}
else {
	/*
	if (!LIB_LIB::chkMail($user_id)) {
		echo '{"cnt":93}'; //유효한 이메일이 아닙니다
		exit; 
	}
	*/

	$login = new Login();
	$login->setAttr('user_id', $user_id);
	$login->setAttr('sns', $sns);

	try {
		if ($login->getLogin($dbh)) {
			//@session_cache_limiter('nocache');
			session_start(); // 세션 데이터 초기화

			$_SESSION['user_idx'] = AES256::enc($login->attr['user_idx'], AES_KEY);
			$_SESSION['user_id'] = AES256::enc($login->attr['user_id'], AES_KEY);
			$_SESSION['user_name'] = AES256::enc($login->attr['user_name'], AES_KEY);
			$_SESSION['sns_join'] = AES256::enc($login->attr['sns_join'], AES_KEY);
			$_SESSION['logged_in'] = 1;
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];

			if ($idsave ==='Y'){ // 아이디 저장 
				setcookie('cook_user_id', $_SESSION['user_id'], time()+(60*60*24*30));
			}else{
				setcookie('cook_user_id');
			}

			//JS::LocationReplace('환영합니다.', $return_url, 'parent');
			echo '{"cnt":1}'; //로그인 성공
		}
		else {
			//throw new Exception('정보가 일치하지 않습니다.');
			echo '{"cnt":94}'; //로그인 실패
		}
	}
	catch(Exception $e) {
		//JS::LocationHref($e->getMessage(), '/member/login.php', 'parent');
		echo '{"cnt":99}'; //로그인 실패
	}

	$dbh = null;
	unset($dbh);
}
?>