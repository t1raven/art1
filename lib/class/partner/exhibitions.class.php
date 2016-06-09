<?php
class Exhibition
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
			$artistIdxs = $this->getAddslashes('artistIdxs');
			$artistNames = $this->getAddslashes('artistNames');
			$artistNamesEn = $this->getAddslashes('artistNamesEn');
			$worksIdxs = $this->getAddslashes('worksIdxs');
			$worksNames = $this->getAddslashes('worksNames');
			$worksNamesEn = $this->getAddslashes('worksNamesEn');
			$worksImgs = $this->getAddslashes('worksImgs');
			$exhibitionTitle = strip_tags($this->getAddslashes('exhibitionTitle'));
			$exhibitionTitleEn = strip_tags($this->getAddslashes('exhibitionTitleEn'));
			$listImg = $this->getAddslashes('listImg');
			$caption = strip_tags($this->attr['caption']);
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$description = strip_tags($this->attr['description']);
			$width = $this->getAddslashes('width');
			$depth = $this->getAddslashes('depth');
			$aUpfileName = $this->getAddslashes('upfileName');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'INSERT INTO TB_GALLERY_EXHIBITION SET
							galleryIdx = :galleryIdx,
							listImg = :listImg,
							caption = :caption,
							artistIdx = :artistIdx,
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							exhibitionTitle = :exhibitionTitle,
							exhibitionTitleEn = :exhibitionTitleEn,
							beginDate = :beginDate,
							endDate = :endDate,
							description = :description,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':listImg', $listImg, PDO::PARAM_STR, 25);
			$stmt->bindParam(':caption', $caption, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
			$stmt->bindParam(':exhibitionTitleEn', $exhibitionTitleEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':beginDate', $beginDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':description', $description, PDO::PARAM_STR);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$exhibitionIdx = $dbh->lastInsertId();
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $upfileName) {
						$sql = 'INSERT INTO TB_GALLERY_EXHIBITION_FILE SET
										exhibitionIdx = :exhibitionIdx,
										upfileName = :upfileName,
										createDate = :createDate';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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

				if (is_array($artistIdxs)) {
					foreach($artistIdxs as $key => $val) {
						if (!empty($val)) {
							$sql = 'INSERT INTO TB_GALLERY_EXHIBITION_WORKS SET
											exhibitionIdx = :exhibitionIdx,
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
							$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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
			$exhibitionIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');
			$artistNameEn = $this->getAddslashes('artistNameEn');
			$artistIdxs = $this->getAddslashes('artistIdxs');
			$artistNames = $this->getAddslashes('artistNames');
			$artistNamesEn = $this->getAddslashes('artistNamesEn');
			$worksIdxs = $this->getAddslashes('worksIdxs');
			$worksNames = $this->getAddslashes('worksNames');
			$worksNamesEn = $this->getAddslashes('worksNamesEn');
			$worksImgs = $this->getAddslashes('worksImgs');
			$exhibitionTitle = strip_tags($this->getAddslashes('exhibitionTitle'));
			$exhibitionTitleEn = strip_tags($this->getAddslashes('exhibitionTitleEn'));
			$listImg = $this->getAddslashes('listImg');
			$caption = strip_tags($this->attr['caption']);
			$beginDate = $this->getAddslashes('beginDate');
			$endDate = $this->getAddslashes('endDate');
			$description = strip_tags($this->attr['description']);
			$width = $this->getAddslashes('width');
			$depth = $this->getAddslashes('depth');
			$aFileIdx = $this->getAddslashes('fileIdx');
			$aUpfileName = $this->getAddslashes('upfileName');
			$aExhiWorksIdx = $this->getAddslashes('exhiWorksIdx');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$date = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'UPDATE TB_GALLERY_EXHIBITION SET
							galleryIdx = :galleryIdx,
							listImg = :listImg,
							caption = :caption,
							artistIdx = :artistIdx,
							artistName = :artistName,
							artistNameEn = :artistNameEn,
							exhibitionTitle = :exhibitionTitle,
							exhibitionTitleEn = :exhibitionTitleEn,
							beginDate = :beginDate,
							endDate = :endDate,
							description = :description,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
					WHERE exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':listImg', $listImg, PDO::PARAM_STR, 25);
			$stmt->bindParam(':caption', $caption, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistNameEn', $artistNameEn, PDO::PARAM_STR, 50);
			$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
			$stmt->bindParam(':exhibitionTitleEn', $exhibitionTitleEn, PDO::PARAM_STR, 100);
			$stmt->bindParam(':beginDate', $beginDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR, 10);
			$stmt->bindParam(':description', $description, PDO::PARAM_STR);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				if (is_array($aUpfileName)) {
					foreach($aUpfileName as $key => $upfileName) {
						if (!empty($aFileIdx[$key])) {
							$sql = '  UPDATE TB_GALLERY_EXHIBITION_FILE SET
											upfileName = :upfileName,
											modifyDate = :modifyDate
										WHERE fileIdx = :fileIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':upfileName', $upfileName, PDO::PARAM_STR, 25);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
							$stmt->bindParam(':fileIdx', $aFileIdx[$key], PDO::PARAM_INT, 10);
						}
						else {
							$sql = 'INSERT INTO TB_GALLERY_EXHIBITION_FILE SET
											exhibitionIdx = :exhibitionIdx,
											upfileName = :upfileName,
											createDate = :createDate';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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

				if (is_array($artistIdxs)) {
					foreach($artistIdxs as $key => $val) {
						if (!empty($aExhiWorksIdx[$key])) {
							$sql = 'UPDATE TB_GALLERY_EXHIBITION_WORKS SET
											exhibitionIdx = :exhibitionIdx,
											artistIdx = :artistIdx,
											artistName = :artistName,
											artistNameEn = :artistNameEn,
											worksIdx = :worksIdx,
											worksName = :worksName,
											worksNameEn = :worksNameEn,
											worksImg = :worksImg,
											ipAddr = :ipAddr,
											modifyDate = :modifyDate
										WHERE exhiWorksIdx = :exhiWorksIdx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistIdx', $val, PDO::PARAM_INT, 10);
							$stmt->bindParam(':artistName', $artistNames[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':artistNameEn', $artistNamesEn[$key], PDO::PARAM_STR, 50);
							$stmt->bindParam(':worksIdx', $worksIdxs[$key], PDO::PARAM_INT, 10);
							$stmt->bindParam(':worksName', $worksNames[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksNameEn', $worksNamesEn[$key], PDO::PARAM_STR, 100);
							$stmt->bindParam(':worksImg', $worksImgs[$key], PDO::PARAM_STR, 25);
							$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
							$stmt->bindParam(':modifyDate', $date, PDO::PARAM_STR);
							$stmt->bindParam(':exhiWorksIdx', $aExhiWorksIdx[$key], PDO::PARAM_INT, 10);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
						}
						else {
							if (!empty($val)) {
								$sql = 'INSERT INTO TB_GALLERY_EXHIBITION_WORKS SET
												exhibitionIdx = :exhibitionIdx,
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
								$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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
			$exhibitionIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if ($this->deleteArtWorks($dbh, $exhibitionIdx)) {
				if ($this->attachFileDelete($dbh, $exhibitionIdx)) {
					if ($this->listImgFileDelete($dbh, $exhibitionIdx)) {
						$sql = 'DELETE FROM TB_GALLERY_EXHIBITION WHERE exhibitionIdx = :exhibitionIdx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
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

				foreach($exhibitionIdxs as $exhibitionIdx) {
					if ($this->deleteArtWorks($dbh, $exhibitionIdx)) {
						if ($this->attachFileDelete($dbh, $exhibitionIdx)) {
							if ($this->listImgFileDelete($dbh, $exhibitionIdx)) {
								$sql = 'DELETE FROM TB_GALLERY_EXHIBITION WHERE exhibitionIdx = :exhibitionIdx';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
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
			//echo 'Error: '.$e->getMessage();
			return array(false, 'error');
		}
	}

	function deleteArtWorks($dbh, $exhibitionIdx) {
		try {
			$bTransaction = true;

			if (!empty($exhibitionIdx)) {
				$sql = 'DELETE FROM TB_GALLERY_EXHIBITION_WORKS WHERE exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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

	// Ajax 통한 목록 파일 삭제
	function deleteListImgAjax($dbh, $attach) {
		try {
			$exhibitionIdx = $this->getAddslashes('idx');
			$listImg = null;
			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				$sql = 'UPDATE TB_GALLERY_EXHIBITION SET listImg = :listImg WHERE exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':listImg', $listImg, PDO::PARAM_STR, 25);

				if ($stmt->execute()) {
					if (!empty($attach)) {
						if (file_exists(ROOT.galleriesExhibitionsUploadPath.$attach)) {
							LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$attach);
						}

						if (file_exists(ROOT.galleriesExhibitionsUploadPath.'l_'.$attach)) {
							LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'l_'.$attach);
						}

						if (file_exists(ROOT.galleriesExhibitionsUploadPath.'s_'.$attach)) {
							LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'s_'.$attach);
						}

						$bTransaction = true;
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

	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		try {
			$exhibitionIdx = $this->getAddslashes('idx');
			$fileIdx = $this->getAddslashes('fidx');
			$aryFileInfo = $this->getFileInfo($dbh, $exhibitionIdx, $fileIdx);
			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				$sql = 'DELETE FROM TB_GALLERY_EXHIBITION_FILE WHERE fileIdx = :fileIdx AND exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					foreach($aryFileInfo as $row) {
						if (!empty($row['upfileName'])) {
							if (file_exists(ROOT.galleriesExhibitionsUploadPath.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName']);
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
	function getFileInfo($dbh, $exhibitionIdx, $fileIdx = null) {
		try {
			if (is_null($fileIdx)) {
				$sql = 'SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
			}
			else {
				$sql = 'SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE fileIdx = :fileIdx AND exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fileIdx', $fileIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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

	// 목록 이미지 파일명  가져오기
	function getListImgInfo($dbh, $exhibitionIdx) {
		try {
			$sql = 'SELECT listImg AS upfileName FROM TB_GALLERY_EXHIBITION WHERE exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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
			$exhiWorksIdx = $this->getAddslashes('eidx');
			$exhibitionIdx = $this->getAddslashes('idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			if (!empty($attach)) {
				$sql = 'DELETE FROM TB_GALLERY_EXHIBITION_WORKS WHERE exhiWorksIdx = :exhiWorksIdx AND exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhiWorksIdx', $exhiWorksIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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
	function attachFileDelete($dbh, $exhibitionIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getFileInfo($dbh, $exhibitionIdx);
			//print_r($aryFileInfo);

			if (is_array($aryFileInfo)) {
				$sql = 'DELETE FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = :exhibitionIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

				if ($bTransaction) {
					foreach($aryFileInfo as $row) {
						if (!empty($row['upfileName'])) {
							if (file_exists(ROOT.galleriesExhibitionsUploadPath.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName']);
							}

							//LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$row['upfileName']);
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

	// 물리적 파일 삭제
	function listImgFileDelete($dbh, $exhibitionIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getListImgInfo($dbh, $exhibitionIdx);
			//print_r($aryFileInfo);

			if (is_array($aryFileInfo)) {
				if ($bTransaction) {
					foreach($aryFileInfo as $row) {
						if (!empty($row['upfileName'])) {
							if (file_exists(ROOT.galleriesExhibitionsUploadPath.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'l_'.$row['upfileName']);
							}

							if (file_exists(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.'s_'.$row['upfileName']);
							}

							//LIB_FILE::DeleteFile(ROOT.galleriesExhibitionsUploadPath.$row['upfileName']);
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
			$exh = $this->getAddslashes('exh');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT exhibitionIdx, artistName, exhibitionTitle, exhibitionTitleEn, createDate FROM TB_GALLERY_EXHIBITION ';

			if (!empty($exh) && !empty($nm)) {
				if ($st === 0) {
					$subQuery = ' AND (exhibitionTitle LIKE :exhibitionTitle AND artistName LIKE :artistName) ';
				}
				else {
					$subQuery = ' AND (exhibitionTitle LIKE :exhibitionTitle OR artistName LIKE :artistName) ';
				}
				$exhibitionTitle = $exh."%";
				$artistName = $nm."%";
			}
			else if (!empty($exh) && empty($nm)) {
				$subQuery = ' AND exhibitionTitle LIKE :exhibitionTitle ';
				$exhibitionTitle = $exh."%";
			}
			else if (empty($exh) && !empty($nm)) {
				$subQuery = ' AND artistName LIKE :artistName ';
				$artistName = $nm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  galleryIdx = :galleryIdx '.$subQuery.' ORDER BY exhibitionIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($exh) && !empty($nm)) {
				$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}
			else if (!empty($exh) && empty($nm)) {
				$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
			}
			else if (empty($exh) && !empty($nm)) {
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(exhibitionIdx) FROM TB_GALLERY_EXHIBITION WHERE galleryIdx = :galleryIdx '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

				if (!empty($exh) && !empty($nm)) {
					$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
					$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
				}
				else if (!empty($exh) && empty($nm)) {
					$stmt->bindParam(':exhibitionTitle', $exhibitionTitle, PDO::PARAM_STR, 100);
				}
				else if (empty($exh) && !empty($nm)) {
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
			$exhibitionIdx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$sql = ' SELECT
							exhibitionIdx,
							listImg,
							caption,
							artistIdx,
							artistName,
							artistNameEn,
							exhibitionTitle,
							exhibitionTitleEn,
							beginDate,
							beginDate,
							endDate,
							description
						FROM TB_GALLERY_EXHIBITION
						WHERE exhibitionIdx = :exhibitionIdx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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
	function getExhibitionsFileInfo($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('idx');
			$sql = 'SELECT fileIdx, upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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
			$exhibitionIdx = $this->getAddslashes('idx');
			$sql = 'SELECT exhiWorksIdx, artistIdx, artistName, artistNameEn, worksIdx, worksName, worksNameEn, worksImg FROM TB_GALLERY_EXHIBITION_WORKS WHERE exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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