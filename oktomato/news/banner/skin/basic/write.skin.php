<?php
if (!defined('OKTOMATO')) exit;

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';

function strReplaceQuotationMark ($str) { //큰따옴표, 작은따옴표 변경
		$str = str_replace('"','&#34;', $str  );  
		$str = str_replace("'","&#39;", $str  );  
		$str = str_replace('"','', $str  ); 
		$str = str_replace("'","", $str  );  
		$str = trim($str);

		return $str;
}


?>
 <section id="container">
  <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
     <article class="content" style="position:relative;">
        	
		<form name="mainBannerFrm" method="post" enctype="multipart/form-data">
		<input type="hidden" name="at" value="update">

		  <section class="section_box">
            <h1 class="title1">01. Main Banner</h1>

              <div class="lst_table3">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th2">
                      <col>
                    </colgroup>
                    <tbody>
					<thead>
						<th>SLOT</th>
						<th>IMAGE</th>
					</thead>
                      
					  <?php 
					   //ROOF Banner S
					  $list = null;
					  $banner->setAttr('section', 2);
					  $list = $banner->getListBanner($dbh);
					  $i=1;
					  foreach($list as $row){
					  ?>
					   <input type="hidden" name="mainBannerIdx[]" id="mainBannerIdx<?php echo $i?>" value="<?php echo $row['bannerIdx']?>"> 
					   <input type="hidden" name="oldBannerUpFileName[]" id="oldBannerUpFileName<?php echo $i?>" value="<?php echo $row['bannerUpFileName']?>"> 
					   <input type="hidden" name="oldBannerFileName[]" id="oldBannerFileName<?php echo $i?>" value="<?php echo $row['bannerFileName']?>"> 
					   <input type="hidden" name="oldBannerUpFileNameMobile[]" id="oldBannerUpFileNameMobile<?php echo $i?>" value="<?php echo $row['bannerUpFileNameMobile']?>"> 
					   <input type="hidden" name="oldBannerFileNameMobile[]" id="oldBannerFileNameMobile<?php echo $i?>" value="<?php echo $row['bannerFileNameMobile']?>"> 
					  <tr>
                        <th scope="row">Slot (PC) *</th>
                        <td>
							<div class="photoUpload">
								<!-- <div class="photoType1"> -->
								<div class="photoType3">
									 <span id="imgBanner"><?php if (!empty($row['bannerUpFileName'])): ?><img src="<?php echo $row['bannerUpFileName']; ?>" style="max-width: 600px; max-height:64px"><?php endif; ?></span>
								</div>
								  <div class="contBanner clearfix">
									  <p>cf. 1180 X 124 사이즈 업로드</p>
									<div class="fileinputs" >
									  <input type="file" class="file" name="mainBannerImg[]"/>
									</div>
									<div class="lst_Upload">
									</div>
								  </div>
							</div>
                        </td>
                      </tr>
					  <tr>
                        <th scope="row">Slot  (Mobile)*</th>
                        <td>
							<div class="photoUpload">
								<!-- <div class="photoType1"> -->
								<div class="photoType3">
									 <span id="imgBanner"><?php if (!empty($row['bannerUpFileNameMobile'])): ?><img src="<?php echo $row['bannerUpFileNameMobile']; ?>" style="max-width: 600px; max-height:64px"><?php endif; ?></span>
								</div>
								  <div class="contBanner clearfix">
									  <p>cf. 1019 X 270 사이즈 업로드</p>
									<div class="fileinputs" >
									  <input type="file" class="file" name="mainBannerImgMobile[]"/>
									</div>
									<div class="lst_Upload">
									</div>
								  </div>
							</div>
                        </td>
                      </tr>
					  <tr>
                        <th scope="row">Hyperlink</th>
                        <td>
							<input name="linkUrl[]" type="text" class="inp_txt lh w470" id="linkUrl<?php echo $i?>" value="<?php echo $row['linkUrl']?>" title="">
                        </td>
                      </tr>
					  <tr>
                        <th scope="row">노출여부</th>
                        <td>
							<div class="lst_check radio">
								<span<?php if ($row['isDisplay'] === 'Y'): ?> class="on"<?php endif; ?>>
								  <label for="isDisplayY<?php echo $row['bannerIdx']; ?>">노출</label>
								  <input type="radio" name="isDisplay[]" id="isDisplayY<?php echo $row['bannerIdx']; ?>" value="Y"<?php if ($row['isDisplay'] === 'Y'): ?> checked<?php endif; ?>>
								</span>
								<span<?php if ($row['isDisplay'] === 'N'): ?> class="on"<?php endif; ?>>
								  <label for="isDisplayN<?php echo $row['bannerIdx']; ?>">비노출</label>
								  <input type="radio" name="isDisplay[]" id="isDisplayN<?php echo $row['bannerIdx']; ?>" value="N"<?php if ($row['isDisplay'] === 'N'): ?> checked<?php endif; ?>>
								</span>
							  </div>
                        </td>
                      </tr>
					  <?php 
						$i++;
					  }  //ROOF Banner E
					  ?>

                    </tbody>
                  </table>
              </div><!-- //lst_table3 -->

			  <div class="bot_align">
					<div class="btn_right">
					  <button  id="btnSave" class="btn_pack1 ov-b small rato">Save</button>
					</div>
			 </div>

		  </section><!--// section_box -->
		  </form>

     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->



