<?php
class Exhibitions
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



	function getTopExhibitionsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 2;
			$sql = ' SELECT
							a.exhibitionIdx,
							a.galleryIdx,
							a.exhibitionTitleEn,
							a.beginDate,
							a.endDate,
							(SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = a.exhibitionIdx LIMIT 0, 1) AS upfileName,
							(SELECT GROUP_CONCAT(artistNameEn) FROM TB_GALLERY_EXHIBITION_ARTIST WHERE exhibitionIdx = a.exhibitionIdx) AS artistNameEn
						FROM TB_GALLERY_EXHIBITION AS a
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY a.exhibitionIdx DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $end, PDO::PARAM_INT);

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

	function getExhibitionsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');

			if (!empty($artistIdx) && !empty($galleryIdx)) {
				$start = 0;
				$end = 27;
				$sql = ' SELECT
								a.exhibitionIdx,
								a.galleryIdx,
								a.exhibitionTitleEn,
								a.beginDate,
								a.endDate,
								(SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = a.exhibitionIdx LIMIT 0, 1) AS upfileName
							FROM TB_GALLERY_EXHIBITION AS a INNER JOIN TB_GALLERY_EXHIBITION_ARTIST AS b ON a.exhibitionIdx = b.exhibitionIdx
							WHERE a.galleryIdx = :galleryIdx AND b.artistIdx = :artistIdx
							ORDER BY a.exhibitionIdx DESC
							LIMIT :start, :end';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':start', $start, PDO::PARAM_INT);
				$stmt->bindParam(':end', $end, PDO::PARAM_INT);
			}
			else {
				$start = 2;
				$end = 30;
				$sql = ' SELECT
								a.exhibitionIdx,
								a.galleryIdx,
								a.exhibitionTitleEn,
								a.beginDate,
								a.endDate,
								(SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = a.exhibitionIdx LIMIT 0, 1) AS upfileName
							FROM TB_GALLERY_EXHIBITION AS a
							WHERE a.galleryIdx = :galleryIdx
							ORDER BY a.exhibitionIdx DESC
							LIMIT :start, :end';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
				$stmt->bindParam(':start', $start, PDO::PARAM_INT);
				$stmt->bindParam(':end', $end, PDO::PARAM_INT);
			}

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
			$exhibitionIdx = $this->getAddslashes('eidx');
			$sql = '	SELECT
							exhibitionIdx,
							galleryIdx,
							caption,
							exhibitionTitleEn,
							beginDate,
							endDate,
							description
						FROM TB_GALLERY_EXHIBITION
						WHERE exhibitionIdx = :exhibitionIdx AND galleryIdx = :galleryIdx ';
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

	// 이미지 가져오기
	function getImgList($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$sql = ' SELECT
							upfileName
						FROM TB_GALLERY_EXHIBITION_FILE
						WHERE exhibitionIdx = :exhibitionIdx
						ORDER BY fileIdx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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

	// 선택 작가 가져오기
	function getSelectedArtists($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			//$sql = 'SELECT exhiArtistIdx, exhibitionIdx, artistIdx, artistName, artistNameEn  FROM TB_GALLERY_EXHIBITION_ARTIST WHERE exhibitionIdx = :exhibitionIdx';
			$sql = ' SELECT a.exhiArtistIdx, a.exhibitionIdx, a.artistIdx, a.artistName, a.artistNameEn, b.galleryIdx
						FROM TB_GALLERY_EXHIBITION_ARTIST AS a INNER JOIN TB_GALLERY_ARTIST AS b
						ON a.artistIdx = b.artistIdx
						WHERE a.exhibitionIdx = :exhibitionIdx';
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

	// 선택한 작품들 가져오기
	function getSelectedWorks($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$sql = ' SELECT
							a.exhiWorksIdx,
							a.exhibitionIdx,
							a.artistName,
							a.artistNameEn,
							a.worksIdx,
							a.worksName,
							a.worksNameEn,
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_EXHIBITION_WORKS AS a
						WHERE a.exhibitionIdx = :exhibitionIdx
						ORDER BY a.exhiWorksIdx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

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

	function getArtworksList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 8;
			$sql = ' SELECT
								a.worksIdx,
								a.galleryIdx,
								a.artistName,
								a.artistNameEn,
								a.worksName,
								a.worksNameEn,
								a.makingDate,
								(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY a.artistIdx DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $end, PDO::PARAM_INT);

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

	/*
	function getArtfairsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 3;
			$sql = ' SELECT
							a.fairIdx,
							a.galleryIdx,
							a.fairTitleEn,
							a.beginDate,
							a.endDate,
							(SELECT upfileName FROM TB_GALLERY_ARTFAIR_FILE WHERE fairIdx = a.fairIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_ARTFAIR AS a
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY a.fairIdx DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $end, PDO::PARAM_INT);

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
	*/

	function getExhibitionExist($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = 'SELECT COUNT(exhibitionIdx) FROM TB_GALLERY_EXHIBITION WHERE galleryIdx = :galleryIdx';
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


	function getExhibitionsCalendar($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$sql = ' SELECT
							a.exhibitionIdx,
							a.exhibitionTitle,
							a.beginDate,
							a.endDate,
							b.addr1,
							b.addr2
						FROM TB_GALLERY_EXHIBITION AS a INNER JOIN TB_GALLERY_MEMBER AS b ON a.galleryIdx = b.galleryIdx
						WHERE a.exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 11);

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

} // End Class
