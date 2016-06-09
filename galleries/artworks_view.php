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
		<div id="area_gallery_artwork_view" class="content-mediaBox margin1">
			<section class="gallery_artwork_view">
				<div class="bx_left">
					<div class="bx_img">
						<div class="bx_slide">
							<ul>
								<li class="on"><img src="/images/galleries/img_work_view1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work2.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work3.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work4.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work5.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work6.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work7.jpg" alt="" /></li>
							</ul>
						</div>
						<div class="thumnail">
							<ul>
							</ul>
						</div>
					</div>
				</div>
				<div class="bx_right">
					<header>
						<h3><span>Son Bong-Chae</span> <button class="view_more" onclick="location.href='artists_view.php'"><span>자세히보기</span></button></h3>
						<h4>Migrants, 2013</h4>
						<p>Oil on polycarbonate and LED</p>
						<p>48 x 63,8 cm</p>
					</header>
					<div class="btns">
						<button class="black">Direct Price Request</button>
						<button>Contact Gallery</button>
					</div>
					<div class="links">
						<ul class="g_sns_type1">
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_5.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_5_on.png" alt=""></span></a></li>
							<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_6.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_6_on.png" alt=""></span></a></li>
						</ul>
						<p><a href=""><span>View the Exhibition</span> &nbsp;&nbsp;<img src="/images/galleries/btn_arr_right.gif" alt=""></a></p>
					</div>
				</div>
			</section>
		</div>
<script>
	function alignSpot(){
		var bxImg = $("#area_gallery_artwork_view .gallery_artwork_view .bx_img");
		iCutterInOwen("#area_gallery_artwork_view .gallery_artwork_view .bx_img .bx_slide > ul > li")
		var artSpot = bxImg.find(".bx_slide > ul > li");
		var len = artSpot.length;
		if(len > 1){
			var str = "";
			for(var k = 0 ; k < len ; k++){
				var img = artSpot.eq(k).html();
				str +='<li '+(k==0 ? "class=\'on\'" : "")+'><div class="inner"><a href="javascript:;">'+img+'</a></div></li>'
			}
			bxImg.find(".thumnail > ul").html(str);
			iCutterOwen("#area_gallery_artwork_view .thumnail a");
			bxImg.find(".thumnail a").on('click',function(){
				var conLi = bxImg.find(".bx_slide > ul > li");
				var par = $(this).parent().parent();
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
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





