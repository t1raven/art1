<section id="side">
  <header class="sideHeader">
    <h1 class="a-Bg"><a href="#">Dashboard</a></h1>
    <button class="switch c-Bg on">사이드 메뉴 열기</button>
  </header>
  <div class="inner">
<?  if ( $pageNum == "0") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_01_01?>"><span>01/ <?=$main_title_1th?></span></a></li>
      <li class="s2"><a href="<?=$link_02_01?>"><span>02/ <?=$main_title_2th?></span></a></li>
      <li class="s3"><a href="<?=$link_03_01?>"><span>03/ <?=$main_title_3th?></span></a></li>
      <li class="s4"><a href="<?=$link_04_01?>"><span>04/ <?=$main_title_4th?></span></a></li>
      <li class="s5"><a href="<?=$link_05_01?>"><span>05/ <?=$main_title_5th?></span></a></li>
      <li class="s6"><a href="<?=$link_06_01?>"><span>06/ <?=$main_title_6th?></span></a></li>
    </ul>
<? } elseif ( $pageNum == "1") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_01_01?>"><span>01/ <?=$title_01_01th?></span></a></li>
      <li class="s2"></li>
    </ul>
<? } elseif ( $pageNum == "2") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_02_01?>"><span>01/ <?=$title_02_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_02_02?>"><span>02/ <?=$title_02_02th?></span></a></li>
	  <li class="s3"><a href="<?=$link_02_03?>"><span>03/ <?=$title_02_03th?></span></a></li>
	  <li class="s4"><a href="<?=$link_02_04?>"><span>04/ <?=$title_02_04th?></span></a></li>
      <!-- <li class="s3"><a href="<?=$link_02_03?>"><span>03/ <?=$title_02_03th?></span></a></li>
      <li class="s4"><a href="<?=$link_02_04?>"><span>04/ <?=$title_02_04th?></span></a></li>
      <li class="s5"><a href="<?=$link_02_05?>"><span>05/ <?=$title_02_05th?></span></a></li>
      <li class="s6"><a href="<?=$link_02_06?>"><span>06/ <?=$title_02_06th?></span></a></li>
      <li class="s7"><a href="<?=$link_02_07?>"><span>07/ <?=$title_02_07th?></span></a></li> -->
    </ul>
<? } elseif ( $pageNum == "3") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_03_01?>"><span>01/ <?=$title_03_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_03_02?>"><span>02/ <?=$title_03_02th?></span></a></li>
      <li class="s3"><a href="<?=$link_03_03?>"><span>03/ <?=$title_03_03th?></span></a></li>
      <li class="s4"><a href="<?=$link_03_04?>"><span>04/ <?=$title_03_04th?></span></a></li>
      <li class="s5"><a href="<?=$link_03_05?>"><span>05/ <?=$title_03_05th?></span></a></li>
      <li class="s6"><a href="<?=$link_03_06?>"><span>06/ <?=$title_03_06th?></span></a></li>
      <!-- li class="s7"><a href="<?=$link_03_07?>"><span>07/ <?=$title_03_07th?></span></a></li -->
      <li class="s8"><a href="<?=$link_03_08?>"><span>07/ <?=$title_03_08th?></span></a></li>
      <!-- li class="s9"><a href="<?=$link_03_09?>"><span>09/ <?=$title_03_09th?></span></a></li -->
      <li class="s10"><a href="<?=$link_03_10?>"><span>08/ <?=$title_03_10th?></span></a></li>
	  <li class="s11"><a href="<?=$link_03_11?>"><span>09/ <?=$title_03_11th?></span></a></li>
    </ul>
<? } elseif ( $pageNum == "4") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_04_01?>"><span>01/ <?=$title_04_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_04_02?>"><span>02/ <?=$title_04_02th?></span></a></li>
      <li class="s3"><a href="<?=$link_04_03?>"><span>03/ <?=$title_04_03th?></span></a></li>
      <li class="s4"><a href="<?=$link_04_04?>"><span>04/ <?=$title_04_04th?></span></a></li>
      <li class="s5"><a href="<?=$link_04_05?>"><span>05/ <?=$title_04_05th?></span></a></li>
      <li class="s6"><a href="<?=$link_04_06?>"><span>06/ <?=$title_04_06th?></span></a></li>
      <li class="s7"><a href="<?=$link_04_07?>"><span>07/ <?=$title_04_07th?></span></a></li>
    </ul>
<? } elseif ( $pageNum == "5") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_05_01?>"><span>01/ <?=$title_05_01th?></span></a></li>
      <li class="s2"></li>
    </ul>
<? } elseif ( $pageNum == "6") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_06_01?>"><span>01/ <?=$title_06_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_06_02?>"><span>02/ <?=$title_06_02th?></span></a></li>
      <li class="s3"></li>
    </ul>
<? } elseif ( $pageNum == "7") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_07_01?>"><span>01/ <?=$title_07_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_07_02?>"><span>02/ <?=$title_07_02th?></span></a></li>
      <li class="s3"><a href="<?=$link_07_03?>"><span>03/ <?=$title_07_03th?></span></a></li>
    </ul>
<? } elseif ( $pageNum == "8") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_08_01?>"><span>01/ <?=$title_08_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_08_02?>"><span>02/ <?=$title_08_02th?></span></a></li>
      <li class="s3"><a href="<?=$link_08_03?>"><span>03/ <?=$title_08_03th?></span></a></li>
    </ul>
<? } elseif ( $pageNum == "9") { ?>
    <ul class="snb">
      <li class="s1"><a href="<?=$link_09_01?>"><span>01/ <?=$title_09_01th?></span></a></li>
      <li class="s2"><a href="<?=$link_09_02?>"><span>02/ <?=$title_09_02th?></span></a></li>
      <li class="s3"><a href="<?=$link_09_03?>"><span>03/ <?=$title_09_03th?></span></a></li>
      <li class="s4"><a href="<?=$link_09_04?>"><span>04/ <?=$title_09_04th?></span></a></li>
      <li class="s5"><a href="<?=$link_09_05?>"><span>05/ <?=$title_09_05th?></span></a></li>
      <li class="s6"><a href="<?=$link_09_06?>"><span>06/ <?=$title_09_06th?></span></a></li>
    </ul>
<? } ?>
  </div>
</section>
<!-- //snb -->
