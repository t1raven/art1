<?php
   $pageName = "List";
   $pageNum = "2";
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
                        <th scope="row">카테고리</th>
                        <td>
                           <div class="lst_check radio">
                              <span><label for="all">All</label><input type="radio" name="all" id="all" checked></span>
                              <span><label for="bri">In Brief</label><input type="radio" name="bri" id="bri" ></span>
                              <span><label for="trend">Trend</label><input type="radio" name="trend" id="trend" ></span>
                              <span><label for="people">Peple</label><input type="radio" name="people" id="people" ></span>
                              <span><label for="world">World</label><input type="radio" name="world" id="world" ></span>
                              <span><label for="trouble">Trouble</label><input type="radio" name="trouble" id="trouble" ></span>
                              <span><label for="epi">Episode</label><input type="radio" name="epi" id="epi" ></span><br />
                              <span class="news_cate_m"><label for="notice">공지</label><input type="radio" name="notice" id="notice" ></span>
                              <span><label for="fes">학술행사</label><input type="radio" name="fes" id="fes" ></span>
                              <span><label for="course">강좌</label><input type="radio" name="course" id="course" ></span>
                              <span><label for="col">공모</label><input type="radio" name="col" id="col" ></span>
                              <span><label for="recu">구인구직</label><input type="radio" name="recu" id="recu" ></span>
                              <span><label for="show">전시소식</label><input type="radio" name="show" id="show" ></span>
                              <span><label for="book">도서</label><input type="radio" name="book" id="book" ></span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">노출여부</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="exp">노출</label>
                              <input type="radio" name="exp" id="exp" checked>
                              </span>
                              <span>
                              <label for="exp_n">비노출</label>
                              <input type="radio" name="exp_n" id="exp_n">
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">검색어</th>
                        <td class="colbox">
                           <span class="col_td auto">
                           <label for="tit" class="pos">타이틀</label>
                           <input name="tit" type="text" class="inp_txt lh w90" id="tit" value=""> 
                           <button type="button" class="btn_switch">AND</button>
                           </span>
                           <span class="col_td auto">
                           <label for="writer" class="pos">기자명</label>
                           <input name="writer" type="text" class="inp_txt lh w90" id="writer" value=""> 
                           </span>
                           <!--   <span class="col_td auto">
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
                        <th scope="row">카테고리</th>
                        <th scope="row">제목</th>
                        <th scope="row">기자명</th>
                        <th scope="row">등록일</th>
                        <th scope="row">상태</th>
                        <th scope="row">관리</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>2</td>
                        <td>In brief</td>
                        <td><a href="news_view.php">네고 가능한가요?</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="fc_red">비노출</td>
                        <td>
                           <div class="user_td_control1">
                              <button onClick="location.href='news_view.php'">수정</button>
                              <button>삭제</button>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <span class="check_listbox box">
                           <label for="pt">b01020</label>
                           <input type="checkbox" id="b01020" name="" value=""></span>
                        </td>
                        <td>1</td>
                        <td>Trend</td>
                        <td><a href="news_view.php">작품 문의</a></td>
                        <td class="name">홍길동</td>
                        <td class="fc1">2014.07.24</td>
                        <td class="fc_blue">노출</td>
                        <td>
                           <div class="user_td_control1">
                              <button onClick="location.href='news_view.php'">수정</button>
                              <button>삭제</button>
                           </div>
                        </td>
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
<script>
   $(function(){
   
     // and / or 스위치 함수
   
      $("button.btn_switch").click(function(){
   
          var text = $(this).text();
   
          $(this).text((text == "AND") ? "OR":"AND");
   
          //$("#anor").val($(this).text());
   
      });
   
      LabelHidden(".inp_txt.lh");
   
      bbsCheckbox();
   
      checkListMotion();
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>