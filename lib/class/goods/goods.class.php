<?php
class Goods
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value){
		$this->attr[$key] = $value;
		echo "<br>set:$key:".gettype($value);
		echo "<br>set:$key:".$value;
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


	function insert($dbh) {
		try {

			$goods_subject = $this->getAddslashes('goods_subject');
			$goods_size = $this->getAddslashes('goods_size');
			$goods_color = $this->getAddslashes('goods_color');
			$goods_type = $this->getAddslashes('goods_type');
			$artist_idx = $this->getAddslashes('artist_idx');
			$goods_name = $this->getAddslashes('goods_name');
			$goods_make_year = $this->getAddslashes('goods_make_year');
			$goods_make_type = $this->getAddslashes('goods_make_type');
			$goods_frame_state = $this->getAddslashes('goods_frame_state');
			$goods_width_size = $this->getAddslashes('goods_width_size');
			$goods_height_size = $this->getAddslashes('goods_height_size');
			$goods_sell_price = $this->getAddslashes('goods_sell_price');
			$goods_lental_state = $this->getAddslashes('goods_lental_state');
			$recommend_idx = $this->getAddslashes('recommend_idx');
			$goods_description = $this->getAddslashes('goods_description');
			$goods_material = $this->getAddslashes('goods_material');
			$goods_exhibit_year = $this->getAddslashes('goods_exhibit_year');
			$goods_exhibit_item = $this->getAddslashes('goods_exhibit_item');
			$goods_display = $this->getAddslashes('goods_display');
			$goods_point = $this->getAddslashes('goods_point');
			$goods_maker = $this->getAddslashes('goods_maker');
			$goods_origin = $this->getAddslashes('goods_origin');
			$delivery_type = $this->getAddslashes('delivery_type');
			$delivery_price = $this->getAddslashes('delivery_price');
			$freight_collect_price = $this->getAddslashes('freight_collect_price');
			$goods_cnt_type = $this->getAddslashes('goods_cnt_type');
			$goods_cnt = $this->getAddslashes('goods_cnt');
			$order_min_cnt = $this->getAddslashes('order_min_cnt');
			$order_max_cnt = $this->getAddslashes('order_max_cnt');
			$img_big = $this->getAddslashes('img_big');
			$img_big_name = $this->getAddslashes('img_big_name');
			$img_middle = $this->getAddslashes('img_middle');
			$img_middle_name = $this->getAddslashes('img_middle_name');
			$img_small = $this->getAddslashes('img_small');
			$img_small_name = $this->getAddslashes('img_small_name');
			$sold_out_state = $this->getAddslashes('sold_out_state');
			$del_state = $this->getAddslashes('del_state');

/*
	goods_idx
	goods_subject
	goods_size
	goods_color
	goods_type
	artist_idx
	goods_name
	goods_make_year
	goods_make_type
	goods_frame_state
	goods_width_size
	goods_height_size
	goods_sell_price
	goods_lental_state
	recommend_idx
	goods_description
	goods_material
	goods_exhibit_year
	goods_exhibit_item
	goods_display
	goods_point
	goods_maker
	goods_origin
	delivery_type
	delivery_price
	freight_collect_price
	goods_cnt_type
	goods_cnt
	order_min_cnt
	order_max_cnt
	img_big
	img_big_name
	img_middle
	img_middle_name
	img_small
	img_small_name
	sold_out_state
	del_state
*/





			$sql = 'INSERT INTO goods(
								goods_subject,
								goods_size,
								goods_color,
								goods_type,
								artist_idx,
								goods_name,
								goods_make_year,
								goods_make_type,
								goods_frame_state,
								goods_width_size,
								goods_height_size,
								goods_sell_price,
								goods_lental_state,
								recommend_idx,
								goods_description,
								goods_material,
								goods_exhibit_year,
								goods_exhibit_item,
								goods_display,
								goods_point,
								goods_maker,
								goods_origin,
								delivery_type,
								delivery_price,
								freight_collect_price,
								goods_cnt_type,
								goods_cnt,
								order_min_cnt,
								order_max_cnt,
								img_big,
								img_big_name,
								img_middle,
								img_middle_name,
								img_small,
								img_small_name,
								sold_out_state
								) VALUES(
								:goods_subject,
								:goods_size,
								:goods_color,
								:goods_type,
								:artist_idx,
								:goods_name,
								:goods_make_year,
								:goods_make_type,
								:goods_frame_state,
								:goods_width_size,
								:goods_height_size,
								:goods_sell_price,
								:goods_lental_state,
								:recommend_idx,
								:goods_description,
								:goods_material,
								:goods_exhibit_year,
								:goods_exhibit_item,
								:goods_display,
								:goods_point,
								:goods_maker,
								:goods_origin,
								:delivery_type,
								:delivery_price,
								:freight_collect_price,
								:goods_cnt_type,
								:goods_cnt,
								:order_min_cnt,
								:order_max_cnt,
								:img_big,
								:img_big_name,
								:img_middle,
								:img_middle_name,
								:img_small,
								:img_small_name,
								:sold_out_state
								)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 2);
			$stmt->bindParam(':goods_type', $goods_type, PDO::PARAM_STR, 1);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);
			$stmt->bindParam(':goods_make_year', $goods_make_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':goods_make_type', $goods_make_type, PDO::PARAM_STR, 255);
			$stmt->bindParam(':goods_frame_state', $goods_frame_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_width_size', $goods_width_size, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_height_size', $goods_height_size, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_sell_price', $goods_sell_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_lental_state', $goods_lental_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':recommend_idx', $recommend_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_description', $goods_description, PDO::PARAM_STR);
			$stmt->bindParam(':goods_material', $goods_material, PDO::PARAM_STR, 255);
			$stmt->bindParam(':goods_exhibit_year', $goods_exhibit_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':goods_exhibit_item', $goods_exhibit_item, PDO::PARAM_STR, 100);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_point', $goods_point, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_maker', $goods_maker, PDO::PARAM_STR, 50);
			$stmt->bindParam(':goods_origin', $goods_origin, PDO::PARAM_STR, 50);
			$stmt->bindParam(':delivery_type', $delivery_type, PDO::PARAM_INT, 1);
			$stmt->bindParam(':delivery_price', $delivery_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':freight_collect_price', $freight_collect_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_cnt_type', $goods_cnt_type, PDO::PARAM_INT, 3);
			$stmt->bindParam(':goods_cnt', $goods_cnt, PDO::PARAM_INT, 11);
			$stmt->bindParam(':order_min_cnt', $order_min_cnt, PDO::PARAM_INT, 11);
			$stmt->bindParam(':order_max_cnt', $order_max_cnt, PDO::PARAM_INT, 11);
			$stmt->bindParam(':img_big', $img_big, PDO::PARAM_STR, 25);
			$stmt->bindParam(':img_big_name', $img_big_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':img_middle', $img_middle, PDO::PARAM_STR, 25);
			$stmt->bindParam(':img_middle_name', $img_middle_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':img_small', $img_small, PDO::PARAM_STR, 25);
			$stmt->bindParam(':img_small_name', $img_small_name, PDO::PARAM_STR, 255);
			$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				echo "chk1";
				return true;
			}
			else {
				echo "chk2";
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
			//$bTransaction = false;
			//$dbh->beginTransaction();

			$work_idx = $this->getAddslashes('work_idx');
			$work_medium = $this->getAddslashes('work_medium');
			$work_subject = $this->getAddslashes('work_subject');
			$work_size = $this->getAddslashes('work_size');
			$artist_idx = $this->getAddslashes('artist_idx');
			$work_name = $this->getAddslashes('work_name');
			$make_year = $this->getAddslashes('make_year');
			$make_type = $this->getAddslashes('make_type');
			$is_frame = $this->getAddslashes('is_frame');
			$width_size = $this->getAddslashes('width_size');
			$height_size = $this->getAddslashes('height_size');
			$buy_price = $this->getAddslashes('buy_price');
			$is_buy = $this->getAddslashes('is_buy');
			$lental_price = $this->getAddslashes('lental_price');
			$is_lental = $this->getAddslashes('is_lental');
			$work_description = $this->getAddslashes('work_description');
			$work_material = $this->getAddslashes('work_material');
			$exhibit_year = $this->getAddslashes('exhibit_year');
			$exhibit_item = $this->getAddslashes('exhibit_item');
			$work_img_0 = (!empty($this->getAddslashes('work_img_0'))) ? $this->getAddslashes('work_img_0') : null;
			$work_img_1 = (!empty($this->getAddslashes('work_img_1'))) ? $this->getAddslashes('work_img_1') : null;
			$work_img_2 = (!empty($this->getAddslashes('work_img_2'))) ? $this->getAddslashes('work_img_2') : null;
			$work_img_3 = (!empty($this->getAddslashes('work_img_3'))) ? $this->getAddslashes('work_img_3') : null;
			$work_img_4 = (!empty($this->getAddslashes('work_img_4'))) ? $this->getAddslashes('work_img_4') : null;
			$work_img_5 = (!empty($this->getAddslashes('work_img_5'))) ? $this->getAddslashes('work_img_5') : null;
			$work_img_6 = (!empty($this->getAddslashes('work_img_6'))) ? $this->getAddslashes('work_img_6') : null;
			$work_img_7 = (!empty($this->getAddslashes('work_img_7'))) ? $this->getAddslashes('work_img_7') : null;
			$work_img_8 = (!empty($this->getAddslashes('work_img_8'))) ? $this->getAddslashes('work_img_8') : null;
			$work_img_9 = (!empty($this->getAddslashes('work_img_9'))) ? $this->getAddslashes('work_img_9') : null;
			$work_img_10 = (!empty($this->getAddslashes('work_img_10'))) ? $this->getAddslashes('work_img_10') : null;

			$sql = 'UPDATE goods SET
								goods_subject = :goods_subject,
								goods_size = :goods_size,
								goods_color = :goods_color,
								goods_type = :goods_type,
								artist_idx = :artist_idx,
								goods_name = :goods_name,
								goods_make_year = :goods_make_year,
								goods_make_type = :goods_make_type,
								goods_frame_state = :goods_frame_state,
								goods_width_size = :goods_width_size,
								goods_height_size = :goods_height_size,
								goods_sell_price = :goods_sell_price,
								goods_lental_state = :goods_lental_state,
								recommend_idx = :recommend_idx,
								goods_description = :goods_description,
								goods_material = :goods_material,
								goods_exhibit_year = :goods_exhibit_year,
								goods_exhibit_item = :goods_exhibit_item,
								goods_display = :goods_display,
								goods_point = :goods_point,
								goods_maker = :goods_maker,
								goods_origin = :goods_origin,
								delivery_type = :delivery_type,
								delivery_price = :delivery_price,
								freight_collect_price = :freight_collect_price,
								goods_cnt_type = :goods_cnt_type,
								goods_cnt = :goods_cnt,
								order_min_cnt = :order_min_cnt,
								order_max_cnt = :order_max_cnt,
								img_big = :img_big,
								img_big_name = :img_big_name,
								img_middle = :img_middle,
								img_middle_name = :img_middle_name,
								img_small = :img_small,
								img_small_name = :img_small_name,
								sold_out_state = :sold_out_state,
								modify_date = :modify_date
						WHERE goods_idx = :goods_idx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':work_medium', $work_medium, PDO::PARAM_INT, 1);
			$stmt->bindParam(':work_subject', $work_subject, PDO::PARAM_INT, 1);
			$stmt->bindParam(':work_size', $work_size, PDO::PARAM_INT, 1);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':work_name', $work_name, PDO::PARAM_STR, 100);
			$stmt->bindParam(':make_year', $make_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':make_type', $make_type, PDO::PARAM_STR, 255);
			$stmt->bindParam(':is_frame', $is_frame, PDO::PARAM_STR, 1);
			$stmt->bindParam(':width_size', $width_size, PDO::PARAM_STR, 6);
			$stmt->bindParam(':height_size', $height_size, PDO::PARAM_STR, 6);
			$stmt->bindParam(':buy_price', $buy_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':is_buy', $is_buy, PDO::PARAM_BOOL, 1);
			$stmt->bindParam(':lental_price', $lental_price, PDO::PARAM_STR, 11);
			$stmt->bindParam(':is_lental', $is_lental, PDO::PARAM_BOOL, 1);
			$stmt->bindParam(':work_description', $work_description, PDO::PARAM_STR);
			$stmt->bindParam(':work_material', $work_material, PDO::PARAM_STR, 255);
			$stmt->bindParam(':exhibit_year', $exhibit_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':exhibit_item', $exhibit_item, PDO::PARAM_STR, 255);
			$stmt->bindParam(':work_img_0', $work_img_0, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_1', $work_img_1, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_2', $work_img_2, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_3', $work_img_3, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_4', $work_img_4, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_5', $work_img_5, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_6', $work_img_6, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_7', $work_img_7, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_8', $work_img_8, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_9', $work_img_9, PDO::PARAM_STR, 50);
			$stmt->bindParam(':work_img_10', $work_img_10, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR, 20);
			$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT, 11);
			//$stmt->execute();

			//$bTransaction = Bbs::setAttachFile($dbh, $bbs_idx, $bbs_code);

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
			$work_idx = $this->getAddslashes('work_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDelete($dbh, $work_idx)) {
				$sql = 'DELETE FROM work_info WHERE work_idx = :work_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT);
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
			$aWorkIdx = $this->getAddslashes('work_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'DELETE FROM work_info WHERE work_idx = :work_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT);

			foreach($aWorkIdx as $work_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $work_idx)) {
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
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$st = $this->getAddslashes('st'); // and / or
			$nm = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$wnm = (!empty($this->getAddslashes('wnm'))) ? $this->getAddslashes('wnm') : null;
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			//$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			//$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;

			echo "<br>page:$page";
			echo "<br>sz:$sz";
			echo "<br>st:$st";
			echo "<br>nm:".gettype($nm);
			echo "<br>wnm:".gettype($wnm);
			echo "<br>bdate:".gettype($bdate);
			echo "<br>edate:".gettype($edate);

			$sql = 'CALL up_work_list (:page, :sz, :st, :nm, :wnm, :bdate, :edate)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':st', $st, PDO::PARAM_INT, 1);
			$stmt->bindParam(':nm', $nm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':wnm', $wnm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 20);

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
			$work_idx = $this->getAddslashes('work_idx');
			$sql = 'select a.*, b.artist_name from work_info a inner join artist_info b on a.artist_idx = b.artist_idx where a.work_idx = :work_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT);

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

	function getEdit($dbh) {
		try {
			$work_idx = $this->getAddslashes('work_idx');
			echo $work_idx;
			$sql = 'select a.work_idx, a.work_medium,a.work_subject, a.work_size, a.artist_idx, b.artist_name, a.work_name, a.make_year, a.make_type, a.is_frame, a.width_size, a.height_size, a.buy_price, a.is_buy, a.lental_price, a.is_lental, a.work_description, a.work_material, a.exhibit_year, a.exhibit_item, a.work_img_0, a.work_img_1, a.work_img_2, a.work_img_3, a.work_img_4, a.work_img_5, a.work_img_6, a.work_img_7, a.work_img_8, a.work_img_9, a.work_img_10 from work_info a inner join artist_info b on a.artist_idx = b.artist_idx where a.work_idx = :work_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT);

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
	function getFileInfo($dbh, $work_idx) {
		try {
			$sql = 'SELECT work_idx, work_img_0, work_img_1, work_img_2, work_img_3, work_img_4, work_img_5, work_img_6, work_img_7, work_img_8, work_img_9, work_img_10 FROM work_info WHERE work_idx = :work_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':work_idx', $work_idx, PDO::PARAM_INT);

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
	function attachFileDelete($dbh, $work_idx) {
		try {
			//echo "bbs_idx:$bbs_idx";
			//echo "bbs_code:$bbs_code";

			$bTransaction = true;
			$aryFileInfo = self::getFileInfo($dbh, $work_idx);

			if ($bTransaction) {
				foreach($aryFileInfo as $row) {
					for($i=0; $i<=10; $i++) {
						if (!empty($row['work_img_'.$i.''])) {
							LIB_FILE::DeleteFile(ROOT.workUploadPath.$row['work_img_'.$i.'']);
							LIB_FILE::DeleteFile(ROOT.workUploadPath.'s'.$row['work_img_'.$i.'']);
						}
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


	// 첨부파일 정보 가져오기
	function getLimitedNbr($dbh) {
		try {
			$del_state = 'N';
			//$sql = 'SELECT limited_nbr FROM orders AS a INNER JOIN orders_info AS b ON a.ord_nbr = b.ord_nbr WHERE tran_state > 1 AND b.limited_nbr IS NOT NULL';
			$sql = 'SELECT limited_nbr FROM orders AS a INNER JOIN orders_info AS b ON a.ord_nbr = b.ord_nbr WHERE a.del_state = :del_state AND b.limited_nbr IS NOT NULL';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

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

}
?>