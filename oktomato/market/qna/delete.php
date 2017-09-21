<?php
if (!defined('OKTOMATO')) exit;
// 전체 삭제
$qna_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($qna_idx) && is_array($qna_idx)) {
	$Qna = new Qna();
	$Qna->setAttr('qna_idx', $qna_idx);

	try {
		if ($Qna->deletes($dbh)) {
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
$Qna = null;
unset($dbh);
unset($Qna);
?>