<?php
if (!defined('OKTOMATO')) exit;

$score_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$gnm = isset($_GET['gnm']) ? $_GET['gnm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;

$Comment = new Comment();
$Comment->setAttr('score_idx', $score_idx);

if (!empty($score_idx)) {
	$Comment->getEdit($dbh);
}
else {
	$Comment->attr['display_state'] = 'Y';
}

include('skin/basic/write.skin.php');

$Comment = null;
$dbh = null;
unset($Comment);
unset($dbh);
