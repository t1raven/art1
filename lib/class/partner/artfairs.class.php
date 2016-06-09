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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$fairPoolIdx = $this->getAddslashes('fairPoolIdx');

			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');

			$artIdxs = $this->getAddslashes('artIdxs');
			$artNames = $this->getAddslashes('artNames');
			$artNamesEn = $this->getAddslashes('artNamesEn');

			$artistIdxs = $this->getAddslashes('artistIdxs');
			$artistNames = $this->getAddslashes('artistNames');
			$artistNamesEn = $this->getAddslashes('artistNamesEn');
			$worksIdxs = $this->getAddslashes('worksIdxs');
			$worksNames = $this->getAddslashes('worksNames');
			$worksNamesEn = $this->getAddslashes('worksNamesEn');
			$worksImgs = $this->getAddslashes('worksImgs');
			$fairTitle = strip_tags($this->getAddslashes('fairTitle'));
			$fairTitleEn = strip_tags($this->getAddslashes('fairTitleEn'));
			//$listImg = $this->getAddslashes('listImg');
			//$caption = $this->getAddslashes('caption');
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$link = $this->getAddslashes('link');
			//$description = $this->getAddslashes('description');
			//$width = $this->getAddslashes('width');
			//$depth = $this->getAddslashes('depth');
			$aUpfileName = $this->getAddslashes('upfileName');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'INSERT INTO TB_GALLERY_ARTFAIR SET
							fairPoolIdx = :fairPoolIdx,
							galleryIdx = :galleryIdx,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			// 이미지 파일
			if ($stmt->execute()) {
				$fairIdx = $dbh->lastInsertId();
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $upfileName) {
						$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_FILE SET
										fairIdx = :fairIdx,
										upfileName = :upfileName,
										createDate = :createDate';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
						$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
						$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

						if ($stmt->execute()) {
							$bTransaction = true;
						} // End If
					} // For
				}
				else {
					$bTransaction = true;
				}

				// 작가
				if (is_array($artIdxs)) {
					foreach($artIdxs as $key => $val) {
						if (!empty($val)) {
							$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_ARTIST SET
											fairIdx = :fairIdx,
											artistIdx = :artistIdx,
											artistName = :artistName,
											artistNameEn = :artistNameEn,
											ipAddr = :ipAddr,
											createDate = :createDate';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistName', $artNames[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':artistNameEn', $artNamesEn[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
							$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
						}
					}
				}
				else {
					$bTransaction = true;
				}

				// 작품
				if (is_array($artistIdxs)) {
					foreach($artistIdxs as $key => $val) {
						if (!empty($val)) {
							$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_WORKS SET
											fairIdx = :fairIdx,
											artistIdx = :artistIdx,
											artistName = :artistName,
											artistNameEn = :artistNameEn,
											worksIdx = :worksIdx,
											worksName = :worksName,
											worksNameEn = :worksNameEn,
											worksImg = :worksImg,
											ipAddr = :ipAddr,
											createDate = :createDate';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistName', $artistNames[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':artistNameEn', $artistNamesEn[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':worksIdx', $worksIdxs[$key], PDO::PARAM_INT, 10);
							$stmt->bindParam(':worksName', $worksNames[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksNameEn', $worksNamesEn[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksImg', $worksImgs[$key], PDO::PARAM_STR, 25);
							$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
							$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
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
			$fairIdx = $this->getAddslashes('idx');
			$fairPoolIdx = $this->getAddslashes('fairPoolIdx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');

			$aFairArtistIdx = $this->getAddslashes('fairArtistIdx');
			$artIdxs = $this->getAddslashes('artIdxs');
			$artNames = $this->getAddslashes('artNames');
			$artNamesEn = $this->getAddslashes('artNamesEn');

			$artistIdxs = $this->getAddslashes('artistIdxs');
			$artistNames = $this->getAddslashes('artistNames');
			$artistNamesEn = $this->getAddslashes('artistNamesEn');
			$worksIdxs = $this->getAddslashes('worksIdxs');
			$worksNames = $this->getAddslashes('worksNames');
			$worksNamesEn = $this->getAddslashes('worksNamesEn');
			$worksImgs = $this->getAddslashes('worksImgs');
			$fairTitle = strip_tags($this->getAddslashes('fairTitle'));
			$fairTitleEn = strip_tags($this->getAddslashes('fairTitleEn'));
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$link = $this->getAddslashes('link');
			$aFileIdx = $this->getAddslashes('fileIdx');
			$aUpfileName = $this->getAddslashes('upfileName');
			$aExhiWorksIdx = $this->getAddslashes('exhiWorksIdx');
			//print_r($aExhiWorksIdx);
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$date = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'UPDATE TB_GALLERY_ARTFAIR SET
							fairPoolIdx = :fairPoolIdx,
							galleryIdx = :galleryIdx,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
					WHERE fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairPoolIdx', $fairPoolIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

			// 이미지 파일
			if ($stmt->execute()) {
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $key => $upfileName) {
						if (!empty($aFileIdx[$key])) {
							$sql = '  UPDATE TB_GALLERY_ARTFAIR_FILE SET
											upfileName = :upfileName,
											modifyDate = :modifyDate
										WHERE fileIdx = :fileIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
							$stmt->bindParam(':fileIdx', $aFileIdx[$key], PDO::PARAM_INT, 10);
						}
						else {
							$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_FILE SET
											fairIdx = :fairIdx,
											upfileName = :upfileName,
											createDate = :createDate';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
							$stmt->bindParam(':createDate', $date, PDO::PARAM_STR);
						}

						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
				}
				else {
					$bTransaction = true;
				}


				// 작가
				if (is_array($artIdxs)) {
					foreach($artIdxs as $key => $val) {
						if (!empty($aFairArtistIdx[$key])) {
							$sql = 'UPDATE TB_GALLERY_ARTFAIR_ARTIST SET
											fairIdx = :fairIdx,
											artistIdx = :artistIdx,
											artistName = :artistName,
											artistNameEn = :artistNameEn,
											ipAddr = :ipAddr,
											modifyDate = :modifyDate
										WHERE fairArtistIdx = :fairArtistIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistName', $artNames[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':artistNameEn', $artNamesEn[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
							$stmt->bindParam(':fairArtistIdx', $aFairArtistIdx[$key], PDO::PARAM_INT, 10);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
						}
						else {
							if (!empty($val)) {
								$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_ARTIST SET
												fairIdx = :fairIdx,
												artistIdx = :artistIdx,
												artistName = :artistName,
												artistNameEn = :artistNameEn,
												ipAddr = :ipAddr,
												createDate = :createDate';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
								$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
								$stmt->bindParam(':artistName', $artNames[$key], PDO::PARAM_STR, 50);
								$stmt->bindParam(':artistNameEn', $artNamesEn[$key], PDO::PARAM_STR, 50);
								$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
								$stmt->bindParam(':createDate', $date, PDO::PARAM_STR);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
							}
						}
					}
				}
				else {
					$bTransaction = true;
				}

				// 작품
				if (is_array($artistIdxs)) {
					foreach($artistIdxs as $key => $val) {
						if (!empty($aExhiWorksIdx[$key])) {
							$sql = 'UPDATE TB_GALLERY_ARTFAIR_WORKS SET
											fairIdx = :fairIdx,
											artistIdx = :artistIdx,
											artistName = :artistName,
											artistNameEn = :artistNameEn,
											worksIdx = :worksIdx,
											worksName = :worksName,
											worksNameEn = :worksNameEn,
											worksImg = :worksImg,
											ipAddr = :ipAddr,
											modifyDate = :modifyDate
										WHERE fairWorksIdx = :fairWorksIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistName', $artistNames[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':artistNameEn', $artistNamesEn[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':worksIdx', $worksIdxs[$key], PDO::PARAM_INT, 10);
							$stmt->bindParam(':worksName', $worksNames[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksNameEn', $worksNamesEn[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksImg', $worksImgs[$key], PDO::PARAM_STR, 25);
							$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
							$stmt->bindParam(':fairWorksIdx', $aExhiWorksIdx[$key], PDO::PARAM_INT, 10);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
						}
						else {
							if (!empty($val)) {
								$sql = 'INSERT INTO TB_GALLERY_ARTFAIR_WORKS SET
												fairIdx = :fairIdx,
												artistIdx = :artistIdx,
												artistName = :artistName,
												artistNameEn = :artistNameEn,
												worksIdx = :worksIdx,
												worksName = :worksName,
												worksNameEn = :worksNameEn,
												worksImg = :worksImg,
												ipAddr = :ipAddr,
												createDate = :createDate';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
								$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
								$stmt->bindParam(':artistName', $artistNames[$key], PDO::PARAM_STR, 50);
								$stmt->bindParam(':artistNameEn', $artistNamesEn[$key], PDO::PARAM_STR, 50);
								$stmt->bindParam(':worksIdx', $worksIdxs[$key], PDO::PARAM_INT, 10);
								$stmt->bindParam(':worksName', $worksNames[$key], PDO::PARAM_STR, 100);
								$stmt->bindParam(':worksNameEn', $worksNamesEn[$key], PDO::PARAM_STR, 100);
								$stmt->bindParam(':worksImg', $worksImgs[$key], PDO::PARAM_STR, 25);
								$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
								$stmt->bindParam(':createDate', $date, PDO::PARAM_STR);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
							}
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
			$fairIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if ($this->deleteArtWorks($dbh, $fairIdx)) {
				if ($this->attachFileDelete($dbh, $fairIdx)) {
					$sql = 'DELETE FROM TB_GALLERY_ARTFAIR WHERE fairIdx = :fairIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						$bTransaction = true;
					}
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
			$exhibitionIdxs = $this->getAddslashes('idxs');
			//print_r($exhibitionIdxs);
			if (is_array($exhibitionIdxs)) {
				$bTransaction = false;
				$dbh->beginTransaction();

				foreach($exhibitionIdxs as $fairIdx) {
					if ($this->deleteArtWorks($dbh, $fairIdx)) {
						if ($this->attachFileDelete($dbh, $fairIdx)) {
							$sql = 'DELETE FROM TB_GALLERY_ARTFAIR WHERE fairIdx = :fairIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

							if ($stmt->execute()) {
								$bTransaction = true;
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

	function deleteArtWorks($dbh, $fairIdx) {
		try {
			$bTransaction = true;

			if (!empty($fairIdx)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_WORKS WHERE fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					return true;
				}
				else {
					return false;
				}
			}
		}
		catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			return false;
		}
	}

	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		try {
			$fairIdx = $this->getAddslashes('idx');
			$fileIdx = $this->getAddslashes('fidx');
			$aryFileInfo = $this->getFileInfo($dbh, $fairIdx, $fileIdx);
			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_FILE WHERE fileIdx = :fileIdx AND fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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

							//LIB_FILE::DeleteFile(ROOT.galleriesArtFairsUploadPath.$row['upfileName']);
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
	function getFileInfo($dbh, $fairIdx, $fileIdx = null) {
		try {
			if (is_null($fileIdx)) {
				$sql = 'SELECT upfileName FROM TB_GALLERY_ARTFAIR_FILE WHERE fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
			}
			else {
				$sql = 'SELECT upfileName FROM TB_GALLERY_ARTFAIR_FILE WHERE fileIdx = :fileIdx AND fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
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

	// Ajax 통한 작가 삭제
	function deleteArtistAjax($dbh, $attach) {
		try {
			$fairArtistIdx = $this->getAddslashes('faidx');
			$fairIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if (empty($attach)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_ARTIST WHERE fairArtistIdx = :fairArtistIdx AND fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairArtistIdx', $fairArtistIdx, PDO::PARAM_INT, 10);
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
	function attachFileDelete($dbh, $fairIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getFileInfo($dbh, $fairIdx);

			if (is_array($aryFileInfo)) {
				$sql = 'DELETE FROM TB_GALLERY_ARTFAIR_FILE WHERE fairIdx = :fairIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
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
			$query = ' SELECT a.fairIdx, b.fairPoolIdx, b.fairTitle, b.fairTitleEn, a.createDate FROM TB_GALLERY_ARTFAIR AS a INNER JOIN  TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx';

			if (!empty($nm)) {
				$subQuery = ' AND (b.fairTitle LIKE :fairTitle OR b.fairTitleEn LIKE :fairTitle) ';
				$fairTitle = '%'.$nm.'%';
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND a.createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  a.galleryIdx = :galleryIdx '.$subQuery.' ORDER BY b.beginDate DESC, a.fairIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
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
				$sql = 'SELECT COUNT(a.fairIdx) FROM TB_GALLERY_ARTFAIR AS a INNER JOIN  TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx WHERE a.galleryIdx = :galleryIdx '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

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
			$fairIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);

			$sql = ' SELECT
							a.fairIdx,
							a.fairPoolIdx,
							b.fairTitle,
							b.fairTitleEn,
							b.beginDate,
							b.endDate,
							b.link,
							b.upfileName
						FROM TB_GALLERY_ARTFAIR AS a inner join TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
						WHERE a.fairIdx = :fairIdx AND a.galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
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

	// 선택 작가 가져오기
	function getSelectedArtists($dbh) {
		try {
			$fairIdx = $this->getAddslashes('idx');
			$sql = 'SELECT fairArtistIdx, artistIdx, artistName, artistNameEn  FROM TB_GALLERY_ARTFAIR_ARTIST WHERE fairIdx = :fairIdx';
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

	function searchArtfairs($dbh) {
		try {
			$sw = $this->getAddslashes('sw');
			//echo $sw;
			if (!empty($sw)) {
				$sw = '%'.$sw.'%';
				$sql = 'SELECT
								fairPoolIdx,
								fairTitle,
								fairTitleEn,
								beginDate,
								endDate,
								link,
								upfileName
							FROM TB_GALLERY_ARTFAIR_POOL
							WHERE fairTitle LIKE :sw OR fairTitleEn LIKE :sw';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sw', $sw, PDO::PARAM_STR, 50);

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