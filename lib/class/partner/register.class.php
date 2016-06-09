<?php
class Register
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
			$isApproval = $this->getAddslashes('isApproval');
			$createDate = date('Y-m-d H:i:s');
			$mkey = MYSQL_KEY;

			$sql = 'INSERT INTO TB_GALLERY_MEMBER SET
							galleryLevelCode = :galleryLevelCode,
							galleryId = :galleryId,
							galleryPwd = HEX(AES_ENCRYPT(:galleryPwd, :mkey)),
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
			$stmt->bindParam(':galleryPwd', $galleryPwd, PDO::PARAM_STR, 128);
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
			$stmt->bindParam(':mkey', $mkey, PDO::PARAM_STR);

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

	function update($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
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
			$isApproval = $this->getAddslashes('isApproval');
			$modifyDate = date('Y-m-d H:i:s');
			$mkey = MYSQL_KEY;

			$sql = 'UPDATE TB_GALLERY_MEMBER SET
							galleryId = :galleryId,
							galleryPwd = HEX(AES_ENCRYPT(:galleryPwd, :mkey)),
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
							modifyDate = :modifyDate
						WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);
			$stmt->bindParam(':galleryPwd', $galleryPwd, PDO::PARAM_STR, 128);
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
			$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
			$stmt->bindParam(':mkey', $mkey, PDO::PARAM_STR);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return array(true, 'success');
			}
			else {
				return array(false, 'error');
			}
		}
		catch(PDOException $e) {
			echo 'Error:'. $e->getMessage();
			return array(false, 'error');
		}
	}

	function delete($dbh) {
		try {
			$idx = $this->getAddslashes('idx');
			$sql = 'DELETE FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return array(true, 'success');
			}
			else {
				return array(false, 'error');
			}
		}
		catch(PDOException $e) {
			//echo 'Error: '.$e->getMessage();
			return array(false, 'error');
		}
	}


	function deletes($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();
			$idxs = $this->getAddslashes('idxs');
			$sql = 'DELETE FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $idx, PDO::PARAM_INT, 11);

			foreach($idxs as $idx) {
				$bTransaction = true;
				$stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				$dbh->rollback();
				return array(false, 'error');
			}
		}
		catch(PDOException $e) {
			$dbh->rollback();
			//echo 'Error: '.$e->getMessage();
			return array(false, 'error');
		}
	}

	function getList($dbh) {
		try {
			$list = false;
			$totalCnt = 0;
			$galleryLevelCode = 60;
			$pg = (!empty($this->getAddslashes('pg'))) ? (int)$this->getAddslashes('pg') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10;
			$gnm = $this->getAddslashes('gnm');
			$cnm = $this->getAddslashes('cnm');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT galleryIdx, galleryNameKr, galleryNameEn, contactName, tel, contactTel, isApproval FROM TB_GALLERY_MEMBER ';

			if (!empty($gnm) && !empty($cnm)) {
				if ($st === 0) {
					$subQuery = ' AND (galleryNameKr LIKE :galleryNameKr AND contactName LIKE :contactName) ';
				}
				else {
					$subQuery = ' AND (galleryNameKr LIKE :galleryNameKr OR contactName LIKE :contactName) ';
				}
				$galleryNameKr = $gnm."%";
				$contactName = $cnm."%";
			}
			else if (!empty($gnm) && empty($cnm)) {
				if ($st === 0) {
					$subQuery = ' AND galleryNameKr LIKE :galleryNameKr ';
				}
				else {
					$subQuery = ' OR galleryNameKr LIKE :galleryNameKr ';
				}
				$galleryNameKr = $gnm."%";
			}
			else if (empty($gnm) && !empty($cnm)) {
				if ($st === 0) {
					$subQuery = ' AND contactName LIKE :contactName ';
				}
				else {
					$subQuery = ' OR contactName LIKE :contactName ';
				}
				$contactName = $cnm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE galleryLevelCode = :galleryLevelCode '.$subQuery.' ORDER BY galleryIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryLevelCode', $galleryLevelCode, PDO::PARAM_INT, 3);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($gnm) && !empty($cnm)) {
				$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
				$stmt->bindParam(':contactName', $contactName, PDO::PARAM_STR, 50);
			}
			else if (!empty($gnm) && empty($cnm)) {
				$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
			}
			else if (empty($gnm) && !empty($cnm)) {
				$stmt->bindParam(':contactName', $contactName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(galleryIdx) FROM TB_GALLERY_MEMBER WHERE galleryLevelCode = :galleryLevelCode '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryLevelCode', $galleryLevelCode, PDO::PARAM_INT, 3);

				if (!empty($gnm) && !empty($cnm)) {
					$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
					$stmt->bindParam(':contactName', $contactName, PDO::PARAM_STR, 50);
				}
				else if (!empty($gnm) && empty($cnm)) {
					$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
				}
				else if (empty($gnm) && !empty($cnm)) {
					$stmt->bindParam(':contactName', $contactName, PDO::PARAM_STR, 50);
				}

				if (!empty($bd) && !empty($ed)) {
					$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
					$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
				}

				if ($stmt->execute()) {
						$totalCnt = $stmt->fetchColumn();
				}
			}
			return array($list, $totalCnt);
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getEdit($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$mkey = MYSQL_KEY;
			$sql = ' SELECT
							galleryIdx,
							galleryId,
							AES_DECRYPT(UNHEX(galleryPwd), :mkey) AS galleryPwd,
							galleryNameKr,
							galleryNameEn,
							homepage,
							email,
							tel,
							fax,
							contactName,
							contactTel,
							contactEmail,
							zipCode,
							addr1,
							addr2,
							addr1En,
							lat,
							lng,
							fileName,
							upfileName,
							fileName2,
							upfileName2,
							parking,
							openingHours,
							ipAddr,
							isApproval
						FROM TB_GALLERY_MEMBER
						WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':mkey', $mkey, PDO::PARAM_STR);

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
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getTotalCount($dbh) {
		try {
			$category = $this->getAddslashes('ct');
			$isDisplay = 'Y';
			//echo "category:$category";

			if (!empty($category)) {
				//$category = "%".$category."%";
				//$sql = 'SELECT COUNT(newsIdx) FROM TB_GALLERY_MEMBER WHERE category = :category';
				//$sql = 'SELECT COUNT(newsIdx) FROM TB_GALLERY_MEMBER WHERE mainCategory  LIKE :category';
				$sql = 'SELECT COUNT(newsIdx) FROM TB_GALLERY_MEMBER WHERE mainCategory = :mainCategory AND isDisplay = :isDisplay';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':mainCategory', $category, PDO::PARAM_INT, 1);
			}
			else {
				$sql = 'SELECT COUNT(newsIdx) FROM TB_GALLERY_MEMBER WHERE isDisplay = :isDisplay';
				$stmt = $dbh->prepare($sql);
			}

			$stmt->bindParam(':isDisplay', $isDisplay, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return (int)$stmt->fetchColumn();
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
				
	//2016-04-27 승인대기 카운트  LYT
	function getApprovalNCount($dbh) {
		try {
			$sql = 'SELECT COUNT(*) FROM TB_GALLERY_MEMBER WHERE isApproval = \'N\'';
			$stmt = $dbh->prepare($sql);
			
			if ($stmt->execute() && $stmt->rowCount()) {
				return (int)$stmt->fetchColumn();
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

	// 이미지 파일명  가져오기
	function getFileInfo($dbh, $galleryIdx, $fileIdx = null) {
		try {
			if (is_null($fileIdx)) {
				$sql = 'SELECT fileName, upfileName, fileName2, upfileName2 FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			}
			else {
				$sql = 'SELECT fileName, upfileName, fileName2, upfileName2 FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			}

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$aryFileInfo = $this->getFileInfo($dbh, $galleryIdx);
			$fileName = null;
			$upfileName = null;
			$fileName2 = null;
			$upfileName2 = null;

			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				if ($attach === 'logo') {
					$sql = 'UPDATE TB_GALLERY_MEMBER SET
									fileName = :fileName,
									upfileName = :upfileName
								WHERE galleryIdx = :galleryIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR, 255);
					$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
					$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						foreach($aryFileInfo as $row) {
							if (!empty($row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.$row['upfileName']);
								$bTransaction = true;
							}
						}
					}
				}
				else if ($attach === 'biz') {
					$sql = 'UPDATE TB_GALLERY_MEMBER SET
									fileName2 = :fileName2,
									upfileName2 = :upfileName2
								WHERE galleryIdx = :galleryIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':fileName2', $fileName2, PDO::PARAM_STR, 255);
					$stmt->bindParam(':upfileName2', $upfileName2, PDO::PARAM_STR, 25);
					$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						foreach($aryFileInfo as $row) {
							if (!empty($row['upfileName2'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.$row['upfileName2']);
								$bTransaction = true;
							}
						}
					}

				}
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}
			return $bTransaction;
		}
		catch(PDOException $e) {
			$dbh->rollback();
			echo 'Error:'.$e->getMessage();
			return false;
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
