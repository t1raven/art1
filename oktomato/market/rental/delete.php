<?php
if (!defined('OKTOMATO')) exit;
// 전체 삭제
$rental_idx = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($rental_idx) && is_array($rental_idx)) {
	$Rental = new Rental();
	$Rental->setAttr('rental_idx', $rental_idx);

	try {
		if ($Rental->deletes($dbh)) {
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
$Rental = null;
unset($dbh);
unset($Rental);
?>