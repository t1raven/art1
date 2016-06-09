<?php
if (!defined('OKTOMATO')) exit;

$total = 0;
$list = null;

$goods_medium = isset($_GET['medium']) ?  Xss::chkXSS($_GET['medium']) : null;
$goods_subject = isset($_GET['subject']) ?  Xss::chkXSS($_GET['subject']) : null;
$goods_size = isset($_GET['size']) ?  Xss::chkXSS($_GET['size']) : null;
$goods_color = isset($_GET['color']) ?  Xss::chkXSS($_GET['color']) : null;
$goods_lental_state = isset($_GET['rental_state']) ?  Xss::chkXSS($_GET['rental_state']) : null;
$sold_out_state = isset($_GET['sold_state']) ?  Xss::chkXSS($_GET['sold_state']) : null;
$chkartist = isset($_GET['chkartist']) ?  Xss::chkXSS($_GET['chkartist']) : null;
$chkartwork = isset($_GET['chkartwork']) ?  Xss::chkXSS($_GET['chkartwork']) : null;
$kword = isset($_GET['kword']) ?  Xss::chkXSS($_GET['kword']) : null;
$goods_sell_price = isset($_GET['price']) ?  Xss::chkXSS($_GET['price']) : null;

if (is_numeric($goods_medium) || is_numeric($goods_subject) || is_numeric($goods_size) || is_numeric($goods_color) || is_numeric($goods_sell_price)|| !empty($goods_lental_state) || !empty($sold_out_state) ||!empty($chkartist) || !empty($chkartwork))
{
	$Search = new Search();
	$Search->setAttr('goods_medium', $goods_medium);
	$Search->setAttr('goods_subject', $goods_subject);
	$Search->setAttr('goods_size', $goods_size);
	$Search->setAttr('goods_color', $goods_color);
	$Search->setAttr('goods_lental_state', $goods_lental_state);
	$Search->setAttr('sold_out_state', $sold_out_state);
	$Search->setAttr('chkartist', $chkartist);
	$Search->setAttr('chkartwork', $chkartwork);
	$Search->setAttr('kword', $kword);
	$Search->setAttr('goods_sell_price', $goods_sell_price);

	$list = $Search->getList($dbh);
	$total = (is_array($list)) ? count($list) : $total;
}


require('skin/basic/list.head.skin.php');

if (is_array($list) && count($list) > 0) {
	foreach($list as $row) {
		include('skin/basic/list.body.skin.php');
	}
}
else {
	echo '<li class="w100"><div class="no_data"><p>Sorry, no results found.</p><p>Please try again with some different keywords. </p></div></li>';
}

require('skin/basic/list.foot.skin.php');


$dbh = null;
$list = null;
$Search = null;
unset($dbh);
unset($list);
unset($Search);
?>