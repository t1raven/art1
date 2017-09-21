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

      <!-- 검색섹션.시작 -->
	  <form name="searchFrm" method="get">
      <input type="hidden" name="at" value="<?php echo $at;?>">
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
                    <label for="tit" class="pos">신청자명</label>
                    <input name="word" type="text" class="inp_txt lh w90" id="word" value="<?php echo $word;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">상태</th>
                <td>
					<!-- div class="lst_check radio" -->
                      <span>
                        <label for="frame1">전체</label>
                        <input type="radio" name="cfm" id="frame1" value="" <?php if($cfm==''){ echo 'checked=\'\'';} ?>>
                      </span>
                      <span>
                        <label for="frame2">승인</label>
                        <input type="radio" name="cfm" id="frame2" value="Y" <?php if($cfm=='Y'){ echo 'checked=\'\'';} ?>>
                      </span>
                      <span>
                        <label for="frame3">대기</label>
                        <input type="radio" name="cfm" id="frame3" value="W" <?php if($cfm=='W'){ echo 'checked=\'\'';} ?>>
                      </span>
                      <span>
                        <label for="frame3">거절</label>
                        <input type="radio" name="cfm" id="frame3" value="N" <?php if($cfm=='N'){ echo 'checked=\'\'';} ?>>
                      </span>
                    <!-- /div -->          
                </td>
              </tr>
              <tr>
                <th scope="row">신청일</th>
                <td>
                  <span class="datapiker">
                    <input name="bdate" type="text" class="inp_txt date" id="bdate" value="<?php echo $bdate;?>">
                  </span> <span> ~ </span>
                  <span class="datapiker">
                    <input name="edate" type="text" class="inp_txt date" id="edate" value="<?php echo $edate;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($word)):?><span class="searchtag" id="span-word"><?php echo $word;?><button type="button" onclick="deleteKeyword('word');">삭제</button></span><?php endif;?>
                    <?php if (!empty($bdate) && !empty($edate) ):?><span class="searchtag" id="span-bdate"><?php echo $bdate .'~'.$edate;?><button type="button" onclick="deleteKeyword('bdate');deleteKeyword('edate')">삭제</button></span><?php endif;?>
                    <button type="button" onclick="setReset();" class="reset">검색 초기화</button>
                    <!-- button class="reset">검색 초기화</button -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div> <!-- //lst_table3 -->
        <div class="btn_cen cen">
          <!-- button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Search</button -->
		  <button type="button" onclick="getSearch(this.form);" class="btn_pack1 ov-b small rato">Search</button>
        </div>
      </section> <!-- 검색섹션.끝 -->
	  </form>
      

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
		  <form name="listFrm" method="post"  target="action_ifrm">
			<input type="hidden" name="mode" value="delete">
            <caption>검색결과리스트_테이블</caption>
            <colgroup>
              <col class="chkbox" style="width:10%">
              <col class="no_1" style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:20%">
              <col style="width:20%">
              <col class="data" style="width:10%">
              <col class="control1" style="width:10%">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button type="button" class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">배너</th>
                <th scope="row">링크</th>
                <th scope="row">신청자명</th>
                <th scope="row">연락처</th>
                <th scope="row">신청일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>
 