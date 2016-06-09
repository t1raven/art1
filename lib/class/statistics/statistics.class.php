<?php
class Statistics
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

	// 방문자 업데이트
	function updateVisitor($dbh) {
		try {
			$hour = date('H');
			$years = (int)date('Y');
			$months = (int)date('n');
			$days = (int)date('j');
			$weeks = (int)date('w'); // 0(일요일) ~ 6(토요일)
			$page_view_cnt = 0;
			$visitor_cnt = 1;
			$nHour = (int)$hour;

			for($i=0; $i<24; $i++) {
				 $aHour[$i] = ($nHour === $i) ? 1 : 0;
			}

			$referrer = $this->getAddslashes('referrer');
			$screen_x = $this->getAddslashes('screen_x');
			$screen_y = $this->getAddslashes('screen_y');
			$ei = $this->getAddslashes('ei');
			$ei_ver = $this->getAddslashes('ei_ver');
			$os = $this->getAddslashes('os');

			// 접속자 통계
			$sql = 'SELECT count(years) FROM statistics_visitor WHERE years = :years and months = :months and days = :days';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':years', $years, PDO::PARAM_INT, 3);
			$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);
			$stmt->bindParam(':days', $days, PDO::PARAM_INT, 3);

			if ($stmt->execute()) {
				if ((int)$stmt->fetchColumn() === 0) {
					$sql = 'INSERT INTO statistics_visitor(
									years, months, days, weeks, page_view_cnt, visitor_cnt, hour_00, hour_01, hour_02, hour_03, hour_04, hour_05, hour_06, hour_07, hour_08, hour_09, hour_10,
									hour_11, hour_12, hour_13, hour_14, hour_15, hour_16, hour_17, hour_18, hour_19, hour_20, hour_21, hour_22, hour_23
								) VALUES (
									:years, :months, :days, :weeks, :page_view_cnt, :visitor_cnt, :hour_00, :hour_01, :hour_02, :hour_03, :hour_04, :hour_05, :hour_06, :hour_07, :hour_08, :hour_09, :hour_10,
									:hour_11, :hour_12, :hour_13, :hour_14, :hour_15, :hour_16, :hour_17, :hour_18, :hour_19, :hour_20, :hour_21, :hour_22, :hour_23
								)';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':years', $years, PDO::PARAM_INT, 3);
					$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);
					$stmt->bindParam(':days', $days, PDO::PARAM_INT, 3);
					$stmt->bindParam(':weeks', $weeks, PDO::PARAM_INT, 3);
					$stmt->bindParam(':page_view_cnt', $page_view_cnt, PDO::PARAM_INT, 3);
					$stmt->bindParam(':visitor_cnt', $visitor_cnt, PDO::PARAM_INT, 3);
					$stmt->bindParam(':hour_00', $aHour[0], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_01', $aHour[1], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_02', $aHour[2], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_03', $aHour[3], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_04', $aHour[4], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_05', $aHour[5], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_06', $aHour[6], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_07', $aHour[7], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_08', $aHour[8], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_09', $aHour[9], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_10', $aHour[10], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_11', $aHour[11], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_12', $aHour[12], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_13', $aHour[13], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_14', $aHour[14], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_15', $aHour[15], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_16', $aHour[16], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_17', $aHour[17], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_18', $aHour[18], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_19', $aHour[19], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_20', $aHour[20], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_21', $aHour[21], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_22', $aHour[22], PDO::PARAM_INT, 5);
					$stmt->bindParam(':hour_23', $aHour[23], PDO::PARAM_INT, 5);

				}
				else {
					$sql = 'UPDATE statistics_visitor SET visitor_cnt = visitor_cnt + 1, hour_'.$hour.' = hour_'.$hour.' + 1 WHERE years = :years and months = :months and days = :days';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':years', $years, PDO::PARAM_INT, 3);
					$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);
					$stmt->bindParam(':days', $days, PDO::PARAM_INT, 3);
				}

				$stmt->execute();
			}

			//접속자 OS 업데이트
			if (!empty($os)) {
				$sql = 'SELECT count(os) FROM statistics_visitor_os WHERE os = :os';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':os', $os, PDO::PARAM_STR, 40);
				if ($stmt->execute()) {
					if ((int)$stmt->fetchColumn() === 0) {
						$sql = 'INSERT INTO statistics_visitor_os(os, cnt) VALUES (:os, 1)';
					}
					else {
						$sql = 'UPDATE statistics_visitor_os set cnt = cnt + 1 WHERE os = :os';
					}

					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':os', $os, PDO::PARAM_STR, 40);
					$stmt->execute();
				}
			}

			// 접속자 브라우저
			If (!empty($ei) || !empty($ei_ver)) {
				$browser = $ei.' '.$ei_ver;
				$sql = 'SELECT count(browser) FROM statistics_visitor_brower WHERE browser = :browser';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':browser', $browser, PDO::PARAM_STR, 40);
				if ($stmt->execute()) {
					if ((int)$stmt->fetchColumn() === 0) {
						$sql = 'INSERT INTO statistics_visitor_brower(browser, cnt) VALUES (:browser, 1)';
					}
					else {
						$sql = 'UPDATE statistics_visitor_brower SET cnt = cnt + 1 WHERE browser = :browser';
					}

					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':browser', $browser, PDO::PARAM_STR, 40);
					$stmt->execute();
				}
			}

			// 접속자 해상도
			If (!empty($screen_x) && !empty($screen_y)) {
				$sql = 'SELECT count(screen_x) FROM statistics_visitor_screen WHERE screen_x = :screen_x AND screen_y = :screen_y';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':screen_x', $screen_x, PDO::PARAM_INT, 5);
				$stmt->bindParam(':screen_y', $screen_y, PDO::PARAM_INT, 5);
				if ($stmt->execute()) {
					if ((int)$stmt->fetchColumn() === 0) {
						$sql = 'INSERT INTO statistics_visitor_screen(screen_x, screen_y, cnt) VALUES (:screen_x, :screen_y, 1)';
					}
					else {
						$sql = 'UPDATE statistics_visitor_screen SET cnt = cnt + 1 WHERE screen_x = :screen_x AND screen_y = :screen_y';
					}

					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':screen_x', $screen_x, PDO::PARAM_INT, 5);
					$stmt->bindParam(':screen_y', $screen_y, PDO::PARAM_INT, 5);
					$stmt->execute();
				}
			}

			// 이전페이지
			If (!empty($referrer)) {
				$sql = 'SELECT count(referrer) FROM statistics_visitor_referrer WHERE referrer = :referrer';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':referrer', $referrer, PDO::PARAM_STR, 255);

				if ($stmt->execute()) {
					if ((int)$stmt->fetchColumn() === 0) {
						$sql = 'INSERT INTO statistics_visitor_referrer(referrer, cnt) VALUES (:referrer, 1)';
					}
					else {
						$sql = 'UPDATE statistics_visitor_referrer SET cnt = cnt + 1 WHERE referrer = :referrer';
					}

					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':referrer', $referrer, PDO::PARAM_STR, 255);
					$stmt->execute();
				}
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage();
			return false;
		}
	}


	// 페이지 뷰 업데이트
	function updatePageView($dbh) {
		try {
			$years = (int)date('Y');
			$months = (int)date('n');
			$days = (int)date('j');
			$sql = 'UPDATE statistics_visitor SET page_view_cnt = page_view_cnt + 1 WHERE years = :years AND months = :months AND days = :days';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':years', $years, PDO::PARAM_INT, 3);
			$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);
			$stmt->bindParam(':days', $days, PDO::PARAM_INT, 3);

			if ($stmt->execute()) {
				return true;
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage();
			return false;
		}
	}

	// 시간별 방문 통계 가져오기
	function geTimeVisitor($dbh) {
		try {
			$years = (int)$this->getAddslashes('years');
			$months = (int)$this->getAddslashes('months');
			$days = (int)$this->getAddslashes('days');
			/*
			echo '<br>years:'.$years;
			echo '<br>months:'.$months;
			echo '<br>days:'.$days;
			*/

			$sql = ' SELECT hour_00, hour_01, hour_02, hour_03, hour_04, hour_05, hour_06, hour_07, hour_08, hour_09, hour_10,
									hour_11, hour_12, hour_13, hour_14, hour_15, hour_16, hour_17, hour_18, hour_19, hour_20, hour_21, hour_22, hour_23
						FROM statistics_visitor
						WHERE years = :years AND months = :months AND days = :days';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':years', $years, PDO::PARAM_INT, 5);
			$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);
			$stmt->bindParam(':days', $days, PDO::PARAM_INT, 3);

			if ($stmt->execute()) {
				return $stmt->fetch();
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 시간별 신규회원 가입 통계 가져오기
	function geTimeJoin($dbh) {
		try {
			$years = $this->getAddslashes('years');
			$months = $this->getAddslashes('months');
			$days = $this->getAddslashes('days');
			$create_date = $years.'-'.$months.'-'.$days;
			//echo '<br>'.$create_date;
			$sql = 'SELECT HOUR(create_date) AS hours,  COUNT(user_idx) AS counts FROM member WHERE DATE(create_date) = :create_date GROUP BY hours ORDER BY hours';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':create_date', $create_date, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 일별 방문 통계 가져오기
	function getDayVisitor($dbh) {
		try {
			$years = (int)$this->getAddslashes('years');
			$months = (int)$this->getAddslashes('months');

			$sql = 'SELECT days, page_view_cnt, visitor_cnt FROM statistics_visitor WHERE years = :years AND months = :months ORDER BY days ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':years', $years, PDO::PARAM_INT, 5);
			$stmt->bindParam(':months', $months, PDO::PARAM_INT, 3);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 일별 신규회원 가입 통계 가져오기
	function getDayJoin($dbh) {
		try {
			$years = $this->getAddslashes('years');
			$months = $this->getAddslashes('months');

			$beginDay = $years.'-'.$months.'-01';
			$endDay = $years.'-'.$months.'-31';

			$sql = 'SELECT DAYOFMONTH(create_date) AS days,  COUNT(user_idx) AS counts FROM member WHERE create_date BETWEEN :beginDay AND :endDay GROUP BY days ORDER BY days ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				//echo "chk";

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	// 월별 방문 통계 가져오기
	function getMonthVisitor($dbh) {
		try {
			$years = (int)$this->getAddslashes('years');
			//echo '<br>years:'.$years;
			$sql = ' SELECT months, SUM(page_view_cnt) as total_view, SUM(visitor_cnt) as total FROM statistics_visitor WHERE years = :years GROUP BY months ORDER BY months ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':years', $years, PDO::PARAM_INT, 5);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 월별 신규회원 가입 통계 가져오기
	function getMonthJoin($dbh) {
		try {
			$years = $this->getAddslashes('years');
			$months = $this->getAddslashes('months');

			$beginDay = $years.'-01-01';
			$endDay = $years.'-12-31';

			$sql = 'SELECT MONTH(create_date) AS months,  COUNT(user_idx) AS counts FROM member WHERE create_date BETWEEN :beginDay AND :endDay GROUP BY months ORDER BY months ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				//echo "chk";

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}



	// 경로별 통계 가져오기
	function getReferrer($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$sql = 'CALL up_statistics_referrer_list (:page, :sz)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT, 11);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT, 3);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();
			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	// OS별 접속자 통계 가져오기
	function getOSVisitor($dbh) {
		try {
			$sql = 'SELECT os, cnt FROM statistics_visitor_os ORDER BY cnt DESC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 브라우저별 접속자 통계 가져오기
	function getBrowser($dbh) {
		try {
			$sql = 'SELECT browser, cnt FROM statistics_visitor_brower ORDER BY cnt DESC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 브라우저별 접속자 통계 가져오기
	function getScreen($dbh) {
		try {
			$sql = 'SELECT screen_x, screen_y, cnt FROM statistics_visitor_screen ORDER BY cnt DESC';
			$stmt = $dbh->prepare($sql);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 일별 판매 통계 가져오기
	function getDaySale($dbh) {
		try {
			$years = $this->getAddslashes('years');
			$months = $this->getAddslashes('months');

			$beginDay = $years.'-'.$months.'-01';
			$endDay = $years.'-'.$months.'-31';

			$sql = 'SELECT DAYOFMONTH(create_date) AS days,  SUM(amount) AS amounts FROM orders WHERE create_date BETWEEN :beginDay AND :endDay GROUP BY days ORDER BY days ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				//echo "chk";

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 월별 판매 통계 가져오기
	function getMonthSale($dbh) {
		try {
			$years = $this->getAddslashes('years');
			$months = $this->getAddslashes('months');

			$beginDay = $years.'-01-01';
			$endDay = $years.'-12-31';

			$sql = '	SELECT MONTH(create_date) AS months,  SUM(amount) AS amounts FROM orders
						WHERE tran_state > 1 AND create_date BETWEEN :beginDay AND :endDay
						GROUP BY months
						ORDER BY months ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				//echo "chk";

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 최근 일주일 회원가입 통계 가져오기
	function getWeekDayJoin($dbh) {
		try {
			$beginDay = $this->getAddslashes('beginDay');
			$endDay = $this->getAddslashes('endDay');
			$sql = 'SELECT DAYOFMONTH(create_date) AS days,  COUNT(user_idx) AS counts FROM member WHERE create_date BETWEEN :beginDay AND :endDay GROUP BY days ORDER BY user_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
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

	// 최근 일주일 방문 통계 및 페이지뷰 가져오기
	function getWeekDayVisitorPageView($dbh) {
		try {
			$beginDay = $this->getAddslashes('beginDay');
			$endDay = $this->getAddslashes('endDay');
			//echo 'begin2:'.$beginDay;
			//echo 'end2:'.$endDay;

			$sql = 'SELECT days, visitor_cnt, page_view_cnt FROM statistics_visitor WHERE create_date BETWEEN :beginDay AND :endDay ORDER BY months ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	// 최근 일주일 판매금액 통계 가져오기
	function getWeekDaySale($dbh) {
		try {
			$del_state = 'N';
			$beginDay = $this->getAddslashes('beginDay');
			$endDay = $this->getAddslashes('endDay');

			$sql = 'SELECT DAYOFMONTH(create_date) AS days,  SUM(amount) AS amounts FROM orders WHERE del_state = :del_state AND create_date BETWEEN :beginDay AND :endDay GROUP BY days ORDER BY days ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':beginDay', $beginDay, PDO::PARAM_STR, 10);
			$stmt->bindParam(':endDay', $endDay, PDO::PARAM_STR, 10);

			if ($stmt->execute()) {
				//echo "chk";

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	// 최근 일주일 판매금액 통계 가져오기
	function getAdviceList($dbh) {
		try {
			$sql = " SELECT a.advice_idx, a.request_type, a.advice_user_name, a.create_date, IF (ISNULL(a.advice_amdin_memo) OR a.advice_amdin_memo='', FALSE, TRUE) AS request_status, b.goods_name
						FROM advice a INNER JOIN goods b ON a.goods_idx = b.goods_idx
						ORDER BY advice_idx DESC LIMIT 0, 3";
			$stmt = $dbh->prepare($sql);
			if ($stmt->execute()) {
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


}
?>