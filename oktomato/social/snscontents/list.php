<?php
if (!defined('OKTOMATO')) exit;

$Snslink = new Snslink();
$SnsContents = new SnsContents();

$tmp = $Snslink->getList($dbh);
$list = $tmp[0];

require('skin/basic/list.head.skin.php');

$i = 0;

foreach($list as $row) {
	//include('skin/basic/list.body.skin.php');
	include('skin/basic/list.sub.head.skin.php');

	$tmp_c = $SnsContents->getList($dbh,$row['sns_link_idx']);
	$list_c = $tmp_c[0];
	$ci= 1;
	foreach($list_c as $row_c){
		include('skin/basic/list.sub.body.skin.php');

		$ci= $ci + 1;
		$i= $i+1;
	}
	include('skin/basic/list.sub.foot.skin.php');

}
require('skin/basic/list.foot.skin.php');

$Snslink = null;
$SnsContents = null;
$dbh = null;
$list = null;
$list_c = null;
$tmp = null;
$tmp_c = null;

unset($Snslink);
unset($SnsContents);
unset($dbh);
unset($list);
unset($list_c);
unset($tmp);
unset($tmp_c);
if (gc_enabled()) gc_collect_cycles();
?>