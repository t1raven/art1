<?php
class News
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

			$news_idx = $this->getAddslashes('news_idx');
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$news_title = $this->getAddslashes('news_title');
			$reporter_name = $this->getAddslashes('reporter_name');
			$source = $this->getAddslashes('source');
			$create_date = $this->getAddslashes('create_date');
			$recent_status = $this->getAddslashes('recent_status');
			$display_status = $this->getAddslashes('display_status');
			$news_main_up_file_name = $this->getAddslashes('main_up_file_name');
			$news_main_ori_file_name = $this->getAddslashes('main_ori_file_name');
			$news_recent_up_file_name = $this->getAddslashes('recent_up_file_name');
			$news_recent_ori_file_name = $this->getAddslashes('recent_ori_file_name');

			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$arr_ImgOrVideo = $this->getAddslashes('arr_ImgOrVideo');
			$arr_imgFile = $this->getAddslashes('arr_imgFile');
			$arr_img_comment = $this->getAddslashes('arr_img_comment');
			$arr_img_content = $this->getAddslashes('arr_img_content');
			$arr_videoFile = $this->getAddslashes('arr_videoFile');
			$arr_video_url = $this->getAddslashes('arr_video_url');
			$arr_video_content = $this->getAddslashes('arr_video_content');

			$arr_up_file_name = $this->getAddslashes('arr_up_file_name');
			$arr_ori_file_name = $this->getAddslashes('arr_ori_file_name');

			$arr_this_value = $this->getAddslashes('arr_this_value');


			/*
			//recent_status 초기화
			if ($recent_status == 'Y' ) {
				$sql = 'UPDATE news_main SET recent_status = \'N\' WHERE news_category_idx = :news_category_idx ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
				if ($stmt->execute()) {
					$bTransaction = true ;
				}
			}else{
				$bTransaction = true ;
			}
			*/
			$bTransaction = true ;

			$sql = 'INSERT INTO news_main (
							news_category_idx, news_title, reporter_name,
							source, recent_status, display_status,
							news_main_up_file_name, news_main_ori_file_name,
							news_recent_up_file_name, news_recent_ori_file_name,
							ip_addr, create_date
						) VALUES(
							:news_category_idx, :news_title, :reporter_name,
							:source, :recent_status, :display_status,
							:news_main_up_file_name, :news_main_ori_file_name,
							:news_recent_up_file_name, :news_recent_ori_file_name,
							:ip_addr, :create_date
						)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
			$stmt->bindParam(':news_title',$news_title,											PDO::PARAM_STR, 30);
			$stmt->bindParam(':reporter_name',$reporter_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':source',$source,													PDO::PARAM_STR, 30);
			$stmt->bindParam(':recent_status',$recent_status,								PDO::PARAM_STR, 30);
			$stmt->bindParam(':display_status',$display_status,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_up_file_name',$news_main_up_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_ori_file_name',$news_main_ori_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_recent_up_file_name',$news_recent_up_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_recent_ori_file_name',$news_recent_ori_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':ip_addr',$ip_addr,												PDO::PARAM_INT);
			$stmt->bindParam(':create_date',$create_date,									PDO::PARAM_STR, 30);


			if ($stmt->execute() && $bTransaction ) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				//echo('뉴스 메인 입력 에러');
				exit;
			}



			$news_idx = $dbh->lastInsertId(); //마지막으로 삽입된 행의 ID, 시퀀스 객체의 마지막 값을 리턴


			if ($news_idx) { //단락업로드
				$sql = '';
				$i=0;

				//echo print_r ($arr_ImgOrVideo) .'<br>';
				foreach ($arr_ImgOrVideo as $value) {
					//단락만큼 돌면서 업로드
					//echo $value .'<br>';
					if ($arr_this_value[$i]) { //유효한 입력 값이 있으면 처리
						if ($value == 'I'){ //이미지
							$new_paragraph_content =Str_replace('<','&#60;',$arr_img_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content = htmlspecialchars($arr_img_content[$i]);
							$img_or_video = 'img';
							$img_comment = $arr_img_comment[$i];
							$video_url = NULL;
							$imgfile = $arr_imgFile;
						}elseif($value == 'V'){ //비디오
							$new_paragraph_content =Str_replace('<','&#60;',$arr_video_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content =$arr_video_content[$i];
							$img_or_video = 'video';
							$img_comment = NULL;
							$video_url = htmlspecialchars($arr_video_url[$i]);
						}
						$up_file_name = htmlspecialchars($arr_up_file_name[$i]);
						$ori_file_name = htmlspecialchars($arr_ori_file_name[$i]);

						//$new_paragraph_content = htmlspecialchars($new_paragraph_content);
						$new_paragraph_content = strip_tags($new_paragraph_content,'<img>');



						$sql = 'INSERT INTO news_paragraph (
								news_idx, new_paragraph_content, img_or_video,
								ori_file_name, up_file_name, img_comment, video_url
							) VALUES(
								:news_idx, :new_paragraph_content, :img_or_video,
								:ori_file_name, :up_file_name, :img_comment, :video_url
							)';

						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':news_idx',$news_idx,													PDO::PARAM_INT);
						$stmt->bindParam(':new_paragraph_content',$new_paragraph_content,	PDO::PARAM_STR);
						$stmt->bindParam(':img_or_video',$img_or_video,										PDO::PARAM_STR, 30);
						$stmt->bindParam(':ori_file_name',$ori_file_name,										PDO::PARAM_STR, 255);
						$stmt->bindParam(':up_file_name',$up_file_name,										PDO::PARAM_STR, 200);
						$stmt->bindParam(':img_comment',$img_comment,										PDO::PARAM_STR, 300);
						$stmt->bindParam(':video_url',$video_url,													PDO::PARAM_STR, 250);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
						else {
							throw new Exception('error');
						}
					}
					$i=$i+1;
				}

			}

			if ($bTransaction) {
				$resurt = $dbh->commit();
				//echo 'result : '.$result.'<br>';
			}
			else {
				$dbh->rollback();
			}

			if ($bTransaction){
				return $news_idx;
			}else{
				return $bTransaction;
			}
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
			//print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$news_idx = $this->getAddslashes('news_idx');
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$news_title = $this->getAddslashes('news_title');
			$reporter_name = $this->getAddslashes('reporter_name');
			$source = $this->getAddslashes('source');
			$recent_status = $this->getAddslashes('recent_status');
			$display_status = $this->getAddslashes('display_status');
			$news_main_up_file_name = $this->getAddslashes('main_up_file_name');
			$news_main_ori_file_name = $this->getAddslashes('main_ori_file_name');
			$news_recent_up_file_name = $this->getAddslashes('recent_up_file_name');
			$news_recent_ori_file_name = $this->getAddslashes('recent_ori_file_name');
			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);
			$create_date = $this->getAddslashes('create_date');
			$modify_date = date('Y-m-d H:i:s', time());

			$arr_ImgOrVideo = $this->getAddslashes('arr_ImgOrVideo');
			$arr_imgFile = $this->getAddslashes('arr_imgFile');
			$arr_img_comment = $this->getAddslashes('arr_img_comment');
			$arr_img_content = $this->getAddslashes('arr_img_content');
			$arr_videoFile = $this->getAddslashes('arr_videoFile');
			$arr_video_url = $this->getAddslashes('arr_video_url');
			$arr_video_content = $this->getAddslashes('arr_video_content');

			$arr_up_file_name = $this->getAddslashes('arr_up_file_name');
			$arr_ori_file_name = $this->getAddslashes('arr_ori_file_name');

			$arr_paragraph_idx = $this->getAddslashes('arr_paragraph_idx');
			$arr_this_value = $this->getAddslashes('arr_this_value');

			//echo 'news_title :'.$news_title.'<br>';
			//exit;

			/*
			//recent_status 초기화
			if ($recent_status == 'Y' ) {
				$sql = 'UPDATE news_main SET recent_status = \'N\' WHERE news_category_idx = :news_category_idx ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
				if ($stmt->execute()) {
					$bTransaction = true ;
				}
			}else{
				$bTransaction = true ;
			}
			*/
			$bTransaction = true ;

			$sql = 'UPDATE news_main SET
							news_category_idx = :news_category_idx,
							news_title = :news_title,
							reporter_name = :reporter_name,
							source = :source,
							recent_status = :recent_status,
							display_status = :display_status,
							news_main_up_file_name = :news_main_up_file_name,
							news_main_ori_file_name = :news_main_ori_file_name,
							news_recent_up_file_name = :news_recent_up_file_name,
							news_recent_ori_file_name = :news_recent_ori_file_name,
							ip_addr = :ip_addr ,
							create_date = :create_date ,
							modify_date = :modify_date
						WHERE news_idx = :news_idx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
			$stmt->bindParam(':news_title',$news_title,											PDO::PARAM_STR, 30);
			$stmt->bindParam(':reporter_name',$reporter_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':source',$source,													PDO::PARAM_STR, 30);
			$stmt->bindParam(':recent_status',$recent_status,								PDO::PARAM_STR, 30);
			$stmt->bindParam(':display_status',$display_status,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_up_file_name',$news_main_up_file_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_ori_file_name',$news_main_ori_file_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_recent_up_file_name',$news_recent_up_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_recent_ori_file_name',$news_recent_ori_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':ip_addr',$ip_addr,												PDO::PARAM_INT);
			$stmt->bindParam(':create_date',$create_date,									PDO::PARAM_STR, 30);
			$stmt->bindParam(':modify_date',$modify_date,									PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_idx',$news_idx,											PDO::PARAM_INT);

			if ($stmt->execute()) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				//echo('뉴스 메인 입력 에러');
				exit;
			}

			if ($news_idx) { //단락업데이트
				$sql = '';
				$i=0;
				//echo print_r ($arr_ImgOrVideo) .'<br>';
				foreach ($arr_ImgOrVideo as $value) {
					//단락만큼 돌면서 업로드
					//echo $value .'<br>';
					if ($arr_this_value[$i]) { //유효한 입력 값이 있으면 처리

						if ($value == 'I'){ //이미지
							$new_paragraph_content =Str_replace('<','&#60;',$arr_img_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content = $arr_img_content[$i];
							$img_or_video = 'img';
							$img_comment = htmlspecialchars($arr_img_comment[$i]);
							$video_url = NULL;
							$imgfile = $arr_imgFile;
						}elseif($value == 'V'){ //비디오
							$new_paragraph_content =Str_replace('<','&#60;',$arr_video_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content = $arr_video_content[$i];
							$img_or_video = 'video';
							$img_comment = NULL;
							$video_url = htmlspecialchars($arr_video_url[$i]);
						}
						$up_file_name = $arr_up_file_name[$i];
						$ori_file_name = $arr_ori_file_name[$i];

						//$new_paragraph_content = htmlspecialchars($new_paragraph_content);
						$new_paragraph_content = strip_tags($new_paragraph_content,'<img>');

						$news_paragraph_idx = $arr_paragraph_idx[$i];

						if ($arr_paragraph_idx[$i]){ //저장된 내용 수정
							$sql = 'UPDATE  news_paragraph SET
											new_paragraph_content = :new_paragraph_content,
											img_or_video = :img_or_video,
											ori_file_name = :ori_file_name,
											up_file_name = :up_file_name,
											img_comment = :img_comment,
											video_url= :video_url,
											modify_date= :modify_date
										WHERE news_paragraph_idx = :news_paragraph_idx';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':new_paragraph_content',$new_paragraph_content,	PDO::PARAM_STR);
							$stmt->bindParam(':img_or_video',$img_or_video,										PDO::PARAM_STR, 30);
							$stmt->bindParam(':ori_file_name',$ori_file_name,										PDO::PARAM_STR, 255);
							$stmt->bindParam(':up_file_name',$up_file_name,										PDO::PARAM_STR, 200);
							$stmt->bindParam(':img_comment',$img_comment,										PDO::PARAM_STR, 300);
							$stmt->bindParam(':video_url',$video_url,													PDO::PARAM_STR, 250);
							$stmt->bindParam(':modify_date',$modify_date,											PDO::PARAM_STR, 10);
							$stmt->bindParam(':news_paragraph_idx', $news_paragraph_idx,				PDO::PARAM_INT);

						}else{ //추가된 내용 저장

							$sql = 'INSERT INTO news_paragraph (
									news_idx, new_paragraph_content, img_or_video,
									ori_file_name, up_file_name, img_comment, video_url
								) VALUES(
									:news_idx, :new_paragraph_content, :img_or_video,
									:ori_file_name, :up_file_name, :img_comment, :video_url
								)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':news_idx',$news_idx,													PDO::PARAM_INT);
							$stmt->bindParam(':new_paragraph_content',$new_paragraph_content,	PDO::PARAM_STR);
							$stmt->bindParam(':img_or_video',$img_or_video,										PDO::PARAM_STR, 30);
							$stmt->bindParam(':ori_file_name',$ori_file_name,										PDO::PARAM_STR, 255);
							$stmt->bindParam(':up_file_name',$up_file_name,										PDO::PARAM_STR, 200);
							$stmt->bindParam(':img_comment',$img_comment,										PDO::PARAM_STR, 300);
							$stmt->bindParam(':video_url',$video_url,													PDO::PARAM_STR, 250);

						}

						if ($stmt->execute()) {
							$bTransaction = true;
						}
						else {
							throw new Exception('error');
						}
					}

					$i=$i+1;
				}

			}

			//exit;
			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;

		}
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function delete($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');
			$bTransaction = false;
			$dbh->beginTransaction();


			if ($bTransaction = self::attachFileDelete($dbh, $news_idx)) {
				$sql = 'DELETE FROM news_main WHERE news_idx = :news_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
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
			$aNews_idx = $this->getAddslashes('news_idx');

			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM news_main WHERE news_idx = :news_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);

			foreach($aNews_idx as $news_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $news_idx)) {
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

	function delete_paragraph($dbh){ //단락 삭제
		try {
			$news_paragraph_idx = $this->getAddslashes('news_paragraph_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDeleteSelf($dbh, $news_paragraph_idx)) {
				$sql = 'DELETE FROM news_paragraph WHERE news_paragraph_idx = :news_paragraph_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_paragraph_idx', $news_paragraph_idx, PDO::PARAM_INT);


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
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function delete_file($dbh){ //개별 파일 삭제
		try {
			$news_paragraph_idx = $this->getAddslashes('news_paragraph_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDeleteSelf($dbh, $news_paragraph_idx)) {
				$sql = 'UPDATE news_paragraph SET ori_file_name = NULL , up_file_name = NULL WHERE news_paragraph_idx = :news_paragraph_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_paragraph_idx', $news_paragraph_idx, PDO::PARAM_INT);


				$bTransaction = $stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function delete_main_file($dbh, $news_idx ){ //메인 개별 파일 삭제
		try {
			//$news_idx = $this->getAddslashes('news_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'SELECT news_idx, news_main_ori_file_name, news_main_up_file_name FROM news_main WHERE news_idx = :news_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

//echo print_r($row);
//echo $row[0]['news_main_up_file_name'];
//exit;


			if ($bTransaction = self::attachFileDeleteMain($row[0]['news_main_up_file_name'])) {
				$sql = 'UPDATE news_main SET news_main_ori_file_name = NULL , news_main_up_file_name = NULL WHERE news_idx = :news_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);


				$bTransaction = $stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function delete_recent_file($dbh, $news_idx){ //리센트 개별 파일 삭제
		try {
			//$news_idx = $this->getAddslashes('news_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'SELECT news_idx, news_recent_ori_file_name, news_recent_up_file_name FROM news_main WHERE news_idx = :news_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				$row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			if ($bTransaction = self::attachFileDeleteMain($row[0]['news_recent_up_file_name'])) {
				$sql = 'UPDATE news_main SET news_recent_ori_file_name = NULL , news_recent_up_file_name = NULL WHERE news_idx = :news_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);


				$bTransaction = $stmt->execute();
			}

			if ($bTransaction) {
				$dbh->commit();
			}else {
				$dbh->rollback();
			}

			return $bTransaction;
		}catch(PDOExecption $e) {
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

/*
	// 첨부파일 처리
	function setAttachFile($dbh, $exh_idx) {
		try {
			$bTransaction = true;
			$exh_content = str_replace(tempUploadPath, newsUploadPath, htmlspecialchars($this->getAddslashes('exh_content')));
			$aryFileList = $this->getAddslashes('file_list');
			print_r($aryFileList);

			if (!is_null($aryFileList)) {
				$LIB_FILE = new LIB_FILE();

				foreach ($aryFileList as $value) {
					if ($value != '') {
						$aFileInfo = explode("|", $value);
						$bContentImg = true;

						echo '<br>aFileInfo2:'.$aFileInfo[2];
						//exit;
						// 본문 이미지인 경우
						if ($aFileInfo[4] == 1) {
							echo '본문';
							if (strpos($exh_content, $aFileInfo[2]) === false) {
								$bContentImg = false;
							}
						}

						if ($bContentImg && $aFileInfo[0] == 0 && file_exists(ROOT.tempUploadPath.$aFileInfo[2])) {
							$reg_date = date('Y-m-d H:i:s', time());


							$sql = 'INSERT INTO exh_upfile (exh_idx, up_file_name, ori_file_name, file_size, file_type, reg_date) VALUES(:exh_idx, :up_file_name, :ori_file_name, :file_size, :file_type, :reg_date)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
							//$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
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
							//if ($aFileInfo[4] == 2) {
							//	$sql = 'update bbs set upfile_cnt = upfile_cnt + 1 where bbs_idx = :bbs_idx and bbs_code = :bbs_code';
							//	$stmt = $dbh->prepare($sql);
							//	$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
							//	$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);

							//	if ($stmt->execute()) {
							//		$bTransaction = true;
							//	}
							//	else {
							//		$bTransaction = false;
							//	}
							//}


							// 파일 이동
							//echo 'ROOT.tempUploadPath.aFileInfo[2] : '. ROOT.tempUploadPath.$aFileInfo[2] .'<br>';
							//echo 'ROOT.newsUploadPath.aFileInfo[2] : '. ROOT.newsUploadPath.$aFileInfo[2] .'<br>';
							if ($LIB_FILE->moveFile(ROOT.tempUploadPath.$aFileInfo[2], ROOT.newsUploadPath.$aFileInfo[2])) {
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
*/
	function getList($dbh) {
		try {
			$cate = (!empty($this->getAddslashes('cate'))) ? $this->getAddslashes('cate') : null;
			$title = (!empty($this->getAddslashes('title'))) ? $this->getAddslashes('title') : null;
			$rnm = (!empty($this->getAddslashes('rnm'))) ? $this->getAddslashes('rnm') : null;
			$st =  (!empty($this->getAddslashes('st'))) ? $this->getAddslashes('st') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;
			$dps = (!empty($this->getAddslashes('dps'))) ? $this->getAddslashes('dps') : null;

			if($cate === '' ){ $cate = NULL ; }
			if($title === '' ){ $title = NULL ; }
			if($rnm === '' ){ $rnm = NULL ; }
			if($bdate === '' ){ $bdate = NULL ; }
			if($edate !== NULL ) { $edate = date('Y-m-d',strtotime($edate.'+'.'1'.' days'));    } //검색기간 마지막날 + 1일 로 조건을 맞춤
			if($sz === '' ){ $sz = NULL ; }
			if($sort === '' ){ $sort = NULL ; }
			if($od === '' ){ $od = NULL ; }
			if($dps === '' ){ $dps = NULL ; }

			//echo(" CALL up_News_list ( $page, $sz, $cate, $dps, $title, $rnm, $st, $sort, $od, $bdate, $edate ) <br>");
			$sql = 'CALL up_News_list ( :page, :sz, :cate, :dps, :title, :rnm, :st, :sort, :od, :bdate, :edate )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,								PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,										PDO::PARAM_INT);
			$stmt->bindParam(':cate', $cate,									PDO::PARAM_INT);
			$stmt->bindParam(':dps', $dps,									PDO::PARAM_STR, 20);
			$stmt->bindParam(':title', $title,										PDO::PARAM_STR, 20);
			$stmt->bindParam(':rnm', $rnm,									PDO::PARAM_STR, 20);
			$stmt->bindParam(':st', $st,											PDO::PARAM_INT);
			$stmt->bindParam(':sort', $sort,									PDO::PARAM_INT);
			$stmt->bindParam(':od', $od,										PDO::PARAM_INT);
			$stmt->bindParam(':bdate', $bdate,								PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate,								PDO::PARAM_STR, 20);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt,$total_all_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getListParagraph($dbh) {
		try
		{
		$news_idx = $this->getAddslashes('news_idx');
		$sql = 'CALL up_news_paragraph_list ( :news_idx )';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx,		PDO::PARAM_INT);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list,$total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getFrontList($dbh) {
		try {
			$cate = (!empty($this->getAddslashes('cate'))) ? $this->getAddslashes('cate') : null;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$word = (!empty($this->getAddslashes('word'))) ? $this->getAddslashes('word') : null;
			$start_row = (!empty($this->getAddslashes('start_row'))) ? $this->getAddslashes('start_row') : null; //리스트 외에 메인화면 등에서 시작위치를 설정한다.
			$recent_status = (!empty($this->getAddslashes('recent_status'))) ? $this->getAddslashes('recent_status') : null; //recent_status가 아닌 데이터를 가져온다.

			if($cate === '' ){ $cate = NULL ; }
			if($word === '' ){ $word = NULL ; }
			if($sz === '' ){ $sz = NULL ; }
			if($start_row === '' ){ $start_row = NULL ; }

			//echo(" CALL up_news_front_list ( $page, $sz, $cate, $word, $start_row ) <br>");
			$sql = 'CALL up_news_front_list ( :page, :sz, :cate, :word, :start_row, :recent_status)';
			//$sql = 'CALL up_news_front_list_new ( :page, :sz, :cate, :word, :start_row, :recent_status)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page,								PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz,										PDO::PARAM_INT);
			$stmt->bindParam(':cate', $cate,									PDO::PARAM_INT);
			$stmt->bindParam(':word', $word,								PDO::PARAM_STR, 20);
			$stmt->bindParam(':start_row', $start_row,					PDO::PARAM_INT);
			$stmt->bindParam(':recent_status', $recent_status,	PDO::PARAM_STR, 20);

		/*

			echo "page:".gettype($page);
			echo "sz:$sz";
			echo "cate:$cate";
			echo "word:$word";
			echo "start_row:$start_row";
			echo "recent_status:$recent_status";
		*/
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			$stmt = $dbh->prepare('select @total_all_cnt');
			$stmt->execute();
			$total_all_cnt = $stmt->fetchColumn();

			$dbh = null;

			return array($list, $total_cnt,$total_all_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getRecentNewsIdxs($dbh){ //리센트 뉴스 news idx 값을 가져온다.
		try {
			$sql = ' SELECT news_idx
							FROM
							(
								SELECT
									A.news_idx , A.news_category_idx,
									(SELECT orderby FROM news_category WHERE A.news_category_idx = news_category.news_category_idx LIMIT 1) AS orderby
								FROM
									news_main AS A
								WHERE
									 A.news_category_idx != 1
									AND A.news_category_idx != 2
									AND A.news_category_idx != 15
									AND A.display_status = \'Y\'
									AND A.recent_status = \'Y\'
									AND NOW() >= A.create_date
								ORDER BY orderby ASC, create_date DESC, news_idx desc
							) AS news
							GROUP BY news.news_category_idx
			';
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$arr_recent_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$i = 0 ;
			foreach($arr_recent_list as $row) {
				//echo " news_idx ".$row['news_idx'].'<br>';
				if ($i == 0 ){
					$recent_idxs =  $row['news_idx'] ;
				}else{
					$recent_idxs .= ','. $row['news_idx'] ;
				}
				$i ++ ;
			}

			$dbh = null;

			return $recent_idxs ;  // 리턴 형식은  94102,94091,94068,94092
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getFrontMainListRight($dbh) {
		//In brief / main 을 제외한 trend,people,world,trouble,episode 에서 리센트 뉴스에 적용된 것을 제외하고 최근 값 각 두개씩
		try {
			//리센트 뉴스를 가져와서 현재 노출된 리센트 뉴스를 제외한 뉴스를 카테고리 별 2개만 가져온다.
			$news_category_idx = $this->getAddslashes('cate');
			$sz = $this->getAddslashes('sz');

			$recent_idxs= self::getRecentNewsIdxs($dbh);

			$sql = '
						SELECT
							A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.source, A.display_status, A.recent_status, A.news_main_up_file_name, A.create_date,
							(	SELECT
									new_paragraph_content
								FROM news_paragraph
								WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
							) AS new_paragraph_content,
							(	SELECT
										up_file_name
									FROM news_paragraph
									WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
								) AS up_file_name,
							(SELECT orderby FROM news_category WHERE A.news_category_idx = news_category.news_category_idx LIMIT 1) AS orderby

						FROM
							news_main AS A
						WHERE
							A.news_category_idx = :news_category_idx
							AND A.display_status = \'Y\'
							AND NOW() >= A.create_date
							AND A.news_idx not in ( '. $recent_idxs .' )
						ORDER BY create_date DESC
						limit :sz
						';


			//echo '<br>',$sql.'<br>' ;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx', $news_category_idx, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);


			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;

			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function getFrontMainListMaxOneRow($dbh) {
		//In brief / main 을 제외한 trend,people,world,trouble,episode 에서 최근 값 각 하나씩
		try {
			/*
			$sql = 'SELECT * FROM (
							SELECT
								*
							FROM
								view_news_paragraph_row
							WHERE
								view_status =\'Y\'
								AND news_category_idx != 1
								AND news_category_idx != 2
								AND display_status = \'Y\'
								AND recent_status = \'Y\'
								AND NOW() >= create_date
							ORDER BY orderby ASC, news_idx DESC
						) AS news
						GROUP BY news.news_category_idx ';
			*/

			/*
						$sql = 'SELECT
							*
						FROM
						(
						SELECT
							A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.source, A.display_status, A.recent_status, A.news_main_up_file_name, A.create_date,
							(	SELECT
									new_paragraph_content
								FROM news_paragraph
								WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
							) AS new_paragraph_content,
							(	SELECT
										up_file_name
									FROM news_paragraph
									WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
								) AS up_file_name,
							(SELECT orderby FROM news_category WHERE A.news_category_idx = news_category.news_category_idx LIMIT 1) AS orderby

						FROM
							news_main AS A
						WHERE
							 A.news_category_idx != 1
							AND A.news_category_idx != 2
							AND A.display_status = \'Y\'
							AND A.recent_status = \'Y\'
							AND NOW() >= A.create_date
						ORDER BY orderby ASC, create_date DESC
						) AS news
						GROUP BY news.news_category_idx  ';

			*/

			$recent_idxs = self::getRecentNewsIdxs($dbh);

			//if ($_SERVER['REMOTE_ADDR'] == "115.94.37.77" ){
			//	echo $recent_idxs ;
			//}


			/*
			$sql = '
						SELECT
							A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.source, A.display_status, A.recent_status, A.news_main_up_file_name, A.create_date, A.news_recent_up_file_name,
							(	SELECT
									new_paragraph_content
								FROM news_paragraph
								WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
							) AS new_paragraph_content,
							(	SELECT
										up_file_name
									FROM news_paragraph
									WHERE A.news_idx = news_paragraph.news_idx  ORDER BY news_paragraph_idx ASC LIMIT 1
								) AS up_file_name,
							(SELECT orderby FROM news_category WHERE A.news_category_idx = news_category.news_category_idx LIMIT 1) AS orderby

						FROM
							news_main AS A
						WHERE
							 A.news_idx IN ('.$recent_idxs .')
						ORDER BY orderby ASC, create_date DESC
						  ';
			*/

			$sql = '
				SELECT
					A.news_idx, A.news_category_idx, A.news_title, A.reporter_name, A.source, A.display_status, A.news_main_up_file_name, A.news_recent_up_file_name, A.create_date,
					B.news_paragraph_idx, B.new_paragraph_content, B.up_file_name,
					D.news_category_name, D.orderby
				FROM
					news_main AS A
					INNER JOIN news_paragraph AS B ON A.news_idx= B.news_idx
					INNER JOIN (
						SELECT MIN(news_paragraph_idx) AS  news_paragraph_idx, news_idx FROM news_paragraph GROUP BY news_idx
					)AS C ON B.news_paragraph_idx= C.news_paragraph_idx  AND A.news_idx = C.news_idx
					INNER JOIN news_category AS D ON A.news_category_idx = D.news_category_idx
				WHERE A.display_status=\'Y\'
					AND A.news_idx IN ('.$recent_idxs .')
					AND now( )  >= A.create_date
				ORDER BY D.orderby ASC, A.create_date DESC
			  ';


			$stmt = $dbh->prepare($sql);

			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;

			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	function getRead($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$read_count = $this->getAddslashes('read_count');
			//echo("news_idx : $news_idx <br> ");

			if (!empty($read_count)){
				$sql = ' UPDATE news_main SET view_count = view_count +1  where news_idx = :news_idx  ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
				$stmt->execute();
			}
			//echo("news_idx : $news_idx <br> ");

			$sql = 'select * from view_news_main where news_idx = :news_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
			//$stmt->execute();

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				foreach($row as $key => $val) {
					$this->setAttr($key, $val);
				}

				//이전글 // 다음글
				if ($news_category_idx == 2 ){ //In brief  는 news main 을 제외한 모든 카테고리의 뉴스를 처리한다.
					$sql = 'SELECT news_idx FROM news_main
							WHERE
								news_idx > :news_idx
								AND news_category_idx != 1
								AND  display_status=\'Y\'
							ORDER BY create_date ASC limit 1 ';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':news_idx', $news_idx,											 PDO::PARAM_INT);
				}else{
					$sql = 'SELECT news_idx FROM news_main
								WHERE
									news_idx > :news_idx
									AND news_category_idx = :news_category_idx
									AND  display_status=\'Y\'
								ORDER BY create_date ASC limit 1 ';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':news_idx', $news_idx,											 PDO::PARAM_INT);
					$stmt->bindParam(':news_category_idx', $news_category_idx,			 PDO::PARAM_STR, 20);
				}

				$stmt->execute();
				$next_idx = $stmt->fetchColumn();
				//echo 'next_idx : '.$next_idx.'<br>';
				$this->setAttr('next_idx', $next_idx);

				if ($news_category_idx == 2 ){ //In brief  는 news main 을 제외한 모든 카테고리의 뉴스를 처리한다.
					$sql = 'SELECT news_idx FROM news_main
								WHERE
									news_idx < :news_idx
									AND news_category_idx != 1
									AND  display_status=\'Y\'
								ORDER BY create_date DESC limit 1 ';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':news_idx', $news_idx,											 PDO::PARAM_INT);
				}else{
					$sql = 'SELECT news_idx FROM news_main
								WHERE
									news_idx < :news_idx
									AND news_category_idx = :news_category_idx
									AND  display_status=\'Y\'
								ORDER BY create_date DESC limit 1 ';
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':news_idx', $news_idx,											 PDO::PARAM_INT);
					$stmt->bindParam(':news_category_idx', $news_category_idx,			 PDO::PARAM_STR, 20);
				}
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

	function getFrontRead($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');


			$sql = 'select * from view_news_paragraph_row where news_idx = :news_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
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

	function getFrontReadMainNews($dbh) {
		try {
			//$news_idx = $this->getAddslashes('news_idx');
			//echo("news_idx : $news_idx <br> ");

			//$sql = 'select * from view_news_paragraph_row where news_category_idx = 1 and  display_status =\'Y\' AND now( ) >= create_date ORDER BY create_date DESC LIMIT 1';

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
							AND A.news_category_idx = 1
							AND now( )  >= A.create_date
						ORDER BY A.create_date DESC
						LIMIT  1
					  ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
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


	function getEdit($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');
			$sql = 'select * from view_news_main where news_idx = :news_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
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

	// 물리적 파일 삭제 // 첨부파일 News 테이블 용
	function attachFileDeleteMain($up_file_name) {
		try {
			$bTransaction = true;

			if ($bTransaction) {
				if (!empty($up_file_name)) {
						LIB_FILE::DeleteFile(ROOT.newsUploadPath.$up_file_name);
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'s_'.$row['up_file_name']); //섬네일 삭제
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'m_'.$row['up_file_name']); //섬네일 삭제
				}
				unset($LIB_FILE);
			}
			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}



	// 첨부파일 정보 가져오기 // News 테이블 용
	function getFileInfoSelf($dbh, $idx) {
		try {
			$sql = 'SELECT news_paragraph_idx, up_file_name, ori_file_name FROM news_paragraph WHERE news_paragraph_idx = :news_paragraph_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_paragraph_idx', $idx, PDO::PARAM_INT);

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
	// 물리적 파일 삭제 // 첨부파일 News 테이블 용
	function attachFileDeleteSelf($dbh, $idx) {
		try {
			$bTransaction = true;
			$aryFileInfo = self::getFileInfoSelf($dbh, $idx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					if (!empty($row['up_file_name'])) {
						LIB_FILE::DeleteFile(ROOT.newsUploadPath.$row['up_file_name']);
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'s_'.$row['up_file_name']); //섬네일 삭제
						//LIB_FILE::DeleteFile(ROOT.newsUploadPath.'m_'.$row['up_file_name']); //섬네일 삭제
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



// 첨부파일 정보 가져오기
	function getFileInfo($dbh, $news_idx,  $file_type = NULL) {
		try {
			if (is_null($file_type)) {
				$sql = 'SELECT news_paragraph_idx, up_file_name, ori_file_name FROM news_paragraph WHERE news_idx = :news_idx ';
			}
			else {
				$sql = 'SELECT news_paragraph_idx, up_file_name, ori_file_name FROM news_paragraph WHERE news_idx = :news_idx  and file_type = :file_type';
			}

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
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

	// 데이터 및 물리적 파일 삭제 //뉴스 단락 첨부파일
	function attachFileDelete($dbh, $news_idx) {
		try {
			//echo "bbs_code:$bbs_code";

			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $news_idx);

			$sql = 'delete from news_paragraph where news_idx = :news_idx  and news_paragraph_idx = :news_paragraph_idx';

			foreach($aryFileInfo as $value) {
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);
				$stmt->bindParam(':news_paragraph_idx', $value['news_paragraph_idx'], PDO::PARAM_INT);
				if ($stmt->execute()) {
					$bTransaction = true;
					//echo "chk<br>";
				}
				else {
					//echo 'chk2<br>';
					$bTransaction = false;
					break;
				}
			}

			if ($bTransaction) {
				$LIB_FILE = new LIB_FILE();
				foreach($aryFileInfo as $value) {
					if (!empty($value['up_file_name'])){
						$LIB_FILE->DeleteFile(ROOT.newsUploadPath.$value['up_file_name']);
					}
				}
			}

			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}

	}


	// 선택한 첨부파일 삭제(수정 모드에서)
	function selectFileDelete($dbh) {
		try {
			$exh_idx = $this->getAddslashes('exh_idx');
			$exh_upfile_idx = $this->getAddslashes('exh_upfile_idx');

			$bTransaction = true;
			$dbh->beginTransaction();
			$sql = 'SELECT up_file_name, file_type FROM exh_upfile WHERE exh_idx = :exh_idx  and exh_upfile_idx = :exh_upfile_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
			$stmt->bindParam(':exh_upfile_idx', $exh_upfile_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {

				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$sql = 'DELETE FROM exh_upfile WHERE exh_idx = :exh_idx and exh_upfile_idx = :exh_upfile_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':exh_idx', $exh_idx, PDO::PARAM_INT);
				$stmt->bindParam(':exh_upfile_idx', $exh_upfile_idx, PDO::PARAM_INT);


				if ($stmt->execute()) {
					// 첨부파일 이라면
					if ($row['file_type'] == 2) {
						/*
						$sql = 'UPDATE bbs SET upfile_cnt = upfile_cnt - 1 WHERE bbs_idx = :bbs_idx and bbs_code = :bbs_code';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':bbs_idx', $bbs_idx, PDO::PARAM_INT);
						$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
						$bTransaction = $stmt->execute();
						*/
					}

					$LIB_FILE = new LIB_FILE();
					$LIB_FILE->DeleteFile(ROOT.newsUploadPath.$row['up_file_name']);
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

	function getTotalCnt($dbh) {
		try {
			$display_status = 'Y';
			$news_category_idx = $this->getAddslashes('cate');
			$sql = 'SELECT COUNT(news_idx) FROM news_main WHERE news_category_idx = :news_category_idx AND display_status = :display_status';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx', $news_category_idx, PDO::PARAM_INT);
			$stmt->bindParam(':display_status', $display_status, PDO::PARAM_STR);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchColumn();
			}
			else {
				return 0;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	//뉴스 단락 1개 가져오기
	function getNewsPragraphOne($dbh) {
		try {
			$news_idx = $this->getAddslashes('news_idx');
			$sql = 'SELECT new_paragraph_content FROM news_paragraph WHERE news_idx = :news_idx order by news_paragraph_idx ASC limit 1 ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_idx', $news_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchColumn();
			}
			else {
				return null;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

} // End Class
