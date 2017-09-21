<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '4';
$subNum = '3';
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
     <input type="hidden" name="idx" id="idx" value="<?php echo $Work->attr['works_idx'];?>">
     <input type="hidden" name="artist_idx" value="<?php echo $Work->attr['artist_idx'];?>">
     <input type="hidden" name="display_state" value="<?php echo $Work->attr['display_state'];?>">
     <input type="hidden" name="works_img" id="works_img" value="<?php echo $Work->attr['works_img'];?>">
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
                    <input name="artist_name" type="text" class="inp_txt w190 searchPopup {label:'작가',required:true}" id="artist_name" value="<?php echo $Work->attr['artist_name'];?>"  readonly>
                    <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">작품명 *</th>
                  <td>
                    <input name="works_name" type="text" class="inp_txt w390 {label:'작품명',required:true}" id="works_name" value="<?php echo $Work->attr['works_name'];?>" title="작품명 입력">
                  </td>
                </tr>
                <tr>
                  <th scope="row">제작년도 *</th>
                  <td>
                    <select name="make_year">
                        <?php for($i=$bYear; $i>=$eYear; $i--):?>
                        <option value="<?php echo $i;?>"<?php if ($Work->attr['works_make_year'] === (string)$i):?> selected<?php endif;?>><?php echo $i;?></option>
                        <?php endfor;?>
                        <option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th scope="row">제작방식 *</th>
                  <td>
                    <span class="col_td auto">
                      <label for="make_type" class="pos">Oil on canvas</label>
                      <input name="make_type" type="text" class="inp_txt lh w390 {label:'제작방식',required:true}" id="make_type" value="<?php echo $Work->attr['works_make_type'];?>">
                    </span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">사이즈 </th>
                  <td>
                    <span class="col_td auto">
                      <label for="depth_size" class="pos">세로</label>
                      <input name="depth_size" type="text" class="inp_txt lh w110 only_number_dot {label:'세로 사이즈',required:false}" id="depth_size" value="<?php echo $Work->attr['works_depth'];?>">
                    </span>
                    X
                    <span class="col_td auto">
                      <label for="width_size" class="pos">가로</label>
                      <input name="width_size" type="text" class="inp_txt lh w110 only_number_dot {label:'가로 사이즈',required:false}" id="width_size" value="<?php echo $Work->attr['works_width'];?>">
                    </span>
                    X
                    <span class="col_td auto">
                      <label for="height_size" class="pos">높이</label>
                      <input name="height_size" type="text" class="inp_txt lh w110 only_number_dot {label:'높이',required:false}" id="height_size" value="<?php echo $Work->attr['works_height'];?>">
                    </span>
                    <span class="ml15">cf. 센티미티 단위 입력(소수점 한자리 허용) </span>
                  </td>
                </tr>
                <tr>
                   <th scope="row">상태 *</th>
                   <td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($Work->attr['display_state'] === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($Work->attr['display_state'] === 'N'):?> checked<?php endif;?>></span></div></td>
                </tr>
              </tbody>
            </table>
          </div><!-- //lst_table3 -->
      </section><!--// section_box -->

      <section class="section_box">
        <h1 class="title1">Pics</h1>
        <div class="lst_table3">
          <table summary="Search Option ImageUpload">
            <caption>Search Option ImageUpload</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">주의</th>
                <td>dpi는 72dpi. 가로사이즈 min 1300 ~ max 1920px 까지 가능. Jpg만 허용. 파일 크기는 1MB 제한.</td>
              </tr>
             <tr>
                <th scope="row">Image *</th>
                <td>
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <span style="background:#ddd; display:inline-block;"><img id="worksImg" src="<?php if (!empty($Work->attr['works_img'])): echo articoverySmallImgUploadPath, $Work->attr['works_img']; endif;?>" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                      <button type="button" id="btn_regist"  class="btn_regist">이미지 등록</button>
                      <button type="button" id="btn_delete" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                      <div id="upload_status" style="display:none;">
                        <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                      </div>
                    </div>
                  </div>
                </td>
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

<script type="text/javascript" src="../../../js/ajaxupload.js"></script>
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

    var button = $("#btn_regist"), interval;
    new AjaxUpload(button,{
        action: 'upload.php?<?php echo PageUtil::_param_get('');?>',
        name: 'multi_file',
        onSubmit : function(file, ext){
            this.disable();
            $("#upload_status").css("display", "block");
        },
        onComplete: function(file, response){
            $("#upload_status").css("display", "none");
            var result = $.trim(response).split("|");
            var status = result[0];
            if (status == "__complete"){
                var filename = result[1];
                $("#btn_regist").css("display","none");
                $("#btn_delete").css("display","inline");
                $("#works_img").val(filename);
                $("#worksImg").attr("src","/upload/articovery/small/" + filename);
            }
            else if (status == "__large"){
                alert("1Mbyte 이하인 이미지를 선택하세요.");
            }
            else{
                alert("[jpg]파일을 선택하세요.");
            }
            this.enable();
        }
    });

    LabelHidden(".inp_txt.lh");
    bbsCheckbox();
    checkListMotion();
    initFileUploads();
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
<?php include '../../inc/bot.php';?>