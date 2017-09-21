<?php
if (!defined('OKTOMATO')) exit;
// 전체 삭제
$newsletter_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($newsletter_idx) && is_array($newsletter_idx)) {
	$Member = new Member();
	$Member->setAttr('newsletter_idx', $newsletter_idx);

	try {
		if ($Member->newsletterDeletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', '?at=list', 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationHref($e->getMessage(), '?at=list', 'parent');
	}
}

$dbh = null;
$Member = null;
unset($dbh);
unset($Member);
?>