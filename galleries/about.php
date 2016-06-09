<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "GALLERIES";
  $pageNum = "4";
  $subNum = "1";
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
		<? include "../inc/path.php"; ?>
		<? include "tab_galleries.php"; ?>
		<div id="area_gallery_about" class="content-mediaBox margin1">
			<section id="spot_gallery_about">
				<div class="bx_left">
					<div class="img">
						<img src="/images/galleries/bg_spot_about.jpg" alt="about" />
					</div>
					<div class="cap">
						<h3>OPERA GAlLERY</h3>
						<p>Emerging as Korea’s leading contemporary art gallery with high quality curating and and distinctive exhibitions of national and international artists that represent contemporaneity of contemporary art, Gallery Baton has introduced art historical trends and artists that are worthwhile to receive international attention in order to react actively to various flows of contemporary art.</p>
						<p> Though organizing high quality exhibitions of the artists that could access into the current state of contemporary art, Gallery Baton will eventually contribute to expansion and diversity of domestic and international contemporary art. <br />At the same time, it will enthusiastically strive for close communication with the art lovers.</p>
					</div>
				</div>
				<div class="bx_right">
					<h3>오페라갤러리</h3>
					<ul>
						<li class="address">
							<a href="javascript:;">Address & Hours</a>
							<div class="con">
								<p>주소: 서울시 강남구 도산대로 318, SB 타워 1층</p>
								<p>주차: SB 타워 지하 주차장 이용 (건물 뒷편 위치)</p>
								<p>관람시간: 연중무휴 (공휴일 제외) 10am-7pm</p>
							</div>
						</li>
						<li class="map yet">
							<a href="javascript:;">Map</a>
							<div class="con">
								<div id="bx_map">
							</div>
						</li>
						<li class="contact">
							<a href="javascript:;">Contact</a>
							<div class="con">
								<p>이메일: seoul@operagallery.com</p>
								<p>전화번호: 02-3446-0070</p>
								<p>팩스번호: 02-3446-0061</p>
							</div>
						</li>
						<li class="links">
							<a href="javascript:;">Homepage & SNS</a>
							<div class="con">
								<a href="" class="homepage" target="_blank">https://www.operagallery.com</a>
								<ul class="g_sns_type1">
									<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt="" /></span></a></li>
									<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_2_on.png" alt="" /></span></a></li> -->
									<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt="" /></span></a></li>
									<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt="" /></span></a></li>
									<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_5_on.png" alt="" /></span></a></li>
									<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_6.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_6_on.png" alt="" /></span></a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<section id="sect_exhibitions" class="area_lato">
				<h2 class="g_tit1"><span>Exhibitions</span> <a href="exhibitions.php" class="view_more"><span></span></a></h2>
				<div class="gallery_list_exhi">
					<ul>
<?for($j = 1 ; $j < 3 ; $j++){?>						
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="/images/galleries/img_exhibition<?= $j ?>.jpg" alt="" />
								<a class="cover" href="exhibitions_view.php">
									<div class="detail_circle big"><span></span></div>
								</a>
							</div>
							<div class="con">
								<header>
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;"><img src="/images/galleries/ico_calender.png" alt="캘린더" /></a>
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
											<a href="javascript:;"><img src="/images/galleries/ico_link.png" alt="링크쉐어" /></a>
											<div class="hv">
												<ul>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<p>Nov 27 - Dec 23, 2015</p>
								</header>
								<h3>Underprint: a sparrow and jajangmyeon</h3>
								<p>Hong-Goo Kang</p>
							</div>
						</li>
<? } ?>						
					</ul>
				</div>
			</section>
			<section id="sect_artist" class="area_lato">
				<h2 class="g_tit1"><span>Artist</span> <a href="artists.php" class="view_more"><span></span></a></h2>
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
				<h2 class="g_tit1 area_lato"><span>News</span> <a href="news.php" class="view_more"><span></span></a></h2>
				<div id="bbs_thumb_t5" class="no_bd">
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
				<h2 class="g_tit1"><span>Art Fairs</span> <a href="art_fairs.php" class="view_more"><span></span></a></h2>
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
							<h4><?=$name2[$l-1]?></h4>
							<p><?=$desc2[$l-1]?></p>
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





