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


//$params = 'at='.$at.'&st='.$search_type.'&word='.$word.'&category='.$category;
$readParams = 'at=read&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&st1='.$st1.'&st2='.$st2.'&nm='.$nm.'&tel='.$tel.'&eml='.$eml ;

//$params = 'at='.$at.'&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&word='.$word ;
//$params = 'at=read&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&st1='.$st1.'&st2='.$st2.'&nm='.$nm.'&tel='.$tel.'&eml='.$eml ;

$params = ($sz > 10) ? 'st='.$st.'&word='.$word.'&sort='.$sort.'&od='.$od.'&sz='.$sz.'&bdate='.$bdate.'&edate='.$edate : 
									'at='.$at.'&word='.$word.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate;



$Member = new Member();
$Member->setAttr("word", $word);
$Member->setAttr("page", $page);
$Member->setAttr("sz", $sz);
$Member->setAttr("bdate", $bdate);
$Member->setAttr("edate", $edate);
$Member->setAttr("sort", $sort);
$Member->setAttr("od", $od);
$tmp = $Member->getNewsletterList($dbh);
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

$Member = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Member);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>