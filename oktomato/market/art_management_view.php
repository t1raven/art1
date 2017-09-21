<?php
 $pageName = "View";
 $pageNum = "3";
 $subNum = "6";
 $thirdNum = "0";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<? include "../inc/side.php"; ?>
<section id="container">
   <div class="container_inner">
      <? include "../inc/path.php"; ?>
      <? include "../inc/datepicker_setting.php"; ?>
    <article class="content">
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
                           <input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > 
                           <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">작품명 *</th>
                        <td>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="작품명 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">제작년도 *</th>
                        <td>
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">사이즈 *</th>
                        <td>
                           <span class="col_td auto">
                           <label for="size1" class="pos">가로</label>
                           <input name="" type="text" class="inp_txt lh w110" id="size1" value=""> 
                           </span>
                           X
                           <span class="col_td auto">
                           <label for="size2" class="pos">세로</label>
                           <input name="" type="text" class="inp_txt lh w110" id="size2" value=""> 
                           </span>
						   X
						   <span class="col_td auto">
                           <label for="size3" class="pos">높이</label>
                           <input name="" type="text" class="inp_txt lh w110" id="size3" value=""> 
                           </span>
                           <span class="ml15">cf. 센티미티 단위 입력(소수점 한자리 허용) </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">가격 *</th>
                        <td>
                           <input name="" type="text" class="inp_txt w110" id="" value=""> 
                           <span class="ml15">cf. 원 단위 입력</span>
                        </td>
                     </tr>
					  <tr>
                        <th scope="row">재고수량 *</th>
                        <td>
                           <input name="" type="text" class="inp_txt w110" id="" value="34" readonly> 
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
                     <!-- <tr>
                        <th scope="row">View in Room</th>
                        
                        <td>
                        
                          <div class="lst_check radio">
                        
                            <span>
                        
                              <label for="viewinroom1">오피스</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom1" checked>
                        
                            </span>
                        
                            <span>
                        
                              <label for="viewinroom2">갤러리</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom2" >
                        
                            </span>
                        
                            <span>
                        
                              <label for="viewinroom3">홈</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom3" >
                        
                            </span>
                        
                          </div>
                        
                        </td>
                        
                        </tr> -->
                     <tr>
                        <th scope="row">작품설명</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">재료 *</th>
                        <td>
                           <input name="" type="text" class="inp_txt w390" id="" value=""> 
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
                        <td>가로사이즈 1920px까지 가능. Jpg만 허용. 각 슬롯 파일 크기는 1MB 제한. <br>썸네일은 258px X 299px 사이즈로 업로드.</td>
                     </tr>
                     <tr>
                        <th scope="row">List Image *</th>
                        <td>
                           <div class="clearfix">
							<div class="fileinputs" >
							  <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
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
                     <tr>
                        <th scope="row">Slot 1 *</th>
                        <td>
                            <div class="clearfix">
							<div class="fileinputs" >
							  <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
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
                     <tr>
                        <th scope="row">Slot 2</th>
                        <td>
                            <div class="clearfix">
							<div class="fileinputs" >
							  <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
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
                     <tr>
                        <th scope="row">Slot 3</th>
                        <td>
                            <div class="clearfix">
							<div class="fileinputs" >
							  <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
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
                     
                  </tbody>
               </table>
               <div class="bot_align">
                  <div class="btn_right">
                     <button onclick="alert('준비중입니다.');" class="btn_pack1 gray ov-b small rato">List</button>
                     <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
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
<section id="mainInfoPopup" class="layer_popup1">
   <header class="searchBox">
      <input name="" type="text" class="inp_txt w190 searchPopup" id="" value="" > 
      <button class="searchPopup"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" alt="검색"></button>
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
      <h1>검색결과</h1>
      <div class="scrollBox1">
         <ul>
            <li><button>서길동(1953) 서울대학교</button></li>
            <li class="rgh"><button>김길동(1988) 첼시 예술대학</button></li>
            <li><button>서길동(1953) 서울대학교</button></li>
            <li class="rgh"><button>박길동(1982) 서울대학교</button></li>
            <li><button>박길동(1943) 홍익대학교</button></li>
            <li class="rgh"><button>이길동(1984) 홍익대학교</button></li>
         </ul>
      </div>
      <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u">작가등록</span>을 진행해 주십시오.</p>
   </article>
</section>
<section id="RecommendedListPopup" class="layer_popup1">
   <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   <article class="cont">
      <h1>검색결과</h1>
      <div class="scrollBox2">
         <ul>
            <li><button>김순응 대표</button></li>
            <li><button>전준호 작가</button></li>
            <li><button>홍길동 대표</button></li>
            <li><button>박홍길 작기</button></li>
         </ul>
      </div>
      <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u">작가등록</span>을 진행해 주십시오.</p>
   </article>
</section>
</section> 
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
   
   
   
     // and / or 스위치 함수
   
      $("button.btn_switch").click(function(){
   
          var text = $(this).text();
   
          $(this).text((text == "AND") ? "OR":"AND");
   
          //$("#anor").val($(this).text());
   
      });
   
      
   
      LabelHidden(".inp_txt.lh");
   
      bbsCheckbox();
   
      checkListMotion();
   
      initFileUploads();
   
      btnHover(".btnOvr");
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>