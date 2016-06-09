<?php
class Join
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

	function setAttr($key, $value) {
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key) {
		//return addslashes($this->attr[$key]);
		//return ($this->attr[$key] == null) ? null : addslashes($this->attr[$key]);

		if (is_array($this->attr[$key])) {
			return array_map('trim', $this->attr[$key]);
		}
		else {
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
	}

	function setHtmlspecialchars($key) {
		while(list($key,$val) = each($this->attr) )
			$this->attr[$key] = htmlspecialchars($val);
	}

	function insert($dbh) {
		try {
			$galleryLevelCode = 60;
			$galleryId = $this->getAddslashes('galleryId');
			$galleryPwd = $this->getAddslashes('galleryPwd');
			$galleryNameKr = $this->getAddslashes('galleryNameKr');
			$galleryNameEn = $this->getAddslashes('galleryNameEn');
			$homepage = $this->getAddslashes('homepage');
			$email = $this->getAddslashes('email');
			$tel = $this->getAddslashes('tel');
			$fax = $this->getAddslashes('fax');
			$contactName = $this->getAddslashes('contactName');
			$contactTel = $this->getAddslashes('contactTel');
			$contactEmail = $this->getAddslashes('contactEmail');
			$zipCode = $this->getAddslashes('zipCode');
			$addr1 = $this->getAddslashes('addr1');
			$addr2 = $this->getAddslashes('addr2');
			$addr1En = $this->getAddslashes('addr1En');
			$lat = $this->getAddslashes('lat');
			$lng = $this->getAddslashes('lng');
			$fileName = $this->getAddslashes('fileName');
			$upfileName = $this->getAddslashes('upfileName');
			$fileName2 = $this->getAddslashes('fileName2');
			$upfileName2 = $this->getAddslashes('upfileName2');
			$parking = $this->getAddslashes('parking');
			$openingHours = $this->getAddslashes('openingHours');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$isApproval = 'N';
			$createDate = date('Y-m-d H:i:s');

			$sql = 'INSERT INTO TB_GALLERY_MEMBER SET
							galleryLevelCode = :galleryLevelCode,
							galleryId = :galleryId,
							galleryNameKr = :galleryNameKr,
							galleryNameEn = :galleryNameEn,
							homepage = :homepage,
							email = :email,
							tel = :tel,
							fax = :fax,
							contactName = :contactName,
							contactTel = :contactTel,
							contactEmail = :contactEmail,
							zipCode = :zipCode,
							addr1 = :addr1,
							addr2 = :addr2,
							addr1En = :addr1En,
							lat = :lat,
							lng = :lng,
							fileName = :fileName,
							upfileName = :upfileName,
							fileName2 = :fileName2,
							upfileName2 = :upfileName2,
							parking = :parking,
							openingHours = :openingHours,
							ipAddr = :ipAddr,
							isApproval = :isApproval,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryLevelCode', $galleryLevelCode, PDO::PARAM_INT, 3);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);
			$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
			$stmt->bindParam(':galleryNameEn', $galleryNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':homepage', $homepage, PDO::PARAM_STR, 255);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':tel', $tel, PDO::PARAM_STR, 30);
			$stmt->bindParam(':fax', $fax, PDO::PARAM_STR, 30);
			$stmt->bindParam(':contactName', $contactName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':contactTel', $contactTel, PDO::PARAM_STR, 30);
			$stmt->bindParam(':contactEmail', $contactEmail, PDO::PARAM_STR, 60);
			$stmt->bindParam(':zipCode', $zipCode, PDO::PARAM_STR, 5);
			$stmt->bindParam(':addr1', $addr1, PDO::PARAM_STR, 255);
			$stmt->bindParam(':addr2', $addr2, PDO::PARAM_STR, 255);
			$stmt->bindParam(':addr1En', $addr1En, PDO::PARAM_STR, 255);
			$stmt->bindParam(':lat', $lat, PDO::PARAM_STR, 20);
			$stmt->bindParam(':lng', $lng, PDO::PARAM_STR, 20);
			$stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR, 255);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':fileName2', $fileName2, PDO::PARAM_STR, 255);
			$stmt->bindParam(':upfileName2', $upfileName2, PDO::PARAM_STR, 25);
			$stmt->bindParam(':parking', $parking, PDO::PARAM_STR, 100);
			$stmt->bindParam(':openingHours', $openingHours, PDO::PARAM_STR, 100);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
			$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			if ($stmt->execute()) {
				return array(true, 'success');
			}
			else {
				return array(false, 'error');
			}
		}
		catch(Exception $e) {
			echo 'Error:'.$e->getMessage();
			return array(false, 'error');
		}
	}

	function chkAccount($dbh) {
		try {
			$galleryId = $this->getAddslashes('galleryId');
			$sql = 'SELECT COUNT(galleryIdx) FROM TB_GALLERY_MEMBER WHERE galleryId = :galleryId';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);

			if ($stmt->execute()) {
				if ((int)$stmt->fetchColumn() === 0) {
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
		catch(Exception $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

} // End Class
