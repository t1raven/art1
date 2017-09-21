<?php
//if (!defined('OKTOMATO')) exit;

$user_idx = isset($_POST['idx']) ? Xss::chkXSS(trim($_POST['idx'])) : null;
$user_id = isset($_POST['id']) ? Xss::chkXSS(trim($_POST['id'])) : null;
$user_pwd = isset($_POST['pwd']) ? Xss::chkXSS(trim($_POST['pwd'])) : null;
$newsletter_status = isset($_POST['newsletter_status']) ? Xss::chkXSS(trim($_POST['newsletter_status'])) : null;
$sms_status = isset($_POST['sms_status']) ? Xss::chkXSS(trim($_POST['sms_status'])) : null;
$mode = isset($_POST['mode']) ? Xss::chkXSS(trim($_POST['mode'])) : null;
$newsletter = isset($_POST['newsletter']) ? Xss::chkXSS(trim($_POST['newsletter'])) : null;

//echo( $user_pwd .'<br>');
//echo( 'newsletter_status :'.$newsletter_status.'<br>' );
//echo( 'newsletter :'.$newsletter.'<br>' );
//echo( 'mode :'.$mode.'<br>' );
//exit;

if (empty($mode)) { // 입력
	if (empty($user_id) || empty($user_rid) || empty($user_name) || empty($user_pwd)) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
	}else {
		if ($user_id !== $user_rid) { JS::HistoryBack('이메일이 일치하지 않습니다.');  exit; }
		if ($user_pwd !== $user_rpwd) {  JS::HistoryBack('비빌번호가 일치하지 않습니다.'); exit;  }
		if (!LIB_LIB::chkMail($user_id) || !LIB_LIB::chkMail($user_rid)) { JS::HistoryBack('유효한 이메일이 아닙니다.');  exit; }
	}
}else { //수정
	//if (empty($user_idx) || empty($user_rid) || empty($user_name) || empty($user_pwd)) { 
	if (empty($user_idx) || empty($user_id)  ) { 
	//if (empty($user_idx)  ) { 
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요2.');
		exit;
	}else{

		/*
			if (!empty($user_pwd) ) { //수정 비밀번호가 있으면 비밀번호 확인
			if ($user_pwd !== $user_rpwd) { JS::HistoryBack('비빌번호가 일치하지 않습니다.'); exit; }
		}
		*/

		/*
		if ($user_id != trim(AES256::dec($_SESSION['user_id'], AES_KEY))){
			JS::HistoryBack('등록된 이메일이 일치하지 않습니다. \r\n이메일은 등록된 이메일을 쓰셔야 합니다.'); exit;
		}
		*/
	}
}


$Member = new Member();
$Member->setAttr('user_id', $user_id);
$Member->setAttr('user_idx', $user_idx);
$Member->setAttr('user_name', $user_name);
$Member->setAttr('user_pwd', $user_pwd);
$Member->setAttr('newsletter_status', $newsletter);
$Member->setAttr('sms_status', $sms_status);
$Member->setAttr('user_level_code', $user_level_code);

try {
	if ($mode == 'edit') {
		if ($Member->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '?at=read&idx='.$user_idx.'&mode=edit', 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Member->insert($dbh)) {
			JS::HistoryBack('등록되었습니다.');
		}
		else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
if (gc_enabled()) gc_collect_cycles();
?>