<?php
include_once('../lib/include/global.inc.php');
include_once('../lib/class/member/member.class.php');

$user_idx = isset($_POST['idx']) ? trim($_POST['idx']) : null;
$user_name = isset($_POST['name']) ? trim($_POST['name']) : null;
$user_id = isset($_POST['id']) ? trim($_POST['id']) : null;
$user_rid = isset($_POST['rid']) ? trim($_POST['rid']) : null;
$user_pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : null;
$user_rpwd = isset($_POST['rpwd']) ? trim($_POST['rpwd']) : null;
$mode = isset($_POST['mode']) ? trim($_POST['mode']) : null;

if ($user_id !== $user_rid) {
	JS::HistoryBack('이메일이 일치하지 않습니다.');
	exit;
}

if ($user_pwd !== $user_rpwd) {
	JS::HistoryBack('비빌번호가 일치하지 않습니다.');
	exit;
}

if (empty($mode)) {
	if (empty($user_id) || empty($user_rid) || empty($user_name) || empty($user_pwd)) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
	}
	else {
		if (!LIB_LIB::chkMail($user_id) || !LIB_LIB::chkMail($user_rid)) {
			JS::HistoryBack('유효한 이메일이 아닙니다.');
			exit;
		}
	}
}
else {
	if (empty($user_idx) || empty($user_rid) || empty($user_name) || empty($user_pwd)) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요2.');
		exit;
	}
}

$user_level_code = 1; // 일반회원일 경우

$Member = new Member();
$Member->setAttr('user_id', $user_id);
$Member->setAttr('user_idx', $user_idx);
$Member->setAttr('user_name', $user_name);
$Member->setAttr('user_pwd', $user_pwd);
$Member->setAttr('user_level_code', $user_level_code);

try {
	if ($mode == 'edit') {
		if ($Member->update($dbh)) {
			JS::HistoryBack('수정되었습니다.');
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