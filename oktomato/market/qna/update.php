<?php
if (!defined('OKTOMATO')) exit;

//session_start(); // 세션 데이터 초기화
//$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);

$mode = isset($_POST['mode']) ? trim($_POST['mode']) : null;
$qna_idx = isset($_POST['idx']) ? trim($_POST['idx']) : null;
$user_idx = isset($user_idx) ? trim($user_idx) : null;
$goods_idx = isset($_POST['goods_idx']) ? trim($_POST['goods_idx']) : null;
$secret_status = isset($_POST['secret']) ? trim($_POST['secret']) : null;
$qna_password = isset($_POST['pw']) ? trim($_POST['pw']) : null;
$user_view_url = isset($_POST['user_view_url']) ? trim($_POST['user_view_url']) : null;
$qna_user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
$qna_user_tel = isset($_POST['user_tel']) ? trim($_POST['user_tel']) : null;
$qna_user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : null;
$qna_title = isset($_POST['title']) ? trim($_POST['title']) : null;
$qna_user_content = isset($_POST['content']) ? trim($_POST['content']) : null;
$qna_amdin_memo = isset($_POST['memo']) ? trim($_POST['memo']) : null;
$how_to_request = isset($_POST['how_to_request']) ? trim($_POST['how_to_request']) : null;

//echo('mode :'.$mode .'<br>');
//echo('qna_amdin_memo :'.$_POST['memo'] .'<br>');


if ($mode == 'edit' ) {
	if (empty($qna_amdin_memo) ) {
		JS::HistoryBack('답변을 입력해 주세요.');
		exit;
	}
}else{
	if (empty($qna_user_name) || empty($qna_user_content) ) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
		exit;
	}
	if( $how_to_request == 'tel' && empty($qna_user_tel) ) {
		JS::HistoryBack($how_to_request.' '.$user_tel.'전화 답변을 원하시면 연락처를 입력해 주세요.');
		exit;
	}
	if ( $how_to_request == 'email' ){
		if( empty($qna_user_email) ) { JS::HistoryBack('Email 답변을 원하시면 Email을 입력해 주세요.');  	exit; }
		if ( empty(LIB_LIB::chkMail($qna_user_email)) ){ 	JS::HistoryBack('이메일 형식이 일치하지 않습니다..'); 	exit; }
	}

	
}

$Qna = new Qna();
$Qna->setAttr('qna_idx', $qna_idx);
$Qna->setAttr('user_idx', $user_idx);
$Qna->setAttr('goods_idx', $goods_idx);
//$Qna->setAttr('goods_name', $goods_name);
$Qna->setAttr('secret_status', $secret_status);
$Qna->setAttr('qna_password', $qna_password);
$Qna->setAttr('user_view_url', $user_view_url);
$Qna->setAttr('qna_user_name', $qna_user_name);
$Qna->setAttr('qna_user_tel', $qna_user_tel);
$Qna->setAttr('qna_user_email', $qna_user_email);
$Qna->setAttr('qna_title', $qna_title);
$Qna->setAttr('qna_user_content', $qna_user_content);
$Qna->setAttr('qna_amdin_memo', $qna_amdin_memo);
$Qna->setAttr('how_to_request', $how_to_request);

try {
	if ($mode == 'edit') {
		if ($Qna->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '?at=read&idx='.$qna_idx.'&mode=edit', 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Qna->insert($dbh)) {
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
$Qna = null;
unset($dbh);
unset($Qna);
?>