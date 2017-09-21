<?php
$pageName = 'List';
$pageNum = '6';
$subNum = '1';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
<section id="container">
   <div class="container_inner">
      <?php include '../../inc/path.php'; ?>
      <article class="content">
        <form name="fomnews" method="POST" action="?at=update" enctype="multipart/form-data" onsubmit="return false;" >
        <section class="section_box">
            <h1 class="title1">SNS info.</h1>
            <div class="lst_table3">
                <table summary="SNS info">
                  <caption>SNS info</caption>
                  <colgroup>
                    <col class="th1">
                    <col>
                  </colgroup>
                  <tbody>