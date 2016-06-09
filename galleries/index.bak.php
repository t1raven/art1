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
<!-- <? include "../inc/spot_sub.php"; ?> --> 
<style>
	.tmp_img img{max-width:100%;}
	@media screen and (max-width:600px){
		#container_sub{overflow: hidden;}
		#area_gallery{}
		.tmp_img{position: relative;width:600px;margin-left:-300px;left:50%;}
	}
</style>
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?>
		<div id="area_gallery" class="content-mediaBox margin1">
			<div class="tmp_img">
				<img src="/images/galleries/tmp_bg_gallery.jpg" alt="" />
			</div>
		</div>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





