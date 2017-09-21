<?php
if (!defined('OKTOMATO')) exit;

$ord_nbr = isset($_GET['ord']) ? $_GET['ord'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Order = new Order();
$Order->setAttr('ord_nbr', $ord_nbr);

if (!is_null($ord_nbr)) {
	$Order->getOrder($dbh);
	$orderInfo = $Order->getOrderInfo($dbh);
	$aCreateDate = $Order->getOrderTranState($dbh);
}
else {

}

$tran_state = (int)$Order->attr['tran_state'];

If ($tran_state > 5) {
	$msg = '이 주문건은 현재 '.$aTranStateName[$tran_state].' 상태입니다.';
}
else {
	$msg = '이 주문건을 ';
}

include('skin/basic/write.skin.php');

$orderInfo = null;
$Order = null;
$dbh = null;

unset($orderInfo);
unset($Order);
unset($dbh);
?>