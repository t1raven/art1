<?php

include(ROOT.'inc/config.php');

$categoriName = 'MY art1';
$pageName = '주문정보';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub"  class="mt0">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
        <?php include(ROOT.'member/tab_myaccount.php'); ?>
           <div class="dashSubArea">
                <h1 class="title1 content-mediaBox">주문정보</h1>
                <section id="contactUsArea" class="content-mediaBox margin1">
                  <div class="table_dot">
                      <table summary="상담내역에 관한 날짜,제목,관련문의,답변여부에 관한 표입니다.">
                        <caption>상담내역</caption>
                         <colgroup>
                          <col class="data pcTable">
                          <col class="pcTable">
                          <col>
                          <col class="t4 pcTable">
                          <col class="t4 pcTable">
                        </colgroup>
                        <tbody>