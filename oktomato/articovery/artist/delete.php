<?php
if (!defined('OKTOMATO')) exit;

$artist_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$artist_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($artist_idxs) && is_array($artist_idxs)) {
	$Artist = new Artist();
	$Artist->setAttr('artist_idx', $artist_idxs);
	$Artist->setAttr('del_state', 'Y');

	try {
		if ($Artist->deletes($dbh)) {
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
	if (!empty($artist_idx) && is_numeric($artist_idx)) {
		$Artist = new Artist();
		$Artist->setAttr('artist_idx', $artist_idx);
		$Artist->setAttr('del_state', 'Y');
		$result = ($Artist->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$Artist = null;
$dbh = null;
unset($Artist);
unset($dbh);