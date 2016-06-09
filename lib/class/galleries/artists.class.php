<?php
class Artists
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

	function getList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = ' SELECT
							artistIdx,
							artistName,
							artistNameEn,
							upfileName
						FROM TB_GALLERY_ARTIST
						WHERE galleryIdx = :galleryIdx
						ORDER BY artistIdx DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
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

	function getRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');
			$sql = ' SELECT
							artistIdx,
							artistName,
							artistNameEn,
							upfileName,
							birthday,
							introduction
						FROM TB_GALLERY_ARTIST
						WHERE artistIdx = :artistIdx AND galleryIdx = :galleryIdx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
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

	// 선택한 작품들 가져오기
	function getMyArtworksList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');
			//echo "aidx:$artistIdx";
			$sql = ' SELECT
							a.worksIdx,
							a.artistName,
							a.artistNameEn,
							a.worksName,
							a.worksNameEn,
							a.makingDate,
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.galleryIdx = :galleryIdx AND a.artistIdx = :artistIdx
						ORDER BY a.sort DESC, a.worksIdx DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
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


	// 작가의 전시회 여부
	function getIsExhibition($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');

			$sql = ' SELECT COUNT(exhiArtistIdx)
						FROM TB_GALLERY_EXHIBITION_ARTIST AS a INNER JOIN TB_GALLERY_EXHIBITION AS b ON a.exhibitionIdx = b.exhibitionIdx
						WHERE b.galleryIdx = :galleryIdx AND a.artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

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

} // End Class
