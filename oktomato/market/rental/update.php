<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? trim($_POST['mode']) : null;
$rental_idx = isset($_POST['idx']) ? trim($_POST['idx']) : null;
$goods_idx = isset($_POST['goods_idx']) ? trim($_POST['goods_idx']) : null;
$goods_name = isset($_POST['goods_name']) ? trim($_POST['goods_name']) : null;
$user_view_url = isset($_POST['user_view_url']) ? trim($_POST['user_view_url']) : null;
$rental_user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
$rental_user_company = isset($_POST['user_company']) ? trim($_POST['user_company']) : null;
$rental_user_tel = isset($_POST['user_tel']) ? trim($_POST['user_tel']) : null;
$rental_user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : null;
$setting_room = isset($_POST['setting_room']) ? trim($_POST['setting_room']) : null;
$rental_user_content = isset($_POST['content']) ? trim($_POST['content']) : null;
$rental_amdin_memo = isset($_POST['memo']) ? trim($_POST['memo']) : null;
$how_to_request = isset($_POST['how_to_request']) ? trim($_POST['how_to_request']) : null;

//echo('rental_user_tel :'.$rental_user_tel .'<br>');
echo('mode :'.$mode .'<br>');
echo('rental_amdin_memo :'.$_POST['memo'] .'<br>');


if ($mode == 'edit' ) {
	if (empty($rental_amdin_memo) ) {
		JS::HistoryBack('답변을 입력해 주세요.');
		exit;
	}
}else{
	if (empty($rental_user_name) || empty($rental_user_content) ) {
		JS::HistoryBack('필수 입력항목에 데이터를 입력해 주세요.');
		exit;
	}
	if( $how_to_request == 'tel' && empty($rental_user_tel) ) {
		JS::HistoryBack($how_to_request.' '.$user_tel.'전화 답변을 원하시면 연락처를 입력해 주세요.');
		exit;
	}
	if ( $how_to_request == 'email' ){
		if( empty($rental_user_email) ) { JS::HistoryBack('Email 답변을 원하시면 Email을 입력해 주세요.');  	exit; }
		if ( empty(LIB_LIB::chkMail($rental_user_email)) ){ 	JS::HistoryBack('이메일 형식이 일치하지 않습니다..'); 	exit; }
	}
}

$Rental = new Rental();
$Rental->setAttr('rental_idx', $rental_idx);
$Rental->setAttr('goods_idx', $goods_idx);
$Rental->setAttr('goods_name', $goods_name);
$Rental->setAttr('user_view_url', $user_view_url);
$Rental->setAttr('rental_user_name', $rental_user_name);
$Rental->setAttr('rental_user_company', $rental_user_company);
$Rental->setAttr('rental_user_tel', $rental_user_tel);
$Rental->setAttr('rental_user_email', $rental_user_email);
$Rental->setAttr('setting_room', $setting_room);
$Rental->setAttr('rental_user_content', $rental_user_content);
$Rental->setAttr('rental_amdin_memo', $rental_amdin_memo);
$Rental->setAttr('how_to_request', $how_to_request);

try {
	if ($mode == 'edit') {
		if ($Rental->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '?at=read&idx='.$rental_idx.'&mode=edit', 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Rental->insert($dbh)) {
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
$Rental = null;
unset($dbh);
unset($Rental);
?>