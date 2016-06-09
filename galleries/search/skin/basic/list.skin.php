<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;region=KR&amp;sensor=false"></script>
<section id="container_sub">
	<div class="container_inner">
		<div id="area_gallery_about" class="content-mediaBox margin1 area_search_resut">
			<?php $existData = false ?>
			<?php if (is_array($galleryList) && count($galleryList) > 0) : $existData = true ?>
			<section id="sect_galleris_list" class="area_lato">
				<h2 class="g_tit1"><span>Galleries</span></h2>
				<div class="gallery_list area_lato">
					<ul>
						<?php foreach($galleryList as $val) : ?>
						<li>
							<div class="img out_cover" onclick="">
								<img class="area_zoom h100p" src="<?php echo galleriesAboutUploadPath, 'l_'.$val['mainImg']; ?>" alt="Gallery Image" style="margin-left: 0%;">
								<a class="cover" href="/galleries/about/?idx=<?php echo $val['galleryIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4><?php echo $val['galleryNameEn']; ?></h4>
								<p><?php echo $val['addr1En']; ?></p>
							</div>
						</li>
						<?php endforeach ; ?>
						<!--
						<li>
							<div class="img out_cover" onclick="">
								<img class="area_zoom h100p" src="/upload/galleries/about/l_1456882175NTPLR95H22.jpg" alt="Gallery Image" style="margin-left: 0%;">
								<a class="cover" href="/galleries/about/?idx=11">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4>GALLERY BATON</h4>
								<p>65, Apgujeong-ro 29-gil, Gangnam-gu, Seoul, Korea</p>
							</div>
						</li>
						<li>
							<div class="img out_cover" onclick="">
								<img class="area_zoom h100p" src="/upload/galleries/about/l_14599910174QY4S566Q7.jpg" alt="Gallery Image" style="margin-left: 0%;">
								<a class="cover" href="/galleries/about/?idx=8">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4>Gallery EM</h4>
								<p>14, Apgujeong-ro 71-gil, Gangnam-gu, Seoul, Korea</p>
							</div>
						</li>
						-->
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($exhibitionList) && count($exhibitionList) > 0) : $existData = true ?>
			<section id="sect_exhibitions" class="area_lato">
				<h2 class="g_tit1"><span>Exhibitions</span></h2>
				<div class="gallery_list_exhi2">
					<ul>
						<?php foreach($exhibitionList as $val) : ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesExhibitionsUploadPath, $val['upfileName']; ?>" alt="Exhibitions Image" />
								<a class="cover" href="/galleries/exhibitions/?at=read&idx=<?php echo $val['galleryIdx']; ?>&eidx=<?php echo $val['exhibitionIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<header>
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="calendar('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt="" /></span></a></li>
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
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['exhibitionTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['description'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
									<div class="txt">
										<h3><?php echo $val['exhibitionTitleEn']; ?></h3>
										<p><?php echo $val['artistNameEn']; ?></p>
									</div>
								</header>
							</div>
						</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($artistList) && count($artistList) > 0) : $existData = true ?>
			<section id="sect_artist" class="area_lato">
				<h2 class="g_tit1"><span>Artist</span></h2>
				<div class="gallery_list_aritst">
					<ul>
						<?php foreach($artistList as $val): ?>
						<li>
							<a href="/galleries/artists/?at=read&idx=<?php echo $val['galleryIdx']; ?>&aidx=<?php echo $val['artistIdx']; ?>" class="img"><img src="<?php echo galleriesArtistsUploadPath, $val['upfileName']; ?>" alt="Artist Image" /></a>
							<p><?php echo $val['artistNameEn']; ?></p>
						</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($artworksList) && count($artworksList) > 0) : $existData = true ?>
			<section id="sect_artworks">
				<h2 class="g_tit1 area_lato"><span>Artworks</span></h2>
				<div class="gallery_list_artwork">
					<ul>
						<?php foreach($artworksList as $val): ?>
						<li>
							<div class="inner">
								<div href="/galleries/artworks/?at=read&idx=<?php echo $val['galleryIdx']; ?>&widx=<?php echo $val['worksIdx']; ?>" class="img out_cover">
									<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="Artworks Image" />
									<a class="cover" href="/galleries/artworks/?at=read&idx=<?php echo $val['galleryIdx']; ?>&widx=<?php echo $val['worksIdx']; ?>">
										<div class="detail_circle"><span></span></div>
									</a>
								</div>
								<h4><?php echo $val['artistNameEn']; ?></h4>
								<p><?php echo $val['worksNameEn'], ' ',$val['makingDate']; ?></p>
							</div>
						</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>


			<?php if (is_array($newsList) && count($newsList) > 0) : $existData = true ?>
			<section id="sect_gallery_news">
				<h2 class="g_tit1 area_lato"><span>News</span></h2>
				<div id="bbs_thumb_t5" class="no_bd type_gallary">
					<ul>
					<?php foreach($newsList as $val): ?>
						<?php
								//목록 이미지S
								if (empty($val['news_main_up_file_name'])) {
									if (empty($val['file_code'])) {
										$list_img = newsUploadPath.$val['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
									}
									else{
										$list_img =$val['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
									}
								}
								else {
									$list_img = newsUploadPath.$val['news_main_up_file_name'];
								}
								//목록 이미지E
						?>
						<li>
							<div class="thumb">
								<a href="/galleries/news/?at=read&idx=<?php echo $val['galleryIdx']; ?>&nidx="><img src="<?php echo $list_img; ?>" alt=""></a>
							</div>
							<div class="cont">
								<h1><a href="/galleries/news/?at=read&idx=<?php echo $val['galleryIdx']; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo htmlspecialchars_decode($val['news_title']);?><img src="/images/galleries/btn_other_link.png" alt="외부링크" /></a></h1>
								<p class="txt"><a href="/galleries/news/?at=read&idx=<?php echo $val['galleryIdx']; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo $val['new_paragraph_content'] ;?></a></p>
								<p class="data"><?php echo (empty($val['source'])) ? '' : '[', $val['source'], ']'  ;?> <?php echo $val['reporter_name'];?> | <?php echo str_replace('-', '.', substr($val['create_date'], 0, 10)); ?></p>
							</div>
						</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($artfairList) && count($artfairList) > 0) : $existData = true ?>
			<section id="sect_gallery_fair" class="area_lato">
				<h2 class="g_tit1"><span>Art Fairs</span></h2>
				<div class="gallery_list_fair">
					<ul>
						<?php foreach($artfairList as $val): ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesArtFairsUploadPath, 'l_', $val['upfileName']; ?>" alt="Art Fair Image" />
								<a class="cover" href="/galleries/artfairs/?at=read&idx=<?php echo $val['galleryIdx']; ?>&fidx=<?php echo $val['fairIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<div class="bx_links">
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar Image" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share Image" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['fairTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['fairTitleEn'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<h4><?php echo $val['fairTitleEn']; ?></h4>
								</div>
								<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
							</div>
						</li>
						<?php endforeach ; ?>

					</ul>
				</div>
			</section>
			<?php endif ; ?>
			<?php if (!$existData) :  ?>
				<div class="no_data">
					<p>Sorry, no results found.</p>
					<p>Please try again with some different keywords. </p>
				</div>
			<?php endif ; ?>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script>
iCutterOwen(["#gallery_spot > .bx_slide > ul > li > a", ".gallery_list_exhi .img", ".gallery_list_aritst .img", "#bbs_thumb_t5 > ul > li .thumb", ".gallery_list_fair .img"]);
$(window).resize(function(){
	iCutterOwen(["#bbs_thumb_t5 > ul > li .thumb"]);
})
$(function(){
	$("#spot_gallery_about .bx_right > ul > li > a").click(function(){
		aboutFn.toggle(this);
	});
});
var aboutFn = {
	toggle : function(me){
		var par = $(me).parent();
		var ans = par.find('.con');
		if(par.hasClass('on')){
			par.removeClass('on');
			ans.slideUp();
		}else{
			par.siblings('.on').removeClass('on').find('.con').slideUp();
			par.addClass('on');
			ans.slideDown(400,function(){
				if(par.hasClass('map yet')){
					initialize();
					par.removeClass('yet')
				}
			});

		}
	}
}
function initialize(){
	var myLatlng = new google.maps.LatLng(37.525199, 126.857296);
	var mapOptions = {
		zoom: 16,
		scrollwheel : false,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById('bx_map'), mapOptions);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: "OPERA GalLERY"
	});
	google.maps.event.addDomListener(window, "resize", function() { //리사이즈에 따른 마커 위치
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
}
</script>