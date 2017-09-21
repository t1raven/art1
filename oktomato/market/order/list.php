<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$gnm = isset($_GET['gnm']) ? $_GET['gnm'] : null;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$tstate = isset($_GET['tstate']) ? $_GET['tstate'] : 0;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

//$params = ($sz > 10) ? 'at='.$at.'&st='.$st.'&nm='.$nm.'&gnm='.$gnm.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&gnm='.$gnm.'&sort='.$sort.'&od='.$od;
$params = ($sz > 10) ? 'st='.$st.'&gnm='.$gnm.'&nm='.$nm.'&tstate='.$tstate.'&sort='.$sort.'&od='.$od.'&sz='.$sz : 'at='.$at.'&st='.$st.'&nm='.$nm.'&gnm='.$gnm.'&sort='.$sort.'&od='.$od;

$Order = new Order();
$Order->setAttr("page", $page);
$Order->setAttr("sz", $sz);
$Order->setAttr("st", $st);
$Order->setAttr("gnm", $gnm);
$Order->setAttr("nm", $nm);
$Order->setAttr("tstate", $tstate);
$Order->setAttr("bdate", $bdate);
$Order->setAttr("edate", $edate);
$Order->setAttr("sort", $sort);
$Order->setAttr("od", $od);

$tmp = $Order->getList($dbh);
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
	if ($row['tran_state'] === '1') {
		$sClass = 'fc1'; // 주문접수
		$tranState = '주문 접수';
	}
	elseif ($row['tran_state'] === '2') {
		$sClass = 'fc1'; // 입금완료
		$tranState = '입금 완료';
	}
	elseif ($row['tran_state'] === '3') {
		$sClass = 'fc1'; // 상품준비
		$tranState = '상품 준비';
	}
	elseif ($row['tran_state'] === '4') {
		$sClass = 'fc_blue'; // 배송 중
		$tranState = '배송 중';
	}
	elseif ($row['tran_state'] === '5') {
		$sClass = 'fc_red'; // 배송 완료
		$tranState = '배송 완료';
	}

	include('skin/basic/list.body.skin.php');
	$PAGE_UNCOUNT --;
	$idCnt++;
}
require('skin/basic/list.foot.skin.php');

$Order = null;
$tmp = null;
$list = null;
$dbh = null;

unset($Order);
unset($tmp);
unset($list);
unset($dbh);
?>