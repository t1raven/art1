<?php
include_once('../lib/include/global.inc.php');
include_once('../lib/class/bbs/bbs.class.php');
include_once('../lib/function/common.php');


$bbs_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;
$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;

/*
$bbs_idx = setIsset($_POST['idxs'], null);
$bbs_code = setIsset($_POST['code'], null);
*/

if (!is_null($bbs_idx)) {
	$Bbs = new Bbs();
	$Bbs->setAttr('bbs_idx', $bbs_idx);
	$Bbs->setAttr('bbs_code', $bbs_code);

	try {
		if ($Bbs->deletes($dbh)) {
			Js::LocationReplace('삭제되었습니다.', '/bbs/?at=list&code='.$bbs_code, 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationReplace($e->getMessage(), '/bbs/?at=list&code='.$bbs_code, 'parent');
	}
}

$dbh = null;
$Bbs = null;
unset($dbh);
unset($Bbs);
?>