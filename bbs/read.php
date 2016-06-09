<?php
//include_once('skin/basic/read-body-skin.php');
/*
$bbs_idx = setIsset($_GET['idx'], null);
$bbs_code = setIsset($_GET['code'], null);
$page = setIsset($_GET['page'], 1);
$list_size = 1;
$search_type = setIsset($_GET['st'], 0);
$word = setIsset($_GET['word'], '');
$category = setIsset($_GET['category'], null);
*/
$bbs_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$bbs_code = isset($_GET['code']) ? $_GET['code'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$search_type = isset($_GET['st']) ? $_GET['st'] : 0;
$word = isset($_GET['word']) ? $_GET['word'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : 10;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$list_size = 1;

$params = '&at=read&idx='.$bbs_idx;
//$editParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&st='.$search_type.'&word='.$word.'&category='.$category.'&mode=edit';
//$replyParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&mode=reply';

$cook_bbs_view =  isset($_COOKIE['cook_bbs_view']) ? Xss::chkXSS($_COOKIE['cook_bbs_view']) : null;
if ($cook_bbs_view){ //페이지 뷰 카운팅을 위해 쿠키저장
	$temp = explode(",",$cook_bbs_view);
	if ( !in_array($bbs_idx,$temp) ) { // 배열에 번호가 없을경우
		setcookie('cook_bbs_view',$_COOKIE['cook_bbs_view'].','.$bbs_idx,time()+86400);
		$read_count = true ;
	}else{
		$read_count = false ;
	}
}else{
	setcookie('cook_bbs_view',$bbs_idx,time()+86400);
	$read_count = true ;
}


$Bbs = new Bbs();
$Bbs->setAttr("bbs_idx", $bbs_idx);
$Bbs->setAttr("bbs_code", $bbs_code);
$Bbs->setAttr("bbs_category", $category);
$Bbs->setAttr("read_count", $read_count);

$aAttachFile = '';

try {
	if (!$Bbs->getCommunityRead($dbh)) {
		 throw new Exception("게시물이 존재하지 않습니다.");
	}

	$aAttachFile = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code, 2);
}
catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}

if (!empty($Bbs->attr['email'])) {
	$aWriter = explode('@', $Bbs->attr['email']);
	$sWriter = $aWriter[0];
}
else {
	$sWriter = null;
}

//include_once('skin/community/read-skin.php');
include_once('skin/community/read.head.skin.php');


//코멘트 처리 S
$list_size = 10 ;

$Bbs->setAttr("page", $page);
$Bbs->setAttr("list_size",$list_size);

$tmp_com = $Bbs->getListComment($dbh);
$list_com = $tmp_com[0];
$total_cnt = $tmp_com[1];

##-- 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $list_size ; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);



include_once('skin/community/comment.head.skin.php');
//exit;

foreach($list_com as $row_com){

	$Bbs->setAttr("comment_group", $row_com['comment_group']);
	//$Bbs->setAttr("comment_group", 2);
	$tmp_com_re = $Bbs->getListCommentRe($dbh);
	$list_com_re = $tmp_com_re[0];
	$total_cnt_com_re = $tmp_com_re[1];
	$list_count= count($list_com_re);

	include('skin/community/comment.body.skin.php');
	$PAGE_UNCOUNT --;
}

include_once('skin/community/comment.foot.skin.php');
//코멘트 처리 E

include_once('skin/community/read.foot.skin.php');
?>

