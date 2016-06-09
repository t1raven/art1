<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/galleries/'.basename(__DIR__).'.class'.SOURCE_EXT;
require ROOT.'lib/function/email/mail.func.php';

$idx = isset($_POST['idx']) ? (int)LIB_LIB::CkSearch($_POST['idx']) : null;
$widx = isset($_POST['widx']) ? (int)LIB_LIB::CkSearch($_POST['widx']) : null;
$eidx = isset($_POST['eidx']) ? (int)LIB_LIB::CkSearch($_POST['eidx']) : null;
$aidx = isset($_POST['aidx']) ? (int)LIB_LIB::CkSearch($_POST['aidx']) : null;
$fidx = isset($_POST['fidx']) ? (int)LIB_LIB::CkSearch($_POST['fidx']) : null;
$tgt = isset($_POST['tgt']) ? LIB_LIB::CkSearch($_POST['tgt']) : null;
$step = isset($_POST['step']) ? LIB_LIB::CkSearch($_POST['step']) : null;

if ($step == 'first') {
	$idxs = array($widx-1, $widx, $widx+1);
}
else{
	$idxs = array($widx);
}

$cnt = count($idxs);

$artworks = new Artworks();
$artworks->setAttr('idx', $idx);
$artworks->setAttr('widx', $widx);
$artworks->setAttr('eidx', $eidx);
$artworks->setAttr('aidx', $aidx);
$artworks->setAttr('fidx', $fidx);
$artworks->setAttr('cnt', $cnt);
$artworks->setAttr('step', $step);

switch($tgt) {
	case 'about' : $list = $artworks->getAboutRead($dbh); break;
	case 'exhibitions' : $list = $artworks->getExhibitionsRead($dbh); break;
	case 'artists' : $list = $artworks->getArtistsRead($dbh); break;
	case 'artworks' : $list = $artworks->getArtworksRead($dbh); break;
	case 'artfairs' : $list = $artworks->getArtfairsRead($dbh); break;
}



//$list = $artworks->getView($dbh);
//print_r($list);



//for($i = 0 ; $i < $cnt ; $i++) {
?>
<?php if (is_array($list) && count($list) > 0) : ?>
	<?php foreach($list as $key => $val) : ?>
	<li class="swiper-slide list" data-widx="<?php echo $val['worksIdx']; ?>">
		<section class="gallery_artwork_view">
			<div class="bx_left">
				<div class="bx_img">
					<div class="bx_slide">
						<ul>
							<?php
							$artworks->setAttr('widx', $val['worksIdx']);
							//$artworks->setAttr('artistIdx', $val['artistIdx']);
							$artworksList = null;
							$artworksList = $artworks->getArtworksList($dbh);
							$isExhibition = $artworks->getIsExhibition($dbh);
							?>
							<?php if (is_array($artworksList)) : ?>
								<?php foreach($artworksList as $value) : ?>
								<li><img src="<?php echo galleriesArtworksUploadPath, 'r_', $value['upfileName']; ?>" alt="" /></li>
								<?php endforeach; ?>
							<?php endif ; ?>
						</ul>
					</div>
					<div class="thumnail">
						<ul>
						</ul>
					</div>
				</div>
			</div>
			<div class="bx_right">
				<header>
					<h3><span><?php echo $val['artistNameEn']; ?></span> <button class="view_more" onclick="mvArtist('<?php echo $idx; ?>', '<?php echo $val['artistIdx']; ?>');"><span>자세히보기</span></button></h3>
					<h4><?php echo $val['worksNameEn'], ', ', $val['makingDate']; ?></h4>
					<p><?php echo $val['material']; ?></p>
					<?php if ((int)$val['height'] > 0 || (int)$val['width'] > 0) : ?>
					<p><?php echo $val['height']; ?> x <?php echo $val['width']; ?><?php if (!empty($val['depth'])) : ?> x  <?php echo $val['depth']; ?><?php endif ; ?> cm</p>
					<?php else : ?>
					<p>Variable dimensions</p>
					<?php endif ; ?>
				</header>
				<div class="btns">
					<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
						<button onclick="sendRequest('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>');">Direct Price Request<span class="h_ov">작품가격 바로 문의</span></button>
						<button onclick="contactGallery('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>');">Contact Gallery<span class="h_ov">작품 상세 문의</span></button>
					<?php else : ?>
						<button onclick="goLogin();">Direct Price Requests<span class="h_ov">작품가격 바로 문의</span></button>
						<button onclick="goLogin();">Contact Gallery<span class="h_ov">작품 상세 문의</span></button>
					<?php endif ; ?>
						<?php if ($isExhibition > 0) : ?><button onclick="goExhibition('<?php echo $idx; ?>', '<?php echo $val['artistIdx']; ?>');">View the Exhibition<span class="h_ov">전시회 보기</span></button><?php endif ; ?>
				</div>
				<div class="links">
					<ul class="g_sns_type1">
						<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], '/galleries/artworks/?at=read&idx='.$idx.'&widx='.$val['worksIdx'].''; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtworksUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['worksNameEn']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['material'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt="" /></span></a></li>
						<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], '/galleries/artworks/?at=read&idx='.$idx.'&widx='.$val['worksIdx'].''; ?>', '<?php echo str_replace("'", '', $val['worksNameEn']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt="" /></span></a></li>
						<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtworksUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['worksNameEn']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt="" /></span></a></li>
					</ul>
				</div>
			</div>
		</section>
		<script>
			console.log(<?=count($idxs)?>);
			alignArtWorkView(<?php echo $val['worksIdx']; ?>);
		</script>
	</li>
	<?php endforeach; ?>
<?php endif ; ?>
