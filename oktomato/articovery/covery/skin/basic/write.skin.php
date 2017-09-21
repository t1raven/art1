<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '4';
$subNum = '1';
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
      <input type="hidden" name="idx" id="idx" value="<?php echo $Covery->attr['covery_idx'];?>">
      <input type="hidden" name="mode" value="<?php echo $mode;?>">
         <section class="section_box">
            <h1 class="title1">Registration</h1>
            <div class="lst_table3">
               <table summary="아티커버리 등록(아티커버리명을 입력하는 표)">
                   <caption>아티커버리 등록</caption>
                   <colgroup>
                      <col class="th1">
                      <col>
                   </colgroup>
                   <tbody>
                      <tr>
                         <th scope="row">아티커버리명*</th>
                         <td >
                            <span class="col_td auto">
                            <label for="covery_name" class="pos">제 1회 아티커버리</label>
                            <input name="covery_name" type="text" class="inp_txt lh w390" id="covery_name" value="<?php echo htmlspecialchars(stripslashes($Covery->attr['covery_name']));?>" title="작가명(Kr) 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">상태</th>
                         <td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($Covery->attr['display_state'] === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($Covery->attr['display_state'] === 'N'):?> checked<?php endif;?>></span></div></td>
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
	checkListMotion();
	$("#btnList").click(function() {
		location.href="index.php?<?php echo PageUtil::_param_get('at=list&idx='); ?>";
	});
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});
});

function chkForm(f) {
	if (f.covery_name.value == "") {
		alert("아티커버리명을 입력하세요.");
		f.covery_name.focus();
		return false;
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
</script>
<?php include '../../inc/bot.php'; ?>