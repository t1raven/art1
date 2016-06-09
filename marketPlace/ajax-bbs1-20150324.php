<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/marketmain.class.php');

$price = isset($_GET['price']) ? $_GET['price'] : null;
$medium = isset($_GET['medium']) ? $_GET['medium'] : null;
$subject = isset($_GET['subject']) ? $_GET['subject'] : null;
$size = isset($_GET['size']) ? $_GET['size'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$color = isset($_GET['color']) ? $_GET['color'] : null;
$rental = isset($_GET['rental']) ? $_GET['rental'] : null;
$sell = isset($_GET['sell']) ? $_GET['sell'] : null;
$goods_name = isset($_GET['goods_name']) ? $_GET['goods_name'] : null;

//$size = 10;
//echo 'size : '.$size ;

$Marketmain = new Marketmain();
$Marketmain->setAttr('price', $price);
$Marketmain->setAttr('medium', $medium);
$Marketmain->setAttr('subject', $subject);
$Marketmain->setAttr('size', $size);
$Marketmain->setAttr('color', $color);
$Marketmain->setAttr('rental', $rental);
$Marketmain->setAttr('sell', $sell);
$Marketmain->setAttr('goods_name', $goods_name);
$Marketmain->setAttr('page', $page);

$artWorkList = $Marketmain->getMainList($dbh);
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);

if (is_array($artWorkList) && count($artWorkList) > 0) {
	foreach($artWorkList as $row) {
		$material = !empty($row['goods_material']) ? $row['goods_material'].', ' : null;
		$width = !empty($row['goods_width']) ? $row['goods_width'] : null;
		$depth = !empty($row['goods_depth']) ? $row['goods_depth'] : null;
		$height = !empty($row['goods_height']) ? $row['goods_height'] : null;
		$makeYear = !empty($row['goods_make_year']) ? $row['goods_make_year'] : null;

		//2015-03-13 이용태 수정 소숫점 .0 을 없앤다.
		$width =  !empty($width) ? str_replace('.0','',$width) : null; //str_replace("-","",$loss_hp)
		$height =  !empty($height) ? str_replace('.0','',$height)  : null;
		$depth =  !empty($depth) ? str_replace('.0','',$depth)  : null;
		


		if (!empty($material)) {
			$info = $material;
		}

		if (!empty($width)) {
			$info .= $width;
		}

		if (!empty($depth)) {
			$info .= 'x'.$depth;
		}

		if (!empty($height)) {
			if ((int)$height > 0) {
				$info .= 'x'.$height.'cm';
			}
			else {
				$info .= 'cm';
			}
		}
		else {
			$info .= 'cm';
		}



		if (!empty($makeYear)) {
			$info .= ' '.$makeYear;
		}

		$price = (int)$row['goods_sell_price'];

		if ($price < 500000) {
			$price = $aEngPrice[0];
		}
		elseif ($price >= 500000 && $price <= 1000000) {
			$price = $aEngPrice[1];
		}
		elseif ($price >= 1000000 && $price <= 2000000) {
			$price = $aEngPrice[2];
		}
		elseif ($price >= 2000000 && $price <= 3000000) {
			$price = $aEngPrice[3];
		}
		elseif ($price >= 3000000 && $price <= 4000000) {
			$price = $aEngPrice[4];
		}
		elseif ($price >= 4000000 && $price <= 5000000) {
			$price = $aEngPrice[5];
		}
		elseif ($price >= 5000000 && $price <= 10000000) {
			$price = $aEngPrice[6];
		}
		elseif ($price <= 10000000) {
			$price = $aEngPrice[7];
		}
?>
		<section class="newsBox <?php echo $aEngMedium[$row['goods_medium']];?> <?php echo $aEngSubject[$row['goods_subject']];?> <?php echo $aEngSize[$row['goods_size']];?> <?php echo $aEngColor[$row['goods_color']];?> <?php echo $price;?>">
			<div class="newsBox_inner">
				<div class="Boximg">
					<a href="artwork_view.php?goods=<?php echo $row['goods_idx'];?>"><img src="<?php echo goodsBigImgUploadPath, $row['goods_list_img'];?>" alt="" /></a>
				</div>
				<div class="news_cont">
					<h1><a href="artwork_view.php?goods=<?php echo $row['goods_idx'];?>"><?php echo $row['goods_name'];?></a></h1>
					<div class="text_cont">
						<p class="name"><?php echo $row['artist_name'];?></p>
						<p class="name"><?php echo $info;?></p>
					</div>
				</div>
			</div>
		</section>
<?php
	}
}
else {
?>
<!--p class="noProduct">작품이 존재하지 않습니다.</p-->
<?php
}
?>