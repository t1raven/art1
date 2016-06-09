<?php
class Artworks
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
			$sql = '  SELECT
							a.worksIdx,
							a.artistName,
							a.artistNameEn,
							a.worksName,
							a.worksNameEn,
							a.makingDate,
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.galleryIdx = :galleryIdx
						ORDER BY a.sort DESC, a.worksIdx DESC';
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
			$worksIdx = $this->getAddslashes('widx');
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
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.worksIdx = :worksIdx AND a.galleryIdx = :galleryIdx
						ORDER BY a.worksIdx DESC';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
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

	// 작가의 전시회 여부
	function getIsExhibition($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			//$artistIdx = $this->attr['artistIdx'];

			if (!empty($this->attr['artistIdx'])) {
				$artistIdx = $this->attr['artistIdx'];
			}
			else {
				$artistIdx = $this->getArtistIdx($dbh);
			}


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


	// About 작품 상세 보기 레이어
	function getAboutRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$cnt = $this->getAddslashes('cnt');
			$step = $this->getAddslashes('step');
			$num = $this->getAboutNum($dbh);

			if ($step === '1' || $step === 'first') {
				if ($cnt > 1) {
					$max = $this->getArtworksMaxCount($dbh);
					$max = ($max < 8) ? $max : 8;
					if ($max === $num) {
						if ($max < 2) {
							$start = $max - 1;
							$end = 1;
						}
						else {
							$start = $max - 2;
							$end = 2;
						}
					}
					else {
						if ($num === 1) {
							$start = 0;
							$end = 2;
						}
						else {
							$start = $num - 2;
							$end = 3;
						}
					}
				}
				else {
					$start = ($num > 0) ? $num : 0;
					$end = 1;
				}
			}
			else {
					if ($num === 1) {
						$start = 0;
						$end = 0;
					}
					else {
						$start = $num - 2;
						$end = 1;
					}
			}

			$sql = ' SELECT tbl.*
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksName, a.worksNameEn, a.makingDate, a.material, a.height, a.width, a.depth,
															(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
												LIMIT 8
											) tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								) tbl
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


	// About 작품 상세 보기 레이어
	function getExhibitionsRead($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$worksIdx = $this->getAddslashes('widx');
			$cnt = $this->getAddslashes('cnt');
			$step = $this->getAddslashes('step');
			$num = $this->getExhibitionsNum($dbh);

			if ($step === '1' || $step === 'first') {
				if ($cnt > 1) {
					$max = $this->getExhibitionsMaxCount($dbh);
					if ($max === $num) {
						if ($max < 2) {
							$start = $max - 1;
							$end = 1;
						}
						else {
							$start = $max - 2;
							$end = 2;
						}
					}
					else {
						if ($num === 1) {
							$start = 0;
							$end = 2;
						}
						else {
							$start = $num - 2;
							$end = 3;
						}
					}
				}
				else {
					$start = ($num > 0) ? $num : 0;
					$end = 1;
				}
			}
			else {
					if ($num === 1) {
						$start = 0;
						$end = 0;
					}
					else {
						$start = $num - 2;
						$end = 1;
					}
			}

			$sql = ' SELECT tbl.*
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.exhiWorksIdx, a.exhibitionIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksIdx, a.worksName, a.worksNameEn, b.makingDate, b.material, b.height, b.width, b.depth,
															(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
												FROM TB_GALLERY_EXHIBITION_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx,  (SELECT @num := 0) A
												WHERE a.exhibitionIdx = :exhibitionIdx
											) tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
									) tbl
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
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

	// Artists 작품 상세 보기 레이어
	function getArtistsRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$artistIdx = $this->getAddslashes('aidx');
			$cnt = $this->getAddslashes('cnt');
			$step = $this->getAddslashes('step');
			$num = $this->getArtistsNum($dbh);

			if ($step === '1' || $step === 'first') {
				if ($cnt > 1) {
					$max = $this->getArtistsMaxCount($dbh);
					if ($max === $num) {
						if ($max < 2) {
							$start = $max - 1;
							$end = 1;
						}
						else {
							$start = $max - 2;
							$end = 2;
						}
					}
					else {
						if ($num === 1) {
							$start = 0;
							$end = 2;
						}
						else {
							$start = $num - 2;
							$end = 3;
						}
					}
				}
				else {
					$start = ($num > 0) ? $num : 0;
					$end = 1;
				}
			}
			else {
					if ($num === 1) {
						$start = 0;
						$end = 0;
					}
					else {
						$start = $num - 2;
						$end = 1;
					}
			}

			$sql = ' SELECT tbl.*
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksName, a.worksNameEn, a.makingDate, a.material, a.height, a.width, a.depth,
															(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx AND a.artistIdx = :artistIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
											) tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								) tbl
						LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);
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

	// Artworks 작품 상세 보기 레이어
	function getArtworksRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$cnt = $this->getAddslashes('cnt');
			$step = $this->getAddslashes('step');
			$num = $this->getArtworksNum($dbh);

			if ($step === '1' || $step === 'first') {
				if ($cnt > 1) {
					$max = $this->getArtworksMaxCount($dbh);
					if ($max === $num) {
						if ($max < 2) {
							$start = $max - 1;
							$end = 1;
						}
						else {
							$start = $max - 2;
							$end = 2;
						}
					}
					else {
						if ($num === 1) {
							$start = 0;
							$end = 2;
						}
						else {
							$start = $num - 2;
							$end = 3;
						}
					}
				}
				else {
					$start = ($num > 0) ? $num : 0;
					$end = 1;
				}
			}
			else {
					if ($num === 1) {
						$start = 0;
						$end = 0;
					}
					else {
						$start = $num - 2;
						$end = 1;
					}
			}

			$sql = ' SELECT tbl.*
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksName, a.worksNameEn, a.makingDate, a.material, a.height, a.width, a.depth,
															(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
											) tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								) tbl
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


	// Artworks 작품 상세 보기 레이어
	function getArtfairsRead($dbh) {
		try {
			//$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$fairIdx = $this->getAddslashes('fidx');
			$cnt = $this->getAddslashes('cnt');
			$step = $this->getAddslashes('step');
			$num = $this->getArtfairsNum($dbh);

			if ($step === '1' || $step === 'first') {
				if ($cnt > 1) {
					$max = $this->getArtfairsMaxCount($dbh);
					if ($max === $num) {
						if ($max < 2) {
							$start = $max - 1;
							$end = 1;
						}
						else {
							$start = $max - 2;
							$end = 2;
						}
					}
					else {
						if ($num === 1) {
							$start = 0;
							$end = 2;
						}
						else {
							$start = $num - 2;
							$end = 3;
						}
					}
				}
				else {
					$start = ($num > 0) ? $num : 0;
					$end = 1;
				}
			}
			else {
					if ($num === 1) {
						$start = 0;
						$end = 0;
					}
					else {
						$start = $num - 2;
						$end = 1;
					}
			}

			$sql = ' SELECT tbl.*
						FROM (
							SELECT tmp.*
							FROM (
										SELECT @num := @num + 1 AS num, a.fairWorksIdx, a.fairIdx, a.artistIdx, a.artistName, a.artistNameEn, a.worksIdx, a.worksName, a.worksNameEn, b.makingDate, b.material, b.height, b.width, b.depth,
													(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
										FROM TB_GALLERY_ARTFAIR_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx,  (SELECT @num := 0) A
										WHERE a.fairIdx = :fairIdx
									) tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
							) tbl
							LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
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
	function getRead($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
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
							(SELECT upfileName FROM TB_GALLERY_WORKS_FILE WHERE worksIdx = a.worksIdx LIMIT 0, 1) AS upfileName
						FROM TB_GALLERY_WORKS AS a
						WHERE a.worksIdx = :worksIdx AND a.galleryIdx = :galleryIdx
						ORDER BY a.worksIdx DESC';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
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

	function getAboutNum($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$sql = ' SELECT tbl.num AS num
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
												LIMIT 8
											)
									tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								)
								tbl
						WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}


	function getArtworksNum($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$sql = ' SELECT tbl.num AS num
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
											)
									tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								)
								tbl
						WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getExhibitionsNum($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$worksIdx = $this->getAddslashes('widx');
			$sql = ' SELECT tbl.num AS num
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx
												FROM TB_GALLERY_EXHIBITION_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx,  (SELECT @num := 0) A
												WHERE a.exhibitionIdx = :exhibitionIdx
											)
									tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								)
								tbl
						WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}


	function getArtistsNum($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');
			$worksIdx = $this->getAddslashes('widx');

			$sql = ' SELECT tbl.num AS num
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx
												FROM TB_GALLERY_WORKS AS a , (SELECT @num := 0) A
												WHERE a.galleryIdx = :galleryIdx AND a.artistIdx = :artistIdx
												ORDER BY a.sort DESC, a.worksIdx DESC
											)
									tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								)
								tbl
						WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getArtfairsNum($dbh) {
		try {
			$fairIdx = $this->getAddslashes('fidx');
			$worksIdx = $this->getAddslashes('widx');
			$sql = ' SELECT tbl.num AS num
						FROM (
									SELECT tmp.*
									FROM (
												SELECT @num := @num + 1 AS num, a.worksIdx
												FROM TB_GALLERY_ARTFAIR_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx,  (SELECT @num := 0) A
												WHERE a.fairIdx = :fairIdx
											)
									tmp JOIN TB_GALLERY_WORKS AS tbl ON tmp.worksIdx = tbl.worksIdx
								)
								tbl
						WHERE worksIdx = :worksIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getArtworksMaxCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = 'SELECT COUNT(worksIdx) FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getExhibitionsMaxCount($dbh) {
		try {
			$exhibitionIdx = $this->getAddslashes('eidx');
			$sql = 'SELECT COUNT(exhiWorksIdx) FROM TB_GALLERY_EXHIBITION_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.exhibitionIdx = :exhibitionIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitionIdx', $exhibitionIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getArtistsMaxCount($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');
			$sql = 'SELECT COUNT(worksIdx) FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx AND artistIdx = :artistIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getArtfairsMaxCount($dbh) {
		try {
			$fairIdx = $this->getAddslashes('fidx');
			$sql = 'SELECT COUNT(fairWorksIdx) FROM TB_GALLERY_ARTFAIR_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.fairIdx = :fairIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute() && $stmt->rowCount()) {
				return  (int)$stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo 'Error:'.$e->getMessage();
			return false;
		}
	}

	function getAboutBeginEnd($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$cnt = $this->getArtworksMaxCount($dbh);

			if ($cnt < 8) {
				$sql = 'SELECT
							(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx ORDER BY sort DESC, worksIdx DESC LIMIT 1) AS beginIdx,
							(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = 14 ORDER BY sort ASC, worksIdx ASC LIMIT 1 ) AS endIdx';
			}
			else {
				$sql = 'SELECT
							(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx ORDER BY sort DESC, worksIdx DESC LIMIT 1) AS beginIdx,
							(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx ORDER BY sort DESC, worksIdx DESC LIMIT 7, 1 ) AS endIdx';
			}

			$stmt = $dbh->prepare($sql);
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

	function getExhibitionsBeginEnd($dbh) {
		try {
			$exhibitions = $this->getAddslashes('eidx');
			$sql = 'SELECT
						(SELECT a.worksIdx FROM TB_GALLERY_EXHIBITION_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.exhibitionIdx = :exhibitions ORDER BY a.exhiWorksIdx ASC LIMIT 1) AS beginIdx,
						(SELECT a.worksIdx FROM TB_GALLERY_EXHIBITION_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.exhibitionIdx = :exhibitions ORDER BY a.exhiWorksIdx DESC LIMIT 1) AS endIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exhibitions', $exhibitions, PDO::PARAM_INT, 10);
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

	function getArtistsBeginEnd($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$artistIdx = $this->getAddslashes('aidx');
			$sql = 'SELECT
						(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx AND artistIdx = :artistIdx ORDER BY worksIdx DESC LIMIT 1) AS beginIdx,
						(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx AND artistIdx = :artistIdx ORDER BY worksIdx ASC LIMIT 1) AS endIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':artistIdx', $artistIdx, PDO::PARAM_INT, 10);

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

	function getArtworksBeginEnd($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$sql = 'SELECT
						(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx ORDER BY sort DESC, worksIdx DESC LIMIT 1) AS beginIdx,
						(SELECT worksIdx FROM TB_GALLERY_WORKS WHERE galleryIdx = :galleryIdx ORDER BY sort ASC, worksIdx ASC LIMIT 1 ) AS endIdx';
			$stmt = $dbh->prepare($sql);
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

	function getArtfairsBeginEnd($dbh) {
		try {
			$fairIdx = $this->getAddslashes('fidx');
			$sql = 'SELECT
							(SELECT a.worksIdx FROM TB_GALLERY_ARTFAIR_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.fairIdx = :fairIdx ORDER BY fairWorksIdx ASC LIMIT 1) AS beginIdx,
							(SELECT a.worksIdx FROM TB_GALLERY_ARTFAIR_WORKS AS a INNER JOIN TB_GALLERY_WORKS AS b ON a.worksIdx = b.worksIdx WHERE a.fairIdx = :fairIdx ORDER BY fairWorksIdx DESC LIMIT 1) AS endIdx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':fairIdx', $fairIdx, PDO::PARAM_INT, 10);

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

	// 작가 일변번호 가져오기
	function getArtistIdx($dbh) {
		try {
			$galleryIdx = $this->getAddslashes('idx');
			$worksIdx = $this->getAddslashes('widx');
			$sql = 'SELECT artistIdx FROM TB_GALLERY_WORKS WHERE worksIdx = :worksIdx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':worksIdx', $worksIdx, PDO::PARAM_INT, 10);

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




} // End Class
