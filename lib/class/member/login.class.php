<?php
class Login
{
	var $attr;

	function __construct(){
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

	// 일반회원 정보 가져오기
	function getLogin($dbh) {
		try {
			$fail_cnt = FAIL_CNT;
			$user_id = $this->getAddslashes('user_id');
			$user_pwd = hash('sha256', $this->getAddslashes('user_pwd'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$sns_join = $this->getAddslashes('sns');

			if (empty($sns_join)){ 
				$sql = 'SELECT user_idx, user_level_code, user_id, user_name, sns_join FROM member
				                WHERE user_id = :user_id AND user_pwd = :user_pwd AND fail_cnt <= :fail_cnt AND del_state=\'N\' ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64);
				$stmt->bindParam(':fail_cnt', $fail_cnt, PDO::PARAM_INT);
			}else{ //쇼셜 연동으로 가입환 회원이면 처리
				$sql = 'SELECT user_idx, user_level_code, user_id, user_name, sns_join FROM member
						WHERE user_id = :user_id AND sns_join = :sns_join AND fail_cnt <= :fail_cnt AND (sns_join=\'facebook\' OR  sns_join=\'google\' )  AND del_state=\'N\' ' ;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->bindParam(':sns_join', $sns_join, PDO::PARAM_STR, 64);
				$stmt->bindParam(':fail_cnt', $fail_cnt, PDO::PARAM_INT);
			}


			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}

				$visit_date = date('Y-m-d H:i:s', time());
				$sql = 'UPDATE member SET ip_addr = :ip_addr, visit_date = :visit_date, visit_cnt = visit_cnt + 1, fail_cnt = 0 WHERE user_id = :user_id';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
				$stmt->bindParam(':visit_date', $visit_date);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->execute();

				return true;
			}
			else {
				$sql = 'SELECT fail_cnt FROM member WHERE user_id = :user_id';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->execute();

				if ((int)$stmt->fetchColumn() > 5) {
					unset($dbh);
					JS::LocationHref('로그인 5회 이상 실패하여 더이상 접급이 불가능합니다.\r\n관리자에게 문의하여 주세요.', '/member/login.php', 'parent');
					exit();
				}
				else {
					$sql = 'SELECT count(user_idx) FROM member WHERE user_id = :user_id';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
					$stmt->execute();

					if ((int)$stmt->fetchColumn() > 0) {
						$sql = 'UPDATE member SET ip_addr = :ip_addr, fail_cnt = fail_cnt + 1 WHERE user_id = :user_id';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
						$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
						$stmt->execute();
					}
				}

				return false;
			}
		}
		catch(PDOExecption $e) {
			unset($dbh);
			JS::HistoryBack($e->getMessage());
			exit();
		}
	}


	// 관리자 로그인 정보 가져오기
	function getAdminLogin($dbh) {
		try {
			if (self::getIsMaster()) {
				$user_id = hash('sha256', $this->getAddslashes('user_id'));
				$user_type = 1;
			}
			else {
				$user_id = $this->getAddslashes('user_id');
				$user_type = 0;
			}

			$user_pwd = hash('sha256', $this->getAddslashes('user_pwd'));

			$sql = 'CALL up_admin_login_check(:user_id, :user_pwd, :user_type)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 64);
			$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64);
			$stmt->bindParam(':user_type', $user_type, PDO::PARAM_INT, 1);

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
			JS::HistoryBack($e->getMessage());
		}
	}

	//  마스터 유무
	function getIsMaster() {
		return (MASTER === hash('sha256', $this->getAddslashes('user_id'))) ? true : false;
	}

	// 로그인 정보를 리턴
	public static function getLoginCheck($returnUrl){
		session_start(); // 세션 데이터 초기화

		$returnUrl = filter_var($returnUrl, FILTER_SANITIZE_URL);

		if ( isset($_SESSION['user_idx']) ){
			$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
			$user_id = AES256::dec($_SESSION['user_id'], AES_KEY);
			$user_name = AES256::dec($_SESSION['user_name'], AES_KEY);
			$sns_join = AES256::dec($_SESSION['sns_join'], AES_KEY);
			$user_level_code = AES256::dec($_SESSION['user_level_code'], AES_KEY);
			$user_array = array('user_idx' => $user_idx , 'user_id' => $user_id, 'user_name' => $user_name, 'sns_join'=>$sns_join, 'user_level_code'=>$user_level_code );
			return $user_array;
		}else{
			$href = '';
			JS::LocationHref('로그인 후 이용할 수 있습니다.', '/member/login.php?returnUrl='.$returnUrl);
			return false ;
			exit;
		}

	}

	// 글쓰기 / 수정 권한 리턴 // 자기 자신이나 또는 관리자이면 true
	public static function getLoginWriteLevel($user_idx){
		session_start(); // 세션 데이터 초기화
		if ( isset($_SESSION['user_idx']) ){
			if ($user_idx == AES256::dec($_SESSION['user_idx'], AES_KEY) || AES256::dec($_SESSION['user_level_code'], AES_KEY) == 99 ){
				return true;
			}
		}else{
			return false ;
			exit;
		}

	}

}
?>