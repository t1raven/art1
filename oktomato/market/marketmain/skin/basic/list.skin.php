<?php
$i = 0;
$j = 1;
$z = 0;

$pageName = 'List';
$pageNum = '3';
$subNum = '4';
$thirdNum = '0';

$Marketmain = new Marketmain();
$mainBannerList = $Marketmain->getMainBannerList($dbh);
$genreBannerList = $Marketmain->getGenreBannerList($dbh);

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
 <section id="container">
  <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
     <article class="content">
        <section class="section_box">
            <h1 class="title1">Main Banner</h1>
            <?php foreach($mainBannerList as $main):?>
            <form name="mainBannerFrm<?php echo $main['mmb_idx']; ?>" enctype="multipart/form-data">
            <input type="hidden" name="at" value="update">
            <input type="hidden" name="banner_type" value="main">
            <input type="hidden" name="num" value="<?php echo $main['mmb_idx']; ?>">
            <input type="hidden" name="old_img_name" value="<?php echo $main['mmb_img_name']; ?>">
            <input type="hidden" name="old_img_rename" value="<?php echo $main['mmb_img_rename']; ?>">
			<input type="hidden" name="old_img_mobile_name" value="<?php echo $main['mmb_img_mobile_name']; ?>">
            <input type="hidden" name="old_img_mobile_rename" value="<?php echo $main['mmb_img_mobile_rename']; ?>">
              <div class="lst_table3<?php if($j > 1):?> para_top<?php endif; ?>">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>
                      <tr>
                        <th scope="row">Slot<?php echo $j; ?>* <input type="text" class="inp_txt lh w15 {label:'배너 이미지 순서',required:true,nospace:true,numeric:true,minlength:1,maxlength:2}" name="orders<?php echo $main['mmb_idx']; ?>" value="<?php echo $main['orders']; ?>" maxlength="2"></th>
                        <td>
                          <div class="lst_check radio">
                            <span<?php if ($main['mmb_display'] === 'Y'): ?> class="on"<?php endif; ?>>
                              <label for="marketGoodsDisplayY<?php echo $main['mmb_idx']; ?>">노출</label>
                              <input type="radio" name="display<?php echo $main['mmb_idx']; ?>" id="marketGoodsDisplayY<?php echo $main['mmb_idx']; ?>" value="Y"<?php if ($main['mmb_display'] === 'Y'): ?> checked<?php endif; ?>>
                            </span>
                            <span<?php if ($main['mmb_display'] === 'N'): ?> class="on"<?php endif; ?>>
                              <label for="marketGoodsDisplayN<?php echo $main['mmb_idx']; ?>">비노출</label>
                              <input type="radio" name="display<?php echo $main['mmb_idx']; ?>" id="marketGoodsDisplayN<?php echo $main['mmb_idx']; ?>" value="N"<?php if ($main['mmb_display'] === 'N'): ?> checked<?php endif; ?>>
                            </span>
                          </div>
                        </td>
                        <td rowspan="5" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" onclick="mainBannerSave(this.form, '<?php echo $main['mmb_idx']; ?>');">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">종류*</th>
                        <td>
                          <div class="lst_check radio">
                            <span<?php if ($main['mmb_gubun'] === 'A'): ?> class="on"<?php endif; ?>>
                              <label for="marketGoods<?php echo $main['mmb_idx']; ?>">작품</label>
                              <input type="radio" name="gubun<?php echo $main['mmb_idx']; ?>" id="marketGoods<?php echo $main['mmb_idx']; ?>" onclick="checkedGubun('<?php echo $main['mmb_idx']; ?>', 'A');" value="A"<?php if ($main['mmb_gubun'] === 'A'): ?> checked<?php endif; ?>>
                            </span>
                            <span<?php if ($main['mmb_gubun'] === 'E'): ?> class="on"<?php endif; ?>>
                              <label for="marketEvent<?php echo $main['mmb_idx']; ?>">기획전</label>
                              <input type="radio" name="gubun<?php echo $main['mmb_idx']; ?>" id="marketEvent<?php echo $main['mmb_idx']; ?>" onclick="checkedGubun('<?php echo $main['mmb_idx']; ?>', 'E');" value="E"<?php if ($main['mmb_gubun'] === 'E'): ?> checked<?php endif; ?>>
                            </span>
							<span<?php if ($main['mmb_gubun'] === 'L'): ?> class="on"<?php endif; ?>>
                              <label for="marketLink<?php echo $main['mmb_idx']; ?>">링크</label>
                              <input type="radio" name="gubun<?php echo $main['mmb_idx']; ?>" id="marketLink<?php echo $main['mmb_idx']; ?>" onclick="checkedGubun('<?php echo $main['mmb_idx']; ?>', 'L');" value="L"<?php if ($main['mmb_gubun'] === 'L'): ?> checked<?php endif; ?>>
                            </span>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" id="gubunTxt<?php echo $main['mmb_idx']; ?>"><?php if ($main['mmb_gubun'] === 'A'): ?>작품검색*<?php else: ?>기획전검색*<?php endif; ?></th>
                        <td class="layerPopup">
                             <span id="goodsSearch<?php echo $main['mmb_idx']; ?>"<?php if ($main['mmb_gubun'] !== 'A'): ?> style="display:none"<?php endif; ?>>
                                 <input name="artwork_txt" type="text" class="inp_txt w190 searchPopup" id="artwork_txt_<<?php echo $main['mmb_idx']; ?>" value="<?php echo $main['goods_name']; ?>" readonly>
                                 <input name="artwork" type="hidden" class="inp_txt w190 searchPopup" id="artwork_<?php echo $main['mmb_idx']; ?>" value="<?php echo $main['goods_idx']; ?>" readonly>
                                  <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('artwork', '<?php echo $main['mmb_idx']; ?>')"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                              </span>
                             <span id="eventSearch<?php echo $main['mmb_idx']; ?>"<?php if ($main['mmb_gubun'] !== 'E'): ?> style="display:none"<?php endif; ?>>
                                <input name="event_txt" type="text" class="inp_txt w190 searchPopup" id="event_txt_<?php echo $main['mmb_idx']; ?>" value="<?php echo $main['evt_title']; ?>" readonly>
                                <input name="event" type="hidden" class="inp_txt w190 searchPopup" id="event_<?php echo $main['mmb_idx']; ?>" value="<?php echo $main['evt_idx']; ?>" readonly>
                                <a href="#eventListPopup" class="searchPopup layerOpen" onclick="setParam('event', '<?php echo $main['mmb_idx']; ?>')"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                            </span>
                       </td>
                      </tr>
					  <tr>
                        <th scope="row">링크*</th>
                        <td>
                           <span id="LinkSearch<?php echo $main['mmb_idx']; ?>"<?php if ($main['mmb_gubun'] !== 'L'): ?> style="display:none"<?php endif; ?>><input type="text" class="inp_txt w400" name="main_link" value="<?php echo $main['mmb_link']; ?>" /></span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">이미지(PC)*</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""><?php if (!empty($main['mmb_img_rename'])): ?><img src="<?php echo marketMainUploadPath, $main['mmb_img_rename']; ?>" width="100" height="150"><?php endif; ?></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 1180 X 520 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <!--input type="file" class="file" name="main_banner_img<?php echo $j; ?>"/-->
                                  <input type="file" class="file" name="main_banner_img"/>
                                </div>
                                <div class="lst_Upload">
                                </div>
                              </div>
                        </div>
                        </td>
                      </tr>
					  <tr>
                        <th scope="row">이미지 (Mobile)*</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""><?php if (!empty($main['mmb_img_mobile_rename'])): ?><img src="<?php echo marketMainUploadPath, $main['mmb_img_mobile_rename']; ?>" width="100" height="150"><?php endif; ?></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 640 X 600 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <!--input type="file" class="file" name="main_banner_img<?php echo $j; ?>"/-->
                                  <input type="file" class="file" name="main_banner_mobile_img"/>
                                </div>
                                <div class="lst_Upload">
                                </div>
                              </div>
                        </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div><!-- //lst_table3 -->
              </form>
              <?php ++$j; endforeach; ?>
          </section><!--// section_box -->

          <section class="section_box">
              <h1 class="title1">Genre Banner</h1>
              <form name="genreBannerFrm" method="post" enctype="multipart/form-data">
              <input type="hidden" name="at" value="update">
              <input type="hidden" name="banner_type" value="genre">
               <div class="lst_table3">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>
                    <?php foreach($genreBannerList as $genre):?>
                      <tr>
                        <th scope="row"><?php echo $aMedium_new[$z]; ?></th>
                        <td>
                            <div class="photoUpload">
                                <div class="photo">
                                     <span id=""><?php if (!empty($genre['goods_img_rename'])): ?><img src="<?php echo marketGenreUploadPath, $genre['goods_img_rename']; ?>" width="100" height="150"><?php endif; ?></span>
                                 </div>
                                  <div class="cont clearfix">
                                      <p>cf. 1180 X 520 사이즈 업로드</p>
                                      <div class="fileinputs" >
                                        <input type="file" class="file" name="genre_banner_img[]"/>
                                        <input type="hidden" name="old_genre_banner_img[]" value="<?php echo $genre['goods_img_name']; ?>">
                                        <input type="hidden" name="old_genre_banner_reimg[]" value="<?php echo $genre['goods_img_rename']; ?>">
                                      </div>
                                      <div class="lst_Upload"></div>
                                  </div>
                            </div>
                        </td>
                        <?php if ($z === 0): ?>
                        <td rowspan="8" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnGenre" onclick="genreBannerSave(this.form);">Save</button>
                        </td>
                        <?php endif; ?>
                      </tr>
                    <?php ++$z; endforeach; ?>
                    </tbody>
                  </table>
              </div><!-- //lst_table3 -->
              </form>
          </section>


     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<?php include('../../../lib/include/goods/artwork.inc.php');?>
