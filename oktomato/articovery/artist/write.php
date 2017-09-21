<?php
if (!defined('OKTOMATO')) exit;

$artist_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Artist = new Artist();
$Artist->setAttr('artist_idx', $artist_idx);

$aArticovery = $Artist->getArticovery($dbh);

if (!is_null($artist_idx) && is_int($artist_idx)) {
	$Artist->getEdit($dbh);
}
else {
	$Artist->attr['display_state'] = 'Y';
}

include 'skin/basic/write.skin.php';

function numberOrdering($val) {
	switch($val) {
		case 1 : return 'st'; break;
		case 2 : return 'nd'; break;
		case 3 : return 'rd'; break;
		case 4 || 5: return 'th'; break;
	}
}

$Artist = null;
$dbh = null;
unset($Artist);
unset($dbh);
?>