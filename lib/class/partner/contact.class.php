<?php
class Contact
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
			$galleryIdx = $this->getAddslashes('galleryIdx');
			$userIdx = $this->getAddslashes('userIdx');
			$senderName = $this->getAddslashes('senderName');
			$senderEmail =$this->getAddslashes('senderEmail');
			$senderPhone = $this->getAddslashes('senderPhone');
			$msg = strip_tags($this->getAddslashes('msg'));
			$receiverName = $this->getAddslashes('receiverName');
			$artistIdx = $this->getAddslashes('artistIdx');
			$artistName = $this->getAddslashes('artistName');
			$worksIdx = $this->getAddslashes('worksIdx');
			$worksName = $this->getAddslashes('worksName');
			$makingDate = $this->getAddslashes('makingDate');
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$sql = 'INSERT INTO TB_GALLERY_CONTACT_HISTORY SET
							galleryIdx = :galleryIdx,
							userIdx = :userIdx,
							senderName = :senderName,
							senderEmail = :senderEmail,
							senderPhone = :senderPhone,
							msg = :msg,
							receiverName = :receiverName,
							artistIdx = :artistIdx,
							artistName = :artistName,
							worksIdx = :worksIdx,
							worksName = :worksName,
							makingDate = :makingDate,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':userIdx', $userIdx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':senderName', $senderName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':senderEmail', $senderEmail, PDO::PARAM_STR, 60);
			$stmt->bindParam(':senderPhone', $senderPhone, PDO::PARAM_STR, 30);
			$stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
			$stmt->bindParam(':receiverName', $receiverName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksName', $worksName, PDO::PARAM_STR, 100);
			$stmt->bindParam(':makingDate', $makingDate, PDO::PARAM_STR, 4);
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

	function delete($dbh) {
		try {
			$idx = $this->getAddslashes('idx');
			$sql = 'DELETE FROM TB_GALLERY_CONTACT_HISTORY WHERE historyIdx = :historyIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':historyIdx', $idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return array(true, 'success');
			}
			else {
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
			$idxs = $this->getAddslashes('idxs');

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'DELETE FROM TB_GALLERY_CONTACT_HISTORY WHERE historyIdx = :historyIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':historyIdx', $idx, PDO::PARAM_INT, 11);

			foreach($idxs as $idx) {
				$bTransaction = true;
				$stmt->execute();
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
		catch(PDOException $e) {
			$dbh->rollback();
			//echo 'Error: '.$e->getMessage();
			return array(false, 'error');
		}
	}

	function getList($dbh) {
		try {
			$list = false;
			$totalCnt = 0;
			$pg = (!empty($this->getAddslashes('pg'))) ? (int)$this->getAddslashes('pg') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10;
			$gnm = $this->getAddslashes('gnm');
			$snm = $this->getAddslashes('snm');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			$subQuery = '';
			$start = ($pg - 1) * $sz;

			$query = ' SELECT historyIdx, senderName, senderEmail, senderPhone, msg, receiverName, artistName, worksName, makingDate, createDate FROM TB_GALLERY_CONTACT_HISTORY ';

			if (!empty($gnm) && !empty($snm)) {
				if ($st === 0) {
					$subQuery = ' AND (receiverName LIKE :receiverName AND senderName LIKE :senderName) ';
				}
				else {
					$subQuery = ' AND (receiverName LIKE :receiverName OR senderName LIKE :senderName) ';
				}
				$receiverName = $gnm."%";
				$senderName = $snm."%";
			}
			else if (!empty($gnm) && empty($snm)) {
				if ($st === 0) {
					$subQuery = ' AND receiverName LIKE :receiverName ';
				}
				else {
					$subQuery = ' OR receiverName LIKE :receiverName ';
				}
				$receiverName = $gnm."%";
			}
			else if (empty($gnm) && !empty($snm)) {
				if ($st === 0) {
					$subQuery = ' AND senderName LIKE :senderName ';
				}
				else {
					$subQuery = ' OR senderName LIKE :senderName ';
				}
				$senderName = $snm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}

			$sql = $query.' WHERE  1 = 1 '.$subQuery.' ORDER BY historyIdx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			if (!empty($gnm) && !empty($snm)) {
				$stmt->bindParam(':receiverName', $receiverName, PDO::PARAM_STR, 50);
				$stmt->bindParam(':senderName', $senderName, PDO::PARAM_STR, 50);
			}
			else if (!empty($gnm) && empty($snm)) {
				$stmt->bindParam(':receiverName', $receiverName, PDO::PARAM_STR, 50);
			}
			else if (empty($gnm) && !empty($snm)) {
				$stmt->bindParam(':senderName', $senderName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(artistIdx) FROM TB_GALLERY_CONTACT_HISTORY WHERE 1 = 1 '.$subQuery;
				$stmt = $dbh->prepare($sql);

				if (!empty($gnm) && !empty($snm)) {
					$stmt->bindParam(':receiverName', $receiverName, PDO::PARAM_STR, 50);
					$stmt->bindParam(':senderName', $senderName, PDO::PARAM_STR, 50);
				}
				else if (!empty($gnm) && empty($snm)) {
					$stmt->bindParam(':receiverName', $receiverName, PDO::PARAM_STR, 50);
				}
				else if (empty($gnm) && !empty($snm)) {
					$stmt->bindParam(':senderName', $senderName, PDO::PARAM_STR, 50);
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

} // End Class
