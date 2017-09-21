<?php
if (!defined('OKTOMATO')) exit;

$member_idx = isset($_POST['member_idx']) ? trim($_POST['member_idx']) : null;
$site_name = isset($_POST['sitename']) ? trim($_POST['sitename']) : null;
$siteurl = isset($_POST['siteurl']) ? trim($_POST['siteurl']) : null;
$user_idx = isset($_POST['user_idx']) ? trim($_POST['user_idx']) : null;
$a_email = isset($_POST['a_email']) ? trim($_POST['a_email']) : null;
$a_pw = isset($_POST['a_pw']) ? trim($_POST['a_pw']) : null;
$receive_email1 = isset($_POST['receive_email1']) ? trim($_POST['receive_email1']) : null;
$receive_email1_state = isset($_POST['receive_email1_state']) ? trim($_POST['receive_email1_state']) : 'N';
$receive_email2 = isset($_POST['receive_email2']) ? trim($_POST['receive_email2']) : null;
$receive_email2_state = isset($_POST['receive_email2_state']) ? trim($_POST['receive_email2_state']) : 'N';

if (empty($site_name)) { JS::HistoryBack('사이트 명을 입력하셔야 합니다.'); exit; }
if (empty($siteurl)) { JS::HistoryBack('도메인 주소를 입력하셔야 합니다.'); exit; }
if (empty($a_email)) { JS::HistoryBack('관리자 이메일을 입력하셔야 합니다.'); exit; }
if (!LIB_LIB::chkMail($user_id) ) { JS::HistoryBack('유효한 이메일이 아닙니다.'); exit; }
if (!empty($receive_email1)){ 
	if (!LIB_LIB::chkMail($receive_email1) ) { JS::HistoryBack('수신 이메일 1 이 유효한 이메일이 아닙니다.'); exit; } 
}else{
	$receive_email1_state ='N';
}

if (!empty($receive_email2)){ 
	if (!LIB_LIB::chkMail($receive_email2) ) { JS::HistoryBack('수신 이메일 2 가 유효한 이메일이 아닙니다.'); exit; } 
}else{
	$receive_email2_state ='N';
}

$Admininfo = new Admininfo();

$Admininfo->setAttr('member_idx', $member_idx);
$Admininfo->setAttr('user_idx', $user_idx);
$Admininfo->setAttr('site_name', $site_name);
$Admininfo->setAttr('site_url', $siteurl);
$Admininfo->setAttr('user_id', $a_email);
$Admininfo->setAttr('user_pwd', $a_pw);
$Admininfo->setAttr('receive_email1', $receive_email1);
$Admininfo->setAttr('receive_email1_state', $receive_email1_state);
$Admininfo->setAttr('receive_email2', $receive_email2);
$Admininfo->setAttr('receive_email2_state', $receive_email2_state);


try {
	if ($Admininfo->update($dbh)) {
				Js::LocationReplace('수정되었습니다.', '?at=write&idx='.$provision_idx, 'parent');
	}else {
		throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Admininfo = null;
unset($dbh);
unset($Admininfo);
?>