<?php
 $pageName = "List";
 $pageNum = "2";
 $subNum = "7";
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
	  <section class="section_box">
        <h1 class="title1">Search Option</h1>
        <div class="lst_table3">
          <table summary="작가 검색">
            <caption>Q&A 검색</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색어</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="tit" class="pos">검색어</label>
                   <input name="word" type="text" class="inp_txt lh w90" id="word" value="<?php echo $word;?>">
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
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($word)):?><span class="searchtag" id="span-word"><?php echo $word;?><button type="button" onclick="deleteKeyword('word');">삭제</button></span><?php endif;?>
                    <?php if (!empty($bdate) && !empty($edate) ):?><span class="searchtag" id="span-bdate"><?php echo $bdate .'~'.$edate;?><button type="button" onclick="deleteKeyword('bdate');deleteKeyword('edate')">삭제</button></span><?php endif;?>
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

        <table summary="Q&A 관리의 결과 대한 정보를 확인하는 표">
        <!-- form name="listFrm" method="post" action="delete.php" target="action_ifrm" -->
		<form name="listFrm" method="post"  target="action_ifrm">
        <input type="hidden" name="mode" value="delete">
            <caption>Q&A관리</caption>
            <colgroup>
              <col style="width:5%;">
              <col class="no_1" style="width:10%;">
              <col style="width:20%;">
              <col style="width:10%;">
              <col style="width:10%;">
              <col style="width:15%;">
              <col class="data" style="width:10%;">
              <col class="control1" style="width:10%;">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">제목</th>
                <th scope="row">이름</th>
                <th scope="row">등록일</th>
                <th scope="row">상태</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>

