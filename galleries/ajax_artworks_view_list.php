<?php
$idx = $_GET["idx"];
$step = $_GET["step"];
if($step == 'first'){
	$idxs = array($idx-1, $idx, $idx+1);
}else{
	$idxs = array($idx);
}
for($i = 0 ; $i < count($idxs) ; $i++){
?>
	<li class="swiper-slide list" data-idx="<?=$idxs[$i]?>">
		<section class="gallery_artwork_view">
			<div class="bx_left">
				<div class="bx_img">
					<div class="bx_slide">
						<ul>
							<?for($j = 0 ; $j < $i+1 ; $j++){?>
							<li><img src="/images/galleries/img_work<?=$idxs[$i]?>.jpg" alt="" /></li>
							<?}?>
						</ul>
					</div>
					<div class="thumnail"><ul></ul></div>
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
					<button onclick="goLogin();">Direct Price Requests<span class="h_ov">작품가 바로 문의</span></button>
					<button onclick="goLogin();">Contact Gallery<span class="h_ov">작품 상세 문의</span></button>
				</div>
				<div class="links">
					<ul class="g_sns_type1">
						<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt=""></span></a></li>
						<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt=""></span></a></li>
						<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt=""></span></a></li>
						<!--<li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_6.png" alt=""><span class="h_on"><img src="/images/galleries/ico_sns_t1_6_on.png" alt=""></span></a></li>-->
					</ul>
				</div>
			</div>
		</section>
	</li>
	<script>
		console.log(<?=count($idxs)?>);
		alignArtWorkView(<?=$idxs[$i]?>);
	</script>
<?
}