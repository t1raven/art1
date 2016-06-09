<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

$categoriName = 'GALLERIES SEARCH';
$pageName = 'GALLERIES SEARCH';
$pageNum = '4';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
          <section id="quickSearchArea" class="galleries">
            <? include(ROOT.'search/ajax_quicksearch_gallery.php');?>
          </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<script>
checkListMotion();
bbsCheckbox();
LabelHidden(".inp_txt.lh");
</script>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>