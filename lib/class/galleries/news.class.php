<?php
class News
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
			$list = null;
			$totalCnt = 0;
			$display_status = 'Y';
			$subSQL = null;
			$galleryIdx = $this->getAddslashes('idx');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$sw = (!empty($this->getAddslashes('sw'))) ? $this->getAddslashes('sw') : null;
			$start = ($page - 1) *  $sz;
			$end = $sz;

			//$sql = 'CALL up_news_front_list ( :page, :sz, :cate, :sw, :start_row, :recent_status)';

			if (!empty($sw)) {
				$subSQL = ' AND (a.news_title LIKE :news_title OR  b.new_paragraph_content LIKE :new_paragraph_content) ';
				$news_title = "%".$sw."%";
				$new_paragraph_content = "%".$sw."%";
			}

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
						WHERE a.display_status = :display_status AND e.galleryIdx = :galleryIdx '.$subSQL.'
						ORDER BY a.create_date DESC
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR, 1);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $end, PDO::PARAM_INT);

			if (!empty($sw)) {
				$stmt->bindParam(':news_title', $news_title, PDO::PARAM_STR, 200);
				$stmt->bindParam(':new_paragraph_content', $new_paragraph_content, PDO::PARAM_STR);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = ' SELECT
									COUNT(a.news_idx)
							FROM news_main AS a
									INNER JOIN news_paragraph AS b ON a.news_idx = b.news_idx
									INNER JOIN (SELECT MIN(news_paragraph_idx) AS  news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx ) AS c ON b.news_paragraph_idx = c.news_paragraph_idx AND a.news_idx = c.news_idx
									INNER JOIN news_category AS d ON a.news_category_idx = d.news_category_idx
									INNER JOIN TB_GALLERY_NEWS AS e ON a.news_idx = e.newsIdx
							WHERE a.display_status = :display_status AND e.galleryIdx = :galleryIdx '.$subSQL;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR, 1);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

				if (!empty($sw)) {
					$stmt->bindParam(':news_title', $news_title, PDO::PARAM_STR, 200);
					$stmt->bindParam(':new_paragraph_content', $new_paragraph_content, PDO::PARAM_STR);
				}


				if ($stmt->execute() && $stmt->rowCount()) {
					$totalCnt = $stmt->fetchColumn();
				}
			}


			return array($list, $totalCnt);
		}
		catch(PDOException $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function getRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			//$newsIdx = $this->getAddslashes('nidx');
			$newsIdx = $this->getAddslashes('article');
			$read_count = $this->getAddslashes('read_count');

			if (!empty($read_count)){
				$sql = ' UPDATE news_main SET view_count = view_count +1  WHERE news_idx = :news_idx  ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $newsIdx, PDO::PARAM_INT, 10);
				$stmt->execute();
			}

			$sql = ' SELECT a.*
						FROM view_news_main AS a
						INNER JOIN TB_GALLERY_NEWS AS b  ON a.news_idx = b.newsIdx
						WHERE a.news_idx = :news_idx AND b.galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $newsIdx, PDO::PARAM_INT, 10);
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

	function getPrev($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$idx = $this->getAddslashes('nidx');
			$sql = ' SELECT idx AS nidx, newsIdx AS article FROM TB_GALLERY_NEWS WHERE galleryIdx = :galleryIdx AND idx < :idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);

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

		function getNext($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$idx = $this->getAddslashes('nidx');
			$sql = ' SELECT idx AS nidx, newsIdx AS article FROM TB_GALLERY_NEWS WHERE galleryIdx = :galleryIdx AND idx > :idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);

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


	function getListParagraph($dbh) {
		try
		{
		$news_idx = $this->getAddslashes('article');
		$sql = 'CALL up_news_paragraph_list ( :news_idx )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT, 10);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			//$dbh = null;

			return array($list,$total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

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

	// 선택한 작품들 가져오기
	function getSelectedWorks($dbh) {
		try {
			$fairIdx = $this->getAddslashes('fidx');
			$sql = ' SELECT
							fairWorksIdx,
							fairIdx,
							artistName,
							artistNameEn,
							worksIdx,
							worksName,
							worksNameEn,
							worksImg
						FROM TB_GALLERY_ARTFAIR_WORKS
						WHERE fairIdx = :fairIdx
						ORDER BY fairWorksIdx DESC';
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



} // End Class
