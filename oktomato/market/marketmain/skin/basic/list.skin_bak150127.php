<?php
$pageName = 'List';
$pageNum = '3';
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
     <article class="content">
        <section class="section_box">
            <h1 class="title1">Selection</h1>
            <form name="selectionFrm">
            <input type="hidden" name="at" value="update">
            <input type="hidden" name="tbl" value="selection">
            <div class="lst_table3">
                <table summary="Selection">
                  <caption>Selection</caption>
                  <colgroup>
                    <col class="th1">
                    <col>
                  </colgroup>
                  <tbody>
                    <?php for($i=0; $i<$selectionCnt; $i++):?>
                    <tr>
                      <th scope="row">Issue <?php echo $i+1;?> *</th>
                      <td class="layerPopup">
                        <input name="issue_txt[]" type="text" class="inp_txt w190 searchPopup {label:'Issue <?php echo $i+1;?>',required:true}" id="issue_txt_<?php echo $i;?>" value="<?php echo $aMsIssueTxt[$i]?>" readonly>
                        <input name="issue[]" type="hidden" id="issue_<?php echo $i;?>" value="<?php echo $aMsIssue[$i]?>">
                        <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('issue', '<?php echo $i;?>')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                      </td>
                    </tr>
                    <?php endfor;?>
                    <?php for($i=0; $i<$selectionCnt; $i++):?>
                    <tr>
                      <th scope="row">Focused Works <?php echo $i+1;?> *</th>
                      <td class="layerPopup">
                        <input name="focused_works_txt[]" type="text" class="inp_txt w190 searchPopup {label:'Focused Works <?php echo $i+1;?>',required:true}" id="focused_works_txt_<?php echo $i;?>" value="<?php echo $aMsFocusedWorksTxt[$i];?>" readonly>
                        <input name="focused_works[]" type="hidden" id="focused_works_<?php echo $i;?>" value="<?php echo $aMsFocusedWorks[$i]?>">
                        <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('focused_works', '<?php echo $i;?>')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                      </td>
                    </tr>
                    <?php endfor;?>
                    <?php for($i=0; $i<$selectionCnt; $i++):?>
                    <tr>
                      <th scope="row">AWARDED ARTIST <?php echo $i+1;?> *</th>
                      <td class="layerPopup">
                        <input name="awarded_artist_txt[]" type="text" class="inp_txt w190 searchPopup {label:'AWARDED ARTIST <?php echo $i+1;?>',required:true}" id="awarded_artist_txt_<?php echo $i;?>" value="<?php echo $aMsAwardedArtistTxt[$i];?>" readonly>
                        <input name="awarded_artist[]" type="hidden" id="awarded_artist_<?php echo $i;?>" value="<?php echo $aMsAwardedArtist[$i]?>">
                        <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('awarded_artist', '<?php echo $i;?>')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                      </td>
                    </tr>
                    <?php endfor;?>
                  </tbody>
                </table>
              </div><!-- //lst_table3 -->
              </form>
            <div class="bot_align">
              <div class="btn_right">
              <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
            </div>
          </div>
          </section><!--// section_box -->
          <section class="section_box">
            <h1 class="title1">MD CHOICE</h1>
            <form name="mdChoiceFrm">
            <input type="hidden" name="at" value="update">
            <input type="hidden" name="tbl" value="md_choice">
                <div class="lst_table3">
                    <table summary="MD CHOICE">
                      <caption>MD CHOICE</caption>
                      <colgroup>
                        <col class="th1">
                        <col class="th1">
                        <col>
                      </colgroup>
                      <tbody>
                    <?php for($i=0; $i<$mdChoiceCnt; $i++):?>
                        <tr>
                          <th scope="row" rowspan="6">Slot<?php echo $i+1;?> *</th>
                          <th scope="row" >타이틀</th>
                         <td><input name="title[]" type="text" class="inp_txt w190" id="" value="<?php echo $aMmcTitle[$i];?>"> </td>
                        </tr>
                      <?php for($j=0; $j<$mdChoiceCnt; $j++):?>
                        <tr>
                          <th scope="row" >작품<?php echo $j+1;?></th>
                         <td class="layerPopup"><input name="artwork_txt[]" type="text" class="inp_txt w190 searchPopup" id="artwork_txt_<?php echo $i, $j;?>" value="<?php echo $aMmcArtworkTxt[$z];?>" readonly><input name="artwork[]" type="hidden" id="artwork_<?php echo $i, $j;?>" value="<?php echo $aMmcArtwork[$z]?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('artwork', '<?php echo $i, $j;?>')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                      <?php ++$z; endfor;?>
                    <?php endfor;?>
                      </tbody>
                    </table>
                  </div><!-- //lst_table3 -->
                  </form>
                  <div class="bot_align">
                    <div class="btn_right">
                      <button type="button" class="btn_pack1 ov-b small rato" id="btnMdChoiceSave">Save</button>
                    </div>
                  </div>
              </section><!--// section_box -->
              <section class="section_box">
                <h1 class="title1">Collection</h1>
                <form name="collectionFrm">
                <input type="hidden" name="at" value="update">
                <input type="hidden" name="tbl" value="collection">
                <div class="lst_table3">
                    <table summary="MD CHOICE">
                      <caption>Collection</caption>
                      <colgroup>
                        <col class="th1">
                        <col class="th1">
                        <col>
                      </colgroup>
                      <tbody>
                        <tr>
                          <th scope="row" rowspan="4">Top Seller *</th>
                          <th scope="row" >작품1</th>
                          <td class="layerPopup"><input name="top_seller_txt[]" type="text" class="inp_txt w190 searchPopup" id="top_seller_txt_0" value="<?php echo $aMcTopSellerTxt[0];?>" readonly><input name="top_seller[]" type="hidden" id="top_seller_0" value="<?php echo $aMcTopSeller[0];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('top_seller', '0')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품2</th>
                          <td class="layerPopup"><input name="top_seller_txt[]" type="text" class="inp_txt w190 searchPopup" id="top_seller_txt_1" value="<?php echo $aMcTopSellerTxt[1];?>" readonly><input name="top_seller[]" type="hidden" id="top_seller_1" value="<?php echo $aMcTopSeller[1];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('top_seller', '1')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품3</th>
                          <td class="layerPopup"><input name="top_seller_txt[]" type="text" class="inp_txt w190 searchPopup" id="top_seller_txt_2" value="<?php echo $aMcTopSellerTxt[2];?>" readonly><input name="top_seller[]" type="hidden" id="top_seller_2" value="<?php echo $aMcTopSeller[2];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('top_seller', '2')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품4</th>
                          <td class="layerPopup"><input name="top_seller_txt[]" type="text" class="inp_txt w190 searchPopup" id="top_seller_txt_3" value="<?php echo $aMcTopSellerTxt[3];?>" readonly><input name="top_seller[]" type="hidden" id="top_seller_3" value="<?php echo $aMcTopSeller[3];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('top_seller', '3')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="4">MD'S PICK *</th>
                          <th scope="row" >작품1</th>
                          <td class="layerPopup"><input name="md_pick_txt[]" type="text" class="inp_txt w190 searchPopup" id="md_pick_txt_0" value="<?php echo $aMcMdPickTxt[0];?>" readonly><input name="md_pick[]" type="hidden" id="md_pick_0" value="<?php echo $aMcMdPick[0];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('md_pick', '0')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품2</th>
                          <td class="layerPopup"><input name="md_pick_txt[]" type="text" class="inp_txt w190 searchPopup" id="md_pick_txt_1" value="<?php echo $aMcMdPickTxt[1];?>" readonly><input name="md_pick[]" type="hidden" id="md_pick_1" value="<?php echo $aMcMdPick[1];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('md_pick', '1')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품3</th>
                          <td class="layerPopup"><input name="md_pick_txt[]" type="text" class="inp_txt w190 searchPopup" id="md_pick_txt_2" value="<?php echo $aMcMdPickTxt[2];?>" readonly><input name="md_pick[]" type="hidden" id="md_pick_2" value="<?php echo $aMcMdPick[2];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('md_pick', '2')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품4</th>
                          <td class="layerPopup"><input name="md_pick_txt[]" type="text" class="inp_txt w190 searchPopup" id="md_pick_txt_3" value="<?php echo $aMcMdPickTxt[3];?>" readonly><input name="md_pick[]" type="hidden" id="md_pick_3"value="<?php echo $aMcMdPick[3];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('md_pick', '3')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="4">NEW ARRIVALS *</th>
                          <th scope="row" >작품1</th>
                          <td class="layerPopup"><input name="new_arrivals_txt[]" type="text" class="inp_txt w190 searchPopup" id="new_arrivals_txt_0" value="<?php echo $aMcNewArrivalsTxt[0];?>" readonly><input name="new_arrivals[]" type="hidden" id="new_arrivals_0" value="<?php echo $aMcNewArrivals[0];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('new_arrivals', '0')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품2</th>
                         <td class="layerPopup"><input name="new_arrivals_txt[]" type="text" class="inp_txt w190 searchPopup" id="new_arrivals_txt_1" value="<?php echo $aMcNewArrivalsTxt[1];?>" readonly><input name="new_arrivals[]" type="hidden" id="new_arrivals_1" value="<?php echo $aMcNewArrivals[1];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('new_arrivals', '1')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품3</th>
                          <td class="layerPopup"><input name="new_arrivals_txt[]" type="text" class="inp_txt w190 searchPopup" id="new_arrivals_txt_2" value="<?php echo $aMcNewArrivalsTxt[2];?>" readonly><input name="new_arrivals[]" type="hidden" id="new_arrivals_2" value="<?php echo $aMcNewArrivals[2];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('new_arrivals', '2')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                        <tr>
                          <th scope="row" >작품4</th>
                          <td class="layerPopup"><input name="new_arrivals_txt[]" type="text" class="inp_txt w190 searchPopup" id="new_arrivals_txt_3" value="<?php echo $aMcNewArrivalsTxt[3];?>" readonly><input name="new_arrivals[]" type="hidden" id="new_arrivals_3" value="<?php echo $aMcNewArrivals[3];?>"> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('new_arrivals', '3')"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- //lst_table3 -->
                  </form>
                  <div class="bot_align">
                    <div class="btn_right">
                      <button type="button" class="btn_pack1 ov-b small rato" id="btnCollectionSave">Save</button>
                    </div>
                  </div>
              </section><!--// section_box -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<?php echo ACTION_IFRAME;?>
