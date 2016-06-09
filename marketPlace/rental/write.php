<?php
if (!defined('OKTOMATO')) exit;

//로그인 체크후 사용 가능
if( $arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"])) ){
	$user_level_code = $arr_user['user_level_code']; 
	$user_idx = $arr_user['user_idx']; 
}else{
	exit;
}

$goods_idx = isset($_GET['goods']) ? (int)$_GET['goods'] : null;

include_once('skin/basic/write.skin.php');
?>