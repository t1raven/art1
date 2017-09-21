<?php
   $pageName = "List";
   $pageNum = "2";
   $subNum = "2";
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
	  <input type="hidden" name="st" id="st" value="<?php echo $st;?>">
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
                        <th scope="row">카테고리</th>
                        <td>
                           <div class="lst_check radio">
								<span><label for="all">All</label><input type="radio" name="cate" value="" id="all"  <?php if($cate==''){ echo 'checked'; } ?>></span>
<?php
$Newstype = new Newstype();
$Newstype->setAttr("news_category_code", 1000000000);
$Newstype->setAttr("news_category_depth", 2);

$tmp = $Newstype->getList($dbh);
$list_cate = $tmp[0];
foreach($list_cate as $row_cate) { 
?>
								<span><label for="<?php echo($row_cate['news_category_name']);?>"><?php echo($row_cate['news_category_name']);?></label>
											<input type="radio" name="cate" id="<?php echo($row_cate['news_category_name']);?>" value="<?php echo($row_cate['news_category_idx']);?>"
											<?php if($cate==$row_cate['news_category_idx']){ echo 'checked';} ?>>
								</span>
<?php
}
$list_cate = null;
$tmp = null;
unset($list_cate);
unset($tmp);
?>
								<span><label for="news main">news main</label>
											<input type="radio" name="cate" id="news main" value="1"
											<?php if($cate==1){ echo 'checked';} ?>>
								</span>
                              <!-- span><label for="all">All</label><input type="radio" name="cate" value="" id="all"  <?php if($cate==''){ echo 'checked'; } ?>></span>
                              <span><label for="bri">In Brief</label><input type="radio" name="bri" id="bri" <?php if($cate==''){ echo 'checked'; } ?> ></span>
                              <span><label for="trend">Trend</label><input type="radio" name="trend" id="trend" ></span>
                              <span><label for="people">Peple</label><input type="radio" name="people" id="people" ></span>
                              <span><label for="world">World</label><input type="radio" name="world" id="world" ></span>
                              <span><label for="trouble">Trouble</label><input type="radio" name="trouble" id="trouble" ></span>
                              <span><label for="epi">Episode</label><input type="radio" name="epi" id="epi" ></span -->
                              <!--br />
                              <span class="news_cate_m"><label for="notice">공지</label><input type="radio" name="notice" id="notice" ></span>
                              <span><label for="fes">학술행사</label><input type="radio" name="fes" id="fes" ></span>
                              <span><label for="course">강좌</label><input type="radio" name="course" id="course" ></span>
                              <span><label for="col">공모</label><input type="radio" name="col" id="col" ></span>
                              <span><label for="recu">구인구직</label><input type="radio" name="recu" id="recu" ></span>
                              <span><label for="show">전시소식</label><input type="radio" name="show" id="show" ></span>
                              <span><label for="book">도서</label><input type="radio" name="book" id="book" ></span -->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">노출여부</th>
                        <td>
                           <div class="lst_check radio">
                              <span>
                              <label for="exp">노출</label>
                              <input type="radio" name="dps" id="exp"  value="Y" <?php if($dps=='Y' || $dps==''){ echo 'checked';} ?> >
                              </span>
                              <span>
                              <label for="exp_n">비노출</label>
                              <input type="radio" name="dps" id="exp_n" value="N" <?php if($dps=='N'){ echo 'checked';} ?>>
                              </span>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">검색어</th>
                        <td class="colbox">
                           <span class="col_td auto">
                           <label for="tit" class="pos">타이틀</label>
                           <input name="title" type="text" class="inp_txt lh w90" id="title" value="<?php echo $title ; ?>"> 
                           <button type="button" class="btn_switch"><?php echo ($st === 0) ? 'AND' : 'OR';?></button>
                           </span>
                           <span class="col_td auto">
                           <label for="writer" class="pos">기자명</label>
                           <input name="rnm" type="text" class="inp_txt lh w90" id="rnm" value="<?php echo $rnm ; ?>"> 
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
                            <?php if (!empty($title)):?><span class="searchtag" id="span-title"><?php echo $title;?><button type="button" onclick="deleteKeyword('title');">삭제</button></span><?php endif;?>
                            <?php if (!empty($rnm)):?><span class="searchtag" id="span-rnm"><?php echo $rnm;?><button type="button" onclick="deleteKeyword('rnm');">삭제</button></span><?php endif;?>
                            <?php if (!empty($bdate) && !empty($edate) ):?><span class="searchtag" id="span-bdate"><?php echo $bdate .'~'.$edate;?><button type="button" onclick="deleteKeyword('bdate');deleteKeyword('edate')">삭제</button></span><?php endif;?>
                            <button type="button" onclick="setReset();" class="reset">검색 초기화</button>
                              <!-- span class="searchtag">홍길동<button>삭제</button></span>
                              <span class="searchtag">홍길동<button>삭제</button></span>
                              <button class="reset">검색 초기화</button -->
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table2 -->
            <div class="btn_cen cen">
               <!-- button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b  small rato">Search</button -->
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
                      / <button onclick="setOrder(1, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 1):?> class="on"<?php endif;?>>제목순</button>
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

			<form name="listFrm" method="post" action="index.php" >
			<!-- form name="listFrm" method="post" action="index.php" target="action_ifrm" -->
			<input type="hidden" name="at" value="delete">

            <div class="lst_table2 t-c">
               <table summary="뉴스목록">
                  <caption>뉴스 관리</caption>
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
                     <tr>
                        <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                        <th><button type="button" class="check_listbox all">All</button></th>
                        <th scope="row">No</th>
                        <th scope="row">카테고리</th>
                        <th scope="row">제목</th>
                        <th scope="row">기자명</th>
                        <th scope="row">등록일</th>
                        <th scope="row">상태</th>
                        <th scope="row">관리</th>
                     </tr>
                  </thead>
                  <tbody>