<?php
class About
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

	function getRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$isApproval = 'Y';
			$sql = ' SELECT
							galleryId,
							galleryNameKr,
							galleryNameEn,
							homepage,
							email,
							tel,
							fax,
							zipCode,
							addr1,
							addr2,
							addr1En,
							lat,
							lng,
							introduction,
							facebook,
							instagram,
							google,
							naver,
							logoImg,
							mainImg,
							parking,
							openingHours,
							ipAddr,
							isApproval
						FROM TB_GALLERY_MEMBER
						WHERE galleryIdx = :galleryIdx AND isApproval = :isApproval';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);

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

	function getExhibitionsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 2;
			/*
			$sql = ' SELECT
							a.exhibitionIdx,
							a.galleryIdx,
							a.caption,
							a.artistName,
							a.artistNameEn,
							a.exhibitionTitle,
							a.exhibitionTitleEn,
							a.beginDate,
							a.endDate,
							a.description,
							(SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = a.exhibitionIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_EXHIBITION AS a
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY a.exhibitionIdx DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $end, PDO::PARAM_INT);
			*/

			$sql = '	SELECT
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

	//전시회 갯수 // 2016-05-13 LYT
	function getExhibitionsCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');

			$sql = '	SELECT
							count(*) as cnt
						FROM TB_GALLERY_EXHIBITION AS a
						WHERE a.galleryIdx = :galleryIdx
						';
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

	function getArtistsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 10;
			$sql = ' SELECT
							artistIdx,
							galleryIdx,
							artistName,
							artistNameEn,
							upfileName
						FROM TB_GALLERY_ARTIST
						WHERE galleryIdx = :galleryIdx
						ORDER BY artistIdx DESC
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

	//Artists 갯수 // 2016-05-13 LYT
	function getArtistsCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = ' SELECT
							count(*) as cnt
						FROM TB_GALLERY_ARTIST
						WHERE galleryIdx = :galleryIdx
						';
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
						ORDER BY a.sort DESC, a.worksIdx DESC
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


	//Artworks 갯수 // 2016-05-13 LYT
	function getArtworksCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = ' SELECT
								count(*) as cnt
						FROM TB_GALLERY_WORKS AS a
						WHERE a.galleryIdx = :galleryIdx
						';
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

	function getNewsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 4;
			$display_status = 'Y';
			$sql =  'SELECT
							a.news_idx, a.news_category_idx, a.news_title, a.reporter_name, a.source, a.display_status, a.recent_status, a.news_main_up_file_name, a.news_recent_up_file_name, a.create_date,
							b.news_paragraph_idx, b.new_paragraph_content, b.up_file_name,
							d.news_category_name, d.orderby,
							e.idx
						FROM news_main AS a
								INNER JOIN news_paragraph AS b ON a.news_idx = b.news_idx
								INNER JOIN (SELECT MIN(news_paragraph_idx) AS news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx ) AS c ON b.news_paragraph_idx = c.news_paragraph_idx  AND a.news_idx = c.news_idx
								INNER JOIN news_category AS d ON a.news_category_idx = d.news_category_idx
								INNER JOIN TB_GALLERY_NEWS AS e ON a.news_idx = e.newsIdx
						WHERE a.display_status = :display_status AND e.galleryIdx = :galleryIdx
						ORDER BY a.create_date DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR, 1);
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

	//News 갯수 // 2016-05-13 LYT
	function getNewsCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$display_status = 'Y';
			$sql =  'SELECT
							count(*) as cnt
						FROM news_main AS a
								INNER JOIN TB_GALLERY_NEWS AS e ON a.news_idx = e.newsIdx
						WHERE a.display_status = :display_status AND e.galleryIdx = :galleryIdx
						';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR, 1);
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

	function getArtfairsList($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$start = 0;
			$end = 3;
			$sql = ' SELECT
							a.fairIdx,
							a.galleryIdx,
							b.fairTitle,
							b.fairTitleEn,
							b.beginDate,
							b.endDate,
							b.upfileName
						FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY b.beginDate DESC,  a.fairIdx DESC
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

	//Artfairs 갯수 // 2016-05-13 LYT
	function getArtfairsCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = ' SELECT
							count(*) as cnt
						FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
						WHERE a.galleryIdx = :galleryIdx
						';
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

	// 전시회 정보 가져오기
	function getExhibitionsCalendar($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('idx');
			$sql = ' SELECT a.exhibitionIdx, a.exhibitionTitle, a.beginDate, a.endDate, b.addr1, b.addr2
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

	// 아트페어 정보 가져오기
	function getArtFairsCalendar($dbh) {
		try {
			$fairIdx = $this->getAddslashes('idx');
			$sql = ' SELECT a.fairIdx, a.fairTitle, a.fairTitleEn, a.beginDate, a.endDate
						FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_MEMBER AS b ON a.galleryIdx = b.galleryIdx
						WHERE a.fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 11);

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
