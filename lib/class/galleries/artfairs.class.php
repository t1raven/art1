<?php
class Artfairs
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
			//echo "idx:$galleryIdx";
			$sql = '  SELECT
							a.fairIdx,
							b.fairTitleEn,
							b.beginDate,
							b.endDate,
							b.upfileName
						FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY b.beginDate DESC, a.fairIdx DESC';
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
			$fairIdx = $this->getAddslashes('fidx');
			$sql = '	SELECT
							a.fairIdx,
							a.galleryIdx,
							b.fairTitleEn,
							b.beginDate,
							b.endDate,
							b.link,
							b.upfileName
						FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
						WHERE a.fairIdx = :fairIdx AND a.galleryIdx = :galleryIdx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
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

/*
	function getRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$fairIdx = $this->getAddslashes('fidx');
			$sql = '  SELECT
							a.worksIdx,
							a.artistIdx,
							a.artistName,
							a.artistNameEn,
							a.worksName,
							a.worksNameEn,
							a.makingDate,
							a.material,
							a.height,
							a.width,
							a.depth,
							(SELECT upfileName FROM TB_GALLERY_ARTFAIR_FILE WHERE fairIdx = a.fairIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.fairIdx = :fairIdx AND a.galleryIdx = :galleryIdx
						ORDER BY a.worksIdx DESC';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
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
*/

	// 이미지 가져오기
	function getImgList($dbh) {
		try {
			$fairIdx = $this->getAddslashes('fidx');
			$sql = ' SELECT
							upfileName
						FROM TB_GALLERY_ARTFAIR_FILE
						WHERE fairIdx = :fairIdx
						ORDER BY fileIdx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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
			$fairIdx = $this->getAddslashes('fidx');
			//$sql = 'SELECT fairArtistIdx, fairIdx, artistIdx, artistName, artistNameEn FROM TB_GALLERY_ARTFAIR_ARTIST WHERE fairIdx = :fairIdx';
			$sql = ' SELECT
							a.fairArtistIdx,
							a.fairIdx,
							a.artistIdx,
							a.artistName,
							a.artistNameEn,
							b.galleryIdx
						FROM TB_GALLERY_ARTFAIR_ARTIST AS a INNER JOIN TB_GALLERY_ARTIST AS b
						ON a.artistIdx = b.artistIdx
						WHERE a.fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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
			$fairIdx = $this->getAddslashes('fidx');

			$sql = ' SELECT
							a.fairWorksIdx,
							a.fairIdx,
							a.artistNameEn,
							a.worksIdx,
							a.worksNameEn,
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_ARTFAIR_WORKS AS a
						WHERE a.fairIdx = :fairIdx
						ORDER BY a.fairWorksIdx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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
	// 작품들 가져오기
	function getArtworksList($dbh) {
		try {
			$worksIdx = $this->getAddslashes('widx');
			$sql = ' SELECT
							upfileName
						FROM TB_GALLERY_WORKS_FILE
						WHERE worksIdx = :worksIdx
						ORDER BY fileIdx DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

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



} // End Class
