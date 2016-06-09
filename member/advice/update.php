<?php
if (!defined('OKTOMATO')) exit;

require ROOT.'lib/class/util/Mailsend.php';

if ( ! ($arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"]))) ){
	exit;
}

$mode = isset($_POST['mode']) ? Xss::chkXSS( trim($_POST['mode'])) : null;
$request_type = isset($_POST['request_type']) ? Xss::chkXSS(trim($_POST['request_type'])) : null;
$goods_idx = isset($_POST['goods_idx']) ? Xss::chkXSS(trim($_POST['goods_idx'])) : null;
$user_view_url = isset($_POST['user_view_url']) ? Xss::chkXSS(trim($_POST['user_view_url'])) : null;
$advice_user_name = isset($_POST['user_name']) ? Xss::chkXSS(trim($_POST['user_name'])) : null;
$advice_user_company = isset($_POST['user_company']) ? Xss::chkXSS(trim($_POST['user_company'])) : null;
$advice_user_tel = isset($_POST['user_tel']) ? Xss::chkXSS(trim($_POST['user_tel'])) : null;
$advice_user_email = isset($_POST['user_email']) ? Xss::chkXSS(trim($_POST['user_email'])) : null;
$setting_room = isset($_POST['setting_room']) ? Xss::chkXSS(trim($_POST['setting_room'])) : null;
$advice_user_content = isset($_POST['content']) ? Xss::chkXSS(trim($_POST['content'])) : null;
$how_to_request = isset($_POST['how_to_request']) ? Xss::chkXSS(trim($_POST['how_to_request'])) : null;

$user_view_url = filter_var($user_view_url, FILTER_SANITIZE_URL);

//echo('advice_user_tel :'.$advice_user_tel .'<br>');
//echo('mode :'.$mode .'<br>');
//echo('advice_amdin_memo :'.$_POST['memo'] .'<br>');


if ($mode == 'edit' ) {
	if (empty($advice_amdin_memo) ) {
		JS::HistoryBack('답변을 입력해 주세요.');
		exit;
	}
}else{
	if( empty($advice_user_name) ) { JS::HistoryBack('문의자명을 입력해 주세요.');  exit;  }
	if( empty($advice_user_content) ) { JS::HistoryBack('문의내용을 입력해 주세요.');  exit;  }
	if( $how_to_request == 'tel' && empty($advice_user_tel) ) {
		JS::HistoryBack($how_to_request.' '.$user_tel.'전화 답변을 원하시면 연락처를 입력해 주세요.');
		exit;
	}
	if ( $how_to_request == 'email' ){
		if( empty($advice_user_email) ) { JS::HistoryBack('Email 답변을 원하시면 Email을 입력해 주세요.');  	exit; }
		if ( empty(LIB_LIB::chkMail($advice_user_email)) ){ 	JS::HistoryBack('이메일 형식이 일치하지 않습니다..'); 	exit; }
	}
}

$Advice = new Advice();
$Advice->setAttr('user_idx', $user_idx);
$Advice->setAttr('advice_idx', $advice_idx);
$Advice->setAttr('goods_idx', $goods_idx);
$Advice->setAttr('goods_name', $goods_name);
$Advice->setAttr('request_type', $request_type);
$Advice->setAttr('user_view_url', $user_view_url);
$Advice->setAttr('advice_user_name', $advice_user_name);
$Advice->setAttr('advice_user_company', $advice_user_company);
$Advice->setAttr('advice_user_tel', $advice_user_tel);
$Advice->setAttr('advice_user_email', $advice_user_email);
$Advice->setAttr('setting_room', $setting_room);
$Advice->setAttr('advice_user_content', $advice_user_content);
$Advice->setAttr('advice_amdin_memo', $advice_amdin_memo);
$Advice->setAttr('how_to_request', $how_to_request);

try {
	if ($mode == 'edit') {
		/*
		if ($Advice->update($dbh)) {
			//JS::HistoryBack('수정되었습니다.');
			JS::LocationReplace('수정되었습니다.', '?at=read&idx='.$advice_idx.'&mode=edit', 'parent');
		}else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
		*/
	}else {
		if ($Advice->insert($dbh)) {
			//JS::HistoryBack('등록되었습니다.');

			//////////////////
			// 관리자에게 메일 보내기 
			$SUBJECT=$advice_user_name.'  상담문의가 있습니다.'; 
			$CONTENT=$advice_user_name.'상담문의가 등록되었습니다.';
			$result_mail = Mailsend::getAdminMailSend($dbh, $SUBJECT, $CONTENT);
			// 관리자에게 메일 보내기
			//////////////////


			//JS::LocationReload($result_mail.'문의가 등록되었습니다.',$user_view_url, parent);
			JS::LocationHref('등록되었습니다.', '/member/advice/index.php', 'parent');
		}else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Advice = null;
unset($dbh);
unset($Advice);
?>