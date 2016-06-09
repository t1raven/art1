<?php
//echo $_SERVER['DOCUMENT_ROOT'];

require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/news.class.php';
require ROOT.'lib/class/news/newstype.class.php';
require ROOT.'lib/class/bbs/bbs.class.php';

$subm = isset($_GET['subm']) ? $_GET['subm'] : NULL ;


//뉴스 서브 메뉴 링크
$news_menu_brief = '?at=list&subm=2';
$news_menu_trend = '?at=list&subm=3';
$news_menu_people = '?at=list&subm=4';
$news_menu_world = '?at=list&subm=14';
$news_menu_trouble = '?at=list&subm=5';
$news_menu_episode = '?at=list&subm=6';
$news_menu_cardnews = '?at=list&subm=15';
$news_menu_community = '/bbs/?at=list';

//뉴스 카테고리 idx //db news_category 을 기준으로 한다.
/*
if ($subm =='brief'){
	$news_category_idx = 2;
}elseif($subm =='trend'){
	$news_category_idx = 3;
}elseif($subm =='people'){
	$news_category_idx = 4;
}elseif($subm =='world'){
	$news_category_idx = 14;
}elseif($subm =='trouble'){
	$news_category_idx = 5;
}elseif($subm =='episode'){
	$news_category_idx = 6;
}else{
	$news_category_idx = '';
}
*/


if (!empty($subm)){
	$news_category_idx = $subm;
}

if (!empty($news_category_idx)){

	$Newstype = new Newstype();
	$Newstype->setAttr("news_category_idx", $news_category_idx);

	try {
		if (!$Newstype->getRead($dbh)) {
			throw new Exception("게시물이 존재하지 않습니다.");
		}
	} catch(Exception $e) {
		$dbh = null;
		//JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
		echo $e->getMessage() ;
		exit;
	}
	$cate = $Newstype->attr['news_category_idx'];
	$news_skin_type = $Newstype->attr['news_skin_type'];
	$news_category_name = $Newstype->attr['news_category_name'];
}
	
if ($news_skin_type == 'tile' && $_REQUEST['at']=='list'){ //tile 형은  ajax 로 목록을 만듬으로 별도의 list 로 만든다.
	//echo '<script>console.log("news_skin_type : '.$news_skin_type.' ")</script>';
	require('list.tile.php');

//}elseif($_REQUEST['at']=='maintest'){
}elseif($_REQUEST['at']=='main'){
	require('skin/common/main.skin.php');

}else{
	//require ROOT.'lib/include/controler.inc.php'; //main/write/list/read/delete //.php 로 호출
	$at = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'list';
	include $at.SOURCE_EXT;
}

//require ROOT.'lib/include/controler.inc.php'; //main/write/list/read/delete //.php 로 호출
?>