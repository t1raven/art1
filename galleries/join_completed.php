<? include "../inc/config.php"; ?>
<?php
  $categoriName = "입점신청";
  $pageName = "Artists";
  $pageNum = "4";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub" class="content-mediaBox margin1">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
		<section id="completed_join_gallery_area">
			<div class="bx_completed_join_gallery">
				<div class="inner">
					<header>
						<h1><img src="/images/galleries/tit_join_completed.gif" alt="" /></h1>
						<div class="img"><img src="/images/galleries/img_join_complete.jpg" alt="" /></div>
						<h2>갤러리즈에 입점을 신청해주셔서 진심으로 감사합니다.</h2>
					</header>
					<p>* 승인 결과는 2-3영업일 이후 입점 신청 페이지에 기재해주신 연락처로 개별 연락드립니다.</p>
					<p>* 아트페어 참가, 연간 기획/초대전 횟수, 소속작가 현황 등 갤러리 업력 및 규모에 따라 갤러리즈 입점 승인이 제한될 수 있습니다.</p>
				</div>
			</div>
		</section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<script>
$(function(){
	LabelHidden(".inp_txt.lh");
	initFileUploads();
});
</script>  
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





