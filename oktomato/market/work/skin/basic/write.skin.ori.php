<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'View';
$pageNum = '3';
$subNum = '2';
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
     <input type="hidden" name="idx" id="idx" value="<?php echo $Work->attr['goods_idx'];?>">
     <input type="hidden" name="artist_idx" value="<?php echo $Work->attr['artist_idx'];?>">
     <input type="hidden" name="recommend_idx" value="<?php echo $Work->attr['recommend_idx'];?>">
     <input type="hidden" name="goods_cnt" value="<?php echo $Work->attr['goods_cnt'];?>">
     <input type="hidden" name="sold_out_state" value="<?php echo $Work->attr['sold_out_state'];?>">
     <input type="hidden" name="display" value="<?php echo $Work->attr['goods_display'];?>">
     <input type="hidden" name="list_img" id="list_img" value="<?php echo $Work->attr['goods_list_img'];?>">
     <input type="hidden" name="add_img1" id="add_img1" value="<?php echo $goods_img[1];?>">
     <input type="hidden" name="add_img2" id="add_img2" value="<?php echo $goods_img[2];?>">
     <input type="hidden" name="add_img3" id="add_img3" value="<?php echo $goods_img[3];?>">
     <input type="hidden" name="add_img4" id="add_img4" value="<?php echo $goods_img[4];?>">
     <input type="hidden" name="add_img5" id="add_img5" value="<?php echo $goods_img[5];?>">
     <input type="hidden" name="add_img6" id="add_img6" value="<?php echo $goods_img[6];?>">
     <input type="hidden" name="add_img7" id="add_img7" value="<?php echo $goods_img[7];?>">
     <input type="hidden" name="add_img8" id="add_img8" value="<?php echo $goods_img[8];?>">
     <input type="hidden" name="add_img9" id="add_img9" value="<?php echo $goods_img[9];?>">
     <input type="hidden" name="add_img10" id="add_img10" value="<?php echo $goods_img[10];?>">
      <section class="section_box">
        <h1 class="title1">Category</h1>
          <div class="lst_table3">
            <table summary="Category">
              <caption>Category</caption>
              <colgroup>
                <col class="th1">
                <col>
              </colgroup>
              <tbody>
                <tr>
                  <th scope="row">Medium *</th>
                  <td>
                    <div class="lst_check radio">
                      <?php for($i=0; $i<$mediumCnt; $i++):?>
                      <span>
                        <label for="medium<?php echo $i;?>"><?php echo $aMedium[$i];?></label>
                        <input type="radio" name="medium" id="medium<?php echo $i;?>" value="<?php echo $i;?>" <?php if ($Work->attr['goods_medium'] === (string)$i):?> checked<?php endif;?>>
                      </span>
                      <?php endfor;?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Subject  *</th>
                  <td>
                    <div class="lst_check radio">
                      <?php for($i=0; $i<$subjectCnt; $i++):?>
                      <span>
                        <label for="subject<?php echo $i;?>"><?php echo $aSubject[$i];?></label>
                        <input type="radio" name="subject" id="subject<?php echo $i;?>" value="<?php echo $i;?>" <?php if ($Work->attr['goods_subject'] === (string)$i):?> checked<?php endif;?>>
                      </span>
                      <?php endfor;?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Size  *</th>
                  <td>
                    <div class="lst_check radio">
                      <?php for($i=0; $i<$sizeCnt; $i++):?>
                      <span>
                        <label for="size<?php echo $i;?>"><?php echo $aSize[$i];?></label>
                        <input type="radio" name="size" id="size<?php echo $i;?>" value="<?php echo $i;?>"<?php if ($Work->attr['goods_size'] === (string)$i):?> checked<?php endif;?>>
                      </span>
                      <?php endfor;?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Color  *</th>
                  <td>
                    <div class="lst_check radio colorBar">
                      <?php for($i=0; $i<$colorCnt; $i++):?>
                      <span class="aColor<?php echo $i+1;?>">
                        <label for="color<?php echo $i;?>">빨강색</label>
                        <input type="radio" name="color" id="color<?php echo $i;?>" value="<?php echo $i;?>"<?php if ($Work->attr['goods_color'] === (string)$i):?> checked<?php endif;?>>
                      </span>
                      <?php endfor;?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- //lst_table3 -->
      </section><!--// section_box -->
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
                    <input name="artist_name" type="text" class="inp_txt w190 searchPopup {label:'작가',required:true}" id="artist_name" value="<?php echo $Work->attr['artist_name'];?>"  readonly>
                    <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">작품명 *</th>
                  <td>
                    <input name="goods_name" type="text" class="inp_txt w390 {label:'작품명',required:true}" id="goods_name" value="<?php echo $Work->attr['goods_name'];?>" title="작품명 입력">
                  </td>
                </tr>
                <tr>
                  <th scope="row">제작년도 *</th>
                  <td>
                    <select name="make_year">
                        <?php for($i=$bYear; $i>=$eYear; $i--):?>
                        <option value="<?php echo $i;?>"<?php if ($Work->attr['goods_make_year'] === (string)$i):?> selected<?php endif;?>><?php echo $i;?></option>
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
                      <input name="make_type" type="text" class="inp_txt lh w390 {label:'제작방식',required:true}" id="make_type" value="<?php echo $Work->attr['goods_make_type'];?>">
                    </span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">프레임 *</th>
                  <td>
                    <div class="lst_check radio">
                      <span>
                        <label for="frame_state">Framed</label>
                        <input type="radio" name="frame_state" id="frame_state" value="Y"<?php if ($Work->attr['goods_frame_state'] === 'Y'):?> checked<?php endif;?>>
                      </span>
                      <span>
                        <label for="frame_state2">Non-framed</label>
                        <input type="radio" name="frame_state" id="frame_state2" value="N"<?php if ($Work->attr['goods_frame_state'] === 'N'):?> checked<?php endif;?>>
                      </span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">사이즈 *</th>
                  <td>
                    <span class="col_td auto">
                      <label for="width_size" class="pos">가로</label>
                      <input name="width_size" type="text" class="inp_txt lh w110 only_number_dot" id="width_size" value="<?php echo $Work->attr['goods_width'];?>">
                    </span>
                    X
                    <span class="col_td auto">
                      <label for="depth_size" class="pos">세로</label>
                      <input name="depth_size" type="text" class="inp_txt lh w110 only_number_dot" id="depth_size" value="<?php echo $Work->attr['goods_depth'];?>">
                    </span>
                    X
                    <span class="col_td auto">
                      <label for="height_size" class="pos">높이</label>
                      <input name="height_size" type="text" class="inp_txt lh w110 only_number_dot" id="height_size" value="<?php echo $Work->attr['goods_height'];?>">
                    </span>
                    <span class="ml15">cf. 센티미티 단위 입력(소수점 한자리 허용) </span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">판매 가격 *</th>
                  <td>
                    <input name="sell_price" type="text" class="inp_txt w110 only_number {label:'판매 가격',required:true,numeric:true}" id="" value="<?php echo $Work->attr['goods_sell_price'];?>">
                    <span class="ml15">cf. 원 단위 입력</span>
                  </td>
                </tr>
                  <th scope="row">렌탈가능 *</th>
                  <td>
                    <div class="lst_check radio">
                      <span>
                        <label for="lental_state1">Yes</label>
                        <input type="radio" name="lental_state" id="lental_state1" value="Y"<?php if ($Work->attr['goods_lental_state'] === 'Y'):?> checked<?php endif;?>>
                      </span>
                      <span>
                        <label for="lental_state2">No</label>
                        <input type="radio" name="lental_state" id="lental_state2" value="N"<?php if ($Work->attr['goods_lental_state'] === 'N'):?> checked<?php endif;?>>
                      </span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">렌탈 가격</th>
                  <td>
                    <input name="rental_price" type="text" class="inp_txt w110" id="" value="<?php echo $Work->attr['goods_rental_price'];?>">
                    <span class="ml15">cf. 문자 입력 입력</span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">추천관리</th>
                  <td>
                      <input name="referee" type="text" class="inp_txt w190 searchPopup" id="referee" value="<?php echo $Work->attr['referee'];?>"  readonly>
                      <a href="#RecommendedListPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" alt="검색" class="btnOvr"></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- //lst_table3 -->
      </section><!--// section_box -->
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
                      <textarea name="description"><?php echo $Work->attr['goods_description'];?></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">재료 *</th>
                  <td>
                    <input name="material" type="text" class="inp_txt w390 {label:'재료',required:true}" id="" value="<?php echo $Work->attr['goods_material'];?>">
                  </td>
                </tr>
                <tr>
                  <th scope="row">전시/ 출품내역  *</th>
                  <td>
                    <select name="exhibit_year">
                        <?php for($i=$bYear; $i>=$eYear; $i--):?>
                        <option value="<?php echo $i;?>"<?php if ($Work->attr['goods_exhibit_year'] ===(string)$i):?> selected<?php endif;?>><?php echo $i;?></option>
                        <?php endfor;?>
                        <option>
                    </select>
                    <span class="col_td auto">
                      <label for="oiloncanvas2" class="pos">Oil on canvas</label>
                      <input name="exhibit_item" type="text" class="inp_txt lh w250" id="oiloncanvas2" value="<?php echo $Work->attr['goods_exhibit_item'];?>">
                    </span>
                  </td>
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
                <td>가로사이즈 1920px까지 가능. Jpg만 허용. 각 슬롯 파일 크기는 1MB 제한. <br>List Image는 258px X 299px 사이즈로 업로드.</td>
              </tr>
             <tr>
                <th scope="row">List Image *</th>
                <td>
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="<?php if (!empty($Work->attr['goods_list_img'])): echo goodsListImgUploadPath, $Work->attr['goods_list_img']; endif;?>" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                      <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                      <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                      <div id="upload_status0" style="display:none;">
                        <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                      </div>
                    </div>
                    <!--div class="lst_Upload">
                      <span class="tag">썸네일.jpg <button>삭제</button></span>
                    </div-->
                  </div>
                </td>
              </tr>
              <?php for($i=1; $i<=10; $i++):?>
              <tr>
                <th scope="row">Solt <?php echo $i;?> *</th>
                <td>
                  <div class="clearfix">
                    <div class="fileinputs" >
                      <!--input type="file" class="file" name="img[]" /-->
                      <span style="background:#ddd; display:inline-block;"><img id="goodsImg<?php echo $i;?>" src="<?php if (!empty($goods_img[$i])): echo goodsSmallImgUploadPath, $goods_img[$i]; endif;?>" width="132" height="100"alt="이미지를 업로드해주세요."></span>
                      <button type="button" id="btn_regist<?php echo $i;?>"  class="btn_regist">이미지 등록</button>
                      <button type="button" id="btn_delete<?php echo $i;?>" class="btn_delete" onclick="deleteAddImg(<?php echo $i;?>);">이미지 삭제</button>
                      <div id="upload_status<?php echo $i;?>" style="display:none;">
                        <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                      </div>
                    </div>
                    <!--div class="lst_Upload">
                      <span class="tag">썸네일.jpg <button>삭제</button></span>
                    </div-->
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
        </div><!-- //lst_table3 -->
      </section><!--// section_box -->
     </form>
     </article>
  </div>
 </section>
 <!-- //container -->
<?php include('../../../lib/include/goods/artist.inc.php');?>
<?php include('../../../lib/include/goods/referee.inc.php');?>
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

<?php for($i=1; $i<=10; $i++):?>
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
	bbsCheckbox();
	checkListMotion();
	initFileUploads();
	btnHover(".btnOvr");
})

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
function setRefereeInsert(idx, referee) {
	document.writeFrm.recommend_idx.value = idx;
	document.writeFrm.referee.value = referee;
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
<?php include '../../inc/bot.php';?>