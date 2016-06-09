<?php
if (!defined('OKTOMATO')) exit;

include(ROOT.'inc/config.php');

$categoriName = 'MY art1';
$pageName = '마이페이지';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>

  <section id="container_sub" class="mt0 myart1">
    <div class="container_inner">
      <?php include(ROOT. 'inc/path.php'); ?>
      <?php include(ROOT. 'member/tab_myaccount.php'); ?>
      <div class="dashSubArea">
         <div id="dashboardArea" class="content-mediaBox margin1">
