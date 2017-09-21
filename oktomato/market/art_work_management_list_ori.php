<?php
 $pageName = "Order Detail";
 $pageNum = "3";
 $subNum = "10";
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
        <h1 class="title1">Order Detail</h1>
        <div class="lst_table3">
          <table summary="주문관리">
            <caption>주문관리</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">주문일</th>
                <td>2014.11.12 [12:23]</td>
              </tr>
               <tr>
                 <th scope="row">주문번호</th>
                 <td >3434DC5DFdf</td>
               </tr>
               <tr>
                 <th scope="row">배송주소</th>
                 <td >서울시 양천구 오목로 180 2층</td>
               </tr>
               <tr>
                <th scope="row">배송출발일</th>
                <td >
                  <span class="datapiker">
                    <input name="ed" type="text" class="inp_txt date" id="ed" value="">
                  </span>                </td>
              </tr>
              <tr>
                <th scope="row">배송도착일</th>
                <td>
                  <span class="datapiker">
                    <input name="ed" type="text" class="inp_txt date" id="ed2" value="">
                  </span>                </td>
              </tr>
              <tr>
                <th scope="row">구매품목</th>
                <td>
                <div class="img_thumbnail_layout">
                	<img src="/oktomato/images/sample/sample1.jpg" width="200" alt="샘플이미지" />
	                <br>
                    <h3>김준기</h3>
                    <h1>타자打字의 초상</h1>
                    <h2>2,300,000원</h2>
                </div>

                <div class="img_thumbnail_layout">
                	<img src="/oktomato/images/sample/sample1.jpg" width="200" alt="샘플이미지" />
	                <br>
                    <h3>김준기</h3>
                    <h1>타자打字의 초상</h1>
                    <h2>2,300,000원</h2>
                </div>
                
                <div class="img_thumbnail_total_price">
                    <h1>구매합계 : 4,600,000원</h1>
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