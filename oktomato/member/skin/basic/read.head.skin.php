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
		  <form name="joinFrm" method="post" action="/oktomato/member/?at=update" onsubmit="return false;">
		  <input type="hidden" name="mode" value="edit">
		  <input type="hidden" name="idx" value="<?php echo $Member->attr['user_idx'];?>">
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
                    <!-- label for="tit" class="pos">이메일</label -->
                    <input name="id" type="text" class="inp_txt lh w250" id="tit" value="<?php echo $Member->attr['user_id']; ?>"  readonly>
                  <!-- /span -->
                </td>
              </tr>
<?php 
if ($Member->attr['sns_join']=='facebook' || $Member->attr['sns_join']=='google' ){
?>
              <tr>
                <th scope="row">가입 경로(로그인 연동)</th>
                <td>
                  <?php echo $Member->attr['sns_join']; ?>
                </td>
              </tr>
<?
}else{
?>
              <tr>
                <th scope="row">비밀번호*</th>
                <td>
                  <span class="col_td auto margin_top1">
                    <label for="pwd" class="pos">비밀번호 입력</label>
                    <input name="pwd" type="password" class="inp_txt lh w250" id="tit" value="">  
                  </span>
                  <span class="align_right margin_top10">cf.비밀번호는 신규발급만 가능합니다.</span>
                </td>
              </tr>
<?
}
?>
              <tr>
                <th scope="row">뉴스레터 수신*</th>
                <td>
                    <div class="lst_check radio">
                      <span class="<?php if(!empty($newsletter_status)){ echo'on';} ?>" >
                        <label for="frame1">Y</label>
                        <input type="radio" name="newsletter" id="frame1" value="Y" <?php if(!empty($newsletter_status)){ echo 'checked';} ?> >
                      </span>
                      <span class="<?php if(empty($newsletter_status)){ echo'on';} ?>"">
                        <label for="frame2">N</label>
                        <input type="radio" name="newsletter" id="frame2"  value="N" <?php if(empty($newsletter_status)){ echo 'checked';} ?> >
                      </span>
                	</div>                 
                </td>
              </tr>
              <!-- tr>
                <th scope="row">SMS 수신*</th>
                <td>
                    <div class="lst_check radio">
                      <span class="on">
                        <label for="frame11">Y</label>
                        <input type="radio" name="frame" id="frame11" checked="">
                      </span>
                      <span>
                        <label for="frame12">N</label>
                        <input type="radio" name="frame" id="frame12">
                      </span>
                	</div> 
                </td>
              </tr -->
              <tr>
                <th scope="row">주문이력*</th>
                <td>
						<?php echo ($total_cnt > 0)? '있음': '없음' ; ?>
              </tr>
            </tbody>
			</form>
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
                <!-- th><button type="button" class="check_listbox all">All</button></th -->
                <th scope="row">주문일</th>
                <th scope="row">주문번호</th>
                <th scope="row">주문금액</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>