<?php
// 전체 삭제
include_once('../../lib/include/global.inc.php');
include_once('../../lib/class/member/member.class.php');

$user_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($user_idx) && is_array($user_idx)) {
	$Member = new Member();
	//echo('user_idx : '.print_r($user_idx).' <br>'  );
	//exit;

	$Member->setAttr('user_idx', $user_idx);

	try {
		if ($Member->deletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', '/oktomato/member/?at=list', 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationHref($e->getMessage(), '/oktomato/member/?at=list', 'parent');
	}
}

$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
?>