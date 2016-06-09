<?php
class Snscontents
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

	function setAttr($key, $value){
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key){
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

	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$arr_s_idx = $this->getAddslashes('arr_s_idx');
			$arr_sc_idx = $this->getAddslashes('arr_sc_idx');
			$arr_sns_img = $this->getAddslashes('arr_sns_img');
			$arr_title = $this->getAddslashes('arr_title');
			$arr_content = $this->getAddslashes('arr_content');
			$arr_cdate = $this->getAddslashes('arr_cdate');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$modify_date = date('Y-m-d H:i:s', time());

			$i=0;

			$sub_sql ='';
			foreach ($arr_sc_idx as $value) {  //필드만큼 돌면서 업로드
				$sns_contents_idx = $arr_sc_idx[$i];
				$sns_link_idx = $arr_s_idx[$i];
				$up_file_name = $arr_sns_img[$i];
				$sns_content_title = $arr_title[$i];
				$sns_content = $arr_content[$i];
				$cdate = $arr_cdate[$i];

				if (!empty($up_file_name)){
					$sub_sql = 'up_file_name = :up_file_name, ';
				}

				$sql = 'UPDATE  sns_contents SET
								sns_link_idx = :sns_link_idx,
								sns_content_title = :sns_content_title,
								sns_content = :sns_content,
								'.$sub_sql.'
								ip_addr = :ip_addr,
								create_date= :create_date,
								modify_date= :modify_date
							WHERE sns_contents_idx = :sns_contents_idx';

				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_link_idx',$sns_link_idx,						PDO::PARAM_INT, 11);
				$stmt->bindParam(':sns_content_title',$sns_content_title,		PDO::PARAM_STR, 200);
				$stmt->bindParam(':sns_content',$sns_content,						PDO::PARAM_STR, 200);
				if (!empty($sub_sql)){
					$stmt->bindParam(':up_file_name',$up_file_name,					PDO::PARAM_STR, 50);
				}
				$stmt->bindParam(':ip_addr',$ip_addr,									PDO::PARAM_INT, 11);
				$stmt->bindParam(':create_date',$cdate,						PDO::PARAM_STR);
				$stmt->bindParam(':modify_date',$modify_date,						PDO::PARAM_STR);
				$stmt->bindParam(':sns_contents_idx',$sns_contents_idx,		PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					// 파일 이동
					if ($up_file_name){
						if (LIB_FILE::moveFile(ROOT.tempUploadPath.$up_file_name, ROOT.snsUploadPath.$up_file_name)) {
							LIB_FILE::DeleteFile(ROOT.tempUploadPath.$up_file_name);
							$bTransaction = true;
							//echo '파일 이동 성공';
						}else {
							$bTransaction = false;
							//echo '파일 이동 실패';
						}
					}else{
						$bTransaction = true;
					}
					//$bTransaction = true;
				}
				else {
					throw new Exception('error');
				}

				$i=$i+1;
			}

			if ($stmt->execute()) {
				$bTransaction = true;

			}
			else {
				throw new Exception('error');
				exit;
			}

			//exit;
			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 첨부파일 정보 가져오기 // News 테이블 용
	function getFileInfoSelf($dbh, $idx) {
		try {
			$sql = 'SELECT sns_contents_idx, up_file_name FROM sns_contents WHERE sns_contents_idx = :sns_contents_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':sns_contents_idx', $idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
	// 물리적 파일 삭제 // 첨부파일 News 테이블 용
	function attachFileDeleteSelf($dbh, $idx) {
		try {
			$bTransaction = true;
			$aryFileInfo = self::getFileInfoSelf($dbh, $idx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.snsUploadPath.$row['up_file_name']);
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'s_'.$row['up_file_name']); //섬네일 삭제
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'m_'.$row['up_file_name']); //섬네일 삭제
					}

				}
				unset($LIB_FILE);
			}
			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function delete_file($dbh){ //개별 파일 삭제
		try {
			$sns_contents_idx = $this->getAddslashes('sns_contents_idx');
			$oldSnsImg = $this->getAddslashes('oldSnsImg');
			$tmpImgFile = $this->getAddslashes('tmpImgFile');

			if (!empty($tmpImgFile)){
				LIB_FILE::DeleteFile(ROOT.tempUploadPath.$tmpImgFile); //템프파일 삭제
				$bTransaction = true;
			}elseif(!empty($oldSnsImg)){
				$bTransaction = false;
				$dbh->beginTransaction();

				if ($bTransaction = self::attachFileDeleteSelf($dbh, $sns_contents_idx)) {
					$sql = 'UPDATE sns_contents SET up_file_name = NULL , up_file_name = NULL WHERE sns_contents_idx = :sns_contents_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':sns_contents_idx', $sns_contents_idx, PDO::PARAM_INT);

					$bTransaction = $stmt->execute();
				}

				if ($bTransaction) {
					$dbh->commit();
				}else {
					$dbh->rollback();


				}
			}

			return $bTransaction;
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function getList($dbh,$sns_link_idx) {
		try {
			if($sns_link_idx === '' ){ $sns_link_idx = NULL ; }

			$sql = 'CALL up_snscontents_list (:sns_link_idx)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':sns_link_idx', $sns_link_idx,			PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$dbh = null;

			return array($list);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	/*
	function getRead($dbh) {
		try {
			$sns_contents_idx = $this->getAddslashes('sns_contents_idx');
			$sns_link_idx = $this->getAddslashes('sns_link_idx');
			//echo("news_idx : $news_idx <br> ");

			$where = 'where sns_content_title IS NOT NULL AND  sns_content_title !=\'\' AND sns_contents_idx = :sns_contents_idx AND sns_link_idx =:sns_link_idx ';
			$sql = 'select * from sns_contents '.$where;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':sns_contents_idx', $sns_contents_idx, PDO::PARAM_INT);
			$stmt->bindParam(':sns_link_idx', $sns_link_idx, PDO::PARAM_INT);
			//$stmt->execute();

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}

				//이전글 // 다음글
				$sql = 'SELECT sns_contents_idx FROM sns_contents
							WHERE
								sns_content_title IS NOT NULL AND  sns_content_title !=\'\'
								AND sns_contents_idx < :sns_contents_idx
								AND sns_link_idx =:sns_link_idx
							ORDER BY sns_contents_idx DESC limit 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_contents_idx', $sns_contents_idx,		 PDO::PARAM_INT);
				$stmt->bindParam(':sns_link_idx', $sns_link_idx,							 PDO::PARAM_INT);
				$stmt->execute();
				$prev_idx = $stmt->fetchColumn();
				//echo 'prev_idx : '.$next_idx.'<br>';
				$this->setAttr('prev_idx', $prev_idx);

				$sql = 'SELECT sns_contents_idx FROM sns_contents
							WHERE
								sns_content_title IS NOT NULL AND  sns_content_title !=\'\'
								AND sns_contents_idx > :sns_contents_idx
								AND sns_link_idx =:sns_link_idx
							ORDER BY sns_contents_idx ASC limit 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_contents_idx', $sns_contents_idx,		 PDO::PARAM_INT);
				$stmt->bindParam(':sns_link_idx', $sns_link_idx,							 PDO::PARAM_INT);
				$stmt->execute();
				$next_idx = $stmt->fetchColumn();
				//echo 'next_idx : '.$next_idx.'<br>';
				$this->setAttr('next_idx', $next_idx);

				//맨 마지막 글
				$sql = 'SELECT sns_contents_idx FROM sns_contents
							WHERE
								sns_content_title IS NOT NULL AND  sns_content_title !=\'\'
								AND sns_link_idx =:sns_link_idx
							ORDER BY sns_contents_idx DESC limit 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_link_idx', $sns_link_idx,							 PDO::PARAM_INT);
				$stmt->execute();
				$last_idx = $stmt->fetchColumn();
				//echo 'next_idx : '.$next_idx.'<br>';
				$this->setAttr('last_idx', $last_idx);

				return true;
			}
			else {
				return false;
			}

			$dbh = null;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
	*/

	function getRead($dbh) {
		try {
			$sns_contents_idx = $this->getAddslashes('sns_contents_idx');
			$sns_link_idx = $this->getAddslashes('sns_link_idx');
			$sql = 'SELECT
							sns_content_title, sns_content, up_file_name, create_date
						FROM sns_contents
						WHERE sns_link_idx = :sns_link_idx AND sns_content_title IS NOT NULL AND sns_content_title != \'\'
						ORDER BY sns_contents_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':sns_link_idx', $sns_link_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			echo $e->getMessage();
			return false;
		}
	}


	public static function getLink($dbh, $sns_link_idx ){
		try {
			//쇼셜 링크
				$sql = 'SELECT sns_url FROM sns_link WHERE sns_link_idx = :sns_link_idx  ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':sns_link_idx', $sns_link_idx,							 PDO::PARAM_INT);
				$stmt->execute();
				$sns_url = $stmt->fetchColumn();
				return  $sns_url;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}


	}


} //End Class
