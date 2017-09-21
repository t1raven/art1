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
            <h1 class="title1">Main Banner</h1>
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

                      <tr>
                        <th scope="row">Slot1*</th>
                        <td>
                          <div class="lst_check radio">
                            <span class="on">
                              <label for="marketMainSlot1">작품</label>
                              <input type="radio" name="marketMainSlot1" id="marketMainSlot1" value="" checked="checked">
                            </span>
                            <span>
                              <label for="marketMainSlot1_1">기획전</label>
                              <input type="radio" name="marketMainSlot1" id="marketMainSlot1_1" value="">
                            </span>
                          </div>
                        </td>
                        <td rowspan="3" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">작품검색*</th>
                        <td class="layerPopup">
                             <input name="artist_name" type="text" class="inp_txt w190 searchPopup" id="artist_name" value="" readonly="">
                              <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                       </td>
                      </tr>
                      <tr>
                        <th scope="row">이미지</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 1180 X 520 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <input type="file" class="file" name=""/>
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

              <div class="lst_table3 para_top">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>

                      <tr>
                        <th scope="row">Slot2*</th>
                        <td>
                          <div class="lst_check radio">
                            <span class="on">
                              <label for="marketMainSlot2">작품</label>
                              <input type="radio" name="marketMainSlot2" id="marketMainSlot2" value="" checked="checked">
                            </span>
                            <span>
                              <label for="marketMainSlot2_1">기획전</label>
                              <input type="radio" name="marketMainSlot2" id="marketMainSlot2_1" value="">
                            </span>
                          </div>
                        </td>
                        <td rowspan="3" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">작품검색*</th>
                        <td class="layerPopup">
                             <input name="artist_name" type="text" class="inp_txt w190 searchPopup" id="artist_name" value="" readonly="">
                              <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                       </td>
                      </tr>
                      <tr>
                        <th scope="row">이미지</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 1180 X 520 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <input type="file" class="file" name=""/>
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

              <div class="lst_table3 para_top">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>

                      <tr>
                        <th scope="row">Slot3*</th>
                        <td>
                          <div class="lst_check radio">
                            <span class="on">
                              <label for="marketMainSlot3">작품</label>
                              <input type="radio" name="marketMainSlot3" id="marketMainSlot3" value="" checked="checked">
                            </span>
                            <span>
                              <label for="marketMainSlot3_1">기획전</label>
                              <input type="radio" name="marketMainSlot3" id="marketMainSlot3_1" value="">
                            </span>
                          </div>
                        </td>
                        <td rowspan="3" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">작품검색*</th>
                        <td class="layerPopup">
                             <input name="artist_name" type="text" class="inp_txt w190 searchPopup" id="artist_name" value="" readonly="">
                              <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                       </td>
                      </tr>
                      <tr>
                        <th scope="row">이미지</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 1180 X 520 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <input type="file" class="file" name=""/>
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

              <div class="lst_table3 para_top">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>

                      <tr>
                        <th scope="row">Slot4*</th>
                        <td>
                          <div class="lst_check radio">
                            <span class="on">
                              <label for="marketMainSlot4">작품</label>
                              <input type="radio" name="marketMainSlot4" id="marketMainSlot4" value="" checked="checked">
                            </span>
                            <span>
                              <label for="marketMainSlot4_1">기획전</label>
                              <input type="radio" name="marketMainSlot4" id="marketMainSlot4_1" value="">
                            </span>
                          </div>
                        </td>
                        <td rowspan="3" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">작품검색*</th>
                        <td class="layerPopup">
                             <input name="artist_name" type="text" class="inp_txt w190 searchPopup" id="artist_name" value="" readonly="">
                              <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                       </td>
                      </tr>
                      <tr>
                        <th scope="row">이미지</th>
                        <td>
                        <div class="photoUpload">
                            <div class="photo">
                                 <span id=""></span>
                             </div>
                              <div class="cont clearfix">
                                  <p>cf. 1180 X 520 사이즈 업로드</p>
                                <div class="fileinputs" >
                                  <input type="file" class="file" name=""/>
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

              <div class="lst_table3 para_top">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>

                      <tr>
                        <th scope="row">Slot5*</th>
                        <td>
                          <div class="lst_check radio">
                            <span class="on">
                              <label for="marketMainSlot5">작품</label>
                              <input type="radio" name="marketMainSlot5" id="marketMainSlot5" value="" checked="checked">
                            </span>
                            <span>
                              <label for="marketMainSlot5_1">기획전</label>
                              <input type="radio" name="marketMainSlot5" id="marketMainSlot5_1" value="">
                            </span>
                          </div>
                        </td>
                        <td rowspan="3" class="ta-c">
                            <button type="button" class="btn_pack1 ov-b small rato" id="btnSelectionSave">Save</button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">작품검색*</th>
                        <td class="layerPopup">
                             <input name="artist_name" type="text" class="inp_txt w190 searchPopup" id="artist_name" value="" readonly="">
                              <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                       </td>
                      </tr>
                      <tr>
                        <th scope="row">회화</th>
                        <td>
                             <div class="photoUpload">
                                <div class="photo">
                                     <span id=""></span>
                                 </div>
                                 <div class="cont clearfix">
                                      <p>cf. 1180 X 520 사이즈 업로드</p>
                                      <div class="fileinputs" >
                                        <input type="file" class="file" name=""/>
                                      </div>
                                      <div class="lst_Upload"></div>
                                  </div>
                            </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
              </div><!-- //lst_table3 -->
              </form>

          </section><!--// section_box -->

          <section class="section_box">
              <h1 class="title1">Genre Banner</h1>
              <div class="lst_table3">
                  <table summary="Selection">
                    <caption>Selection</caption>
                    <colgroup>
                      <col class="th1">
                      <col>
                    </colgroup>
                    <tbody>
                      <tr>
                        <th scope="row">회화</th>
                        <td>
                            <div class="photoUpload">
                                <div class="photo">
                                     <span id=""></span>
                                 </div>
                                  <div class="cont clearfix">
                                      <p>cf. 1180 X 520 사이즈 업로드</p>
                                      <div class="fileinputs" >
                                        <input type="file" class="file" name=""/>
                                      </div>
                                      <div class="lst_Upload">

                                      </div>
                                  </div>
                            </div>



                        </td>





                      </tr>

                      <tr>
                        <th scope="row">사진</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">디자인</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">판화</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">조각</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">영상</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">설치</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">기타</th>
                        <td>
                            위랑 폼 동일
                        </td>
                      </tr>


                    </tbody>
                  </table>
              </div><!-- //lst_table3 -->

          </section>


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