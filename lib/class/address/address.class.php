<?php
class Address
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
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$user_name = $this->getAddslashes('user_name');
			$user_zip = $this->getAddslashes('user_zip');
			$user_addr_1 = $this->getAddslashes('user_addr_1');
			$user_addr_2 = $this->getAddslashes('user_addr_2');
			$user_email = $this->getAddslashes('user_email');
			$user_tel = $this->getAddslashes('user_tel');
			$default_state = $this->getAddslashes('default_state');
			$sql = ' INSERT INTO member_orders_addr (user_idx, user_name, user_zip, user_addr_1, user_addr_2, user_email, user_tel, default_state)
						VALUES (:user_idx, :user_name, :user_zip, :user_addr_1, :user_addr_2, :user_email, :user_tel, :default_state)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':user_zip', $user_zip, PDO::PARAM_STR, 6);
			$stmt->bindParam(':user_addr_1', $user_addr_1, PDO::PARAM_STR, 100);
			$stmt->bindParam(':user_addr_2', $user_addr_2, PDO::PARAM_STR, 100);
			$stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':user_tel', $user_tel, PDO::PARAM_STR, 11);
			$stmt->bindParam(':default_state', $default_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				//echo "chk1";
				return true;
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	function update($dbh) {
		try {
			$addr_idx = $this->getAddslashes('addr_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$user_name = $this->getAddslashes('user_name');
			$user_zip = $this->getAddslashes('user_zip');
			$user_addr_1 = $this->getAddslashes('user_addr_1');
			$user_addr_2 = $this->getAddslashes('user_addr_2');
			$user_email = $this->getAddslashes('user_email');
			$user_tel = $this->getAddslashes('user_tel');
			$default_state = $this->getAddslashes('default_state');
			$sql = ' UPDATE member_orders_addr
						SET user_name = :user_name, user_zip = :user_zip, user_addr_1 = :user_addr_1, user_addr_2 = :user_addr_2, user_email = :user_email, user_tel = :user_tel, default_state = :default_state
						WHERE addr_idx = :addr_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':user_zip', $user_zip, PDO::PARAM_STR, 6);
			$stmt->bindParam(':user_addr_1', $user_addr_1, PDO::PARAM_STR, 100);
			$stmt->bindParam(':user_addr_2', $user_addr_2, PDO::PARAM_STR, 100);
			$stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':user_tel', $user_tel, PDO::PARAM_STR, 11);
			$stmt->bindParam(':default_state', $default_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':addr_idx', $addr_idx, PDO::PARAM_INT, 11);
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

	function delete($dbh) {
		try {
			$addr_idx = $this->getAddslashes('addr_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM member_orders_addr WHERE addr_idx = :addr_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':addr_idx', $addr_idx, PDO::PARAM_INT, 11);
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
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'DELETE FROM member_orders_addr WHERE user_idx = :user_idx';
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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function getList($dbh) {
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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function getEdit($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx');
			echo $artist_idx;
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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function getBasketInfo($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = ' SELECT a.qty, b.goods_name, b.goods_sell_price
						FROM basket a INNER JOIN goods b ON a.goods_idx = b.goods_idx
						WHERE a.user_idx = :user_idx
						GROUP BY a.goods_idx';
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