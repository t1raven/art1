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

	function insert($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$user_idx = $this->getAddslashes('user_idx');
			$account_idx = $this->getAddslashes('account_idx');
			$ord_name = (!empty($this->getAddslashes('ord_name'))) ? $this->getAddslashes('ord_name') : null;
			$ord_email = $this->getAddslashes('ord_email');
			$ord_tel = $this->getAddslashes('ord_tel');
			$ord_mobile = $this->getAddslashes('ord_mobile');
			$rec_name = $this->getAddslashes('rec_name');
			$rec_email = $this->getAddslashes('rec_email');
			$rec_tel = $this->getAddslashes('rec_tel');
			$rec_zip = $this->getAddslashes('rec_zip');
			$rec_addr_1 = $this->getAddslashes('rec_addr_1');
			$rec_addr_2 = $this->getAddslashes('rec_addr_2');
			$amount = $this->getAddslashes('amount');
			$delivery_price = $this->getAddslashes('delivery_price');
			$freight_collect_price = $this->getAddslashes('freight_collect_price');
			$payment_type = $this->getAddslashes('payment_type');
			$payment_name = $this->getAddslashes('payment_name');
			$pg_return_code = $this->getAddslashes('pg_return_code');
			$pg_return_msg = $this->getAddslashes('pg_return_msg');
			$pg_trade_nbr = $this->getAddslashes('pg_trade_nbr');
			$escrow_state = $this->getAddslashes('escrow_state');
			$escrow_tran_state = $this->getAddslashes('escrow_tran_state');
			$delivery_nbr = $this->getAddslashes('delivery_nbr');
			//$tran_state = $this->getAddslashes('tran_state');
			$tran_state = 2; // 신용카드, 계좌이체는 입금완료로 처리

			$ord_goods = $this->getAddslashes('ord_goods');
			$delivery_start_date = $this->getAddslashes('delivery_start_date');
			$delivery_end_date = $this->getAddslashes('delivery_end_date');
			//$tran_old_state = $this->getAddslashes('tran_old_state');
			$tran_old_state = 2; // 신용카드, 계좌이체는 입금완료로 처리

			$payment_date = $this->getAddslashes('payment_date');
			$pg_account_nbr = $this->getAddslashes('pg_account_nbr');
			$limited_nbr = $this->getAddslashes('limited_nbr');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			// 주문번호가 기존에 있는지 검사
			$sql = 'SELECT COUNT(ord_nbr) FROM orders WHERE ord_nbr = :ord_nbr';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);

			if ($stmt->execute())
			{
				if ((int)$stmt->fetchColumn() === 0)
				{
					//$sql = 'call up_order_insert(:ord_nbr, :user_idx, :account_idx, :ord_name, :ord_email, :ord_tel, :ord_mobile, :rec_name, :rec_zip, :rec_addr_1, :rec_addr_2, :amount, :delivery_price, :freight_collect_price, :payment_type, :payment_name, :pg_return_code, :pg_return_msg, :pg_trade_nbr, :escrow_state, :escrow_tran_state, :delivery_nbr, :tran_state, :ord_goods, :delivery_start_date, :delivery_end_date, :delivery_receipt_date, :tran_old_state, :payment_date, :pg_account_nbr, :ip_addr)';

					$sql = 'INSERT INTO orders (ord_nbr, user_idx, account_idx, ord_name, ord_email, ord_tel, ord_mobile, rec_name, rec_email, rec_tel, rec_zip, rec_addr_1, rec_addr_2, amount, delivery_price, freight_collect_price, payment_type, payment_name, pg_return_code, pg_return_msg, pg_trade_nbr, escrow_state, escrow_tran_state, delivery_nbr, tran_state, ord_goods, delivery_start_date, delivery_end_date, delivery_receipt_date, tran_old_state, payment_date, pg_account_nbr, ip_addr) VALUES (:ord_nbr, :user_idx, :account_idx, :ord_name, :ord_email, :ord_tel, :ord_mobile, :rec_name, :rec_email, :rec_tel, :rec_zip, :rec_addr_1, :rec_addr_2, :amount, :delivery_price, :freight_collect_price, :payment_type, :payment_name, :pg_return_code, :pg_return_msg, :pg_trade_nbr, :escrow_state, :escrow_tran_state, :delivery_nbr, :tran_state, :ord_goods, :delivery_start_date, :delivery_end_date, :delivery_receipt_date, :tran_old_state, :payment_date, :pg_account_nbr, :ip_addr)';

					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
					$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
					$stmt->bindParam(':account_idx', $account_idx, PDO::PARAM_INT, 11);
					$stmt->bindParam(':ord_name', $ord_name, PDO::PARAM_STR, 50);
					$stmt->bindParam(':ord_email', $ord_email, PDO::PARAM_STR, 60);
					$stmt->bindParam(':ord_tel', $ord_tel, PDO::PARAM_STR, 11);
					$stmt->bindParam(':ord_mobile', $ord_mobile, PDO::PARAM_STR, 11);
					$stmt->bindParam(':rec_name', $rec_name, PDO::PARAM_STR, 50);
					$stmt->bindParam(':rec_name', $rec_name, PDO::PARAM_STR, 50);
					$stmt->bindParam(':rec_email', $rec_email, PDO::PARAM_STR, 60);
					$stmt->bindParam(':rec_tel', $rec_tel, PDO::PARAM_STR, 11);
					$stmt->bindParam(':rec_zip', $rec_zip, PDO::PARAM_STR, 3);
					$stmt->bindParam(':rec_addr_1', $rec_addr_1, PDO::PARAM_STR, 100);
					$stmt->bindParam(':rec_addr_2', $rec_addr_2, PDO::PARAM_STR, 100);
					$stmt->bindParam(':amount', $amount, PDO::PARAM_INT, 11);
					$stmt->bindParam(':delivery_price', $delivery_price, PDO::PARAM_INT, 11);
					$stmt->bindParam(':freight_collect_price', $freight_collect_price, PDO::PARAM_INT, 11);
					$stmt->bindParam(':payment_type', $payment_type, PDO::PARAM_INT, 3);
					$stmt->bindParam(':payment_name', $payment_name, PDO::PARAM_STR, 50);
					$stmt->bindParam(':pg_return_code', $pg_return_code, PDO::PARAM_STR, 50);
					$stmt->bindParam(':pg_return_msg', $pg_return_msg, PDO::PARAM_STR, 200);
					$stmt->bindParam(':pg_trade_nbr', $pg_trade_nbr, PDO::PARAM_STR, 50);
					$stmt->bindParam(':escrow_state', $escrow_state, PDO::PARAM_STR, 1);
					$stmt->bindParam(':escrow_tran_state', $escrow_tran_state, PDO::PARAM_STR, 1);
					$stmt->bindParam(':delivery_nbr', $delivery_nbr, PDO::PARAM_STR, 100);
					$stmt->bindParam(':tran_state', $tran_state, PDO::PARAM_INT, 3);
					$stmt->bindParam(':ord_goods', $ord_goods, PDO::PARAM_STR, 250);
					$stmt->bindParam(':delivery_start_date', $delivery_start_date, PDO::PARAM_STR);
					$stmt->bindParam(':delivery_end_date', $delivery_start_date, PDO::PARAM_STR);
					$stmt->bindParam(':delivery_receipt_date', $delivery_receipt_date, PDO::PARAM_STR);
					$stmt->bindParam(':tran_old_state', $tran_old_state, PDO::PARAM_INT, 3);
					$stmt->bindParam(':payment_date', $payment_date, PDO::PARAM_STR);
					$stmt->bindParam(':pg_account_nbr', $pg_account_nbr, PDO::PARAM_STR, 50);
					$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT, 11);

					if ($stmt->execute()) {
						//$ord_nbr = $dbh->lastInsertId();
						$sql = 'SELECT basket_idx FROM  basket WHERE user_idx = :user_idx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

						if ($stmt->execute() && $stmt->rowCount()) {
							$aBasketIdx = $stmt->fetchAll(PDO::FETCH_ASSOC);
							$i = 0;
							foreach($aBasketIdx as $row) {
								if ($i === 0) {
									$basket_idxs = $row['basket_idx'];
								}
								else {
									$basket_idxs .= ','.$row['basket_idx'];
								}
								++$i;
							}
						}

						$sql = 'SELECT a.basket_idx, b.goods_idx, b.goods_name, b.goods_sell_price, b.goods_point, b.delivery_type, b.delivery_price, b.freight_collect_price, b.goods_cnt_type, b.goods_cnt, b.del_state,
												a.qty, b.sold_out_state, b.goods_display, b.order_min_cnt, b.order_max_cnt, a.limited_nbr
									FROM basket AS a
									INNER JOIN goods AS b ON user_idx = :user_idx AND a.goods_idx = b.goods_idx AND basket_idx IN ('.$basket_idxs.')';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

						if ($stmt->execute() && $stmt->rowCount())
						{
							$member_dc = 0;
							$freight_collect_price = 0;
							$buy_price = 0;
							$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

							foreach($list as $row)
							{
								// 구매 가능한 상품인지 검사
								if ($row['goods_cnt'] === '0')
								{
									$bTransaction = false;
									break;
								}
								else
								{

									$sql = 'INSERT INTO orders_info(ord_nbr, goods_idx, goods_name, qty, goods_price, member_dc, settlement_price, freight_collect_price, buy_price, limited_nbr, limited_nbr_tmp) VALUES (:ord_nbr, :goods_idx, :goods_name, :qty, :goods_price, :member_dc, :settlement_price, :freight_collect_price, :buy_price, :limited_nbr, :limited_nbr_tmp)';
									$stmt = $dbh->prepare($sql);
									$goods_price = (int)$row['goods_sell_price'] * (int)$row['qty'];
									$settlement_price = $goods_price - $member_dc;
									$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
									$stmt->bindParam(':goods_idx', $row['goods_idx'], PDO::PARAM_INT, 11);
									$stmt->bindParam(':goods_name', $row['goods_name'], PDO::PARAM_STR, 200);
									$stmt->bindParam(':qty', $row['qty'], PDO::PARAM_INT, 11);
									$stmt->bindParam(':goods_price', $goods_price, PDO::PARAM_INT, 11);
									$stmt->bindParam(':member_dc', $member_dc, PDO::PARAM_INT, 11);
									$stmt->bindParam(':settlement_price', $settlement_price, PDO::PARAM_INT, 11);
									$stmt->bindParam(':freight_collect_price', $freight_collect_price, PDO::PARAM_INT, 11);
									$stmt->bindParam(':buy_price', $buy_price, PDO::PARAM_INT, 11);
									$stmt->bindParam(':limited_nbr', $row['limited_nbr'], PDO::PARAM_STR, 5);
									$stmt->bindParam(':limited_nbr_tmp', $row['limited_nbr'], PDO::PARAM_STR, 30);

									if ($stmt->execute())
									{
										// 상품(작품) 재고 조정
										$goods_idx = $row['goods_idx'];
										$sql = 'UPDATE goods SET goods_cnt = goods_cnt - '.$row['qty'].' WHERE goods_idx = :goods_idx';
										$stmt = $dbh->prepare($sql);
										$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

										if ($stmt->execute())
										{
											$bTransaction = true;

											$sql = 'SELECT goods_cnt FROM goods WHERE goods_idx = :goods_idx';
											$stmt = $dbh->prepare($sql);
											$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

											if ($stmt->execute())
											{
												// 상품이 0 개일 경우 품절로 설정
												if ((int)$stmt->fetchColumn() < 1)
												{
													$sold_out_state = 'Y';
													$sql = 'UPDATE goods SET sold_out_state = :sold_out_state WHERE goods_idx = :goods_idx';
													$stmt = $dbh->prepare($sql);
													$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);
													$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

													if ($stmt->execute())
													{
														$bTransaction = true;
													}
													else
													{
														$bTransaction = false;
													}
												}
											}
										}
									}
									else
									{
										$bTransaction = false;
										break;
									}
								}
							}

							// 장바구니 삭제
							if ($bTransaction)
							{
								$sql = 'DELETE FROM basket WHERE user_idx = :user_idx';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

								if ($stmt->execute())
								{
									// 로그 기록하기
									$log_content = '시스템';
									$sql = 'INSERT INTO orders_log (ord_nbr, tran_state, log_content) VALUES (:ord_nbr, :tran_state, :log_content)';
									$stmt = $dbh->prepare($sql);
									$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
									$stmt->bindParam(':tran_state', $tran_state, PDO::PARAM_INT, 3);
									$stmt->bindParam(':log_content', $log_content, PDO::PARAM_STR, 50);

									if ($stmt->execute())
									{
										$bTransaction = true;
									}
								}
								else
								{
									$bTransaction = false;
								}
							}
						}
					}
					else {
						throw new Exception('error');
					}

					if ($bTransaction) {
						$dbh->commit();
					}
					else {
						$dbh->rollback();
					}
				}
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 결제 기본 정보 가져오기
	function getOrderInfo($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$sql = 'SELECT a.ord_nbr, b.goods_list_img, a.goods_name, (SELECT c.artist_name FROM artist_info AS c WHERE c.artist_idx = b.artist_idx) AS artist_name,
									a.qty, a.settlement_price, a.goods_idx, a.limited_nbr, a.limited_nbr_tmp, b.category_idx
						FROM orders_info AS a
						INNER JOIN goods AS b ON a.goods_idx = b.goods_idx
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

	// 결제 상세 정보 가져오기
	function getOrder($dbh) {
		try {
			$ord_nbr = $this->getAddslashes('ord_nbr');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			//echo "<br>class-ord_nbr:".$ord_nbr;
			//echo "<br>class-user_idx:".$user_idx;

			$sql = 'SELECT ord_nbr, rec_name, rec_addr_1, rec_addr_2, create_date FROM orders WHERE ord_nbr = :ord_nbr AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ord_nbr', $ord_nbr, PDO::PARAM_STR, 14);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				//echo "chk1";
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return null;
			}
		}
		catch(PDOExecption $e) {
			//echo $e->getMessage();
			//JS::HistoryBack($e->getMessage());
		}
	}

	/*
	function deleteBasket($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM basket WHERE user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
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
	*/

	function getEdit($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx');
			//echo $artist_idx;
			$sql = 'SELECT
									artist_idx, artist_name, artist_en_name, photo_up_file_name, photo_ori_file_name, cv_up_file_name, cv_ori_file_name, artist_job, artist_birthday, artist_genre, artist_mobile, artist_email, education_year, education_name, award_year, award_name, private_year, private_name, team_year, team_name, major_work_idx, artist_greeting, annual_artwork_year, annual_artwork_cnt, homepage_url, blog_url, facebook_url, sns_1_name, sns_1_url, sns_2_name, sns_2_url, approval_state,
									(SELECT goods_list_img FROM goods AS a WHERE a.goods_idx = major_work_idx) AS major_work_img,
									(SELECT goods_name FROM goods AS a WHERE a.goods_idx = major_work_idx) AS major_work
						FROM artist_info
						WHERE artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

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

	function getSearchArtist($dbh) {
		try {
			$artist_name = (!empty($this->getAddslashes('artist_name'))) ? "%".$this->getAddslashes('artist_name')."%" : null;
			//$sql = 'SELECT artist_idx, artist_name, artist_birthday, education_name FROM artist_info WHERE artist_name = :artist_name';
			$sql = "SELECT artist_idx, artist_name, artist_birthday, education_name FROM artist_info WHERE artist_name like :artist_name";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_name', $artist_name, PDO::PARAM_STR, 50);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;
			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
	// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $artist_idx) {
		try {
			$sql = 'SELECT artist_idx, photo_up_file_name, photo_ori_file_name, cv_up_file_name, cv_ori_file_name FROM artist_info WHERE artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

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



	function getGoodsName($dbh, $goods_idx) {
		try {
			if (!empty($goods_idx)) {
				$sql = 'SELECT a.goods_name, b.artist_name FROM goods as a inner join artist_info as b on a.artist_idx = b.artist_idx WHERE a.goods_idx =:goods_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					 return $stmt->fetch(PDO::FETCH_ASSOC);
				}
				else {
					return null;
				}
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function setGoodsName($dbh, $ary) {
		$i = 0;
		$aTemp = null;
		foreach($ary as $idx) {
			$row = self::getGoodsName($dbh, $idx);
			if (!empty($row['goods_name'])) {
				$aTemp[$i]= $row['goods_name'].'('.$row['artist_name'].')';
			}
			else {
				$aTemp[$i]= '';
			}
			++$i;
		}

		return $aTemp;
	}

	// 회원 정보 가져오기(PG에서 사용)
	function getMemberInfo($dbh, $user_id) {
		try {
			$sql = 'SELECT user_idx  FROM member WHERE user_id = :user_id';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);

			if ($stmt->execute() && $stmt->rowCount()) {
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
			$sql = 'SELECT a.info_idx, a.goods_name, a.qty, a.settlement_price, b.goods_list_img, b.goods_cnt, b.is_rental, (SELECT artist_name FROM artist_info WHERE artist_idx = b.artist_idx) AS artist_name FROM orders_info a INNER JOIN goods b ON a.goods_idx = b.goods_idx WHERE ord_nbr = :ord_nbr';
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

	// 장바구니에 들어있는 상품 가격 가져오기
	function getBasketGoodsSellPrice($dbh) {
		try {
			$user_idx = $this->getAddslashes('user_idx');
			$sql = ' SELECT a.qty, b.goods_sell_price
						FROM basket AS a INNER JOIN goods AS b ON a.goods_idx = b.goods_idx
						WHERE a.user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

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
}
?>