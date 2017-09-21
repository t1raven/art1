<?php
if (!defined('OKTOMATO')) exit;
$pageName = 'View';
$pageNum = '3';
$subNum = '6';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
<section id="container">
   <div class="container_inner">
      <?php include '../../inc/path.php';?>
      <article class="content">
     <form name="writeFrm" method="post" onsubmit="return false;">
     <input type="hidden" name="at" value="update">
     <input type="hidden" name="idx" id="idx" value="<?php echo $Goods->attr['goods_idx'];?>">
     <input type="hidden" name="artist_idx" value="<?php echo $Goods->attr['artist_idx'];?>">
     <input type="hidden" name="list_img" id="list_img" value="<?php echo $Goods->attr['goods_list_img'];?>">
     <input type="hidden" name="add_img1" id="add_img1" value="<?php echo $goods_img[1];?>">
     <input type="hidden" name="add_img2" id="add_img2" value="<?php echo $goods_img[2];?>">
     <input type="hidden" name="add_img3" id="add_img3" value="<?php echo $goods_img[3];?>">
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
                        <th scope="row">작가 *</th>
                        <td class="layerPopup">
                           <input name="artist_name" type="text" class="inp_txt w190 searchPopup {label:'작가',required:true}" id="artist_name" value="<?php echo $Goods->attr['artist_name'];?>"  readonly>
                           <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">작품명 *</th>
                        <td>
                           <input name="goods_name" type="text" class="inp_txt w390 {label:'작품명',required:true}" id="goods_name" value="<?php echo $Goods->attr['goods_name'];?>" title="작품명 입력">
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">제작년도 *</th>
                        <td>
                          <select name="make_year">
                          <?php for($i=$bYear; $i<=$eYear; $i++):?>
                            <option value="<?php echo $i;?>"<?php if ($Goods->attr['goods_make_year'] === (string)$i):?> selected<?php endif;?>><?php echo $i;?></option>
                          <?php endfor;?>
                            <option>
                          </select>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">사이즈 *</th>
                        <td>
                           <span class="col_td auto">
                             <label for="width_size" class="pos">가로</label>
                             <input name="width_size" type="text" class="inp_txt lh w110 only_number_dot" id="width_size" value="<?php echo $Goods->attr['goods_width'];?>">
                           </span>
                           X
                           <span class="col_td auto">
                             <label for="depth_size" class="pos">세로</label>
                             <input name="depth_size" type="text" class="inp_txt lh w110 only_number_dot" id="depth_size" value="<?php echo $Goods->attr['goods_depth'];?>">
                           </span>
                           X
                           <span class="col_td auto">
                             <label for="height_size" class="pos">높이</label>
                             <input name="height_size" type="text" class="inp_txt lh w110 only_number_dot" id="height_size" value="<?php echo $Goods->attr['goods_height'];?>">
                           </span>
                           <span class="ml15">cf. 센티미티 단위 입력(소수점 한자리 허용) </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">가격 *</th>
                        <td>
                           <input name="sell_price" type="text" class="inp_txt w110 {label:'가격',required:true}" id="" value="<?php echo $Goods->attr['goods_sell_price'];?>">
                           <span class="ml15">cf. 원 단위 입력</span>
                        </td>
                     </tr>
                      <tr>
                        <th scope="row">재고수량 *</th>
                        <td>
                           <input name="goods_cnt" type="text" class="inp_txt w110" id="" value="<?php echo $Goods->attr['goods_cnt'];?>">
                        </td>
                     </tr>

                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
         </section>
         <!--// section_box -->
         <section class="section_box">
            <h1 class="title1">Sub Info.</h1>
            <div class="lst_table3">
               <table summary="Sub Info.">
                  <caption>Sub Info.</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">작품설명</th>
                        <td>
                           <div class="textarea">
                              <textarea name="description"><?php echo $Goods->attr['goods_description'];?></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">재료 *</th>
                        <td>
                           <input name="material" type="text" class="inp_txt w390 {label:'재료',required:true}" id="" value="<?php echo $Goods->attr['goods_material'];?>">
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
         </section>
         <!--// section_box -->
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
                        <td>가로사이즈 1920px까지 가능. Jpg만 허용. 각 슬롯 파일 크기는 1MB 제한. <br>썸네일은 280px X 210px(4:3) 사이즈로 업로드.</td>
                     </tr>
                     <tr>
                        <th scope="row">Thumbnail *</th>
                        <td>
                           <div class="clearfix">
                            <div class="fileinputs" >
                              <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="<?php if (!empty($Goods->attr['goods_list_img'])): echo goodsListImgUploadPath, $Goods->attr['goods_list_img']; endif;?>" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                              <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                              <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                              <div id="upload_status0" style="display:none;">
                                <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                              </div>
                            </div>
                          </div>
                        </td>
                     </tr>
                     <?php for($i=1; $i<=3; $i++):?>
                     <tr>
                        <th scope="row">Slot <?php echo $i;?> *</th>
                        <td>
                            <div class="clearfix">
                            <div class="fileinputs" >
                              <span style="background:#ddd; display:inline-block;"><img id="goodsImg<?php echo $i;?>" src="<?php if (!empty($goods_img[$i])): echo goodsSmallImgUploadPath, $goods_img[$i]; endif;?>" width="132" height="100"alt="이미지를 업로드해주세요."></span>
                              <button type="button" id="btn_regist<?php echo $i;?>"  class="btn_regist">이미지 등록</button>
                              <button type="button" id="btn_delete<?php echo $i;?>" class="btn_delete" onclick="deleteAddImg(<?php echo $i;?>);">이미지 삭제</button>
                              <div id="upload_status<?php echo $i;?>" style="display:none;">
                                <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                              </div>
                            </div>
                          </div>
                        </td>
                     </tr>
                     <?php endfor;?>
                  </tbody>
               </table>
               <div class="bot_align">
                  <div class="btn_right">
                     <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
                     <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
                  </div>
               </div>
            </div>
            <!-- //lst_table3 -->
         </section>
         <!--// section_box -->
      </article>
   </div>