<input type="hidden" name="param-txt" id="param-txt">
<input type="hidden" name="param-num" id="param-num">

 <section id="mainInfoPopup" class="layer_popup1">
    <header class="searchBox">
        <input name="artwork" type="text" class="inp_txt w190 searchPopup" id="artwork">
        <button class="searchPopup" type="button" onclick="searchArtist();"><img src="<?php echo $currentFolder;?>/images/btn/btn_search_off.jpg" alt="검색"></button>
        <button class="close"><img src="<?php echo $currentFolder;?>/images/btn/btn_close.gif" alt="닫기"></button>
    </header>
     <article class="cont">
        <h1>검색결과</h1>
        <div class="scrollBox1" id="div-artwork">
          <ul>
            <!--li><button>서길동(1977) 생명의숲</button></li>
             <li><button>서길동(1977) 생명의숲</button></li>
             <li><button>서길동(1977) 생명의숲</button></li-->
          </ul>
        </div>
        <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u" onclick="createArtWork();" style="cursor:pointer;">작품등록</span>을 진행해 주십시오.</p>
     </article>
 </section>

<script>
$(function(){
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		var x = $(this).offset().left;
		var y = $(this).offset().top-10;
		layerBoxOffset(id,x,y);
		return false;
	});

	$("#btnSelectionSave").click(function(){
		 chkForm(document.selectionFrm);
	});
	$("#btnMdChoiceSave").click(function(){
		chkForm(document.mdChoiceFrm);
	});
	$("#btnCollectionSave").click(function(){
		chkForm(document.collectionFrm);
	});

	//LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	//checkListMotion();
	//initFileUploads();
	btnHover(".btnOvr");
});

function createArtWork() {
	location.replace('../work/index.php?at=write');
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

$(document).keydown(function(e){
	if(e.target.nodeName === "INPUT"){
		if(e.keyCode === 8){
			return false;
		}
	}
});
window.history.forward(0);
</script>
<?php include '../../inc/bot.php'; ?>