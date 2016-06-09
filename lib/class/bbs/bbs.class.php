<?php
class Bbs
{
	var $attr;

	function __construct() {
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
			$bTransaction = false;
			$dbh->beginTransaction();
			$stmt = $dbh->prepare('SELECT ifnull(max(bbs_group), 0) + 1 as groups FROM bbs');
			$stmt->execute();
			$bbs_group = $stmt->fetchColumn();
			$bbs_depth = 1;
			$bbs_order = 1;
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_category = ($this->getAddslashes('bbs_category') == null) ? null : $this->getAddslashes('bbs_category');
			$user_idx = $this->getAddslashes('user_idx');
			$origin_user_idx = $this->getAddslashes('origin_user_idx');
			$bbs_author = $this->getAddslashes('bbs_author');
			$bbs_title = $this->getAddslashes('bbs_title');
			$bbs_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('bbs_content')));
			$bbs_item = $this->getAddslashes('bbs_item');
			$bbs_pwd = hash('sha256', $this->getAddslashes('bbs_pwd'));
			$bbs_hit = 0;
			$bbs_list_img = ($this->getAddslashes('bbs_list_img') == null) ? null : $this->getAddslashes('bbs_list_img');
			$bbs_state = $this->getAddslashes('bbs_state');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$comment_cnt = 0;
			$notice = $this->getAddslashes('notice');
			$secret = $this->getAddslashes('secret');
			$begin_date = ($this->getAddslashes('begin_date') == null) ? null : $this->getAddslashes('begin_date');
			$end_date = ($this->getAddslashes('end_date') == null) ? null : $this->getAddslashes('end_date');
			$winning_date = ($this->getAddslashes('winning_date') == null) ? null : $this->getAddslashes('winning_date');
			$reg_date = date('Y-m-d H:i:s', time());

			$sql = 'INSERT INTO bbs (bbs_code,
								bbs_group,
								bbs_depth,
								bbs_order,
								bbs_category,
								user_idx,
								origin_user_idx,
								bbs_author,
								bbs_title,
								bbs_content,
								bbs_item,
								bbs_pwd,
								bbs_hit,
								bbs_list_img,
								bbs_state,
								ip_addr,
								comment_cnt,
								notice,
								secret,
								begin_date,
								end_date,
								winning_date,
								reg_date) VALUES(
								:bbs_code,
								:bbs_group,
								:bbs_depth,
								:bbs_order,
								:bbs_category,
								:user_idx,
								:origin_user_idx,
								:bbs_author,
								:bbs_title,
								:bbs_content,
								:bbs_item,
								:bbs_pwd,
								:bbs_hit,
								:bbs_list_img,
								:bbs_state,
								:ip_addr,
								:comment_cnt,
								:notice,
								:secret,
								:begin_date,
								:end_date,
								:winning_date,
								:reg_date)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_group', $bbs_group, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_depth', $bbs_depth, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_order', $bbs_order, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':origin_user_idx', $origin_user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_author', $bbs_author, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_title', $bbs_title, PDO::PARAM_STR, 200);
			$stmt->bindParam(':bbs_content', $bbs_content, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_item', $bbs_item);
			$stmt->bindParam(':bbs_pwd', $bbs_pwd, PDO::PARAM_STR, 64);
			$stmt->bindParam(':bbs_hit', $bbs_hit, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_list_img', $bbs_list_img, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_state', $bbs_state);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
			$stmt->bindParam(':comment_cnt', $comment_cnt, PDO::PARAM_INT);
			$stmt->bindParam(':notice', $notice, PDO::PARAM_BOOL);
			$stmt->bindParam(':secret', $secret, PDO::PARAM_BOOL);
			$stmt->bindParam(':begin_date', $begin_date);
			$stmt->bindParam(':end_date', $end_date);
			$stmt->bindParam(':winning_date', $winning_date);
			$stmt->bindParam(':reg_date', $reg_date);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
			}

			$bbs_idx = $dbh->lastInsertId();

			if ($bbs_idx) {
				$bTransaction = Bbs::setAttachFile($dbh, $bbs_idx, $bbs_code);
			}
			else {
				$bTransaction = false;
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

			/*
			if ($stmt->execute() && $dbh->lastInsertId() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
			*/
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();


			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_category = ($this->getAddslashes('bbs_category') == null) ? null : $this->getAddslashes('bbs_category');
			$user_idx = $this->getAddslashes('user_idx');
			$bbs_author = $this->getAddslashes('bbs_author');
			$bbs_title = $this->getAddslashes('bbs_title');
			$bbs_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('bbs_content')));
			$bbs_item = $this->getAddslashes('bbs_item');
			$bbs_list_img = ($this->getAddslashes('bbs_list_img') == null) ? null : $this->getAddslashes('bbs_list_img');
			$bbs_state = $this->getAddslashes('bbs_state');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$notice = $this->getAddslashes('notice');
			$secret = $this->getAddslashes('secret');
			$begin_date = ($this->getAddslashes('begin_date') == null) ? null : $this->getAddslashes('begin_date');
			$end_date = ($this->getAddslashes('end_date') == null) ? null : $this->getAddslashes('end_date');
			$winning_date = ($this->getAddslashes('winning_date') == null) ? null : $this->getAddslashes('winning_date');
			$up_date = date('Y-m-d H:i:s', time());

			$sql = 'UPDATE bbs SET
							bbs_code = :bbs_code,
							bbs_category = :bbs_category,
							user_idx = :user_idx,
							bbs_author = :bbs_author,
							bbs_title = :bbs_title,
							bbs_content = :bbs_content,
							bbs_item = :bbs_item,
							bbs_list_img = :bbs_list_img,
							bbs_state = :bbs_state,
							ip_addr = :ip_addr,
							notice = :notice,
							secret = :secret,
							begin_date = :begin_date,
							end_date = :end_date,
							winning_date = :winning_date,
							up_date = :up_date
						WHERE bbs_idx = :bbs_idx';


			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_author', $bbs_author, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_title', $bbs_title, PDO::PARAM_STR, 200);
			$stmt->bindParam(':bbs_content', $bbs_content, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_item', $bbs_item);
			$stmt->bindParam(':bbs_list_img', $bbs_list_img, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_state', $bbs_state);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
			$stmt->bindParam(':notice', $notice, PDO::PARAM_BOOL);
			$stmt->bindParam(':secret', $secret, PDO::PARAM_BOOL);
			$stmt->bindParam(':begin_date', $begin_date);
			$stmt->bindParam(':end_date', $end_date);
			$stmt->bindParam(':winning_date', $winning_date);
			$stmt->bindParam(':up_date', $up_date);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->execute();

			$bTransaction = Bbs::setAttachFile($dbh, $bbs_idx, $bbs_code);

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}


	function reply($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_category = ($this->getAddslashes('bbs_category') == null) ? null : $this->getAddslashes('bbs_category');
			$user_idx = $this->getAddslashes('user_idx');
			//$origin_user_idx = $this->getAddslashes('origin_user_idx');
			$bbs_author = $this->getAddslashes('bbs_author');
			$bbs_title = $this->getAddslashes('bbs_title');
			$bbs_content = htmlspecialchars($this->getAddslashes('bbs_content'));
			$bbs_item = $this->getAddslashes('bbs_item');
			$bbs_pwd = hash('sha256', $this->getAddslashes('bbs_pwd'));
			$bbs_hit = 0;
			$bbs_list_img = ($this->getAddslashes('bbs_list_img') == null) ? null : $this->getAddslashes('bbs_list_img');
			$bbs_state = $this->getAddslashes('bbs_state');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$comment_cnt = 0;
			$notice = $this->getAddslashes('notice');
			$secret = $this->getAddslashes('secret');
			$begin_date = ($this->getAddslashes('begin_date') == null) ? null : $this->getAddslashes('begin_date');
			$end_date = ($this->getAddslashes('end_date') == null) ? null : $this->getAddslashes('end_date');
			$winning_date = ($this->getAddslashes('winning_date') == null) ? null : $this->getAddslashes('winning_date');
			$reg_date = date('Y-m-d H:i:s', time());

			$sql='SELECT origin_user_idx, bbs_group, bbs_depth + 1 as bbs_depth, bbs_order + 1 as bbs_order, user_idx FROM bbs WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//echo 'rcode'.$row['bbs_code'];
			//echo 'rgroup'.$row['bbs_group'];
			//echo 'rorder'.$row['bbs_order'];


			$sql ='UPDATE bbs SET bbs_order = bbs_order + 1 WHERE bbs_code = :bbs_code and bbs_group = :bbs_group and bbs_order >= :bbs_order';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_group', $row['bbs_group'], PDO::PARAM_INT);
			$stmt->bindParam(':bbs_order', $row['bbs_order'], PDO::PARAM_INT);
			$stmt->execute();

			$sql = 'INSERT INTO bbs (bbs_code,
								bbs_group,
								bbs_depth,
								bbs_order,
								bbs_category,
								user_idx,
								origin_user_idx,
								bbs_author,
								bbs_title,
								bbs_content,
								bbs_item,
								bbs_pwd,
								bbs_hit,
								bbs_list_img,
								bbs_state,
								ip_addr,
								comment_cnt,
								notice,
								secret,
								begin_date,
								end_date,
								winning_date,
								reg_date) VALUES(
								:bbs_code,
								:bbs_group,
								:bbs_depth,
								:bbs_order,
								:bbs_category,
								:user_idx,
								:origin_user_idx,
								:bbs_author,
								:bbs_title,
								:bbs_content,
								:bbs_item,
								:bbs_pwd,
								:bbs_hit,
								:bbs_list_img,
								:bbs_state,
								:ip_addr,
								:comment_cnt,
								:notice,
								:secret,
								:begin_date,
								:end_date,
								:winning_date,
								:reg_date)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_group', $row[bbs_group], PDO::PARAM_INT);
			$stmt->bindParam(':bbs_depth', $row[bbs_depth], PDO::PARAM_INT);
			$stmt->bindParam(':bbs_order', $row[bbs_order], PDO::PARAM_INT);
			$stmt->bindParam(':bbs_category', $bbs_category, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':origin_user_idx', $row[origin_user_idx], PDO::PARAM_INT);
			$stmt->bindParam(':bbs_author', $bbs_author, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_title', $bbs_title, PDO::PARAM_STR, 200);
			$stmt->bindParam(':bbs_content', $bbs_content, PDO::PARAM_STR, 30);
			$stmt->bindParam(':bbs_item', $bbs_item);
			$stmt->bindParam(':bbs_pwd', $bbs_pwd, PDO::PARAM_STR, 64);
			$stmt->bindParam(':bbs_hit', $bbs_hit, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_list_img', $bbs_list_img, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bbs_state', $bbs_state);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);
			$stmt->bindParam(':comment_cnt', $comment_cnt, PDO::PARAM_INT);
			$stmt->bindParam(':notice', $notice, PDO::PARAM_BOOL);
			$stmt->bindParam(':secret', $secret, PDO::PARAM_BOOL);
			$stmt->bindParam(':begin_date', $begin_date);
			$stmt->bindParam(':end_date', $end_date);
			$stmt->bindParam(':winning_date', $winning_date);
			$stmt->bindParam(':reg_date', $reg_date);
			$stmt->execute();

			$bbs_idx = $dbh->lastInsertId();

			if ($bbs_idx) {
				$bTransaction = Bbs::setAttachFile($dbh, $bbs_idx, $bbs_code);
			}
			else {
				$bTransaction = false;
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' .$e->getMessage() .'</br>';
			return false;
		}
	}

	function delete($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');

			$sql = 'select bbs_group, bbs_order from bbs where bbs_idx = :bbs_idx and bbs_code = :bbs_code';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ((int)$row['bbs_order'] == 1) {
				$sql = 'select count(bbs_idx) from bbs where bbs_code = :bbs_code and bbs_group = :bbs_group and bbs_order > :bbs_order';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
				$stmt->bindParam(':bbs_group', $row['bbs_group'], PDO::PARAM_INT);
				$stmt->bindParam(':bbs_order', $row['bbs_order'], PDO::PARAM_INT);
				$stmt->execute();
				$replyCnt = (int)$stmt->fetchColumn();
			}
			else {
				$replyCnt = 0;
			}

			//관련 코멘트 삭제S
			$sql = 'DELETE FROM bbs_comment WHERE bbs_idx = :bbs_idx ' ;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$bTransaction = $stmt->execute();

			if ($bTransaction = Bbs::attachFileDelete($dbh, $bbs_idx, $bbs_code)) {
				if ($replyCnt == 0) {
					$sql = 'DELETE FROM bbs WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
				}
				else {
					$sql = 'DELETE FROM bbs WHERE bbs_code = :bbs_code and bbs_group = :bbs_group';
				}

				$stmt = $dbh->prepare($sql);

				if ($replyCnt == 0) {
					$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				}
				else {
					$stmt->bindParam(':bbs_group', $row['bbs_group'], PDO::PARAM_INT);
				}

				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
				$bTransaction = $stmt->execute();
			}

			//관련 코멘트 삭제E

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
			$aBbsIdx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM bbs WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

			foreach($aBbsIdx as $bbs_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $bbs_idx, $bbs_code)) {
					$bTransaction = true;
					$stmt->execute();
				}
				else {
					$bTransaction = false;
					break;
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


	// 첨부파일 처리
	function setAttachFile($dbh, $bbs_idx, $bbs_code) {
		try {
			$bTransaction = true;
			$bbs_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('bbs_content')));
			$aryFileList = $this->getAddslashes('file_list');
			print_r($aryFileList);

			if (!is_null($aryFileList)) {
				$LIB_FILE = new LIB_FILE();

				foreach ($aryFileList as $value) {
					if ($value != '') {
						$aFileInfo = explode("|", $value);
						$bContentImg = true;

						echo '<br>aFileInfo2:'.$aFileInfo[2];
						// 본문 이미지인 경우
						if ($aFileInfo[4] == 1) {
							echo '본문';
							if (strpos($bbs_content, $aFileInfo[2]) === false) {
								$bContentImg = false;
							}
						}

						if ($bContentImg && $aFileInfo[0] == 0 && file_exists(ROOT.tempUploadPath.$aFileInfo[2])) {
							$reg_date = date('Y-m-d H:i:s', time());

							$sql = 'INSERT INTO bbs_upfile(bbs_idx, bbs_code, up_file_name, ori_file_name, file_size, file_type, reg_date) VALUES(:bbs_idx, :bbs_code, :up_file_name, :ori_file_name, :file_size, :file_type, :reg_date)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
							$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
							$stmt->bindParam(':up_file_name', $aFileInfo[2], PDO::PARAM_STR, 50);
							$stmt->bindParam(':ori_file_name', $aFileInfo[1], PDO::PARAM_STR, 50);
							$stmt->bindParam(':file_size', $aFileInfo[3], PDO::PARAM_INT);
							$stmt->bindParam(':file_type', $aFileInfo[4], PDO::PARAM_INT);
							$stmt->bindParam(':reg_date', $reg_date);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
							else {
								$bTransaction = false;
							}

							// 첨부파일인 경우
							if ($aFileInfo[4] == 2) {
								$sql = 'update bbs set upfile_cnt = upfile_cnt + 1 where bbs_idx = :bbs_idx and bbs_code = :bbs_code';
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
								$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

								if ($stmt->execute()) {
									$bTransaction = true;
								}
								else {
									$bTransaction = false;
								}
							}

							// 파일 이동
							if ($LIB_FILE->moveFile(ROOT.tempUploadPath.$aFileInfo[2], ROOT.bbsUploadPath.$aFileInfo[2])) {
								$bTransaction = true;
								echo '파일 이동 성공';
							}
							else {
								$bTransaction = false;
								echo '파일 이동 실패';
							}
						}
					}
				}
			}

			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
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

			/*
			echo "<br>at:$at";
			echo "<br>bbs_code:$bbs_code";
			echo "<br>page:$page";
			echo "<br>list_size:$list_size";
			echo "<br>search_type:$search_type";
			echo "<br>word:$word";
			echo "<br>category:".gettype($category);
			*/

			$sql = 'CALL up_bbs_list (:bbs_code, :page, :list_size, :search_type, :word, :category)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->bindParam(':search_type', $search_type, PDO::PARAM_INT);
			$stmt->bindParam(':word', $word, PDO::PARAM_STR, 20);
			$stmt->bindParam(':category', $category, PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getCommunityList($dbh) {
		try {
			$bbs_code = $this->getAddslashes('bbs_code');
			$page = $this->getAddslashes('page');
			$list_size = $this->getAddslashes('list_size');
			$search_type = $this->getAddslashes('search_type');
			$word = $this->getAddslashes('word');
			$category = $this->getAddslashes('category');

			//echo "CALL up_bbs_community_list ( $page, $list_size, $word, $category)";
			$sql = 'CALL up_bbs_community_list ( :page, :list_size, :word, :category)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->bindParam(':word', $word, PDO::PARAM_STR, 20);
			$stmt->bindParam(':category', $category, PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getRead($dbh) {
		try {
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');

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

			$dbh = null;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getCommunityRead($dbh) {
		try {
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');
			$bbs_category = $this->getAddslashes('bbs_category');
			$read_count = $this->getAddslashes('read_count');

			if (!empty($read_count)){
				$sql = ' UPDATE bbs SET bbs_hit = bbs_hit +1  where bbs_idx = :bbs_idx  ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				$stmt->execute();
			}

			//$sql = 'select (SELECT bbs_name FROM bbs_setting WHERE bbs_setting.bbs_code=bbs.bbs_code) AS bbs_name, bbs.* from bbs where bbs_idx = :bbs_idx  ';
			$sql = 'select (SELECT bbs_name FROM bbs_setting WHERE bbs_setting.bbs_code=bbs.bbs_code) AS bbs_name, (SELECT user_id FROM member WHERE member.user_idx = bbs.user_idx) AS email, bbs.* from bbs where bbs_idx = :bbs_idx  ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}

				//이전글 // 다음글
				$sql = 'SELECT bbs_idx FROM bbs
							WHERE
								bbs_idx > :bbs_idx
								AND bbs_category = :bbs_category
							ORDER BY bbs_idx ASC limit 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_idx', $bbs_idx,											 PDO::PARAM_INT);
				$stmt->bindParam(':bbs_category', $bbs_category,						 PDO::PARAM_INT);
				$stmt->execute();
				$next_idx = $stmt->fetchColumn();
				//echo 'next_idx : '.$next_idx.'<br>';
				$this->setAttr('next_idx', $next_idx);

				$sql = 'SELECT bbs_idx FROM bbs
							WHERE
								bbs_idx < :bbs_idx
								AND bbs_category = :bbs_category
							ORDER BY bbs_idx DESC limit 1 ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_idx', $bbs_idx,											 PDO::PARAM_INT);
				$stmt->bindParam(':bbs_category', $bbs_category,						 PDO::PARAM_INT);
				$stmt->execute();
				$prev_idx = $stmt->fetchColumn();
				//echo 'prev_idx : '.$next_idx.'<br>';
				$this->setAttr('prev_idx', $prev_idx);

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
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $bbs_idx, $bbs_code, $file_type = NULL) {
		try {
			/*
			if (is_null($file_type)) {
				$sql = 'SELECT upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM bbs_upfile WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
			}
			else {
				$sql = 'SELECT upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM bbs_upfile WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code and file_type = :file_type';
			}
			*/

			if (is_null($file_type)) {
				$sql = 'SELECT upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM bbs_upfile WHERE bbs_idx = :bbs_idx ';
			}
			else {
				$sql = 'SELECT upfile_idx, up_file_name, ori_file_name, file_size, file_type FROM bbs_upfile WHERE bbs_idx = :bbs_idx  and file_type = :file_type';
			}

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			//$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

			if (!is_null($file_type)) {
				$stmt->bindParam(':file_type', $file_type, PDO::PARAM_INT);
			}

			if ($stmt->execute()) {
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

	// 데이터 및 물리적 파일 삭제
	function attachFileDelete($dbh, $bbs_idx, $bbs_code) {
		try {
			//echo "bbs_idx:$bbs_idx";
			//echo "bbs_code:$bbs_code";

			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $bbs_idx, $bbs_code);

			//print_r($aryFileInfo);
			$sql = 'delete from bbs_upfile where bbs_idx = :bbs_idx and bbs_code = :bbs_code and upfile_idx = :upfile_idx';

			foreach($aryFileInfo as $value) {
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
				$stmt->bindParam(':upfile_idx', $value['upfile_idx'], PDO::PARAM_INT);

				if ($stmt->execute()) {
					$bTransaction = true;
					//echo "chk";
				}
				else {
					//echo 'chk2';
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				$LIB_FILE = new LIB_FILE();
				foreach($aryFileInfo as $value) {
					$LIB_FILE->DeleteFile(ROOT.bbsUploadPath.$value['up_file_name']);
				}
			}

			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}

	}


	// 선택한 첨부파일 삭제(수정 모드에서)
	function selectFileDelete($dbh) {
		try {
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$bbs_code = $this->getAddslashes('bbs_code');
			$file_idx = $this->getAddslashes('file_idx');

			$bTransaction = true;
			$dbh->beginTransaction();
			$sql = 'SELECT up_file_name, file_type FROM bbs_upfile WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code and upfile_idx = :upfile_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
			$stmt->bindParam(':upfile_idx', $file_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$sql = 'DELETE FROM bbs_upfile WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code and upfile_idx = :upfile_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
				$stmt->bindParam(':upfile_idx', $file_idx, PDO::PARAM_INT);

				if ($stmt->execute()) {
					// 첨부파일 이라면
					if ($row['file_type'] == 2) {
						$sql = 'UPDATE bbs SET upfile_cnt = upfile_cnt - 1 WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
						$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
						$bTransaction = $stmt->execute();
					}

					$LIB_FILE = new LIB_FILE();
					$LIB_FILE->DeleteFile(ROOT.bbsUploadPath.$row['up_file_name']);
				}
				else {
					$bTransaction = false;
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
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}






	function insertComment($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();
			$stmt = $dbh->prepare('SELECT ifnull(max(comment_group), 0) + 1 as groups FROM bbs_comment');
			$stmt->execute();
			$comment_group = $stmt->fetchColumn();

			$comment_depth = 1;
			$comment_order = 1;
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$origin_user_idx = $this->getAddslashes('origin_user_idx');
			$comment_title = $this->getAddslashes('comment_title');
			$comment_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('comment_content')));
			$comment_pwd = hash('sha256', $this->getAddslashes('comment_pwd'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$create_date = date('Y-m-d H:i:s', time());

			$sql = 'INSERT INTO bbs_comment (
							bbs_idx,  user_idx, origin_user_idx, comment_group,  comment_depth, comment_order,
							comment_title, comment_content, comment_pwd, ip_addr
						)VALUES(
							:bbs_idx, :user_idx, :origin_user_idx, :comment_group, :comment_depth, :comment_order,
							:comment_title, :comment_content, :comment_pwd, :ip_addr
						)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':origin_user_idx', $origin_user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':comment_group', $comment_group, PDO::PARAM_INT);
			$stmt->bindParam(':comment_depth', $comment_depth, PDO::PARAM_INT);
			$stmt->bindParam(':comment_order', $comment_order, PDO::PARAM_INT);
			$stmt->bindParam(':comment_title', $comment_title, PDO::PARAM_STR, 50);
			$stmt->bindParam(':comment_content', $comment_content, PDO::PARAM_STR, 50);
			$stmt->bindParam(':comment_pwd', $comment_pwd, PDO::PARAM_STR, 50);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
			}else {
				throw new Exception('error');
			}

			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function replyComment($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();


			$comment_idx = $this->getAddslashes('comment_idx');
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$user_idx = $this->getAddslashes('user_idx');
			$origin_user_idx = $this->getAddslashes('origin_user_idx');
			$comment_title = $this->getAddslashes('comment_title');
			$comment_content = str_replace(tempUploadPath, bbsUploadPath, htmlspecialchars($this->getAddslashes('comment_content')));
			$comment_pwd = hash('sha256', $this->getAddslashes('comment_pwd'));
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$modify_date = date('Y-m-d H:i:s', time());

			$sql='SELECT origin_user_idx, comment_group, comment_depth + 1 as comment_depth, comment_order + 1 as comment_order, user_idx FROM bbs_comment WHERE comment_idx = :comment_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':comment_idx', $comment_idx, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$sql ='UPDATE bbs_comment SET comment_order = comment_order + 1 WHERE bbs_idx = :bbs_idx and comment_group = :comment_group and comment_order >= :comment_order';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $row['bbs_idx'], PDO::PARAM_INT);
			$stmt->bindParam(':comment_group', $row['comment_group'], PDO::PARAM_INT);
			$stmt->bindParam(':comment_order', $row['comment_order'], PDO::PARAM_INT);
			$stmt->execute();

			$sql = 'INSERT INTO bbs_comment (
							bbs_idx,  user_idx, origin_user_idx, comment_group,  comment_depth, comment_order,
							comment_title, comment_content, comment_pwd, ip_addr
						)VALUES(
							:bbs_idx, :user_idx, :origin_user_idx, :comment_group, :comment_depth, :comment_order,
							:comment_title, :comment_content, :comment_pwd, :ip_addr
						)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':origin_user_idx', $origin_user_idx, PDO::PARAM_INT);
			$stmt->bindParam(':comment_group', $row['comment_group'], PDO::PARAM_INT);
			$stmt->bindParam(':comment_depth', $row['comment_depth'], PDO::PARAM_INT);
			$stmt->bindParam(':comment_order', $row['comment_order'], PDO::PARAM_INT);
			$stmt->bindParam(':comment_title', $comment_title, PDO::PARAM_STR, 50);
			$stmt->bindParam(':comment_content', $comment_content, PDO::PARAM_STR, 50);
			$stmt->bindParam(':comment_pwd', $comment_pwd, PDO::PARAM_STR, 50);
			$stmt->bindParam(':ip_addr', $ip_addr, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
			}

			if ($bTransaction) {
				$dbh->commit();
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' .$e->getMessage() .'</br>';
			return false;
		}
	}

	function getListComment($dbh) {
		try {
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$page = $this->getAddslashes('page');
			$list_size = $this->getAddslashes('list_size');

			$sql = 'CALL up_bbs_comment_list (:bbs_idx, :page, :list_size)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function getListCommentRe($dbh) {
		try {
			$bbs_idx = $this->getAddslashes('bbs_idx');
			$comment_group = $this->getAddslashes('comment_group');
			//$page = $this->getAddslashes('page');
			$list_size = $this->getAddslashes('list_size');
			$page = 1;

			//echo "CALL up_bbs_comment_re_list ($bbs_idx, $comment_group, $page, $list_size) ";
			$sql = 'CALL up_bbs_comment_re_list (:bbs_idx, :comment_group, :page, :list_size)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->bindParam(':comment_group', $comment_group, PDO::PARAM_INT);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':list_size', $list_size, PDO::PARAM_INT);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getCommentDelete($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$bbs_idx = $this->getAddslashes('bbs_idx');
			$comment_idx = $this->getAddslashes('comment_idx');

			$sql = 'select comment_group, comment_order from bbs_comment where comment_idx = :comment_idx AND bbs_idx = :bbs_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':comment_idx', $comment_idx, PDO::PARAM_INT);
			$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//echo $row['comment_group'] .'<br>';


			if ((int)$row['comment_group'] == 1) {
				$sql = 'select count(comment_idx) from bbs_comment where comment_group = :comment_group and comment_order > :comment_order AND bbs_idx = :bbs_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':comment_group', $row['comment_group'], PDO::PARAM_INT);
				$stmt->bindParam(':comment_order', $row['comment_order'], PDO::PARAM_INT);
				$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				$stmt->execute();
				$replyCnt = (int)$stmt->fetchColumn();
			}
			else {
				$replyCnt = 0;
			}

//			if ($bTransaction = Bbs::attachFileDelete($dbh, $bbs_idx, $bbs_code)) {
				if ($replyCnt == 0) {
					$sql = 'DELETE FROM bbs_comment WHERE comment_idx = :comment_idx and bbs_idx = :bbs_idx';
				}
				else {
					$sql = 'DELETE FROM bbs_comment WHERE comment_group = :comment_group AND bbs_idx = :bbs_idx ';
				}

				$stmt = $dbh->prepare($sql);

				if ($replyCnt == 0) {
					$stmt->bindParam(':comment_idx', $comment_idx, PDO::PARAM_INT);
				}
				else {
					$stmt->bindParam(':comment_group', $row['comment_group'], PDO::PARAM_INT);
				}

				$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
				$bTransaction = $stmt->execute();
//			}

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