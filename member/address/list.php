<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? $_POST['mode'] : null;

$Address = new Address();
$list = $Address->getList($dbh);
//$total = (is_array($list)) ? count($list) : 0;

require('skin/basic/list.head.skin.php');

if (is_array($list)) {
	foreach($list as $row) {
		include('skin/basic/list.body.skin.php');
	}
}

require('skin/basic/list.foot.skin.php');


$dbh = null;
$list = null;
$Address = null;
unset($dbh);
unset($list);
unset($Address);
?>