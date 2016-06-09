<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "Artists";
  $pageNum = "4";
  $subNum = "3";
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
		<div id="area_gallery_artist_view" class="content-mediaBox margin1">
			<section class="gallery_artist_view">
				<div class="bx_left area_lato">
					<header>
						<dl>
							<dt>
								<div class="img">
									<img src="/images/galleries/img_artist_veiw1.jpg" alt="" />
								</div>
							</dt>
							<dd>
								<div class="inner">
									<h4>Son Bong-Chae</h4>
									<p>(1967 - )</p>
								</div>
							</dd>
						</dl>
					</header>
					<div class="link">
						<ul class="g_sns_type1">
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_5.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_5_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_6.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_6_on.png" alt=""></span></a></li>
						</ul>
						<p><a href=""><span>View the Exhibition</span> &nbsp;&nbsp;<img src="/images/galleries/btn_arr_right.gif" alt="" /></a></p>
					</div>
					<div class="con">
						<p>Son Bong Chae is a pioneer of the 3D painting genre and known for being the youngest participate in the Gwangjiu Biennale in 1997.</p>
						<p>His work is composed of multiple layers of oil paint onto a special type of bulletproof glass, 300 times stronger than acrylic glass, called polycarbonate. On each of the five layers of polycarbonate Son Bong Chae paints his ethereal pine tree. Illuminated by a luminescent diode, a special type of lighting similar to a LED, his paintings evoke both the memory of traditional painting and the timelessness of the scene.</p>
						<p>Son Bong Chau received his MFA from the prestigious Pratt Institute in New York.</p>
						<p>He has participated in numerous solo exhibitions, most recently in galleries in Austria, Korean, and Germany. He has exhibited in an extensive list of biennales since 2006, as well as Art Singapore, Arco Art Fair and Art Paris and Art 42 Basel, among other international art fairs. His work appears in the collections including the National Museum of Contemporary Art in Korea, the Gwangiu Biennale Foundation and the Korean Cultural Center in Shanghai.</p> 
					</div>
				</div>
				<div class="bx_right">
					<h3 class="area_lato">Artworks <span>(5)</span></h3>
					<section class="sect_artworks">
						<div class="gallery_list_artwork">
							<ul>
<?
$name2 = array("Teppei Kaneuji", "Kang Hong-Goo", "Jina Park", "Teppei Kaneuji ");
$desc2 = array("Games, Dance and the Constructions (Color Plywood) #3~#10", "문현01, 2012", "A Blue Sofa, 2012", "Ghost in the Liquid Room (Pink Honey), 2012");
for($i = 0 ; $i < 5 ; $i++){
?>
								<li>
									<div class="inner">
										<div href="" class="img out_cover">
											<img class="area_zoom" src="/images/galleries/img_work<?= $i+5 ?>.jpg" alt="" />
											<a class="cover" href="">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?=$name2[$i]?></h4>
										<p><?=$desc2[$i]?></p>
									</div>
								</li>
<?
}
?>
							</ul>
							
						</div>
					</section>
				</div>
			</section>
<script>
	iCutterOwen(".gallery_artist_view header .img");
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





