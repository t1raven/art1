<?php
 $pageName = "접속통계";
 $pageNum = "9";
 $subNum = "5";
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
		<h1 class="title1">매출 통계</h1>
			<div class="t-c">
				<select name="make_year">
					<option value="">2015</option>
				</select>
				<select name="make_month">
					<option value="">3</option>
				</select>
				 <button type="button" class="btn_pack1 ov-b small" id="">검색</button>
			</div>
			<section class="graphArea">
			<!--그래프 영역입니다-->
			</section>
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>