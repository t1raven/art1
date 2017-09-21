<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$params = ($sz > 10) ? '&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&sort='.$sort.'&od='.$od;

$Event = new Event();
$Event->setAttr("page", $page);
$Event->setAttr("sz", $sz);
$Event->setAttr("sort", $sort);
$Event->setAttr("od", $od);

$tmp = $Event->getList($dbh);
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



require 'skin/basic/list.head.skin.php';

foreach($list as $row) {
	if ($row['evt_display_state'] === 'Y') {
		$sHtmlClass = 'blue';
		$sDisplay = '노출';
	}
	else {
		$sHtmlClass = 'red';
		$sDisplay = '비노출';
	}

	include 'skin/basic/list.body.skin.php';
	--$PAGE_UNCOUNT;
	++$idCnt;
}

require 'skin/basic/list.foot.skin.php';

$Event = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Event);
unset($tmp);
unset($list);
unset($dbh);
?>