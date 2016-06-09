<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "Art Fairs";
  $pageNum = "4";
  $subNum = "6";
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
		<div id="area_gallery_pair" class="content-mediaBox margin1">
			<section id="sect_gallery_fair" class="area_lato">
				<div class="gallery_list_fair">
					<ul>
<?
$name2 = array("Art Los Angeles Contemporary", "Art Basel Miami Beach 2015", "Art Basel Hong Kong 2015","Art Los Angeles Contemporary", "Art Basel Miami Beach 2015", "Art Basel Hong Kong 2015");
$desc2 = array("28 - 31 Jan 2016", "03 - 06 Dec 2015", "15 - 17 Mar 2015","28 - 31 Jan 2016", "03 - 06 Dec 2015", "15 - 17 Mar 2015");
for($l = 0 ; $l < 9 ; $l++){
?>
						<li>
							<div href="#" class="img out_cover">
								<img class="area_zoom" src="/images/galleries/img_pair<?= $l%6+1 ?>.jpg" alt="" />
								<a class="cover" href="art_fairs_view.php">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<h4><?=$name2[$l%6]?></h4>
							<p><?=$desc2[$l%6]?></p>
						</li>
<?
}
?>
					</ul>
				</div>
			</section>
			
			
<script>
iCutterOwen(".gallery_list_fair .img");
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





