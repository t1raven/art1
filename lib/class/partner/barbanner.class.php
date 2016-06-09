<?php
class Barbanner
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


	/*
	function update($dbh) {
		try {
			$bannerIdx = $this->getAddslashes('idx');
			$fileName = $this->getAddslashes('fileName');
			$upfileName = $this->getAddslashes('upfileName');
			$link = $this->getAddslashes('link');
			$isDisplay = $this->getAddslashes('isDisplay');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$modifyDate = date('Y-m-d H:i:s');

			$sql = 'UPDATE TB_GALLERY_BAR_BANNER SET
							fileName = :fileName,
							upfileName = :upfileName,
							link = :link,
							isDisplay = :isDisplay,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
						WHERE bannerIdx = :bannerIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR, 255);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':link', $link, PDO::PARAM_STR, 255);
			$stmt->bindParam(':isDisplay', $isDisplay, PDO::PARAM_STR, 1);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $modifyDate, PDO::PARAM_STR);
			$stmt->bindParam(':bannerIdx', $bannerIdx, PDO::PARAM_INT, 10);


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
	*/

	function update($dbh) {
		try {
			$aBannerIdx = $this->getAddslashes('bannerIdx');
			$aFileName = $this->getAddslashes('fileName');
			$aUpFileName = $this->getAddslashes('upfileName');
			$aLink = $this->getAddslashes('link');
			$aOrders = $this->getAddslashes('orders');
			$oIsDisplay = $this->getAddslashes('isDisplay');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$modifyDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();

			foreach($aBannerIdx as $key => $bannerIdx) {
				$sql = 'UPDATE TB_GALLERY_BAR_BANNER SET
								fileName = :fileName,
								upfileName = :upfileName,
								link = :link,
								orders = :orders,
								isDisplay = :isDisplay,
								ipAddr = :ipAddr,
								modifyDate = :modifyDate
							WHERE bannerIdx = :bannerIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileName', $aFileName[$key], PDO::PARAM_STR, 255);
				$stmt->bindParam(':upfileName', $aUpFileName[$key], PDO::PARAM_STR, 25);
				$stmt->bindParam(':link', $aLink[$key], PDO::PARAM_STR, 255);
				$stmt->bindParam(':orders', $aOrders[$key], PDO::PARAM_INT, 3);
				$stmt->bindParam(':isDisplay', $oIsDisplay[$key], PDO::PARAM_STR, 1);
				$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
				$stmt->bindParam(':modifyDate', $modifyDate, PDO::PARAM_STR);
				$stmt->bindParam(':bannerIdx', $bannerIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}
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
			echo 'Error:'. $e->getMessage();
			return array(false, 'error');
		}
	}


	// 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		try {
			$fileName = null;
			$upfileName = null;
			$bannerIdx = $this->getAddslashes('idx');

			if ($attach === 'banner') {
				$aryFileInfo = $this->getFileInfo($dbh);
			}
			else {
				$aryFileInfo = null;
			}

			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				if ($attach === 'banner') {
					$sql = 'UPDATE TB_GALLERY_BAR_BANNER SET
									fileName = :fileName,
									upfileName = :upfileName
								WHERE bannerIdx = :bannerIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR, 255);
					$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
					$stmt->bindParam(':bannerIdx', $bannerIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						if (is_array($aryFileInfo)) {
							foreach($aryFileInfo as $row) {
								if (!empty($row['upfileName'])) {
									if (file_exists(ROOT.galleriesBannerUploadPath.$row['upfileName'])) {
										LIB_FILE::DeleteFile(ROOT.galleriesBannerUploadPath.$row['upfileName']);
										$bTransaction = true;
									}
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
		}
		catch(PDOException $e) {
			$dbh->rollback();
			echo 'Error: '.$e->getMessage();
			return false;
		}

	}

	// 이미지 파일명  가져오기
	function getFileInfo($dbh) {
		try {
			$bannerIdx = $this->getAddslashes('idx');
			$sql = 'SELECT upfileName FROM TB_GALLERY_BAR_BANNER WHERE bannerIdx = :bannerIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bannerIdx', $bannerIdx, PDO::PARAM_INT, 10);

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

	function getEdit($dbh) {
		try {
			$bannerIdx = $this->getAddslashes('idx');
			$sql = 'SELECT
							bannerIdx,
							fileName,
							upfileName,
							link,
							orders,
							isDisplay
						FROM TB_GALLERY_BAR_BANNER
						ORDER BY orders ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bannerIdx', $bannerIdx, PDO::PARAM_INT, 10);

			/*
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
			*/

			if ($stmt->execute() && $stmt->rowCount()) {
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

} // End Class
