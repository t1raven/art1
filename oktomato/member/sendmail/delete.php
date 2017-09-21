<?php
if (!defined('OKTOMATO')) exit;

$emailIdx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$emailIdxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($emailIdxs) && is_array($emailIdxs)) {
	$sendmail = new Sendmail();
	$sendmail->setAttr('emailIdx', $emailIdxs);

	try {
		if ($sendmail->deletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationHref($e->getMessage(), PHP_SELF, 'parent');
	}
}
else {
	$result = 0;

	if (!empty($emailIdx) && is_numeric($emailIdx)) {
		$sendmail = new sendmail();
		$sendmail->setAttr('emailIdx', $emailIdx);
		$result = ($sendmail->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$sendmail = null;
$dbh = null;
unset($sendmail);
unset($dbh);