<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '3';
$subNum = '1';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
 <section id="container">
  <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
     <article class="content">
      <form name="writeFrm" method="post" enctype="multipart/form-data" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="idx" id="idx" value="<?php echo $Artist->attr['artist_idx'];?>">
      <input type="hidden" name="mode" value="<?php echo $mode;?>">
      <input type="hidden" name="old_photo_file" id="old_photo_file" value="<?php echo $Artist->attr['photo_up_file_name'];?>">
      <input type="hidden" name="old_photo_ori_file" id="old_photo_ori_file" value="<?php echo $Artist->attr['photo_ori_file_name'];?>">
      <input type="hidden" name="old_cv_file" id="old_cv_file" value="<?php echo $Artist->attr['cv_up_file_name'];?>">
      <input type="hidden" name="old_cv_ori_file" id="old_cv_ori_file" value="<?php echo $Artist->attr['cv_ori_file_name'];?>">
      <section class="section_box">
        <h1 class="title1">Registration</h1>
        <div class="lst_table3">
          <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
            <caption>작가 등록</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">작가명 (kr) *</th>
                <td >
                  <span class="col_td auto">
                    <label for="name" class="pos">홍길동</label>
                    <input name="name" type="text" class="inp_txt lh w110 {label:'작가명',required:true}" id="name" value="<?php echo $Artist->attr['artist_name'];?>" title="작가명(Kr) 입력">
                  </span>
                </td>
              </tr>
               <tr>
                <th scope="row">작가명 (En) *</th>
                <td >
                    <span class="col_td auto">
                      <label for="first_name" class="pos">First Name</label>
                      <input name="first_name" type="text" class="inp_txt lh w60 {label:'First Name',required:true}" id="first_name" value="<?php echo $aArtistEnName[0];?>" title="First Name 입력">
                    </span>
                    <span class="col_td auto">
                      <label for="last_name" class="pos">Last Name</label>
                      <input name="last_name" type="text" class="inp_txt lh w60 {label:'Last Name',required:true}" id="last_name" value="<?php echo $aArtistEnName[1];?>" title="Last Name 입력">
                    </span>
                </td>
              </tr>
              <tr>
                <th scope="row">사진등록 *</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"><?php if(!empty($Artist->attr['photo_up_file_name'])):?><img src="<?php echo artistUploadPath.$Artist->attr['photo_up_file_name'];?>" width="110" height="150"><?php endif;?></div>
                    <div class="cont clearfix">
                      <div class="fileinputs" >
                        <input type="file" class="file" name="photo_file">
                      </div>
                    <?php if(!empty($Artist->attr['photo_up_file_name'])):?>
                      <div class="lst_Upload">
                        <span class="tag" id="span-photo"><?php echo $Artist->attr['photo_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $artist_idx;?>', 'photo');">삭제</button></span>
                      </div>
                    <?php endif;?>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">CV *</th>
                <td >
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <input type="file" class="file" name="cv_file">
                    </div>
                    <?php if(!empty($Artist->attr['cv_up_file_name'])):?>
                    <div class="lst_Upload">
                        <span class="tag" id="span-cv"><?php echo $Artist->attr['cv_ori_file_name'];?> <button onclick="deleteAttach('<?php echo $artist_idx;?>', 'cv');">삭제</button></span>
                    </div>
                    <?php endif;?>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">출생년 *</th>
                <td >
                  <select name="birth_year" id="birth_year">
                  <?php for($i=1914; $i<$yyyy; $i++){?>
                    <option value="<?php echo $i;?>"<?php if ($Artist->attr['birth_year'] === (string)$i):?> selected<?php endif;?>><?php echo $i;?></option>
                  <?php }?>
                  </select>
                  <!--input name="" type="text" class="inp_txt w390" id="" value="" title="출생년 입력"-->
                </td>
              </tr>
            <?php for($i=0; $i<2; $i++){?>
              <tr>
                <th scope="row">학력 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                <td >
                  <select name="education_year[]">
                  <?php for($j=1914; $j<$yyyy; $j++){$p=$i+1;?>
                    <option value="<?php echo $j;?>"<?php if ($aEducationYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                  <?php }?>
                  </select>
                  <input name="education_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aEducationName[$i];?>" title="학력 <?php echo $p.numberOrdering($p);?> 입력">
                </td>
              </tr>
            <?php }?>

            <?php for($i=0; $i<3; $i++){$p=$i+1;?>
              <tr>
                <th scope="row">수상 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                <td >
                  <select name="award_year[]">
                  <?php for($j=1914; $j<$yyyy; $j++){?>
                    <option value="<?php echo $j;?>"<?php if ($aAwardYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                  <?php }?>
                  </select>
                  <input name="award_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aAwardName[$i];?>" title="수상 <?php echo $p.numberOrdering($p);?> 입력">
                </td>
              </tr>
            <?php }?>

            <?php for($i=0; $i<5; $i++){$p=$i+1;?>
                <th scope="row">개인전 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                <td >
                  <select name="private_year[]">
                  <?php for($j=1914; $j<$yyyy; $j++){?>
                    <option value="<?php echo $j;?>"<?php if ($aPrivateYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                  <?php }?>
                  </select>
                  <input name="private_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aPrivateName[$i];?>" title="개인전 <?php echo $p.numberOrdering($p);?> 입력">
                </td>
              </tr>
            <?php }?>

            <?php for($i=0; $i<5; $i++){$p=$i+1;?>
                <th scope="row">단체전 <?php echo $i+1;?><sup><?php echo numberOrdering($i+1);?></sup></th>
                <td >
                  <select name="team_year[]">
                  <?php for($j=1914; $j<$yyyy; $j++){?>
                    <option value="<?php echo $j;?>"<?php if ($aTeamYear[$i] === (string)$j):?> selected<?php endif;?>><?php echo $j;?></option>
                  <?php }?>
                  </select>
                  <input name="team_name[]" type="text" class="inp_txt w390" id="" value="<?php echo $aTeamName[$i];?>" title="단체전 <?php echo $p.numberOrdering($p);?> 입력">
                </td>
              </tr>
            <?php }?>

            </tbody>
          </table>
          <div class="bot_align">
            <div class="btn_right">
              <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
              <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
            </div>
        </div>
        </div><!-- //lst_table3 -->

      </section>
     </form>
      <!-- //lst_table2 -->
     </article>
  </div>
 </section>
 <!-- //container -->
 <?php echo ACTION_IFRAME;?>
<script>
$(function(){
	LabelHidden(".inp_txt.lh");
	checkListMotion();
	initFileUploads();

	$("#btnList").click(function() {
		location.href="index.php";
	});
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});
})

function chkForm(f) {
	if (f.name.value == "") {
		alert("작가명을 입력하세요.");
		f.name.focus();
		return false;
	}

	if (f.first_name.value == "") {
		alert("First Name 을 입력하세요.");
		f.first_name.focus();
		return false;
	}

	if (f.first_name.value == "") {
		alert("Last Name 을 입력하세요.");
		f.last_name.focus();
		return false;
	}

	if (f.old_photo_file.value == "" && f.photo_file.value == "") {
		alert("사진을 등록하세요.");
		return false;
	}
	if (f.old_cv_file.value == "" && f.cv_file.value == "") {
		alert("CV 등록하세요.");
		return false;
	}

	/*
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
	*/


	f.submit();
}

function deleteAttach(idx, attach) {
	if (idx == "") {
		alert("삭제할 수 없습니다.");
	}
	else {
			if (confirm("삭제하면 물리적 파일과 DB에서 삭제됩니다.\r\n정말 삭제하겠습니까?")) {
			$.ajax({
				type:"POST",
				url:"index.php",
				dataType:"JSON",
				data:{"idx":idx, "attach":attach, "at":"delete"},
				success: function(data) {
					if (data.cnt > 0) {
						if (attach == 'photo'){
							$(".photoUpload > .photo > img").remove();
						}
						$("#span-"+attach).remove();
						$("#old_"+attach+"_file").val("");
						$("#old_"+attach+"_ori_file").val("");
						alert("삭제되었습니다.");
					}
					else{
						alert("삭제할 수 없습니다.");
					}
				},
				error: function(xhr, status, error) {
					alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
				}
			});
		}
	}
}
</script>
<?php require '../../inc/bot.php'; ?>