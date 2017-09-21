<?php
if (!defined('OKTOMATO')) exit;

$ord_nbr = isset($_POST['ord']) ? Xss::chkXSS($_POST['ord']) : null;
$ord_nbrs = isset($_POST['ords']) ? Xss::chkXSS($_POST['ords']) : null;

// 멀티 삭제
if (!is_null($ord_nbrs) && is_array($ord_nbrs)) {
	$Order = new Order();
	$Order->setAttr('ord_nbr', $ord_nbrs);

	try {
		if ($Order->deletes($dbh)) {
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
	if (!empty($ord_nbr)) {
		$Order = new Order();
		$Order->setAttr('ord_nbr', $ord_nbr);
		$result = ($Order->delete($dbh)) ? 1 : 0;
		$dbh = null;

	}
	echo '{"cnt":'.$result.'}';
}

$Order = null;
$dbh = null;
unset($Order);
unset($dbh);
?>