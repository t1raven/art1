<?php
   $pageName = "List";
   $pageNum = "4";
   $subNum = "1";
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
			<h1 class="title1">SNS info.</h1>
			<div class="lst_table3">
				<table summary="SNS info">
				  <caption>SNS info</caption>
				  <colgroup>
					<col class="th1">
					<col>
				  </colgroup>
				  <tbody>
					<tr>
					  <th scope="row">Facebook</th>
					  <td>
						<input name="" type="text" class="inp_txt w190" id="" value="" >
					  </td>
					</tr>
					<tr>
					  <th scope="row">Pinterest</th>
					  <td>
						<input name="" type="text" class="inp_txt w190" id="" value="" >
					  </td>
					</tr>
					<tr>
					  <th scope="row">Instagram</th>
					  <td>
						<input name="" type="text" class="inp_txt w190" id="" value="" >
					  </td>
					</tr>
					<tr>
					  <th scope="row">Pictify</th>
					  <td>
						<input name="" type="text" class="inp_txt w190" id="" value="" >
					  </td>
					</tr>
					
				  </tbody>
				</table>
			  </div><!-- //lst_table3 -->
			<div class="bot_align">
              <div class="btn_right">
              <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
            </div>
          </div>
		  </section><!--// section_box -->
	</article>
   </div>
</section>
	  <? include "../inc/bot.php"; ?>