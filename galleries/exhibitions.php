<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "GALLERIES";
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
		<div id="area_gallery_exhibition" class="content-mediaBox margin1">
			<section class="sect_exhibitions" class="area_lato">
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
			
			<section class="sect_exhibitions_list" class="area_lato">
				<div class="gallery_list_exhi2">
					<ul>
<?
$name2 = array("Matjaž Tančič", "Curated by Zhang Xiaotao", "Justin Adian", "LEE HWAIK GALLERY", "GALLERY EM", "ONE AND J. Gallery");
$desc2 = array("13 December 2015 - 20 February 2016", "26 September - 09 December 2015", "09 January - 27 February 2016", "Jongno-gu, Seoul", "Gangnam-gu, Seoul", "Jongno-gu, Seoul");
for($l = 1 ; $l < 7 ; $l++){
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
			
			
<script>
iCutterOwen([".gallery_list_exhi .img", ".gallery_list_exhi2 .img"]);
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





