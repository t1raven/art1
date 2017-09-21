<?php
if (!defined('OKTOMATO')) exit;

$id = isset($_GET['id']) ? Xss::chkXSS($_GET['id']) : null;
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$type = isset($_GET['type']) ? Xss::chkXSS($_GET['type']) : null;
$section = isset($_GET['section']) ? Xss::chkXSS($_GET['section']) : null;
$goodsIdx = isset($_GET['goods_idx']) ? Xss::chkXSS($_GET['goods_idx']) : null;


$main = new Main();

$row = $main->getContentEdit($dbh, $idx);
$rowM = $main->getMarketEdit($dbh, $goodsIdx);

require('skin/write.skin.php');


$dbh = null;
$main = null;
unset($dbh);
unset($main);