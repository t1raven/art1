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
		<div id="area_gallery_artist" class="content-mediaBox margin1">
			<section class="sect_artist area_lato">
				<div class="gallery_list_aritst">
					<ul>
<?
$name = array("Bin Woo Hyuk", "Stef Driesen", "Max Frisinger", "Andreas Gefeller", "Axel Geis", "Bin Woo Hyuk", "Stef Driesen", "Max Frisinger", "Andreas Gefeller", "Axel Geis");
for($k = 0 ; $k < 15 ; $k++){?>
						<li>
							<a href="artists_view.php" class="img"><img src="/images/galleries/img_artist<?= $k%10+1 ?>.jpg" alt="" /></a>
							<p><?=$name[$k%10]?></p>
						</li>
<? } ?>
					</ul>
				</div>
			</section>
<script>
iCutterOwen(".gallery_list_aritst .img");
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





