<?php
class Artfairs
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
			$fairTitle = strip_tags($this->getAddslashes('fairTitle'));
			$fairTitleEn = strip_tags($this->getAddslashes('fairTitleEn'));
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$link = $this->getAddslashes('link');
			$upfileName = $this->getAddslashes('upfileName');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_POOL SET
							fairTitle = :fairTitle,
							fairTitleEn = :fairTitleEn,
							beginDate = :beginDate,
							endDate = :endDate,
							link = :link,
							upfileName = :upfileName,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairTitle', $fairTitle, PDO::PARAM_STR, 100);
			$stmt->bindParam(':fairTitleEn', $fairTitleEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':beginDate', $beginDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':link', $link, PDO::PARAM_STR, 255);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$bTransaction = true;
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
			$fairPoolIdx = $this->getAddslashes('idx');
			$fairTitle = strip_tags($this->getAddslashes('fairTitle'));
			$fairTitleEn = strip_tags($this->getAddslashes('fairTitleEn'));
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$link = $this->getAddslashes('link');
			$upfileName = $this->getAddslashes('upfileName');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$modifyDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'UPDATE TB_GALLERY_ARTFAIR_POOL SET
							fairTitle = :fairTitle,
							fairTitleEn = :fairTitleEn,
							beginDate = :beginDate,
							endDate = :endDate,
							link = :link,
							upfileName = :upfileName,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
					WHERE fairPoolIdx = :fairPoolIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairTitle', $fairTitle, PDO::PARAM_STR, 100);
			$stmt->bindParam(':fairTitleEn', $fairTitleEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':beginDate', $beginDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':link', $link, PDO::PARAM_STR, 255);
			$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $modifyDate, PDO::PARAM_STR);
			$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				$bTransaction = true;
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
			$fairPoolIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if ($this->attachFileDelete($dbh, $fairPoolIdx)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_POOL WHERE fairPoolIdx = :fairPoolIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

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
			$fairPoolIdxs = $this->getAddslashes('idxs');
			//print_r($fairPoolIdxs);
			if (is_array($fairPoolIdxs)) {
				$bTransaction = false;
				$dbh->beginTransaction();

				foreach($fairPoolIdxs as $fairPoolIdx) {
					if ($this->attachFileDelete($dbh, $fairPoolIdx)) {
						$sql = 'DELETE FROM TB_GALLERY_ARTFAIR WHERE fairPoolIdx = :fairPoolIdx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

						if ($stmt->execute()) {
							$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_POOL WHERE fairPoolIdx = :fairPoolIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
							else {

							}
						}
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
			echo 'Error: '.$e->getMessage();
			return array(false, 'error');
		}
	}



	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		try {
			$upfileName = null;
			$fairPoolIdx = $this->getAddslashes('idx');
			$aryFileInfo = $this->getFileInfo($dbh, $fairPoolIdx);

			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				if (!empty($aryFileInfo[0]['upfileName'])) {
					$sql = 'UPDATE TB_GALLERY_ARTFAIR_POOL SET upfileName = :upfileName WHERE fairPoolIdx = :fairPoolIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
					$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						foreach($aryFileInfo as $row) {
							if (!empty($row['upfileName'])) {
								if (file_exists(ROOT.galleriesArtFairsUploadPath.$row['upfileName'])) {
									LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.$row['upfileName']);
								}

								if (file_exists(ROOT.galleriesArtFairsUploadPath.'l_'.$row['upfileName'])) {
									LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.'l_'.$row['upfileName']);
								}

								if (file_exists(ROOT.galleriesArtFairsUploadPath.'s_'.$row['upfileName'])) {
									LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.'s_'.$row['upfileName']);
								}
								$bTransaction = true;
							}
						}
					}
				}
				else {
					$bTransaction = $this->deleteTempAttachAjax($attach);
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
	function getFileInfo($dbh, $fairPoolIdx) {
		try {
			$sql = 'SELECT upfileName FROM TB_GALLERY_ARTFAIR_POOL WHERE fairPoolIdx = :fairPoolIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

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

	// Ajax 통한 작품 삭제
	function deleteArtWorksAjax($dbh, $attach) {
		try {
			$fairWorksIdx = $this->getAddslashes('eidx');
			$fairIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_WORKS WHERE fairWorksIdx = :fairWorksIdx AND fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairWorksIdx', $fairWorksIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					$bTransaction = true;
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

	// 물리적 파일 삭제
	function attachFileDelete($dbh, $fairPoolIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getFileInfo($dbh, $fairPoolIdx);

			if (is_array($aryFileInfo)) {
				if ($bTransaction) {
					foreach($aryFileInfo as $row) {
						if (!empty($row['upfileName'])) {
							if (file_exists(ROOT.galleriesArtFairsUploadPath.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesArtFairsUploadPath.'l_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.'l_'.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesArtFairsUploadPath.'s_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.'s_'.$row['upfileName']);
							}

							//LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.$row['upfileName']);
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

			$pg = (!empty($this->getAddslashes('pg'))) ? (int)$this->getAddslashes('pg') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10;
			$nm = $this->getAddslashes('nm');

			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT fairPoolIdx, fairTitle, fairTitleEn, createDate FROM TB_GALLERY_ARTFAIR_POOL ';

			if (!empty($nm)) {
				$subQuery = ' AND (fairTitle LIKE :fairTitle OR fairTitleEn LIKE :fairTitle) ';
				$fairTitle = '%'.$nm.'%';
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  1 = 1 '.$subQuery.' ORDER BY fairPoolIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($nm)) {
				$stmt->bindParam(':fairTitle', $fairTitle, PDO::PARAM_STR, 100);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(fairPoolIdx) FROM TB_GALLERY_ARTFAIR_POOL WHERE 1 = 1 '.$subQuery;
				$stmt = $dbh->prepare($sql);

				if (!empty($nm)) {
					$stmt->bindParam(':fairTitle', $fairTitle, PDO::PARAM_STR, 100);
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
			$fairPoolIdx = $this->getAddslashes('idx');
			$sql = ' SELECT
							fairPoolIdx,
							fairTitle,
							fairTitleEn,
							beginDate,
							endDate,
							link,
							upfileName
						FROM TB_GALLERY_ARTFAIR_POOL
						WHERE fairPoolIdx = :fairPoolIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);

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
	function getArtFairsFileInfo($dbh) {
		try {
			$fairIdx = $this->getAddslashes('idx');
			$sql = 'SELECT fileIdx, upfileName FROM TB_GALLERY_ARTFAIR_FILE WHERE fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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

	// 선택 작품 가져오기
	function getSelectedWorks($dbh) {
		try {
			$fairIdx = $this->getAddslashes('idx');
			$sql = 'SELECT fairWorksIdx, artistIdx, artistName, artistNameEn, worksIdx, worksName, worksNameEn, worksImg FROM TB_GALLERY_ARTFAIR_WORKS WHERE fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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

} // End Class