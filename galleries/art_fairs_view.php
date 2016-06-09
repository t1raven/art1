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
<script src="/js/idangerous.swiper.min.js"></script>
<section id="container_sub">
	<div class="container_inner">
		<? include "../inc/path.php"; ?>
		<? include "tab_galleries.php"; ?>
		<div id="area_gallery_fair_view" class="content-mediaBox margin1">
			<div class="gallery_fair_view">
				<div class="bx_left">
					<div class="bx_img">
						<div class="bx_slide">
							<ul>
								<li class="on"><img src="/images/galleries/img_fair_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view2.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view3.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view4.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view5.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_fair_view6.jpg" alt="" /></li>
							</ul>
						</div>
						<div class="thumnail">
							<ul>
							</ul>
						</div>
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
			</div>
			
			
<script>
	function alignSpot(){
		var bxImg = $("#area_gallery_fair_view .gallery_fair_view .bx_img");
		iCutterOwen("#area_gallery_fair_view .bx_img .bx_slide > ul > li");
		var artSpot = bxImg.find(".bx_slide > ul > li");
		var len = artSpot.length;
		if(len > 1){
			var str = "";
			for(var k = 0 ; k < len ; k++){
				var img = artSpot.eq(k).html();
				str +='<li '+(k==0 ? "class=\'on\'" : "")+'><a href="javascript:;">'+img+'</a></li>'
			}
			bxImg.find(".thumnail > ul").html(str);
			iCutterOwen("#area_gallery_fair_view .bx_img .thumnail a");
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





