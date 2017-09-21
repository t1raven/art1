<?php
if (!defined('OKTOMATO')) exit;

$rental_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$gn = isset($_GET['gnm']) ? $_GET['gnm'] : null;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$answer = isset($_GET['answer']) ? $_GET['answer'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

//$params = ($sz > 10) ? 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od;
//$params = ($sz > 10) ? 'st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od;
$params = ($sz > 10) ? 'st='.$st.'&word='.$word.'&sort='.$sort.'&od='.$od.'&sz='.$sz.'&bdate='.$bdate.'&edate='.$edate : 
									'at='.$at.'&st='.$st.'&word='.$word.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate;


$Rental = new Rental();
$Rental->setAttr("rental_idx", $rental_idx);

try {
	if (!$Rental->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}

if ($Rental->attr['request_status']) {
	$request_status_on = '';
	$request_status_off = 'checked=\'\'';
} else {
	$request_status_on = 'checked=\'\'';
	$request_status_off = '';
}

require 'skin/basic/read.head.skin.php';
require 'skin/basic/read.body.skin.php';
require 'skin/basic/read.foot.skin.php';

$Rental = null;
$dbh = null;
unset($Rental);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>