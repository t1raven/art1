<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$goods_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;

if (!empty($goods_idx) && is_numeric($goods_idx)) {
	$Wish = new Wish();
	$Wish->setAttr('goods_idx', $goods_idx);
	$result = ($Wish->delete($dbh)) ? 1 : 0;
}
echo '{"cnt":'.$result.'}';

$Wish = null;
$dbh = null;
unset($Wish);
unset($dbh);
?>