<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/member/member.class.php');

$email = isset($_POST['email']) ? Xss::chkXSS(trim($_POST['email'])) : null;
$sns = isset($_POST['sns']) ? Xss::chkXSS(trim($_POST['sns'])) : null;
$sns_id = isset($_POST['id']) ? Xss::chkXSS(trim($_POST['id'])) : null;

if (empty($email)) { 
	//JS::HistoryBack('회원 아이디를 입력하셔야 합니다.'); 
	echo '{"cnt":92}';
	exit; 
}
if (!LIB_LIB::chkMail($email) ) { 
	//JS::HistoryBack('유효한 이메일이 아닙니다.'); 
	echo '{"cnt":93}';
	exit; 
}

$user_level_code = 1; // 일반회원일 경우

$result = 0;

$Member = new Member();
$Member->setAttr('user_id', $email);
$Member->setAttr('user_level_code', $user_level_code);
$Member->setAttr('sns', $sns);
$Member->setAttr('sns_id', $sns_id);
$Member->setAttr('ajax', true);

try {
	$result = $Member->insert($dbh) ;
	if ( $result  == true && !( $result == 91 || $result == 99 ) ){
		$result  = 1;
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

{"cnt":<?php echo $result;?>}