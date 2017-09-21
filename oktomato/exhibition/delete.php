<?php
// 전체 삭제
include_once('../../lib/include/global.inc.php');
include_once('../../lib/class/exhibition/exhibition.class.php');

$exh_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($exh_idx) && is_array($exh_idx)) {
	$Exhibition = new Exhibition();
	$Exhibition->setAttr('exh_idx', $exh_idx);

	try {
		if ($Exhibition->deletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', '/oktomato/exhibition/?at=list', 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {

		Js::LocationHref($e->getMessage(), '/oktomato/Exhibition/?at=list', 'parent');
	}
}

$dbh = null;
$Exhibition = null;
unset($dbh);
unset($Exhibition);
?>