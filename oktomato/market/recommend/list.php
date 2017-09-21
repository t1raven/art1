<?php
if (!defined('OKTOMATO')) exit;

$Recommend = new Recommend();
$list = $Recommend->getList($dbh);

include 'skin/basic/list.head.skin.php';

if (is_array($list)) {
	$i = 1;
	foreach($list as $row) {
		include 'skin/basic/list.body.skin.php';
		++$i;
	}
}

include 'skin/basic/list.foot.skin.php';

$list = null;
$dbh = null;
unset($list);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>