<?php
   $pageName = "List";
   $pageNum = "3";
   $subNum = "7";
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
         <h1 class="title1">Q&A Detail</h1>
         <div class="lst_table3">
            <table summary="Main Info.">
               <caption>Main Info.</caption>
               <colgroup>
                  <col class="th1">
                  <col>
                  <col class="th1">
                  <col>
               </colgroup>
               <tbody>
                  <tr>
                     <th scope="row">제목</th>
                     <td class="layerPopup">
                        작품 문의 드립니다.
                     </td>
                     <th scope="row">문의유형</th>
                     <td class="layerPopup">
                        비밀글
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">이름</th>
                     <td colspan="3">
                        홍길동
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">등록일</th>
                     <td colspan="3">
                        2014.11.11 12:23
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">요청작품명</th>
                     <td ><span class="font_blue_color">Hong's Art</span> (이진아)<br>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">답변 요청 방법</th>
                     <td colspan="3">
                        전화답변
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">전화번호</th>
                     <td colspan="3">
                        01012341111
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">이메일</th>
                     <td colspan="3">
                        fefjaooase@naver.com
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">내용</th>
                     <td colspan="3">
                        사이즈가 23X43인데 Blah~ Blah~
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">답변인력</th>
                     <td colspan="3">
                        <div class="textarea">
                           <textarea name=""></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope="row">상태</th>
                     <td colspan="3">
                        <div class="lst_check radio">
                           <span>
                           <label for="qna_q">답변요청</label>
                           <input type="radio" name="qna_q" id="qna_q" >
                           </span>
                           <span>
                           <label for="qna_a">답변완료</label>
                           <input type="radio" name="qna_a" id="qna_a" checked>
                           </span>
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
            <!-- //lst_table3 -->
      </section>
      <!--// section_box -->
   </article>
   </div>
</section>
<!-- //container -->
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