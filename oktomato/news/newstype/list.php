<?php
if (!defined('OKTOMATO')) exit;

$Newstype = new Newstype();
$Newstype->setAttr("news_category_code", 1000000000);
$Newstype->setAttr("news_category_depth", 2);

$tmp = $Newstype->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];

/*
function setSkinType($val) {
	switch($val) {
		case 0 : return 'big'; break;
		case 1 : return 'small'; break;
		case 2 : return 'tile'; break;
		case 3 : return 'thumbnail'; break;
		case 4 : return 'gallery'; break;
	}
}
*/

function setSkinType($val) {
	switch($val) {
		case 'big' : return '0'; break;
		case 'small' : return '1'; break;
		case 'tile' : return '2'; break;
		case 'thumbnail' : return '3'; break;
		case 'gallery' : return '4'; break;
	}
}

require('skin/basic/list.head.skin.php');

$num = $total_cnt - 1;
$i = 1;
foreach($list as $row) { 

	if ($row['news_skin_type'] != 'cardnews'  ){
		include('skin/basic/list.body.skin.php');
		$num -- ;
		$i++ ;
	}
	
}
require('skin/basic/list.foot.skin.php');

$Newstype = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Newstype);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>