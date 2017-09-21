<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'List';
$pageNum = '3';
$subNum = '3';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
  <section id="container">
  <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
    <?php //include '../../inc/datepicker_setting.php'; ?>
     <article id="recommenderManagement" class="content">
      <section class="section_box">
        <div class="lft_area" style="width:48%; float:left;">
          <h1 class="title1">List</h1>
            <div class="lst_table3">
              <table summary="Search Option ImageUpload">
                <caption>Search Option ImageUpload</caption>
                <colgroup>
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead>
                 <tr>
                  <th scope="row">SLOT</th>
                  <th scope="row">FILE</th>
                  <th scope="row">NAME</th>
                  <th scope="row">ACTION</th>
                 </tr>
                </thead>
                <tbody>