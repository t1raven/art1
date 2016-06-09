<?php
if (!defined('OKTOMATO')) exit;

$news_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$word = isset($_GET['word']) ? Xss::chkXSS($_GET['word']) : null;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10 ;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$cook_news_view =  isset($_COOKIE['cook_news_view']) ? Xss::chkXSS($_COOKIE['cook_news_view']) : null;
$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : 1; ; //view page 에서 목록으로를 눌렀을때 처리를 위한 변수
$at_tmp = isset($_GET['at_tmp']) ? Xss::chkXSS($_GET['at_tmp']) : null; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수

$readParams = 'page='.$page.'&at=read&subm='.$subm.'&cate='.$cate.'&word='.$word ;

$read_count = false;

if ($cook_news_view){ //페이지 뷰 카운팅을 위해 쿠키저장
	$temp = explode(",",$cook_news_view);
	if ( !in_array($news_idx,$temp) ) { // 배열에 번호가 없을경우
		setcookie('cook_news_view',$_COOKIE['cook_news_view'].','.$news_idx,time()+86400);
		$read_count = true;
	}else{
		$read_count = false ;
	}

}else{
	setcookie('cook_news_view',$news_idx,time()+86400);
	$read_count = true;
}




$News = new News();
$News->setAttr("news_idx", $news_idx);
$News->setAttr("news_category_idx", $cate);
$News->setAttr("read_count", $read_count);


try {
	if (!$News->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}


/*
$snsTitle = $News->attr['reporter_name'];
$snsImg = $PUBLIC['HOME'].newsUploadPath.$row[0]['up_file_name'];
$snsUrl = $PUBLIC['HOME'].$_SERVER['PHP_SELF'];
$snsDescription = str_replace("\r\n", '', strip_tags($row[0]['img_comment']));
*/

require 'skin/common/read.head.skin.php';

$tmp = $News->getListParagraph($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_cnt = isset($total_cnt) ? $total_cnt : 1;

foreach($list as $row) {
	include('skin/common/read.body.skin.php');
	$i=$i+1;
}
require('skin/common/read.foot.skin.php');



$News = null;
$dbh = null;
unset($News);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>