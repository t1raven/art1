<?php
//if (!defined('OKTOMATO')) exit;

$user_idx = isset($_POST['idx']) ? trim($_POST['idx']) : null;
$user_id = isset($_POST['id']) ? trim($_POST['id']) : null;
$user_pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : null;
$newsletter_status = isset($_POST['newsletter_status']) ? trim($_POST['newsletter_status']) : null;
$sms_status = isset($_POST['sms_status']) ? trim($_POST['sms_status']) : null;
$mode = isset($_POST['mode']) ? trim($_POST['mode']) : null;


echo( $user_pwd );
exit;

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
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요2.');
		exit;
	}else{
		/*
		if (!empty($user_pwd) ) { //수정 비밀번호가 있으면 비밀번호 확인
			if ($user_pwd !== $user_rpwd) { JS::HistoryBack('비빌번호가 일치하지 않습니다.'); exit; }
		}
		*/
	}
}

if (empty($user_level_code)) { $user_level_code = 1 ; }
//$user_level_code = 1; // 일반회원일 경우

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
		if ($Member->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '/oktomato/member/join-write.php?idx='.$user_idx.'&mode=edit', 'parent');
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
?>