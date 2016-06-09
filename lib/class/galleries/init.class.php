<?php
class Init
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

	function getIsContents($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = 'SELECT
							(SELECT COUNT(exhibitionIdx) FROM TB_GALLERY_EXHIBITION WHERE galleryIdx = :galleryIdx) AS exhibitionsCnt,
							(SELECT COUNT(artistIdx) FROM TB_GALLERY_ARTIST WHERE galleryIdx = :galleryIdx) AS artistsCnt,
							(SELECT COUNT(worksIdx) FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx) AS artworksCnt,
							(SELECT COUNT(idx) FROM TB_GALLERY_NEWS WHERE galleryIdx = :galleryIdx) AS newsCnt,
							(SELECT COUNT(fairIdx) FROM TB_GALLERY_ARTFAIR WHERE galleryIdx = :galleryIdx) AS artfairsCnt';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_STR, 1);
			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetch(PDO::FETCH_ASSOC);
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

	function getLogoImg($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$isApproval = 'Y';
			$sql = ' SELECT logoImg
						FROM TB_GALLERY_MEMBER
						WHERE galleryIdx = :galleryIdx AND isApproval = :isApproval';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchColumn();
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

	function getGalleryName($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$isApproval = 'Y';
			$sql = ' SELECT galleryNameEn
						FROM TB_GALLERY_MEMBER
						WHERE galleryIdx = :galleryIdx AND isApproval = :isApproval';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchColumn();
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

	function getGalleryInfo($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$isApproval = 'Y';
			$sql = ' SELECT galleryNameKr, galleryNameEn, email
						FROM TB_GALLERY_MEMBER
						WHERE galleryIdx = :galleryIdx AND isApproval = :isApproval';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return$stmt->fetch(PDO::FETCH_ASSOC);
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