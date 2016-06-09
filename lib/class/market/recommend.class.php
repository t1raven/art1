<?php
class Recommend
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


	function insert($dbh) {
		try {
			$referee = $this->getAddslashes('referee');
			$img_up_file_name = $this->getAddslashes('img_up_file_name');
			$img_ori_file_name = $this->getAddslashes('img_ori_file_name');
			$sql = 'INSERT INTO recommend (referee, img_up_file_name) VALUES(:referee, :img_up_file_name)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':referee', $referee, PDO::PARAM_STR, 50);
			$stmt->bindParam(':img_up_file_name', $img_up_file_name, PDO::PARAM_STR, 25);

			if ($stmt->execute()) {
				//echo "chk1";
				return true;
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$recommend_idx = $this->getAddslashes('recommend_idx');
			$referee = $this->getAddslashes('referee');
			$img_up_file_name = $this->getAddslashes('img_up_file_name');
			$img_ori_file_name = $this->getAddslashes('img_ori_file_name');
			$sql = 'UPDATE recommend SET referee = :referee, img_up_file_name = :img_up_file_name WHERE recommend_idx = :recommend_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':referee', $referee, PDO::PARAM_STR, 50);
			$stmt->bindParam(':img_up_file_name', $img_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':recommend_idx', $recommend_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function delete($dbh) {
		try {
			$del_state = 'Y';
			$recommend_idx = $this->getAddslashes('recommend_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDelete($dbh, $recommend_idx)) {
				//$sql = 'DELETE FROM recommend WHERE recommend_idx = :recommend_idx';
				$sql = 'UPDATE recommend SET del_state = :del_state WHERE recommend_idx = :recommend_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
				$stmt->bindParam(':recommend_idx', $recommend_idx, PDO::PARAM_INT, 11);
				$bTransaction = $stmt->execute();
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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$aArtistIdx = $this->getAddslashes('artist_idx');
			$bbs_code = $this->getAddslashes('bbs_code');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM recommend WHERE artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

			foreach($aArtistIdx as $artist_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $artist_idx)) {
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

	function getList($dbh) {
		try {
			$del_state = 'N';
			$sql = 'SELECT recommend_idx, referee, img_up_file_name FROM recommend WHERE del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				$result = null;
			}
			return $result;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getEdit($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx');
			$sql = 'select artist_idx, artist_name, artist_en_name, birth_year, education_year, education_name, award_year, award_name, private_year, private_name, team_year, team_name, photo_up_file_name, photo_ori_file_name, cv_up_file_name, cv_ori_file_name from recommend where artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

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

	function getSearchReferee($dbh) {
		try {
			$artist_name = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$sql = 'SELECT recommend_idx, referee FROM recommend ORDER BY recommend_idx desc';
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;
			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}



	// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $recommend_idx) {
		try {
			$sql = 'SELECT recommend_idx, img_up_file_name FROM recommend WHERE recommend_idx = :recommend_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':recommend_idx', $recommend_idx, PDO::PARAM_INT);

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

	// 물리적 파일 삭제
	function attachFileDelete($dbh, $recommend_idx) {
		try {
			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $recommend_idx);
			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['img_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.recommendUploadPath.$row['img_up_file_name']);
					}
				}
			}
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	/*
	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		$img_up_file_name = null;
		$img_ori_file_name = null;
		$recommend_idx = $this->getAddslashes('recommend_idx');
		$aryFileInfo = self::getFileInfo($dbh, $recommend_idx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if ($attach === 'img') {
			$sql = 'UPDATE recommend SET img_up_file_name = :img_up_file_name FROM recommend WHERE recommend_idx = :recommend_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':img_up_file_name', $img_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':recommend_idx', $recommend_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['img_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.recommendUploadPath.$row['img_up_file_name']);
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
	*/

}
?>