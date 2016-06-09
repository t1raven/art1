<?php
class Order
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

	// 로그 기록
	function insertLog($dbh) {
		try {
			$result = null;
			$bTransaction = false;
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$tran_state = $this->getAddslashes('tran_state');
			$log_content = $this->getAddslashes('log_content');
			$dbh->beginTransaction();
			$sql = 'INSERT INTO orders_log(ord_nbr, tran_state, log_content) VALUES (:ord_nbr, :tran_state, :log_content)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
			$stmt->bindParam(':tran_state', $tran_state, PDO::PARAM_INT, 3);
			$stmt->bindParam(':log_content', $log_content, PDO::PARAM_STR, 50);

			if ($stmt->execute()) {
				$log_idx = $dbh->lastInsertId();
				$sql = 'SELECT tran_state FROM orders WHERE ord_nbr = :ord_nbr';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

				if ($stmt->execute()) {
					$tran_old_state = $stmt->fetchColumn();
					$sql = 'UPDATE orders SET tran_state = :tran_state, tran_old_state = :tran_old_state WHERE ord_nbr = :ord_nbr';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':tran_state', $tran_state, PDO::PARAM_INT, 3);
					$stmt->bindParam(':tran_old_state', $tran_old_state, PDO::PARAM_STR, 50);
					$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

					if ($stmt->execute()) {
						$sql = 'SELECT create_date FROM orders_log WHERE log_idx = :log_idx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':log_idx', $log_idx, PDO::PARAM_INT, 11);

						if ($stmt->execute()) {
							$bTransaction = true;
							$result = $stmt->fetchColumn();
						}
					}
				}
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return array($bTransaction, $result);
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 배송회사 및 배송 번호 넣기
	function update($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$delivery_company = $this->getAddslashes('delivery_company');
			$delivery_nbr = $this->getAddslashes('delivery_nbr');
			$sql = 'UPDATE orders SET delivery_company = :delivery_company, delivery_nbr = :delivery_nbr WHERE ord_nbr = :ord_nbr';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':delivery_company', $delivery_company, PDO::PARAM_STR, 100);
			$stmt->bindParam(':delivery_nbr', $delivery_nbr, PDO::PARAM_STR, 100);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

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



	function delete($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$del_state = 'Y';

			$sql = 'UPDATE orders SET del_state = :del_state WHERE ord_nbr = :ord_nbr';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

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

	function deletes($dbh) {
		try {
			$aOrdNbr = $this->getAddslashes('ord_nbr');
			$del_state = 'Y';
			$bTransaction = false;
			$dbh->beginTransaction();

			foreach($aOrdNbr as $ordNbr) {
				$sql = 'UPDATE orders SET del_state = :del_state WHERE ord_nbr = :ord_nbr';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
				$stmt->bindParam(':ord_nbr', $ordNbr, PDO::PARAM_STR);
				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				return false;
			}
		}
		catch(PDOExecption $e) {
			if (isset($dbh)) {
				$dbh->rollback();
				print 'Error!: ' . $e->getMessage() . '</br>';
			}
			return false;
		}
	}


	// 주문 목록 가져오기
	function getList($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$st = $this->getAddslashes('st'); // and / or
			$gnm = (!empty($this->getAddslashes('gnm'))) ? $this->getAddslashes('gnm') : null;
			$nm = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$tstate = (!empty($this->getAddslashes('tstate'))) ? $this->getAddslashes('tstate') : null;
			$category = (!empty($this->getAddslashes('category'))) ? $this->getAddslashes('category') : 1;
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			/*
			echo "<br>page:$page";
			echo "<br>sz:$sz";
			echo "<br>st:$st";
			echo "<br>gnm:".gettype($gnm);
			echo "<br>nm:".gettype($nm);
			echo "<br>tstate:".$tstate;
			echo "<br>category:".$category;
			echo "<br>bdate:".gettype($bdate);
			echo "<br>edate:".gettype($edate);
			*/

			$sql = 'CALL up_order_list (:page, :sz, :st, :gnm, :nm, :tstate, :category, :bdate, :edate, :sort, :od)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':st', $st, PDO::PARAM_INT, 1);
			$stmt->bindParam(':gnm', $gnm, PDO::PARAM_STR, 250);
			$stmt->bindParam(':nm', $nm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':tstate', $tstate, PDO::PARAM_INT, 1);
			$stmt->bindParam(':category', $category, PDO::PARAM_INT, 1);
			$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':sort', $sort, PDO::PARAM_INT, 1);
			$stmt->bindParam(':od', $od, PDO::PARAM_INT, 1);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 주문 정보 가져오기
	function getOrder($dbh) {
		try {
			$del_state = 'N';
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$sql = ' SELECT ord_nbr, ord_name, ord_email, ord_tel, rec_name, rec_email, rec_tel, rec_addr_1, rec_addr_2,  tran_state, ord_goods, amount, payment_name, delivery_company, delivery_nbr, create_date
						FROM orders
						WHERE ord_nbr = :ord_nbr AND del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					//echo "<br>$key";
					//echo "<br>$val";
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


	// 주문 상세정보
	function getOrderInfo($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$sql = ' SELECT a.info_idx, a.goods_name, a.qty, a.settlement_price, b.goods_list_img, (SELECT artist_name FROM artist_info WHERE artist_idx = b.artist_idx) AS artist_name,
									a.limited_nbr, a.limited_nbr_tmp
						FROM orders_info a INNER JOIN goods b ON a.goods_idx = b.goods_idx
						WHERE ord_nbr = :ord_nbr';
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


	// 주문 상태 정보 가져오기
	function getOrderTranState($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			for($i=1; $i<6; $i++) {
				$sql = 'SELECT create_date FROM orders_log WHERE ord_nbr = :ord_nbr AND tran_state = :tran_state ORDER BY log_idx DESC LIMIT 0, 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
				$stmt->bindParam(':tran_state', $i, PDO::PARAM_INT, 3);

				if ($stmt->execute()) {
					$aCreateDate[$i] = $stmt->fetchColumn();
				}
				else {
					$aCreateDate[$i] = '-';
				}
			}

			return $aCreateDate;


		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 회원별 주문 목록 가져오기
	function getOrderListUser($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$user_idx = $this->getAddslashes('user_idx');

//			echo "<br>page:$page";
//			echo "<br>sz:$sz";
//			echo "<br>user_idx:$user_idx";


			$sql = 'CALL up_order_list_user (:page, :sz, :user_idx)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}




}
?>