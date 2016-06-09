<?php
class Artworks
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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');
			$artistNameEn = $this->getAddslashes('artistNameEn');
			$worksName = strip_tags($this->getAddslashes('worksName'));
			$worksNameEn = strip_tags($this->getAddslashes('worksNameEn'));
			$makingDate = $this->getAddslashes('makingDate');
			$material = strip_tags($this->getAddslashes('material'));
			$height = $this->getAddslashes('height');
			$width = $this->getAddslashes('width');
			$depth = $this->getAddslashes('depth');
			$aUpfileName = $this->getAddslashes('upfileName');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'INSERT INTO TB_GALLERY_WORKS SET
							galleryIdx = :galleryIdx,
							artistIdx = :artistIdx,
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							worksName = :worksName,
							worksNameEn = :worksNameEn,
							makingDate = :makingDate,
							material = :material,
							height = :height,
							width = :width,
							depth = :depth,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
			$stmt->bindParam(':worksNameEn', $worksNameEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':makingDate', $makingDate, PDO::PARAM_STR, 4);
			$stmt->bindParam(':material', $material, PDO::PARAM_STR, 255);
			$stmt->bindParam(':height', $height, PDO::PARAM_INT, 5);
			$stmt->bindParam(':width', $width, PDO::PARAM_INT, 5);
			$stmt->bindParam(':depth', $depth, PDO::PARAM_INT, 5);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$worksIdx = $dbh->lastInsertId();
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $upfileName) {
						$sql = 'INSERT INTO TB_GALLERY_WORKS_FILE SET
										worksIdx = :worksIdx,
										upfileName = :upfileName,
										createDate = :createDate';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
						$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_INT, 10);
						$stmt->bindParam(':createDate', $createDate, PDO::PARAM_INT, 10);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
				}
				else {
					$bTransaction = true;
				}
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
				return array(false, 'error');
			}
		}
		catch(Exception $e) {
			$dbh->rollback();
			echo 'Error:'.$e->getMessage();
			return array(false, 'error');
		}
	}

	function update($dbh) {
		try {
			$worksIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');
			$artistNameEn = $this->getAddslashes('artistNameEn');
			$worksName = strip_tags($this->getAddslashes('worksName'));
			$worksNameEn = strip_tags($this->getAddslashes('worksNameEn'));
			$makingDate = $this->getAddslashes('makingDate');
			$material = strip_tags($this->getAddslashes('material'));
			$height = $this->getAddslashes('height');
			$width = $this->getAddslashes('width');
			$depth = $this->getAddslashes('depth');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$date = date('Y-m-d H:i:s');
			$aFileIdx = $this->getAddslashes('fileIdx');
			$aUpfileName = $this->getAddslashes('upfileName');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'UPDATE TB_GALLERY_WORKS SET
							artistIdx = :artistIdx,
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							worksName = :worksName,
							worksNameEn = :worksNameEn,
							makingDate = :makingDate,
							material = :material,
							height = :height,
							width = :width,
							depth = :depth,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
					WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
			$stmt->bindParam(':worksNameEn', $worksNameEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':makingDate', $makingDate, PDO::PARAM_STR, 4);
			$stmt->bindParam(':material', $material, PDO::PARAM_STR, 255);
			$stmt->bindParam(':height', $height, PDO::PARAM_INT, 5);
			$stmt->bindParam(':width', $width, PDO::PARAM_INT, 5);
			$stmt->bindParam(':depth', $depth, PDO::PARAM_INT, 5);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $modifyDate, PDO::PARAM_STR);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $key => $upfileName) {
						if (!empty($aFileIdx[$key])) {
							$sql = '  UPDATE TB_GALLERY_WORKS_FILE SET
												upfileName = :upfileName,
												modifyDate = :modifyDate
										WHERE fileIdx = :fileIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_INT, 10);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_INT, 10);
							$stmt->bindParam(':fileIdx', $aFileIdx[$key], PDO::PARAM_INT, 10);
						}
						else {
							$sql = 'INSERT INTO TB_GALLERY_WORKS_FILE SET
											worksIdx = :worksIdx,
											upfileName = :upfileName,
											createDate = :createDate';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_INT, 10);
							$stmt->bindParam(':createDate', $date, PDO::PARAM_INT, 10);
						}

						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
				}
				else {
					$bTransaction = true;
				}
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
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
			$worksIdx = $this->getAddslashes('idx');
			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'DELETE FROM TB_GALLERY_WORKS WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($this->attachFileDelete($dbh, $worksIdx)) {
				if ($stmt->execute()) {
					$bTransaction = true;
				}
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
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
			$worksIdxs = $this->getAddslashes('idxs');
			//print_r($worksIdxs);
			if (is_array($worksIdxs)) {
				$bTransaction = false;
				$dbh->beginTransaction();
				foreach($worksIdxs as $worksIdx) {
					$sql = 'DELETE FROM TB_GALLERY_WORKS WHERE worksIdx = :worksIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

					if ($this->attachFileDelete($dbh, $worksIdx)) {
						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
					else {
						$bTransaction = false;
						break;
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
			else {
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
	function deleteAttachAjax($dbh, $attach) {
		/*
		$upfileName = null;
		$artistIdx = $this->getAddslashes('idx');
		$aryFileInfo = $this->getFileInfo($dbh, $artistIdx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if (!empty($attach)) {
			$sql = 'UPDATE TB_GALLERY_WORKS_FILE SET upfileName = :upfileName WHERE artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['upfileName'])) {
						LIB_FILE::DeleteFile(ROOT.galleriesArtworksUploadPath.$row['upfileName']);
						$bTransaction = true;
					}
				}
			}
		}
		*/

		$worksIdx = $this->getAddslashes('idx');
		$fileIdx = $this->getAddslashes('fidx');
		$aryFileInfo = $this->getFileInfo($dbh, $worksIdx, $fileIdx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if (!empty($attach)) {
			$sql = 'DELETE TB_GALLERY_WORKS_FILE WHERE fileIdx = :fileIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['upfileName'])) {
						LIB_FILE::DeleteFile(ROOT.galleriesArtworksUploadPath.$row['upfileName']);
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

	// 이미지 파일명  가져오기
	function getFileInfo($dbh, $worksIdx, $fileIdx = null) {
		try {
			if (is_null($fileIdx)) {
				$sql = 'SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = :worksIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
			}
			else {
				$sql = 'SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE fileIdx = :fileIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);
			}

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 물리적 파일 삭제
	function attachFileDelete($dbh, $worksIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getFileInfo($dbh, $worksIdx);

			if (is_array($aryFileInfo)) {
				$sql = 'DELETE FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = :worksIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

				if ($bTransaction) {
					foreach($aryFileInfo as $row) {
						if (!empty($row['upfileName'])) {
							LIB_FILE::DeleteFile(ROOT.galleriesArtworksUploadPath.$row['upfileName']);
						}
					}
				}
			}
			return $bTransaction;
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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$pg = (!empty($this->getAddslashes('pg'))) ? (int)$this->getAddslashes('pg') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10;
			$nm = $this->getAddslashes('nm');
			$wnm = $this->getAddslashes('wnm');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT worksIdx, artistName, artistNameEn, worksName, worksNameEn, createDate FROM TB_GALLERY_WORKS ';

			if (!empty($wnm) && !empty($nm)) {
				if ($st === 0) {
					$subQuery = ' AND (worksName LIKE :worksName AND artistName LIKE :artistName) ';
				}
				else {
					$subQuery = ' AND (worksName LIKE :worksName OR artistName LIKE :artistName) ';
				}
				$worksName = $wnm."%";
				$artistName = $nm."%";
			}
			else if (!empty($wnm) && empty($nm)) {
				$subQuery = ' AND worksName LIKE :worksName ';
				$worksName = $wnm."%";
			}
			else if (empty($wnm) && !empty($nm)) {
				$subQuery = ' AND artistName LIKE :artistName ';
				$artistName = $nm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  galleryIdx = :galleryIdx '.$subQuery.' ORDER BY worksIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($wnm) && !empty($nm)) {
				$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}
			else if (!empty($wnm) && empty($nm)) {
				$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
			}
			else if (empty($wnm) && !empty($nm)) {
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(worksIdx) FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

				if (!empty($wnm) && !empty($nm)) {
					$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
					$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
				}
				else if (!empty($wnm) && empty($nm)) {
					$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
				}
				else if (empty($wnm) && !empty($nm)) {
					$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
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
			$worksIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$sql = ' SELECT
							worksIdx,
							artistIdx,
							artistName,
							artistNameEn,
							worksName,
							worksNameEn,
							makingDate,
							material,
							height,
							width,
							depth
						FROM TB_GALLERY_WORKS
						WHERE worksIdx = :worksIdx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

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

	function isExist($dbh) {
		try {
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$sql = 'SELECT COUNT(artistIdx) FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

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
	function getWorksFileInfo($dbh) {
		try {
			$worksIdx = $this->getAddslashes('idx');
			$sql = 'SELECT fileIdx, upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function searchArtworks($dbh) {
		try {
			$worksName = $this->getAddslashes('worksName');

			if (!empty($worksName)) {
				$worksName = $worksName."%";
				$sql = '  SELECT
								a.worksIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksName, a.worksNameEn, a.makingDate, (SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
							FROM TB_GALLERY_WORKS AS a
							WHERE a.artistName LIKE :artistName OR a.worksName LIKE :worksName';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':artistName', $worksName, PDO::PARAM_STR, 100);
				$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

} // End Class