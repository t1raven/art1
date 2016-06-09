<?php
class Recover
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

	// 회원 정보 변경
	function update($dbh) {
		try {
			$auth_key = $this->getAddslashes('auth_key');
			$user_idx = AES256::dec($_SESSION['auth_user_idx'], AES_KEY);
			$user_id = $this->getAddslashes('user_id');
			$user_pwd = hash('sha256', $this->getAddslashes('user_pwd'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$del_state = $this->getAddslashes('del_state');
			$modify_date = date('Y-m-d H:i:s');

			if (!empty($user_idx) && is_numeric($user_idx)) {
				$bTransaction = false;
				$dbh->beginTransaction();

				$sql = 'UPDATE member SET
								user_id = :user_id,
								user_pwd = :user_pwd,
								ip_addr = :ip_addr,
								visit_date = :visit_date,
								visit_cnt = visit_cnt + 1,
								modify_date = :modify_date
							WHERE user_idx = :user_idx AND del_state = :del_state';

				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60) ;
				$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64) ;
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT, 11);
				$stmt->bindParam(':visit_date', $modify_date, PDO::PARAM_STR, 10);
				$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR, 10);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
				$stmt->execute();

				$bTransaction = self::updateAuth($dbh, $user_idx);

				if ($bTransaction) {
					$dbh->commit();
				}
				else {
					$dbh->rollback();
				}

				return $bTransaction;

			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

	// 인증정보 업데이트
	function updateAuth($dbh, $user_idx) {
		try {
				$bTransaction = true;
				$auth_key = $this->getAddslashes('auth_key');
				$auth_state = $this->getAddslashes('auth_state');
				$auth_date = date('Y-m-d H:i:s');

				$sql = 'UPDATE member_recover SET
								auth_state = :auth_state,
								auth_date = :auth_date
							WHERE user_idx = :user_idx AND auth_key = :auth_key AND create_date > DATE_SUB(NOW(), INTERVAL 30 MINUTE)';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':auth_state', $auth_state, PDO::PARAM_STR, 1);
				$stmt->bindParam(':auth_date', $auth_date, PDO::PARAM_STR, 1);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
				$stmt->bindParam(':auth_key', $auth_key, PDO::PARAM_STR, 128) ;

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

				return $bTransaction;
		}
		catch(PDOExecption $e) {
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

	// 인증 정보 가져오기
	function getRead($dbh) {
		try {
			$auth_key = $this->getAddslashes('auth_key');
			$auth_state = $this->getAddslashes('auth_state');
			$sql = 'SELECT
							recover_idx,
							user_idx,
							user_id
						FROM member_recover
						WHERE auth_key = :auth_key AND auth_state = :auth_state AND create_date > DATE_SUB(NOW(), INTERVAL 30 MINUTE)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':auth_key', $auth_key, PDO::PARAM_STR, 128);
			$stmt->bindParam(':auth_state', $auth_state, PDO::PARAM_STR, 1);

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
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

	//회원여부를 확인
	function getMemberSearch($dbh){
		try {
			$user_id = $this->getAddslashes('user_id');
			$del_state = $this->getAddslashes('del_state');
			$sql = 'SELECT user_idx, user_id, user_name, sns_join FROM member WHERE user_id = :user_id AND del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

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
			return false;
			print 'Error: ' . $e->getMessage();
		}
	}

	//회원 아이디(이메일) 중복 여부
	function chkEmailDuplication($dbh){
		try {
			$user_id = $this->getAddslashes('user_id');
			$del_state = $this->getAddslashes('del_state');
			$sql = 'SELECT COUNT(user_idx) FROM member WHERE user_id = :user_id AND del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				if ($stmt->fetchColumn() === '0') {
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
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

}
