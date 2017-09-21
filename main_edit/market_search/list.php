<?php
if (!defined('OKTOMATO')) exit;

$id = isset($_GET['id']) ? Xss::chkXSS($_GET['id']) : null;
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$type = isset($_GET['type']) ? Xss::chkXSS($_GET['type']) : null;
$size = isset($_GET['size']) ? Xss::chkXSS($_GET['size']) : null;
$section = isset($_GET['section']) ? Xss::chkXSS($_GET['section']) : null;


require('skin/list.skin.php');

$dbh = null;
$main = null;
unset($dbh);
unset($main);