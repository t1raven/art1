<?php
   $pageName = "List";
   $pageNum = "5";
   $subNum = "1";
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
            <h1 class="title1">Search Option</h1>
            <div class="lst_table3">
               <table summary="작품 검색">
                  <caption>작품 검색</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">검색</th>
                        <td class="colbox">
                           <span class="col_td auto">
                           <label for="tit" class="pos">신청자명</label>
                           <input name="tit" type="text" class="inp_txt lh w90" id="tit" value=""> 
                           <button type="button" class="btn_switch">AND</button>
                           </span>
                           <!--  <span class="col_td auto">
                              <label for="mn" class="pos">작가명</label>
                              
                              <input name="mn" type="text" class="inp_txt lh w90" id="mn" value=""> 
                              
                              </span> -->
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">등록일</th>
                        <td>
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span> <span> ~ </span>
                           <span class="datapiker">
                           <input name="ed" type="text" class="inp_txt date" id="ed" value="">
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">상태</th>
                        <td>
                           <div class="lst_check radio">
                              <span><label for="all">전체</label><input type="radio" name="all" id="all" checked></span>
                              <span><label for="ack">승인</label><input type="radio" name="ack" id="ack" ></span>
                              <span><label for="refusal">거절</label><input type="radio" name="refusal" id="refusal" ></span>
                              <span><label for="atmo">대기</label><input type="radio" name="atmo" id="atmo" ></span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">초기화</th>
                        <td>
                           <div class="resetBox">
                              <span class="searchtag">홍길동<button>삭제</button></span>
                              <span class="searchtag">홍길동<button>삭제</button></span>
                              <button class="reset">검색 초기화</button>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table2 -->
            <div class="btn_cen cen">
               <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b  small rato">Search</button>
            </div>
         </section>
         <section class="section_box">
            <h1 class="title1">Search Result</h1>
            <section class="bbsTop">
               <p class="result">
                  <strong>Result : </strong>
                  <span class="fc_red">31 / 773</span>
               </p>
               <div class="group_rgh">
                  <p class="sort">
                     <strong><img src="<?=$currentFolder?>/images/bg/bg_list2_off.jpg" alt="정렬"></strong>
                     <button class="on">가나다순</button> / <button>등록일순</button>
                  </p>
                  <p class="align">
                     <strong><img src="<?=$currentFolder?>/images/bg/bg_list.gif" alt="정렬"> </strong>
                     <button type="button" class="on" onClick="">10</button> / 
                     <button type="button" onClick="">15</button> / 
                     <button type="button" onClick="">20</button> / 
                     <button type="button" onClick="">25</button> / 
                     <button type="button" onClick="">30</button>
                  </p>
               </div>
            </section>
            <!-- //bbsTop -->
            <div class="lst_table2 t-c">
               <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
                  <caption>학술대회 관리</caption>
                  <colgroup>
                     <col>
                     <col>
                     <col>
                     <col>
                     <col>
                     <col>
                     <col>
                     <col>
                  </colgroup>
                  <thead>
                     <tr>
                        <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                        <th><button class="check_listbox all">All</button></th>
                        <th scope="row">No</th>
                        <th scope="row">배너</th>
                        <th scope="row">링크</th>
                        <th scope="row">신청자명</th>
                        <th scope="row">연락처</th>
                        <th scope="row">신청일</th>
                        <th scope="row">상태</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>4</td>
                        <td><a href="#" class="fc_blue td_u">Preview</a></td>
                        <td><a href="" class="fc_blue td_u">Link</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">01112341234</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="layerPopup"><a href="#RecommendedListPopup" class="layerOpen fc_red td_u">대기</a></td>
                     </tr>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>3</td>
                        <td><a href="" class="fc_blue td_u">Preview</a></td>
                        <td><a href="" class="fc_blue td_u">Link</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">01112341234</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="layerPopup"><a href="#RecommendedListPopup" class="layerOpen fc_gray td_u">거절</a></td>
                     </tr>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>2</td>
                        <td><a href="" class="fc_blue td_u">Preview</a></td>
                        <td><a href="" class="fc_blue td_u">Link</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">01112341234</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="layerPopup"><a href="#RecommendedListPopup" class="layerOpen fc_blue td_u">승인</a></td>
                     </tr>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>1</td>
                        <td><a href="" class="fc_blue td_u">Preview</a></td>
                        <td><a href="" class="fc_blue td_u">Link</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">01112341234</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="layerPopup"><a href="#RecommendedListPopup" class="layerOpen fc_blue td_u">승인</a></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="bot_align">
               <div class="paginate">
                  <a href="#" class="btn prev" onClick="">처음</a>
                  <a href="#" class="btn prev2" onClick="">이전10페이지</a>
                  <a href="#" class="num on" onClick="">1</a>
                  <a href="#" class="num" onClick="">2</a>
                  <a href="#" class="num" onClick="">3</a>
                  <a href="#" class="num" onClick="">4</a>
                  <a href="#" class="num" onClick="">5</a>
                  <a href="#" class="num" onClick="">6</a>
                  <a href="#" class="num" onClick="">7</a>
                  <a href="#" class="num" onClick="">8</a>
                  <a href="#" class="num" onClick="">9</a>
                  <a href="#" class="num" onClick="">10</a>
                  <a href="#" class="btn next2" onClick="">다음10페이지</a>
                  <a href="#" class="btn next" onClick="">끝</a>
               </div>
               <div class="btn_right">
                  <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button>
                  <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button>
               </div>
            </div>
         </section>
         <!-- //lst_table2 -->
      </article>
   </div>
   <!-- //container_inner -->
</section>
<!-- //container -->
<section id="RecommendedListPopup" class="layer_popup1 trea">
   <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   <article class="cont">
      <h1>처리</h1>
      <div class="scrollBox2 trea">
         <ul>
            <li><button>거절</button></li>
            <li><button>승인</button></li>
            <li><button>대기</button></li>
            <li><button>삭제</button></li>
         </ul>
      </div>
      <!-- <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u">작가등록</span>을 진행해 주십시오.</p> -->
   </article>
</section>
<script>
   $(function(){
   
   
   
    //레이어 팝업
   
     $(".layerOpen").click(function(){
   
          $(".layer_popup1").css("display","none");
   
          var id = $(this).attr("href");
   
          var x = $(this).offset().left-170;
   
          var y = $(this).offset().top-100;
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