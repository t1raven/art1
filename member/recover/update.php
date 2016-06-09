<?php
if (!defined('OKTOMATO')) exit;

$auth_key = isset($_POST['query']) ? Xss::chkXSS(trim($_POST['query'])) : null;
$old_user_id = isset($_POST['ouid']) ? Xss::chkXSS(trim($_POST['ouid'])) : null;
$user_id = isset($_POST['uid']) ? Xss::chkXSS(trim($_POST['uid'])) : null;
$user_pwd = isset($_POST['pwd']) ? Xss::chkXSS(trim($_POST['pwd'])) : null;
$user_rpwd = isset($_POST['rpwd']) ? Xss::chkXSS(trim($_POST['rpwd'])) : null;

if (empty($auth_key) || is_null($auth_key)) {
	JS::LocationHref('잘못된 접근입니다.', PHP_SELF.'?query='.$auth_key);
	exit;
}

if (!LIB_LIB::chkMail($user_id)) {
	JS::LocationHref('유효한 이메일이 아닙니다.', PHP_SELF.'?query='.$auth_key);
	exit;
}

if (empty($user_pwd) || is_null($user_pwd)) {
	Js::LocationHref('비밀번호를 입력하세요.', PHP_SELF.'?query='.$auth_key);
	exit;
}

if (empty($user_rpwd) || is_null($user_rpwd)) {
	Js::LocationHref('비밀번호 확인을 입력하세요.', PHP_SELF.'?query='.$auth_key);
	exit;
}

if ($user_pwd !== $user_rpwd) {
	Js::LocationHref('비밀번호와 비밀번호 확인이 일치하지 않습니다.', PHP_SELF.'?query='.$auth_key);
	exit;
}

try {
	$Recover = new Recover();
	$Recover->setAttr('user_id', $user_id);
	$Recover->setAttr('user_pwd', $user_pwd);
	$Recover->setAttr('del_state', 'N');
	$Recover->setAttr('auth_key', $auth_key);
	$Recover->setAttr('auth_state', 'Y');

	// 중복 검사
	if ($old_user_id !== $user_id) {
		if (!$Recover->chkEmailDuplication($dbh)) {
			$dbh = null;
			$Search = null;
			unset($dbh);
			unset($Search);
			Js::LocationHref('중복된 이메일 입니다. 다른 이메일을 입력해 주세요.', PHP_SELF.'?query='.$auth_key);
			exit;
		}
	}

	if ($Recover->update($dbh)) {
		Js::LocationHref('', PHP_SELF.'?at=complete');
	}
	else {
		throw new Exception('오류가 발생했습니다. 관리자에게 문의하여 주세요.');
	}
}
catch(Exception $e) {
	echo $e->getMessage();
}

$dbh = null;
$Search = null;
unset($dbh);
unset($Search);