<?php
 $pageName = "List";
 $pageNum = "8";
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


      <!-- 검색섹션.시작 -->
      <section class="section_box">
        <h1 class="title1">Login Info</h1>
        <div class="lst_table3">
          <table summary="컨텐츠 상단 검색테이블">
            <caption>컨텐츠 상단 검색테이블</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">아이디(이메일)*</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="tit" class="pos">이메일</label>
                    <input name="tit" type="text" class="inp_txt lh w250" id="tit" value=""> 
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">비밀번호*</th>
                <td>
                  <span class="col_td auto margin_top1">
                    <label for="tit" class="pos">비밀번호 입력</label>
                    <input name="tit" type="text" class="inp_txt lh w250" id="tit" value=""> 
                  </span>
                  <span class="align_right margin_top10">cf.비밀번호는 신규발급만 가능합니다.</span>
				</td>
              </tr>
              <tr>
                <th scope="row">뉴스레터 수신*</th>
                <td>
					<div class="lst_check radio">
                      <span class="on">
                        <label for="frame1">Y</label>
                        <input type="radio" name="frame" id="frame1" checked="">
                      </span>
                      <span>
                        <label for="frame2">N</label>
                        <input type="radio" name="frame" id="frame2">
                      </span>
                	</div>                 
                </td>
              </tr>
              <tr>
                <th scope="row">SMS 수신*</th>
                <td>
					<div class="lst_check radio">
                      <span class="on">
                        <label for="frame1">Y</label>
                        <input type="radio" name="frame" id="frame1" checked="">
                      </span>
                      <span>
                        <label for="frame2">N</label>
                        <input type="radio" name="frame" id="frame2">
                      </span>
                	</div> 
                </td>
              </tr>
              <tr>
                <th scope="row">주문이력*</th>
                <td>
						있음
              </tr>
            </tbody>
          </table>
        </div> <!-- //lst_table3 -->

      </section> <!-- 검색섹션.끝 -->
      

      <section class="section_box">
        <h1 class="title1">Order Info</h1>

        <!-- 검색결과리스트_게시판_시작 -->
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>검색결과리스트_테이블</caption>
            <colgroup>
              <col class="chkbox" style="width:10%">
              <col class="no_1" style="width:10%">
              <col style="width:20%">
              <col class="data" style="width:10%">
              <col class="control1" style="width:20%">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button class="check_listbox all">All</button></th>
                <th scope="row">주문일</th>
                <th scope="row">주문번호</th>
                <th scope="row">주문금액</th>
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
                <td>2014.07.24</td>
                <td>3434EGFIUH344</td>
               	<td>2,300,000원</td>
                <td>
                  <div class="user_td_control1">
					<button onClick="location.href='#'">상세</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01021</label>
                    <input type="checkbox" id="b01021" name="" value=""></span>
                  </td>
                <td>2014.07.24</td>
                <td>SADEGFIUH344</td>
                <td>3,200,000원</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='#'">상세</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div> <!-- 검색결과리스트_게시판_끝 -->

        <!-- 검색결과리스트_페이징처리_시작 -->
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
          </div> <!-- 검색결과리스트_페이징처리_끝 -->

          <div class="btn_right">
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button>
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button>
            <div class="space5"></div>

            <button onClick="alert('준비중입니다.');" class="btn_pack1_b_type ov-b small rato">Send E-mail</button>
          </div>
          
          <div class="space100"></div>


        </div>  
      </section> <!-- //lst_table2 -->
      
      
     </article> <!-- content -->
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>

