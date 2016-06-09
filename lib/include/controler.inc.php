<?php
if (!defined('OKTOMATO')) exit;

$at = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'list';

if (in_array($at, $aCTL)) {
	if (file_exists($at.SOURCE_EXT)) {
		include $at.SOURCE_EXT;
	}
	else {
		//header('Location: /');
		header('Location:/notfound.html');
		exit;
	}
}
else {
	header('Location:/notfound.html');
	exit;
}
