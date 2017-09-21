<? include "../inc/config.php"; ?>
<?php
  $categoriName = "articovery";
  $pageName = "articovery";
  $pageNum = "5";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "b";

  $idx = $_GET["idx"];
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<section id="container_sub" class="articovery_bg">
	<div class="container_inner">

		<section id="articovery_main">
			<h1><img src="/images/articovery/articovery_tit.png"/></h1>
			<h3><img src="/images/articovery/articovery_tit2.png"/></h3>
			<!-- <h3>artist + discovery</h3>
			<p>당신이 직접 쓰는 완전히 새로운 '아티스트 탄생기'</p> -->
		</section>

		<script type="text/javascript">
			$(window).resize(function() {
				var vW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				var vH = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
				var margin = vW > 959 ? 45 : 15;
				$(".articovery_bg").css("height",vH-margin);
			}).resize();
		</script>

	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>
