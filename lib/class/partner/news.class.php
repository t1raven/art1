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

	function insert($dbh) {
		try {
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$newsIdx =strip_tags($this->getAddslashes('newsIdx'));
			$newsTitle =strip_tags($this->getAddslashes('newsTitle'));
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$createDate = date('Y-m-d H:i:s');

			$sql = 'INSERT INTO TB_GALLERY_NEWS SET
							galleryIdx = :galleryIdx,
							newsIdx = :newsIdx,
							newsTitle = :newsTitle,
							ipAddr = :ipAddr,
							createDate = :createDate';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':newsIdx', $newsIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':newsTitle', $newsTitle, PDO::PARAM_STR, 200);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
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

	function update($dbh) {
		try {
			$idx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$newsIdx =strip_tags($this->getAddslashes('newsIdx'));
			$newsTitle =strip_tags($this->getAddslashes('newsTitle'));
			$ipAddr = ip2long($_SERVER['REMOTE_ADDR']);
			$modifyDate = date('Y-m-d H:i:s');

			$sql = 'UPDATE TB_GALLERY_NEWS SET
							newsIdx = :newsIdx,
							newsTitle = :newsTitle,
							ipAddr = :ipAddr,
							modifyDate = :modifyDate
					WHERE idx = :idx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':newsIdx', $newsIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':newsTitle', $newsTitle, PDO::PARAM_STR, 200);
			$stmt->bindParam(':ipAddr', $ipAddr, PDO::PARAM_INT, 10);
			$stmt->bindParam(':modifyDate', $modifyDate, PDO::PARAM_STR);
			$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				return array(true, 'success');
			}
			else {
				return array(false, 'error');
			}
		}
		catch(PDOException $e) {
			echo 'Error:'. $e->getMessage();
			return array(false, 'error');
		}
	}

	function delete($dbh) {
		try {
			$idx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);

			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'DELETE FROM TB_GALLERY_NEWS WHERE idx = :idx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

			if ($stmt->execute()) {
				$bTransaction = true;
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			//print_r($idxs);

			if (is_array($idxs)) {
				$bTransaction = false;
				$dbh->beginTransaction();
				foreach($idxs as $idx) {
					$sql = 'DELETE FROM TB_GALLERY_NEWS WHERE idx = :idx AND galleryIdx = :galleryIdx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);
					$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);

					if ($stmt->execute()) {
						$bTransaction = true;
					}
					else {
						$bTransaction = false;
					}
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
			else {
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
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$pg = (!empty($this->getAddslashes('pg'))) ? (int)$this->getAddslashes('pg') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? (int)$this->getAddslashes('sz') : 10;
			$nm = $this->getAddslashes('nm');
			$cnm = $this->getAddslashes('cnm');
			$st = $this->getAddslashes('st');
			$bd = (!empty($this->getAddslashes('bd'))) ? $this->getAddslashes('bd') : null;
			$ed = (!empty($this->getAddslashes('ed'))) ? date('Y-m-d', strtotime($this->getAddslashes('ed').'+1 day')) : null;
			$od = $this->getAddslashes('od');
			$ot = $this->getAddslashes('ot');
			//$mkey = MYSQL_KEY;
			$subQuery = '';
			$start = ($pg - 1) * $sz;
			$query = ' SELECT b.idx, b.newsIdx, b.newsTitle, a.news_main_up_file_name,  b.createDate FROM news_main as a  inner join TB_GALLERY_NEWS AS b on a.news_idx = b.newsIdx';

			/*
			if (!empty($nm)) {
				$subQuery = ' AND artistName LIKE :artistName ';
				$artistName = $nm."%";
			}

			if (!empty($bd) && !empty($ed)) {
				$subQuery .= ' AND createDate BETWEEN :bd AND :ed ';
			}
			*/

			$sql = $query.' WHERE  galleryIdx = :galleryIdx '.$subQuery.' ORDER BY idx DESC LIMIT :start, :end';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 10);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':end', $sz, PDO::PARAM_INT);

			/*
			if (!empty($nm)) {
				$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
			}

			if (!empty($bd) && !empty($ed)) {
				$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
				$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
			}
			*/

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(idx) FROM TB_GALLERY_NEWS WHERE galleryIdx = :galleryIdx '.$subQuery;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':galleryIdx', $galleryIdx, PDO::PARAM_INT, 11);

				/*
				if (!empty($nm)) {
					$stmt->bindParam(':artistName', $artistName, PDO::PARAM_STR, 50);
				}

				if (!empty($bd) && !empty($ed)) {
					$stmt->bindParam(':bd', $bd, PDO::PARAM_STR, 10);
					$stmt->bindParam(':ed', $ed, PDO::PARAM_STR, 10);
				}
				*/

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

	function getEdit($dbh) {
		try {
			$idx = $this->getAddslashes('idx');
			$galleryIdx = AES256::dec($_SESSION['galleryIdx'], AES_KEY);
			$sql = ' SELECT
							idx,
							newsIdx,
							newsTitle
						FROM TB_GALLERY_NEWS
						WHERE idx = :idx AND galleryIdx = :galleryIdx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':idx', $idx, PDO::PARAM_INT, 10);
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

	//뉴스 목록
	function getNewsList($dbh) {
		try {
			$sub_sql = null;
			$page = (!empty($this->getAddslashes('page'))) ? $this->getAddslashes('page') : 1;
			$sz = (!empty($this->getAddslashes('sz'))) ? $this->getAddslashes('sz') : 10;
			$start = ($page * $sz) - $sz;
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;

			if(!empty($word)) {
				$sub_sql = ' AND A.news_title LIKE :word OR  B.new_paragraph_content LIKE :word';
				$word = '%'.$word.'%';
			}

			//echo "<br>page:$page";
			//echo "<br>sz:$sz";
			//echo "<br>start:$start";
			//echo "<br>word:".gettype($word);
			//echo "<br>word:".$word;

			$sql = '
						SELECT
							A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.display_status, A.news_main_up_file_name, A.news_recent_up_file_name, A.create_date,
							B.news_paragraph_idx, B.new_paragraph_content, B.up_file_name,
							D.news_category_name
						FROM
							news_main AS A
							INNER JOIN news_paragraph AS B ON A.news_idx= B.news_idx
							INNER JOIN (
								SELECT MIN(news_paragraph_idx) AS  news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx
							)AS C ON B.news_paragraph_idx= C.news_paragraph_idx  AND A.news_idx = C.news_idx
							INNER JOIN news_category AS D ON A.news_category_idx = D.news_category_idx
						WHERE A.display_status=\'Y\'
							AND now( )  >= A.create_date
							'.$sub_sql.'
						ORDER BY A.create_date DESC
						LIMIT  :start , :sz
					  ';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);

			if (!empty($word)) {
				$stmt->bindParam(':word', $word, PDO::PARAM_STR, 50);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$sql = 'SELECT COUNT(A.news_idx)
							FROM
										news_main AS A
										INNER JOIN news_paragraph AS B ON A.news_idx= B.news_idx
										INNER JOIN (
											SELECT MIN(news_paragraph_idx) AS  news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx
										)AS C ON B.news_paragraph_idx= C.news_paragraph_idx  AND A.news_idx = C.news_idx
										INNER JOIN news_category AS D ON A.news_category_idx = D.news_category_idx
									WHERE A.display_status=\'Y\'
										AND now( )  >= A.create_date
										'.$sub_sql ;
							;

				$stmt = $dbh->prepare($sql);
				if(!empty($word)) {
					$stmt->bindParam(':word', $word, PDO::PARAM_STR, 50);
				}
				$stmt->execute();
				$totalCnt = (int)$stmt->fetchColumn();
			}

			return array($list, $totalCnt);
			$dbh = null;

			return array($list, $total_cnt, $total_all_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


} // End Class
