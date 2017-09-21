<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');

$pageName = 'MAIN';
$pageNum = '0';
$subNum = '0';
$thirdNum = '0';

include(ROOT.'oktomato/inc/link.php');
include(ROOT.'oktomato/inc/top.php');
include(ROOT.'oktomato/inc/header.php');
include(ROOT.'oktomato/inc/side.php');
?>
 <section id="container">
  <div class="container_inner">
    <?php include(ROOT.'oktomato/inc/path.php'); ?>
    <?php include(ROOT.'oktomato/inc/datepicker_setting.php'); ?>
     <article class="content">
      <!-- 검색섹션.시작 -->
     <section class="section_box">
        <h1 class="title1">art1 statistics</h1>
		<!-- div class="graphBox" style="height:200px;text-align:center">그래프가 들어가는 영역입니다. -->
		<div class="graphBox" style="width:1051px, height:200px;text-align:center">
		<section>
			<img src="/oktomato/images/sample/img_graph01.jpg"  style="max-width: 100%; width: inherit; height: auto;">
		</section>
		<section>
			<img src="/oktomato/images/sample/img_graph01.jpg"  style="max-width: 100%; width: inherit; height: auto;">
		</section>
			<div class="lst_table2 t-c">
			  <table summary="">
				<caption></caption>
				<colgroup>
				  <!-- <col class="chkbox"> -->
				  <col class="no_1">
				  <col>
				  <col>
				  <col>
				  <col>
				</colgroup>
				<thead>
				  <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
					<!-- <th><button class="check_listbox all">All</button></th> -->
					<th scope="row"></th>
					<th scope="row">신규회원</th>
					<th scope="row">사용자</th>
					<th scope="row">페이지뷰</th>
					<th scope="row">매출</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>2014.12.23</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				 <tr>
					<td>2014.12.24</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				  <tr>
					<td>2014.12.25</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				  <tr>
					<td>2014.12.26</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				  <tr>
					<td>2014.12.27</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				  <tr>
					<td>2014.12.28</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>
				  <tr>
					<td>2014.12.29</td>
					<td >4</td>
					<td>12</td>
					<td>23</td>
					<td>300</td>
				  </tr>

				</tbody>
			  </table>
			</div>
		</div>
      </section>

      <section class="section_box">
        <h1 class="title1">답변필요문의</h1>
      <!--   <section class="bbsTop">
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
        </section> //bbsTop -->
        <div class="lst_table2 t-c">
          <table summary="">
            <caption></caption>
            <colgroup>
              <!-- <col class="chkbox"> -->
              <col class="no_1">
              <col>
              <col>
			  <col>
              <col>
              <col class="data">
              <col class="control1">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <!-- <th><button class="check_listbox all">All</button></th> -->
                <th scope="row">No</th>
                <th scope="row">이름</th>
                <th scope="row">요청작품명</th>
                <th scope="row">문의유형</th>
                <th scope="row">등록일</th>
				<th scope="row">상태</th>
				<th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               <!--  <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td> -->
                <td>A292345</td>
                <td class="name">홍길동</td>
               	<td>정녕의 숲</td>
				<td>상담</td>
                <td class="fc1">2014.07.24</td>
				<td><span class="fc_red">답변요망</span></td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
              <tr>
               <!--  <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td> -->
                <td>A292345</td>
                <td class="name">홍길동</td>
               	<td>정녕의 숲</td>
				<td>상담</td>
                <td class="fc1">2014.07.24</td>
				<td><span class="fc_blue">답변완료</span></td>
                <td>
                  <div class="user_td_control1">
                    <button onClick="location.href='artist_management_view.php'">수정</button>
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
         <!--  <div class="btn_right">
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button>
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button>
          </div> -->
        </div>
      </section> <!-- //lst_table2 -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<?php
include(ROOT.'oktomato/inc/bot.php');