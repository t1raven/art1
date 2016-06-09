  <?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once(ROOT.'lib/class/market/marketmain.class.php');

$medium = isset($_GET['medium']) ? $_GET['medium'] : null;
$subject = isset($_GET['subject']) ? $_GET['subject'] : null;
$size = isset($_GET['size']) ? $_GET['size'] : null;

$color = isset($_GET['color']) ? $_GET['color'] : null;
$price = isset($_GET['price']) ? $_GET['price'] : null;

$rental = isset($_GET['rental']) ? $_GET['rental'] : null;
$sell = isset($_GET['sell']) ? $_GET['sell'] : null;
$goods_name = isset($_GET['goods_name']) ? $_GET['goods_name'] : null;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$sz = isset($_GET['sz']) ? $_GET['sz'] : ARTWORKSLISTCOUNT;

//echo '<script>console.log("check_mobile : '.$check_mobile.'")</script>';

if ( $check_mobile == true ){
	$sz = 12;
}else{
	$sz = ARTWORKSLISTCOUNT;
}
//echo '<script>console.log("sz : '.$sz.'")</script>';
//뒤로 가기를 위한 처리 by 2015-03-24
$def_sz = $sz;
$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null;  //view page 에서 목록으로를 눌렀을때 처리를 위한 변수

//$back_page 이 있을 경우 목록 계산

/*
if (!empty($back_page)) {
	$sz = $back_page * $sz;
	//$page = $page + $back_page ;

}
*/

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
$Marketmain->setAttr('sz', $sz);

$artWorkTotalCount = (int)$Marketmain->getArtWorkCount2($dbh);
//echo "count:".$artWorkTotalCount."<br>";

$totalPage = ceil($artWorkTotalCount / $sz);


if ((int)$page === 1) {
	unset($_SESSION['rdmNbr']);
}

if ($artWorkTotalCount > 0) {
	$j = 0;

	if ($artWorkTotalCount >= $sz) {
		$kk = $artWorkTotalCount % $sz;

		if ($kk === 0) {
			$aCnt = $artWorkTotalCount - $sz;
		}
		else {
			$aCnt = $artWorkTotalCount - ($kk + $sz);
		}

		//echo "kk:$kk";
		//echo "aCnt:$aCnt";

		for ($i = 0; $i <= $aCnt; $i+=$sz) {
			$aValue[$j] = $i;
			$j++;
		}
	}
	else {
		$aValue[0] = 0;
	}



	//print_r($aValue);

	if (!is_null($_SESSION['rdmNbr'])) {
		//echo "세션존재";
	}
	else {
		//echo "세션존재하지 않음";
		$aryLastValue = $aValue[sizeof($aValue) -1];

		shuffle($aValue);

		$_SESSION['rdmNbr'] = $aValue;

		//print_r($_SESSION['rdmNbr']);

		if ($artWorkTotalCount > $sz) {
			if ($kk !== 0) {
				$_SESSION['rdmNbr'][sizeof($aValue)] = $aryLastValue + $sz;
			}
		}

		//print_r($_SESSION['rdmNbr']);
	}


	$Marketmain->setAttr('rdmstart', $_SESSION['rdmNbr'][(int)$page - 1]);

	$artWorkList = $Marketmain->getMainList2($dbh);



	if (is_array($artWorkList) && count($artWorkList) > 0) {
		$i = 0;
		foreach($artWorkList as $row) {

			if (!empty($back_page) ) { //뒤로를 위한 처리
				$page = (int)($i / $def_sz +1) ;
			}

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

			//$a_link = 'artwork_view.php?goods='.$row['goods_idx'].'&back_page='.$page.'&isto='.$row['goods_idx'] ;
	?>

		<section data-type="content" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;" style="cursor:pointer;" class="newsBox <?php echo $aEngMedium[$row['goods_medium']];?> <?php echo $aEngSubject[$row['goods_subject']];?> <?php echo $aEngSize[$row['goods_size']];?> <?php echo $aEngColor[$row['goods_color']];?> <?php echo $price;?>" id="isto<?php echo $row['goods_idx']; ?>">
			<div class="newsBox_inner">
				<div class="Boximg">
				<?php if ($row['goods_cnt'] === '0'):?>
					<span class="sale"><img src="/images/market/ico_sale.png" alt="판매된"></span>
				<?php else: ?>
					<?php if ($row['is_rental'] === 'Y'): ?>
					<span class="rental"><img src="/images/market/ico_rental.png" alt="랜탈됨"></span>
					<?php endif; ?>
				<?php endif; ?>
					<a><img src="<?php echo goodsThumbImgUploadPath, $row['goods_list_img'];?>" alt="" /></a>
				</div>
				<div class="news_cont">
					<h1><?php echo $row['goods_name'];?></h1>
					<div class="text_cont">
						<p class="name"><?php echo $row['artist_name'];?></p>
						<p class="name"><?php echo $info;?></p>
					</div>
				</div>
			</div>
		</section>
	<?php
			$i ++ ;
		}
	}
	else {
	?>
	<section class="newsBox noProduct">
		<div>
			<p class="noProduct">작품이 존재하지 않습니다.</p>
		</div>
	</section>
	<?php
	}
}
else {
?>
<section class="newsBox noProduct">
	<div>
		<p class="noProduct">작품이 존재하지 않습니다.</p>
	</div>
</section>
<?php
}
?>
<script>totalPage = <?php echo $totalPage; ?>;</script>
<?
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);
