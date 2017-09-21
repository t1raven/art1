<?php
if (!defined('OKTOMATO')) exit;

$score_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$score_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($score_idxs) && is_array($score_idxs)) {
	$Comment = new Comment();
	$Comment->setAttr('score_idx', $score_idxs);

	try {
		if ($Comment->deletes($dbh)) {
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
	if (!empty($score_idx) && is_numeric($score_idx)) {
		$Comment = new Comment();
		$Comment->setAttr('score_idx', $score_idx);
		$result = ($Comment->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$Comment = null;
$dbh = null;
unset($Comment);
unset($dbh);
?>