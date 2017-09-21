<?php
if (!defined('OKTOMATO')) exit;
// 전체 삭제
$bad_words_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($bad_words_idx) && is_array($bad_words_idx)) {
	$Badwords = new Badwords();
	$Badwords->setAttr('bad_words_idx', $bad_words_idx);

	try {
		if ($Badwords->deletes($dbh)) {
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
$Badwords = null;
unset($dbh);
unset($Badwords);
?>