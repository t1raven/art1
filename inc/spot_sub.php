<section id="spot_sub" class="fixedsubTop">
  <!-- <div class="mobileCont">
    <? if ( $pageNum == "1") { ?>
      <h1 class="art1"><?=$categoriName?></h1>
    <? } elseif ( $pageNum == "10" && $subNum == "1" ) { ?>
      <h1 class="kr"><?=$categoriName?></h1>
    <? } elseif ( $pageNum == "10" && $subNum == "3" ) { ?>
      <h1 class="kr"><?=$categoriName?></h1>
    <? } else { ?>
      <h1><?=$categoriName?></h1>
      <? } ?>
  </div> -->
  <!--
  <div class="img">
    <img src="/images/spot/img_spotsub<?=$pageNum?>.jpg" alt="">
  </div>
  -->

  <div class="cont">
    <? if ( $pageNum == "1") { ?>
      <h1 class="art1"><a href="/art1/artist_rec.php"><?=$categoriName?></a></h1>
    <? } elseif ( $pageNum == "2") { ?>
      <h1><a href="/news/index.php?at=main"><?=$categoriName?></a></h1>
    <? } elseif ( $pageNum == "3") { ?>
      <h1><a href="/marketPlace/index.php"><?=$categoriName?></a></h1>
    <? } elseif ( $pageNum == "10" && $subNum == "1" ) { ?>
      <h1 class="kr"><?=$categoriName?></h1>
    <? } elseif ( $pageNum == "10" && $subNum == "3" ) { ?>
      <h1 class="kr"><?=$categoriName?></h1>
    <? } elseif ( $pageNum == "5" && $subNum == "0" ) { ?>
      <h1 class="lower"><?=$categoriName?></h1>
    <? } else if( $pageNum == "4" && $subNum >= 1 ){ ?>
      <h1 class="gallery"><a href="/galleries/about/?idx=<?php echo $idx; ?>"><img src="<?php echo galleriesAboutUploadPath, $logoImg; ?>" alt="Gallery Logo Image" /></a></h1>
    <? }else{ ?>
	  <h1><?=$categoriName?></h1>
    <?} ?>
    <!--
    <h1><img src="/images/spot/p_spotsub<?=$pageNum?>.png" alt="<?=$categoriName?>"></h1>
    <? if ( $pageNum == "1") { ?>
    <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    <? } elseif ( $pageNum == "2") { ?>
    <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    <? } elseif ( $pageNum == "3") { ?>
    <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    <? } elseif ( $pageNum == "4") { ?>
    <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    <? } elseif ( $pageNum == "5") { ?>
    <p>전세계 미술계 소식을 한발 빠르게 전합니다. </p>
    <? } ?>
  -->


  </div>
</section>