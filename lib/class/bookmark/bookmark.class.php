<?php
class BookMark
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
			$bm_idx = $this->getAddslashes('bm_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);

			if (self::getBookMarkExist($dbh) === 0) {
				$sql = ' INSERT INTO bookmark_user (bm_idx, user_idx) VALUES (:bm_idx, :user_idx)';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bm_idx', $bm_idx, PDO::PARAM_INT, 11);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					//echo "chk1";
					return true;
				}
				else {
					//echo "chk2";
					return false;
				}
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
			$bm_idx = $this->getAddslashes('bm_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM bookmark_user WHERE bm_idx = :bm_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bm_idx', $bm_idx, PDO::PARAM_INT, 11);
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

	function getAllMenu($dbh) {
		try {
			$sql = 'SELECT bm_idx, bm_category, bm_menu, bm_url FROM bookmark ORDER BY bm_order ASC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	function getBookMarkList($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = ' SELECT a.bu_idx, a.bm_idx, b.bm_category, b.bm_menu, b.bm_url
						FROM bookmark_user AS a INNER JOIN bookmark AS b ON a.bm_idx = b.bm_idx
						WHERE a.user_idx = :user_idx
						ORDER BY b.bm_order ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	// 북마크 존재 여부
	function getBookMarkExist($dbh) {
		try {
			$bm_idx = $this->getAddslashes('bm_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'SELECT COUNT(bu_idx) FROM bookmark_user WHERE bm_idx = :bm_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bm_idx', $bm_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return -1;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

}
?>