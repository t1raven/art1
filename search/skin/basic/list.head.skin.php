<?php
if (!defined('OKTOMATO')) exit;

$categoriName = 'Search Result';
$pageName = 'Search Result';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub" class="area_search_resut ">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
          <section id="wishListArea2" class="content-mediaBox margin1">
            <?php if ($total > 0):?><p class="total" style="margin-top:15px"><strong><?php echo $total;?></strong>개의 작품이 검색되었습니다.</p><?php endif; ?>
              <div class="lst_horizontal style4">
                <ul>

