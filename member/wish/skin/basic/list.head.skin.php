<?php
if (!defined('OKTOMATO')) exit;

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
                  <h1 class="title1 content-mediaBox">위시리스트</h1>
                <section id="wishListArea2" class="content-mediaBox margin1">
                  <p class="total"><strong><?php echo $total;?></strong>개의 작품이 담겨 있습니다.</p>
                    <div class="lst_horizontal style4">
                        <ul>
