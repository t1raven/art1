<?php
if (!defined('OKTOMATO')) exit;

$point_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$point_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($point_idxs) && is_array($point_idxs)) {
	$Point = new Point();
	$Point->setAttr('point_idx', $point_idxs);

	try {
		if ($Point->deletes($dbh)) {
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
	if (!empty($point_idx) && is_numeric($point_idx)) {
		$Point = new Point();
		$Point->setAttr('point_idx', $point_idx);
		$result = ($Point->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
