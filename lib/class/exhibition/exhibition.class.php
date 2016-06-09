<?php
class Exhibition
{
	var $attr;

	function __construct() {
		$this->attr = array();
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


	function insert($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$user_idx = $this->getAddslashes('user_idx');
			$exh_user_name = $this->getAddslashes('user_name');
			$exh_tel = $this->getAddslashes('exh_tel');
			$exh_link = $this->getAddslashes('exh_link');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$up_file_name = $this->getAddslashes('up_file_name');
			$ori_file_name = $this->getAddslashes('ori_file_name');
			//echo $exh_user_name ;

			$sql = 'INSERT INTO exhibition (
							user_idx, exh_user_name, exh_tel, exh_link, 
								ip_addr, up_file_name, ori_file_name
						) VALUES(
								:user_idx, :exh_user_name, :exh_tel, :exh_link,
								:ip_addr, :up_file_name, :ori_file_name
						)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx',			$user_idx,			PDO::PARAM_INT);
			$stmt->bindParam(':exh_user_name',		$exh_user_name,		PDO::PARAM_STR, 200);
			$stmt->bindParam(':exh_tel',			$exh_tel,				PDO::PARAM_STR, 11);
			$stmt->bindParam(':exh_link',			$exh_link,				PDO::PARAM_STR, 50);
			$stmt->bindParam(':ip_addr',			$ip_addr,				PDO::PARAM_STR, 30);
			$stmt->bindParam(':up_file_name',	$up_file_name,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':ori_file_name',	$ori_file_name,		PDO::PARAM_STR, 30);


			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
			}

			$exh_idx = $dbh->lastInsertId(); //마지막으로 삽입된 행의 ID, 시퀀스 객체의 마지막 값을 리턴

			if ($bTransaction) {
				$resurt = $dbh->commit();
				//echo 'result : '.$result.'<br>';
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

			/*
			if ($stmt->execute() && $dbh->lastInsertId() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
			*/
		}
		catch(PDOExecption $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();


			$exh_idx = $this->getAddslashes('exh_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$exh_title = $this->getAddslashes('exh_title');
			$exh_company = $this->getAddslashes('exh_company');
			$exh_tel = $this->getAddslashes('exh_tel');
			$exh_start_date = $this->getAddslashes('exh_start_date');
			$exh_last_date = $this->getAddslashes('exh_last_date');
			$exh_link = $this->getAddslashes('exh_link');
			$exh_confirm = $this->getAddslashes('exh_confirm');
			$exh_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('exh_content')));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$modify_date = date('Y-m-d H:i:s', time());
			$up_file_name = $this->getAddslashes('up_file_name');
			$ori_file_name = $this->getAddslashes('ori_file_name');
			echo 'up_file_name : '.$up_file_name.'<br>';
			echo 'ori_file_name : '.$ori_file_name.'<br>';
			//exit;

			$sql = 'UPDATE exhibition SET
							exh_title = :exh_title,
							exh_company = :exh_company,
							exh_tel = :exh_tel,
							exh_start_date = :exh_start_date,
							exh_last_date = :exh_last_date,
							exh_link = :exh_link,
							exh_confirm = :exh_confirm,
							exh_content = :exh_content,
							ip_addr = :ip_addr,
							modify_date = :modify_date,
							up_file_name = :up_file_name,
							ori_file_name = :ori_file_name
						WHERE exh_idx = :exh_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_title',			$exh_title,				PDO::PARAM_STR, 200);
			$stmt->bindParam(':exh_company',$exh_company,	PDO::PARAM_STR, 50);
			$stmt->bindParam(':exh_tel',			$exh_tel,				PDO::PARAM_STR, 11);
			$stmt->bindParam(':exh_start_date',$exh_start_date,	PDO::PARAM_STR, 30);
			$stmt->bindParam(':exh_last_date', $exh_last_date,	PDO::PARAM_INT);
			$stmt->bindParam(':exh_link',			$exh_link,				PDO::PARAM_STR, 50);
			$stmt->bindParam(':exh_confirm',	$exh_confirm,		PDO::PARAM_STR, 200);
			$stmt->bindParam(':exh_content',	$exh_content,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':ip_addr',			$ip_addr,				PDO::PARAM_STR, 30);
			$stmt->bindParam(':ip_addr',			$ip_addr,				PDO::PARAM_STR, 30);
			$stmt->bindParam(':modify_date',			$modify_date);
			$stmt->bindParam(':up_file_name',	$up_file_name,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':ori_file_name',	$ori_file_name,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':exh_idx',			$exh_idx,				PDO::PARAM_INT);
			$stmt->execute();

