<?php
if (!defined('OKTOMATO')) exit;

$word = isset($_GET['word']) ? $_GET['word'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
$cfm = isset($_GET['cfm']) ? $_GET['cfm'] : null; 

$params = ($sz > 10) ? 'st='.$st.'&word='.$word.'&sort='.$sort.'&od='.$od.'&sz='.$sz.'&bdate='.$bdate.'&edate='.$edate.'&cfm='.$cfm : 
									'at='.$at.'&word='.$word.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&cfm='.$cfm ;


$Exhibition = new Exhibition();
$Exhibition->setAttr("word", $word);
$Exhibition->setAttr("page", $page);
$Exhibition->setAttr("sz", $sz);
$Exhibition->setAttr("bdate", $bdate);
$Exhibition->setAttr("edate", $edate);
$Exhibition->setAttr("sort", $sort);
$Exhibition->setAttr("od", $od);
$Exhibition->setAttr("cfm", $cfm);
$tmp = $Exhibition->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_all_cnt = $tmp[2];


// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

require('skin/basic/list.head.skin.php');

foreach($list as $row) { 
	//echo('<tr><td>앙</td></tr>');
	include('skin/basic/list.body.skin.php');

	$PAGE_UNCOUNT --;
}
require('skin/basic/list.foot.skin.php');

$Exhibition = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Exhibition);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>

