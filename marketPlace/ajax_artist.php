<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/marketmain.class.php');

$artist_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$sz = isset($_GET['sz']) ? $_GET['sz'] : ARTWORKSLISTCOUNT;

$Marketmain = new Marketmain();
$Marketmain->setAttr('artist_idx', $artist_idx);
$Marketmain->setAttr('page', $page);
$Marketmain->setAttr('sz', $sz);

if ( $check_mobile == true ){
	$sz = 6;
}else{
	$sz = ARTWORKSLISTCOUNT;
}

//�ڷ� ���⸦ ���� ó�� by 2015-03-24
$def_sz = $sz;
$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null;  //view page ���� ������θ� �������� ó���� ���� ����
$at_tmp = isset($_GET['at_tmp']) ? $_GET['at_tmp'] : null; //view page ���� ���(�ڷ�)���θ� �������� �ش� �޴��� ã�ư��� ���� ����

//$back_page �� ���� ��� ��� ���
if (!empty($back_page)) {
	$sz = $back_page * $sz;
	//$page = $page + $back_page ;

}


$list = $Marketmain->getEachArtistArtWorks($dbh);
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);

if (is_array($list) && count($list) > 0)
{
	foreach($list as $row)
	{
		$material = !empty($row['goods_material']) ? $row['goods_material'].', ' : null;
		$width = !empty($row['goods_width']) ? $row['goods_width'] : null;
		$depth = !empty($row['goods_depth']) ? $row['goods_depth'] : null;
		$height = !empty($row['goods_height']) ? $row['goods_height'] : null;
		$makeYear = !empty($row['goods_make_year']) ? $row['goods_make_year'] : null;

		//2015-03-13 �̿��� ���� �Ҽ��� .0 �� ���ش�.
		$width =  !empty($width) ? str_replace('.0','',$width) : null; //str_replace("-","",$loss_hp)
		$height =  !empty($height) ? str_replace('.0','',$height)  : null;
		$depth =  !empty($depth) ? str_replace('.0','',$depth)  : null;

		if (!empty($material)) {
			$info = $material;
		}

		if (!empty($depth)) {
			$info .= $depth;
		}

		if (!empty($width)) {
			$info .= 'x'.$width;
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

		//$a_link = 'artwork_view.php?goods='.$row['goods_idx'].'&back_page='.$page.'&isto='.$row['goods_idx'].'&at_tmp='.$at_tmp.'&idx='.$artist_idx ;
?>
		<section class="newsBox <?php echo $aEngMedium[$row['goods_medium']];?> <?php echo $aEngSubject[$row['goods_subject']];?> <?php echo $aEngSize[$row['goods_size']];?> <?php echo $aEngColor[$row['goods_color']];?> <?php echo $price;?>">
			<div class="newsBox_inner">
				<div class="Boximg">
				<?php if ($row['goods_cnt'] === '0'):?>
					<p class="circle"><img src="/images/ico/ico_red_circle.png" alt="�ǸźҰ�"></p>
				<?php else: ?>
					<?php if ($row['is_rental'] === 'Y'): ?>
						<p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="��Ż�Ұ�"></p>
					<?php endif; ?>
				<?php endif; ?>
					<a href="#" onclick="goods='<?php echo $row['goods_idx']; ?>'; marketViewMotion(); return false;"><img src="<?php echo goodsBigImgUploadPath, $row['goods_list_img'];?>" alt="" /></a>
				</div><!-- Boximg -->
				<div class="news_cont">
					<h1><a href="#"><?php echo $row['goods_name'];?></a></h1>
					<div class="text_cont">
						<p class="name"><?php echo $row['artist_name'];?></p>
						<p class="name"><?php echo $info;?></p>
					</div><!-- text_cont -->
				</div><!-- news_cont -->
			</div><!-- newsBox_inner -->
		</section><!-- newsBox -->
<?php
	}
}
?>