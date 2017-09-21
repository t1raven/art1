<?php
 $pageName = "List";
 $pageNum = "2";
 $subNum = "1";
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
      <section class="section_box">
        <h1 class="title1">BBS Type Management</h1>
        
        <!-- //bbsTop -->
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>학술대회 관리</caption>
            <colgroup>
              <!-- <col> -->
              <col>
              <col>
              <col>

            </colgroup>
            <thead class="pad15" >
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
               <!--  <th><button class="check_listbox all">All</button></th> -->
                <th scope="col" class="pad_10">No</th>
				 <th scope="col" class="pad_10">카테고리</th>
                <th scope="col" class="pad_10">BBS skin type</th>
              </tr>
            </thead>
            <tbody class="pad15">