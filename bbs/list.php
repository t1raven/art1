<?php
if (!defined('OKTOMATO')) exit;

$at = isset($_GET['at']) ? Xss::chkXSS($_GET['at']) : null;
$bbs_code = isset($_GET['code']) ? Xss::chkXSS($_GET['code']) : null;
$page = isset($_GET['page']) ? Xss::chkXSS((int)$_GET['page']) : 1;
$search_type = isset($_GET['st']) ? Xss::chkXSS((int)$_GET['st']) : 0;
$word = isset($_GET['word']) ? Xss::chkXSS($_GET['word']) : null;
$category = isset($_GET['category']) ? Xss::chkXSS($_GET['category']) : 10;
$subm = isset($_GET['subm']) ? Xss::chkXSS($_GET['subm']) : null;

$list_size = 20;

//$word = isset($_GET['word']) ? htmlspecialchars($_GET['word']) : null;
//$word = isset($word) ? Str_replace('\'','&#39;',Xss::chkXSS($word)) : null;

$params = 'at='.$at.'&code='.$bbs_code.'&word='.$word.'&category='.$category;



//echo "<br> word : $word ";
//exit;
/*
echo "<br>at:$at";
echo "<br>bbs_code:$bbs_code";
echo "<br>page:$page";
echo "<br>list_size:$list_size";
echo "<br>search_type:$search_type";
echo "<br>word:$word";
echo "<br>category:$category";
*/
$Bbs = new Bbs();
$Bbs->setAttr("bbs_code", $bbs_code);
$Bbs->setAttr("page", $page);
$Bbs->setAttr("list_size", $list_size);
$Bbs->setAttr("search_type", $search_type);
$Bbs->setAttr("word", $word);
$Bbs->setAttr("category", $category);
$tmp = $Bbs->getCommunityList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;
//echo print_r($list);


##-- 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = 20; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);


require('skin/community/list.head.skin.php');
foreach($list as $row){

	$comment_count = ( $row['comment_count'] > 0 ) ? '('.$row['comment_count'].')': NULL ;

	include('skin/community/list.body.skin.php');
	$PAGE_UNCOUNT --;
}
require('skin/community/list.foot.skin.php');

$Bbs = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Bbs);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>
