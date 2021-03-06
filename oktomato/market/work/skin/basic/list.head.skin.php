<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'List';
$pageNum = '3';
$subNum = '2';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
 <section id="container">
  <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
    <?php include '../../inc/datepicker_setting.php'; ?>
     <article class="content">
      <form name="searchFrm" method="get">
      <input type="hidden" name="at" value="<?php echo $at;?>">
      <input type="hidden" name="st" value="0" id="st">
      <section class="section_box">
        <h1 class="title1">Search Option</h1>
        <div class="lst_table3">
          <table summary="작품 검색">
            <caption>작품 검색</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색어</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="gnm" class="pos">작품명</label>
                    <input name="gnm" type="text" class="inp_txt lh w90" id="gnm" value="<?php echo $gnm;?>">
                    <button type="button" class="btn_switch"><?php echo ($st === 0) ? 'AND' : 'OR';?></button>
                  </span>
                  <span class="col_td auto">
                    <label for="nm" class="pos">작가명</label>
                    <input name="nm" type="text" class="inp_txt lh w90" id="nm" value="<?php echo $nm;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">등록일</th>
                <td>
                  <span class="datapiker">
                    <input name="bdate" type="text" class="inp_txt date" id="bdate" value="<?php echo $bdate;?>" readonly>
                  </span> <span> ~ </span>
                  <span class="datapiker">
                    <input name="edate" type="text" class="inp_txt date" id="edate" value="<?php echo $edate;?>" readonly>
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($nm)):?><span class="searchtag" id="span-nm"><?php echo $nm;?><button type="button" onclick="deleteKeyword('nm');">삭제</button></span><?php endif;?>
                    <?php if (!empty($gnm)):?><span class="searchtag" id="span-gnm"><?php echo $gnm;?><button type="button" onclick="deleteKeyword('gnm');">삭제</button></span><?php endif;?>
                    <button type="button" onclick="setReset();" class="reset">검색 초기화</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- //lst_table2 -->
        <div class="btn_cen cen">
          <button type="button" onclick="getSearch(this.form);" class="btn_pack1 ov-b  small rato">Search</button>
        </div>
      </section>
      </form>

      <section class="section_box">
        <h1 class="title1">Search Result</h1>
        <section class="bbsTop">
          <p class="result">
            <strong>Result : </strong>
            <span class="fc_red"><?php echo ($pageUtil->attr['totalPage'] > 0) ? $page : 0;?> / <?php echo number_format($pageUtil->attr['totalPage']);?></span>
          </p>
          <div class="group_rgh">
             <p class="sort">
              <strong><img src="<?php echo $currentFolder;?>/images/bg/bg_list2_<?php echo ($od === 0) ? 'off' : 'on';?>.jpg" alt="정렬"></strong>
              <button type="button" onclick="setOrder(0, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 0):?> class="on"<?php endif;?>>등록일순</button> / <button type="button" onclick="setOrder(1, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 1):?> class="on"<?php endif;?>>작가명순</button>
            </p>
            <p class="align">
              <strong><img src="<?php echo $currentFolder;?>/images/bg/bg_list.gif" alt="정렬"> </strong>
              <button type="button" onclick="setListSize(10);"<?php if($sz === 10):?> class="on"<?php endif;?>>10</button> /
              <button type="button" onclick="setListSize(15);"<?php if($sz === 15):?> class="on"<?php endif;?>>15</button> /
              <button type="button" onclick="setListSize(20);"<?php if($sz === 20):?> class="on"<?php endif;?>>20</button> /
              <button type="button" onclick="setListSize(25);"<?php if($sz === 25):?> class="on"<?php endif;?>>25</button> /
              <button type="button" onclick="setListSize(30);"<?php if($sz === 30):?> class="on"<?php endif;?>>30</button>
            </p>
          </div>
        </section>
        <!-- //bbsTop -->
        <form name="listFrm" method="post" target="action_ifrm">
        <input type="hidden" name="at" value="delete">
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>작품 관리</caption>
            <colgroup>
              <col>
              <col>
              <col>
              <col>
              <col>
              <col>
              <col>
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button type="button" class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">작품명</th>
                <th scope="row">작가명</th>
                <th scope="row">등록일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>