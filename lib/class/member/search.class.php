<?php
class Search
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
			$user_id = $this->getAddslashes('user_id');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$auth_key = $this->getAddslashes('auth_key');
			$auth_state = $this->getAddslashes('auth_state');
			$sql = 'INSERT INTO member_recover SET
							user_idx = :user_idx,
							user_id = :user_id,
							ip_addr = :ip_addr,
							auth_key = :auth_key,
							auth_state = :auth_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT, 11);
			$stmt->bindParam(':auth_key', $auth_key, PDO::PARAM_STR, 64);
			$stmt->bindParam(':auth_state', $auth_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(Exception $e) {
			print 'Error: ' . $e->getMessage();
		}
	}

	// 인증 이메일 발송 여부(
	function getAuthIsExist($dbh) {
		try {
			$user_idx = $this->getAddslashes('user_idx');
			$auth_state = $this->getAddslashes('auth_state');

			$sql = 'SELECT COUNT(recover_idx)
						FROM member_recover
						WHERE user_idx = :user_idx AND auth_state = :auth_state AND create_date > DATE_SUB(NOW(), INTERVAL 1 day)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':auth_state', $auth_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				throw new Exception('error');
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

}
