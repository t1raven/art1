<?php
if (!defined('OKTOMATO')) exit;

$id = isset($_GET['id']) ? Xss::chkXSS($_GET['id']) : null;
$idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$type = isset($_GET['type']) ? Xss::chkXSS($_GET['type']) : null;
$section = isset($_GET['section']) ? Xss::chkXSS($_GET['section']) : null;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$word = isset($_GET['word']) ? LIB_LIB::CkSearch($_GET['word']) : null; // 검색어

$params = 'at=alist&st='.$st.'&word='.$word;

$main = new Main();
$main->setAttr("page", $page);
$main->setAttr("sz", $sz);
$main->setAttr("st", $st);
$main->setAttr("word", $word);

$tmp = $main->getGalleriesList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter3($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);

require('skin/alist.skin.php');

$dbh = null;
$main = null;
unset($dbh);
unset($main);