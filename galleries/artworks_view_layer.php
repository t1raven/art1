<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "Artworks";
  $pageNum = "4";
  $subNum = "100";
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
		<div id="area_gallery_artwork_view" class="content-mediaBox margin1" style="height:800px;text-align:center">
			<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView(3)">작품 상세 열기</button>
		</div>
<script>
	function showLayerArtworksView(idx){
		var t = $("#pop_bx_common");
		$.ajax({
			url : '/galleries/ajax_pop_artworks_view.php',
			type : 'GET',
			dataType : 'html',
			data : {idx:idx},
			success : function(data){
				t.html(data);
			},
			error : function(a,b,c){
				alert(c);
			}
		})
	}
	
	$(function(){
	});
</script>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





