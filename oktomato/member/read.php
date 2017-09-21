<?php
if (!defined('OKTOMATO')) exit;

$at = isset($_GET['at']) ? $_GET['at']: 'read';
$user_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$word = isset($_GET['word']) ? (int)$_GET['word'] : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$tstate = isset($_GET['tstate']) ? $_GET['tstate'] : 0;

$params = 'at='.$at.'&idx='.$user_idx;



$Member = new Member();
$Member->setAttr("user_idx", $user_idx);

try {
	if (!$Member->getRead($dbh)) {
		 throw new Exception("회원정보가 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}

$newsletter_status = $Member->getNewletterStatus($dbh,$Member->attr['user_id']);
//echo('newsletter_status:'.$newsletter_status .'<br>');


// order 정보
$Order = new Order();
$Order->setAttr("page", $page);
$Order->setAttr("sz", 10);
$Order->setAttr("user_idx", $user_idx);

$tmp = $Order->getOrderListUser($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;


require('skin/basic/read.head.skin.php'); //회원정보



foreach($list as $row) {
	//include('skin/basic/list.body.skin.php');
	include('skin/basic/read.body.skin.php'); //order 정보 List
	$PAGE_UNCOUNT --;
	$idCnt++;
}

//include('skin/basic/read.body.skin.php'); //order 정보 List


require('skin/basic/read.foot.skin.php');

//추후 order 목록으로 대처
/*
$Member = new Member();
$Member->setAttr("page", $page);
$Member->setAttr("sz", $sz);
$Member->setAttr("word", $word);
$Member->setAttr("bdate", $s_date);
$Member->setAttr("edate", $l_date);
$Member->setAttr("ulevel", $u_level);
$Member->setAttr("orderby", $orderby);
$tmp = $Member->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_all_cnt = $tmp[2];

echo 'u_level: '.$u_level.'<br>';
echo 'total_all_cnt :'. $total_all_cnt.'<br>';

//회원권한 정보 호출 S
$tmp1 = $Member->getListMemberLevel($dbh);
$list_mem_level = $tmp1[0];
//회원권한 정보 호출 E

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

require('skin/basic/list.head.skin.php');

foreach($list as $row) { 
	include('skin/basic/list.body.skin.php');
	$PAGE_UNCOUNT --;
}
require('skin/basic/list.foot.skin.php');
*/

$Member = null;
$Order = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Member);
unset($Order);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();

exit;
?>
