<?php
$pageName = 'List';
$pageNum = '3';
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
     <article class="content">
       <form name="writeFrm" onsubmit="return false;">
       <input type="hidden" name="at" value="update">
       <input type="hidden" name="idx" id="idx" value="<?php echo $Event->attr['evt_idx'];?>">
       <input type="hidden" name="main_img" id="main_img">
       <input type="hidden" name="main_img_old" id="main_img_old" value="<?php echo $Event->attr['evt_main_img'];?>">
       <input type="hidden" name="main_img_m" id="main_img_m">
       <input type="hidden" name="main_img_m_old" id="main_img_m_old" value="<?php echo $Event->attr['evt_main_img_m'];?>">
        <section class="section_box">
        <h1 class="title1">Curation</h1>
        <div class="lst_table3">
          <table summary="Curation">
            <caption>Curation</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
               <tr>
                <th scope="row">기획전 제목</th>
                <td><input name="title" type="text" class="inp_txt w390 {label:'기획전 제목',required:true}" id="" value="<?php echo $Event->attr['evt_title'];?>"></td>
              </tr>
              <tr>
                <th scope="row">카피라이트</th>
                <td><input name="copyright" type="text" class="inp_txt w390 {label:'카피라이트',required:true}" id="" value="<?php echo $Event->attr['evt_copyright'];?>"></td>
              </tr>
             <tr>
                <th scope="row">배너(PC) 1180 * 520</th>
                <td>
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <span style="background:#ddd; display:inline-block;"><img id="banner" src="<?php if (!empty($Event->attr['evt_main_img'])) {echo eventUploadPath, $Event->attr['evt_main_img'];}?>" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                      <button type="button" id="btn_regist"  class="btn_regist"<?php if (!empty($Event->attr['evt_main_img'])):?> style="display:none"<?php endif;?>>이미지 등록</button>
                      <button type="button" id="btn_delete" class="btn_delete" onclick="deleteListImg();"<?php if (!empty($Event->attr['evt_main_img'])):?> style="display:block;"<?php endif;?>>이미지 삭제</button>
                      <div id="upload_status" style="display:none;">
                        <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
			  <?php //모바일 이미지 //2016-06-03 LYT?>
			  <tr>
                <th scope="row">배너(Mobile) 585 * 260</th>
                <td>
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <span style="background:#ddd; display:inline-block;"><img id="banner_m" src="<?php if (!empty($Event->attr['evt_main_img_m'])) {echo eventUploadPath, $Event->attr['evt_main_img_m'];}?>" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                      <button type="button" id="btn_regist_m"  class="btn_regist"<?php if (!empty($Event->attr['evt_main_img_m'])):?> style="display:none"<?php endif;?>>이미지 등록</button>
                      <button type="button" id="btn_delete_m" class="btn_delete" onclick="deleteListImgMobile();"<?php if (!empty($Event->attr['evt_main_img_m'])):?> style="display:block;"<?php endif;?>>이미지 삭제</button>
                      <div id="upload_status_m" style="display:none;">
                        <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                 <th scope="row">상태</th>
                 <td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="display_state" id="exp_y" value="Y"<?php if($displayState === 'Y'):?> checked<?php endif;?>></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="display_state" id="exp_n" value="N"<?php if($displayState === 'N'):?> checked<?php endif;?>></span></div></td>
              </tr>
            </tbody>
          </table>
        </div><!-- //lst_table3 -->
      </section><!--// section_box -->
      <?php for($i=0; $i<5; $i++):?>
      <section class="section_box">
          <h1 class="title1">Pragraph <?php echo $ii;?></h1>
          <div class="lst_table3">
              <table summary="Pragraph  <?php echo $ii;?>">
                  <caption>Pragraph  <?php echo $ii;?></caption>
                  <colgroup>
                    <col class="th1">
                    <col>
                  </colgroup>
                  <tbody>
                    <tr>
                      <th scope="row" >서브타이틀</th>
                     <td><input name="sub_title[]" type="text" class="inp_txt w190" id="" value="<?php echo $aParaSubTitle[$i];?>"> </td>
                    </tr>
                    <?php for($j=0; $j<20; $j++):?>
                    <tr>
                      <th scope="row" >작품<?php echo $jj?></th>
                     <td class="layerPopup">
                        <input name="artwork_txt[]" type="text" class="inp_txt w190 searchPopup" id="artwork_txt_<?php echo $p;?>" value="<?php echo $aParaArtWorkTxt[$p];?>" readonly>
                        <input name="artwork[]" type="hidden" class="inp_txt w190 searchPopup" id="artwork_<?php echo $p;?>" value="<?php echo $aParaArtWork[$p];?>">
                        <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('artwork', '<?php echo $p;?>')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                        <a href="javascript:void(0);" class="" onclick="setArtWorkDelete('artwork', '<?php echo $p;?>');"><!--img src="<?php echo $currentFolder;?>/images/btn/btn_delete_off.jpg" class="btnOvr" alt="삭제"-->삭제</a>
                    </td>
                    </tr>
                    <?php ++$jj;  ++$p; endfor;?>

                  </tbody>
                </table>
              </div><!-- //lst_table3 -->
              <?php if ($i === 4):?>
              <div class="bot_align">
                <div class="btn_right">
                   <button type="button" id="btnList" class="btn_pack1 ov-b small rato">List</button>
                   <button type="button" id="btnSave" class="btn_pack1 ov-b small rato">Save</button>
                 </div>
              </div>
              <?php endif;?>
      </section><!--// section_box -->
      <?php ++$ii; $jj = 1; endfor;?>
      </form>
     </article>
   </div>
 </section>

