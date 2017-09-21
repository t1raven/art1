<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_about" class="content-mediaBox margin1">
			<section id="spot_gallery_about">
				<div class="bx_left">
					<div class="img">
						<img src="<?php echo galleriesAboutUploadPath, $about->attr['mainImg']; ?>" alt="Gallery Image" />
					</div>
					<div class="cap">
						<h3><?php echo $about->attr['galleryNameEn']; ?></h3>
						<p><?php echo $about->attr['introduction']; ?></p>
					</div>
				</div>
				<div class="bx_right">
					<header>
						<h3><?php echo $about->attr['galleryNameEn']; ?></h3>
						<h4><?php echo $about->attr['galleryNameKr']; ?></h4>
					</header>
					<ul>
						<li class="address">
							<a href="javascript:;">Address & Hours</a>
							<div class="con">
								<?php if ($about->attr['isAddrDisplay'] == "Y") : ?>
								<dl class="hori"> <dt><img src="/images/galleries/ico_location2.png" alt="주소" /> </dt> <dd><?php echo $about->attr['addr1'], '<br>', $about->attr['addr2']; ?></dd> </dl>
								<?php endif ; ?>
								<?php if ($about->attr['isAddrDisplayEn'] == "Y") : ?>
								<dl class="hori"> <dt><img src="/images/galleries/ico_location2.png" alt="주소" /> </dt> <dd><?php echo $about->attr['addr1En']; ?></dd> </dl>
								<?php endif ; ?>
								<?php if (!empty($about->attr['companyAddrEn'])) : ?><dl class="hori"> <dt><img src="/images/galleries/ico_location2.png" alt="주소" /> </dt> <dd><?php echo $about->attr['companyAddrEn']; ?></dd> </dl><?php endif ; ?>
								<?php if (!empty($about->attr['parking'])) : ?><dl class="hori"> <dt><img src="/images/galleries/ico_parking2.png" alt="주차" /></dt> <dd><?php echo $about->attr['parking']; ?></dd> </dl><?php endif ; ?>
								<?php if (!empty($about->attr['openingHours'])) : ?><dl class="hori"> <dt><img src="/images/galleries/ico_watch2.png" alt="관람시간" /></dt> <dd><?php echo $about->attr['openingHours']; ?></dd> </dl><?php endif ; ?>
							</div>
						</li>
						<li class="map yet">
							<a href="javascript:;">Map</a>							
							<div class="con">
								<?php if (!empty($about->attr['companylatlng'])) : ?>
								<div class="tabBox">
									<ul>
										<li class="on" id="tab1"><a href="javascript:map_select(1);">지사</a></li>
										<li class="" id="tab2"><a href="javascript:map_select(2);">본사</a></li>
									</ul>
								</div>
								<?php endif ; ?>
								<div id="bx_map"></div>
								<?php if (!empty($about->attr['companylatlng'])) : ?>
								<div id="bx_map2" style="width: 100%; height: 215px;"></div>
								<?php endif ; ?>
							</div>
						</li>
						<li class="contact">
							<a href="javascript:;">Contact</a>
							<div class="con">
								<dl class="hori"> <dt><img src="/images/galleries/ico_email2.png" alt="이메일" /> </dt> <dd><?php echo str_replace("/", "<br>", $about->attr['email']); ?></dd> </dl>
								<dl class="hori"> <dt><img src="/images/galleries/ico_phone2.png" alt="전화번호" /> </dt> <dd><?php echo $about->attr['tel']; ?></dd> </dl>
								<?php if (!empty($about->attr['fax'])) : ?><dl class="hori"> <dt><img src="/images/galleries/ico_fax2.png" alt="팩스" /> </dt> <dd><?php echo $about->attr['fax']; ?></dd> </dl><?php endif ; ?>
							</div>
						</li>
						<li class="links">
							<a href="javascript:;">Homepage & SNS</a>
							<div class="con">
								<ul class="g_sns_type1">
									<li><a href="<?php echo $about->attr['homepage']; ?>" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_homepage.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_homepage_on.png" alt="" /></span></a></li>
									<?php if (!empty($about->attr['facebook'])) : ?><li><a href="https://www.facebook.com/<?php echo $about->attr['facebook']; ?>" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt="" /></span></a></li><?php endif ; ?>
									<!-- <li><a href="" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_2_on.png" alt="" /></span></a></li> -->
									<!--<li><a href="" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt="" /></span></a></li>-->
									<?php if (!empty($about->attr['google'])) : ?><li><a href="https://plus.google.com/<?php echo $about->attr['google']; ?>" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt="" /></span></a></li><?php endif ; ?>
									<?php if (!empty($about->attr['instagram'])) : ?><li><a href="https://www.instagram.com/<?php echo $about->attr['instagram']; ?>" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_5_on.png" alt="" /></span></a></li><?php endif ; ?>
									<?php if (!empty($about->attr['naver'])) : ?><li><a href="http://blog.naver.com/<?php echo $about->attr['naver']; ?>" class="bx_img_h" target="_blank"><img src="/images/galleries/ico_sns_t1_6.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_6_on.png" alt="" /></span></a></li><?php endif ; ?>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</section>

		<?php if (is_array($aExhibitionsList)) : ?>
			<section id="sect_exhibitions" class="area_lato">
				<h2 class="g_tit1"><span>Exhibitions</span> <!-- <a href="/galleries/exhibitions/?idx=<?php echo $idx; ?>" class="view_more"><span></span></a> --><a href="/galleries/exhibitions/?idx=<?php echo $idx; ?>" class="view_all">View All (<?php echo $exhibitionsCount;?>) ▶</a></h2>
				<div class="gallery_list_exhi">
					<ul>
					<?php foreach($aExhibitionsList as $val): ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesExhibitionsUploadPath, $val['upfileName']; ?>" alt="Exhibitions Image" />
								<a class="cover" href="/galleries/exhibitions/?at=read&idx=<?php echo $idx; ?>&eidx=<?php echo $val['exhibitionIdx']; ?>">
									<div class="detail_circle big"><span></span></div>
								</a>
							</div>
							<div class="con">
								<header>
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender_on.png" alt="" /></span></span>
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
												<span><img src="/images/galleries/ico_link.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link_on.png" alt="" /></span></span>
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
								</header>
								<h3><?php echo $val['exhibitionTitleEn']; ?></h3>
								<p><?php echo $val['artistNameEn']; ?></p>
							</div>
						</li>
					<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ;  ?>

			<?php if (is_array($aArtistsList)) : ?>
			<section id="sect_artist" class="area_lato">
				<h2 class="g_tit1"><span>Artists</span> <a href="/galleries/artists/?idx=<?php echo $idx; ?>" class="view_all">View All (<?php echo number_format($artistsCount);?>) ▶</a></h2>
				<div class="gallery_list_aritst">
					<ul>
						<?php foreach($aArtistsList as $val): ?>
						<li>
							<a href="/galleries/artists/?at=read&idx=<?php echo $idx; ?>&aidx=<?php echo $val['artistIdx']; ?>" class="img"><img src="<?php echo galleriesArtistsUploadPath, $val['upfileName']; ?>" alt="Artist Image" /></a>
							<p><?php echo $val['artistNameEn']; ?></p>
						</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($aArtworksList)) : ?>
			<!--
			<section id="sect_artworks">
				<h2 class="g_tit1 area_lato"><span>Artworks</span> <a href="/galleries/artworks/?idx=<?php echo $idx; ?>" class="view_more"><span></span></a></h2>
				<div class="gallery_list_artwork">
					<ul>
						<?php foreach($aArtworksList as $val): ?>
						<li>
							<div class="inner">
								<div href="/galleries/artworks/?at=read&idx=<?php echo $idx; ?>&widx=<?php echo $val['worksIdx']; ?>" class="img out_cover">
									<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="Artworks Image" />
									<a class="cover" href="/galleries/artworks/?at=read&idx=<?php echo $idx; ?>&widx=<?php echo $val['worksIdx']; ?>">
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
			-->

			<section id="sect_artworks">
				<h2 class="g_tit1 area_lato"><span>Artworks</span> <a href="/galleries/artworks/?idx=<?php echo $idx; ?>" class="view_all">View All (<?php echo number_format($artworksCount);?>) ▶</a></h2>
				<div class="gallery_list_artwork">
					<ul>
						<?php foreach($aArtworksList as $val): ?>
						<li>
							<div class="inner">
								<div href="javascript:;" class="img out_cover" onclick="showLayerArtworksView('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>', '', '', '', 'about');">
									<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="Artworks Image" />
									<a class="cover" href="javascript:;" class="img out_cover">
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

			<?php if (is_array($aNewsList)) : ?>
			<section id="sect_gallery_news">
				<h2 class="g_tit1 area_lato"><span>News</span> <a href="/galleries/news/?idx=<?php echo $idx; ?>" class="view_all">View All (<?php echo number_format($newsCount);?>) ▶</a></h2>
				<div id="bbs_thumb_t5" class="no_bd type_gallary">
					<ul>
					<?php foreach($aNewsList as $val): ?>
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
								<a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><img src="<?php echo $list_img; ?>" alt=""></a>
							</div>
							<div class="cont">
								<h1>
									<a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo htmlspecialchars_decode($val['news_title']);?><img src="/images/galleries/btn_other_link.png" alt="외부링크" /></a>
									</h1>
								<p class="txt"><a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo $val['new_paragraph_content'] ;?></a></p>
								<p class="data"><?php echo (empty($val['source'])) ? '' : '[', $val['source'], ']'  ;?> <?php echo $val['reporter_name'];?> | <?php echo str_replace('-', '.', substr($val['create_date'], 0, 10)); ?></p>
							</div>
						</li>
						<?php endforeach ; ?>

					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($aArtfairsList)) : ?>
			<section id="sect_gallery_fair" class="area_lato">
				<h2 class="g_tit1"><span>Art Fairs</span> <a href="/galleries/artfairs/?idx=<?php echo $idx; ?>" class="view_all">View All (<?php echo number_format($artfairsListCount);?>) ▶</a></h2>
				<div class="gallery_list_fair">
					<ul>
						<?php foreach($aArtfairsList as $val): ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesArtFairsUploadPath, 'l_', $val['upfileName']; ?>" alt="Art Fair Image" />
								<a class="cover" href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>">
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

		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;region=KR&amp;sensor=false"></script>
