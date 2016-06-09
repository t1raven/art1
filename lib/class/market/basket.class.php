<?php
class Basket
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
			if (gettype($this->attr[$key]) === 'string') {
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


	function insert($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$qty = $this->getAddslashes('order_cnt');
			$limited_nbr = (!empty($this->getAddslashes('limited_nbr'))) ? $this->getAddslashes('limited_nbr') : null;

			$sql = 'INSERT INTO basket(goods_idx, user_idx, qty, limited_nbr) VALUES (:goods_idx, :user_idx, :qty, :limited_nbr)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':qty', $qty, PDO::PARAM_INT, 1);
			$stmt->bindParam(':limited_nbr', $limited_nbr, PDO::PARAM_STR, 5);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function update($dbh) {
		try {
			$basket_idx = $this->getAddslashes('basket_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$qty = $this->getAddslashes('order_cnt');
			$sql = 'UPDATE basket SET qty = :qty WHERE basket_idx = :basket_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':qty', $qty, PDO::PARAM_INT, 1);
			$stmt->bindParam(':basket_idx', $basket_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 1);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function updateMatchGoods($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'UPDATE basket SET qty = qty + 1 WHERE goods_idx = :goods_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 1);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}



	function delete($dbh) {
		try {
			/*
			$basket_idx = $this->getAddslashes('basket_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$sql = 'DELETE FROM basket WHERE basket_idx = :basket_idx AND user_idx = :user_idx';
			*/

			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM basket WHERE goods_idx = :goods_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			/*
			$basket_idx = $this->getAddslashes('basket_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$sql = 'DELETE FROM basket WHERE basket_idx IN ('.implode(',', $basket_idx).') AND user_idx = :user_idx';
			*/
			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM basket WHERE goods_idx = :goods_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getList($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);

			$sql = ' SELECT a.basket_idx, a.goods_idx, SUM(a.qty) AS qty, b.goods_name, b.goods_list_img, b.goods_sell_price,
									(SELECT artist_name FROM artist_info WHERE artist_idx = b.artist_idx) AS artist_name, b.category_idx, b.is_rental
						FROM basket a INNER JOIN goods b ON a.goods_idx = b.goods_idx
						WHERE user_idx = :user_idx
						GROUP BY a.goods_idx
						ORDER BY a.basket_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
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

	function getEdit($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'SELECT
									a.goods_idx, a.artist_idx, a.goods_name, a.goods_make_year, a.goods_make_type,
									a.goods_width, a.goods_depth, a.goods_height, a.goods_sell_price, a.goods_description, a.goods_material, a.goods_display,
									a.goods_cnt_type, a.goods_cnt, a.goods_list_img,
									a.sold_out_state, a.del_state, b.artist_name
						FROM	goods a
						INNER JOIN artist_info b ON a.artist_idx = b.artist_idx
						WHERE a.goods_idx = :goods_idx and category_idx = 2';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				//var_dump($row);
				foreach($row as $key => $val) {
					//if (is_numeric($val)) $row[$key] = $val + 0;
					$this->setAttr($key, $val);
				}
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 상품(작품)목록 이미지 파일 가져오기
	function getGoodsListImgInfo($dbh, $goods_idx) {
		try {
			$sql = 'SELECT goods_list_img FROM goods WHERE goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 추가 첨부 이미지 파일 정보 가져오기
	function getFileInfo($dbh, $goods_idx) {
		try {
			//$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'SELECT img_idx, goods_idx, goods_img FROM goods_add_img WHERE goods_idx = :goods_idx ORDER BY  img_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

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

	// 상품 상태 검사
	function chkGoodsStatus($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'SELECT category_idx, goods_display, sold_out_state, goods_cnt_type, goods_cnt, order_min_cnt, order_max_cnt, del_state FROM goods WHERE goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 장바구니 존재 여부 검사
	function getExistCnt($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			//$user_idx = $this->getAddslashes('user_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);

			$sql = 'SELECT count(basket_idx) FROM basket WHERE goods_idx = :goods_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return null;
			}

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 위시에 넣기
	function insertWish($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);

			if (self::isExistWish($dbh) === 0) {
				$sql = 'INSERT INTO goods_wish (user_idx, goods_idx) VALUES (:user_idx, :goods_idx)';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 위시에 존재하는지 여부
	function isExistWish($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);

			$sql = 'SELECT COUNT(user_idx) FROM goods_wish WHERE user_idx = :user_idx AND goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 바비인형 에디션 넘버 검사
	function chkEditionNumberCnt($dbh) {
		try {
			$limited_nbr = $this->getAddslashes('limited_nbr');
			$sql = 'SELECT COUNT(info_idx) FROM orders_info WHERE limited_nbr = :limited_nbr';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':limited_nbr', $limited_nbr, PDO::PARAM_STR, 3);

			if ($stmt->execute()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}






}
?>