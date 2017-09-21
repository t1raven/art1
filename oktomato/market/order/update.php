<?php
if (!defined('OKTOMATO')) exit;

$ord_nbr = isset($_POST['order']) ? Xss::chkXSS($_POST['order']) : null;
$delivery_company = isset($_POST['delivery_company']) ? Xss::chkXSS($_POST['delivery_company']) : null;
$delivery_nbr = isset($_POST['delivery_nbr']) ? Xss::chkXSS($_POST['delivery_nbr']) : null;
$tran_state = isset($_POST['tran_state']) ? Xss::chkXSS($_POST['tran_state']) : null;

$Order = new Order();
$Order->setAttr('ord_nbr', $ord_nbr);
$Order->setAttr('delivery_company', $delivery_company);
$Order->setAttr('delivery_nbr', $delivery_nbr);
$Order->setAttr('tran_state', $tran_state);
$Order->setAttr('log_content', '관리자');


try {
	if ($at === 'update' && !empty($ord_nbr) && strlen($ord_nbr) === 14 && !empty($delivery_company) && !empty($delivery_nbr) && empty($tran_state)) {
		if ($Order->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
				throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	elseif ($at === 'update' && !empty($ord_nbr) && strlen($ord_nbr) === 14 && !empty($tran_state)) {
		$aResult = $Order->insertLog($dbh);
		if ($aResult[0]) {
			echo '{"cnt":1, "date":"'.$aResult[1].'"}';
		}
		else {
			echo '{"cnt":1, "date":"'.$aResult[1].'"}';
		}
	}
}
catch(Exception $e) {
	JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
}

setFree();

function setFree() {
	$dbh = null;
	$Order = null;
	unset($dbh);
	unset($Order);
}
?>