<?php include('../../../lib/include/goods/event.inc.php');?>
<?php echo ACTION_IFRAME;?>
<input type="hidden" name="param-txt" id="param-txt">
<input type="hidden" name="param-num" id="param-num">
 <script>
$(function(){
  initFileUploads();
  checkListMotion();
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		var x = $(this).offset().left;
		var y = $(this).offset().top-10;
		layerBoxOffset(id,x,y);
		return false;
	});

	//$("#btnGenre").click(function(){

	//});


	/*
	$("#btnSelectionSave").click(function(){
		 chkForm(document.selectionFrm);
	});
	$("#btnMdChoiceSave").click(function(){
		chkForm(document.mdChoiceFrm);
	});
	$("#btnCollectionSave").click(function(){
		chkForm(document.collectionFrm);
	});
	*/

	//LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	//checkListMotion();
	//initFileUploads();
	btnHover(".btnOvr");
});

function createArtWork() {
	location.replace('../work/index.php?at=write');
}

function createEventExhibition() {
	location.replace('../event/index.php?at=write');
}

function chkForm(f){
	if(chkDefaultForm(f)){
		f.method = "post";
		f.action = "index.php";
		f.target = "action_ifrm";
		f.submit();
	}
}
function searchArtist() {
	$.ajax({
		type:"POST",
		url:"artwork.php",
		dataType:"html",
		data:{"artwork":$("#artwork").val(), txt:$("#param-txt").val(), num:$("#param-num").val()},
		success: function(data){
			$("#div-artwork >ul").html(data);

			/*
			if (data.result == "__complete")
			{
				$("#div-artwork >ul").html(data.sHTML);
			}
			*/
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function setParam(txt, num) {
	$("#param-txt").val(txt);
	$("#param-num").val(num);
}

/*
$(document).keydown(function(e){
	if(e.target.nodeName === "INPUT"){
		if(e.keyCode === 8){
			return false;
		}
	}
});
window.history.forward(0);
*/

function mainBannerSave(f, num) {
	if ($("input:radio[name='gubun"+num+"']:checked").val() == "A")  {
		if (f.artwork_txt.value == "") {
			alert("작품검색을 입력하세요");
			return false;
		}
	}
	else if ($("input:radio[name='gubun"+num+"']:checked").val() == "E") {
		if (f.event_txt.value == "") {
			alert("기획전검색을 입력하세요");
			return false;
		}
	}
	else
	{
		if (f.main_link.value == "") {
			alert("링크를 입력하세요");
			return false;
		}
	}

	if (f.old_img_name.value == "" && f.main_banner_img.value == "") {
		alert("이미지를 입력하세요");
		return false;
	}
	else {
		f.method = "post";
		f.action = "index.php";
		f.target = "action_ifrm";
		f.submit();
	}
}


function mainBannerDisplay(f, num, display) {
	if ($("input:radio[name='gubun"+num+"']:checked").val() == "A")  {
		if (f.artwork_txt.value == "") {
			alert("작품검색을 입력하세요");
			return false;
		}
	}
	else {
		if (f.event_txt.value == "") {
			alert("기획전검색을 입력하세요");
			return false;
		}
	}

	if (f.old_img_name.value == "" && f.main_banner_img.value == "") {
		alert("이미지를 입력하세요");
		return false;
	}
	else {
		f.display.value = display;
		f.method = "post";
		f.action = "index.php";
		f.target = "action_ifrm";
		f.submit();
	}
}

function genreBannerSave(f) {
	f.method = "post";
	f.action = "index.php";
	f.target = "action_ifrm";
	f.submit();
}

function checkedGubun(num, gubun) {
	if (gubun == "A"){
		$("#goodsSearch"+num).css("display", "block");
		$("#eventSearch"+num).css("display", "none");
		$("#LinkSearch"+num).css("display", "none");
		$("#gubunTxt"+num).text("작품검색*");
		//$("#event_txt_"+num).val("");
		//$("#event_"+num).val("");

	}
	else if(gubun == "L"){		
		$("#goodsSearch"+num).css("display", "none");
		$("#eventSearch"+num).css("display", "none");
		$("#LinkSearch"+num).css("display", "block");
	}
	else{
		$("#goodsSearch"+num).css("display", "none");
		$("#eventSearch"+num).css("display", "block");
		$("#LinkSearch"+num).css("display", "none");
		$("#gubunTxt"+num).text("기획전검색*");
		//$("#artwork_txt_"+num).val("");
		//$("#artwork_"+num).val("");
	}
}

function setArtWorkInsert(idx, name, artist, txt, num) {
	$("#"+txt+"_txt_"+num).val(name+'('+artist+')');
	$("#"+txt+"_"+num).val(idx);
	$("#artwork").val("");
	$("#div-artwork >ul").html("");
	$(".layer_popup1").css("display","none");
	setParam('', '');
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

function searchEventExhibition() {
	$.ajax({
		type:"POST",
		url:"/oktomato/market/marketmain/event.php",
		dataType:"html",
		data:{"eventtitle":$("#eventtitle").val(), txt:$("#param-txt").val(), num:$("#param-num").val()},
		success: function(data){
			$("#div-event >ul").html(data);
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function setEventExhibitionInsert(idx, name, txt, num) {
	$("#"+txt+"_txt_"+num).val(name);
	$("#"+txt+"_"+num).val(idx);
	$("#eventtitle").val("");
	$("#div-artwork >ul").html("");
	$(".layer_popup1").css("display","none");
	setParam('', '');
}
</script>
<?php
include '../../inc/bot.php';

$dbh = null;
$Marketmain = null;
$mainBannerList = null;
$genreBannerList = null;
unset($Marketmain);
unset($mainBannerList);
unset($genreBannerList);
unset($dbh);
?>