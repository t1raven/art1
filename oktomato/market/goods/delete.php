<?php
if (!defined('OKTOMATO')) exit;

$goods_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$goods_idxs = isset($_POST['idxs']) ? Xss::chkXSS($_POST['idxs']) : null;

if (!is_null($goods_idxs) && is_array($goods_idxs)) {
	$Goods = new Goods();
	$Goods->setAttr('goods_idx', $goods_idxs);

	try {
		if ($Goods->deletes($dbh)) {
			Js::LocationHref('삭제되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('삭제되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	catch(Exception $e) {
		Js::LocationHref($e->getMessage(), PHP_SELF, 'parent');
	}
}
else {
	$result = 0;

	if (!empty($goods_idx)) {
		$Goods = new Goods();
		$Goods->setAttr('goods_idx', $goods_idx);
		$result = ($Goods->delete($dbh)) ? 1 : 0;
	}

	echo '{"cnt":'.$result.'}';
}

$dbh = null;
$Goods = null;
unset($dbh);
unset($Goods);
?>