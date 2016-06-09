<?php
if (!defined('OKTOMATO')) exit;

$Order = new Order();
$orderList = $Order->getMyAccountOrderList($dbh);

require('skin/basic/list.head.skin.php');
require('skin/basic/list.body.skin.php');
require('skin/basic/list.foot.skin.php');

$dbh = null;
$orderListDetail = null;
$orderList = null;
$Order = null;

unset($dbh);
unset($orderListDetail);
unset($orderList);
unset($Order);
?>