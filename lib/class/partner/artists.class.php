<?php
class Artists
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
			$artistName = str_replace(' ', '', strip_tags($this->getAddslashes('artistName')));
			$artistNameEn =strip_tags($this->getAddslashes('artistNameEn'));
			$upfileName = $this->getAddslashes('upfileName');
			$birthday = $this->getAddslashes('birthday');
			$introduction = strip_tags($this->attr['introduction']);
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$sql = 'INSERT INTO TB_GALLERY_ARTIST SET
							galleryIdx = :galleryIdx,
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							upfileName = :upfileName,
							birthday = :birthday,
							introduction = :introduction,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR, 4);
			$stmt->bindParam(':introduction', $introduction, PDO::PARAM_STR);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
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

	function update($dbh) {
		try {
			$artistIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$artistName = str_replace(' ', '', strip_tags($this->getAddslashes('artistName')));
			$artistNameEn = strip_tags($this->getAddslashes('artistNameEn'));
			$upfileName = $this->getAddslashes('upfileName');
			$birthday = $this->getAddslashes('birthday');
			$introduction = strip_tags($this->attr['introduction']);
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$sql = 'UPDATE TB_GALLERY_ARTIST SET
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							upfileName = :upfileName,
							birthday = :birthday,
							introduction = :introduction,
							ipAddr = :ipAddr,
							createDate = :createDate
					WHERE artistIdx = :artistIdx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR, 4);
			$stmt->bindParam(':introduction', $introduction, PDO::PARAM_STR);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 11);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

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
			$artistIdx = $this->getAddslashes('idx');
			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'DELETE FROM TB_GALLERY_ARTIST WHERE artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($this->attachFileDelete($dbh, $artistIdx)) {
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
			$artistIdxs = $this->getAddslashes('idxs');
			//print_r($artistIdxs);
			if (is_array($artistIdxs)) {
				$bTransaction = false;
				$dbh->beginTransaction();
				foreach($artistIdxs as $artistIdx) {
					$sql = 'DELETE FROM TB_GALLERY_ARTIST WHERE artistIdx = :artistIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

					if ($this->attachFileDelete($dbh, $artistIdx)) {
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
		$upfileName = null;
		$artistIdx = $this->getAddslashes('idx');
		$aryFileInfo = $this->getFileInfo($dbh, $artistIdx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if (!empty($attach)) {
			$sql = 'UPDATE TB_GALLERY_ARTIST SET upfileName = :upfileName WHERE artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['upfileName'])) {
						LIB_FILE::DeleteFile(ROOT.galleriesArtistsUploadPath.$row['upfileName']);
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
	function getFileInfo($dbh, $artistIdx) {
		try {
			$sql = 'SELECT upfileName FROM TB_GALLERY_ARTIST WHERE artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT);

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
	function attachFileDelete($dbh, $artistIdx) {
		try {
			//echo "artistIdx:$artistIdx";
			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $artistIdx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['upfileName'])) {
						LIB_FILE::DeleteFile(ROOT.galleriesArtistsUploadPath.$row['upfileName']);
					}
				}
			}
			//echo 'bTransaction:$bTransaction';
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
			$cnm = $this->getAddslashes('cnm');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT artistIdx, galleryIdx, artistName, artistNameEn, upfileName, birthday, createDate FROM TB_GALLERY_ARTIST ';

			if (!empty($nm)) {
				$subQuery = ' AND artistName LIKE :artistName ';
				$artistName = $nm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  galleryIdx = :galleryIdx '.$subQuery.' ORDER BY artistIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($nm)) {
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(artistIdx) FROM TB_GALLERY_ARTIST WHERE galleryIdx = :galleryIdx '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

				if (!empty($nm)) {
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
			$artistIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$sql = ' SELECT
							artistIdx,
							artistName,
							artistNameEn,
							upfileName,
							birthday,
							introduction
						FROM TB_GALLERY_ARTIST
						WHERE artistIdx = :artistIdx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
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
			$sql = 'SELECT COUNT(artistIdx) FROM TB_GALLERY_ARTIST WHERE galleryIdx = :galleryIdx';
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

	function searchArtist($dbh) {
		try {
			$artistName = $this->getAddslashes('artistName');
			if (!empty($artistName)) {
				$artistName = $artistName."%";
				$sql = ' SELECT
								artistIdx,
								artistName,
								artistNameEn,
								upfileName,
								birthday
							FROM TB_GALLERY_ARTIST
							WHERE artistName LIKE :artistName';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);

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