<!--
<section id="mainInfoPopup" class="layer_popup1">
	<header class="searchBox">
	<input name="artwork" type="text" class="inp_txt w190 searchPopup" id="artwork">
	<button class="searchPopup" type="button" onclick="searchArtWork();"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" alt="검색"></button>
	<button class="close"><img src="<?php echo $currentFolder;?>/images/btn/btn_close.gif" alt="닫기"></button>
	</header>
	<article class="cont">
	<h1>검색결과</h1>
	<div class="scrollBox1" id="div-artwork">
	  <ul>
	  </ul>
	</div>
	<p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u" onclick="createArtWork();" style="cursor:pointer;">작품등록</span>을 진행해 주십시오.</p>
	</article>
</section>
-->
<?php include('../../../lib/include/goods/artwork.inc.php');?>
<?php echo ACTION_IFRAME;?>
<input type="text" name="param-txt" id="param-txt">
<input type="text" name="param-num" id="param-num">
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

	$("#btnSave").click(function(){
		 chkForm(document.writeFrm);
	});
	$("#btnList").click(function(){
		 location.href="index.php";
	});


	//LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	checkListMotion();
	//initFileUploads();
	btnHover(".btnOvr");

	var button = $("#btn_regist"), interval;
	var buttonM = $("#btn_regist_m"), interval; //모바일

	new AjaxUpload(button,{
		action: 'upload.php',
		name: 'single_file',
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
				$("#main_img").val(filename);
				$("#banner").attr("src","/upload/temp/" + filename);
			}
			else if (status == "__large"){
				alert("1Mbyte 이하인 이미지를 선택하세요.");
			}
			else{
				alert("[jpg|gif|png]파일을 선택하세요.");
			}
			this.enable();
		}
	});

	//모바일 이미지 등록 //2016-06-03 LYT
	new AjaxUpload(buttonM,{
		action: 'upload.php',
		name: 'single_file',
		onSubmit : function(file, ext){
			this.disable();
			$("#upload_status_m").css("display", "block");
		},
		onComplete: function(file, response){
			$("#upload_status_m").css("display", "none");
			var result = $.trim(response).split("|");
			var status = result[0];

			if (status == "__complete"){
				
				var filename = result[1];
				$("#btn_regist_m").css("display","none");
				$("#btn_delete_m").css("display","inline");
				$("#main_img_m").val(filename);
				$("#banner_m").attr("src","/upload/temp/" + filename);
			}
			else if (status == "__large"){
				alert("1Mbyte 이하인 이미지를 선택하세요.");
			}
			else{
				alert("[jpg|gif|png]파일을 선택하세요.");
			}
			this.enable();
		}
	});

});

function chkForm(f){
	if(chkDefaultForm(f)){
		f.method = "post";
		f.action = "index.php";
		f.target = "action_ifrm";
		f.submit();
	}
}

function deleteListImg() {
	var attach, msg;

	if ($("#main_img_old").val() != "") {
		attach = $("#main_img_old").val();
		msg = "삭제하면 물리적 파일과 DB에서 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}
	else {
		attach = $("#main_img").val();
		msg = "삭제하면 물리적 파일이 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}

	if (confirm(msg)) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"idx":$("#idx").val(), "attach": attach, "at":"delete"},
			success: function(data) {
				if (data.cnt > 0) {
					$("#btn_regist").css("display","block");
					$("#btn_delete").css("display","none");
					$("#main_img").val("");
					$("#main_img_old").val("");
					$("#banner").attr("src","");
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


//모바일 이미지 삭제 //2016-06-03 LYT
function deleteListImgMobile() {
	var attach, msg;

	if ($("#main_img_m_old").val() != "") {
		attach = $("#main_img_m_old").val();
		msg = "삭제하면 물리적 파일과 DB에서 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}
	else {
		attach = $("#main_img_m").val();
		msg = "삭제하면 물리적 파일이 삭제됩니다.\r\n정말 삭제하겠습니까?";
	}

	if (confirm(msg)) {
		$.ajax({
			type:"POST",
			url:"index.php",
			dataType:"JSON",
			data:{"idx":$("#idx").val(), "attach": attach, "at":"delete" , "type":"m"},
			success: function(data) {
				if (data.cnt > 0) {
					$("#btn_regist_m").css("display","block");
					$("#btn_delete_m").css("display","none");
					$("#main_img_m").val("");
					$("#main_img_m_old").val("");
					$("#banner_m").attr("src","");
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


function createArtWork() {
	location.replace('../work/index.php?at=write');
}

function searchArtWork() {
	$.ajax({
		type:"POST",
		url:"/oktomato/market/marketmain/artwork.php",
		dataType:"html",
		data:{"artwork":$("#artwork").val(), txt:$("#param-txt").val(), num:$("#param-num").val()},
		success: function(data){
			$("#div-artwork >ul").html(data);
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function setArtWorkInsert(idx, name, artist, txt, num) {
	$("#"+txt+"_txt_"+num).val(name+'('+artist+')');
	$("#"+txt+"_"+num).val(idx);
	$("#artwork").val("");
	$("#div-artwork >ul").html("");
	$(".layer_popup1").css("display","none");
	setParam('', '');
}

function setParam(txt, num) {
	$("#param-txt").val(txt);
	$("#param-num").val(num);
}

function setArtWorkDelete(txt, num) {
	if (confirm("정말 삭제하시겠습니까?")) {
		$("#"+txt+"_txt_"+num).val("");
		$("#"+txt+"_"+num).val("");
	}
}
</script>
<?php include '../../inc/bot.php'; ?>