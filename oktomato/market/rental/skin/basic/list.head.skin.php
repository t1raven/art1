<?php
 $pageName = "List";
 $pageNum = "2";
 $subNum = "9";
 $thirdNum = "0";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/side.php"; ?>
 <section id="container">
  <div class="container_inner">
    <? include "../../inc/path.php"; ?>
    <? include "../../inc/datepicker_setting.php"; ?>
     <article class="content">
      <form name="searchFrm" method="get">
      <input type="hidden" name="at" value="<?php echo $at;?>">
      <input type="hidden" name="st" value="0" id="st">
	  <section class="section_box">
        <h1 class="title1">Search Option</h1>
        <div class="lst_table3">
          <table summary="작가 검색">
            <caption>작가 검색</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색어</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="tit" class="pos">요청작품명</label>
                   <input name="gnm" type="text" class="inp_txt lh w90" id="gnm" value="<?php echo $gnm;?>">
                    <button type="button" class="btn_switch"><?php echo ($st == 0) ? 'AND' : 'OR';?></button>
                  </span>
                  <span class="col_td auto">
                    <label for="nm" class="pos">담당자명</label>
                    <input name="nm" type="text" class="inp_txt lh w90" id="nm" value="<?php echo $nm;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">등록일</th>
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
                <th scope="row">상태</th>
                <td>
                    <div class="lst_check radio">
                      <span>
                        <label for="frame1">전체</label>
                        <input type="radio" name="answer" id="frame1"  value="" <?php if($answer==''){ echo 'checked=\'\'';} ?>> 
                      </span>
                      <span>
                        <label for="frame2">답변요청</label>
                        <input type="radio" name="answer" id="frame2" value="N" <?php if($answer=='N'){ echo 'checked=\'\'';} ?>>
                      </span>
                      <span>
                        <label for="frame3">답변완료</label>
                        <input type="radio" name="answer" id="frame3" value="Y" <?php if($answer=='Y'){ echo 'checked=\'\'';} ?>>
                      </span>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($gnm)):?><span class="searchtag" id="span-gnm"><?php echo $gnm;?><button type="button" onclick="deleteKeyword('gnm');">삭제</button></span><?php endif;?>
                    <?php if (!empty($nm)):?><span class="searchtag" id="span-nm"><?php echo $nm;?><button type="button" onclick="deleteKeyword('nm');">삭제</button></span><?php endif;?>
                    <?php if (!empty($bdate) && !empty($edate) ):?><span class="searchtag" id="span-bdate"><?php echo $bdate .'~'.$edate;?><button type="button" onclick="deleteKeyword('bdate');deleteKeyword('edate')">삭제</button></span><?php endif;?>
                    <?php if (!empty($answer)):?><span class="searchtag" id="span-answer"><?php if($answer=='N') echo '답변요청'; if($answer=='Y') echo '답변완료'; ?><button type="button" onclick="deleteKeyword('answer'); deleteKeywordRadio('answer');">삭제
                    </button></span><?php endif;?>
                    <button type="button" onclick="setReset();" class="reset">검색 초기화</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div> <!-- //lst_table3 -->
        <div class="btn_cen cen">
          <button type="button" onclick="getSearch(this.form);" class="btn_pack1 ov-b small rato">Search</button>
        </div>
      </section>
      </form>

      <section class="section_box">
        <h1 class="title1">Search Result</h1>
        <section class="bbsTop">
          <p class="result">
            <strong>Result : </strong>
            <span class="fc_red"><?php echo number_format($total_cnt);?> / <?php echo number_format($total_all_cnt);?></span>
          </p>
          <div class="group_rgh">
             <p class="sort">
              <strong><img src="<?php echo $currentFolder;?>/images/bg/bg_list2_<?php echo ($od === 0) ? 'off' : 'on';?>.jpg" alt="정렬"></strong>
              <button type="button" onclick="setOrder(0, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 0):?> class="on"<?php endif;?>>등록일순</button> 
              / <button onclick="setOrder(1, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 1):?> class="on"<?php endif;?>>이름순</button>
            </p> 
            <p class="align">
              <strong><img src="<?=$currentFolder?>/images/bg/bg_list.gif" alt="정렬"> </strong>
              <button type="button" onclick="setListSize(10);"<?php if($sz === 10):?> class="on"<?php endif;?>>10</button> / 
              <button type="button" onclick="setListSize(15);"<?php if($sz === 15):?> class="on"<?php endif;?>>15</button> / 
              <button type="button" onclick="setListSize(20);"<?php if($sz === 20):?> class="on"<?php endif;?>>20</button> / 
              <button type="button" onclick="setListSize(25);"<?php if($sz === 25):?> class="on"<?php endif;?>>25</button> / 
              <button type="button" onclick="setListSize(30);"<?php if($sz === 30):?> class="on"<?php endif;?>>30</button>
            </p>
          </div>
        </section> <!-- //bbsTop -->

        <div class="lst_table2 t-c">
        <!-- 검색결과리스트_게시판_시작 -->
        <div class="lst_table2 t-c">

        <table summary="렌탈 관리의 결과 대한 정보를 확인하는 표">
        <!-- form name="listFrm" method="post" action="delete.php" target="action_ifrm" -->
		<form name="listFrm" method="post" action="?at=delete" target="action_ifrm">
        <input type="hidden" name="mode" value="delete">
            <caption>렌탈관리</caption>
            <colgroup>
              <col style="width:5%;">
              <col class="no_1" style="width:10%;">
              <col style="width:10%;">
              <col style="width:10%;">
              <col style="width:20%;">
              <col style="width:15%;">
              <col class="data" style="width:10%;">
              <col class="control1" style="width:10%;">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">이름</th>
                <th scope="row">기관명</th>
                <th scope="row">요청 작품명</th>
                <th scope="row">등록일</th>
                <th scope="row">상태</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>

