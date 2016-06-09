<?php
class Event
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
			if (gettype($this->attr[$key]) === 'string') {
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
			$evt_title = $this->getAddslashes('evt_title');
			$evt_copyright = $this->getAddslashes('evt_copyright');
			$evt_main_img = $this->getAddslashes('evt_main_img');
			$evt_display_state = $this->getAddslashes('evt_display_state');
			$para_sub_title = $this->getAddslashes('para_sub_title');
			$para_artwork = $this->getAddslashes('para_artwork');
			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'INSERT INTO event_exhibition(evt_title, evt_copyright, evt_main_img, evt_display_state) VALUES (:evt_title, :evt_copyright, :evt_main_img, :evt_display_state)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_title', $evt_title, PDO::PARAM_STR, 100);
			$stmt->bindParam(':evt_copyright', $evt_copyright, PDO::PARAM_STR, 100);
			$stmt->bindParam(':evt_main_img', $evt_main_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':evt_display_state', $evt_display_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				$bTransaction = true;
				$evt_idx = $dbh->lastInsertId();
				if (!empty($para_sub_title)) {
					$sql = 'INSERT INTO event_exhibition_paragraph(evt_idx, para_sub_title, para_artwork) VALUES (:evt_idx, :para_sub_title, :para_artwork)';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);
					$stmt->bindParam(':para_sub_title', $para_sub_title, PDO::PARAM_STR, 600);
					$stmt->bindParam(':para_artwork', $para_artwork, PDO::PARAM_STR, 1200);
					if ($stmt->execute()) {
						$bTransaction = true;
					}
					else {
						$bTransaction = false;
					}
				}
			}
			else {
				$bTransaction = false;
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
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function update($dbh) {
		try {
			$evt_idx = $this->getAddslashes('evt_idx');
			$evt_title = $this->getAddslashes('evt_title');
			$evt_copyright = $this->getAddslashes('evt_copyright');
			$evt_main_img = $this->getAddslashes('evt_main_img');
			$evt_display_state = $this->getAddslashes('evt_display_state');
			$para_sub_title = $this->getAddslashes('para_sub_title');
			$para_artwork = $this->getAddslashes('para_artwork');
			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'UPDATE event_exhibition SET evt_title = :evt_title, evt_copyright = :evt_copyright, evt_main_img = :evt_main_img, evt_display_state = :evt_display_state WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_title', $evt_title, PDO::PARAM_STR, 100);
			$stmt->bindParam(':evt_copyright', $evt_copyright, PDO::PARAM_STR, 100);
			$stmt->bindParam(':evt_main_img', $evt_main_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':evt_display_state', $evt_display_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				$bTransaction = true;
				if (!empty($para_sub_title)) {
					$sql = 'UPDATE event_exhibition_paragraph SET para_sub_title = :para_sub_title, para_artwork = :para_artwork WHERE evt_idx = :evt_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':para_sub_title', $para_sub_title, PDO::PARAM_STR, 600);
					$stmt->bindParam(':para_artwork', $para_artwork, PDO::PARAM_STR, 1200);
					$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

					if ($stmt->execute()) {
						$bTransaction = true;
					}
					else {
						$bTransaction = false;
					}
				}
			}
			else {
				$bTransaction = false;
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
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function delete($dbh) {
		try {
			$evt_idx = $this->getAddslashes('evt_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM event_exhibition_paragraph WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				$sql = 'DELETE FROM event_exhibition WHERE evt_idx = :evt_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

				if ($bTransaction = self::attachFileDelete($dbh, $evt_idx)) {
					if ($stmt->execute()) {
						$bTransaction = true;
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
			//return true;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$aEventIdx = $this->getAddslashes('evt_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			foreach($aEventIdx as $evt_idx) {
				$sql = 'DELETE FROM event_exhibition_paragraph WHERE evt_idx = :evt_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					$sql = 'DELETE FROM event_exhibition WHERE evt_idx = :evt_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

					if ($bTransaction = self::attachFileDelete($dbh, $evt_idx)) {
						if ($stmt->execute()) {
							$bTransaction = true;
						}
					}
					else {
						$bTransaction = false;
						break;
					}
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
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			/*
			echo "<br>page:$page";
			echo "<br>sz:$sz";
			echo "<br>sort:$sort";
			echo "<br>od:$od";
			*/


			$sql = 'CALL up_event_list (:page, :sz, :sort, :od)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort, PDO::PARAM_INT, 1);
			$stmt->bindParam(':od', $od, PDO::PARAM_INT, 1);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getEventEdit($dbh) {
		try {
			$evt_idx = $this->getAddslashes('evt_idx');
			$sql = 'SELECT evt_title, evt_copyright, evt_main_img, evt_display_state FROM event_exhibition WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

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
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getEventParagraphEdit($dbh) {
		try {
			$evt_idx = $this->getAddslashes('evt_idx');
			$sql = 'SELECT para_idx, evt_idx, para_sub_title, para_artwork FROM event_exhibition_paragraph WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

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
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 상품(작품)목록 가져오기
	function getGoodsListInfo($dbh) {
		try {
			$goods_name = $this->getAddslashes('goods_name');
			$goods_name = '%'.$goods_name.'%';
			$sql = 'SELECT a.goods_idx, a.goods_name, a.artist_idx, b.artist_name FROM goods as a inner join artist_info as b on a.artist_idx = b.artist_idx WHERE a.goods_name like :goods_name';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);

			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getGoodsName($dbh, $goods_idx) {
		try {
			if (!empty($goods_idx)) {
				$sql = 'SELECT a.goods_idx, a.goods_name, a.goods_list_img, b.artist_name, a.goods_cnt, a.is_rental FROM goods as a inner join artist_info as b on a.artist_idx = b.artist_idx WHERE a.goods_idx =:goods_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					 return $stmt->fetch(PDO::FETCH_ASSOC);
				}
				else {
					return null;
				}
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function setGoodsName($dbh, $ary) {
		$i = 0;
		$aTemp = null;
		foreach($ary as $idx) {
			$row = self::getGoodsName($dbh, $idx);
			if (!empty($row['goods_name'])) {
				$aTemp[$i]= $row['goods_name'].'('.$row['artist_name'].')';
			}
			else {
				$aTemp[$i]= '';
			}
			++$i;
		}

		return $aTemp;
	}

	// 이미지 파일명  가져오기
	function getFileInfo($dbh, $evt_idx) {
		try {
			$sql = 'SELECT evt_main_img FROM event_exhibition WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT);

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
	function attachFileDelete($dbh, $evt_idx) {
		try {
			//echo "evt_idx:$evt_idx";
			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $evt_idx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['evt_main_img'])) {
						LIB_FILE::DeleteFile(ROOT.eventUploadPath.$row['evt_main_img']);
					}
				}
			}
			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		$evt_main_img = null;
		$evt_idx = $this->getAddslashes('evt_idx');
		$aryFileInfo = self::getFileInfo($dbh, $evt_idx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if (!empty($attach)) {
			$sql = 'UPDATE event_exhibition SET evt_main_img = :evt_main_img WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_main_img', $evt_main_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['evt_main_img'])) {
						LIB_FILE::DeleteFile(ROOT.eventUploadPath.$row['evt_main_img']);
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

	// 프론트 이벤트 전시회 배너 가져오기
	function getEventExhibitionBanner($dbh) {
		try {
			$evt_display_state = 'Y';
			$sql = 'SELECT evt_idx, evt_title, evt_copyright, evt_main_img FROM event_exhibition WHERE evt_display_state = :evt_display_state ORDER BY evt_idx DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_display_state', $evt_display_state, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}




	// 사용자 전시회 부분 작품 정보
	function getGoodsInfo($dbh, $ary) {
		$i = 0;
		$aTemp = null;
		foreach($ary as $idx) {
			$row = self::getGoodsName($dbh, $idx);
			if (!empty($row['goods_name'])) {
				$aTemp[$i]= $row['goods_idx'].'§'.$row['goods_list_img'].'§'.$row['artist_name'].'§'.$row['goods_name'].'§'.$row['goods_cnt'].'§'.$row['is_rental'];
			}
			else {
				$aTemp[$i]= '';
			}
			++$i;
		}

		return $aTemp;
	}


}
?>