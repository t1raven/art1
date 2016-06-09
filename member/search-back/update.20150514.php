<?php
if (!defined('OKTOMATO')) exit;

$user_id = isset($_POST['uid']) ? Xss::chkXSS(trim($_POST['uid'])) : null;

if (!LIB_LIB::chkMail($user_id) || !LIB_LIB::chkMail($user_rid)) { JS::HistoryBack('유효한 이메일이 아닙니다.'); exit; }

$Member = new Member();
$Member->setAttr('user_id', $user_id);

try {
	if (!$Member->getMemberSearch($dbh)) {
		//throw new Exception("회원정보가 존재하지 않습니다.");
		JS::HistoryBack('회원 정보가 존재하지 않습니다.');
		exit;
	}
	//구글+, 페이스북 로그인 연동 회원은 메시지만 보여준다.
	//유효한 이메일이 있으면 비밀번호를 변경하여 메일을 발송한다.
	//유효한 이메일이 아니면 메시지만..

}catch(Exception $e) {
//	JS::HistoryBack($e->getMessage());
	echo $e->getMessage();
}

echo $Member->attr['user_idx'].'<br>';
echo $Member->attr['user_id'].'<br>';
echo $Member->attr['sns_join'].'<br>';
//echo $Member->attr['user_id'].'<br>';

if ( !empty($Member->attr['sns_join']) ) {
	JS::HistoryBack( $Member->attr['sns_join']. '(으)로 연동한 회원입니다. ');
	exit;
}


//패스워드 재 설정
$new_pwd = mt_rand(100000, 999999);
echo $new_pwd .'<br>';

$Member->setAttr('user_idx', $Member->attr['user_idx']);
$Member->setAttr('user_pwd', $new_pwd);
if ($Member->update_pw($dbh)){
	
	//메일 발송
	$EMAIL =  'art1@art1.com';
	$NAME ='아트1';
	$mailto = $Member->attr['user_idx'];
	//$mailto = 'steplyt@gmail.com';
	$SUBJECT ='아트1 비밀번호 입니다.'; 
	$CONTENT = '비밀번호가 ['.$new_pwd.']으로 변경되었습니다.';
	$result_mail = Mailsend::sendMail($EMAIL, $NAME, $mailto, $SUBJECT, $CONTENT);
	
	echo  $result_mail;
}



$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
?>