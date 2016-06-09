<?php
if (!defined('OKTOMATO')) exit;

	$word = isset($_GET['word']) ? $_GET['word'] : null;
/*
$Newstype = new Newstype();
$Newstype->setAttr("news_category_idx", $news_category_idx);

try {
	if (!$Newstype->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	//JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	//echo $e->getMessage() ;
	exit;
}
$cate = $Newstype->attr['news_category_idx'];
$news_skin_type = $Newstype->attr['news_skin_type'];
$news_category_name = $Newstype->attr['news_category_name'];
//echo ("news_skin_type : $news_skin_type <br>");
//echo ("cate : $cate <br>");
*/
require('skin/'.$news_skin_type.'/list.head.skin.php');

?>