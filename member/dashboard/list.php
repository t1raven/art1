<?php
if (!defined('OKTOMATO')) exit;

//로그인 체크후 사용 가능
if( $arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"])) ){
	$user_level_code = $arr_user['user_level_code']; 
	$user_idx = $arr_user['user_idx']; 
//	echo $user_idx .'<br>';
}else{
	exit;
}

$DashBoard = new DashBoard();
$addressList = $DashBoard->getAddressList($dbh);
$wishList = $DashBoard->getWishList($dbh);
$orderList = $DashBoard->getMyAccountOrderList($dbh);

$Member = new Member();
$Member->setAttr("user_idx", $user_idx);

$Advice = new Advice();
$Advice->setAttr("page", 1);
$Advice->setAttr("sz", 3);
$Advice->setAttr("user_idx", $user_idx);
$adviceList = $Advice->getListFront($dbh)[0];

require('skin/basic/list.head.skin.php');
require('skin/basic/list.body.skin.php');
require('skin/basic/list.foot.skin.php');

$dbh = null;
$DashBoard = null;
$Member = null;
$orderList = null;
$wishList = null;
$addressList = null;

unset($dbh);
unset($orderList);
unset($Member);
unset($wishList);
unset($addressList);
unset($DashBoard);
?>