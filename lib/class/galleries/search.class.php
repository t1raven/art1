<?php
class Search
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

	// 갤러리 가져오기
	function getGalleryList($dbh) {
		try {
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;

			$totalCnt = 0;
			$galleryLevelCode = 60;
			$isApproval = 'Y';

			if ($chkgallery === 'Y' && !empty($kword)) {
				$sql = ' SELECT galleryIdx, galleryNameKr, galleryNameEn, contactName, tel, contactTel, addr1,addr1En, mainImg, isApproval
							FROM TB_GALLERY_MEMBER
							WHERE galleryLevelCode = :galleryLevelCode AND isApproval = :isApproval AND (galleryNamekr LIKE :galleryNameKr OR galleryNameEn LIKE :galleryNameEn)
							ORDER BY rand() ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryLevelCode', $galleryLevelCode, PDO::PARAM_INT, 3);
				$stmt->bindParam(':isApproval', $isApproval, PDO::PARAM_STR, 1);
				$stmt->bindParam(':galleryNameKr', $kword, PDO::PARAM_STR, 50);
				$stmt->bindParam(':galleryNameEn', $kword, PDO::PARAM_STR, 50);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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

	// 전시회 가져오기
	function getExhibitionList($dbh) {
		try {
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;
			$start = 2;
			$end = 30;

			if ($chkexhibition === 'Y' && !empty($kword)) {
				$sql = ' SELECT
								a.exhibitionIdx,
								a.galleryIdx,
								a.exhibitionTitleEn,
								a.beginDate,
								a.endDate,
								(SELECT upfileName FROM TB_GALLERY_EXHIBITION_FILE WHERE exhibitionIdx = a.exhibitionIdx LIMIT 0, 1) AS upfileName
							FROM TB_GALLERY_EXHIBITION AS a
							WHERE exhibitionTitle LIKE :exhibitionTitle OR exhibitionTitleEn LIKE :exhibitionTitleEn
							ORDER BY a.exhibitionIdx DESC
							LIMIT :start, :end';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exhibitionTitle', $kword, PDO::PARAM_STR, 255);
				$stmt->bindParam(':exhibitionTitleEn', $kword, PDO::PARAM_STR, 255);
				$stmt->bindParam(':start', $start, PDO::PARAM_INT);
				$stmt->bindParam(':end', $end, PDO::PARAM_INT);
				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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

	// 작가 가져오기
	function getArtistList($dbh) {
		try {
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;

			if ($chkartist === 'Y' && !empty($kword)) {
				$sql = ' SELECT
								galleryIdx,
								artistIdx,
								artistName,
								artistNameEn,
								upfileName
							FROM TB_GALLERY_ARTIST
							WHERE artistName LIKE :artistName OR artistNameEn LIKE :artistNameEn
							ORDER BY artistIdx DESC';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':artistName', $kword, PDO::PARAM_STR, 50);
				$stmt->bindParam(':artistNameEn', $kword, PDO::PARAM_STR, 50);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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

	// 작품 가져오기
	function getArtistworksList($dbh) {
		try {
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;

			if ($chkartworks === 'Y' && !empty($kword)) {
				$sql = '  SELECT
								a.galleryIdx,
								a.worksIdx,
								a.artistName,
								a.artistNameEn,
								a.worksName,
								a.worksNameEn,
								a.makingDate,
								(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
							FROM TB_GALLERY_WORKS AS a
							WHERE worksName LIKE :worksName OR artistNameEn LIKE :artistNameEn
							ORDER BY a.sort DESC, a.worksIdx DESC';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':worksName', $kword, PDO::PARAM_STR, 100);
				$stmt->bindParam(':artistNameEn', $kword, PDO::PARAM_STR, 100);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;


			$start = 0;
			$end = 4;
			$display_status = 'Y';

			if ($chknews === 'Y' && !empty($kword)) {
				$sql =  'SELECT
								a.news_idx, a.news_category_idx, a.news_title, a.reporter_name, a.source, a.display_status, a.recent_status, a.news_main_up_file_name, a.news_recent_up_file_name, a.create_date,
								b.news_paragraph_idx, b.new_paragraph_content, b.up_file_name,
								d.news_category_name, d.orderby,
								e.idx, e.galleryIdx
							FROM news_main AS a
									INNER JOIN news_paragraph AS b ON a.news_idx = b.news_idx
									INNER JOIN (SELECT MIN(news_paragraph_idx) AS news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx ) AS c ON b.news_paragraph_idx = c.news_paragraph_idx  AND a.news_idx = c.news_idx
									INNER JOIN news_category AS d ON a.news_category_idx = d.news_category_idx
									INNER JOIN TB_GALLERY_NEWS AS e ON a.news_idx = e.newsIdx
							WHERE a.display_status = :display_status AND a.news_title LIKE :news_title
							GROUP BY a.news_idx
							ORDER BY a.create_date DESC
							LIMIT :start, :end';
							//echo $sql;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR, 1);
				$stmt->bindParam(':news_title', $kword, PDO::PARAM_STR, 255);
				$stmt->bindParam(':start', $start, PDO::PARAM_INT);
				$stmt->bindParam(':end', $end, PDO::PARAM_INT);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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

	//  페어 가져오기
	function getArtfairList($dbh) {
		try {
			$chkgallery = $this->getAddslashes('chkgallery');
			$chkexhibition = $this->getAddslashes('chkexhibition');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartworks = $this->getAddslashes('chkartworks');
			$chknews = $this->getAddslashes('chknews');
			$chkartfair = $this->getAddslashes('chkartfair');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;

			if ($chkartfair === 'Y' && !empty($kword)) {
				$sql = '  SELECT
								a.galleryIdx,
								a.fairIdx,
								b.fairTitleEn,
								b.beginDate,
								b.endDate,
								b.upfileName
							FROM TB_GALLERY_ARTFAIR AS a INNER JOIN TB_GALLERY_ARTFAIR_POOL AS b ON a.fairPoolIdx = b.fairPoolIdx
							WHERE b.fairTitle LIKE :fairTitle OR b.fairTitleEn LIKE :fairTitleEn
							ORDER BY b.beginDate DESC, a.fairIdx DESC';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':fairTitle', $kword, PDO::PARAM_STR, 255);
				$stmt->bindParam(':fairTitleEn', $kword, PDO::PARAM_STR, 255);

				if ($stmt->execute() && $stmt->rowCount()) {
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				else {
					return false;
				}
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
