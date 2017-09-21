<?php
   $pageName = "List";
   $pageNum = "3";
   $subNum = "2";
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
                              <span>
                              <label for="tMedium1">Design</label>
                              <input type="radio" name="tMedium" id="tMedium1" checked>
                              </span>
                              <span>
                              <label for="tMedium2">Drawing</label>
                              <input type="radio" name="tMedium" id="tMedium2">
                              </span>
                              <span>
                              <label for="tMedium3">Painting</label>
                              <input type="radio" name="tMedium" id="tMedium3">
                              </span>
                              <span>
                              <label for="tMedium4">Film Viedo</label>
                              <input type="radio" name="tMedium" id="tMedium4">
                              </span>
                              <span>
                              <label for="tMedium5">Installation</label>
                              <input type="radio" name="tMedium" id="tMedium5">
                              </span>
                              <span>
                              <label for="tMedium6">Sculpture</label>
                              <input type="radio" name="tMedium" id="tMedium6">
                              </span>
                              <span>
                              <label for="tMedium7">Print</label>
                              <input type="radio" name="tMedium" id="tMedium7">
                              </span>
                              <span>
                              <label for="tMedium8">Photography</label>
                              <input type="radio" name="tMedium" id="tMedium8">
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Subject  *</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="aSubject1">Poitical</label>
                              <input type="radio" name="aSubject" id="aSubject1" checked >
                              </span>
                              <span>
                              <label for="aSubject2">Landscape</label>
                              <input type="radio" name="aSubject" id="aSubject2" >
                              </span>
                              <span>
                              <label for="aSubject3">Humor</label>
                              <input type="radio" name="aSubject" id="aSubject3" >
                              </span>
                              <span>
                              <label for="aSubject4">Science</label>
                              <input type="radio" name="aSubject" id="aSubject4" >
                              </span>
                              <span>
                              <label for="aSubject5">Fashion</label>
                              <input type="radio" name="aSubject" id="aSubject5" >
                              </span>
                              <span>
                              <label for="aSubject6">Cityscape</label>
                              <input type="radio" name="aSubject" id="aSubject6" >
                              </span>
                              <span>
                              <label for="aSubject7">Still life</label>
                              <input type="radio" name="aSubject" id="aSubject7" >
                              </span>
                              <span>
                              <label for="aSubject8">Portrait</label>
                              <input type="radio" name="aSubject" id="aSubject8" >
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Size  *</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="aSize1">S(~50)</label>
                              <input type="radio" name="aSize" id="aSize1" checked>
                              </span>
                              <span>
                              <label for="aSize2">M(~100)</label>
                              <input type="radio" name="aSize" id="aSize2" >
                              </span>
                              <span>
                              <label for="aSize3">L(~100)</label>
                              <input type="radio" name="aSize" id="aSize3" >
                              </span>
                              <span>
                              <label for="aSize4">ETC.</label>
                              <input type="radio" name="aSize" id="aSize4" >
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Color  *</th>
                        <td>
                           <div class="lst_check radio colorBar">
                              <span class="aColor1">
                              <label for="aColor1">빨강색</label>
                              <input type="radio" name="aColor" id="aColor1" checked>
                              </span>
                              <span class="aColor2">
                              <label for="aColor2">오렌지색</label>
                              <input type="radio" name="aColor" id="aColor2">
                              </span>
                              <span class="aColor3">
                              <label for="aColor3">갈색</label>
                              <input type="radio" name="aColor" id="aColor3">
                              </span>
                              <span class="aColor4">
                              <label for="aColor4">노랑색</label>
                              <input type="radio" name="aColor" id="aColor4">
                              </span>
                              <span class="aColor5">
                              <label for="aColor5">녹색</label>
                              <input type="radio" name="aColor" id="aColor5">
                              </span>
                              <span class="aColor6">
                              <label for="aColor6">하늘색</label>
                              <input type="radio" name="aColor" id="aColor6">
                              </span>
                              <span class="aColor7">
                              <label for="aColor7">파란색</label>
                              <input type="radio" name="aColor" id="aColor7">
                              </span>
                              <span class="aColor8">
                              <label for="aColor8">보라색</label>
                              <input type="radio" name="aColor" id="aColor8">
                              </span>
                              <span class="aColor9">
                              <label for="aColor9">핑크색</label>
                              <input type="radio" name="aColor" id="aColor9">
                              </span>
                              <span class="aColor10">
                              <label for="aColor10">하얀색</label>
                              <input type="radio" name="aColor" id="aColor10">
                              </span>
                              <span class="aColor11">
                              <label for="aColor11">회색</label>
                              <input type="radio" name="aColor" id="aColor11">
                              </span>
                              <span class="aColor12">
                              <label for="aColor12">검정색</label>
                              <input type="radio" name="aColor" id="aColor12">
                              </span>
                              <span class="aColor13">
                              <label for="aColor13">그라1</label>
                              <input type="radio" name="aColor" id="aColor13">
                              </span>
                              <span class="aColor14">
                              <label for="aColor14">그라2</label>
                              <input type="radio" name="aColor" id="aColor14">
                              </span>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
         </section>
         <!--// section_box -->
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
                        <th scope="row">제작방식 *</th>
                        <td>
                           <span class="col_td auto">
                           <label for="oiloncanvas" class="pos">Oil on canvas</label>
                           <input name="" type="text" class="inp_txt lh w390" id="oiloncanvas" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">프레임 *</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="frame1">Framed</label>
                              <input type="radio" name="frame" id="frame1" checked>
                              </span>
                              <span>
                              <label for="frame2">Non-framed</label>
                              <input type="radio" name="frame" id="frame2" >
                              </span>
                           </div>
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
                        <th scope="row">렌탈가능 *</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="WhetherRentals1">Yes</label>
                              <input type="radio" name="WhetherRentals" id="WhetherRentals1" checked>
                              </span>
                              <span>
                              <label for="WhetherRentals2">No</label>
                              <input type="radio" name="WhetherRentals" id="WhetherRentals2" >
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">추천관리</th>
                        <td>
                           <input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > 
                           <a href="#RecommendedListPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" alt="검색" class="btnOvr"></a>
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
                     <tr>
                        <th scope="row">전시/ 출품내역  *</th>
                        <td>
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <span class="col_td auto">
                           <label for="oiloncanvas2" class="pos">Oil on canvas</label>
                           <input name="" type="text" class="inp_txt lh w250" id="oiloncanvas2" value=""> 
                           </span>
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
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 1 *</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 2</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 3</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 4</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 5</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 6</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 7</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 8</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 9</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">Slot 10</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <input type="file" class="file" />
                              </div>
                              <div class="lst_Upload">
                                 <span class="tag">홍길동.jpg <button>삭제</button></span>
                              </div>
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