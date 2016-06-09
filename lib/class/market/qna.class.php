<?php
class Qna
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
			$goods_idx = $this->getAddslashes('goods_idx');
			//$goods_name = $this->getAddslashes('goods_name');
			$secret_status = $this->getAddslashes('secret_status');
			$qna_password = hash('sha256', $this->getAddslashes('qna_password'));
			$user_view_url = $this->getAddslashes('user_view_url');
			$qna_user_name = $this->getAddslashes('qna_user_name');
			$how_to_request = $this->getAddslashes('how_to_request');
			$qna_user_tel = $this->getAddslashes('qna_user_tel');
			$qna_user_email = $this->getAddslashes('qna_user_email');
			$setting_room = $this->getAddslashes('setting_room');
			$qna_title = $this->getAddslashes('qna_title');
			$qna_user_content = $this->getAddslashes('qna_user_content');
			$qna_amdin_memo = $this->getAddslashes('qna_amdin_memo');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$bTransaction = false;
			$dbh->beginTransaction();
			
			$sql = 'INSERT INTO qna (
							user_idx, goods_idx,
							secret_status, qna_password, qna_user_name, user_view_url,
							how_to_request, qna_user_tel, qna_user_email, qna_title, qna_user_content, ip_addr	
						) VALUES(
							:user_idx, :goods_idx,
							:secret_status, :qna_password, :qna_user_name, :user_view_url,
							:how_to_request, :qna_user_tel, :qna_user_email, :qna_title, :qna_user_content, :ip_addr  )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx,									PDO::PARAM_INT);
			$stmt->bindParam(':goods_idx', $goods_idx,								PDO::PARAM_INT);
			//$stmt->bindParam(':goods_name', $goods_name,						PDO::PARAM_STR, 60);
			$stmt->bindParam(':secret_status', $secret_status,					PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_password', $qna_password,				PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_user_name', $qna_user_name,			PDO::PARAM_STR, 60);
			$stmt->bindParam(':user_view_url', $user_view_url,					PDO::PARAM_STR, 60);
			$stmt->bindParam(':how_to_request', $how_to_request,				PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_user_tel', $qna_user_tel,						PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_user_email', $qna_user_email,				PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_title', $qna_title,										PDO::PARAM_STR, 60);
			$stmt->bindParam(':qna_user_content', $qna_user_content,		PDO::PARAM_STR, 60);
			$stmt->bindParam(':ip_addr', $ip_addr,										PDO::PARAM_INT);

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
			echo '업데이트';
			$qna_amdin_memo = $this->getAddslashes('qna_amdin_memo');
			$qna_idx = $this->getAddslashes('qna_idx');

			$modify_date = date('Y-m-d H:i:s', time());

			$sql = 'UPDATE qna SET   
							qna_amdin_memo = :qna_amdin_memo , 
							modify_date = :modify_date
						WHERE qna_idx = :qna_idx';
			
			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':qna_amdin_memo', $qna_amdin_memo, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modify_date', $modify_date);
			$stmt->bindParam(':qna_idx', $qna_idx, PDO::PARAM_INT);

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
			$qna_idx = $this->getAddslashes('qna_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM qna WHERE qna_idx = :qna_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':qna_idx', $qna_idx, PDO::PARAM_INT);
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
			$qnaIdx = $this->getAddslashes('qna_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM qna WHERE qna_idx = :qna_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':qna_idx', $qna_idx, PDO::PARAM_INT);

			foreach($qnaIdx as $qna_idx) {
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
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			if ($word === '' ){ $word = NULL ; } 
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate !== NULL ) { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($sz === '' ){ $sz = NULL ; } 
			if($sort === '' ){ $sort = NULL ; } 
			if($od === '' ){ $od = NULL ; } 

			//echo(" CALL up_qna_list ( $page, $sz, $sort, $od, $word, $bdate, $edate) <br>");
			//$sql = 'CALL up_qna_list ( :page, :sz, :sort, :od, :word, :bdate, :edate)';
			$sql = 'CALL up_qna_list ( :page, :sz, :sort, :od, :word, :bdate, :edate)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,							PDO::PARAM_STR, 20);
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
			

	function getRead($dbh) {
		try {
			$qna_idx = $this->getAddslashes('qna_idx');
			$sql = 'SELECT
							qna_idx,user_view_url,qna_user_name,qna_user_tel,qna_user_email,
							qna_title, 
							CASE secret_status 
								WHEN \'Y\' THEN \'비밀글\'
								WHEN \'N\' THEN \'공개글\'
							END AS secret_status ,
							CASE how_to_request 
								WHEN \'tel\' THEN \'전화답변\'
								WHEN \'email\' THEN \'이메일답변\'
							END AS how_to_request ,
							IF ( ISNULL(qna_amdin_memo) OR qna_amdin_memo=\'\' , FALSE, TRUE ) AS request_status,
							qna_user_content,qna_amdin_memo,create_date,modify_date 
						FROM qna 
						WHERE qna_idx = :qna_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':qna_idx', $qna_idx, PDO::PARAM_INT);

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
			
	//회원권한 select  box 용 S
	//by 2014-11-27 이용태
	function getListMemberLevel($dbh) {
		try {
			$sql = 'select user_level_code, user_level_name from member_level ';
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return array($list);

			$dbh = null;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
	//회원권한 select  box 용 E

}
?>