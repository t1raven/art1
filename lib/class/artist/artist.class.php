<?php
class Artist
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


	function insert($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$artist_name = $this->getAddslashes('artist_name');
			$artist_en_name = $this->getAddslashes('artist_en_name');
			$photo_up_file_name = $this->getAddslashes('photo_up_file_name');
			$photo_ori_file_name = $this->getAddslashes('photo_ori_file_name');
			$cv_up_file_name = $this->getAddslashes('cv_up_file_name');
			$cv_ori_file_name = $this->getAddslashes('cv_ori_file_name');
			$artist_job = $this->getAddslashes('artist_job');
			$artist_birthday = $this->getAddslashes('artist_birthday');
			$artist_genre = $this->getAddslashes('artist_genre');
			$artist_mobile = $this->getAddslashes('artist_mobile');
			$artist_email = $this->getAddslashes('artist_email');
			$education_year = $this->getAddslashes('education_year');
			$education_name = $this->getAddslashes('education_name');
			$award_year = $this->getAddslashes('award_year');
			$award_name = $this->getAddslashes('award_name');
			$private_year = $this->getAddslashes('private_year');
			$private_name = $this->getAddslashes('private_name');
			$team_year = $this->getAddslashes('team_year');
			$team_name = $this->getAddslashes('team_name');
			$major_work_idx = (!empty($this->getAddslashes('major_work_idx'))) ? $this->getAddslashes('major_work_idx') : null;
			$artist_greeting = (!empty($this->getAddslashes('artist_greeting'))) ? $this->getAddslashes('artist_greeting') : null;
			$annual_artwork_year = $this->getAddslashes('annual_artwork_year');
			$annual_artwork_cnt = $this->getAddslashes('annual_artwork_cnt');
			$homepage_url = $this->getAddslashes('homepage_url');
			$blog_url = $this->getAddslashes('blog_url');
			$facebook_url = $this->getAddslashes('facebook_url');
			$sns_1_name = $this->getAddslashes('sns_1_name');
			$sns_1_url = $this->getAddslashes('sns_1_url');
			$sns_2_name = $this->getAddslashes('sns_2_name');
			$sns_2_url = $this->getAddslashes('sns_2_url');
			$approval_state = $this->getAddslashes('approval_state');

			$sql = 'INSERT INTO artist_info (
								user_idx,
								artist_name,
								artist_en_name,
								photo_up_file_name,
								photo_ori_file_name,
								cv_up_file_name,
								cv_ori_file_name,
								artist_job,
								artist_birthday,
								artist_genre,
								artist_mobile,
								artist_email,
								education_year,
								education_name,
								award_year,
								award_name,
								private_year,
								private_name,
								team_year,
								team_name,
								major_work_idx,
								artist_greeting,
								annual_artwork_year,
								annual_artwork_cnt,
								homepage_url,
								blog_url,
								facebook_url,
								sns_1_name,
								sns_1_url,
								sns_2_name,
								sns_2_url,
								approval_state
					) VALUES (
								:user_idx,
								:artist_name,
								:artist_en_name,
								:photo_up_file_name,
								:photo_ori_file_name,
								:cv_up_file_name,
								:cv_ori_file_name,
								:artist_job,
								:artist_birthday,
								:artist_genre,
								:artist_mobile,
								:artist_email,
								:education_year,
								:education_name,
								:award_year,
								:award_name,
								:private_year,
								:private_name,
								:team_year,
								:team_name,
								:major_work_idx,
								:artist_greeting,
								:annual_artwork_year,
								:annual_artwork_cnt,
								:homepage_url,
								:blog_url,
								:facebook_url,
								:sns_1_name,
								:sns_1_url,
								:sns_2_name,
								:sns_2_url,
								:approval_state
								)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':artist_name', $artist_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artist_en_name', $artist_en_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':photo_up_file_name', $photo_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':photo_ori_file_name', $photo_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':cv_up_file_name', $cv_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':cv_ori_file_name', $cv_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_job', $artist_job, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_birthday', $artist_birthday, PDO::PARAM_STR, 10);
			$stmt->bindParam(':artist_genre', $artist_genre, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_mobile', $artist_mobile, PDO::PARAM_STR, 11);
			$stmt->bindParam(':artist_email', $artist_email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':education_year', $education_year, PDO::PARAM_STR, 10);
			$stmt->bindParam(':education_name', $education_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':award_year', $award_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':award_name', $award_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':private_year', $private_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':private_name', $private_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':team_year', $team_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':team_name', $team_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':major_work_idx', $major_work_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':artist_greeting', $artist_greeting, PDO::PARAM_STR, 500);
			$stmt->bindParam(':annual_artwork_year', $annual_artwork_year, PDO::PARAM_STR, 25);
			$stmt->bindParam(':annual_artwork_cnt', $annual_artwork_cnt, PDO::PARAM_STR, 25);
			$stmt->bindParam(':homepage_url', $homepage_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':blog_url', $blog_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':facebook_url', $facebook_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':sns_1_name', $sns_1_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':sns_1_url', $sns_1_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':sns_2_name', $sns_2_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':sns_2_url', $sns_2_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':approval_state', $approval_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				//echo "chk1";
				return true;
			}
			else {
				//echo "chk2";
				return false;
			}
		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$modify_date = date('Y-m-d H:i:s');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$artist_idx = $this->getAddslashes('artist_idx');
			$artist_name = $this->getAddslashes('artist_name');
			$artist_en_name = $this->getAddslashes('artist_en_name');
			$photo_up_file_name = $this->getAddslashes('photo_up_file_name');
			$photo_ori_file_name = $this->getAddslashes('photo_ori_file_name');
			$cv_up_file_name = $this->getAddslashes('cv_up_file_name');
			$cv_ori_file_name = $this->getAddslashes('cv_ori_file_name');
			$artist_job = $this->getAddslashes('artist_job');
			$artist_birthday = $this->getAddslashes('artist_birthday');
			$artist_genre = $this->getAddslashes('artist_genre');
			$artist_mobile = $this->getAddslashes('artist_mobile');
			$artist_email = $this->getAddslashes('artist_email');
			$education_year = $this->getAddslashes('education_year');
			$education_name = $this->getAddslashes('education_name');
			$award_year = $this->getAddslashes('award_year');
			$award_name = $this->getAddslashes('award_name');
			$private_year = $this->getAddslashes('private_year');
			$private_name = $this->getAddslashes('private_name');
			$team_year = $this->getAddslashes('team_year');
			$team_name = $this->getAddslashes('team_name');
			$major_work_idx = (!empty($this->getAddslashes('major_work_idx'))) ? $this->getAddslashes('major_work_idx') : null;
			$artist_greeting = (!empty($this->getAddslashes('artist_greeting'))) ? $this->getAddslashes('artist_greeting') : null;
			$annual_artwork_year = $this->getAddslashes('annual_artwork_year');
			$annual_artwork_cnt = $this->getAddslashes('annual_artwork_cnt');
			$homepage_url = $this->getAddslashes('homepage_url');
			$blog_url = $this->getAddslashes('blog_url');
			$facebook_url = $this->getAddslashes('facebook_url');
			$sns_1_name = $this->getAddslashes('sns_1_name');
			$sns_1_url = $this->getAddslashes('sns_1_url');
			$sns_2_name = $this->getAddslashes('sns_2_name');
			$sns_2_url = $this->getAddslashes('sns_2_url');
			$sql = 'UPDATE artist_info SET
								artist_name = :artist_name,
								artist_en_name = :artist_en_name,
								photo_up_file_name = :photo_up_file_name,
								photo_ori_file_name = :photo_ori_file_name,
								cv_up_file_name = :cv_up_file_name,
								cv_ori_file_name = :cv_ori_file_name,
								artist_job = :artist_job,
								artist_birthday = :artist_birthday,
								artist_genre = :artist_genre,
								artist_mobile = :artist_mobile,
								artist_email = :artist_email,
								education_year = :education_year,
								education_name = :education_name,
								award_year = :award_year,
								award_name = :award_name,
								private_year = :private_year,
								private_name = :private_name,
								team_year = :team_year,
								team_name = :team_name,
								major_work_idx = :major_work_idx,
								artist_greeting = :artist_greeting,
								annual_artwork_year = :annual_artwork_year,
								annual_artwork_cnt = :annual_artwork_cnt,
								homepage_url = :homepage_url,
								blog_url = :blog_url,
								facebook_url = :facebook_url,
								sns_1_name = :sns_1_name,
								sns_1_url = :sns_1_url,
								sns_2_name = :sns_2_name,
								sns_2_url = :sns_2_url,
								modify_date = :modify_date
						WHERE artist_idx = :artist_idx AND user_idx = :user_idx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_name', $artist_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':artist_en_name', $artist_en_name, PDO::PARAM_STR, 50);
			$stmt->bindParam(':photo_up_file_name', $photo_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':photo_ori_file_name', $photo_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':cv_up_file_name', $cv_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':cv_ori_file_name', $cv_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_job', $artist_job, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_birthday', $artist_birthday, PDO::PARAM_STR, 10);
			$stmt->bindParam(':artist_genre', $artist_genre, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_mobile', $artist_mobile, PDO::PARAM_STR, 11);
			$stmt->bindParam(':artist_email', $artist_email, PDO::PARAM_STR, 60);
			$stmt->bindParam(':education_year', $education_year, PDO::PARAM_STR, 10);
			$stmt->bindParam(':education_name', $education_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':award_year', $award_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':award_name', $award_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':private_year', $private_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':private_name', $private_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':team_year', $team_year, PDO::PARAM_STR, 15);
			$stmt->bindParam(':team_name', $team_name, PDO::PARAM_STR, 300);
			$stmt->bindParam(':major_work_idx', $major_work_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':artist_greeting', $artist_greeting, PDO::PARAM_STR, 50);
			$stmt->bindParam(':annual_artwork_year', $annual_artwork_year, PDO::PARAM_STR, 25);
			$stmt->bindParam(':annual_artwork_cnt', $annual_artwork_cnt, PDO::PARAM_STR, 25);
			$stmt->bindParam(':homepage_url', $homepage_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':blog_url', $blog_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':facebook_url', $facebook_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':sns_1_name', $sns_1_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':sns_1_url', $sns_1_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':sns_2_name', $sns_2_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':sns_2_url', $sns_2_url, PDO::PARAM_STR, 255);
			$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

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

	function delete($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDelete($dbh, $artist_idx)) {
				$sql = 'DELETE FROM artist_info WHERE artist_idx = :artist_idx AND user_idx = :user_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);
				$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);
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
			$aArtistIdx = $this->getAddslashes('artist_idx');
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$bTransaction = false;
			$dbh->beginTransaction();
			$sql = 'DELETE FROM artist_info WHERE artist_idx = :artist_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

			foreach($aArtistIdx as $artist_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $artist_idx)) {
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

	function getList($dbh) {
		try {
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$st = $this->getAddslashes('st'); // and / or
			$nm = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$enm = (!empty($this->getAddslashes('enm'))) ? $this->getAddslashes('enm') : null;
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;
			/*
			echo "<br>page:$page";
			echo "<br>sz:$sz";
			echo "<br>st:$st";
			echo "<br>nm:".gettype($nm);
			echo "<br>enm:".gettype($enm);
			echo "<br>bdate:".gettype($bdate);
			echo "<br>edate:".gettype($edate);
			*/

			$sql = 'CALL up_artist_list (:page, :sz, :st, :nm, :enm, :bdate, :edate, :sort, :od)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':st', $st, PDO::PARAM_INT, 1);
			$stmt->bindParam(':nm', $nm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':enm', $enm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':sort', $sort, PDO::PARAM_INT, 1);
			$stmt->bindParam(':od', $od, PDO::PARAM_INT, 1);
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

	function getEdit($dbh) {
		try {
			$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
			$sql = 'SELECT
									artist_idx, artist_name, artist_en_name, photo_up_file_name, photo_ori_file_name, cv_up_file_name, cv_ori_file_name, artist_job, artist_birthday, artist_genre, artist_mobile, artist_email, education_year, education_name, award_year, award_name, private_year, private_name, team_year, team_name, major_work_idx, artist_greeting, annual_artwork_year, annual_artwork_cnt, homepage_url, blog_url, facebook_url, sns_1_name, sns_1_url, sns_2_name, sns_2_url, approval_state,
									(SELECT goods_list_img FROM goods AS a WHERE a.goods_idx = major_work_idx) AS major_work_img,
									(SELECT goods_name FROM goods AS a WHERE a.goods_idx = major_work_idx) AS major_work
						FROM artist_info
						WHERE user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					//echo "<br>$key";
					//echo "<br>$val";
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

	function getSearchArtist($dbh) {
		try {
			$artist_name = (!empty($this->getAddslashes('artist_name'))) ? "%".$this->getAddslashes('artist_name')."%" : null;
			//$sql = 'SELECT artist_idx, artist_name, artist_birthday, education_name FROM artist_info WHERE artist_name = :artist_name';
			$sql = "SELECT artist_idx, artist_name, artist_birthday, education_name FROM artist_info WHERE artist_name like :artist_name";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_name', $artist_name, PDO::PARAM_STR, 50);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;
			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}
	// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $artist_idx) {
		try {
			$sql = 'SELECT artist_idx, photo_up_file_name, photo_ori_file_name, cv_up_file_name, cv_ori_file_name FROM artist_info WHERE artist_idx = :artist_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT);

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

	// 물리적 파일 삭제
	function attachFileDelete($dbh, $artist_idx) {
		try {
			//echo "bbs_idx:$bbs_idx";
			//echo "bbs_code:$bbs_code";

			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $artist_idx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['photo_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.artistUploadPath.$row['photo_up_file_name']);
					}

					if (!empty($row['cv_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.artistUploadPath.$row['cv_up_file_name']);
					}
				}
				unset($LIB_FILE);
			}
			//echo 'bTransaction:$bTransaction';
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// Ajax 통한 첨부파일 삭제
	function deleteAttachAjax($dbh, $attach) {
		$user_idx = AES256::dec( $_SESSION['user_idx'], AES_KEY);
		$photo_up_file_name = null;
		$photo_ori_file_name = null;
		$cv_up_file_name = null;
		$cv_ori_file_name = null;
		$artist_idx = $this->getAddslashes('artist_idx');
		$aryFileInfo = self::getFileInfo($dbh, $artist_idx);
		$bTransaction = false;
		$dbh->beginTransaction();

		if ($attach === 'photo') {
			$sql = 'UPDATE artist_info SET photo_up_file_name = :photo_up_file_name, photo_ori_file_name = :photo_ori_file_name WHERE artist_idx = :artist_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':photo_up_file_name', $photo_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':photo_ori_file_name', $photo_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['photo_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.artistUploadPath.$row['photo_up_file_name']);
						$bTransaction = true;
					}
				}
			}
		}
		elseif ($attach === 'cv') {
			$sql = 'UPDATE artist_info SET cv_up_file_name = :cv_up_file_name, cv_ori_file_name = :cv_ori_file_name WHERE artist_idx = :artist_idx AND user_idx = :user_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':cv_up_file_name', $cv_up_file_name, PDO::PARAM_STR, 25);
			$stmt->bindParam(':cv_ori_file_name', $cv_ori_file_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':user_idx', $user_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['cv_up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.artistUploadPath.$row['cv_up_file_name']);
						$bTransaction = true;
					}
				}
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




}
?>