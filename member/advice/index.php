<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/member/login.class.php';

//�α��� üũ�� ��� ����
if( $arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"])) ){
	$user_level_code = $arr_user['user_level_code']; 
	$user_idx = $arr_user['user_idx']; 
}else{
	exit;
}

require ROOT.'lib/class/market/'.basename(__DIR__).'.class.php';
require ROOT.'lib/include/controler.inc.php';

?>