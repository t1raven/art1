<?php
class Search
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

	function getList($dbh) {
		try {
			$goods_medium = $this->getAddslashes('goods_medium');
			$goods_subject = $this->getAddslashes('goods_subject');
			$goods_size = $this->getAddslashes('goods_size');
			$goods_color = $this->getAddslashes('goods_color');
			$goods_lental_state = $this->getAddslashes('goods_lental_state');
			$sold_out_state = $this->getAddslashes('sold_out_state');
			$chkartist = $this->getAddslashes('chkartist');
			$chkartwork = $this->getAddslashes('chkartwork');
			$kword = !empty($this->getAddslashes('kword')) ? '%'.$this->getAddslashes('kword').'%' : null;
			$goods_sell_price = $this->getAddslashes('goods_sell_price');

			$list = null;
			$subSQL = null;
			$category_idx = 1;
			$goods_display = 'Y';
			$del_state = 'N';
			$orderBy = '';
			/*
			echo "price:$price";
			echo "medium:$medium";
			echo "subject:$subject";
			echo "size:$size";
			*/

			if (is_numeric($goods_medium)) {
				$subSQL .= ' AND goods_medium = :goods_medium ';
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

			if ($goods_lental_state === 'Y') {
				$subSQL .= ' AND goods_lental_state = :goods_lental_state ';
			}

			if ($sold_out_state === 'N') {
				$subSQL .= ' AND sold_out_state = :sold_out_state ';
			}

			if ($chkartist === 'Y' && $chkartwork === 'Y') {
				$subSQL .= ' AND (artist_name like :artist_name OR goods_name like :goods_name)';
				$orderBy = ' ORDER BY b.artist_idx ASC ';
			}
			elseif ($chkartist === 'Y' && $chkartwork !== 'Y') {
				$subSQL .= ' AND artist_name like :artist_name ';
				$orderBy = ' ORDER BY b.artist_idx ASC ';
			}
			elseif ($chkartist !== 'Y' && $chkartwork === 'Y') {
				$subSQL .= ' AND goods_name like :goods_name ';
			}
			else {
			}


			if (is_numeric($goods_sell_price)) {
				if ($goods_sell_price === '0') {
					$subSQL .= ' AND goods_sell_price between 0 AND 500000 ';
				}
				elseif ($goods_sell_price === '1') {
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


			$sql = ' SELECT a.goods_idx, a.goods_name, a.goods_list_img, a.goods_lental_state, a.goods_cnt, b.artist_name, a.is_rental
						FROM goods AS a INNER JOIN artist_info AS b ON a.artist_idx = b.artist_idx
						WHERE a.category_idx = :category_idx AND a.goods_display = :goods_display AND a.del_state = :del_state '.$subSQL.$orderBy.' LIMIT 0, 200';

			//echo $sql;
			//echo $kword;
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

			if ($goods_lental_state === 'Y') {
				$stmt->bindParam(':goods_lental_state', $goods_lental_state, PDO::PARAM_STR, 1);
			}

			if ($sold_out_state === 'N') {
				$stmt->bindParam(':sold_out_state', $sold_out_state, PDO::PARAM_STR, 1);
			}

			if ($chkartist === 'Y' && $chkartwork === 'Y') {
				$stmt->bindParam(':artist_name', $kword, PDO::PARAM_STR, 50);
				$stmt->bindParam(':goods_name', $kword, PDO::PARAM_STR, 250);
			}
			elseif ($chkartist === 'Y' && $chkartwork !== 'Y') {
				$stmt->bindParam(':artist_name', $kword, PDO::PARAM_STR, 50);
			}
			elseif ($chkartist !== 'Y' && $chkartwork === 'Y') {
				$stmt->bindParam(':goods_name', $kword, PDO::PARAM_STR, 250);
			}
			else {
			}

			/*
			if (is_numeric($goods_sell_price)) {
				$stmt->bindParam(':goods_sell_price', $kword, PDO::PARAM_STR, 250);
			}
			*/


			if ($stmt->execute() && $stmt->rowCount()) {
				$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			return $list;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

}
?>