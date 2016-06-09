<? include "../inc/config.php"; ?>
<?php
  $categoriName = "GALLERIES";
  $pageName = "News";
  $pageNum = "4";
  $subNum = "5";
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
		<div id="area_gallery_news" class="content-mediaBox margin1">
			<section class="sect_gallery_news">
				<div id="bbs_thumb_t5">
					<header class="header">
	                    <p class="total">총 <strong>468</strong>개의 글이 등록되었습니다.</p>
	                    <div class="bx_search">
							<p><input type="text"> <button class="btn_pack samll2 black area_lato">Search</button></p>
						</div>
	                </header>
					<ul>
<?
	$tit = array('한국 공예, 독일 뮌헨 디자인 위크 무대에 선다', '크리스티 홍콩 이브닝 세일서 한국 작품 모두 낙찰', '정부, 2018년까지 미술시장 6천300억원 규모로 확대', '잘 나가는 미술작가 = 잘 팔리는 미술작가');
	for($i = 0 ; $i < 4 ; $i++){
?>
						<li>
							<div class="thumb">
								<a href="news_view.php"><img src="/images/galleries/img_news<?=$i+1?>.jpg" alt=""></a>
							</div>
							<div class="cont">
								<h1><a href="news_view.php"><?=$tit[$i]?></a></h1>
								<p class="txt"><a href="news_view.php">독일의 문화예술 3대 도시 중 하나인 뮌헨의 바이에른 국립박물관에서 한국공예의 우수성을 알리는 전시가 처음으로 개최된다. 문화체육관광부 (장관 김종덕)는 독일 바이에른 디자인과 국제포럼디자인의 초청으로 오는 20일부터 3월 28일까지 한국공예의 전통과 현재를 보여주는...</a></p>
								<p class="data">[뉴시스] 박현주 | 2016.02.23</p>
							</div>
						</li>
<? } ?>
					</ul>
				</div>
			</section>
			
<script>
iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
$(window).resize(function(){
	iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
})
</script>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





