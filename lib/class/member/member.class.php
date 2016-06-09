<?php
class Member
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value) {
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key) {
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

	function insert($dbh) {
		try {
			$user_level_code = $this->getAddslashes('user_level_code');
			$user_id = $this->getAddslashes('user_id');
			$user_pwd = hash('sha256', $this->getAddslashes('user_pwd'));
			$user_name = $this->getAddslashes('user_name');
			$newsletter_status = $this->getAddslashes('newsletter_status');
			$sms_status = $this->getAddslashes('sms_status');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			
			$ajax = $this->getAddslashes('ajax'); // 호출한 페이지가 ajax 면 에러 발생시 에러코드를 리턴
			$sns = $this->getAddslashes('sns');
			$sns_id = $this->getAddslashes('sns_id');

			$bTransaction = false;
			$dbh->beginTransaction();
			$stmt = $dbh->prepare('SELECT count(user_idx) FROM member where user_id = :user_id AND del_state=\'N\' ');
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();

			if ($cnt > 0) {
				if (empty($ajax)){
					throw new Exception('이미 가입된 아이디 입니다.');
				}else{
					return 91 ; //가입된 아이디 ERR CODE
					exit;
				}
			}

			if ($newsletter_status == 'Y') self::setNewsletter_insert_exec($dbh,$user_id); //이메일 등록


			if (empty($sns)){
				$sql = 'INSERT INTO member (user_level_code, user_id, user_pwd, user_name, ip_addr	) VALUES
							( :user_level_code, :user_id, :user_pwd, :user_name,  :ip_addr)';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_level_code', $user_level_code, PDO::PARAM_INT);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64);
				$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR, 50);
				//$stmt->bindParam(':sms_status', $sms_status, PDO::PARAM_INT);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);

			}else{ //SNS facebook, google 로 회원가입 시 처리
				
				$sql = 'INSERT INTO member (user_level_code, user_id, ip_addr, sns_join, sns_id	) VALUES
							( :user_level_code, :user_id,  :ip_addr, :sns_join, :sns_id )';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_level_code', $user_level_code, PDO::PARAM_INT);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
				$stmt->bindParam(':sns_join', $sns, PDO::PARAM_INT);
				$stmt->bindParam(':sns_id', $sns_id, PDO::PARAM_STR, 60);
			}

			if ($stmt->execute()) {
				$bTransaction = true;
//				if ($newsletter_status == 'Y') self::setNewsletter_insert($dbh,$user_id); //이메일 등록
			}
			else {
				if (!empty($ajax)){
					throw new Exception('error');
				}else{
					return 99 ; //ERR CODE
					exit;
				}
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}

	function update($dbh) {
		try {
			//echo '업데이트';
			$user_level_code = $this->getAddslashes('user_level_code');
			//$user_name = $this->getAddslashes('user_name');
			$newsletter_status = $this->getAddslashes('newsletter_status');
			$sms_status = $this->getAddslashes('sms_status');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$user_idx = $this->getAddslashes('user_idx');
			$user_id = $this->getAddslashes('user_id');

		
			$stmt = $dbh->prepare('SELECT count(user_idx) FROM member where user_idx != :user_idx AND user_id = :user_id AND del_state=\'N\' ');
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();

			if ($cnt > 0) {
				throw new Exception('이미 가입된 아이디 입니다.');
			}


			if (empty( trim($this->getAddslashes('user_pwd') ) ) ){  //비밀번호를 수정하지 않을 경우
				$user_pwd = NULL; 
				$sql_pwd = NULL;
			}else{  // //비밀번호를 수정할 경우
				$user_pwd = hash('sha256', trim($this->getAddslashes('user_pwd')) );  
				$sql_pwd = ' user_pwd = :user_pwd , '; //패스워드 수정 쿼리 작성
			} 

			//echo("newsletter_status : $newsletter_status <br>");
			if($newsletter_status=='Y'){
				if (!self::getNewletterStatus($dbh,$user_id) ){
					//echo('newsletter_status<br>');
					self::setNewsletter_insert($dbh,$user_id);
				}
			}else{

				$result_newletter = self::setNewsletter_delete($dbh,$user_id);
			}
			
			$modify_date = date('Y-m-d H:i:s', time());

			
			
			//$sql = 'UPDATE member SET user_level_code = :user_level_code, '.$sql_pwd.' user_name = :user_name, ip_addr = :ip_addr , newsletter_status = :newsletter_status, sms_status = :sms_status WHERE user_idx = :user_idx';
			$sql = 'UPDATE member SET  '.$sql_pwd.' ip_addr = :ip_addr , sms_status = :sms_status, modify_date = :modify_date WHERE user_idx = :user_idx';
			
			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			//$stmt->bindParam(':user_level_code', $user_level_code, PDO::PARAM_INT);
			if (!empty($user_pwd)){ 
				$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64) ; 
			}
			//$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
			$stmt->bindParam(':sms_status', $sms_status, PDO::PARAM_INT);
			$stmt->bindParam(':modify_date', $modify_date);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$dbh->commit();
				$bTransaction = true;
			}
			else {
				$dbh->rollback();
				$bTransaction = false;
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

			
	function delete($dbh) {
		try {
			$user_idx = $this->getAddslashes('user_idx');
			$modify_date = date('Y-m-d H:i:s', time());

			$bTransaction = false;
			$dbh->beginTransaction();

			//거래내역이 없으면 삭제
			//거래내역이 있으면 del 필드에 N 처리

			//해당 회원의 거래내역을 참조한다.
			$del_state = 'N';
			$sql = 'SELECT count(*) FROM orders WHERE user_idx = :user_idx AND del_state = :del_state ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 30);
			$stmt->execute();
			$cnt = (int)$stmt->fetchColumn();
			
			if ($cnt > 0) { //거래 내역이 있는 회원은 del_state 에 Y 처리
				$del_state = 'Y';
				$sql = 'UPDATE member SET del_state = :del_state , modify_date=:modify_date WHERE user_idx = :user_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 30);
				$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR, 30);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
				$bTransaction = $stmt->execute();

			}else{ //거래내역이 없는 회원은 삭제 처리
				$sql = 'DELETE FROM member WHERE user_idx = :user_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
				$bTransaction = $stmt->execute();
			}

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
			//return true;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$userIdx = $this->getAddslashes('user_idx');
			$modify_date = date('Y-m-d H:i:s', time());

			$bTransaction = false;
			$dbh->beginTransaction();

			//거래내역이 없으면 삭제
			//거래내역이 있으면 del 필드에 N 처리

			
/*
			$sql = 'DELETE FROM member WHERE user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
*/
			foreach($userIdx as $user_idx) {
				$bTransaction = true;

				//$stmt->execute();
				//해당 회원의 거래내역을 참조한다.
				$del_state = 'N';
				$sql = 'SELECT count(*) FROM orders WHERE user_idx = :user_idx AND del_state = :del_state ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 30);
				$stmt->execute();
				$cnt = (int)$stmt->fetchColumn();

				if ($cnt > 0) { //거래 내역이 있는 회원은 del_state 에 Y 처리
					$del_state = 'Y';
					$sql = 'UPDATE member SET del_state = :del_state , modify_date=:modify_date WHERE user_idx = :user_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 30);
					$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR, 30);
					$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
					$stmt->execute();

				}else{ //거래내역이 없는 회원은 삭제 처리
					$sql = 'DELETE FROM member WHERE user_idx = :user_idx';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
					$stmt->execute();
				}


			}

			if ($bTransaction) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				return false;
			}
		}
		catch(PDOExecption $e) {
			if (isset($dbh)) {
				$dbh->rollback();
				print 'Error!: ' . $e->getMessage() . '</br>';
			}
			return false;
		}
	}

	

	function getList($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$sort = $this->getAddslashes('sort');
			$od = $this->getAddslashes('od');
			$search_type = $this->getAddslashes('search_type');
			$word = $this->getAddslashes('word');
			$bdate = $this->getAddslashes('bdate');
			$edate = $this->getAddslashes('edate');
			$orders = $this->getAddslashes('orders');
			$newsletter = $this->getAddslashes('newsletter');
			//$ulevel = $this->getAddslashes('ulevel');

			if ($word === '' ){ $word = NULL ; } 
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate == '' ){ $edate = NULL ; } else { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($ulevel === '' ){ $ulevel = NULL ; } 
			if($sz === '' ){ $sz = NULL ; } 
			if($oders === '' ){ $oders = NULL ; } 
			if($newsletter === '' ){ $newsletter = NULL ; } 
			echo $orders;

			//echo(" CALL up_member_list (  $page, $sz, $sort, $od, $word, $bdate, $edate ) <br>");
			$sql = 'CALL up_member_list ( :page, :sz, :sort, :od, :word, :bdate, :edate, :orders, :newsletter)';
			$stmt = $dbh->prepare($sql);
			
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':bdate', $bdate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':orders', $orders,						PDO::PARAM_INT);
			$stmt->bindParam(':newsletter', $newsletter,						PDO::PARAM_INT);
			//$stmt->bindParam(':ulevel', $ulevel,						PDO::PARAM_INT);
			
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();
			//echo 'total_cnt :'.$total_cnt.'<br>';

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt, $total_all_cnt );
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
			

	function getRead($dbh) {
		try {
			$user_idx = $this->getAddslashes('user_idx');
			//echo 'user_idx:'.$user_idx;
			$sql = 'select user_idx, user_level_code,user_level_name, user_id, user_name, sns_join from view_member where user_idx = :user_idx ' ;

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);

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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
	
	//회원여부를 확인
	function getMemberSearch($dbh){ 
		try {
			$user_id = $this->getAddslashes('user_id');
			
			$bTransaction = false;
			//$dbh->beginTransaction();
			$stmt = $dbh->prepare('SELECT user_idx, user_id,sns_join FROM member where user_id = :user_id AND del_state=\'N\' ');
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR, 60);
			$stmt->execute();
			
			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}
				return true;
			}else {
				return false;
			}

		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	//비밀번호 찾기 시 회원 비밀번호 재 설정
	function update_pw($dbh) {
		try {
			//echo '비밀번호 재설정';
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$user_idx = $this->getAddslashes('user_idx');
			$modify_date = date('Y-m-d H:i:s', time());

			$user_pwd = hash('sha256', trim($this->getAddslashes('user_pwd')) );  

			$sql = 'UPDATE member SET  user_pwd = :user_pwd, ip_addr = :ip_addr , modify_date = :modify_date WHERE user_idx = :user_idx';
			
			$bTransaction = false;
			$dbh->beginTransaction();

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_pwd', $user_pwd, PDO::PARAM_STR, 64) ; 
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
			$stmt->bindParam(':modify_date', $modify_date);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$dbh->commit();
				$bTransaction = true;
			}
			else {
				$dbh->rollback();
				$bTransaction = false;
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
			
	//회원권한 select  box 용 S
	//by 2014-11-27 이용태
	function getListMemberLevel($dbh) {
		try {
			$sql = 'select user_level_code, user_level_name from member_level ';
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return array($list);

			$dbh = null;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}
	//회원권한 select  box 용 E

	//뉴스레터
	function newsletterDeletes($dbh) {
		try {
			$aNewsletter_idx = $this->getAddslashes('newsletter_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM newsletter WHERE newsletter_idx = :newsletter_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':newsletter_idx', $newsletter_idx, PDO::PARAM_INT);

			foreach($aNewsletter_idx as $newsletter_idx) {
				$bTransaction = true;

				$stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				return false;
			}
		}
		catch(PDOExecption $e) {
			if (isset($dbh)) {
				$dbh->rollback();
				print 'Error!: ' . $e->getMessage() . '</br>';
			}
			return false;
		}
	}

	function getNewsletterList($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$sort = $this->getAddslashes('sort');
			$od = $this->getAddslashes('od');
			$word = $this->getAddslashes('word');
			$bdate = $this->getAddslashes('bdate');
			$edate = $this->getAddslashes('edate');

			if ($word === '' ){ $word = NULL ; } 
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate == '' ){ $edate = NULL ; } else { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($sz === '' ){ $sz = NULL ; } 

			//echo(" CALL up_newsletter_list (  $page, $sz, $sort, $od, $word, $bdate, $edate ) <br>");
			$sql = 'CALL up_newsletter_list ( :page, :sz, :sort, :od, :word, :bdate, :edate)';
			$stmt = $dbh->prepare($sql);
			
			$stmt->bindParam(':page', $page,							PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,									PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort,								PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':bdate', $bdate,							PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate,							PDO::PARAM_STR, 20);
			
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt, $total_all_cnt );
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	//뉴스레터 등록여부. 등록되어 있으면 return TRUE
	public static function getNewletterStatus($dbh,$email){
		try {
			$newsletter_email =  trim($email);
			//echo ('newsletter_email :'.$newsletter_email .'<br>');
			$sql = 'SELECT count(*) AS count1 FROM newsletter WHERE newsletter_email = :newsletter_email ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);
			$stmt->execute();

			if ((int)$stmt->fetchColumn() > 0) {
				return TRUE; //등록된 이메일이 있으면
			}else{
				return FALSE; //등록된 이메일이 없으면
			}
		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}

	public static function setNewsletter_insert_exec($dbh,$email) {
		try {
			$newsletter_email = trim($email);
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$bTransaction = false;

			if( !self::getNewletterStatus($dbh,$newsletter_email) ){
				$sql = 'INSERT INTO newsletter (newsletter_email, ip_addr) VALUES
						( :newsletter_email, :ip_addr )';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
				}else {
					throw new Exception('error');
				}

				return $bTransaction;
			}else{
			//	unset($dbh);
				//JS::HistoryBack('이미 등록된 이메일 입니다.\r\n관리자에게 문의하여 주세요.');
			//	exit();
			}
		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}

	public static function setNewsletter_insert($dbh,$email) {
		try {
			//echo(' setNewsletter_insert  : '. $email.'<br>'); exit;
			$newsletter_email = trim($email);
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$bTransaction = false;
			$dbh->beginTransaction();
/*
			if( !self::getNewletterStatus($dbh,$newsletter_email) ){
				$sql = 'INSERT INTO newsletter (newsletter_email, ip_addr) VALUES
						( :newsletter_email, :ip_addr )';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
				}else {
					throw new Exception('error');
				}
			}else{
			//	unset($dbh);
				//JS::HistoryBack('이미 등록된 이메일 입니다.\r\n관리자에게 문의하여 주세요.');
			//	exit();
			}
*/
			$bTransaction = self::setNewsletter_insert_exec($dbh,$email);

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}

	function setNewsletter_update($dbh) {
		try {
			$newsletter_idx = $this->getAddslashes('newsletter_idx');
			$newsletter_email =  trim($this->getAddslashes('newsletter_email'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$bTransaction = false;
			$dbh->beginTransaction();

			if( !self::getNewletterStatus($dbh,$newsletter_email) ){
				$sql = 'UPDATE newsletter SET newsletter_email = :newsletter_email , ip_addr= :ip_addr WHERE newsletter_idx = :newsletter_idx ' ;
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);
				$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
				$stmt->bindParam(':newsletter_idx', $newsletter_idx, PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
				}else {
					throw new Exception('error');
				}
			}else{
			//	unset($dbh);
				//JS::HistoryBack('이미 등록된 이메일 입니다.\r\n관리자에게 문의하여 주세요.');
			//	exit();
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(Exception $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
			JS::HistoryBack($e->getMessage());
		}
	}


	public static function setNewsletter_delete($dbh,$email) {
		try {
			$newsletter_email =  trim($email);
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM newsletter WHERE newsletter_email = :newsletter_email';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':newsletter_email', $newsletter_email, PDO::PARAM_STR, 60);
			$bTransaction = $stmt->execute();

			if ($bTransaction) {
				//echo 'chk1';
				$dbh->commit();
			}
			else {
				//echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
			//return true;
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

}
?>