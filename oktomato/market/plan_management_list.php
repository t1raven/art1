<?php
 $pageName = "List";
 $pageNum = "3";
 $subNum = "5";
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
        </section> <!-- //bbsTop -->
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>학술대회 관리</caption>
            <colgroup>
              <col class="chkbox">
              <col class="no_1">
              <col>
              <col>
              <col class="data">
              <col class="control1">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">제목</th>
                <th scope="row">상태</th>
                <th scope="row">등록일</th>
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
                <td>A292345</td>
                <td><a href="plan_management_view.php">크리스마스 특집</a></td>
               	<td class="fc_blue">노출</td>
                <td class="fc1">2014.07.24</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='plan_management_view.php'">수정</button>
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
                <td>A292345</td>
                <td><a href="plan_management_view.php">크리스마스 특집</a></td>
               	<td class="fc_red">비노출</td>
                <td class="fc1">2014.07.24</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='plan_management_view.php'">수정</button>
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
      </section> <!-- //lst_table2 -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>