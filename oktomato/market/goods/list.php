<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? LIB_LIB::CkSearch($_GET['nm']) : null; // 작가명
$gnm = isset($_GET['gnm']) ? LIB_LIB::CkSearch($_GET['gnm']) : null; // 작품명
$bdate = isset($_GET['bdate']) ? LIB_LIB::CkSearch($_GET['bdate']) : null;
$edate = isset($_GET['edate']) ? LIB_LIB::CkSearch($_GET['edate']) : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
$params = 'st='.$st.'&nm='.$nm.'&gnm='.$gnm;

$Goods = new Goods();
$Goods->setAttr("page", $page);
$Goods->setAttr("sz", $sz);
$Goods->setAttr("st", $st);
$Goods->setAttr("nm", $nm);
$Goods->setAttr("gnm", $gnm);
$Goods->setAttr("bdate", $bdate);
$Goods->setAttr("edate", $edate);

$tmp = $Goods->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = 10; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);



require 'skin/basic/list.head.skin.php';
foreach($list as $row) {
	include 'skin/basic/list.body.skin.php';
	$PAGE_UNCOUNT --;
	$idCnt++;
}
require 'skin/basic/list.foot.skin.php';
echo "here";
$Goods = null;
$tmp = null;
$list = null;
$dbh = null;

unset($Goods);
unset($tmp);
unset($list);
unset($dbh);
?>