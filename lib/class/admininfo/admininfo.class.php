<?php
class Admininfo
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

	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$member_idx = $this->getAddslashes('member_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$site_name = $this->getAddslashes('site_name');
			$site_url = $this->getAddslashes('site_url');
			$user_id = $this->getAddslashes('user_id');
			//$user_pwd = $this->getAddslashes('user_pwd');
			$user_pwd = hash('sha256', $this->getAddslashes('user_pwd'));
			$receive_email1 = $this->getAddslashes('receive_email1');
			$receive_email1_state = $this->getAddslashes('receive_email1_state');
			$receive_email2 = $this->getAddslashes('receive_email2');
			$receive_email2_state = $this->getAddslashes('receive_email2_state');

			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$reg_date = date('Y-m-d H:i:s', time());

			
			$stmt = $dbh->prepare('SELECT count(user_idx) FROM member where user_idx != :user_idx AND user_id = :user_id');
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();

			if ($cnt > 0) {
				throw new Exception('이미 가입된 아이디 입니다.');
				exit;
			}
			
			$sql = 'UPDATE  site_info SET
							site_name = :site_name, 
							site_url = :site_url, 
							receive_email1 = :receive_email1, 
							receive_email1_state = :receive_email1_state, 
							receive_email2 = :receive_email2, 
							receive_email2_state = :receive_email2_state,
							reg_date= :reg_date
						WHERE member_idx = :member_idx';


			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':site_name',$site_name,										PDO::PARAM_STR, 30);
			$stmt->bindParam(':site_url',$site_url,													PDO::PARAM_STR, 30);
			$stmt->bindParam(':receive_email1',$receive_email1,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':receive_email1_state',$receive_email1_state,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':receive_email2',$receive_email2,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':receive_email2_state',$receive_email2_state,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':reg_date',$reg_date			,									PDO::PARAM_STR, 30);
			$stmt->bindParam(':member_idx',$member_idx,									PDO::PARAM_STR, 30);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				$bTransaction = false;
				throw new Exception('error');
			}
			
			if (empty( trim($this->getAddslashes('user_pwd') ) ) ){  //비밀번호를 수정하지 않을 경우
				$user_pwd = NULL; 
				$sql_pwd = NULL;
			}else{  // //비밀번호를 수정할 경우
				$user_pwd = hash('sha256', trim($this->getAddslashes('user_pwd')) );  
				$sql_pwd = ' user_pwd = :user_pwd , '; //패스워드 수정 쿼리 작성
			} 

			$sql = 'UPDATE  member SET
							user_id = :user_id, 
							'.$sql_pwd.'
							ip_addr = :ip_addr, 
							modify_date= :modify_date
						WHERE user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_id',$user_id,				PDO::PARAM_STR, 30);
			if (!empty($user_pwd)){
				$stmt->bindParam(':user_pwd',$user_pwd,			PDO::PARAM_STR, 30);
			}
			$stmt->bindParam(':ip_addr',$ip_addr,				PDO::PARAM_STR, 30);
			$stmt->bindParam(':modify_date',$reg_date,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':user_idx',$user_idx,				PDO::PARAM_INT);


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
}

?>