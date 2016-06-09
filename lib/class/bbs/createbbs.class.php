<?php
class CreateBbs
{
	var $attr;

	function __construct(){
		$this->attr = array();
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


	function insert($dbh) {
		try {
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_name = $this->getAddslashes('bbs_name');
			$bbs_skin = $this->getAddslashes('bbs_skin');
			$bbs_category = $this->getAddslashes('bbs_category');
			$list_level = $this->getAddslashes('list_level');
			$read_level = $this->getAddslashes('read_level');
			$write_level = $this->getAddslashes('write_level');
			$reply_level = $this->getAddslashes('reply_level');
			$comment_level = $this->getAddslashes('comment_level');
			$alert_msg = $this->getAddslashes('alert_msg');
			$title_length = $this->getAddslashes('title_length');
			$new_time = $this->getAddslashes('new_time');
			$hit_cnt = $this->getAddslashes('hit_cnt');
			$img_size_width = $this->getAddslashes('img_size_width');
			$img_size_height = $this->getAddslashes('img_size_height');
			$img_size_type = ($this->getAddslashes('img_size_type')) ? $this->getAddslashes('img_size_type') : 0 ;
			$list_size = $this->getAddslashes('list_size');
			$block_size = $this->getAddslashes('block_size');
			$upload_size = $this->getAddslashes('upload_size');
			$comment_state = ($this->getAddslashes('comment_state')) ? $this->getAddslashes('comment_state') : 0;
			$secret_state = ($this->getAddslashes('secret_state')) ? $this->getAddslashes('secret_state') : 0;
			$read_list_state = ($this->getAddslashes('read_list_state')) ? $this->getAddslashes('read_list_state') : 0;
			$notice_state = ($this->getAddslashes('notice_state')) ? $this->getAddslashes('notice_state') : 0;
			$reply_state = ($this->getAddslashes('reply_state')) ? $this->getAddslashes('reply_state') : 0;
			$write_sms_state = ($this->getAddslashes('write_sms_state')) ? $this->getAddslashes('write_sms_state') : 0;
			$reply_sms_state = ($this->getAddslashes('reply_sms_state')) ? $this->getAddslashes('reply_sms_state') : 0;
			$sms_charger = $this->getAddslashes('sms_charger');
			$sms_nbr = $this->getAddslashes('sms_nbr');
			$write_email = $this->getAddslashes('write_email');
			$reply_email = $this->getAddslashes('reply_email');
			$email_charger = $this->getAddslashes('email_charger');
			$email = $this->getAddslashes('email');
			$nomember_agree = ($this->getAddslashes('nomember_agree')) ? $this->getAddslashes('nomember_agree') : 0;
			$prohibition_word = ($this->getAddslashes('prohibition_word')) ? $this->getAddslashes('prohibition_word') : 0;
			$spam_state = ($this->getAddslashes('spam_state')) ? $this->getAddslashes('spam_state') : 0;
			$del_state = 0;

			$sql = 'INSERT INTO bbs_setting (bbs_code, bbs_name, bbs_skin, bbs_category, list_level, read_level, write_level, reply_level, comment_level, alert_msg, title_length, new_time, hit_cnt, img_size_width, img_size_height, img_size_type, list_size, block_size, upload_size, comment_state, secret_state, read_list_state, notice_state, reply_state, write_sms_state, reply_sms_state, sms_charger, sms_nbr, write_email, reply_email, email_charger, email, nomember_agree, prohibition_word, spam_state, del_state) VALUES(:bbs_code, :bbs_name, :bbs_skin, :bbs_category, :list_level, :read_level, :write_level, :reply_level, :comment_level, :alert_msg, :title_length, :new_time, :hit_cnt, :img_size_width, :img_size_height, :img_size_type, :list_size, :block_size, :upload_size, :comment_state, :secret_state, :read_list_state, :notice_state, :reply_state, :write_sms_state, :reply_sms_state, :sms_charger, :sms_nbr, :write_email, :reply_email, :email_charger, :email, :nomember_agree, :prohibition_word, :spam_state, :del_state)';

			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_name', $bbs_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':bbs_skin', $bbs_skin, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_STR, 255);
			$stmt->bindParam(':list_level', $list_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':read_level', $read_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':write_level', $write_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':reply_level', $reply_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':comment_level', $comment_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':alert_msg', $alert_msg, PDO::PARAM_STR, 100);
			$stmt->bindParam(':title_length', $title_length, PDO::PARAM_INT);
			$stmt->bindParam(':new_time', $new_time, PDO::PARAM_INT);
			$stmt->bindParam(':hit_cnt', $hit_cnt, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_width', $img_size_width, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_height', $img_size_height, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_type', $img_size_type, PDO::PARAM_BOOL);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->bindParam(':block_size', $block_size, PDO::PARAM_INT);
			$stmt->bindParam(':upload_size', $upload_size, PDO::PARAM_INT);
			$stmt->bindParam(':comment_state', $comment_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':secret_state', $secret_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':read_list_state', $read_list_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':notice_state', $notice_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_state', $reply_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':write_sms_state', $write_sms_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_sms_state', $reply_sms_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':sms_charger', $sms_charger, PDO::PARAM_STR, 50);
			$stmt->bindParam(':sms_nbr', $sms_nbr, PDO::PARAM_STR, 15);
			$stmt->bindParam(':write_email', $write_email, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_email', $reply_email, PDO::PARAM_BOOL);
			$stmt->bindParam(':email_charger', $email_charger, PDO::PARAM_STR, 50);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':nomember_agree', $nomember_agree, PDO::PARAM_BOOL);
			$stmt->bindParam(':prohibition_word', $prohibition_word, PDO::PARAM_BOOL);
			$stmt->bindParam(':spam_state', $spam_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_BOOL);

			if ($stmt->execute()) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				//throw new Exception('error');
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function update($dbh)
	{
		try {
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_name = $this->getAddslashes('bbs_name');
			$bbs_skin = $this->getAddslashes('bbs_skin');
			$bbs_category = $this->getAddslashes('bbs_category');
			$list_level = $this->getAddslashes('list_level');
			$read_level = $this->getAddslashes('read_level');
			$write_level = $this->getAddslashes('write_level');
			$reply_level = $this->getAddslashes('reply_level');
			$comment_level = $this->getAddslashes('comment_level');
			$alert_msg = $this->getAddslashes('alert_msg');
			$title_length = $this->getAddslashes('title_length');
			$new_time = $this->getAddslashes('new_time');
			$hit_cnt = $this->getAddslashes('hit_cnt');
			$img_size_width = $this->getAddslashes('img_size_width');
			$img_size_height = $this->getAddslashes('img_size_height');
			$img_size_type = ($this->getAddslashes('img_size_type')) ? $this->getAddslashes('img_size_type') : 0 ;
			$list_size = $this->getAddslashes('list_size');
			$block_size = $this->getAddslashes('block_size');
			$upload_size = $this->getAddslashes('upload_size');
			$comment_state = ($this->getAddslashes('comment_state')) ? $this->getAddslashes('comment_state') : 0;
			$secret_state = ($this->getAddslashes('secret_state')) ? $this->getAddslashes('secret_state') : 0;
			$read_list_state = ($this->getAddslashes('read_list_state')) ? $this->getAddslashes('read_list_state') : 0;
			$notice_state = ($this->getAddslashes('notice_state')) ? $this->getAddslashes('notice_state') : 0;
			$reply_state = ($this->getAddslashes('reply_state')) ? $this->getAddslashes('reply_state') : 0;
			$write_sms_state = ($this->getAddslashes('write_sms_state')) ? $this->getAddslashes('write_sms_state') : 0;
			$reply_sms_state = ($this->getAddslashes('reply_sms_state')) ? $this->getAddslashes('reply_sms_state') : 0;
			$sms_charger = $this->getAddslashes('sms_charger');
			$sms_nbr = $this->getAddslashes('sms_nbr');
			$write_email = $this->getAddslashes('write_email');
			$reply_email = $this->getAddslashes('reply_email');
			$email_charger = $this->getAddslashes('email_charger');
			$email = $this->getAddslashes('email');
			$nomember_agree = ($this->getAddslashes('nomember_agree')) ? $this->getAddslashes('nomember_agree') : 0;
			$prohibition_word = ($this->getAddslashes('prohibition_word')) ? $this->getAddslashes('prohibition_word') : 0;
			$spam_state = ($this->getAddslashes('spam_state')) ? $this->getAddslashes('spam_state') : 0;

			$sql = 'UPDATE bbs_setting SET bbs_code = :bbs_code, bbs_name = :bbs_name, bbs_skin = :bbs_skin, bbs_category = :bbs_category, list_level = :list_level, read_level = :read_level, write_level = :write_level, reply_level = :reply_level, comment_level = :comment_level, alert_msg = :alert_msg, title_length = :title_length, new_time = :new_time, hit_cnt = :hit_cnt, img_size_width = :img_size_width, img_size_height = :img_size_height, img_size_type = :img_size_type, list_size = :list_size, block_size = :block_size, upload_size = :upload_size, comment_state = :comment_state, secret_state = :secret_state, read_list_state = :read_list_state, notice_state = :notice_state, reply_state = :reply_state, write_sms_state = :write_sms_state, reply_sms_state = :reply_sms_state, sms_charger = :sms_charger, sms_nbr = :sms_nbr, write_email = :write_email, reply_email = :reply_email, email_charger = :email_charger, email = :email, nomember_agree = :nomember_agree, prohibition_word = :prohibition_word, spam_state = :spam_state  WHERE bbs_code = :bbs_code';

			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_name', $bbs_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':bbs_skin', $bbs_skin, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_STR, 255);
			$stmt->bindParam(':list_level', $list_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':read_level', $read_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':write_level', $write_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':reply_level', $reply_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':comment_level', $comment_level, PDO::PARAM_STR, 300);
			$stmt->bindParam(':alert_msg', $alert_msg, PDO::PARAM_STR, 100);
			$stmt->bindParam(':title_length', $title_length, PDO::PARAM_INT);
			$stmt->bindParam(':new_time', $new_time, PDO::PARAM_INT);
			$stmt->bindParam(':hit_cnt', $hit_cnt, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_width', $img_size_width, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_height', $img_size_height, PDO::PARAM_INT);
			$stmt->bindParam(':img_size_type', $img_size_type, PDO::PARAM_BOOL);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->bindParam(':block_size', $block_size, PDO::PARAM_INT);
			$stmt->bindParam(':upload_size', $upload_size, PDO::PARAM_INT);
			$stmt->bindParam(':comment_state', $comment_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':secret_state', $secret_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':read_list_state', $read_list_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':notice_state', $notice_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_state', $reply_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':write_sms_state', $write_sms_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_sms_state', $reply_sms_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':sms_charger', $sms_charger, PDO::PARAM_STR, 50);
			$stmt->bindParam(':sms_nbr', $sms_nbr, PDO::PARAM_STR, 15);
			$stmt->bindParam(':write_email', $write_email, PDO::PARAM_BOOL);
			$stmt->bindParam(':reply_email', $reply_email, PDO::PARAM_BOOL);
			$stmt->bindParam(':email_charger', $email_charger, PDO::PARAM_STR, 50);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':nomember_agree', $nomember_agree, PDO::PARAM_BOOL);
			$stmt->bindParam(':prohibition_word', $prohibition_word, PDO::PARAM_BOOL);
			$stmt->bindParam(':spam_state', $spam_state, PDO::PARAM_BOOL);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_BOOL);

			if ($stmt->execute()) {
				$dbh->commit();
				return true;
			}
			else {
				$dbh->rollback();
				//throw new Exception('error');
			}
		}
		catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function delete($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();
			$bbs_code = $this->getAddslashes('bbs_code');

			if ($bTransaction = self::bbsAttachFileDelete($dbh, $bbs_code)) {
				$sql = 'DELETE FROM bbs_upfile WHERE bbs_code = :bbs_code';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

				$sql = 'DELETE FROM bbs WHERE bbs_code = :bbs_code';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}

				$sql = 'DELETE FROM bbs_setting WHERE bbs_code = :bbs_code';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

				if ($stmt->execute()) {
					$bTransaction = true;
				}
				else {
					$bTransaction = false;
				}
			}

			if ($bTransaction) {
				echo 'chk1';
				$dbh->commit();
			}
			else {
				echo 'chk2';
				$dbh->rollback();
			}

			return $bTransaction;
			//return true;
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function deletes($dbh) {
		try {
			$aryBbsIdx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');
			$sql = 'DELETE FROM bbs WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
			$dbh->beginTransaction();
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

			foreach($aryBbsIdx as $bbs_idx) {
				$stmt->execute();
			}

			if ($stmt->execute()) {
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
			$bbs_code = $this->getAddslashes('bbs_code');
			$page = $this->getAddslashes('page');
			$list_size = $this->getAddslashes('list_size');
			$search_type = $this->getAddslashes('search_type');
			$word = $this->getAddslashes('word');
			$category = $this->getAddslashes('category');

			$sql = 'select * from bbs_setting';
			$stmt = $dbh->prepare($sql);
			/*
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->bindParam(':search_type', $search_type, PDO::PARAM_INT);
			$stmt->bindParam(':word', $word, PDO::PARAM_STR, 20);
			$stmt->bindParam(':category', $category, PDO::PARAM_INT);
			*/
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);


			$stmt = $dbh->prepare('select count(bbs_code) from bbs_setting');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function getRead($dbh) {
		try {
			$bbs_code = $this->getAddslashes('bbs_code');
			echo $bbs_code;
			$sql = 'select * from bbs_setting where bbs_code = :bbs_code';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

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
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	function getEdit($dbh, $bbs_idx, $bbs_code) {
		try {
			$sql = 'select * from bbs where bbs_idx = :bbs_idx and bbs_code = :bbs_code ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
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

			//print_r ($row);
			//$dbh = null;
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 게시판의 모든 첨부파일 정보 가져오기
	function getBbsFileInfo($dbh) {
		try {
			$bbs_code = $this->getAddslashes('bbs_code');
			$sql = 'SELECT up_file_name FROM bbs_upfile WHERE bbs_code = :bbs_code';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}

			$dbh = null;
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	// 데이터 및 물리적 파일 삭제
	function bbsAttachFileDelete($dbh, $bbs_code) {
		try {
			$bTransaction = true;
			$aryFileInfo = self::getBbsFileInfo($dbh);
			$LIB_FILE = new LIB_FILE();
			$sql = 'delete from bbs_upfile where bbs_code = :bbs_code';

			foreach($aryFileInfo as $value) {
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

				if ($stmt->execute()) {

				}
				else {
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				foreach($aryFileInfo as $value) {
					$LIB_FILE->DeleteFile(ROOT.bbsUploadPath.$value['up_file_name']);
				}
			}

			return $bTransaction;
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


}
?>