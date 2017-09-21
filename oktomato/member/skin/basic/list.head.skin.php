<?php
 $pageName = "View";
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

		<form name="searchFrm" method="get">
      <input type="hidden" name="at" value="<?php echo $at;?>">
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
                    <label for="tit" class="pos">이메일</label>
                    <input name="word" type="text" class="inp_txt lh w90" id="word" value="<?php echo $word; ?>"> 
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">주문이력</th>
                <td>
					<div class="lst_check radio">
                      <span>
                        <label for="orders1">Y</label>
                        <input type="radio" name="orders" id="orders1" value="1" <?php if($orders===1){ echo 'checked';} ?>>
                      </span>
                      <span>
                        <label for="orders2">N</label>
                        <input type="radio" name="orders" id="orders2" value="2" <?php if($orders===2){ echo 'checked';} ?>>
                      </span>
                	</div>                
				</td>
              </tr>
              <tr>
                <th scope="row">가입일</th>
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
                <th scope="row">뉴스레터 수신 ＊</th>
                <td>
					<div class="lst_check radio">
                      <span>
                        <label for="newsletter1">Y</label>
                        <input type="radio" name="newsletter" id="newsletter1" value="1" <?php if($newsletter===1){ echo 'checked';} ?>>
                      </span>
                      <span>
                        <label for="newsletter2">N</label>
                        <input type="radio" name="newsletter" id="newsletter2" value="2" <?php if($newsletter===2){ echo 'checked';} ?>>
                      </span>
                	</div>                 
                </td>
              </tr>
              <!-- tr>
                <th scope="row">SMS 수신 ＊</th>
                <td>
					<div class="lst_check radio">
                      <span class="on">
                        <label for="frame1">Y</label>
                        <input type="radio" name="frame" id="frame1" checked="">
                      </span>
                      <span>
                        <label for="frame2">N</label>
                        <input type="radio" name="frame" id="frame2">
                      </span>
                	</div> 
                </td>
              </tr -->
              <tr>
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <!-- span class="searchtag">oktomato<button>삭제</button></span>
                    <span class="searchtag">power1<button>삭제</button></span>
                    <button class="reset">검색 초기화</button -->

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
            <span class="fc_red"><?php echo number_format($total_cnt);?> <!-- / <?php echo number_format($total_cnt );?> --></span>
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
        </section> <!-- 검색결과리스트_상단레이아웃_끝 -->
        
        <!-- 검색결과리스트_게시판_시작 -->
        <div class="lst_table2 t-c">
          <table summary="회원정보">
		  <form name="listFrm" method="post" action="?at=delete">
			<input type="hidden" name="mode" value="delete">
            <caption>검색결과리스트_테이블</caption>
            <colgroup>
              <col class="chkbox" style="width:10%">
              <col class="no_1" style="width:10%">
              <col style="width:10%">
              <col style="width:20%">
              <col class="data" style="width:10%">
              <col class="control1" style="width:20%">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button type="button" class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">이메일</th>
                <th scope="row">주문정보(건수)</th>
                <th scope="row">신청일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>