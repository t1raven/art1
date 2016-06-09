<?php
class About
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

	function update($dbh) {
		try {
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$galleryId = $this->getAddslashes('galleryId');
			$galleryPwd = $this->getAddslashes('galleryPwd');
			$galleryNameKr = $this->getAddslashes('galleryNameKr');
			$galleryNameEn = $this->getAddslashes('galleryNameEn');
			$homepage = $this->getAddslashes('homepage');
			$email = $this->getAddslashes('email');
			$tel = $this->getAddslashes('tel');
			$fax = $this->getAddslashes('fax');
			$zipCode = $this->getAddslashes('zipCode');
			$addr1 = $this->getAddslashes('addr1');
			$addr2 = $this->getAddslashes('addr2');
			$addr1En = $this->getAddslashes('addr1En');
			$lat = $this->getAddslashes('lat');
			$lng = $this->getAddslashes('lng');
			$introduction = strip_tags($this->attr['introduction']);
			$facebook = $this->getAddslashes('facebook');
			$instagram = $this->getAddslashes('instagram');
			$google = $this->getAddslashes('google');
			$naver = $this->getAddslashes('naver');
			$logoImg = $this->getAddslashes('logoImg');
			$mainImg = $this->getAddslashes('mainImg');
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
							zipCode = :zipCode,
							addr1 = :addr1,
							addr2 = :addr2,
							addr1En = :addr1En,
							lat = :lat,
							lng = :lng,
							introduction = :introduction,
							facebook = :facebook,
							instagram = :instagram,
							google = :google,
							naver = :naver,
							logoImg = :logoImg,
							mainImg = :mainImg,
							parking = :parking,
							openingHours = :openingHours,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
						WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryId', $galleryId, PDO::PARAM_STR, 60);
			$stmt->bindParam(':galleryPwd', $galleryPwd, PDO::PARAM_STR, 128);
			$stmt->bindParam(':galleryNameKr', $galleryNameKr, PDO::PARAM_STR, 50);
			$stmt->bindParam(':galleryNameEn', $galleryNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':homepage', $homepage, PDO::PARAM_STR, 255);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':tel', $tel, PDO::PARAM_STR, 20);
			$stmt->bindParam(':fax', $fax, PDO::PARAM_STR, 20);
			$stmt->bindParam(':zipCode', $zipCode, PDO::PARAM_STR, 5);
			$stmt->bindParam(':addr1', $addr1, PDO::PARAM_STR, 255);
			$stmt->bindParam(':addr2', $addr2, PDO::PARAM_STR, 255);
			$stmt->bindParam(':addr1En', $addr1En, PDO::PARAM_STR, 255);
			$stmt->bindParam(':lat', $lat, PDO::PARAM_STR, 20);
			$stmt->bindParam(':lng', $lng, PDO::PARAM_STR, 20);
			$stmt->bindParam(':introduction', $introduction, PDO::PARAM_STR);
			$stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR, 50);
			$stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR, 50);
			$stmt->bindParam(':google', $google, PDO::PARAM_STR, 50);
			$stmt->bindParam(':naver', $naver, PDO::PARAM_STR, 50);
			$stmt->bindParam(':logoImg', $logoImg, PDO::PARAM_STR, 25);
			$stmt->bindParam(':mainImg', $mainImg, PDO::PARAM_STR, 25);
			$stmt->bindParam(':parking', $parking, PDO::PARAM_STR, 100);
			$stmt->bindParam(':openingHours', $openingHours, PDO::PARAM_STR, 100);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
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

// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $flag, $attach) {
		$upfileName = null;
		$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);

		if ($flag === 'logo') {
			$aryFileInfo = $this->getLogoImgInfo($dbh, $galleryIdx);
		}
		else if ($flag === 'main') {
			$aryFileInfo = $this->getMainImgInfo($dbh, $galleryIdx);
		}

		$bTransaction = false;
		$dbh->beginTransaction();

		if (!empty($attach)) {
			if ($flag === 'logo') {
				$sql = 'UPDATE TB_GALLERY_MEMBER SET logoImg = :logoImg WHERE galleryIdx = :galleryIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':logoImg', $logoImg, PDO::PARAM_STR, 25);
			}
			else {
				$sql = 'UPDATE TB_GALLERY_MEMBER SET mainImg = :mainImg WHERE galleryIdx = :galleryIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':mainImg', $mainImg, PDO::PARAM_STR, 25);
			}
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['upfileName'])) {
						LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.$row['upfileName']);
						if ($flag === 'main') {
							if (file_exists(ROOT.galleriesAboutUploadPath.'l_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.'l_'.$row['upfileName']);
							}
						}
						$bTransaction = true;
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

	// Ajax 통한 임시 첨부파일 삭제
	function deleteTempAttachAjax($attach) {
		if (!empty($attach)) {
			if (LIB_FILE::DeleteFile(ROOT.tempUploadPath.$attach)) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	// 로고 이미지 파일명  가져오기
	function getLogoImgInfo($dbh, $galleryIdx) {
		try {
			$sql = 'SELECT logoImg AS upfileName FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

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

		// 메인 이미지 파일명  가져오기
	function getMainImgInfo($dbh, $galleryIdx) {
		try {
			$sql = 'SELECT mainImg AS upfileName FROM TB_GALLERY_MEMBER WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

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
					$subQuery = ' AND (galleryNamekr LIKE :galleryNameKr AND contactName LIKE :contactName) ';
				}
				else {
					$subQuery = ' AND (galleryNamekr LIKE :galleryNameKr OR contactName LIKE :contactName) ';
				}
				$galleryNameKr = $gnm."%";
				$contactName = $cnm."%";
			}
			else if (!empty($gnm) && empty($cnm)) {
				if ($st === 0) {
					$subQuery = ' AND galleryNamekr LIKE :galleryNamekr ';
				}
				else {
					$subQuery = ' OR galleryNamekr LIKE :galleryNamekr ';
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
				$stmt->bindParam(':galleryNamekr', $galleryNamekr, PDO::PARAM_STR, 50);
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
				$stmt->bindParam(':galleryNamekr', $galleryNamekr, PDO::PARAM_STR, 50);
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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$mkey = MYSQL_KEY;
			$sql = ' SELECT
							galleryId,
							AES_DECRYPT(UNHEX(galleryPwd), :mkey) AS galleryPwd,
							galleryNameKr,
							galleryNameEn,
							homepage,
							email,
							tel,
							fax,
							zipCode,
							addr1,
							addr2,
							addr1En,
							lat,
							lng,
							introduction,
							facebook,
							instagram,
							google,
							naver,
							logoImg,
							mainImg,
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









} // End Class
