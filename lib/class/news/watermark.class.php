<?php
class Watermark
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

			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$imgFile = $this->getAddslashes('imgFile');
			$up_file_name = $this->getAddslashes('up_file_name');
			$ori_file_name = $this->getAddslashes('ori_file_name');

			
			echo "
			INSERT INTO watermark (
							up_file_name, ori_file_name
						) VALUES(
							$up_file_name, $ori_file_name
						)			
			
			";
			$sql = 'INSERT INTO watermark (
							up_file_name, ori_file_name
						) VALUES(
							:up_file_name, :ori_file_name
						)' ;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':up_file_name',$up_file_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':ori_file_name',$ori_file_name,							PDO::PARAM_STR, 30);

			if ($stmt->execute() ) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				//echo('뉴스 메인 입력 에러');
				exit;
			}

			$water_idx = $dbh->lastInsertId(); //마지막으로 삽입된 행의 ID, 시퀀스 객체의 마지막 값을 리턴

			if ($bTransaction) {
				$resurt = $dbh->commit();
				//echo 'result : '.$result.'<br>';
			}
			else {
				$dbh->rollback();
			}
			
			if ($bTransaction){
				return $water_idx;
			}else{
				return $bTransaction;
			}

		}
		catch(PDOExecption $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$water_idx = $this->getAddslashes('water_idx');
			$imgFile = $this->getAddslashes('imgFile');
			$up_file_name = $this->getAddslashes('up_file_name');
			$ori_file_name = $this->getAddslashes('ori_file_name');
			$modify_date = date('Y-m-d H:i:s', time());

			$sql = 'UPDATE watermark SET
							up_file_name = :up_file_name, 
							ori_file_name = :ori_file_name, 
							modify_date = :modify_date 
						WHERE water_idx = :water_idx ';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':water_idx',$water_idx,					PDO::PARAM_INT);
			$stmt->bindParam(':up_file_name',$up_file_name,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':ori_file_name',$ori_file_name,		PDO::PARAM_STR, 30);
			$stmt->bindParam(':modify_date',$modify_date,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':water_idx',$water_idx,					PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				
				exit;
			}

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

	function delete($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			
			if ($bTransaction = self::attachFileDelete($dbh, $news_idx)) {
				$sql = 'DELETE FROM news_main WHERE news_idx = :news_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
				$bTransaction = $stmt->execute();
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
			$aNews_idx = $this->getAddslashes('news_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM news_main WHERE news_idx = :news_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);

			foreach($aNews_idx as $news_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $news_idx)) {
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


	function delete_file($dbh){ //개별 파일 삭제
		try {
			$water_idx = $this->getAddslashes('water_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDeleteSelf($dbh, $water_idx)) {
				$sql = 'UPDATE watermark SET ori_file_name = NULL , up_file_name = NULL WHERE water_idx = :water_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':water_idx', $water_idx, PDO::PARAM_INT);


				$bTransaction = $stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function getRead($dbh) {
		try {
			$water_idx = $this->getAddslashes('water_idx');

			$sql = 'select * from watermark where water_idx = :water_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':water_idx', $water_idx, PDO::PARAM_INT);
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


	function getEdit($dbh) {
		try {
			$water_idx = $this->getAddslashes('water_idx');
			//echo 'water_idx :'.$water_idx ;
			//exit;
			
			$sql = 'select * from watermark where water_idx = :water_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':water_idx', $water_idx, PDO::PARAM_INT);
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

	public static function getWatermarkimage($dbh, $water_idx){
		try {
			//$water_idx = $this->getAddslashes('water_idx');
			$water_idx = (empty($water_idx)) ? 6 : $water_idx ;  

			$sql = 'select up_file_name from watermark where water_idx = :water_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':water_idx', $water_idx, PDO::PARAM_INT);
			//$stmt->execute();

			if ($stmt->execute() ) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				//echo print_r($row);
				/*
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}
				*/
				return $row['up_file_name'];
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	
	// 첨부파일 정보 가져오기 // News 테이블 용
	function getFileInfoSelf($dbh, $idx) {
		try {
			$sql = 'SELECT water_idx, up_file_name, ori_file_name FROM watermark WHERE water_idx = :water_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':water_idx', $idx, PDO::PARAM_INT);

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
						LIB_FILE::DeleteFile(ROOT.newsUploadPath.$row['up_file_name']);
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

}
?>