			$bTransaction = Exhibition::setAttachFile($dbh, $exh_idx);
			//$bTransaction = TRUE;

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function updateConfirm($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$exh_idx = (!empty($this->getAddslashes('exh_idx'))) ? $this->getAddslashes('exh_idx') : null;
			$mod = (!empty($this->getAddslashes('mod'))) ? $this->getAddslashes('mod') : 'W';
			$modify_date = date('Y-m-d H:i:s', time());
			//echo 'exh_idx : '.$exh_idx.'<br>';
			//echo 'mod : '.$mod.'<br>';

			$exh_confirm=$mod;

			$sql = 'UPDATE exhibition SET
							exh_confirm = :exh_confirm,
							modify_date = :modify_date
						WHERE exh_idx = :exh_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_confirm',	$exh_confirm,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':modify_date',	$modify_date,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':exh_idx',			$exh_idx,				PDO::PARAM_INT);
			$stmt->execute();

			$bTransaction = Exhibition::setAttachFile($dbh, $exh_idx);
			//$bTransaction = TRUE;

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}



	function delete($dbh) {
		try {
			$exh_idx = $this->getAddslashes('exh_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDeleteSelf($dbh, $exh_idx)) {
				if ($bTransaction = self::attachFileDelete($dbh, $exh_idx)) {
					$sql = 'DELETE FROM exhibition WHERE exh_idx = :exh_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
					$bTransaction = $stmt->execute();
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
			//return true;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$aExh_idx = $this->getAddslashes('exh_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM exhibition WHERE exh_idx = :exh_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);

			foreach($aExh_idx as $exh_idx) {
				//if ($bTransaction = self::attachFileDelete($dbh, $exh_idx)) {
				if ($bTransaction = self::attachFileDeleteSelf($dbh, $exh_idx)) {
					$bTransaction = true;
					$stmt->execute();
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
		catch(PDOExecption $e) {
			if (isset($dbh)) {
				$dbh->rollback();
				print 'Error!: ' . $e->getMessage() . '</br>';
			}
			return false;
		}
	}


	// 첨부파일 처리
	function setAttachFile($dbh, $exh_idx) {
		try {
			$bTransaction = true;
			$exh_content = str_replace(tempUploadPath, exhUploadPath, htmlspecialchars($this->getAddslashes('exh_content')));
			$aryFileList = $this->getAddslashes('file_list');
			print_r($aryFileList);

			if (!is_null($aryFileList)) {
				$LIB_FILE = new LIB_FILE();

				foreach ($aryFileList as $value) {
					if ($value != '') {
						$aFileInfo = explode("|", $value);
						$bContentImg = true;

						echo '<br>aFileInfo2:'.$aFileInfo[2];
						//exit;
						// 본문 이미지인 경우
						if ($aFileInfo[4] == 1) {
							echo '본문';
							if (strpos($exh_content, $aFileInfo[2]) === false) {
								$bContentImg = false;
							}
						}

						if ($bContentImg && $aFileInfo[0] == 0 && file_exists(ROOT.tempUploadPath.$aFileInfo[2])) {
							$reg_date = date('Y-m-d H:i:s', time());


							$sql = 'INSERT INTO exh_upfile (exh_idx, up_file_name, ori_file_name, file_size, file_type, reg_date) VALUES(:exh_idx, :up_file_name, :ori_file_name, :file_size, :file_type, :reg_date)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
							//$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
							$stmt->bindParam(':up_file_name', $aFileInfo[2], PDO::PARAM_STR, 50);
							$stmt->bindParam(':ori_file_name', $aFileInfo[1], PDO::PARAM_STR, 50);
							$stmt->bindParam(':file_size', $aFileInfo[3], PDO::PARAM_INT);
							$stmt->bindParam(':file_type', $aFileInfo[4], PDO::PARAM_INT);
							$stmt->bindParam(':reg_date', $reg_date);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
							else {
								$bTransaction = false;
							}

							/*
							// 첨부파일인 경우
							if ($aFileInfo[4] == 2) {
								$sql = 'update bbs set upfile_cnt = upfile_cnt + 1 where bbs_idx = :bbs_idx and bbs_code = :bbs_code';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
								$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
								else {
									$bTransaction = false;
								}
							}
							*/

							// 파일 이동
							//echo 'ROOT.tempUploadPath.aFileInfo[2] : '. ROOT.tempUploadPath.$aFileInfo[2] .'<br>';
							//echo 'ROOT.exhUploadPath.aFileInfo[2] : '. ROOT.exhUploadPath.$aFileInfo[2] .'<br>';
							if ($LIB_FILE->moveFile(ROOT.tempUploadPath.$aFileInfo[2], ROOT.exhUploadPath.$aFileInfo[2])) {
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
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getList($dbh) {
		try {
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;
			$cfm = (!empty($this->getAddslashes('cfm'))) ? $this->getAddslashes('cfm') : null;

			if ($word === '' ){ $word = NULL ; } 
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate !== NULL ) { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($sz === '' ){ $sz = NULL ; } 
			if($sort === '' ){ $sort = NULL ; } 
			if($od === '' ){ $od = NULL ; } 
			if($cfm === '' ){ $cfm = NULL ; } 


			//echo(" CALL up_exhibition_list (  $page, $sz, $sort, $od, $word, $bdate, $edate, $cfm) <br>");
			$sql = 'CALL up_exhibition_list ( :page, :sz, :sort, :od, :word, :bdate, :edate, :cfm)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':bdate', $bdate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':cfm', $cfm,								PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt,$total_all_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//메인 노출 베너 2페이지부터 20 개씩 나와야 한다.
	function getList20($dbh) {
		try {
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');


			$start = ($page - 1) * $sz;
			$end = $sz;
			
			if( $sz > 6 ) { //PC 버전일 경우 1페이지는 14개 2페이지부터는 20개씩 노출 되어야 한다. (모바일페이지는 6개씩 노출된다.)
				if($page == 1 ){
					$start = ($page - 1) * 14 ;
					$end = $sz;
				}else{
					$start = ( ($page - 1) * $sz ) -  6 ; //1페이지가 14 개만 나오고 2페이지 부터 20개씩 나오므로 차감(-6)을 한다.
					$end = $sz;
				}
			}
			
			//echo '<br> start = '.$start;
			//echo '<br> end = '.$end;
			
			$sql = 'SELECT 
							exh_idx, user_idx, exh_user_name, exh_title, exh_tel, exh_company, exh_content, exh_start_date, exh_last_date, exh_link, 
							exh_confirm, up_file_name, ip_addr, modify_date, create_date
						  FROM exhibition 
						  WHERE TRUE AND (exh_confirm = \'Y\' ) 
						  order by exh_idx desc limit :start , :end ' ;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start ,							PDO::PARAM_INT);
			$stmt->bindParam(':end', $end,								PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$sql = 'SELECT COUNT(exh_idx) FROM exhibition WHERE (exh_confirm = \'Y\' ) ';
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();
			$total_all_cnt = $total_cnt ;

			$dbh = null;

			return array($list, $total_cnt,$total_all_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getFrontTotal($dbh){
		try {
			$sql = 'SELECT COUNT(*) FROM exhibition WHERE exh_confirm=\'Y\' ';
			$stmt = $dbh->prepare($sql);

			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return $total_cnt ;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
		

	function getRead($dbh) {
		try {
			$exh_idx = $this->getAddslashes('exh_idx');
			//echo("exh_idx : $exh_idx <br> ");

			$sql = 'select * from view_exhibition where exh_idx = :exh_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
			//$stmt->execute();

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

			$dbh = null;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function getEdit($dbh, $bbs_idx, $bbs_code) {
		try {
			$sql = 'select * from bbs where bbs_idx = :bbs_idx and bbs_code = :bbs_code ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			//$stmt->execute();

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
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	
	// 첨부파일 정보 가져오기 // exhibition 테이블 용
	function getFileInfoSelf($dbh, $exh_idx) {
		try {
			$sql = 'SELECT exh_idx, up_file_name, ori_file_name FROM exhibition WHERE exh_idx = :exh_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);

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
	// 물리적 파일 삭제 // 첨부파일 exhibition 테이블 용
	function attachFileDeleteSelf($dbh, $exh_idx) {
		try {
			$bTransaction = true;
			$aryFileInfo = self::getFileInfoSelf($dbh, $exh_idx);
			if ($bTransaction) {
				
				foreach($aryFileInfo as $row) {
					if (!empty($row['up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.exhUploadPath.$row['up_file_name']);
						LIB_FILE::DeleteFile(ROOT.exhUploadPath.'s_'.$row['up_file_name']); //섬네일 삭제
						LIB_FILE::DeleteFile(ROOT.exhUploadPath.'m_'.$row['up_file_name']); //섬네일 삭제
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

// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $exh_idx,  $file_type = NULL) {
		try {
			if (is_null($file_type)) {
				$sql = 'SELECT exh_upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM exh_upfile WHERE exh_idx = :exh_idx ';
			}
			else {
				$sql = 'SELECT exh_upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM exh_upfile WHERE exh_idx = :exh_idx  and file_type = :file_type';
			}

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
			//$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

			if (!is_null($file_type)) {
				$stmt->bindParam(':file_type', $file_type, PDO::PARAM_INT);
			}

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

	// 데이터 및 물리적 파일 삭제 //에디터 게시판용 첨부파일
	function attachFileDelete($dbh, $exh_idx) {
		try {
			//echo "bbs_code:$bbs_code";
//echo "여기 오나<br>";
			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $exh_idx);

			//print_r($aryFileInfo);
			$sql = 'delete from exh_upfile where exh_idx = :exh_idx  and exh_upfile_idx = :exh_upfile_idx';

			foreach($aryFileInfo as $value) {
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
				$stmt->bindParam(':exh_upfile_idx', $value['exh_upfile_idx'], PDO::PARAM_INT);
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
					$LIB_FILE->DeleteFile(ROOT.exhUploadPath.$value['up_file_name']);
				}
			}

			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}

	}


	// 선택한 첨부파일 삭제(수정 모드에서)
	function selectFileDelete($dbh) {
		try {
			$exh_idx = $this->getAddslashes('exh_idx');
			$exh_upfile_idx = $this->getAddslashes('exh_upfile_idx');

			$bTransaction = true;
			$dbh->beginTransaction();
			$sql = 'SELECT up_file_name, file_type FROM exh_upfile WHERE exh_idx = :exh_idx  and exh_upfile_idx = :exh_upfile_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
			$stmt->bindParam(':exh_upfile_idx', $exh_upfile_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$sql = 'DELETE FROM exh_upfile WHERE exh_idx = :exh_idx and exh_upfile_idx = :exh_upfile_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
				$stmt->bindParam(':exh_upfile_idx', $exh_upfile_idx, PDO::PARAM_INT);

				
				if ($stmt->execute()) {
					// 첨부파일 이라면
					if ($row['file_type'] == 2) {
						/*
						$sql = 'UPDATE bbs SET upfile_cnt = upfile_cnt - 1 WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
						$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
						$bTransaction = $stmt->execute();
						*/
					}

					$LIB_FILE = new LIB_FILE();
					$LIB_FILE->DeleteFile(ROOT.exhUploadPath.$row['up_file_name']);
				}
				else {
					$bTransaction = false;
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
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

}
?>