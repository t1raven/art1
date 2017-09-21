<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require(ROOT.'lib/include/chk.admin.inc.php');
require ROOT.'lib/class/admininfo/'.basename(__DIR__).'.class.php';
require ROOT.'lib/class/member/member.class.php';


if (empty($_REQUEST['at']) ){
	include 'write'.SOURCE_EXT;
}else{
	require ROOT.'lib/include/controler.inc.php';
}

?>
