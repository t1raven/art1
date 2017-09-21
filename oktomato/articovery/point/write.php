<?php
if (!defined('OKTOMATO')) exit;

$point_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;

$Point = new Point();
$Point->setAttr('point_idx', $point_idx);
$aArticovery = $Point->getArticovery($dbh);

if (!empty($point_idx)) {
	$Point->getEdit($dbh);
}
else {
	$Point->attr['display_state'] = 'Y';
}

include('skin/basic/write.skin.php');

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
