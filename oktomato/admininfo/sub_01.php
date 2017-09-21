<?php
 $pageName = "";
 $pageNum = "7";
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
		<h1 class="title1">Basic Info.</h1>
		<div class="lst_table3">
			<table summary="Basic Info">
			  <caption>Basic Info.</caption>
			  <colgroup>
				<col class="th1">
				<col>
			  </colgroup>
			  <tbody>
				<tr>
				  <th scope="row">사이트명</th>
				  <td>
					<input name="" type="text" class="inp_txt w250" id="" value="" >
				  </td>
				</tr>
				<tr>
				  <th scope="row">도메인주소</th>
				  <td>
					<input name="" type="text" class="inp_txt w250" id="" value="" >
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
	  </section><!--// section_box -->
	  <section class="section_box">
		<h1 class="title1">Admin Info.</h1>
		<div class="lst_table3">
			<table summary="Admin Info.">
			  <caption>Admin Info.</caption>
			  <colgroup>
				<col class="th1">
				<col>
			  </colgroup>
			  <tbody>
				<tr>
				  <th scope="row">관리자 이메일</th>
				  <td>
					<input name="" type="text" class="inp_txt w250" id="" value="" >
				  </td>
				</tr>
				<tr>
				  <th scope="row">비밀번호</th>
				  <td>
					<input name="" type="password" class="inp_txt w250" id="" value="" >
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
	  </section><!--// section_box -->
	  <section class="section_box">
		<h1 class="title1">상담글 노티스 수신자 정보</h1>
		<div class="lst_table3">
			<table summary="상담글 노티스 수신자 정보">
			  <caption>상담글 노티스 수신자 정보</caption>
			  <colgroup>
				<col class="th1">
				<col>
			  </colgroup>
			  <tbody>
				<tr>
				  <th scope="row" rowspan="2">수신이메일</th>
				  <td>
					<div class="lst_check radio">
						<input name="" type="text" class="inp_txt w250" id="" value="" >
						<span>
						<label for="frame1">OFF</label>
						<input type="radio" name="frame" id="frame1" >
						</span>
					 </div>
				  </td>
				</tr>
				<tr>
				  <td>
					<div class="lst_check radio">
						<input name="" type="text" class="inp_txt w250" id="" value="" >
						<span>
						<label for="frame1">ON</label>
						<input type="radio" name="frame" id="frame1" checked>
						</span>
					 </div>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
	  </section><!--// section_box -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<script>
   $(function(){
    //레이어 팝업
   
     // and / or 스위치 함수
   
     
   
   
      bbsCheckbox();
   
      checkListMotion();
   
       initFileUploads();
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>