<? include "../../inc/config.php"; ?>
<?php
  $categoriName = "MY art1";
  $pageName = "기본정보수정";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?> 
<? include "../../inc/spot_sub.php"; ?> 

  <section id="container_sub"  class="mt0">
    <div class="container_inner">
      <? include "../../inc/path.php"; ?> 
	<? include "../tab_myaccount.php"; ?> 
      <div class="dashSubArea">
            <h1 class="title1 content-mediaBox">상담내역</h1>
            <section id="customerArea" class="content-mediaBox margin1">
                <div class="table_dot">
                  <table summary="상담내역에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                    <caption>상담내역</caption>
                    <colgroup>
                      <col class="data2 pcTable">
                      <col>
                      <col class="t4 pcTable">
                      <col class="t4 pcTable">
                    </colgroup>
                    <tbody>