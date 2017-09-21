<?php
 $pageName = "";
 $pageNum = "7";
 $subNum = "1";
 $thirdNum = "0";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/side.php"; ?>
 <section id="container">
  <div class="container_inner">
    <? include "../../inc/path.php"; ?>
    <? include "../../inc/datepicker_setting.php"; ?>

<form name="fomInfo" method="POST" action="?at=update" onsubmit="return false;" >
<input type="hidden" name="member_idx" value="<?php echo $admininfo_idx; ?>">
<input type="hidden" name="user_idx" value="<?php echo $user_idx; ?>">

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
					<input name="sitename" type="text" class="inp_txt w250" id="" value="<?php echo $Admininfo->attr['site_name'];?>" >
				  </td>
				</tr>
				<tr>
				  <th scope="row">도메인주소</th>
				  <td>
					<input name="siteurl" type="text" class="inp_txt w250" id="" value="<?php echo $Admininfo->attr['site_url'];?>" >
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
					<input name="a_email" type="text" class="inp_txt w250" id="" value="<?php echo $Member->attr['user_id'];?>" >
				  </td>
				</tr>
				<tr>
				  <th scope="row">비밀번호</th>
				  <td>
					<input name="a_pw" type="password" class="inp_txt w250" id="" value="" >
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
						<input name="receive_email1" type="text" class="inp_txt w250" id="" value="<?php echo $Admininfo->attr['receive_email1'];?>" >
						<span>
						<label for="frame1-1">ON</label>
						<input type="radio" name="receive_email1_state" id="frame1-1"  value="Y" <?php echo ($Admininfo->attr['receive_email1_state']=='Y')? 'checked':'' ;?>>
						</span>
						<span>
						<label for="frame1-2">OFF</label>
						<input type="radio" name="receive_email1_state" id="frame1-2"  value="N" <?php echo ($Admininfo->attr['receive_email1_state']!='Y')? 'checked':'' ;?>>
						</span>
					 </div>
				  </td>
				</tr>
				<tr>
				  <td>
					<div class="lst_check radio">
						<input name="receive_email2" type="text" class="inp_txt w250" id="" value="<?php echo $Admininfo->attr['receive_email2'];?>" >
						<span>
						<label for="frame2-1">ON</label>
						<input type="radio" name="receive_email2_state" id="frame2-1" value="Y" <?php echo ($Admininfo->attr['receive_email2_state']=='Y')? 'checked':'' ;?>>
						</span>
						<span>
						<label for="frame2-2">OFF</label>
						<input type="radio" name="receive_email2_state" id="frame2-2"  value="N" <?php echo ($Admininfo->attr['receive_email2_state']!='Y')? 'checked':'' ;?>>
						</span>
					 </div>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>

			 <div class="bot_align">
              <div class="btn_right">
                <button type="button" id="btnSave" class="btn_pack1 ov-b small rato">Save</button>
              </div>
            </div>


	  </section><!--// section_box -->
     </article>

			</form>

  </div> <!-- //container_inner -->
 </section> <!-- //container -->

 <script>
	function chkForm(f){
		if(chkDefaultForm(f) ){
			alert(chkDefaultForm(f));
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		//chkForm(document.fomnews);
		//f.target = "action_ifrm";
		document.fomInfo.submit();
	});
</script>

<script>
   $(function(){
    //레이어 팝업
   
     // and / or 스위치 함수
   
     
   
   
      bbsCheckbox();
   
      checkListMotion();
   
       initFileUploads();
   
   
   
    })
   
</script>
<? include "../../inc/bot.php"; ?>