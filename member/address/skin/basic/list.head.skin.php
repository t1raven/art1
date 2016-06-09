<?php
if (!defined('OKTOMATO')) exit;

include(ROOT.'inc/config.php');

$categoriName = 'MY art1';
$pageName = '배송지 관리';
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
            <h1 class="title1 content-mediaBox">배송 주소록</h1>
            <section id="addressArea" class="content-mediaBox margin1">
              <article class="lft_group">
                <h2 class="title3">저장된 주소록</h2>
                  <div class="lst_order">















