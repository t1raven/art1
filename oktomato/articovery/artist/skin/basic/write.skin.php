<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '4';
$subNum = '2';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
<section id="container">
   <div class="container_inner">
      <?php include '../../inc/path.php';?>
      <?php include '../../inc/datepicker_setting.php';?>
      <article class="content">
      <form name="writeFrm" id="writeFrm" action="?<?php echo PageUtil::_param_get('at=');?>" method="post" onsubmit="return false;">
      <input type="hidden" name="at" value="update">
      <input type="hidden" name="idx" id="idx" value="<?php echo $Artist->attr['artist_idx'];?>">
      <input type="hidden" name="mode" value="<?php echo $mode;?>">
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
                       <th scope="row">아티커버리명 *</th>
                       <td>
                         <select name="covery_idx">
                             <?php foreach($aArticovery as $row):?>
                             <option value="<?php echo $row['covery_idx'];?>"<?php if ($Artist->attr['covery_idx'] == $row['covery_idx']): ?> selected<?php endif; ?>><?php echo $row['covery_name'];?></option>
                             <?php endforeach;?>
                         </select>
                       </td>
                      </tr>
                      <tr>
                         <th scope="row">작가명 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="name" class="pos">홍길동</label>
                            <input name="name" type="text" class="inp_txt lh w110" id="name" value="<?php echo htmlspecialchars(stripslashes($Artist->attr['artist_name']));?>" title="작가명 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">휴대폰 *</th>
                         <td >
                            <input name="mobile" type="text" class="inp_txt w150 only_number" id="mobile" value="<?php echo $Artist->attr['artist_mobile'];?>" maxlength="11" title="휴대폰 번호 입력">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">이메일 *</th>
                         <td >
                            <input name="email" type="text" class="inp_txt w190" id="email" value="<?php echo $Artist->attr['artist_email'];?>" maxlength="60" title="이메일 주소 입력">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">상태 *</th>
                         <td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($Artist->attr['display_state'] === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($Artist->attr['display_state'] === 'N'):?> checked<?php endif;?>></span></div></td>
                      </tr>
                   </tbody>
               </table>
            </div>
            <div class="bot_align">
               <div class="btn_right">
                  <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
                  <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
               </div>
            </div>
         </section>
         </form>
      </article>
   </div>
</section>
<!-- //container -->
<?php echo ACTION_IFRAME;?>
<script>
$(function(){
	LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	checkListMotion();
	//initFileUploads();

	$("#btnList").click(function() {
		location.href="index.php?<?php echo PageUtil::_param_get('at=list&idx='); ?>";
	});
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});
});

function returnToCount(obj, max) {
	var val = obj.value;
	var tmp_chr = null;
	var len = 0;
	var blank_pattern = /^\s+|\s+$/g;

	if (val != "") {
		for (var i = 0; i < val.length; i++) {
			tmp_chr = val.charAt(i);
			if (blank_pattern.test(tmp_chr) == true) {
				len += 1;
			}
			/*
			if (escape(tmp_chr).length > 4) {
				len += 2;
			}
			else {
				len += 1;
			}
			*/
		}
	}
	return len;
}

function chkForm(f) {
	if (f.name.value == "") {
		alert("작가명을 입력하세요.");
		f.name.focus();
		return false;
	}

	/*
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
	*/

	if ($("#mobile").val() == "") {
		alert("휴대폰번호를 숫자로 입력하세요.");
		$("#mobile").focus();
		return false;
	}


	if ($("#email").val() == "") {
		alert("이메일을 입력하세요.");
		return false;
	}
	else {
		if (!chkEmail($("#email").val())) {
			alert("잘못된 이메일 형식입니다.");
			$("#email").focus();
			return false;
		}
	}

	/*
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.submit();
	}
	*/

	f.target = "action_ifrm";
	f.submit();
}

function setParam(txt, num) {
	$("#param-txt").val(txt);
	$("#param-num").val(num);
}
</script>
<?php include '../../inc/bot.php'; ?>