<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "Artworks";
  $pageNum = "4";
  $subNum = "4";
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
		<div id="area_gallery_artwork" class="content-mediaBox margin1">
			<section class="sect_artworks">
				<div class="gallery_list_artwork">
					<ul>
<?
$name2 = array("Teppei Kaneuji", "Kang Hong-Goo", "Jina Park", "Teppei Kaneuji ");
$desc2 = array("Games, Dance and the Constructions (Color Plywood) #3~#10", "문현01, 2012", "A Blue Sofa, 2012", "Ghost in the Liquid Room (Pink Honey), 2012");
for($i = 0 ; $i < 8 ; $i++){
?>
						<li>
							<div class="inner">
								<div href="" class="img out_cover">
									<img class="area_zoom" src="/images/galleries/img_work<?= $i%4+1 ?>.jpg" alt="" />
									<a class="cover" href="artworks_view.php">
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
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





