<?php
if (!defined('OKTOMATO')) exit;
// 전체 삭제
$advice_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($advice_idx) && is_array($advice_idx)) {
	$Advice = new Advice();
	$Advice->setAttr('advice_idx', $advice_idx);

	try {
		if ($Advice->deletes($dbh)) {
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
$Advice = null;
unset($dbh);
unset($Advice);
?>