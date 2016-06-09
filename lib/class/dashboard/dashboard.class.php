<?php
class DashBoard
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function __destruct() {
		$this->attr = null;
		unset($this->attr);
		if (gc_enabled()) gc_collect_cycles();
	}

	function setAttr($key, $value){
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key){
		//return addslashes($this->attr[$key]);
		//return ($this->attr[$key] == null) ? null : addslashes($this->attr[$key]);

		//if (is_null($this->attr[$key]) || $this->attr[$key] == '') {
		if (is_null($this->attr[$key])) {
			//echo "<br>$key:rtn null";
			return null;
		}
		else {
			if (gettype($this->attr[$key]) == 'string') {
				//echo "<br>$key:rtn string";
				return addslashes($this->attr[$key]);
			}
			else {
				//echo "<br>$key:rtn letter";
				return $this->attr[$key];
			}
		}
	}

	function setHtmlspecialchars($key) {
		while(list($key,$val) = each($this->attr) )
			$this->attr[$key] = htmlspecialchars($val);
	}

	// 배송 주소록 가져오기
	function getAddressList($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = ' SELECT addr_idx, user_name, user_zip, user_addr_1, user_addr_2, user_email, user_tel, default_state
						FROM member_orders_addr
						WHERE user_idx = :user_idx
						ORDER BY default_state ASC, addr_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 1);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 위시 리스트 가져오기
	function getWishList($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$goods_display = 'Y';
			$del_state = 'N';
			$sql = ' SELECT a.goods_idx, (SELECT artist_name FROM artist_info WHERE artist_idx = b.artist_idx) AS artist_name,
									b.goods_name, b.goods_sell_price, b.goods_lental_state, b.goods_cnt, b.goods_list_img, b.sold_out_state
						FROM goods_wish a
						INNER JOIN goods b ON a.goods_idx = b.goods_idx
						WHERE a.user_idx = :user_idx AND b.goods_display = :goods_display AND b.del_state = :del_state
						ORDER BY a.create_date
						LIMIT 0, 4';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 나의 주문 정보
	function getMyAccountOrderList($dbh) {
		try {
			$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
			$sql = 'SELECT ord_nbr, ord_goods, amount, create_date  FROM orders WHERE user_idx = :user_idx ORDER BY create_date DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 나의 주문 상세정보
	function getMyAccountOrderListDetail($dbh, $ord_nbr) {
		try {
			$sql = 'SELECT a.info_idx, a.goods_idx, a.goods_name, a.qty, a.settlement_price, b.goods_list_img, (SELECT artist_name FROM artist_info WHERE artist_idx = b.artist_idx) AS artist_name FROM orders_info a INNER JOIN goods b ON a.goods_idx = b.goods_idx WHERE ord_nbr = :ord_nbr';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}




}
?>