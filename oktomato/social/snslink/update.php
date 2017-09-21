<?php
if (!defined('OKTOMATO')) exit;

$arr_filed_idx = isset($_POST['fidx']) ? $_POST['fidx'] : null;
$arr_url = isset($_POST['url']) ? $_POST['url'] : null;

$Snslink = new Snslink();

$Snslink->setAttr('arr_filed_idx', $arr_filed_idx);
$Snslink->setAttr('arr_url', $arr_url);

try {
	if ($Snslink->update($dbh)) {
				Js::LocationReplace('수정되었습니다.', '?at=list', 'parent');
	}else {
		throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
	}
}
catch(Exception $e) {
	// echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Snslink = null;
unset($dbh);
unset($Snslink);
?>