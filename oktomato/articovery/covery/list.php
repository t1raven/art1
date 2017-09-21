<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;

$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
//$params = ($sz > 10) ? 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od;
$params = ($sz > 10) ? 'st='.$st.'&nm='.$nm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm.'&sort='.$sort.'&od='.$od;

$Covery = new Covery();
$Covery->setAttr("page", $page);
$Covery->setAttr("sz", $sz);
$Covery->setAttr("st", $st);
$Covery->setAttr("nm", $nm);

$Covery->setAttr("bdate", $bdate);
$Covery->setAttr("edate", $edate);
$Covery->setAttr("sort", $sort);
$Covery->setAttr("od", $od);

$tmp = $Covery->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;
//echo print_r($list);

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

require('skin/basic/list.head.skin.php');
foreach($list as $row) {
	if ($row['display_state'] === 'Y') {
		$sHtmlClass = 'blue';
		$sDisplay = '노출';
	}
	else {
		$sHtmlClass = 'red';
		$sDisplay = '비노출';
	}

	include('skin/basic/list.body.skin.php');
	$PAGE_UNCOUNT --;
	$idCnt++;
}
require('skin/basic/list.foot.skin.php');

$Covery = null;
$tmp = null;
$list = null;
$dbh = null;

unset($Covery);
unset($tmp);
unset($list);
unset($dbh);
?>