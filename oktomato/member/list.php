<?php
if (!defined('OKTOMATO')) exit;

$word = isset($_GET['word']) ? $_GET['word'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$orders = isset($_GET['orders']) ? (int)$_GET['orders'] : NULL; // 0:주문이력없음, 1:주문이력있음
$newsletter = isset($_GET['newsletter']) ? (int)$_GET['newsletter'] : NULL; // 0:뉴스레터없음, 1:뉴스레터있음
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

echo $orders;
$params = 'st='.$st.'&word='.$word.'&sort='.$sort.'&od='.$od.'&sz='.$sz.'&bdate='.$bdate.'&edate='.$edate.'&orders='.$orders.'&newsletter='.$newsletter ;

$Member = new Member();
$Member->setAttr("page", $page);
$Member->setAttr("sz", $sz);
$Member->setAttr("word", $word);
$Member->setAttr("bdate", $bdate);
$Member->setAttr("edate", $edate);
$Member->setAttr("sort", $sort);
$Member->setAttr("od", $od);
$Member->setAttr("orders", $orders);
$Member->setAttr("newsletter", $newsletter);

$tmp = $Member->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//$total_all_cnt = $tmp[2];

//echo 'total_cnt :'. $total_cnt;
//$total_cnt = sizeof($list);

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

$Member = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Member);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();

exit;
?>
