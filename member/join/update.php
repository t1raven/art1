<?php
if (!defined('OKTOMATO')) exit;

$user_idx = isset($_SESSION['user_id']) ? Xss::chkXSS(trim(AES256::dec($_SESSION['user_idx'], AES_KEY))) : null;
$user_name = isset($_POST['name']) ? Xss::chkXSS(trim($_POST['name'])) : null;
$user_id = isset($_POST['id']) ? Xss::chkXSS(trim($_POST['id'])) : null;
$user_rid = isset($_POST['rid']) ? Xss::chkXSS(trim($_POST['rid'])) : null;
$user_pwd = isset($_POST['pwd']) ? Xss::chkXSS(trim($_POST['pwd'])) : null;
$user_rpwd = isset($_POST['rpwd']) ? Xss::chkXSS(trim($_POST['rpwd'])) : null;
$newsletter_status = isset($_POST['newsletter_status']) ? Xss::chkXSS(trim($_POST['newsletter_status'])) : null;
$sms_status = isset($_POST['sms_status']) ? Xss::chkXSS(trim($_POST['sms_status'])) : null;
$mode = isset($_POST['mode']) ? Xss::chkXSS(trim($_POST['mode'])) : null;

if ($user_id !== $user_rid) { JS::HistoryBack('이메일이 일치하지 않습니다.');  exit; }
if ($user_pwd !== $user_rpwd) { JS::HistoryBack('비빌번호가 일치하지 않습니다.'); exit; }
if (empty($user_id)) { JS::HistoryBack('회원 아이디를 입력하셔야 합니다.'); exit; }

if (!LIB_LIB::chkMail($user_id) || !LIB_LIB::chkMail($user_rid)) { JS::HistoryBack('유효한 이메일이 아닙니다.'); exit; }


if ($mode == 'edit') { // 수정
	if (empty($_SESSION['user_id'])  ) { 
	//if (empty($user_idx)  ) { 
		JS::HistoryBack('로그인 후 이용해주세요.');
		exit;
	}else{
		if ($user_id != trim(AES256::dec($_SESSION['user_id'], AES_KEY))){
			JS::HistoryBack('등록된 이메일이 일치하지 않습니다. \r\n이메일은 등록된 이메일을 쓰셔야 합니다.'); 
			exit;
		}
	}
}else { //입력
	if (empty($user_id) || empty($user_rid) ||empty($user_pwd)) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
	}else {
		if (empty($user_pwd)) { JS::HistoryBack('비밀번호를 입력하셔야 합니다.'); exit; }
		if ($user_id !== $user_rid) { JS::HistoryBack('이메일이 일치하지 않습니다.');  exit; }
		if ($user_pwd !== $user_rpwd) {  JS::HistoryBack('비빌번호가 일치하지 않습니다.'); exit;  }
		if (!LIB_LIB::chkMail($user_id) || !LIB_LIB::chkMail($user_rid)) { JS::HistoryBack('유효한 이메일이 아닙니다.');  exit; }
	}
	
}


$user_level_code = 1; // 일반회원일 경우

$Member = new Member();
$Member->setAttr('user_id', $user_id);
$Member->setAttr('user_idx', $user_idx);
$Member->setAttr('user_name', $user_name);
$Member->setAttr('user_pwd', $user_pwd);
$Member->setAttr('newsletter_status', $newsletter_status);
$Member->setAttr('sms_status', $sms_status);
$Member->setAttr('user_level_code', $user_level_code);

try {
	if ($mode == 'edit') {
		//echo 'edit';
		if ($Member->update($dbh)) {
			//echo 'edit1';
			JS::HistoryBack('수정되었습니다.');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Member->insert($dbh)) {
			//Js::LocationReplace('환영합니다. 로그인 후 이용해 주세요.', '/member/login/?at=write', 'parent');
			Js::LocationReplace('환영합니다. 로그인 후 이용해 주세요.', '/member/login.php', 'parent');
			//JS::HistoryBack('등록되었습니다.');
		}
		else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
//	JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
?>