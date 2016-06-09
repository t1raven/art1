<? include "../inc/config.php"; ?>
<?php
  $categoriName = "Search Result";
  $pageName = "Search Result";
  $pageNum = "4";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;region=KR&amp;sensor=false"></script>
<section id="container_sub">
	<div class="container_inner">
		<div id="area_gallery_about" class="content-mediaBox margin1">
			<section id="sect_galleris_list" class="area_lato">
				<h2 class="g_tit1"><span>Galleries</span></h2>
				<div class="gallery_list area_lato">
					<ul>
						<li>
							<div class="img out_cover" onclick="">
								<img class="area_zoom h100p" src="/upload/galleries/about/l_1456881151K66FTYF7DT.jpg" alt="Gallery Image" style="margin-left: 0%;">
								<a class="cover" href="/galleries/about/?idx=9">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<h4>LeeSeoul Gallery</h4>
								<p>22-2, Insadong-gil, Jongno-gu, Seoul, Korea</p>
							</div>
						</li>
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
					</ul>
				</div>
			</section>
			<section id="sect_exhibitions" class="area_lato">
				<h2 class="g_tit1"><span>Exhibitions</span></h2>
				<div class="gallery_list_exhi2">
					<ul>
<?
$name2 = array("Matjaž Tančič", "Curated by Zhang Xiaotao", "Justin Adian", "LEE HWAIK GALLERY", "GALLERY EM", "ONE AND J. Gallery");
$desc2 = array("13 December 2015 - 20 February 2016", "26 September - 09 December 2015", "09 January - 27 February 2016", "Jongno-gu, Seoul", "Gangnam-gu, Seoul", "Jongno-gu, Seoul");
for($l = 1 ; $l < 5 ; $l++){
?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="/images/galleries/img_exhibition<?= $l+2 ?>.jpg" alt="" />
								<a class="cover" href="exhibitions_view.php">
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
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt="" /></span></a></li>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt="" /></span></a></li>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt="" /></span></a></li>
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
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<div class="txt">
										<h4><?=$name2[$l-1]?></h4>
										<p><?=$desc2[$l-1]?></p>
									</div>
								</header>
							</div>
							
						</li>
<?
}
?>
					</ul>
				</div>
			</section>
			<section id="sect_artist" class="area_lato">
				<h2 class="g_tit1"><span>Artist</span></h2>
				<div class="gallery_list_aritst">
					<ul>
<?
$name = array("Bin Woo Hyuk", "Stef Driesen", "Max Frisinger", "Andreas Gefeller", "Axel Geis", "Bin Woo Hyuk", "Stef Driesen", "Max Frisinger", "Andreas Gefeller", "Axel Geis");
for($k = 1 ; $k < 11 ; $k++){?>
						<li>
							<a href="artists_view.php" class="img"><img src="/images/galleries/img_artist<?= $k ?>.jpg" alt="" /></a>
							<p><?=$name[$k-1]?></p>
						</li>
<? } ?>
					</ul>
				</div>
			</section>
			<section id="sect_artworks">
				<h2 class="g_tit1 area_lato"><span>Artworks</span> <a href="artworks.php" class="view_more"><span></span></a></h2>
				<div class="gallery_list_artwork">
					<ul>
<?
$name2 = array("Teppei Kaneuji", "Kang Hong-Goo", "Jina Park", "Teppei Kaneuji ");
$desc2 = array("Games, Dance and the Constructions (Color Plywood) #3~#10", "문현01, 2012", "A Blue Sofa, 2012", "Ghost in the Liquid Room (Pink Honey), 2012");
for($ii = 0 ; $ii < 2 ; $ii++){ //8개 만들기위한... 아무 의미없는 for문입니다.
	for($i = 1 ; $i < 5 ; $i++){
?>
						<li>
							<div class="inner">
								<div href="" class="img out_cover">
									<img class="area_zoom" src="/images/galleries/img_work<?= $i ?>.jpg" alt="" />
									<a class="cover" href="artworks_view.php">
										<div class="detail_circle"><span></span></div>
									</a>
								</div>
								<h4><?=$name2[$i-1]?></h4>
								<p><?=$desc2[$i-1]?></p>
							</div>
						</li>
<?
	}
}
?>
					</ul>
				</div>
			</section>
			<section id="sect_gallery_news">
				<h2 class="g_tit1 area_lato"><span>News</span></h2>
				<div id="bbs_thumb_t5" class="no_bd type_gallary">
					<ul>
						<li>
							<div class="thumb">
								<a href="news_view.php"><img src="/images/galleries/img_news1.jpg" alt=""></a>
							</div>
							<div class="cont">
								<h1><a href="news_view.php">한국 공예, 독일 뮌헨 디자인 위크 무대에 선다</a></h1>
								<p class="txt"><a href="news_view.php">독일의 문화예술 3대 도시 중 하나인 뮌헨의 바이에른 국립박물관에서 한국공예의 우수성을 알리는 전시가 처음으로 개최된다. 문화체육관광부 (장관 김종덕)는 독일 바이에른 디자인과 국제포럼디자인의 초청으로 오는 20일부터 3월 28일까지 한국공예의 전통과 현재를 보여주는...</a></p>
								<p class="data">[뉴시스] 박현주 | 2016.02.23</p>
							</div>
						</li>
					
						<li>
							<div class="thumb">
								<a href="news_view.php"><img src="/images/galleries/img_news2.jpg" alt=""></a>
							</div>
							<div class="cont">
								<h1><a href="news_view.php">크리스티 홍콩 이브닝 세일서 한국 작품 모두 낙찰</a></h1>
								<p class="txt"><a href="news_view.php">독일의 문화예술 3대 도시 중 하나인 뮌헨의 바이에른 국립박물관에서 한국공예의 우수성을 알리는 전시가 처음으로 개최된다. 문화체육관광부 (장관 김종덕)는 독일 바이에른 디자인과 국제포럼디자인의 초청으로 오는 20일부터 3월 28일까지 한국공예의 전통과 현재를 보여주는...</a></p>
								<p class="data">[머니투데이] 김지훈 | 2016.02.22</p>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<section id="sect_gallery_fair" class="area_lato">
				<h2 class="g_tit1"><span>Art Fairs</span></h2>
				<div class="gallery_list_fair">
					<ul>
<?
$name2 = array("Art Los Angeles Contemporary", "Art Basel Miami Beach 2015", "Art Basel Hong Kong 2015");
$desc2 = array("28 - 31 Jan 2016", "03 - 06 Dec 2015", "15 - 17 Mar 2015");
for($l = 1 ; $l < 4 ; $l++){
?>
						<li>
							<div href="#" class="img out_cover">
								<img class="area_zoom" src="/images/galleries/img_pair<?= $l ?>.jpg" alt="" />
								<a class="cover" href="art_fairs_view.php">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<div class="bx_links">
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar Image"><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt=""></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar();" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="googleCal();" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="calendar();" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share Image"><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt=""></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt=""></span></a></li>
													<li><a href="javascript:" onclick="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<h4><?=$name2[$l-1]?></h4>
								</div>
								<p><?=$desc2[$l-1]?></p>
							</div>
						</li>
<?
}
?>
					</ul>
				</div>
			</section>
			
			
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
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





