<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/event.class.php');

$evt_idx = isset($_GET['evt']) ? $_GET['evt'] : null;

$ii = 1;
$p = 1;
$z = 0;
$displayState = 'Y';

if (!empty($evt_idx) && is_numeric($evt_idx)) {
	$Event = new Event();
	$Event->setAttr('evt_idx', $evt_idx);
	$Event->getEventEdit($dbh);
	$Event->getEventParagraphEdit($dbh);
	$aParaSubTitle = explode('§', $Event->attr['para_sub_title']);
	$aParaArtWork = explode('§', $Event->attr['para_artwork']);
	$aGoodsInfo = $Event->getGoodsInfo($dbh, $aParaArtWork);
	$eventCnt = count($aParaSubTitle);

	//모바일용 이미지 베너 추가 2016-06-08 // LYT
	$evt_main_img_m = ( empty($Event->attr['evt_main_img_m']) ) ? $evt_main_img_m = $Event->attr['evt_main_img'] : $evt_main_img_m = $Event->attr['evt_main_img_m'];

	$ogTitle = $Event->attr['evt_title'];
	$ogDescription = $Event->attr['evt_copyright'];
	$ogImage = $PUBLIC['HOME'].eventUploadPath.$Event->attr['evt_main_img'];
}
else {
	exit;
}

$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include('../inc/config.php');
include('../inc/link.php');
include('../inc/top.php');
include('../inc/header.php');
include('../inc/spot_sub.php');
?>
<section id="container_sub">
    <div class="container_inner">
          <section id="exhibitions_detail" class="content-mediaBox margin1">
              <header class="header">
                <h1><?php echo $Event->attr['evt_title'];?></h1>
                <p class="t1"><?php echo $Event->attr['evt_copyright'];?></p>
              </header>
              <?php if (!empty($Event->attr['evt_main_img'])) : ?>
			  <div class="banner">
                  <div class="photo">
                    <img src="<?php echo eventUploadPath, $Event->attr['evt_main_img']; ?>" alt="" class="boxsize pc">
                    <img src="<?php echo eventUploadPath, $evt_main_img_m; ?>" alt="" class="boxsize mobile">
                  </div>
              </div>
			  <?php endif ; ?>
              <div class="tab_type3 n5">
                <ul>
                <?php
                foreach($aParaSubTitle as $val) {
                    if (!empty($val)) {
                ?>
                  <li><a href="#exh<?php echo $ii; ?>"><?php echo $val;?></a></li>
                <?php
                        ++$ii;
                    }
                }
                ?>
                </ul>
              </div>
              <?php for ($j = 0; $j < $eventCnt; $j++) { ?>
              <section id="exh<?php echo ($j+1); ?>" class="exh">
                  <h1><?php echo $aParaSubTitle[$j]; ?></h1>
                  <ul>
                    <?php
                        for($k = 0; $k < 20; $k++) {
                            $goodsInfo = $aGoodsInfo[$z];
                            if (!empty($goodsInfo)) {
                                $aTemp = explode('§', $aGoodsInfo[$z]);
                    ?>
                    <li>
					<!-- <div class="testCss">test</div> -->
                    <?php if ($aTemp[4] === '0'):?>
						<p class="circle"><img src="/images/ico/ico_red_circle.png" alt="판매불가"></p>
					<?php else: ?>
						<?php if ($aTemp[5] === 'Y'): ?>
							<p class="circle"><img src="/images/ico/ico_blue_circle.png" alt="렌탈불가"></p>
						<?php endif; ?>
					<?php endif; ?>

                    <!--a href="artwork_view.php?goods=<?php echo $aTemp[0]; ?>" class="photo"><img src="<?php echo goodsListImgUploadPath, $aTemp[1];?> " alt=""></a-->
                    <a href="#" onclick="goods='<?php echo $aTemp[0]; ?>'; marketViewMotion(); return false;" class="photo"><img src="<?php echo goodsListImgUploadPath, $aTemp[1];?> " alt=""></a>
                      <div class="cont">
                          <p class="name"><?php echo $aTemp[2];?></p>
                          <p class="h"><?php echo $aTemp[3];?></p>
                      </div>
                    </li>
                    <?php
                        }
                        ++$z;
                    }
                    ?>
                 </ul>
              </section>
              <?php } ?>
          </section>

    </div><!-- //container_inner -->
</section><!-- //container_sub -->

<script>
  $(".tab_type3 > ul > li > a").click(function(event){
      $('html,body').animate({scrollTop:$(this.hash).offset().top - 100}, 500,"easeInOutCubic");
      return false;
    });

</script>
<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');

$dbh = null;
$aParaSubTitle = null;
$aParaArtWork = null;
$aGoodsInfo = null;
$Event = null;
unset($dbh);
unset($aParaSubTitle);
unset($aParaArtWork);
unset($aGoodsInfo);
unset($Event);