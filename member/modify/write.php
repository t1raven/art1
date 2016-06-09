<?php
if (!defined('OKTOMATO')) exit;

//구글이나 페이스북으로 가입된 회원은 수정할 수 없다.

if(!empty($sns_join)){
	JS::HistoryBack($sns_join. '(으)로 가입된 회원은 회원정보를 수정 할 수 없습니다.');
	exit;
}

$Member = new Member();
$Member->setAttr("user_idx", $user_idx);

try {
	if (!$Member->getRead($dbh)) {
		throw new Exception("잘못된 회원정보 입니다.");
	}
	$newsletter_status = $Member->getNewletterStatus($dbh,$Member->attr['user_id']);
} catch(Exception $e) {
	$dbh = null;
	//JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	echo $e->getMessage() ;
	exit;
}

require('skin/basic/write.skin.php');

echo ACTION_IFRAME;

$Member = null;
$dbh = null;
unset($Member);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>