<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class/member/member.class.php');

$email = isset($_POST['email']) ? trim($_POST['email']) : null;

//echo('consult_user_tel :'.$consult_user_tel .'<br>');
echo('email :'.$email .'<br>');

if (empty($email) ) {
	JS::HistoryBack('이메일을 입력해 주세요.');
	exit;
}
if ( empty(LIB_LIB::chkMail($email)) ){
	JS::HistoryBack('이메일 형식이 일치하지 않습니다..');
	exit;
}

$Member = new Member();
//$Member->setAttr('newsletter_email', $email);

try {
	
	$NewletterStatus = $Member->getNewletterStatus($dbh,$email);
	//echo ('NewletterStatus :' .$NewletterStatus.'<br>');
	if (!empty($NewletterStatus)) {
		throw new Exception('이미 등록된 이메일 입니다.');
	} else {
		if ($Member->setNewsletter_insert($dbh,$email)) {
			JS::HistoryBack('등록되었습니다.');
		}else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	} 
	//echo ('NewletterStatus:' .$NewletterStatus.'<br>');
		
	
}
catch(Exception $e) {
	JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Newsletter = null;
unset($dbh);
unset($Newsletter);
?>

288