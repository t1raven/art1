<?php
if (!defined('OKTOMATO')) exit;

require(ROOT.'lib/class/market/basket.class.php');

$ord = isset($_POST['ord']) ? Xss::chkXSS($_POST['ord']) : null;
$goods_idx = isset($_POST['goods']) ? Xss::chkXSS($_POST['goods']) : null;
$basket_idx = isset($_POST['basket']) ? Xss::chkXSS($_POST['basket']) : null;
$order_cnt = isset($_POST['order_cnt']) ? Xss::chkXSS($_POST['order_cnt']) : 0;

$Basket = new Basket();
$Basket->setAttr('ord', $ord);
$Basket->setAttr('goods_idx', $goods_idx);
$Basket->setAttr('user_idx', 2);// 2 홍길동
$Basket->setAttr('order_cnt', $order_cnt);
$Basket->chkGoodsStatus($dbh);
$isExistCnt = $Basket->getExistCnt($dbh);

// 상품 미진열
if ($Basket->attr['goods_display'] === 'N') {
	setFree();
	exit;
}


// 품절상태
if ($Basket->attr['sold_out_state'] === 'Y') {
	setFree();
	exit;
}



// 수량 0
if ($Basket->attr['goods_cnt_type'] === '2' && $Basket->attr['goods_cnt'] === '0') {
	setFree();
	exit;
}

// 주문 수량이 제고량을 초과
if ($Basket->attr['goods_cnt_type'] === '2' && !empty($Basket->attr['goods_cnt'])) {
	if ((int)$order_cnt > (int)$Basket->attr['goods_cnt']) {
		setFree();
		exit;
	}
}

// 최소 주문량 검사
if ((int)$Basket->attr['order_min_cnt'] > (int)$order_cnt) {
	setFree();
	exit;
}


// 최대 주문량 검사
if ((int)$Basket->attr['order_min_cnt'] < (int)$order_cnt && (int)$Basket->attr['order_max_cnt'] > 0) {
	setFree();
	exit;
}


try {
	if ($isExistCnt > 0) {
		if ($Basket->attr['category_idx'] === '1') {
			Js::LocationReplace('이미 선택한 작품입니다.', PHP_SELF, 'parent');
			setFree();
			exit;
		}
		else {
			if ($Basket->updateMatchGoods($dbh)) {
				echo '<script>parent.cartLayer();</script>';
			}
			else {
				throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
			}
		}

		/*
		if ($at === 'update' && !empty($goods_idx) && is_int($goods_idx))
			Js::LocationReplace('수정되었습니다.', PHP_SELF, 'parent');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
		*/
	}
	else {
		if ($Basket->insert($dbh)) {
			//Js::LocationReplace('등록되었습니다.', PHP_SELF, 'parent');
			echo '<script>parent.cartLayer();</script>';
		}
		else {
			throw new Exception('등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	JS::LocationReplace($e->getMessage(), PHP_SELF, 'parent');
}

setFree();

function setFree() {
	$dbh = null;
	$Basket = null;
	unset($dbh);
	unset($Basket);
}
?>