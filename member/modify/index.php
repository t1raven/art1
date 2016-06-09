<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/member/member.class.php';
require ROOT.'lib/class/member/login.class.php';

$arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"]));
$user_idx = $arr_user['user_idx'];
$user_id = $arr_user['user_id'];
$sns_join = $arr_user['sns_join'];
//echo 'user_idx : '.$user_idx.'<br>'; 
//echo 'sns_join : '.$sns_join.'<br>'; 
//exit;
require ROOT.'lib/include/controler.inc.php';

$arr_user = null;
$user_idx = null;
?>