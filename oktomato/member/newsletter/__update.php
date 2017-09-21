<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class/member/member.class.php');

$idx = isset($_POST['idx']) ? trim($_POST['idx']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;

$result = 0;

if (empty($email) ) {
	$result = 91; //이메일 값이 없다.
}
if ( empty(LIB_LIB::chkMail($email)) ){
	$result = 92; //이메일 형식이 맞지 않다.
}
$Member = new Member();
$Member->setAttr('newsletter_idx', $idx);
$Member->setAttr('newsletter_email', $email);

if ($result==0){
	$NewletterStatus = $Member->getNewletterStatus($dbh,$email);
	//echo ('NewletterStatus :' .$NewletterStatus.'<br>');
	if (!empty($NewletterStatus)) {
		$result = 93; //이미 등록된 이메일
	} else {
		if ($Member->setNewsletter_update($dbh)) {
			$result = 1; //등록완료
		}else {
			$result = 99; //등록되지 않음
		}
	} 
	//echo ('NewletterStatus:' .$NewletterStatus.'<br>');
		
}

$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
?>
{"cnt":<?php echo $result;?>}