</section>
<!-- //container -->
<?php echo ACTION_IFRAME;?>
<?php include ('../../../lib/include/goods/artist.inc.php');?>
<?php include ('../../../lib/include/goods/referee.inc.php');?>

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
		location.href="index.php";
	});
	$("#btnSave").click(function(){
		chkForm(document.writeFrm);
	});

	if (!$("input:radio[name='medium']").is(":checked")) {
		$("input:radio[name='medium']").eq(0).attr("checked", true);
	}
	if (!$("input:radio[name='subject']").is(":checked")) {
		$("input:radio[name='subject']").eq(0).attr("checked", true);
	}
	if (!$("input:radio[name='size']").is(":checked")) {
		$("input:radio[name='size']").eq(0).attr("checked", true);
	}
	if (!$("input:radio[name='color']").is(":checked")) {
		$("input:radio[name='color']").eq(0).attr("checked", true);
	}
	if (!$("input:radio[name='frame_state']").is(":checked")) {
		$("input:radio[name='frame_state']").eq(0).attr("checked", true);
	}
	if (!$("input:radio[name='lental_state']").is(":checked")) {
		$("input:radio[name='lental_state']").eq(0).attr("checked", true);
	}

	var button = $("#btn_regist0"), interval;
	new AjaxUpload(button,{
		action: 'upload.php',
		name: 'single_file',
		onSubmit : function(file, ext){
			this.disable();
			$("#upload_status0").css("display", "block");
		},
		onComplete: function(file, response){
			$("#upload_status0").css("display", "none");
			var result = $.trim(response).split("|");
			var status = result[0];
			if (status == "__complete"){
				var filename = result[1];
				$("#btn_regist0").css("display","none");
				$("#btn_delete0").css("display","inline");
				$("#list_img").val(filename);
				$("#goodsImg0").attr("src","/upload/goods/list/" + filename);
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

<?php for($i=1; $i<=3; $i++):?>
	var button<?php echo $i;?> = $("#btn_regist<?php echo $i;?>"), interval;
	new AjaxUpload(button<?php echo $i;?>,{
		action: 'upload.php',
		name: 'multi_file',
		onSubmit : function(file, ext){
			this.disable();
			$("#upload_status<?php echo $i;?>").css("display", "block");
		},
		onComplete: function(file, response){
			$("#upload_status<?php echo $i;?>").css("display", "none");
			var result = $.trim(response).split("|");
			var status = result[0];
			if (status == "__complete"){
				var filename = result[1];
				$("#btn_regist<?php echo $i;?>").css("display","none");
				$("#btn_delete<?php echo $i;?>").css("display","block");
				$("#add_img<?php echo $i;?>").val(filename);
				$("#goodsImg<?php echo $i;?>").attr("src","/upload/goods/small/" + filename);
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
<?php endfor;?>


	LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	checkListMotion();
	//initFileUploads();
	btnHover(".btnOvr");
});

function deleteListImg() {
	$("#btn_regist0").css("display","block");
	$("#btn_delete0").css("display","none");
	$("#list_img").val("");
	$("#goodsImg0").attr("src","");
}
function deleteAddImg(i) {
	$("#btn_regist"+i).css("display","block");
	$("#btn_delete"+i).css("display","none");
	$("#add_img"+i).val("");
	$("#goodsImg"+i).attr("src","");
}

function searchArtist() {
	$.ajax({
		type:"POST",
		url:"/oktomato/market/work/artist.php",
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
	location.replace('../artist/index.php?at=write');
}

function chkForm(f) {

	if (chkDefaultForm(f)) {
		f.target = "action_ifrm";
		f.action = "index.php";
		f.submit();
	}

	/*
	f.target = "action_ifrm";
	f.action = "index.php";
	f.submit();
	*/
}

function createReferee() {
	location.replace('../recommend/index.php');
}
</script>
<? include '../../inc/bot.php'; ?>