<script>
iCutterOwen(["#gallery_spot > .bx_slide > ul > li > a", ".gallery_list_exhi .img", ".gallery_list_aritst .img", "#bbs_thumb_t5 > ul > li .thumb", ".gallery_list_fair .img"]);
$(window).resize(function(){
	iCutterOwen(["#bbs_thumb_t5 > ul > li .thumb"]);
})
function map_select(num)
{
	if(num == 1)
	{		
		$("#tab1").removeClass("on");
		$("#tab2").removeClass("on");
		$("#tab1").addClass("on");

		$("#bx_map").css("display", "");
		$("#bx_map2").css("display", "none");
		initialize();
	}
	else
	{
		$("#tab1").removeClass("on");
		$("#tab2").removeClass("on");
		$("#tab2").addClass("on");

		$("#bx_map").css("display", "none");
		$("#bx_map2").css("display", "");
		initialize();
	}
}
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
					par.removeClass('yet');			
					map_select(1);
				}
			});
		}
	}
}
function initialize(){
	var myLatlng = new google.maps.LatLng(<?php echo $about->attr['lat']; ?>, <?php echo $about->attr['lng']; ?>);
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
		title: "<?php echo $about->attr['galleryNameKr']; ?>"
	});
	google.maps.event.addDomListener(window, "resize", function() { //리사이즈에 따른 마커 위치
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	});


	google.maps.event.addListener(marker, "click", function() { //리사이즈에 따른 마커 위치
		window.open("https://maps.google.com/maps?q=<?php echo $about->attr['lat']; ?>,<?php echo $about->attr['lng']; ?>&ll=<?php echo $about->attr['lat']; ?>,<?php echo $about->attr['lng']; ?>&z=15", "gooeleMap", "");
	});


	<?php if (!empty($about->attr['companylatlng'])) : ?>
	<?php
		$companylatlng = explode(",", $about->attr['companylatlng']);
	?>

	var myLatlng2 = new google.maps.LatLng(<?php echo $companylatlng[0]; ?>, <?php echo $companylatlng[1]; ?>);
	var mapOptions2 = {
		zoom: 16,
		scrollwheel : false,
		center: myLatlng2,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map2 = new google.maps.Map(document.getElementById('bx_map2'), mapOptions2);
	var marker2 = new google.maps.Marker({
		position: myLatlng2,
		map: map2,
		title: "<?php echo $about->attr['galleryNameEn']; ?>"
	});
	google.maps.event.addDomListener(window, "resize", function() { //리사이즈에 따른 마커 위치
		var center2 = map2.getCenter();
		google.maps.event.trigger(map2, "resize");
		map2.setCenter(center2);
	});

	google.maps.event.addListener(marker2, "click", function() { //리사이즈에 따른 마커 위치
		window.open("https://maps.google.com/maps?q=<?php echo $companylatlng[0]; ?>,<?php echo $companylatlng[1]; ?>&ll=<?php echo $companylatlng[0]; ?>,<?php echo $companylatlng[1]; ?>&z=15", "gooeleMap", "");
	});		
	
	<?php endif ; ?>
	
	/*
	setTimeout(
		function(){
			//console.log($("#bx_map").html())
			$("#bx_map > div > div").eq(1).find("a").attr("href", "https://maps.google.com/maps?q=<?php echo $about->attr['lat']; ?>,<?php echo $about->attr['lng']; ?>&ll=<?php echo $about->attr['lat']; ?>,<?php echo $about->attr['lng']; ?>&z=15");
		}
	,1000);
	*/

}



</script>