<?php
if (!defined('OKTOMATO')) exit;

$id = isset($_GET['id']) ? Xss::chkXSS($_GET['id']) : null;
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$type = isset($_GET['type']) ? Xss::chkXSS($_GET['type']) : null;
$section = isset($_GET['section']) ? Xss::chkXSS($_GET['section']) : null;
$exhibitionIdx = isset($_GET['exhidx']) ? Xss::chkXSS($_GET['exhidx']) : null;


$main = new Main();

$row = $main->getContentEdit($dbh, $idx);

if(!empty($row['exhibitionIdx'])) {
	$rowM = $main->getGalleriesEdit($dbh, $row['exhibitionIdx']);
} else {
	$rowM = $main->getGalleriesEdit($dbh, $exhibitionIdx);
}

require('skin/write.skin.php');


$dbh = null;
$main = null;
unset($dbh);
unset($main);