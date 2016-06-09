<?php
if (!defined('OKTOMATO')) exit;

$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : NULL;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$params = '';

$Advice = new Advice();
$Advice->setAttr("page", $page);
$Advice->setAttr("sz", $sz);
$Advice->setAttr("user_idx", $user_idx);
$tmp = $Advice->getListFront($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

require('skin/basic/list.head.skin.php');

foreach($list as $row) { 
	if ($row['request_status']) {
		$request_status = ' fc_answer ';
		$request_status_text = ' 답변완료 ';
	} else {
		$request_status = 'fc_noanswer';
		$request_status_text = ' 답변대기 ';
	}
	if ($row['request_type'] == 'rental') {
		$request_type_text = '렌탈상담';
	}elseif($row['request_type'] == 'advice') {
		$request_type_text = '작품상담';
	}

	include('skin/basic/list.body.skin.php');

	$request_status ='';
	$request_status_text = '';
	$request_type_text = '';

	$PAGE_UNCOUNT --;
}
require('skin/basic/list.foot.skin.php');

$Advice = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Advice);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>