<?php
class Marketmain
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
			if (gettype($this->attr[$key]) === 'string') {
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

	function insertSelection($dbh) {
		try {
			$ms_issue = $this->getAddslashes('ms_issue');
			$ms_focused_works = $this->getAddslashes('ms_focused_works');
			$ms_awarded_artist = $this->getAddslashes('ms_awarded_artist');
			$sql = 'INSERT INTO market_selection(ms_issue, ms_focused_works, ms_awarded_artist) VALUES(:ms_issue, :ms_focused_works, :ms_awarded_artist)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ms_issue', $ms_issue, PDO::PARAM_STR, 36);
			$stmt->bindParam(':ms_focused_works', $ms_focused_works, PDO::PARAM_STR, 36);
			$stmt->bindParam(':ms_awarded_artist', $ms_awarded_artist, PDO::PARAM_STR, 36);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function insertMdChoice($dbh) {
		try {
			$mmc_title = $this->getAddslashes('mmc_title');
			$mmc_artwork = $this->getAddslashes('mmc_artwork');

			$sql = 'INSERT INTO market_md_choice(mmc_title, mmc_artwork) VALUES(:mmc_title, :mmc_artwork)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mmc_title', $mmc_title, PDO::PARAM_STR, 600);
			$stmt->bindParam(':mmc_artwork', $mmc_artwork, PDO::PARAM_STR, 300);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function insertCollection($dbh) {
		try {
			$mc_top_seller = $this->getAddslashes('mc_top_seller');
			$mc_md_pick = $this->getAddslashes('mc_md_pick');
			$mc_new_arrivals = $this->getAddslashes('mc_new_arrivals');
			$sql = 'INSERT INTO market_collection(mc_top_seller, mc_md_pick, mc_new_arrivals) VALUES(:mc_top_seller, :mc_md_pick, :mc_new_arrivals)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mc_top_seller', $mc_top_seller, PDO::PARAM_STR, 48);
			$stmt->bindParam(':mc_md_pick', $mc_md_pick, PDO::PARAM_STR, 48);
			$stmt->bindParam(':mc_new_arrivals', $mc_new_arrivals, PDO::PARAM_STR, 48);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function updateSelection($dbh) {
		try {
			$ms_issue = $this->getAddslashes('ms_issue');
			$ms_focused_works = $this->getAddslashes('ms_focused_works');
			$ms_awarded_artist = $this->getAddslashes('ms_awarded_artist');

			$sql = 'UPDATE market_selection SET ms_issue = :ms_issue, ms_focused_works = :ms_focused_works, ms_awarded_artist = :ms_awarded_artist';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':ms_issue', $ms_issue, PDO::PARAM_STR, 36);
			$stmt->bindParam(':ms_focused_works', $ms_focused_works, PDO::PARAM_STR, 36);
			$stmt->bindParam(':ms_awarded_artist', $ms_awarded_artist, PDO::PARAM_STR, 36);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function updateMdchoice($dbh) {
		try {
			$mmc_title = $this->getAddslashes('mmc_title');
			$mmc_artwork = $this->getAddslashes('mmc_artwork');

			$sql = 'UPDATE market_md_choice SET mmc_title = :mmc_title, mmc_artwork = :mmc_artwork';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mmc_title', $mmc_title, PDO::PARAM_STR, 600);
			$stmt->bindParam(':mmc_artwork', $mmc_artwork, PDO::PARAM_STR, 300);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function updateCollection($dbh) {
		try {
			$mc_top_seller = $this->getAddslashes('mc_top_seller');
			$mc_md_pick = $this->getAddslashes('mc_md_pick');
			$mc_new_arrivals = $this->getAddslashes('mc_new_arrivals');
			$sql = 'UPDATE market_collection SET mc_top_seller = :mc_top_seller, mc_md_pick = :mc_md_pick,  mc_new_arrivals = :mc_new_arrivals';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mc_top_seller', $mc_top_seller, PDO::PARAM_STR, 48);
			$stmt->bindParam(':mc_md_pick', $mc_md_pick, PDO::PARAM_STR, 48);
			$stmt->bindParam(':mc_new_arrivals', $mc_new_arrivals, PDO::PARAM_STR, 48);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 메인 배너 갱신
	function updateMainBanner($dbh) {
		try {
			$mmb_display = $this->getAddslashes('mmb_display');
			$mmb_gubun = $this->getAddslashes('mmb_gubun');
			$goods_name = !empty($this->getAddslashes('goods_name')) ? $this->getAddslashes('goods_name') : null;
			$goods_idx = !empty($this->getAddslashes('goods_idx')) ? $this->getAddslashes('goods_idx') : null;
			$evt_title = !empty($this->getAddslashes('evt_title')) ? $this->getAddslashes('evt_title') : null;
			$evt_idx = !empty($this->getAddslashes('evt_idx')) ? $this->getAddslashes('evt_idx') : null;
			$mmb_link = !empty($this->getAddslashes('mmb_link')) ? $this->getAddslashes('mmb_link') : null;
			$mmb_img_name = !empty($this->getAddslashes('mmb_img_name')) ? $this->getAddslashes('mmb_img_name') : null;
			$mmb_img_rename = !empty($this->getAddslashes('mmb_img_rename')) ? $this->getAddslashes('mmb_img_rename') : null;
			$mmb_img_mobile_name = !empty($this->getAddslashes('mmb_img_mobile_name')) ? $this->getAddslashes('mmb_img_mobile_name') : null;
			$mmb_img_mobile_rename = !empty($this->getAddslashes('mmb_img_mobile_rename')) ? $this->getAddslashes('mmb_img_mobile_rename') : null;
			$orders = !empty($this->getAddslashes('orders')) ? $this->getAddslashes('orders') : null;
			$mmb_idx = $this->getAddslashes('mmb_idx');
/*
			echo '<br>mmb_display:'.$mmb_display;
			echo '<br>mmb_gubun:'.$mmb_gubun;
			echo '<br>goods_name:'.$goods_name;
			echo '<br>goods_idx:'.$goods_idx;
			echo '<br>evt_title:'.$evt_title;
			echo '<br>evt_idx:'.$evt_idx;
			echo '<br>mmb_img_name:'.$mmb_img_name;
			echo '<br>mmb_img_rename:'.$mmb_img_rename;
			echo '<br>mmb_idx:'.$mmb_idx;
*/
			$sql = ' UPDATE market_main_banner SET
							mmb_gubun = :mmb_gubun,
							goods_idx = :goods_idx,
							goods_name = :goods_name,
							evt_idx = :evt_idx, evt_title = :evt_title,
							mmb_link = :mmb_link,
							mmb_img_name = :mmb_img_name,
							mmb_img_rename = :mmb_img_rename,
							mmb_img_mobile_name = :mmb_img_mobile_name,
							mmb_img_mobile_rename = :mmb_img_mobile_rename,
							mmb_display = :mmb_display,
							orders = :orders
						WHERE mmb_idx = :mmb_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mmb_gubun', $mmb_gubun, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':evt_title', $evt_title, PDO::PARAM_STR, 100);
			$stmt->bindParam(':mmb_link', $mmb_link, PDO::PARAM_STR, 255);
			$stmt->bindParam(':mmb_img_name', $mmb_img_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':mmb_img_rename', $mmb_img_rename, PDO::PARAM_STR, 25);
			$stmt->bindParam(':mmb_img_mobile_name', $mmb_img_mobile_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':mmb_img_mobile_rename', $mmb_img_mobile_rename, PDO::PARAM_STR, 25);
			$stmt->bindParam(':mmb_display', $mmb_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':orders', $orders, PDO::PARAM_INT, 3);
			$stmt->bindParam(':mmb_idx', $mmb_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 장르 배너 갱신
	function updateGenreBanner($dbh) {
		try {
			$goods_medium = $this->getAddslashes('goods_medium');
			$goods_img_name = !empty($this->getAddslashes('goods_img_name')) ? $this->getAddslashes('goods_img_name') : null;
			$goods_img_rename = !empty($this->getAddslashes('goods_img_rename')) ? $this->getAddslashes('goods_img_rename') : null;

			$sql = ' UPDATE market_genre_banner
						SET goods_img_name = :goods_img_name, goods_img_rename = :goods_img_rename
						WHERE goods_medium = :goods_medium';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_img_name', $goods_img_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':goods_img_rename', $goods_img_rename, PDO::PARAM_STR, 25);
			$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 메인배너 목록 가져오기(관리자)
	function getMainBannerList($dbh) {
		try {
			$sql = ' SELECT mmb_idx, mmb_gubun, goods_idx, goods_name, evt_idx, evt_title, mmb_link, mmb_img_name, mmb_img_rename, mmb_img_mobile_name, mmb_img_mobile_rename, mmb_display, orders
						FROM market_main_banner
						ORDER BY orders ASC, mmb_idx ASC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 메인배너 목록 롤링 가져오기(사용자)
	function getMainBannerListRolling($dbh) {
		try {
			$mmb_display = 'Y';
			$sql = ' SELECT mmb_idx, mmb_gubun, goods_idx, evt_idx, mmb_link, mmb_img_rename, mmb_img_mobile_rename
						FROM market_main_banner
						WHERE mmb_img_rename IS NOT NULL AND mmb_display = :mmb_display
						ORDER BY orders ASC, mmb_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':mmb_display', $mmb_display, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 메인배너 목록 롤링 작품 상세 정보(사용자)
	function getMainBannerListRollingArtWork($dbh, $goods_idx) {
		try {
			$sql = ' SELECT a.goods_idx, a.goods_name, b.artist_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_make_year, a.goods_material
						FROM goods AS a INNER JOIN artist_info AS b ON a.artist_idx = b.artist_idx
						WHERE a.goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetch();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 마켓 메인배너 목록 롤링 전시 상세 정보(사용자)
	function getMainBannerListRollingEvent($dbh, $evt_idx) {
		try {
			$sql = ' SELECT evt_idx, evt_title, evt_copyright FROM event_exhibition WHERE evt_idx = :evt_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_idx', $evt_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetch();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}




	// 마켓 장르배너 목록 가져오기
	function getGenreBannerList($dbh) {
		try {
			$sql = 'SELECT goods_medium, goods_img_name, goods_img_rename FROM market_genre_banner ORDER BY goods_medium ASC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	function getSelectionEdit($dbh) {
		try {
			$sql = 'select ms_issue, ms_focused_works, ms_awarded_artist from market_selection';
			$stmt = $dbh->prepare($sql);

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
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getMdChoiceEdit($dbh) {
		try {
			$sql = 'select mmc_title, mmc_artwork from market_md_choice';
			$stmt = $dbh->prepare($sql);

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
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getCollectionEdit($dbh) {
		try {
			$sql = 'select mc_top_seller, mc_md_pick, mc_new_arrivals from market_collection';
			$stmt = $dbh->prepare($sql);

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
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getCount($dbh, $tbl) {
		try {
			$cnt = 0;
			$sql = 'select count(*) from market_'.$tbl;
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();
			//echo "cnt:".$cnt, $tbl;

			return $cnt;
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 상품(작품)목록 가져오기
	function getGoodsListInfo($dbh) {
		try {
			$del_state = 'N';
			$goods_name = $this->getAddslashes('goods_name');
			$goods_name = '%'.$goods_name.'%';
			$sql = 'SELECT a.goods_idx, a.goods_name, a.artist_idx, b.artist_name FROM goods as a inner join artist_info as b on a.artist_idx = b.artist_idx WHERE a.goods_name like :goods_name AND a.del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getGoodsName($dbh, $goods_idx) {
		try {
			if (!empty($goods_idx)) {
				$sql = 'SELECT a.goods_name, b.artist_name FROM goods as a inner join artist_info as b on a.artist_idx = b.artist_idx WHERE a.goods_idx =:goods_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					 return $stmt->fetch(PDO::FETCH_ASSOC);
				}
				else {
					return null;
				}
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function setGoodsName($dbh, $ary) {
		$i = 0;
		$aTemp = null;
		foreach($ary as $idx) {
			$row = self::getGoodsName($dbh, $idx);
			if (!empty($row['goods_name'])) {
				$aTemp[$i]= $row['goods_name'].'('.$row['artist_name'].')';
			}
			else {
				$aTemp[$i]= '';
			}
			++$i;
		}

		return $aTemp;
	}


/**
프론트 영역
*/

	function getGoodsIdxs($dbh, $tbl, $col) {
		try {
			$i = 0;
			$goodsIdx = null;
			$sql = 'SELECT '.$col.' FROM '.$tbl;
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				$result = $stmt->fetchColumn();

				if (!empty($result)) {
					$aGoodsIdx = explode('§', trim($result));
					foreach($aGoodsIdx as $val) {
						if (!empty($val)) {
							if ($i === 0) {
								$goodsIdx = $val;
							}
							else {
								$goodsIdx .= ','.$val;
							}
						}
						++$i;
					}
				}
				return $goodsIdx;
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getCollection($dbh, $tbl, $col) {
		try {
			$list = null;
			$goods_display = 'Y';
			$del_state = 'N';
			$goodsIdx = self::getGoodsIdxs($dbh, $tbl, $col);

			if (!is_null($goodsIdx)) {
				$sql = ' SELECT a.goods_idx, a.goods_name, a.goods_list_img, a.goods_lental_state, a.goods_cnt, (SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name
							FROM goods AS a
							WHERE a.goods_idx IN ('.$goodsIdx.') AND a.goods_display = :goods_display AND a.del_state = :del_state';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

				if ($stmt->execute() && $stmt->rowCount()) {
					$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getArchiveList($dbh) {
		try {
			$goods_sell_price = $this->getAddslashes('price');
			$goods_medium = $this->getAddslashes('medium');
			$goods_subject = $this->getAddslashes('subject');
			$goods_size = $this->getAddslashes('size');

			$list = null;
			$subSQL = null;
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			/*
			echo "price:$price";
			echo "medium:$medium";
			echo "subject:$subject";
			echo "size:$size";
			*/

			if (is_numeric($goods_medium)) {
				$subSQL .= ' AND goods_medium = :goods_medium ';
				//echo "chk";
			}

			if (is_numeric($goods_subject)) {
				$subSQL .= ' AND goods_subject = :goods_subject ';
			}

			if (is_numeric($goods_size)) {
				$subSQL .= ' AND goods_size = :goods_size ';
			}

			if (is_numeric($goods_sell_price)) {
				if ($goods_sell_price === '0') {
					$subSQL .= ' AND goods_sell_price between 50000 AND 100000 ';
				}
				elseif ($goods_sell_price === '1') {
					$subSQL .= ' AND goods_sell_price between 100000 AND 2000000 ';
				}
				elseif ($goods_sell_price === '2') {
					$subSQL .= ' AND goods_sell_price between 200000 AND 5000000 ';
				}
				elseif ($goods_sell_price === '3') {
					$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
				}
				elseif ($goods_sell_price === '4') {
					$subSQL .= ' AND goods_sell_price >= 1000000 ';
				}
			}


			$sql = ' SELECT a.goods_idx, a.goods_name, a.goods_list_img, a.goods_lental_state, a.goods_cnt, (SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name
						FROM goods AS a
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. 'LIMIT 0, 12';

			//echo $sql;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if (is_numeric($goods_medium)) {
				$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_subject)) {
				$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_size)) {
				$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			}


			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			return $list;

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// MD Choice 타이틀 목록 가져오기
	function getMDChoiceList($dbh) {
		try {
			$sql = 'SELECT mmc_title FROM market_md_choice';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchColumn();
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// MD Choice 배너 목록 가져오기
	function getMdChoiceBanner($dbh, $beginIdx) {
		try {
			$list = null;
			$endIdx = $beginIdx + 5;
			$sql = 'SELECT mmc_artwork FROM market_md_choice';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute() && $stmt->rowCount()) {
				$mdChoiceArtWork = $stmt->fetchColumn();
				if (!empty($mdChoiceArtWork)) {
					$aMdChoiceArtWork = explode('§', $mdChoiceArtWork);
					//print_r($aMdChoiceArtWork);
					for($i = $beginIdx; $i < $endIdx; $i++){
						if ($i === $beginIdx) {
							if (!empty($aMdChoiceArtWork[$i])) {
								$aMdChoiceArtWorkIdxs = $aMdChoiceArtWork[$i];
							}
						}
						else {
							if (!empty($aMdChoiceArtWork[$i])) {
								$aMdChoiceArtWorkIdxs .= ','.$aMdChoiceArtWork[$i];
							}
						}
					}
					//echo $aMdChoiceArtWorkIdxs;

					if (!empty($aMdChoiceArtWorkIdxs)) {
						$sql = 'SELECT goods_idx, goods_list_img FROM goods WHERE goods_idx IN ('.$aMdChoiceArtWorkIdxs.')';
						$stmt = $dbh->prepare($sql);

						if ($stmt->execute() && $stmt->rowCount()) {
							$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
						}
					}
				}
			}

			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 마켓 메인 작품 가져오기
	function getMainList($dbh) {
		try {
			$goods_sell_price = $this->getAddslashes('price');
			$goods_medium = $this->getAddslashes('medium');
			$goods_subject = $this->getAddslashes('subject');
			$goods_size = $this->getAddslashes('size');
			$goods_color = $this->getAddslashes('color');
			$rental = $this->getAddslashes('rental');
			$sell = $this->getAddslashes('sell');
			$goods_name = $this->getAddslashes('goods_name');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$rdmstart = $this->getAddslashes('rdmstart');

			$start = ((int)$page - 1) * $sz;
			$end = $sz;

			//$start = ((int)$page - 1) * ARTWORKSLISTCOUNT;
			//$end = ARTWORKSLISTCOUNT;

			$list = null;
			$subSQL = null;
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$goods_cnt = 0;
			/*
			echo "price:$price";
			echo "medium:$medium";
			echo "subject:$subject";
			echo "size:$size";
			*/

			if (is_numeric($goods_medium)) {
				$subSQL .= ' AND goods_medium = :goods_medium ';
				//echo "chk";
			}

			if (is_numeric($goods_subject)) {
				$subSQL .= ' AND goods_subject = :goods_subject ';
			}

			if (is_numeric($goods_size)) {
				$subSQL .= ' AND goods_size = :goods_size ';
			}

			if (is_numeric($goods_color)) {
				$subSQL .= ' AND goods_color = :goods_color ';
			}
/*
			if (is_numeric($goods_sell_price)) {
				if ($goods_sell_price === '0') {
					$subSQL .= ' AND goods_sell_price between 50000 AND 100000 ';
				}
				elseif ($goods_sell_price === '1') {
					$subSQL .= ' AND goods_sell_price between 100000 AND 2000000 ';
				}
				elseif ($goods_sell_price === '2') {
					$subSQL .= ' AND goods_sell_price between 200000 AND 5000000 ';
				}
				elseif ($goods_sell_price === '3') {
					$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
				}
				elseif ($goods_sell_price === '4') {
					$subSQL .= ' AND goods_sell_price >= 1000000 ';
				}
			}
*/
//
			if (is_numeric($goods_sell_price)) {
				if ($goods_sell_price === '0') {
					$subSQL .= ' AND goods_sell_price <= 500000 ';
				}elseif ($goods_sell_price === '1') {
					$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
				}
				elseif ($goods_sell_price === '2') {
					$subSQL .= ' AND goods_sell_price between 1000000 AND 2000000 ';
				}
				elseif ($goods_sell_price === '3') {
					$subSQL .= ' AND goods_sell_price between 2000000 AND 3000000 ';
				}
				elseif ($goods_sell_price === '4') {
					$subSQL .= ' AND goods_sell_price between 3000000 AND 4000000 ';
				}
				elseif ($goods_sell_price === '5') {
					$subSQL .= ' AND goods_sell_price between 4000000 AND 5000000 ';
				}
				elseif ($goods_sell_price === '6') {
					$subSQL .= ' AND goods_sell_price between 5000000 AND 10000000 ';
				}
				elseif ($goods_sell_price === '7') {
					$subSQL .= ' AND goods_sell_price >= 10000000 ';
				}
			}
//
			if ($rantal === 'Y') {
				$subSQL .= ' AND goods_lental_state = :goods_lental_state ';
			}

			if ($sell === 'Y') {
				$subSQL .= ' AND goods_cnt > :goods_cnt ';
			}

			if (!empty($goods_name)) {
				$subSQL .= ' AND goods_name like :goods_name ';
			}

			/*
			// 원래 쿼리
			$sql = ' SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, a.goods_list_img, a.goods_lental_state, a.goods_cnt,
							(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_material, a.goods_make_year
						FROM goods AS a
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$start.', '.$end.'';
			*/

			// 올린 순서대로 가져오기
			/*
			$sql = ' SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, (select goods_img from goods_add_img where goods_idx = a.goods_idx order by img_idx asc limit 0, 1) as goods_list_img, a.goods_lental_state, a.goods_cnt,
							(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_material, a.goods_make_year, a.goods_sell_price
						FROM goods AS a
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$start.', '.$end.'';
			*/

			// 랜덤하게 가져오기
			$sql = ' (SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, (select goods_img from goods_add_img where goods_idx = a.goods_idx order by img_idx asc limit 0, 1) as goods_list_img, a.goods_lental_state, a.goods_cnt,
							(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_material, a.goods_make_year, a.goods_sell_price
						FROM goods AS a
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$rdmstart.', '.$end.') ORDER BY RAND()';

			//echo $sql;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if (is_numeric($goods_medium)) {
				$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_subject)) {
				$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_size)) {
				$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_color)) {
				$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 1);
			}

			if ($rantal === 'Y') {
				$stmt->bindParam(':goods_lental_state', $rantal, PDO::PARAM_STR, 1);
			}

			if ($sell === 'Y') {
				$stmt->bindParam(':goods_cnt', $goods_cnt, PDO::PARAM_INT, 1);
			}

			if (!empty($goods_name)) {
				$chg_goods_name = "%".$goods_name."%";
				$stmt->bindParam(':goods_name', $chg_goods_name, PDO::PARAM_STR, 200);
			}

			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			return $list;

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 마켓 메인 작품 가져오기
	function getMainList2($dbh) {
		try {
			$goods_sell_price = $this->getAddslashes('price');
			$goods_medium = $this->getAddslashes('medium');
			$goods_subject = $this->getAddslashes('subject');
			$goods_size = $this->getAddslashes('size');
			$goods_color = $this->getAddslashes('color');
			$rental = $this->getAddslashes('rental');
			$sell = $this->getAddslashes('sell');
			$goods_name = $this->getAddslashes('goods_name');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$rdmstart = $this->getAddslashes('rdmstart');
			$list = null;

			//echo "rdmstart:$rdmstart";

			if (is_numeric($rdmstart)) {


				$start = ((int)$page - 1) * $sz;
				$end = $sz;

				//$start = ((int)$page - 1) * ARTWORKSLISTCOUNT;
				//$end = ARTWORKSLISTCOUNT;

				$list = null;
				$subSQL = null;
				$category_idx = 1;
				$goods_display = 'Y';
				$del_state = 'N';
				$goods_cnt = 0;
				/*
				echo "price:$price";
				echo "medium:$medium";
				echo "subject:$subject";
				echo "size:$size";
				*/

				if (is_numeric($goods_medium)) {
					$subSQL .= ' AND goods_medium = :goods_medium ';
					//echo "chk";
				}

				if (is_numeric($goods_subject)) {
					$subSQL .= ' AND goods_subject = :goods_subject ';
				}

				if (is_numeric($goods_size)) {
					$subSQL .= ' AND goods_size = :goods_size ';
				}

				/*
				if (is_numeric($goods_color)) {
					$subSQL .= ' AND goods_color = :goods_color ';
				}
				*/

				//멀티 색상 검색
				if (is_numeric($goods_color)) {
					$goods_color = '§'.$goods_color.'§';
					$subSQL .= ' AND INSTR(goods_color_multi , :goods_color )  > 0 ';
				}
	/*
				if (is_numeric($goods_sell_price)) {
					if ($goods_sell_price === '0') {
						$subSQL .= ' AND goods_sell_price between 50000 AND 100000 ';
					}
					elseif ($goods_sell_price === '1') {
						$subSQL .= ' AND goods_sell_price between 100000 AND 2000000 ';
					}
					elseif ($goods_sell_price === '2') {
						$subSQL .= ' AND goods_sell_price between 200000 AND 5000000 ';
					}
					elseif ($goods_sell_price === '3') {
						$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
					}
					elseif ($goods_sell_price === '4') {
						$subSQL .= ' AND goods_sell_price >= 1000000 ';
					}
				}
	*/
	//
				if (is_numeric($goods_sell_price)) {
					if ($goods_sell_price === '0') {
						$subSQL .= ' AND goods_sell_price <= 500000 ';
					}elseif ($goods_sell_price === '1') {
						$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
					}
					elseif ($goods_sell_price === '2') {
						$subSQL .= ' AND goods_sell_price between 1000000 AND 2000000 ';
					}
					elseif ($goods_sell_price === '3') {
						$subSQL .= ' AND goods_sell_price between 2000000 AND 3000000 ';
					}
					elseif ($goods_sell_price === '4') {
						$subSQL .= ' AND goods_sell_price between 3000000 AND 4000000 ';
					}
					elseif ($goods_sell_price === '5') {
						$subSQL .= ' AND goods_sell_price between 4000000 AND 5000000 ';
					}
					elseif ($goods_sell_price === '6') {
						$subSQL .= ' AND goods_sell_price between 5000000 AND 10000000 ';
					}
					elseif ($goods_sell_price === '7') {
						$subSQL .= ' AND goods_sell_price >= 10000000 ';
					}
				}
	//
				if ($rantal === 'Y') {
					$subSQL .= ' AND goods_lental_state = :goods_lental_state ';
				}

				if ($sell === 'Y') {
					$subSQL .= ' AND goods_cnt > :goods_cnt ';
				}

				if (!empty($goods_name)) {
					$subSQL .= ' AND goods_name like :goods_name ';
				}

				/*
				// 원래 쿼리
				$sql = ' SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, a.goods_list_img, a.goods_lental_state, a.goods_cnt,
								(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_material, a.goods_make_year
							FROM goods AS a
							WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$start.', '.$end.'';
				*/

				// 올린 순서대로 가져오기
				/*
				$sql = ' SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, (select goods_img from goods_add_img where goods_idx = a.goods_idx order by img_idx asc limit 0, 1) as goods_list_img, a.goods_lental_state, a.goods_cnt,
								(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_material, a.goods_make_year, a.goods_sell_price
							FROM goods AS a
							WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$start.', '.$end.'';
				*/

				// 랜덤하게 가져오기
				$sql = ' (SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, (select goods_img from goods_add_img where goods_idx = a.goods_idx order by img_idx asc limit 0, 1) as goods_list_img, a.goods_lental_state, a.goods_cnt,
								(SELECT b.artist_name FROM artist_info AS b WHERE b.artist_idx = a.artist_idx) AS artist_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_material, a.goods_make_year, a.goods_sell_price, a.is_rental
							FROM goods AS a
							WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL. ' ORDER BY a.goods_idx DESC LIMIT '.$rdmstart.', '.$end.') ORDER BY RAND()';

				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
				$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

				if (is_numeric($goods_medium)) {
					$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
				}

				if (is_numeric($goods_subject)) {
					$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
				}

				if (is_numeric($goods_size)) {
					$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
				}

				/*
				if (is_numeric($goods_color)) {
					$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 1);
				}
				*/
				//멀티색상 검색
				if (!empty($goods_color)) {
					$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 50);
				}

				if ($rantal === 'Y') {
					$stmt->bindParam(':goods_lental_state', $rantal, PDO::PARAM_STR, 1);
				}

				if ($sell === 'Y') {
					$stmt->bindParam(':goods_cnt', $goods_cnt, PDO::PARAM_INT, 1);
				}

				if (!empty($goods_name)) {
					$chg_goods_name = "%".$goods_name."%";
					$stmt->bindParam(':goods_name', $chg_goods_name, PDO::PARAM_STR, 200);
				}

				if ($stmt->execute() && $stmt->rowCount()) {
					$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}

			return $list;

		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 작품 전체 개수 구하기
	function getArtWorkCount($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$sql = 'SELECT COUNT(goods_idx) FROM goods WHERE category_idx = :category_idx AND goods_display = :goods_display AND del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}



	// 작품 전체 개수 구하기
	function getArtWorkCount2($dbh) {
		try {
			$goods_sell_price = $this->getAddslashes('price');
			$goods_medium = $this->getAddslashes('medium');
			$goods_subject = $this->getAddslashes('subject');
			$goods_size = $this->getAddslashes('size');
			$goods_color = $this->getAddslashes('color');
			$rental = $this->getAddslashes('rental');
			$sell = $this->getAddslashes('sell');
			$goods_name = $this->getAddslashes('goods_name');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$rdmstart = $this->getAddslashes('rdmstart');

			$start = ((int)$page - 1) * $sz;
			$end = $sz;

			//$start = ((int)$page - 1) * ARTWORKSLISTCOUNT;
			//$end = ARTWORKSLISTCOUNT;

			$list = null;
			$subSQL = null;
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$goods_cnt = 0;

			/*
			echo "goods_sell_price:$goods_sell_price";
			echo "goods_medium:$goods_medium";
			echo "goods_subject:$goods_subject";
			echo "goods_size:$goods_size";
			*/



			if (is_numeric($goods_medium)) {
				$subSQL .= ' AND goods_medium = :goods_medium ';
				//echo "chk";
			}

			if (is_numeric($goods_subject)) {
				$subSQL .= ' AND goods_subject = :goods_subject ';
			}

			if (is_numeric($goods_size)) {
				$subSQL .= ' AND goods_size = :goods_size ';
			}

			/*
			if (is_numeric($goods_color)) {
				$subSQL .= ' AND goods_color = :goods_color ';
			}
			*/

			if (is_numeric($goods_color)) {
				$goods_color = '§'.$goods_color.'§';
				$subSQL .= ' AND INSTR(goods_color_multi , :goods_color )  > 0 ';
			}

			if (is_numeric($goods_sell_price)) {
				if ($goods_sell_price === '0') {
					$subSQL .= ' AND goods_sell_price <= 500000 ';
				}elseif ($goods_sell_price === '1') {
					$subSQL .= ' AND goods_sell_price between 500000 AND 1000000 ';
				}
				elseif ($goods_sell_price === '2') {
					$subSQL .= ' AND goods_sell_price between 1000000 AND 2000000 ';
				}
				elseif ($goods_sell_price === '3') {
					$subSQL .= ' AND goods_sell_price between 2000000 AND 3000000 ';
				}
				elseif ($goods_sell_price === '4') {
					$subSQL .= ' AND goods_sell_price between 3000000 AND 4000000 ';
				}
				elseif ($goods_sell_price === '5') {
					$subSQL .= ' AND goods_sell_price between 4000000 AND 5000000 ';
				}
				elseif ($goods_sell_price === '6') {
					$subSQL .= ' AND goods_sell_price between 5000000 AND 10000000 ';
				}
				elseif ($goods_sell_price === '7') {
					$subSQL .= ' AND goods_sell_price >= 10000000 ';
				}
			}
//
			if ($rantal === 'Y') {
				$subSQL .= ' AND goods_lental_state = :goods_lental_state ';
			}

			if ($sell === 'Y') {
				$subSQL .= ' AND goods_cnt > :goods_cnt ';
			}

			if (!empty($goods_name)) {
				$subSQL .= ' AND goods_name like :goods_name ';
			}




			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$sql = 'SELECT COUNT(goods_idx)
						FROM goods
						WHERE category_idx = :category_idx AND goods_display = :goods_display AND del_state = :del_state '.$subSQL;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			//echo $sql;

			if (is_numeric($goods_medium)) {
				$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_subject)) {
				$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			}

			if (is_numeric($goods_size)) {
				$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			}

			/*
			if (is_numeric($goods_color)) {
				$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 1);
			}
			*/
			if (!empty($goods_color)) {
				$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_STR, 50);
			}

			if ($rantal === 'Y') {
				$stmt->bindParam(':goods_lental_state', $rantal, PDO::PARAM_STR, 1);
			}

			if ($sell === 'Y') {
				$stmt->bindParam(':goods_cnt', $goods_cnt, PDO::PARAM_INT, 1);
			}

			if (!empty($goods_name)) {
				$chg_goods_name = "%".$goods_name."%";
				$stmt->bindParam(':goods_name', $chg_goods_name, PDO::PARAM_STR, 200);
			}

			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 선택한 작가의 작품만 가져오기
	function getEachArtistArtWorks($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$artist_idx = $this->getAddslashes('artist_idx');
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			//$start = ((int)$page - 1) * ARTWORKSLISTCOUNT;
			//$end = ARTWORKSLISTCOUNT;
			$start = ((int)$page - 1) * $sz;
			$end = $sz;
			$sql = ' SELECT a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.goods_name, a.goods_name, b.artist_name, a.goods_width, a.goods_depth, a.goods_height,
									a.goods_make_year, a.goods_material, a.goods_lental_state, a.goods_cnt, a.sold_out_state,
									(SELECT goods_img FROM goods_add_img WHERE goods_idx = a.goods_idx ORDER BY img_idx ASC LIMIT 0, 1) AS goods_list_img
						FROM goods AS a INNER JOIN artist_info AS b ON a.artist_idx = b.artist_idx
						WHERE a.artist_idx = :artist_idx AND a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state
						ORDER BY a.goods_idx DESC LIMIT '.$start.', '.$end;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 선택한 작가의 작품 전체 개수 구하기
	function getEachArtWorkCount($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$artist_idx = $this->getAddslashes('artist_idx');

			$sql = 'SELECT COUNT(goods_idx) FROM goods WHERE category_idx = :category_idx AND goods_display = :goods_display AND del_state = :del_state AND artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 판매된 작품 수
	function getSelledArtWorkCount($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$goods_cnt = 0;
			$artist_idx = $this->getAddslashes('artist_idx');
			$sql = ' SELECT COUNT(goods_idx)
						FROM goods
						WHERE category_idx = :category_idx AND goods_display = :goods_display AND del_state = :del_state AND artist_idx = :artist_idx AND goods_cnt = :goods_cnt';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_cnt', $goods_cnt, PDO::PARAM_INT, 3);
			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 렌탈 중인 작품 수
	function getRentaledArtWorkCount($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$artist_idx = $this->getAddslashes('artist_idx');
			$is_rental = 'Y';
			$sql = ' SELECT COUNT(goods_idx)
						FROM goods
						WHERE category_idx = :category_idx AND goods_display = :goods_display AND del_state = :del_state AND artist_idx = :artist_idx and is_rental = :is_rental';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':is_rental', $is_rental, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 작가명 가져오기(한글, 영문)
	function getArtistName($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx');
			$sql = ' SELECT artist_name, artist_en_name FROM artist_info WHERE artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				return $stmt->fetch();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 기획전 가져오기
	function getEventExhibitionList($dbh) {
		try {
			$evt_display_state = 'Y';
			$evt_title = '%'.$this->getAddslashes('evt_title').'%';
			$sql = ' SELECT evt_idx, evt_title FROM event_exhibition WHERE evt_title like :evt_title AND evt_display_state = :evt_display_state ORDER BY evt_idx DESC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':evt_title', $evt_title, PDO::PARAM_STR, 100);
			$stmt->bindParam(':evt_display_state', $evt_display_state, PDO::PARAM_STR, 1);
			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


}
