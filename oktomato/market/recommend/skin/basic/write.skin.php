<?php include_once '../inc/config.php'; ?>
<?php
 $pageName = '작가 관리 / View';
 $pageNum = '1';
 $subNum = '1';
 $thirdNum = '0';
?>
<?php include_once '../inc/link.php'; ?>
<?php include_once '../inc/top.php'; ?>
<?php include_once '../inc/header.php'; ?>
<?php include_once '../inc/side.php'; ?>
 <section id="container">
  <div class="container_inner">
    <?php include_once '../inc/path.php'; ?>
     <article class="content">
<form name="writeFrm" method="post" action="update.php" enctype="multipart/form-data" onsubmit="return false;">
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Artist->attr['recommend_idx'];?>">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="old_img_file" id="old_img_file" value="<?php echo $Artist->attr['img_up_file_name'];?>">
<input type="hidden" name="old_img_ori_file" id="old_img_ori_file" value="<?php echo $Artist->attr['img_ori_file_name'];?>">

      <section class="section_box">
        <h1 class="title1">Registration</h1>
        <div class="lst_table3">
          <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
            <caption>작가 등록</caption>
            <colgroup>
              <col class="th1">
              <col>
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">Slot</th>
                <td><input type="file" name="img_file"></td>
                <td><input type="text" name="referee"></td>
              </tr>
              <tr>
            </tbody>
          </table>
          <div class="bot_align">
            <div class="btn_right">
              <button type="submit" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
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
		location.href="?at=list";
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
				url:"__delete.php",
				dataType:"JSON",
				data:{"idx":idx, "attach":attach},
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
<?php include_once '../inc/bot.php'; ?>