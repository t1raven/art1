<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '4';
$subNum = '5';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
<section id="container">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../../inc/datepicker_setting.php'; ?>
		<article class="content">
			<form name="writeFrm" method="post" onsubmit="return false;">
				<input type="hidden" name="at" value="update">
				<input type="hidden" name="idx" id="idx" value="<?php echo $Comment->attr['score_idx'];?>">
				<input type="hidden" name="display_state" value="<?php echo $Comment->attr['display_state'];?>">

				<section class="section_box">
					<h1 class="title1">Main Info.</h1>
					<div class="lst_table3">
						<table summary="Main Info.">
							<caption>Main Info.</caption>
							<colgroup>
								<col class="th1">
								<col>
							</colgroup>
							<tbody>
								<tr>
									<th scope="row">아티커버리명</th>
									<td><?php echo $Comment->attr['covery_name']; ?></td>
								</tr>
								<tr>
									<th scope="row">구분</th>
									<td><?php if ($Comment->attr['is_expert'] == 'Y') : ?>패널<?php else : ?>일반<?php endif ; ?></td>
								</tr>
								<tr>
									<th scope="row">아이디</th>
									<td><?php echo $Comment->attr['user_id']; ?></td>
								</tr>
								<tr>
									<th scope="row">작가명</th>
									<td><?php echo $Comment->attr['artist_name']; ?></td>
								</tr>
								<tr>
									<th scope="row">기술성</th>
									<td><?php echo $Comment->attr['technique_score']; ?></td>
								</tr>
								<tr>
									<th scope="row">예술성</th>
									<td><?php echo $Comment->attr['artistic_score']; ?></td>
								</tr>
								<tr>
									<th scope="row">창의성</th>
									<td><?php echo $Comment->attr['creativity_score']; ?></td>
								</tr>
								<tr>
									<th scope="row">가능성</th>
									<td><?php echo $Comment->attr['potential_score']; ?></td>
								</tr>
								<tr>
									<th scope="row">평균</th>
									<td><?php echo $Comment->attr['final_score']; ?></td>
								</tr>
								<tr>
									<th scope="row">IP</th>
									<td><?php echo long2ip($Comment->attr['ip_addr']); ?></td>
								</tr>
								<tr>
									<th scope="row">등록일</th>
									<td><?php echo str_replace('-', '.', $Comment->attr['create_date']); ?></td>
								</tr>
								<tr>
									<th scope="row">의견 *</th>
									<td>
										<div class="textarea">
											<textarea name="opinion" id="opinion" class="inp_txt lh {label:'의견',required:true}" maxlength="500"><?php echo $Comment->attr['opinion']; ?></textarea>
										</div>
									</td>
								</tr>
								<tr>
									<th scope="row">상태 *</th>
									<td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($Comment->attr['display_state'] === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($Comment->attr['display_state'] === 'N'):?> checked<?php endif;?>></span></div></td>
								</tr>
							</tbody>
						</table>
						<div class="bot_align">
							<div class="btn_right">
								<button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
								<button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
							</div>
						</div>
					</div><!-- //lst_table3 -->
				</section><!--// section_box -->
			</form>
		 </article>
	</div>
 </section>

<?php echo ACTION_IFRAME;?>

 <script>
$(function(){
    //레이어 팝업
    $(".layerOpen").click(function(){
        $(".layer_popup1").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left;
        var y = $(this).offset().top-10;
        layerBoxOffset(id,x,y);
        return false;
    });

    $("#btnList").click(function(){
        //location.href="index.php";
        location.href="index.php?<?php echo PageUtil::_param_get('at=list&idx='); ?>";
    });
    $("#btnSave").click(function(){
        chkForm(document.writeFrm);
    });

    LabelHidden(".inp_txt.lh");
    bbsCheckbox();
    checkListMotion();
    //initFileUploads();
    btnHover(".btnOvr");
});

function chkForm(f) {
	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.action = "index.php?<?php echo PageUtil::_param_get('at=list'); ?>";
		f.submit();
	}
}
</script>
<?php
include '../../inc/bot.php';
