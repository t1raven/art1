<?php
if (!defined('OKTOMATO')) exit;

$covery_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$covery_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

// 멀티 삭제
if (!is_null($covery_idxs) && is_array($covery_idxs)) {
	$Covery = new Covery();
	$Covery->setAttr('covery_idx', $covery_idxs);
	$Covery->setAttr('del_state', 'Y');

	try {
		if ($Covery->deletes($dbh)) {
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
	if (is_numeric($covery_idx)) {
		$Covery = new Covery();
		$Covery->setAttr('covery_idx', $covery_idx);
		$Covery->setAttr('del_state', 'Y');
		$result = ($Covery->delete($dbh)) ? 1 : 0;
	}
	echo '{"cnt":'.$result.'}';
}

$Covery = null;
$dbh = null;
unset($Covery);
unset($dbh);