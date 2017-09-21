<?php
 $pageName = "List";
 $pageNum = "2";
 $subNum = "8";
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
        <h1 class="title1">Search Option</h1>
        <div class="lst_table3">
          <table summary="컨텐츠 상단 검색테이블">
            <caption>컨텐츠 상단 검색테이블</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색어</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="tit" class="pos">이름</label>
                    <input name="tit" type="text" class="inp_txt lh w90" id="tit" value=""> 
                  </span>
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
                    <span class="searchtag">정녕의 숲2<button>삭제</button></span>
                    <span class="searchtag">정녕의 숲2<button>삭제</button></span>
                    <button class="reset">검색 초기화</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div> <!-- //lst_table3 -->
        <div class="btn_cen cen">
          <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Search</button>
        </div>
      </section> <!-- 검색섹션.끝 -->
      

      
      <section class="section_box">
        <h1 class="title1">Search Result</h1>

        <!-- 검색결과리스트_상단레이아웃_시작 -->
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
        </section> <!-- 검색결과리스트_상단레이아웃_끝 -->
        
        <!-- 검색결과리스트_게시판_시작 -->
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>검색결과리스트_테이블</caption>
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
                <th scope="row">요청 작품명</th>
                <th scope="row">등록일(En)</th>
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
                <td>A292345</td>
                <td class="name">정녕의 숲</td>
               	<td>2014.07.24</td>
                <td class="fc1">답변대기</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01021</label>
                    <input type="checkbox" id="b01021" name="" value=""></span>
                  </td>
                <td>A292345</td>
                <td class="name">정녕의 숲2</td>
                <td>2014.07.24</td>
                <td class="fc1">답변대기</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01022</label>
                    <input type="checkbox" id="b01022" name="" value=""></span>
                  </td>
                <td>A292345</td>
                <td class="name">정녕의 숲2</td>
                <td>2014.07.24</td>
                <td class="fc1">답변대기</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01023</label>
                    <input type="checkbox" id="b01023" name="" value=""></span>
                  </td>
                <td>A292345</td>
                <td class="name">정녕의 숲2</td>
                <td>2014.07.24</td>
                <td class="fc1 fc_red">답변완료</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01024</label>
                    <input type="checkbox" id="b01024" name="" value=""></span>
                  </td>
                <td>A292345</td>
                <td class="name">정녕의 숲2</td>
               <td>2014.07.24</td>
                <td class="fc1">답변대기</td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
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
          </div>
        </div>  
      </section> <!-- //lst_table2 -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<script type="text/javascript">
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