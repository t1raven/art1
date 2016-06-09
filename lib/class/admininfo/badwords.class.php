<?php
class Badwords
{
	var $attr;

	function __construct() {
		$this->attr = array();
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
			$bad_word = $this->getAddslashes('bad_word');

			$bTransaction = false;
			$dbh->beginTransaction();

			$stmt = $dbh->prepare('SELECT count(bad_word) FROM bad_words where bad_word = :bad_word');
			$stmt->bindParam(':bad_word', $bad_word, PDO::PARAM_STR, 60);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();

			if ($cnt > 0) {
				throw new Exception('이미 등록된 단어 입니다.');
			}
			
			$sql = 'INSERT INTO bad_words (
							bad_word
						) VALUES(
							:bad_word )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bad_word', $bad_word,									PDO::PARAM_STR, 60);

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
			$bTransaction = false;
			$dbh->beginTransaction();

			$bad_words_idx = $this->getAddslashes('bad_words_idx');
			$bad_word = $this->getAddslashes('bad_word');
			$create_date = date('Y-m-d H:i:s', time());

			
			$stmt = $dbh->prepare('SELECT count(bad_word) FROM bad_words where bad_words_idx != :bad_words_idx AND bad_word = :bad_word');
			$stmt->bindParam(':bad_words_idx', $bad_words_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bad_word', $bad_word, PDO::PARAM_STR, 60);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();

			if ($cnt > 0) {
				throw new Exception('이미 등록된 단어 입니다.');
			}
			
			$sql = 'UPDATE  bad_words SET
							bad_word = :bad_word, 
							create_date= :create_date
						WHERE bad_words_idx = :bad_words_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bad_word',$bad_word,										PDO::PARAM_STR, 30);
			$stmt->bindParam(':create_date',$create_date,								PDO::PARAM_STR, 30);
			$stmt->bindParam(':bad_words_idx',$bad_words_idx,					PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				$bTransaction = false;
			}

			//exit;
			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function delete($dbh) {
		try {
			$bad_words_idx = $this->getAddslashes('bad_words_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM bad_words WHERE bad_words_idx = :bad_words_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bad_words_idx', $bad_words_idx, PDO::PARAM_INT);
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
			$abad_words_idx = $this->getAddslashes('bad_words_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM bad_words WHERE bad_words_idx = :bad_words_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bad_words_idx', $bad_words_idx, PDO::PARAM_INT);

			foreach($abad_words_idx as $bad_words_idx) {
				$bTransaction = true;

				$stmt->execute();
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
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$word = $this->getAddslashes('word');
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			if ($word === '' ){ $word = NULL ; } 
			if($sz === '' ){ $sz = NULL ; } 
			if($sort === '' ){ $sort = NULL ; } 
			if($od === '' ){ $od = NULL ; } 

			//echo(" CALL up_advice_list ( $page, $sz, $st, $gnm, $nm, $answer, $sort, $od, $bdate, $edate) <br>");
			$sql = 'CALL up_badwords_list ( :page, :sz, :word, :sort, :od)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			
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
			
/*
	function getRead($dbh) {
		try {
			$member_idx = $this->getAddslashes('admininfo_idx');
			$sql = 'SELECT
							site_name, site_url,
							receive_email1, receive_email1_state, receive_email2, receive_email2_state
						FROM site_info
						WHERE member_idx = :member_idx';
			//echo($sql .'<br>');
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':member_idx', $member_idx, PDO::PARAM_INT);

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
*/


	static public function badWords($dbh, $string){
		try{
			$sql = 'SELECT bad_word FROM bad_words ORDER BY  LENGTH(bad_word) DESC, bad_word ASC' ;
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() ) {
				$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($row as $val) {
					//$string = array($val); //str_replace($val, '', $string);
					$string = str_replace($val, '', $string);
				}
				return $string;
			}
			else {
				return $string;
			}

			$dbh = null;

		
		}catch(PDOExecption $e){
			print 'Error!: ' . $e->getMessage() . '</br>';
		}

	}

}

?>