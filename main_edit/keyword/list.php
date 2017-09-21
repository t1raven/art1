<?php
if (!defined('OKTOMATO')) exit;

$id = isset($_GET['id']) ? Xss::chkXSS($_GET['id']) : null;
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$type = isset($_GET['type']) ? Xss::chkXSS($_GET['type']) : null;
$section = isset($_GET['section']) ? Xss::chkXSS($_GET['section']) : null;

$main = new Main();
foreach($_GET as $key => $value) {
	if (!is_array($value)) {
		$main->setAttr($key, Xss::chkXSS($value));
	}
	else {
		$$key = $value;
	}
}

$list = $main->getKeywordList($dbh);


require('skin/list.skin.php');


$dbh = null;
$main = null;
unset($dbh);
unset($main);