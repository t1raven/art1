<?php
if (!defined('OKTOMATO')) exit;

$works_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$works_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($works_idxs) && is_array($works_idxs)) {
	$Work = new Work();
	$Work->setAttr('works_idx', $works_idxs);

	try {
		if ($Work->deletes($dbh)) {
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
	if (!empty($works_idx) && is_numeric($works_idx)) {
		$Work = new Work();
		$Work->setAttr('works_idx', $works_idx);
		$result = ($Work->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$Work = null;
$dbh = null;
unset($Work);
unset($dbh);
?>