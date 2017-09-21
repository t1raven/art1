<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '4';
$subNum = '4';
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
     <input type="hidden" name="idx" id="idx" value="<?php echo $Point->attr['point_idx'];?>">
     <input type="hidden" name="artist_idx" value="<?php echo $Point->attr['artist_idx'];?>">
     <input type="hidden" name="display_state" value="<?php echo $Point->attr['display_state'];?>">
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
                  <th scope="row">작가 *</th>
                  <td class="layerPopup">
                    <input name="artist_name" type="text" class="inp_txt w190 searchPopup {label:'작가',required:true}" id="artist_name" value="<?php echo $Point->attr['artist_name'];?>" readonly>
                    <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                  </td>
                </tr>
                <tr>
                   <th scope="row">상태 *</th>
                   <td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($Point->attr['display_state'] === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($Point->attr['display_state'] === 'N'):?> checked<?php endif;?>></span></div></td>
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
<!-- //container -->
<?php include('../../../lib/include/articovery/artist.inc.php');?>
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
    btnHover(".btnOvr");
});

function deleteListImg() {
    $("#btn_regist").css("display","block");
    $("#btn_delete").css("display","none");
    $("#works_img").val("");
    $("#worksImg").attr("src","");
}

function searchArtist() {
    $.ajax({
        type:"POST",
        url:"artist.php",
        dataType:"html",
        data:{"artist":$("#artist").val()},
        success: function(data){
            $("#div-artist >ul").html(data);
        },
        error: function(xhr, status, error) {
            alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
        }
    });
}

function setArtistInsert(idx, artist) {
    document.writeFrm.artist_idx.value = idx;
    document.writeFrm.artist_name.value = artist;
    $(".layer_popup1").css("display","none");
}

function createArtist() {
    //location.replace('../artist/index.php?at=write');
    location.replace('../artist/index.php?<?php echo PageUtil::_param_get('at=write&idx='); ?>');
}

function chkForm(f) {
	if ($("#works_img").val() == ""){
		alert("이미지를 입력하세요");
		return;
	}else{

		if (chkDefaultForm(f)) {
			f.target = "action_ifrm";
			f.action = "index.php?<?php echo PageUtil::_param_get('at=list'); ?>";
			f.submit();
		}
		/*
		f.target = "action_ifrm";
		f.action = "index.php";
		f.submit();
		*/
	}
}
</script>
<?php
include '../../inc/bot.php';
