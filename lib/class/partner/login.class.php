<?php
class Login
{
	var $attr;

	function __construct(){
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

		if (is_null($this->attr[$key]) || trim($this->attr[$key]) == '') {
		//if (is_null($this->attr[$key])) {
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
			$galleryId = $this->getAddslashes('galleryId');
			$galleryPwd = $this->getAddslashes('galleryPwd');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$visitDate = date('Y-m-d H:i:s');
			$mkey = MYSQL_KEY;

			// 회원
			if ($this->isMember($dbh)) {
				$sql = 'SELECT galleryIdx, galleryLevelCode, galleryId, galleryNameKr FROM TB_GALLERY_MEMBER WHERE galleryId = :galleryId AND AES_DECRYPT(UNHEX(galleryPwd), :mkey) = :galleryPwd';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);
				$stmt->bindParam(':galleryPwd', $galleryPwd, PDO::PARAM_STR, 64);
				$stmt->bindParam(':mkey', $mkey, PDO::PARAM_STR);

				if ($stmt->execute() && $stmt->rowCount()) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					foreach($row as $key => $val) {
						$this->setAttr($key, $val);
					}

					if ($this->setVisitCnt($dbh)) {
						return array(true, 0);
					}
				}
				else {
					$failCnt = $this->getFailCnt($dbh);
					$this->setFailCnt($dbh);
					return array(false, $failCnt + 1);

					/*
					// 로그인 실패 회수 제한 초과
					if ($failCnt > FAIL_LIMIT_CNT) {
						$this->setFailCnt($dbh);
						return array(false, $failCnt + 1);
					}
					else {
						// 비밀번호가 일치하지 않는 사용자
						$this->setFailCnt($dbh);
						return array(false, $failCnt + 1);
					}
					*/
				}
			}
			// 비회원
			else {
				// IP를 조회하여 동일 IP의 5회 오류시 자동 접근제어
				return array(false, 0);
			}
		}
		catch(PDOException $e) {
			//echo 'Error: '.$e->getMessage());
			return array(false, 0);
		}
	}

	function isMember($dbh) {
		try {
			$galleryId = $this->getAddslashes('galleryId');
			$sql = 'SELECT COUNT(galleryIdx) FROM TB_GALLERY_MEMBER WHERE galleryId = :galleryId';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);

			if ($stmt->execute() && $stmt->rowCount()) {
				if ((int)$stmt->fetchColumn() > 0) {
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
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function setVisitCnt($dbh) {
		try {
			$galleryId = $this->getAddslashes('galleryId');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$visitDate = date('Y-m-d H:i:s');
			$sql = 'UPDATE TB_GALLERY_MEMBER SET ipAddr = :ipAddr, visitDate = :visitDate, visitCnt = visitCnt + 1, failCnt = 0 WHERE galleryId = :galleryId';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
			$stmt->bindParam(':visitDate', $visitDate);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			return false;
		}
	}

	function getFailCnt($dbh) {
		try {
			$galleryId = $this->getAddslashes('galleryId');
			$sql = 'SELECT failCnt FROM TB_GALLERY_MEMBER WHERE galleryId = :galleryId';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);

			if ($stmt->execute() && $stmt->rowCount()) {
				return (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			return false;
		}
	}

	function setFailCnt($dbh) {
		try {
			$galleryId = $this->getAddslashes('galleryId');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$visitDate = date('Y-m-d H:i:s');
			$sql = 'UPDATE TB_GALLERY_MEMBER SET ipAddr = :ipAddr, visitDate = :visitDate, visitCnt = visitCnt + 1, failCnt = failCnt + 1 WHERE galleryId = :galleryId';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
			$stmt->bindParam(':visitDate', $visitDate);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			return false;
		}
	}

} // End Class