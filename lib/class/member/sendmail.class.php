<?php
class Sendmail
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value) {
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key) {
		//return addslashes($this->attr[$key]);
		//return ($this->attr[$key] == null) ? null : addslashes($this->attr[$key]);

		//if (is_null($this->attr[$key]) || $this->attr[$key] == '') {
		if (is_null($this->attr[$key])) {
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

	// 뉴스레터
	function insert($dbh) {
		try {
			$title = $this->attr['title'];
			$content = $this->attr['content'];
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');
			$emailIdx = null;

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'INSERT INTO TB_EMAIL_LIST SET
							title = :title,
							content = :content,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':title', $title, PDO::PARAM_STR, 255);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':createDate', $createDate, PDO::PARAM_STR);

			if ($stmt->execute()) {
				$bTransaction = true;
			}

			$emailIdx = $dbh->lastInsertId();

			if (!empty($emailIdx)) {
				$bTransaction = $this->setAttachFile($dbh, $emailIdx); // 첨부 파일 및 이미지 처리
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			$this->setAttr("emailIdx", $emailIdx);
			return $bTransaction;
		}
		catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			$dbh->rollback();
			return false;
		}
	}


	// 첨부파일 처리
	function setAttachFile($dbh, $emailIdx) {
		try {
			$bTransaction = true;
			$content = str_replace(tempUploadPath, emailUploadPath, $this->attr['content']);
			$aryFileList = $this->getAddslashes('file_list');
			print_r($aryFileList);

			if (!is_null($aryFileList)) {
				$LIB_FILE = new LIB_FILE();

				foreach ($aryFileList as $value) {
					if ($value != '') {
						$aFileInfo = explode("|", $value);
						$bContentImg = true;

						echo '<br>aFileInfo2:'.$aFileInfo[2];
						// 본문 이미지인 경우
						if ($aFileInfo[4] == 1) {
							echo '본문';
							if (strpos($content, $aFileInfo[2]) === false) {
								$bContentImg = false;
							}
						}

						if ($bContentImg && $aFileInfo[0] == 0 && file_exists(ROOT.tempUploadPath.$aFileInfo[2])) {
							$createDate = date('Y-m-d H:i:s');

							$sql = 'INSERT INTO TB_EMAIL_UPFILE(emailIdx, upFileName, oriFileName, fileSize, fileType, createDate) VALUES(:emailIdx, :upFileName, :oriFileName, :fileSize, :fileType, :createDate)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT);

							$stmt->bindParam(':upFileName', $aFileInfo[2], PDO::PARAM_STR, 50);
							$stmt->bindParam(':oriFileName', $aFileInfo[1], PDO::PARAM_STR, 50);
							$stmt->bindParam(':fileSize', $aFileInfo[3], PDO::PARAM_INT);
							$stmt->bindParam(':fileType', $aFileInfo[4], PDO::PARAM_INT);
							$stmt->bindParam(':createDate', $createDate);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
							else {
								$bTransaction = false;
							}

							// 첨부파일인 경우
							if ($aFileInfo[4] == 2) {
								$sql = 'UPDATE TB_EMAIL_LIST SET upfileCnt = upfileCnt + 1 WHERE emailIdx = :emailIdx';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
								else {
									$bTransaction = false;
								}
							}

							// 파일 이동
							if ($LIB_FILE->moveFile(ROOT.tempUploadPath.$aFileInfo[2], ROOT.emailUploadPath.$aFileInfo[2])) {
								$bTransaction = true;
								echo '파일 이동 성공';
							}
							else {
								$bTransaction = false;
								echo '파일 이동 실패';
							}
						}
					}
				}
			}

			return $bTransaction;
		}
		catch(PDOException $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function update($dbh) {
		try {
			$successCnt = $this->getAddslashes('successCnt');
			$failCnt = $this->getAddslashes('failCnt');
			$emailIdx = $this->getAddslashes('emailIdx');

			$sql = 'UPDATE TB_EMAIL_LIST SET
							successCnt = :successCnt ,
							failCnt = :failCnt
						WHERE emailIdx = :emailIdx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':successCnt', $successCnt, PDO::PARAM_INT, 10);
			$stmt->bindParam(':failCnt', $failCnt, PDO::PARAM_INT, 10);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	// 뉴스레터 로그
	function insertLog($dbh) {
		try {
			$emailIdx = $this->getAddslashes('emailIdx');
			$toEmail = $this->getAddslashes('toEmail');
			$isSuccess = $this->getAddslashes('isSuccess');

			$sql = 'INSERT INTO TB_EMAIL_LOG SET
							emailIdx = :emailIdx,
							toEmail = :toEmail,
							isSuccess = :isSuccess';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':toEmail', $toEmail, PDO::PARAM_STR, 60);
			$stmt->bindParam(':isSuccess', $isSuccess, PDO::PARAM_INT, 1);


			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			print 'Error: ' . $e->getMessage();
		}
	}


	function delete($dbh) {
		try {
			$emailIdx = $this->getAddslashes('emailIdx');

			$bTransaction = false;
			$dbh->beginTransaction();

			//관련 이메일 로그 삭제S
			$sql = 'DELETE FROM TB_EMAIL_LOG WHERE emailIdx = :emailIdx ' ;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
			$bTransaction = $stmt->execute();

			if ($bTransaction = $this->attachFileDelete($dbh, $emailIdx)) {
				$sql = 'DELETE FROM TB_EMAIL_LIST WHERE emailIdx = :emailIdx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
				$bTransaction = $stmt->execute();
			}
			//관련 이메일 로그 삭제E

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
			//return true;
		}
		catch(PDOException $e) {
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

	function deletes($dbh) {
		try {
			$aEmailIdx = $this->getAddslashes('emailIdx');

			$bTransaction = false;
			$dbh->beginTransaction();

			foreach($aEmailIdx as $emailIdx) {
				if ($bTransaction = $this->attachFileDelete($dbh, $emailIdx)) {
					$sql = 'DELETE FROM TB_EMAIL_LOG WHERE emailIdx = :emailIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						$sql = 'DELETE FROM TB_EMAIL_LIST WHERE emailIdx = :emailIdx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
						$bTransaction = $stmt->execute();
					}
				}
				else {
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				return false;
			}
		}
		catch(PDOException $e) {
			if (isset($dbh)) {
				$dbh->rollback();
				print 'Error!: ' . $e->getMessage() . '</br>';
			}
			return false;
		}
	}

	// 데이터 및 물리적 파일 삭제
	function attachFileDelete($dbh, $emailIdx) {
		try {
			$bTransaction = true;
			$aryFileInfo = $this->getFileInfo($dbh, $emailIdx);
			//print_r($aryFileInfo);
			$sql = 'DELETE FROM TB_EMAIL_UPFILE WHERE emailIdx = :emailIdx  AND upfileIdx = :upfileIdx';

			foreach($aryFileInfo as $value) {
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT);
				$stmt->bindParam(':upfileIdx', $value['upfileIdx'], PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
					//echo "chk";
				}
				else {
					//echo 'chk2';
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				$LIB_FILE = new LIB_FILE();
				foreach($aryFileInfo as $value) {
					$LIB_FILE->DeleteFile(ROOT.emailUploadPath.$value['upFileName']);
				}
			}

			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOException $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $emailIdx, $fileType = NULL) {
		try {
			if (is_null($fileType)) {
				$sql = 'SELECT upfileIdx, upFileName, oriFileName, fileSize, fileType FROM TB_EMAIL_UPFILE WHERE emailIdx = :emailIdx ';
			}
			else {
				$sql = 'SELECT upfileIdx, upFileName, oriFileName, fileSize, fileType FROM TB_EMAIL_UPFILE WHERE emailIdx = :emailIdx  AND fileType = :fileType';
			}

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT);

			if (!is_null($fileType)) {
				$stmt->bindParam(':fileType', $fileType, PDO::PARAM_INT);
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


	function getList($dbh) {
		try {
			$word = $this->getAddslashes('word');
			$page = (!empty($this->getAddslashes('page'))) ? (int)$this->getAddslashes('page') : 1 ;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10 ;
			$bdate = $this->getAddslashes('bdate');
			$edate = $this->getAddslashes('edate');
			$sort = $this->getAddslashes('sort');
			$od = $this->getAddslashes('od');
			$start = ($page - 1) * $sz;
			$subQuery = null;

			$query = ' SELECT emailIdx, title, successCnt, failCnt, readCnt, createDate FROM TB_EMAIL_LIST ';

			if (!empty($word)) {
				$subQuery .= ' AND title LIKE :title ';
				$title = $word."%";
			}

			if (!empty($bdate) && !empty($edate)) {
				$subQuery .= ' AND createDate BETWEEN :bdate AND :edate ';
			}

			if ($sort === 0) {
				if ($od === 0) {
					$order = ' ORDER BY emailIdx DESC ';
				}
				else {
					$order = ' ORDER BY emailIdx ASC ';
				}
			}
			else {
				if ($od === 0) {
					$order = ' ORDER BY title DESC ';
				}
				else {
					$order = ' ORDER BY title ASC ';
				}
			}

			$sql = $query.' WHERE 1 = 1 '.$subQuery.$order.'  LIMIT :start, :sz';
			//echo '<br>'.$sql;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT, 11);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT, 11);

			if (!empty($word)) {
				$stmt->bindParam(':title', $title, PDO::PARAM_STR, 255);
			}

			if (!empty($bdate) && !empty($edate)) {
				$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 10);
				$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(emailIdx) FROM TB_EMAIL_LIST WHERE 1 = 1 '.$subQuery;
				//echo '<br>'.$sql;
				$stmt = $dbh->prepare($sql);

				if (!empty($word)) {
					$stmt->bindParam(':title', $title, PDO::PARAM_STR, 255);
				}

				if (!empty($bdate) && !empty($edate)) {
					$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 10);
					$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 10);
				}

				if ($stmt->execute()) {
					$totalCnt = $stmt->fetchColumn();
				}
			}

			return array($list, $totalCnt);
		}
		catch(PDOException $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 뉴스레터 목록 가져오기
	function getNewsLetterList($dbh) {
		try {
			$sql = 'SELECT newsletter_idx AS token, newsletter_email AS toEmail FROM newsletter';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}


	function getRead($dbh) {
		try {
			$emailIdx = $this->getAddslashes('emailIdx');
			$sql = 'SELECT content FROM TB_EMAIL_LIST where emailIdx = :emailIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				return $stmt->fetch(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOException $e) {
			print 'Error: ' . $e->getMessage();
			return false;
		}
	}

	// 이메일 수신 확인
	function setEmailReceiveOK($dbh) {
		try {
			$emailIdx = $this->getAddslashes('emailIdx');
			$toEmail = $this->getAddslashes('toEmail');
			$receiveDate = date('Y-m-d H:i:s');

			$bTransaction = false;
			$dbh->beginTransaction();

			// 수신 확인 여부
			$sql = ' SELECT COUNT(logIdx)
						FROM TB_EMAIL_LOG
						WHERE emailIdx = :emailIdx AND toEmail = :toEmail AND receiveDate IS NULL';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':toEmail', $toEmail, PDO::PARAM_STR, 60);

			if ($stmt->execute()) {
				if ($stmt->fetchColumn() === '1') {
					$sql = 'UPDATE TB_EMAIL_LOG SET
									receiveDate = :receiveDate
								WHERE emailIdx = :emailIdx AND toEmail = :toEmail';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':receiveDate', $receiveDate, PDO::PARAM_STR, 10);
					$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);
					$stmt->bindParam(':toEmail', $toEmail, PDO::PARAM_STR, 60);

					if ($stmt->execute()) {
						$sql = 'UPDATE TB_EMAIL_LIST SET
										readCnt = readCnt + 1
									WHERE emailIdx = :emailIdx';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':emailIdx', $emailIdx, PDO::PARAM_INT, 10);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
				}
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
		}
		catch(PDOException $e) {
			//echo 'Error: ' . $e->getMessage();
			return false;
		}
	}


	// 이메일 수신 거부
	function setEmailRejectOK($dbh) {
		try {
			$newsletter_idx = $this->getAddslashes('newsletter_idx');
			$newsletter_email = $this->getAddslashes('newsletter_email');

			$sql = ' DELETE
						FROM newsletter
						WHERE newsletter_idx = :newsletter_idx AND newsletter_email = :newsletter_email';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':newsletter_idx', $newsletter_idx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}

		}
		catch(PDOException $e) {
			//echo 'Error: ' . $e->getMessage();
			return false;
		}
	}

} // End Class
