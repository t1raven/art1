<?php
 $pageName = "View";
 $pageNum = "3";
 $subNum = "9";
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
        <h1 class="title1">Registration No.341124</h1>
        <div class="lst_table3">
          <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
            <caption>작가 등록</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">이름</th>
                <td>홍길동</td>
              </tr>
               <tr>
                 <th scope="row">기관명</th>
                 <td >오케이토마토</td>
               </tr>
               <tr>
                 <th scope="row">공간대상</th>
                 <td >사무실 / 약 100평 정도되는 공간에 전시하고자 합니다.</td>
               </tr>
               <tr>
                <th scope="row">등록일</th>
                <td >2014.11.12 [12:23]</td>
              </tr>
              <tr>
                <th scope="row">요청작품명</th>
                <td ><span class="font_blue_color">Hong's Art</span> (이진아)<br>
                </td>
              </tr>
              <tr>
                <th scope="row">답변 요청방법</th>
                <td >전화답변</td>
              </tr>
              <tr>
                <th scope="row">전화번호</th>
                <td >010-1234-5678</td>
              </tr>
              <tr>
                <th scope="row">이메일</th>
                <td >master@oktomato.net</td>
              </tr>
              <tr>
                <th scope="row">상담내용</th>
                <td > 견적이 필요합니다. 시간되시면 전화부탁드려요.</td>
              </tr>
              <tr>
                <th scope="row">답변입력</th>
                <td >
					<div class="textarea">
                      <textarea name=""></textarea>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row">상태</th>
                <td >
					<div class="lst_check radio">
                      <span class="on">
                        <label for="frame1">답변요청</label>
                        <input type="radio" name="frame" id="frame1" checked="">
                      </span>
                      <span>
                        <label for="frame2">답변완료</label>
                        <input type="radio" name="frame" id="frame2">
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
        </div><!-- //lst_table3 -->
      </section>
      <!-- //lst_table2 -->
     </article>
  </div>
 </section>

 <!-- //container -->

<? include "../inc/bot.php"; ?>