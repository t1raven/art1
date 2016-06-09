<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';

$categoriName = "GALLERIES";
$pageName = "Artworks";
$pageNum = "4";
$subNum = "100";
$thirdNum = "0";
$pathType = "a";

?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/spot_sub.php"; ?>
<script src="/js/idangerous.swiper.min.js"></script>
<section id="container_sub">
	<div class="container_inner">
		<? include "../../inc/path.php"; ?>
		<? include "../tab_galleries.php"; ?>
		<div id="area_gallery_artwork_view" class="content-mediaBox margin1" style="height:800px;text-align:center">
			<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView('14', '27', '', '', '', 'about');">작품 상세 열기</button>
			<!--<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView('6', '336', '29', '', '', 'exhibitions');">작품 상세 열기</button>-->
			<!--<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView('6', '338', '', '81', '', 'artists');">작품 상세 열기</button>-->
			<!--<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView('6', '340', '', '', '', 'artworks');">작품 상세 열기</button>-->
			<!--<button style="padding:15px 12px;font-size:16px;color:#fff;background-color:#333;margin-top:80px;" onclick="showLayerArtworksView('14', '23', '', '', '15', 'artfairs');">작품 상세 열기</button>-->
		</div>
<script>
/*
	function showLayerArtworksView(idx, widx, eidx, aidx, fidx, tgt){
		var t = $("#pop_bx_common");
		$.ajax({
			url : '/galleries/artworks/ajax_pop_artworks_view.php',
			type : 'POST',
			dataType : 'html',
			data : {"idx":idx, "widx":widx, "eidx":eidx, "aidx":aidx, "fidx":fidx, "tgt":tgt},
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
*/
</script>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../../inc/footer.php"; ?>
<? include "../../inc/bot.php"; ?>





