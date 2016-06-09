<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "exhibition";
  $pageNum = "4";
  $subNum = "2";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
<script src="/js/idangerous.swiper.min.js"></script>
<section id="container_sub">
	<div class="container_inner">
		<? include "../inc/path.php"; ?>
		<? include "tab_galleries.php"; ?>
		<div id="area_gallery_exhibition_view" class="content-mediaBox margin1">
			<div class="gallery_exhibition_view">
				<div class="bx_left">
					<div class="bx_img">
						<div class="bx_slide">
							<ul>
								<li class="on"><img src="/images/galleries/img_exhibition_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_exhibition_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_exhibition_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_exhibition_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_exhibition_view1.jpg" alt="" /></li>
							</ul>
						</div>
						<div class="thumnail">
							<ul>
							</ul>
						</div>
					</div>
					<header class="area_lato">
						<h3>Nov 27 - Dec 23, 2015</h3>
						<h2>Underprint: a sparrow and jajangmyeon</h2>
						<p>Hong-Goo Kang </p>
					</header>
					<div class="bx_links">
						<ul class="link_share_btns">
							<li class="calender">
								<a href="javascript:;"><img src="/images/galleries/ico_calender2.png" alt="캘린더" /></a>
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
								<a href="javascript:;"><img src="/images/galleries/ico_link2.png" alt="링크쉐어" /></a>
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
					</div>
					<div class="con">
						<p>Over the past thirty years that I’ve been in the fields of art and photography, art has become exceedingly banal. The authority surrounding images and art has long since handed over to an industry. Nowadays, real art means buying and selling works, building museums and curating exhibitions with the system. Stuck in the midst of all this are the artists of which I consider myself.</p>
						<p>An “underprint” refers to the subtle print found on paper currency or stamps. My works are kind of similar in a way that they are drawings onto pictures of walls from different places: Seoul’s redevelopment areas, Changsin-dong, Hannam-dong, Busan, Cheongju, and Sinan-gun of Jeollanam-do. I took these photos at the time thinking I could make use of them somewhere. I then made drawings on them - something I’ve wanted to do for at least ten years.He mentions that poets, including Jeongju Seo, wrote poems that were too sentimental and personal in nature. The poems of such self contented nature were devoid of any effects on the common cultural world that could respond or relate to concrete experiences and greater universality.</p>
					</div>
				</div>
				<div class="bx_right">
					<h3 class="area_lato">Selected works</h3>
					<section class="sect_artworks">
						<div class="gallery_list_artwork">
							<ul>
		<?
		$name2 = array("Teppei Kaneuji", "Kang Hong-Goo", "Jina Park", "Teppei Kaneuji ");
		$desc2 = array("Games, Dance and the Constructions (Color Plywood) #3~#10", "문현01, 2012", "A Blue Sofa, 2012", "Ghost in the Liquid Room (Pink Honey), 2012");
		for($i = 0 ; $i < 4 ; $i++){
		?>
								<li>
									<div class="inner">
										<div href="" class="img out_cover">
											<img class="area_zoom" src="/images/galleries/img_work<?= $i%4+1 ?>.jpg" alt="" />
											<a class="cover" href="">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?=$name2[$i%4]?></h4>
										<p><?=$desc2[$i%4]?></p>
									</div>
								</li>
		<?
		}
		?>
							</ul>
						</div>
					</section>
				</div>
			</div>
			
			
<script>
	function alignSpot(){
		var bxImg = $("#area_gallery_exhibition_view .gallery_exhibition_view .bx_img");
		iCutterOwen("#area_gallery_exhibition_view .bx_img .bx_slide > ul > li");
		var artSpot = bxImg.find(".bx_slide > ul > li");
		var len = artSpot.length;
		if(len > 1){
			var str = "";
			for(var k = 0 ; k < len ; k++){
				var img = artSpot.eq(k).html();
				str +='<li '+(k==0 ? "class=\'on\'" : "")+'><a href="javascript:;">'+img+'</a></li>'
			}
			bxImg.find(".thumnail > ul").html(str);
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
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





