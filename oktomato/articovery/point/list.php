<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? LIB_LIB::CkSearch($_GET['nm']) : null; // 작가명
$bdate = isset($_GET['bdate']) ? LIB_LIB::CkSearch($_GET['bdate']) : null;
$edate = isset($_GET['edate']) ? LIB_LIB::CkSearch($_GET['edate']) : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
//$params = 'st='.$st.'&nm='.$nm;
$params = ($sz > 10) ? 'st='.$st.'&nm='.$nm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&sort='.$sort.'&od='.$od;
$paramsExcel = '?at=excel_download&sz=&st='.$st.'&nm='.$nm.'&bdate='.$bdate.'&edate='.$edate.'&sort='.$sort.'&od='.$od;

$Point = new Point();
$Point->setAttr('page', $page);
$Point->setAttr('sz', $sz);
$Point->setAttr('st', $st);
$Point->setAttr('nm', $nm);
$Point->setAttr('bdate', $bdate);
$Point->setAttr('edate', $edate);
$Point->setAttr('sort', $sort);
$Point->setAttr('od', $od);

$tmp = $Point->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);

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

	$score = $Point->getScoreSum($dbh, $row['covery_idx'], $row['point_idx']);

	if (is_array($score) && count($score) > 0) {
		$expertSum = (!empty($score['expert_sum'])) ? $score['expert_sum'] : 0;
		$memberSum = (!empty($score['member_sum'])) ? $score['member_sum'] : 0;
	}
	else {
		$expertSum = 0;
		$memberSum = 0;
	}

	include('skin/basic/list.body.skin.php');
	$PAGE_UNCOUNT --;
	$idCnt++;
}
require('skin/basic/list.foot.skin.php');

$Point = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Point);
unset($tmp);
unset($list);
unset($dbh);
