<?php
class Advice
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value) {
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key) {
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
			$user_idx = $this->getAddslashes('user_idx');
			$goods_idx = $this->getAddslashes('goods_idx');
			$request_type = $this->getAddslashes('request_type');
			$user_view_url = $this->getAddslashes('user_view_url');
			$advice_user_name = $this->getAddslashes('advice_user_name');
			$advice_user_company = $this->getAddslashes('advice_user_company');
			$how_to_request = $this->getAddslashes('how_to_request');
			$advice_user_tel = $this->getAddslashes('advice_user_tel');
			$advice_user_email = $this->getAddslashes('advice_user_email');
			$setting_room = $this->getAddslashes('setting_room');
			$advice_user_content = $this->getAddslashes('advice_user_content');
			$advice_amdin_memo = $this->getAddslashes('advice_amdin_memo');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$bTransaction = false;
			$dbh->beginTransaction();
			
			$sql = 'INSERT INTO advice (
							user_idx, request_type, goods_idx, advice_user_name, advice_user_company, user_view_url, setting_room, 
							how_to_request, advice_user_tel, advice_user_email, advice_user_content, ip_addr	
						) VALUES(
							:user_idx, :request_type, :goods_idx, :advice_user_name, :advice_user_company, :user_view_url, :setting_room, 
							:how_to_request, :advice_user_tel, :advice_user_email, :advice_user_content, :ip_addr	 )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx,												PDO::PARAM_INT);
			$stmt->bindParam(':request_type', $request_type,									PDO::PARAM_STR, 60);
			$stmt->bindParam(':goods_idx', $goods_idx,											PDO::PARAM_INT);
			$stmt->bindParam(':advice_user_name', $advice_user_name,				PDO::PARAM_STR, 60);
			$stmt->bindParam(':advice_user_company', $advice_user_company,	PDO::PARAM_STR, 60);
			$stmt->bindParam(':user_view_url', $user_view_url,								PDO::PARAM_STR, 60);
			$stmt->bindParam(':setting_room', $setting_room,									PDO::PARAM_STR, 60);
			$stmt->bindParam(':how_to_request', $how_to_request,							PDO::PARAM_STR, 60);
			$stmt->bindParam(':advice_user_tel', $advice_user_tel,							PDO::PARAM_STR, 60);
			$stmt->bindParam(':advice_user_email', $advice_user_email,				PDO::PARAM_STR, 60);
			$stmt->bindParam(':advice_user_content', $advice_user_content,			PDO::PARAM_STR, 60);
			$stmt->bindParam(':ip_addr', $ip_addr,													PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
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

			return $bTransaction;

		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}

	function update($dbh) {
		try {
			//echo '업데이트';
			/*
			$user_view_url = $this->getAddslashes('user_view_url');
			$advice_user_name = $this->getAddslashes('advice_user_name');
			$advice_user_tel = $this->getAddslashes('advice_user_tel');
			$advice_user_content = $this->getAddslashes('advice_user_content');
			*/
			$advice_amdin_memo = $this->getAddslashes('advice_amdin_memo');
			$advice_idx = $this->getAddslashes('advice_idx');

			$modify_date = date('Y-m-d H:i:s', time());

			//$sql = 'UPDATE member SET user_level_code = :user_level_code, '.$sql_pwd.' user_name = :user_name, ip_addr = :ip_addr , newsletter_status = :newsletter_status, sms_status = :sms_status WHERE user_idx = :user_idx';
			$sql = 'UPDATE advice SET   
							advice_amdin_memo = :advice_amdin_memo , 
							modify_date = :modify_date
						WHERE advice_idx = :advice_idx';
			
			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':advice_amdin_memo', $advice_amdin_memo, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modify_date', $modify_date);
			$stmt->bindParam(':advice_idx', $advice_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$dbh->commit();
				$bTransaction = true;
			}
			else {
				$dbh->rollback();
				$bTransaction = false;
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
			
	function delete($dbh) {
		try {
			$advice_idx = $this->getAddslashes('advice_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM advice WHERE advice_idx = :advice_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':advice_idx', $advice_idx, PDO::PARAM_INT);
			$bTransaction = $stmt->execute();

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
			//return true;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$adviceIdx = $this->getAddslashes('advice_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM advice WHERE advice_idx = :advice_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':advice_idx', $advice_idx, PDO::PARAM_INT);

			foreach($adviceIdx as $advice_idx) {
				$bTransaction = true;

				$stmt->execute();
				/*	//이미지 삭제
				if ($bTransaction = self::attachFileDelete($dbh, $user_idx)) {
					$bTransaction = true;
					$stmt->execute();
					
				}
				else {
					$bTransaction = false;
					break;
				}
				*/
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
	function getList($dbh) {
		try {
			$st = (!empty($this->getAddslashes('st'))) ? $this->getAddslashes('st') : 0;
			$nm = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$gnm = (!empty($this->getAddslashes('gnm'))) ? $this->getAddslashes('gnm') : null;
			$answer = (!empty($this->getAddslashes('answer'))) ? $this->getAddslashes('answer') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$word = $this->getAddslashes('word');
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			if ($nm === '' ){ $nm = NULL ; } 
			if ($gnm === '' ){ $gnm = NULL ; } 
			if ($answer === '' ){ $answer = NULL ; } 
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate !== NULL ) { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($sz === '' ){ $sz = NULL ; } 
			if($sort === '' ){ $sort = NULL ; } 
			if($od === '' ){ $od = NULL ; } 

			//echo(" CALL up_advice_list ( $page, $sz, $st, $gnm, $nm, $answer, $sort, $od, $bdate, $edate) <br>");
			$sql = 'CALL up_advice_list ( :page, :sz, :st, :gnm, :nm, :answer, :sort, :od, :bdate, :edate)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':st', $st,										PDO::PARAM_INT);
			$stmt->bindParam(':gnm', $gnm,								PDO::PARAM_STR, 20);
			$stmt->bindParam(':nm', $nm,									PDO::PARAM_STR, 20);
			$stmt->bindParam(':answer', $answer,					PDO::PARAM_STR, 20);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			$stmt->bindParam(':bdate', $bdate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate,							PDO::PARAM_STR, 20);
			
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt, $total_all_cnt );
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getListFront($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$user_idx = (!empty($this->getAddslashes('user_idx'))) ? $this->getAddslashes('user_idx') : null;

			//echo(" CALL up_advice_list ( $page, $sz, $st, $gnm, $nm, $answer, $sort, $od, $bdate, $edate) <br>");
			$sql = 'CALL up_advice_front_list ( :page, :sz, :user_idx )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx,				PDO::PARAM_INT);
			
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt );
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
			

	function getRead($dbh) {
		try {
			$advice_idx = $this->getAddslashes('advice_idx');
			$sql = 'SELECT
							advice_idx, user_idx, request_type,
							user_view_url,advice_user_name,advice_user_tel,advice_user_email,
							advice_user_company, setting_room,
							CASE how_to_request 
								WHEN \'tel\' THEN \'전화답변\'
								WHEN \'email\' THEN \'이메일답변\'
							END AS how_to_request ,
							IF ( ISNULL(advice_amdin_memo) OR advice_amdin_memo=\'\' , FALSE, TRUE ) AS request_status,
							advice_user_content,advice_amdin_memo,create_date,modify_date ,
							goods_idx, goods_name, goods_list_img, goods_name, artist_name, artist_idx
						FROM view_advice 
						WHERE advice_idx = :advice_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':advice_idx', $advice_idx, PDO::PARAM_INT);

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

			$dbh = null;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
			
	//상담 상품 정보 가져오기
	function getGoodsRead($dbh){
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'SELECT
							A.goods_name, B.artist_name
						FROM goods AS A INNER JOIN artist_info as B ON A.artist_idx = B.artist_idx
						WHERE goods_idx = :goods_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

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

			$dbh = null;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	
	}
}
?>