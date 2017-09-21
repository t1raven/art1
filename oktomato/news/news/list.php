<?php
if (!defined('OKTOMATO')) exit;

$cate = isset($_GET['cate']) ? $_GET['cate'] : null;
$title = isset($_GET['title']) ? $_GET['title'] : null;
$rnm = isset($_GET['rnm']) ? $_GET['rnm'] : null;
$dps = isset($_GET['dps']) ? $_GET['dps'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;


//$params = 'at='.$at.'&st='.$search_type.'&word='.$word.'&category='.$category;
$readParams = 'at=read&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&st1='.$st1.'&st2='.$st2.'&nm='.$nm.'&tel='.$tel.'&eml='.$eml ;

//$params = 'at='.$at.'&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&word='.$word ;
//$params = 'at=read&list_size='.$list_size.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate.'&st1='.$st1.'&st2='.$st2.'&nm='.$nm.'&tel='.$tel.'&eml='.$eml ;

$params = ($sz > 10) ? 'st='.$st.'&cate='.$cate.'&title='.$title.'&rnm='.$rnm.'&dps='.$dps.'&dps='.$dps.'&sort='.$sort.'&od='.$od.'&sz='.$sz.'&bdate='.$bdate.'&edate='.$edate : 
									'at='.$at.'&cate='.$cate.'&title='.$title.'&rnm='.$rnm.'&dps='.$dps.'&dps='.$dps.'&sort='.$sort.'&od='.$od.'&bdate='.$bdate.'&edate='.$edate;

$News = new News();
$News->setAttr("cate", $cate);
$News->setAttr("title", $title);
$News->setAttr("rnm", $rnm);
$News->setAttr("dps", $dps);
$News->setAttr("page", $page);
$News->setAttr("sz", $sz);
$News->setAttr("bdate", $bdate);
$News->setAttr("edate", $edate);
$News->setAttr("sort", $sort);
$News->setAttr("od", $od);
$tmp = $News->getList($dbh);
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

	if ($row['display_status'] == 'N') {
		$request_status = ' fc_red ';
		$request_status_text = '비노출';
	} else {
		$request_status = '';
		$request_status_text = '노출';
	}

	include('skin/basic/list.body.skin.php');

	$PAGE_UNCOUNT --;
	$idCnt = $idCnt + 1;
}
require('skin/basic/list.foot.skin.php');

$News = null;
$dbh = null;
$tmp = null;
$list = null;
unset($News);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>