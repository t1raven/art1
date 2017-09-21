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
		<form name="searchFrm" method="get">
		<input type="hidden" name="cfm" id="cfm" value="<?php echo $cfm;?>">
		<section class="section_box">
        <h1 class="title1">Search Option</h1>
        
        <div class="lst_table3">
          <table summary="전시관리 검색">
            <caption>전시관리 검색</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="tit" class="pos">신청자명</label>
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
                <th scope="row">상태</th>
                <td>
                    <div class="lst_check radio">
                        <span id="cfmAll">
							<label for="all">전체</label>
							<input type="radio" name="cfm1" id="frame1" value="" <?php if($cfm==''){ echo 'checked=\'\'';} ?>>
						</span>
                        <span id="cfmY">
							<label for="ack">승인</label>
							<input type="radio" name="cfm1" id="frame2" value="Y" <?php if($cfm=='Y'){ echo 'checked=\'\'';} ?>>
						</span>
                        <span id="cfmW">
							<label for="atmo">대기</label>
							<input type="radio" name="cfm1" id="frame3" value="W" <?php if($cfm=='W'){ echo 'checked=\'\'';} ?>>
						</span>
                        <span id="cfmN">
							<label for="refusal">거절</label>
							<input type="radio" name="cfm1" id="frame3" value="N" <?php if($cfm=='N'){ echo 'checked=\'\'';} ?>>
						</span>
                    </div>
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
        </div>
        <!-- //lst_table2 -->
        <div class="btn_cen cen">
          <button onclick="getSearch(this.form);" class="btn_pack1 ov-b small rato">Search</button>
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
        </section>
        <!-- //bbsTop -->
        <div class="lst_table2 t-c">
          <table summary="전시관리 결과">
		  <form name="listFrm" method="post" action="?at=delete">
			<input type="hidden" name="mode" value="delete">
            <caption>검색결과리스트_테이블</caption>
            <colgroup>
              <col>
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
                <th scope="row">배너</th>
                <th scope="row">링크</th>
                <th scope="row">신청자명</th>
                <th scope="row">연락처</th>
                <th scope="row">신청일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>