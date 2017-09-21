<?php
if (!defined('OKTOMATO')) exit;

$word = isset($_GET['word']) ? $_GET['word'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:발송일순 , 1:제목순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

//$readParams = 'at=read&word='.$word.'&bdate='.$bdate.'&edate='.$edate.'&sort='.$sort.'&od='.$od.'&sz='.$sz;
$params = ($sz > 10) ? '&word='.urlencode($word).'&sort='.urlencode($sort).'&od='.urlencode($od).'&bdate='.urlencode($bdate).'&edate='.urlencode($edate).'&sz='.urlencode($sz) : 'at='.urlencode($at).'&word='.urlencode($word).'&sort='.urlencode($sort).'&od='.urlencode($od).'&bdate='.urlencode($bdate).'&edate='.urlencode($edate);

$sendmail = new Sendmail();
$sendmail->setAttr("word", $word);
$sendmail->setAttr("page", $page);
$sendmail->setAttr("sz", $sz);
$sendmail->setAttr("bdate", $bdate);
$sendmail->setAttr("edate", $edate);
$sendmail->setAttr("sort", $sort);
$sendmail->setAttr("od", $od);
$tmp = $sendmail->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

include 'skin/basic/list.skin.php';

$sendmail = null;
$dbh = null;
$tmp = null;
$list = null;
unset($sendmail);
unset($dbh);
unset($tmp);
unset($list);

if (gc_enabled()) gc_collect_cycles();
