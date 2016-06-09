<?php
class Newstype
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

/*
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
*/
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

	function updateSkintype($dbh) {
		try {
			//echo '업데이트';
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$news_skin_type = $this->getAddslashes('news_skin_type');

			if ($news_skin_type == 0 ) { 	$news_skin_type = 'big'; }
			if ($news_skin_type == 1 ) { 	$news_skin_type = 'small'; }
			if ($news_skin_type == 2 ) { 	$news_skin_type = 'tile'; }
			if ($news_skin_type == 3 ) { 	$news_skin_type = 'thumbnail'; }
			if ($news_skin_type == 4 ) { 	$news_skin_type = 'gallery'; }

			$modify_date = date('Y-m-d H:i:s', time());

			$sql = 'UPDATE news_category SET   
							news_skin_type = :news_skin_type , 
							modify_date = :modify_date
						WHERE news_category_idx = :news_category_idx';
			
			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_skin_type', $news_skin_type, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modify_date', $modify_date);
			$stmt->bindParam(':news_category_idx', $news_category_idx, PDO::PARAM_INT);

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
/*			
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
				//이미지 삭제
				//if ($bTransaction = self::attachFileDelete($dbh, $user_idx)) {
				//	$bTransaction = true;
				//	$stmt->execute();
				//	
				//}
				//else {
				//	$bTransaction = false;
				//	break;
				//}
				
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
*/


	function getList($dbh) {
		try {
			$news_category_code = (!empty($this->getAddslashes('news_category_code'))) ? $this->getAddslashes('news_category_code') : null;
			$news_category_depth = (!empty($this->getAddslashes('news_category_depth'))) ? $this->getAddslashes('news_category_depth') : null;

			if ($news_category_code === '' ){ $news_category_code = NULL ; } 
			if ($news_category_depth === '' ){ $news_category_depth = NULL ; }


			//echo(" CALL up_exhibition_list (  $page, $sz, $sort, $od, $word, $bdate, $edate, $cfm) <br>");
			$sql = 'CALL up_newstype_list ( :news_category_code, :news_category_depth)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_code', $news_category_code,	PDO::PARAM_INT);
			$stmt->bindParam(':news_category_depth', $news_category_depth,	PDO::PARAM_INT);

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

	function getRead($dbh) {
		try {
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$sql = 'SELECT
							news_category_idx, news_category_code,news_category_depth,news_category_name,orderby,
							news_skin_type,view_status
						FROM news_category
						WHERE news_category_idx = :news_category_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx', $news_category_idx, PDO::PARAM_INT);

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