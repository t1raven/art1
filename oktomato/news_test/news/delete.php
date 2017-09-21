<?php
if (!defined('OKTOMATO')) exit;

$news_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;
//echo print_r($news_idx);
//exit;
if (!is_null($news_idx) && is_array($news_idx)) {
	$News = new News();
	$News->setAttr('news_idx', $news_idx);

	try {
		if ($News->deletes($dbh)) {
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
$News = null;
unset($dbh);
unset($News);
?>