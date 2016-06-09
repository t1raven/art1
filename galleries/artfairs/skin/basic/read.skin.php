<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_fair_view" class="content-mediaBox margin1">
			<div class="gallery_fair_view">
				<div class="bx_left">
					<div class="bx_img">
						<div class="bx_slide">
							<ul>
								<?php foreach($imgList as $key => $val) : ?>
								<li<?php if ($key === 0) : ?> class="on"<?php endif ; ?>><img src="<?php echo galleriesArtFairsUploadPath, $val['upfileName']; ?>" alt="" /></li>
								<?php endforeach ; ?>
								<!--
								<li class="on"><img src="/images/galleries/img_fair_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view2.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view3.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view4.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view5.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view6.jpg" alt="" /></li>
								-->
							</ul>
						</div>
						<div class="thumnail">
							<ul></ul>
						</div>
					</div>
					<header class="area_lato">
						<h3><?php echo str_replace('-', '.', $artfairs->attr['beginDate']), ' ~ ', str_replace('-', '.', $artfairs->attr['endDate']); ?></h3>
						<h2><?php echo $artfairs->attr['fairTitleEn']; ?><?php if (!empty($artfairs->attr['link'])) : ?> <a href="<?php echo $artfairs->attr['link']; ?>" target="_blank"><img src="/images/galleries/ico_artfair_link.png"></a><?php endif ; ?></h2>
						<?php if (is_array($artistsList)) : ?>
							<p>
							<?php foreach($artistsList as $key => $val) : ?>
								<span><a href="/galleries/artists/?at=read&idx=<?php echo $val['galleryIdx']; ?>&aidx=<?php echo $val['artistIdx']; ?>"><?php echo $val['artistNameEn']; ?></a></span><?php if ($artistsListCnt > $key) : ?>,<?php endif ; ?>
							<?php endforeach ; ?>
							</p>
						<?php endif ; ?>
					</header>
					<div class="bx_links">
						<ul class="link_share_btns">
							<li class="calender">
								<a href="javascript:;" class="img_h">
									<span><img src="/images/galleries/ico_calender2.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
								</a>
								<div class="hv">
									<ul>
										<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $artfairs->attr['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt="" /></span></a></li>
										<li><a href="javascript:;" onclick="googleCal('fair', '<?php echo $artfairs->attr['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt="" /></span></a></li>
										<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $artfairs->attr['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt="" /></span></a></li>
									</ul>
									<div class="tail"></div>
								</div>
							</li>
							<li class="sns">
								<a href="javascript:;" class="img_h">
									<span><img src="/images/galleries/ico_link2.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
								</a>
								<div class="hv">
									<ul>
										<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $imgList[0]['upfileName']; ?>', '<?php echo urlencode($artfairs->attr['fairTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($artfairs->attr['description'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
										<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
										<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $artfairs->attr['fairTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
										<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $imgList[0]['upfileName']; ?>', '<?php echo str_replace("'", '', $artfairs->attr['fairTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
										<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
									</ul>
									<div class="tail"></div>
								</div>
							</li>
						</ul>
					</div>
					<!--
					<div class="con">
						<p><a href="<?php echo $artfairs->attr['link']; ?>" target="_blank"><?php echo $artfairs->attr['link']; ?></a></p>
					</div>
					-->
				</div>
				<div class="bx_right">
					<h3 class="area_lato">Selected works</h3>
					<section class="sect_artworks">
						<?php if (is_array($worksList)) : ?>
						<div class="gallery_list_artwork">
							<ul>
								<?php foreach($worksList as $val) : ?>
								<!--
								<li>
									<div class="inner">
										<div href="/galleries/artworks/?at=read&idx=<?php echo $idx; ?>&widx=<?php echo $val['worksIdx']; ?>" class="img out_cover">
											<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
											<a class="cover" href="/galleries/artworks/?at=read&idx=<?php echo $idx; ?>&widx=<?php echo $val['worksIdx']; ?>">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?php echo $val['artistNameEn']; ?></h4>
										<p><?php echo $val['worksNameEn']; ?></p>
									</div>
								</li>
								-->
								<li>
									<div class="inner">
										<div href="javascript:;" class="img out_cover" onclick="showLayerArtworksView('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>', '', '', '<?php echo $artfairs->attr['fairIdx']; ?>', 'artfairs');">
											<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
											<a class="cover" href="javascript:;">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?php echo $val['artistNameEn']; ?></h4>
										<p><?php echo $val['worksNameEn']; ?></p>
									</div>
								</li>
								<?php endforeach ; ?>
							</ul>
						</div>
						<?php else : ?>
							<div style="text-align:center">Data does not exist.</div>
						<?php endif ; ?>
					</section>
				</div>
			</div>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script src="/js/idangerous.swiper.min.js"></script>
<script>
function alignSpot(){
	var bxImg = $("#area_gallery_fair_view .gallery_fair_view .bx_img");
	iCutterOwen("#area_gallery_fair_view .bx_img .bx_slide > ul > li");
	var artSpot = bxImg.find(".bx_slide > ul > li");
	var len = artSpot.length;
	if(len > 1){
		var str = "";
		for(var k = 0 ; k < len ; k++){
			var img = artSpot.eq(k).html();
			str +='<li '+(k==0 ? "class=\'on\'" : "")+'><a href="javascript:;">'+img+'</a></li>'
		}
		bxImg.find(".thumnail > ul").html(str);
		iCutterOwen("#area_gallery_fair_view .bx_img .thumnail a");
		bxImg.find(".thumnail a").on('click',function(){
			var conLi = bxImg.find(".bx_slide > ul > li");
			var par = $(this).parent();
			var idx = par.index();
			collaboSpotMotion({tab : par, con : conLi, idx : idx});
		})
	}
}
function collaboSpotMotion(o){
	if(!o.tab.hasClass('on')){
		o.tab.siblings('.on').removeClass('on').end().addClass('on');
		o.con.eq(o.idx).siblings('.on').removeClass('on').end().addClass('on');
	}
}
alignSpot();



function imagesPosition(){
	$(".gallery_fair_view .bx_img .bx_slide > ul > li img").one("load", function() {
	  $(this).addClass('pos').css("margin-top", -$(this).height()/2);
	}).each(function() {
	  if(this.complete) $(this).load();
	});

	$(".gallery_fair_view .bx_img .thumnail > ul > li > a img").one("load", function() {
	  $(this).addClass('pos').css("margin-top", -$(this).height()/2);
	}).each(function() {
	  if(this.complete) $(this).load();
	});
}

$( document ).ready(function() {
	imagesPosition();
});

$(window).resize(function(e) {
	imagesPosition();
});

</script>