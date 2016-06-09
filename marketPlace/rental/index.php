<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/market/advice.class.php';
require ROOT.'lib/class/member/login.class.php';
//require ROOT.'lib/include/controler.inc.php';

$at = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'write';
if ($at === 'list' || $at === 'write' || $at === 'update' || $at === 'delete' || $at === 'read' || $at === 'main' || $at === 'wish') {
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
