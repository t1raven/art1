<?php
class Banner
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

	//메인 페이지 노출될 뉴스 목록
	function getList($dbh) {
		try {
			$section = $this->getAddslashes('section');
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;

			$sql = '
						SELECT 
							news_mainpage_idx ,news_idx ,news_category_idx ,news_category_text ,news_title ,reporter_name ,news_img ,news_text ,sort ,display ,news_create_date ,create_date ,section
						FROM news_mainpage WHERE section=:section AND  news_idx > 0 ORDER BY news_mainpage_idx ASC
					  ';
			
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':section', $section, PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$dbh = null;

			return $list ;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

		//메인 페이지 노출될 뉴스 목록
	function getListAdmin($dbh) {
		try {
			$section = $this->getAddslashes('section');
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;

			$sql = '
						SELECT 
							news_mainpage_idx ,news_idx ,news_category_idx ,news_category_text ,news_title ,reporter_name ,news_img ,news_text ,sort ,display ,news_create_date ,create_date ,section
						FROM news_mainpage WHERE section=:section ORDER BY news_mainpage_idx ASC
					  ';
			
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':section', $section, PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$dbh = null;

			return $list ;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//배너 목록
	function getListBanner($dbh) {
		try {
			$section = $this->getAddslashes('section');
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;

			//echo "<br>section:$section";
			//echo "<br>sz:$sz";			
			//echo "<br>word:".gettype($word);
			//echo "<br>word:".$word;

			$sql = '
						SELECT 
							bannerIdx ,section ,category ,bannerName ,bannerFileName ,bannerUpFileName ,linkUrl ,target ,sort ,isDisplay ,createDate ,regDate, bannerFileNameMobile, bannerUpFileNameMobile
						FROM TB_BANNER WHERE section=:section ORDER BY sort ASC
					  ';
			
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':section', $section, PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$dbh = null;

			return $list ;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function update($dbh) {
		try {
			$modify_date = date('Y-m-d H:i:s');
			$bTransaction = false;
			$dbh->beginTransaction();

			$aBannerIdx		= $this->getAddslashes('aBannerIdx');

			$news_idx = $this->getAddslashes('aNewsIdx'); 
			$aNewsTitle = $this->getAddslashes('aNewsTitle'); 
			$aNewsText = $this->getAddslashes('aNewsText'); 
			$aCategoryIdx = $this->getAddslashes('aCategoryIdx');  
			$aCategoryText = $this->getAddslashes('aCategoryText'); 
			$aNewsImg = $this->getAddslashes('aNewsImg'); 
			$aSection = $this->getAddslashes('aSection'); 
			$aReporterName = $this->getAddslashes('aReporterName'); 
			$aCreateDate = $this->getAddslashes('aCreateDate'); 
			$oldMainBannerImg = $this->getAddslashes('oldMainBannerImg'); 
			$regDate = date('Y-m-d H:i:s');

			$i = 0;
			foreach($aBannerIdx as $idx){
				$sql = 'UPDATE news_mainpage SET
								news_idx = :news_idx ,
								news_category_idx = :news_category_idx ,
								news_category_text = :news_category_text ,
								news_title = :news_title ,
								reporter_name = :reporter_name ,
								news_img = :news_img ,
								news_text = :news_text ,
								news_create_date = :news_create_date ,
								create_date = :create_date ,
								section = :section 
							WHERE news_mainpage_idx = :news_mainpage_idx';

				$stmt = $dbh->prepare($sql);
				
				$stmt->bindParam(':news_idx',					$news_idx[$i],				PDO::PARAM_INT, 11);
				$stmt->bindParam(':news_category_idx',	$aCategoryIdx[$i],		PDO::PARAM_INT, 11);
				$stmt->bindParam(':news_category_text',	$aCategoryText[$i],		PDO::PARAM_STR, 20);
				$stmt->bindParam(':news_title',					$aNewsTitle[$i],			PDO::PARAM_STR, 200);
				$stmt->bindParam(':reporter_name',			$aReporterName[$i],	PDO::PARAM_STR, 100);
				$stmt->bindParam(':news_img',					$aNewsImg[$i],			PDO::PARAM_STR, 100);
				$stmt->bindParam(':news_text',					$aNewsText[$i],			PDO::PARAM_STR, 250);
				$stmt->bindParam(':news_create_date',		$aCreateDate[$i],		PDO::PARAM_STR, 25);
				$stmt->bindParam(':create_date',				$regDate,						PDO::PARAM_STR, 25);
				$stmt->bindParam(':section',						$aSection[$i],				PDO::PARAM_INT, 4);

				$stmt->bindParam(':news_mainpage_idx',				$aBannerIdx[$i], PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					$bTransaction = true;
				}else {
					$bTransaction = false;
				}

				$i++;
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
		catch(PDOExecption $e) {
			return array(false, 'error');
			//print 'Error!: ' . $e->getMessage() . '</br>';
			//return false;
		}
	}

	
	//메인 베너 처리
	function updateBanner($dbh) {
		try {
			$modify_date = date('Y-m-d H:i:s');
			$bTransaction = false;
			//$dbh->beginTransaction();
			
			$section							= $this->getAddslashes('aBannerSection'); 
			$aIdx								= $this->getAddslashes('aMainBannerIdx');
			$aCategory						= $this->getAddslashes('aCategory');
			$aBannerName				= $this->getAddslashes('aBannerName');
			$aLinkUrl							= $this->getAddslashes('aLinkUrl');
			$aTarget							= $this->getAddslashes('aTarget');
			$aIsDisplay						= $this->getAddslashes('aBannerIsDisplay');
			$aUpFileName					= $this->getAddslashes('aUpFileName');
			$aOriFileName					= $this->getAddslashes('aOriFileName');
			$aUpFileNameMobile		= $this->getAddslashes('aUpFileNameMobile');
			$aOriFileNameMobile		= $this->getAddslashes('aOriFileNameMobile');

			$regDate = date('Y-m-d H:i:s');

			$i = 0;
			foreach($aIdx as $idx){
				$sql = 'UPDATE TB_BANNER SET
								section								= :section ,
								category							= :category ,
								bannerName					= :bannerName ,
								bannerFileName				= :bannerFileName ,
								bannerUpFileName			= :bannerUpFileName ,

								bannerFileNameMobile			= :bannerFileNameMobile ,
								bannerUpFileNameMobile	= :bannerUpFileNameMobile ,

								linkUrl		= :linkUrl ,
								target		= :target ,
								regDate		= :regDate 

							WHERE bannerIdx = :bannerIdx';

				$stmt = $dbh->prepare($sql);
				
				$stmt->bindParam(':section',					$section,						PDO::PARAM_INT, 4);
				$stmt->bindParam(':category',					$aCategory,					PDO::PARAM_STR, 100);
				$stmt->bindParam(':bannerName',			$aBannerName[$i],		PDO::PARAM_STR, 100);
				$stmt->bindParam(':bannerFileName',		$aOriFileName[$i],		PDO::PARAM_STR, 255);
				$stmt->bindParam(':bannerUpFileName',	$aUpFileName[$i],		PDO::PARAM_STR, 255);

				$stmt->bindParam(':bannerFileNameMobile',		$aOriFileNameMobile[$i],		PDO::PARAM_STR, 255);
				$stmt->bindParam(':bannerUpFileNameMobile',	$aUpFileNameMobile[$i],		PDO::PARAM_STR, 255);

				$stmt->bindParam(':linkUrl',						$aLinkUrl[$i],				PDO::PARAM_STR, 255);
				$stmt->bindParam(':target',						$aTarget[$i],				PDO::PARAM_INT, 4);
				$stmt->bindParam(':regDate',					$regDate,						PDO::PARAM_STR, 30);

				$stmt->bindParam(':bannerIdx',				$aIdx[$i],						PDO::PARAM_INT, 10);
				
				if ($stmt->execute()) {
					$bTransaction = true;
				}else {
					$bTransaction = false;
				}

				$i++;
			}
			/*
			if ($bTransaction) {
				$dbh->commit();
				return array(true, 'success');
			}
			else {
				$dbh->rollback();
				return array(false, 'error');
			}
			*/
			return $bTransaction;

			
		}
		catch(PDOExecption $e) {
			return array(false, 'error');
			//print 'Error!: ' . $e->getMessage() . '</br>';
			//return false;
		}
	}

	//뉴스 목록
	function getNewsList($dbh) {
		try {
			$sub_sql  = null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$start = ($page * $sz) - $sz;
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;

			if(!empty($word)) {
				$sub_sql = ' AND A.news_title LIKE :word ';
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
			if(!empty($word)) {
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

	function getRead($dbh) {
		try {
			$news_mainpage_idx = $this->getAddslashes('news_mainpage_idx');

			$sql = 'select * from news_mainpage where news_mainpage_idx = :news_mainpage_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_mainpage_idx', $news_mainpage_idx, PDO::PARAM_INT);
			//$stmt->execute();

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

			$dbh = null;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//메인 노출용 커뮤니티 리스트
	function getCommunityList($dbh) {
		try {
			$bbs_category = $this->getAddslashes('bbs_category');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$start = ($page * $sz) - $sz;

			$sql = 'SELECT bbs_idx, bbs_code, bbs_title, reg_date  FROM bbs WHERE bbs_category = :bbs_category ORDER BY bbs_idx DESC LIMIT :start, :sz';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_INT);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			//$stmt->execute();

			if ($stmt->execute() && $stmt->rowCount()) {
				
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $list;
				
			}else{
				return false;
			}

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//메인 노출용 뉴스 리스트
	function getListMainNews($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$start = ($page * $sz) - $sz;

			$sql = '	SELECT 
							A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.source, A.display_status, A.create_date,
							B.news_category_name
						FROM news_main as A 
							INNER JOIN news_category AS B ON A.news_category_idx = B.news_category_idx
						WHERE A.display_status=\'Y\' AND now( )  >= A.create_date
							AND A.news_category_idx != 1
						ORDER BY A.create_date DESC LIMIT :start, :sz
					';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':start', $start, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			//$stmt->execute();

			if ($stmt->execute() && $stmt->rowCount()) {
				
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $list;
				
			}else{
				return false;
			}

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}



}
?>