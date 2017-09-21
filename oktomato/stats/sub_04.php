<?php
 $pageName = "접속통계";
 $pageNum = "9";
 $subNum = "4";
 $thirdNum = "0";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<? include "../inc/side.php"; ?>
 <section id="container">
  <div class="container_inner">
    <? include "../inc/path.php"; ?>
    <? include "../inc/datepicker_setting.php"; ?>
     <article class="content">
      <section class="section_box">
		<h1 class="title1">OS별 접속자</h1>
		<section class="graphArea">
			<!--그래프 영역입니다-->
			</section>
      </section>
	   <section class="section_box">
		<h1 class="title1">브라우저별 접속자</h1>
		<section class="graphArea">
			<!--그래프 영역입니다-->
			</section>
      </section>
	  <section class="section_box">
		<h1 class="title1">해상도별 접속자</h1>
		<section class="graphArea">
			<!--그래프 영역입니다-->
			</section>
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>