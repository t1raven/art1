<?php
 $pageName = "View";
 $pageNum = "2";
 $subNum = "9";
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
        <h1 class="title1">Registration No.<?php echo $Rental->attr['rental_idx']; ?></h1>
        <div class="lst_table3">