<?php echo ACTION_IFRAME;?>

<input type="hidden" name="param-txt" id="param-txt">
<input type="hidden" name="param-num" id="param-num">

<script>
//초기화 
function setPopupBanner(){
	$("#div-event >ul").html('');
}

function setParam(txt, num) {
	$("#param-txt").val(txt);
	$("#param-num").val(num);
}

function setPage(){
	$("#param-num").val(1);
}

function pageRun(p){
	var paTxt = $("#param-txt").val();
	$("#param-num").val(p);

	searchNews(paTxt);
	
}

function Enter_Check(val){

        // 엔터키의 코드는 13입니다.
	if(event.keyCode == 13){
		searchNews(val);
		return;
	}
}

//상품은 노출상품을 같은 모듈을 쓰기 위해 ex 값으로 구분한다.
function searchNews() {
	//ex 값은 1, 2, 3 으로 구분한다. 몇 번째 슬롯을 선택했는지 여부 ( 8개)
	ex = $("#param-txt").val();
	
	//alert($("#search_news").val());
	$.ajax({
		type:"POST",
		url:"ajax_search_news.php",
		dataType:"html",
		//dataType:"json",
		data:{"search_news":$("#search_news").val(), txt:$("#param-txt").val(), page:$("#param-num").val(), "ex":ex},
		success: function(data){
			//alert(data);
			$("#div-event >ul").html(data);
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function newsSelect(news_idx, news_title, new_paragraph_idx, new_paragraph_content, img, category_idx, category_text, reporter_name, create_date, ex){
	// __ajax_search_news.php 에서 호출

	//다음페이지로 넘기기 위한 form 값 설정
	//$("#banner_idx"+ex).val('');
	$("#news_idx"+ex).val(news_idx);
	$("#news_title"+ex).val(news_title);
	$("#news_text"+ex).val(new_paragraph_content);
	$("#news_img"+ex).val(img);
	$("#category_idx"+ex).val(category_idx);
	$("#category_text"+ex).val(category_text);
	$("#reporter_name"+ex).val(reporter_name);
	$("#create_date"+ex).val(create_date);

	if(ex == '1' || ex =='2' || ex == '3'){
		
		//현재페이지에 보여주기 위한 값 설정
		//$("#imgBig"+ex).html(img);
		$("#sp_news_title_"+ex).html(news_title);
		$("#sp_news_text_"+ex).html(new_paragraph_content);

		$("#imgBig"+ex ).html("");
		$('<img>', {
			src: '<?php echo newsUploadPath?>'+ img,
			alt: 'Little Bear',
		}).css({
			"max-width" : '160px',
			"max-height" : '80px'
		}).appendTo("#imgBig"+ex);

	}

	if(ex == '4' || ex =='5' || ex =='6' || ex =='7'){
		//다음페이지로 넘기기 위한 form 값 설정
		$("#news_category_text"+ex).val(category_text);

		//현재페이지에 보여주기 위한 값 설정
		//$("#imgBig"+ex).html(img);
		$("#sp_news_title_"+ex).html(news_title);
		$("#sp_news_text_"+ex).html(new_paragraph_content);
		$("#sp_news_category_"+ex).html(category_text);
		
		$("#imgBig"+ex ).html("");
		$('<img>', {
			src: '<?php echo newsUploadPath?>'+ img
		}).css({
			"max-width" : '112px',
			"max-height" : '112px'
		}).appendTo("#imgBig"+ex);

	}

	if(ex == '8' ){
		//다음페이지로 넘기기 위한 form 값 설정
		$("#news_category_text"+ex).val(category_text);

		//현재페이지에 보여주기 위한 값 설정
		//$("#imgBig"+ex).html(img);
		$("#sp_news_title_"+ex).html(news_title);
		$("#sp_news_category_"+ex).html(category_text);
		
		$("#imgBig"+ex ).html("");
		$('<img>', {
			src: '<?php echo newsUploadPath?>'+ img
		}).css({
			"max-width" : '112px',
			"max-height" : '112px'
		}).appendTo("#imgBig"+ex);

	}

	$("#search_news").val(""); 
	$("#bannerListPopup").css("display","none"); 

}

function deleteNews(ex){
	$("#news_idx"+ex).val('');
	$("#news_title"+ex).val('');
	$("#news_text"+ex).val('');
	$("#news_img"+ex).val('');
	$("#category_idx"+ex).val('');
	$("#category_text"+ex).val('');
	$("#reporter_name"+ex).val('');
	$("#create_date"+ex).val('');

	$("#sp_news_title_"+ex).html('');
	$("#sp_news_text_"+ex).html("");
	$("#imgBig"+ex ).html("");

	alert('삭제를 하시고 SAVE를 하셔야 적용됩니다.');
}

</script>

 
 
 <script>
$(function(){
  initFileUploads();
  checkListMotion();
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		//var x = $(this).offset().left - 350;
		var x = $(this).offset().right - 20;
		var y = $(this).offset().top-200;
		layerBoxOffset(id,x,y);
		return false;
	});
	btnHover(".btnOvr");
});

function chkForm(f){
	if(chkDefaultForm(f)){
		f.method = "post";
		f.action = "index.php";
		f.target = "action_ifrm";
		f.submit();
	}
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