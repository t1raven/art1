<?php
 $pageName = "";
 $pageNum = "7";
 $subNum = "3";
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
            <caption>검색</caption>
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
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($word)):?><span class="searchtag" id="span-word"><?php echo $word;?><button type="button" onclick="deleteKeyword('word');">삭제</button></span><?php endif;?>
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

        <h1 class="title1">List</h1>
        <section class="bbsTop">
          <p class="result">
            <strong>Result : </strong>
            <span class="fc_red"><?php echo number_format($total_cnt);?> / <?php echo number_format($total_all_cnt);?></span>
          </p>
          <div class="group_rgh">
             <p class="sort">
              <strong><img src="<?php echo $currentFolder;?>/images/bg/bg_list2_<?php echo ($od === 0) ? 'off' : 'on';?>.jpg" alt="정렬"></strong>
              <button type="button" onclick="setOrder(0, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 0):?> class="on"<?php endif;?>>등록일순</button> 
              / <button onclick="setOrder(1, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 1):?> class="on"<?php endif;?>>금칙어순</button>
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


        <!-- h1 class="title1">List</h1>
        <div class="lst_table2 t-c" -->
          <table summary="금칙어 관리 표">
		  <form name="listFrm" method="post" action="?at=delete" target="action_ifrm">
		  <input type="hidden" name="mode" value="delete">
            <caption>금칙어 관리</caption>
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
                <th><button type="button" class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">금칙어</th>
                <th scope="row">등록일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>