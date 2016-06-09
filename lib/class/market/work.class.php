<?php
class Work
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


	function insert($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$category_idx = $this->getAddslashes('category_idx');
			$goods_medium = $this->getAddslashes('goods_medium');
			$goods_subject = $this->getAddslashes('goods_subject');
			$goods_size = $this->getAddslashes('goods_size');
			$goods_color = $this->getAddslashes('goods_color');
			$artist_idx = $this->getAddslashes('artist_idx');
			$goods_name = $this->getAddslashes('goods_name');
			$goods_make_year = $this->getAddslashes('goods_make_year');
			$goods_make_type = $this->getAddslashes('goods_make_type');
			$goods_frame_state = $this->getAddslashes('goods_frame_state');
			$goods_width = (!empty($this->getAddslashes('goods_width'))) ? $this->getAddslashes('goods_width') : null;
			$goods_depth = (!empty($this->getAddslashes('goods_depth'))) ? $this->getAddslashes('goods_depth') : null ;
			$goods_height = (!empty($this->getAddslashes('goods_height'))) ? $this->getAddslashes('goods_height') : null;
			$goods_sell_price = $this->getAddslashes('goods_sell_price');
			$goods_rental_price = (!empty($this->getAddslashes('goods_rental_price'))) ? $this->getAddslashes('goods_rental_price') : null;
			$goods_lental_state = $this->getAddslashes('goods_lental_state');
			$recommend_idx =  (!empty($this->getAddslashes('recommend_idx'))) ? $this->getAddslashes('recommend_idx') : null;
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
			$goods_list_img = $this->getAddslashes('goods_list_img');
			$sold_out_state = $this->getAddslashes('sold_out_state');
			$del_state = $this->getAddslashes('del_state');
			$goods_add_img1 = $this->getAddslashes('goods_add_img1');
			$goods_add_img2 = $this->getAddslashes('goods_add_img2');
			$goods_add_img3 = $this->getAddslashes('goods_add_img3');
			$goods_add_img4 = $this->getAddslashes('goods_add_img4');
			$goods_add_img5 = $this->getAddslashes('goods_add_img5');
			$goods_add_img6 = $this->getAddslashes('goods_add_img6');
			$goods_add_img7 = $this->getAddslashes('goods_add_img7');
			$goods_add_img8 = $this->getAddslashes('goods_add_img8');
			$goods_add_img9 = $this->getAddslashes('goods_add_img9');
			$goods_add_img10 = $this->getAddslashes('goods_add_img10');

			$goods_scale_img = $this->getAddslashes('goods_scale_img');

			$price_exchange_text = (!empty($this->getAddslashes('price_exchange_text'))) ? $this->getAddslashes('price_exchange_text') : null;
			$price_exchange_state = $this->getAddslashes('price_exchange_state');
			$rental_exchange_text = (!empty($this->getAddslashes('rental_exchange_text'))) ? $this->getAddslashes('rental_exchange_text') : null;
			$rental_exchange_state = $this->getAddslashes('rental_exchange_state');

			$is_rental = $this->getAddslashes('is_rental');
			$rental_memo = (!empty($this->getAddslashes('rental_memo'))) ? $this->getAddslashes('rental_memo') : null;


			$aGoodsAddImg = array($goods_add_img1, $goods_add_img2, $goods_add_img3, $goods_add_img4, $goods_add_img5, $goods_add_img6, $goods_add_img7, $goods_add_img8, $goods_add_img9, $goods_add_img10);
//echo $goods_scale_img ;
//print_r($aGoodsAddImg);


			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'INSERT INTO goods(
								category_idx,
								goods_medium,
								goods_subject,
								goods_size,
								goods_color,
								artist_idx,
								goods_name,
								goods_make_year,
								goods_make_type,
								goods_frame_state,
								goods_width,
								goods_depth,
								goods_height,
								goods_sell_price,
								price_exchange_text,
								price_exchange_state,
								rental_exchange_text,
								rental_exchange_state,
								is_rental,
								rental_memo,
								goods_rental_price,
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
								goods_list_img,
								goods_scale_img,
								sold_out_state,
								del_state
								) VALUES(
								:category_idx,
								:goods_medium,
								:goods_subject,
								:goods_size,
								:goods_color,
								:artist_idx,
								:goods_name,
								:goods_make_year,
								:goods_make_type,
								:goods_frame_state,
								:goods_width,
								:goods_depth,
								:goods_height,
								:goods_sell_price,
								:price_exchange_text,
								:price_exchange_state,
								:rental_exchange_text,
								:rental_exchange_state,
								:is_rental,
								:rental_memo,
								:goods_rental_price,
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
								:goods_list_img,
								:goods_scale_img,
								:sold_out_state,
								:del_state
								)';


			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 2);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);
			$stmt->bindParam(':goods_make_year', $goods_make_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':goods_make_type', $goods_make_type, PDO::PARAM_STR, 255);
			$stmt->bindParam(':goods_frame_state', $goods_frame_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_width', $goods_width, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_depth', $goods_depth, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_height', $goods_height, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_sell_price', $goods_sell_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':price_exchange_text', $price_exchange_text, PDO::PARAM_STR, 100);
			$stmt->bindParam(':price_exchange_state', $price_exchange_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':rental_exchange_text', $rental_exchange_text, PDO::PARAM_STR, 100);
			$stmt->bindParam(':rental_exchange_state', $rental_exchange_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':is_rental', $is_rental, PDO::PARAM_STR, 1);
			$stmt->bindParam(':rental_memo', $rental_memo, PDO::PARAM_STR);
			$stmt->bindParam(':goods_rental_price', $goods_rental_price, PDO::PARAM_STR, 10);
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
			$stmt->bindParam(':goods_list_img', $goods_list_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':goods_scale_img', $goods_scale_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute()) {
				$bTransaction = true;
				$goods_idx = $dbh->lastInsertId();
				foreach($aGoodsAddImg as $val) {
					if (!empty($val)) {
						$sql = 'INSERT INTO goods_add_img (goods_idx, goods_img) VALUES (:goods_idx, :goods_img)';
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
						$stmt->bindParam(':goods_img', $val, PDO::PARAM_STR, 25);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
						else {
							$bTransaction = false;
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
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function update($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$goods_medium = $this->getAddslashes('goods_medium');
			$goods_subject = $this->getAddslashes('goods_subject');
			$goods_size = $this->getAddslashes('goods_size');
			$goods_color = $this->getAddslashes('goods_color');
			$artist_idx = $this->getAddslashes('artist_idx');
			$goods_name = $this->getAddslashes('goods_name');
			$goods_make_year = $this->getAddslashes('goods_make_year');
			$goods_make_type = $this->getAddslashes('goods_make_type');
			$goods_frame_state = $this->getAddslashes('goods_frame_state');
			$goods_width = $this->getAddslashes('goods_width');
			$goods_depth = $this->getAddslashes('goods_depth');
			$goods_height = $this->getAddslashes('goods_height');
			$goods_sell_price = $this->getAddslashes('goods_sell_price');
			$goods_rental_price = (!empty($this->getAddslashes('goods_rental_price'))) ? $this->getAddslashes('goods_rental_price') : null;
			$goods_lental_state = $this->getAddslashes('goods_lental_state');
			$recommend_idx =  (!empty($this->getAddslashes('recommend_idx'))) ? $this->getAddslashes('recommend_idx') : null;
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
			$goods_list_img = $this->getAddslashes('goods_list_img');
			$sold_out_state = $this->getAddslashes('sold_out_state');
			$del_state = $this->getAddslashes('del_state');
			$goods_add_img1 = $this->getAddslashes('goods_add_img1');
			$goods_add_img2 = $this->getAddslashes('goods_add_img2');
			$goods_add_img3 = $this->getAddslashes('goods_add_img3');
			$goods_add_img4 = $this->getAddslashes('goods_add_img4');
			$goods_add_img5 = $this->getAddslashes('goods_add_img5');
			$goods_add_img6 = $this->getAddslashes('goods_add_img6');
			$goods_add_img7 = $this->getAddslashes('goods_add_img7');
			$goods_add_img8 = $this->getAddslashes('goods_add_img8');
			$goods_add_img9 = $this->getAddslashes('goods_add_img9');
			$goods_add_img10 = $this->getAddslashes('goods_add_img10');

			$goods_scale_img = $this->getAddslashes('goods_scale_img');

			$price_exchange_text = (!empty($this->getAddslashes('price_exchange_text'))) ? $this->getAddslashes('price_exchange_text') : null;
			$price_exchange_state = $this->getAddslashes('price_exchange_state');
			$rental_exchange_text = (!empty($this->getAddslashes('rental_exchange_text'))) ? $this->getAddslashes('rental_exchange_text') : null;
			$rental_exchange_state = $this->getAddslashes('rental_exchange_state');
			$is_rental = $this->getAddslashes('is_rental');
			$rental_memo = (!empty($this->getAddslashes('rental_memo'))) ? $this->getAddslashes('rental_memo') : null;


			$aGoodsAddImg = array($goods_add_img1, $goods_add_img2, $goods_add_img3, $goods_add_img4, $goods_add_img5, $goods_add_img6, $goods_add_img7, $goods_add_img8, $goods_add_img9, $goods_add_img10);
			$modify_date = date('Y-m-d H:i:s');
			$bTransaction = false;
			$dbh->beginTransaction();

			$sql = 'UPDATE goods SET
								goods_medium = :goods_medium,
								goods_subject = :goods_subject,
								goods_size = :goods_size,
								goods_color = :goods_color,
								artist_idx = :artist_idx,
								goods_name = :goods_name,
								goods_make_year = :goods_make_year,
								goods_make_type = :goods_make_type,
								goods_frame_state = :goods_frame_state,
								goods_width = :goods_width,
								goods_depth = :goods_depth,
								goods_height = :goods_height,
								goods_sell_price = :goods_sell_price,
								price_exchange_text = :price_exchange_text,
								price_exchange_state = :price_exchange_state,
								rental_exchange_text = :rental_exchange_text,
								rental_exchange_state = :rental_exchange_state,
								is_rental = :is_rental,
								rental_memo = :rental_memo,
								goods_rental_price = :goods_rental_price,
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
								goods_list_img = :goods_list_img,
								goods_scale_img = :goods_scale_img,
								sold_out_state = :sold_out_state,
								del_state = :del_state,
								modify_date =:modify_date
						WHERE goods_idx = :goods_idx';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_medium', $goods_medium, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_subject', $goods_subject, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_size', $goods_size, PDO::PARAM_INT, 1);
			$stmt->bindParam(':goods_color', $goods_color, PDO::PARAM_INT, 2);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_name', $goods_name, PDO::PARAM_STR, 200);
			$stmt->bindParam(':goods_make_year', $goods_make_year, PDO::PARAM_STR, 4);
			$stmt->bindParam(':goods_make_type', $goods_make_type, PDO::PARAM_STR, 255);
			$stmt->bindParam(':goods_frame_state', $goods_frame_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_width', $goods_width, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_depth', $goods_depth, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_height', $goods_height, PDO::PARAM_STR, 6);
			$stmt->bindParam(':goods_sell_price', $goods_sell_price, PDO::PARAM_INT, 11);
			$stmt->bindParam(':price_exchange_text', $price_exchange_text, PDO::PARAM_STR, 100);
			$stmt->bindParam(':price_exchange_state', $price_exchange_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':rental_exchange_text', $rental_exchange_text, PDO::PARAM_STR, 100);
			$stmt->bindParam(':rental_exchange_state', $rental_exchange_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':is_rental', $is_rental, PDO::PARAM_STR, 1);
			$stmt->bindParam(':rental_memo', $rental_memo, PDO::PARAM_STR);
			$stmt->bindParam(':goods_rental_price', $goods_rental_price, PDO::PARAM_STR, 10);
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
			$stmt->bindParam(':goods_list_img', $goods_list_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':goods_scale_img', $goods_scale_img, PDO::PARAM_STR, 25);
			$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':modify_date', $modify_date, PDO::PARAM_STR, 20);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

			if ($stmt->execute()) {
				$bTransaction = true;
				$sql = 'delete from goods_add_img where goods_idx = :goods_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

				if ($stmt->execute()) {
					$bTransaction = true;
					foreach($aGoodsAddImg as $val) {
						if (!empty($val)) {
							$sql = 'INSERT INTO goods_add_img (goods_idx, goods_img) VALUES (:goods_idx, :goods_img)';
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
							$stmt->bindParam(':goods_img', $val, PDO::PARAM_STR, 25);

							if ($stmt->execute()) {
								$bTransaction = true;
							}
							else {
								$bTransaction = false;
							}
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
		catch(PDOExecption $e) {
			print 'Error!: ' . $e->getMessage() . '</br>';
			return false;
		}
	}

	function delete($dbh) {
		try {
			$del_state = 'Y';
			$goods_idx = $this->getAddslashes('goods_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			if ($bTransaction = self::attachFileDelete($dbh, $goods_idx)) {
				//$sql = 'DELETE FROM goods WHERE goods_idx = :goods_idx';
				$sql = 'UPDATE goods SET del_state = :del_state WHERE goods_idx = :goods_idx';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
				$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);
				$bTransaction = $stmt->execute();
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
			return false;
			print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}

	function deletes($dbh) {
		try {
			$del_state = 'Y';
			$aGoodsIdx = $this->getAddslashes('goods_idx');
			$bTransaction = false;
			$dbh->beginTransaction();

			//$sql = 'DELETE FROM goods WHERE goods_idx = :goods_idx';
			$sql = 'UPDATE goods SET del_state = :del_state WHERE goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT, 11);

			foreach($aGoodsIdx as $goods_idx) {
				if ($bTransaction = self::attachFileDelete($dbh, $goods_idx)) {
					$bTransaction = true;
					$stmt->execute();
				}
				else {
					$bTransaction = false;
					//break;
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
			//print_r($aryFileList);

			if (!is_null($aryFileList)) {
				$LIB_FILE = new LIB_FILE();

				foreach ($aryFileList as $value) {
					if ($value != '') {
						$aFileInfo = explode("|", $value);
						$bContentImg = true;

						//echo '<br>aFileInfo2:'.$aFileInfo[2];
						// 본문 이미지인 경우
						if ($aFileInfo[4] == 1) {
							//echo '본문';
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
								//echo '파일 이동 성공';
							}
							else {
								$bTransaction = false;
								//echo '파일 이동 실패';
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
			$category = 1;
			$page = $this->getAddslashes('page');
			$sz = $this->getAddslashes('sz');
			$st = $this->getAddslashes('st'); // and / or
			$nm = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$gnm = (!empty($this->getAddslashes('gnm'))) ? $this->getAddslashes('gnm') : null;
			$bdate = (!empty($this->getAddslashes('bdate'))) ? $this->getAddslashes('bdate') : null;
			$edate = (!empty($this->getAddslashes('edate'))) ? $this->getAddslashes('edate') : null;
			//$sort = (!empty($this->getAddslashes('sort'))) ? $this->getAddslashes('sort') : 0;
			//$od = (!empty($this->getAddslashes('od'))) ? $this->getAddslashes('od') : 0;
/*
			echo "<br>page:$page";
			echo "<br>sz:$sz";
			echo "<br>st:$st";
			echo "<br>nm:".gettype($nm);
			echo "<br>gnm:".gettype($gnm);
			echo "<br>bdate:".gettype($bdate);
			echo "<br>edate:".gettype($edate);
*/
			$sql = 'CALL up_work_list (:category, :page, :sz, :st, :nm, :gnm, :bdate, :edate)';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category', $category, PDO::PARAM_INT, 1);
			$stmt->bindParam(':page', $page, PDO::PARAM_INT);
			$stmt->bindParam(':sz', $sz, PDO::PARAM_INT);
			$stmt->bindParam(':st', $st, PDO::PARAM_INT, 1);
			$stmt->bindParam(':nm', $nm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':gnm', $gnm, PDO::PARAM_STR, 50);
			$stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR, 20);
			$stmt->bindParam(':edate', $edate, PDO::PARAM_STR, 20);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt = $dbh->prepare('select @total_cnt');
			$stmt->execute();
			$total_cnt = $stmt->fetchColumn();

			return array($list, $total_cnt);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getRead($dbh) {
		try {
			$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'select a.*, b.artist_name from goods a inner join artist_info b on a.artist_idx = b.artist_idx where a.goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

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
			$goods_idx = $this->getAddslashes('goods_idx');
			/*
			$sql = 'SELECT
									a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.artist_idx, a.goods_name, a.goods_make_year, a.goods_make_type, a.goods_frame_state,
									a.goods_width, a.goods_depth,
									a.goods_height, a.goods_sell_price, a.goods_lental_state, a.recommend_idx, a.goods_description, a.goods_material, a.goods_exhibit_year, a.goods_exhibit_item, a.goods_display,
									a.goods_point, a.goods_maker, a.goods_origin, a.delivery_type, a.delivery_price, a.freight_collect_price, a.goods_cnt_type, a.goods_cnt, a.order_min_cnt, a.order_max_cnt, a.goods_list_img,
									a.sold_out_state, a.del_state, b.artist_name, c.referee
						FROM	goods a INNER JOIN artist_info b ON a.artist_idx = b.artist_idx INNER JOIN recommend  c ON a.recommend_idx =c.recommend_idx
						WHERE a.goods_idx = :goods_idx ';
			*/
			$sql = 'SELECT
									a.goods_idx, a.goods_medium, a.goods_subject, a.goods_size, a.goods_color, a.artist_idx, a.goods_name, a.goods_make_year, a.goods_make_type, a.goods_frame_state,
									a.goods_width, a.goods_depth,
									a.goods_height, a.goods_sell_price, a.price_exchange_state, a.price_exchange_text, a.goods_rental_price, a.rental_exchange_state, a.rental_exchange_text,
									a.is_rental, a.rental_memo, a.goods_lental_state,
									a.recommend_idx, a.goods_description, a.goods_material, a.goods_exhibit_year, a.goods_exhibit_item, a.goods_display,
									a.goods_point, a.goods_maker, a.goods_origin, a.delivery_type, a.delivery_price, a.freight_collect_price, a.goods_cnt_type, a.goods_cnt, a.order_min_cnt, a.order_max_cnt, a.goods_list_img, a.goods_scale_img,
									a.sold_out_state, a.del_state, b.artist_name, (select referee from recommend where recommend_idx = a.recommend_idx) as referee
						FROM	goods a
						INNER JOIN artist_info b ON a.artist_idx = b.artist_idx
						WHERE a.goods_idx = :goods_idx ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

			if ($stmt->execute() && $stmt->rowCount()) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				//var_dump($row);
				foreach($row as $key => $val) {
					//if (is_numeric($val)) $row[$key] = $val + 0;
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

	// 상품(작품)목록 이미지 파일 가져오기
	function getGoodsListImgInfo($dbh, $goods_idx) {
		try {
			$sql = 'SELECT goods_list_img FROM goods WHERE goods_idx = :goods_idx';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
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

	// 추가 첨부 이미지 파일 정보 가져오기
	function getFileInfo($dbh, $goods_idx) {
		try {
			//$goods_idx = $this->getAddslashes('goods_idx');
			$sql = 'SELECT img_idx, goods_idx, goods_img FROM goods_add_img WHERE goods_idx = :goods_idx ORDER BY  img_idx ASC';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':goods_idx', $goods_idx, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 물리적 파일 삭제
	function attachFileDelete($dbh, $goods_idx) {
		try {
			$bTransaction = true;
			$goodsListImg = self::getGoodsListImgInfo($dbh, $goods_idx);
			$aryFileInfo = self::getFileInfo($dbh, $goods_idx);

			if ($bTransaction) {
				// 목록 이미지 삭제
				if (!empty($goodsListImg)) {
					LIB_FILE::DeleteFile(ROOT.goodsListImgUploadPath.$goodsListImg);
				}

				// 추가 이미지 삭제
				foreach($aryFileInfo as $row) {
					LIB_FILE::DeleteFile(ROOT.goodsBigImgUploadPath.$row['goods_img']);
					LIB_FILE::DeleteFile(ROOT.goodsMiddleImgUploadPath.$row['goods_img']);
					LIB_FILE::DeleteFile(ROOT.goodsSmallImgUploadPath.$row['goods_img']);
				}
			}

			return $bTransaction;
			//echo "bTransaction:".$bTransaction;
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

	// 추천인 가져오기
	function getSearchReferee($dbh) {
		try {
			$del_state = 'N';
			$artist_name = (!empty($this->getAddslashes('nm'))) ? $this->getAddslashes('nm') : null;
			$sql = 'SELECT recommend_idx, referee FROM recommend WHERE del_state = :del_state ORDER BY recommend_idx desc';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			$stmt->execute();
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$dbh = null;
			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 아트 상품의 관련 상품 이미지 가져오기
	function getRelationWorkImg($dbh) {
		try {
			$sql = 'SELECT goods_idx, goods_list_img FROM goods WHERE category_idx = 1 ORDER BY goods_idx DESC';
			$stmt = $dbh->prepare($sql);
			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 랜덤 추천이미지 가져오기
	function getRadomArtWork($dbh) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$sql = ' SELECT a.goods_idx, a.goods_name, a.goods_list_img, b.artist_name, a.goods_cnt, a.is_rental
						FROM goods a INNER JOIN artist_info b ON a.artist_idx = b.artist_idx
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state
						ORDER BY RAND() LIMIT 16';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


	// 랜덤 추천이미지 가져오기
	function getMainPageRadomArtWork($dbh, $cnt) {
		try {
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			//$sold_out_state = 'N';

			$sql = ' SELECT a.goods_idx, a.goods_name, a.goods_width, a.goods_depth, a.goods_height, a.goods_material, a.goods_make_year, a.goods_sell_price, a.goods_lental_state,
									a.goods_cnt, a.sold_out_state, a.goods_list_img, b.artist_name, a.is_rental
						FROM goods a INNER JOIN artist_info b ON a.artist_idx = b.artist_idx
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state
						ORDER BY RAND() LIMIT '.$cnt;
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':category_idx', $category_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);
			//$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);

			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	// 작가별 작품 페이지 가져오기
	function getArtistArtWors($dbh) {
		try {
			$artist_idx = $this->getAddslashes('artist_idx'); ;
			$goods_display = 'Y';
			$del_state = 'N';
			$sql = 'SELECT a.goods_idx, b.artist_name, a.goods_name, a.goods_make_year, a.goods_material, a.goods_width, a.goods_depth, a.goods_height, a.goods_list_img
						FROM goods a INNER JOIN artist_info b ON a.artist_idx = b.artist_idx
						WHERE a.artist_idx = :artist_idx and del_state = :del_state';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':artist_idx', $artist_idx, PDO::PARAM_INT, 11);
			$stmt->bindParam(':goods_display', $goods_display, PDO::PARAM_STR, 1);
			$stmt->bindParam(':del_state', $del_state, PDO::PARAM_STR, 1);


			if ($stmt->execute() && $stmt->rowCount()) {
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return null;
			}
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}



}
?>