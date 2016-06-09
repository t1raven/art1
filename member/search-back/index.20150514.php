<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/member/member.class.php';
require ROOT.'lib/class/util/Mailsend.php';

//require ROOT.'lib/include/controler.inc.php';

$at = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'list';

$aCTL_mem = array('id_search', 'write', 'update', 'delete', 'read', 'main', 'wish', 'address');
if (in_array($at, $aCTL_mem)) {
	if (file_exists($at.SOURCE_EXT)) {
		include $at.SOURCE_EXT;
	}
	else {
		header('Location: /');
		exit;
	}
}
else {
	exit;
}
?>
