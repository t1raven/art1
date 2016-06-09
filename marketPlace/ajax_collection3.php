<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/marketmain.class.php');

$tbl = 'market_collection';
$col = 'mc_new_arrivals';
$Marketmain = new Marketmain();
$list = $Marketmain->getCollection($dbh, $tbl, $col);
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);
?>
<article id="winner2"  class="lst_horizontal style2">
<?php if (is_array($list)): ?>
      <ul class="wide-slide-child">
        <?php foreach($list as $row):?>
        <li>
          <div class="item">
            <?php if ((int)$row['goods_cnt'] < 1):?><span class="ico_red_circle">sold out</span><?php endif;?>
            <?php if ((int)$row['goods_cnt'] > 0 && $row['goods_lental_state'] === 'Y'):?><span class="ico_blue_circle">rental 가능</span><?php endif;?>
            <a href="#"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a>
            <div class="link">
              <ul>
                <li><a href="#" class="zoom">자세히 보기</a></li>
                <li><a href="#" class="nlink">관련링크</a></li>
                <li><a href="#" class="basket">장바구니</a></li>
                <li><a href="#" class="mark">찜하기</a></li>
              </ul>
            </div>
          </div>
          <div class="cont">
            <p class="t1"><?php echo $row['artist_name'];?></p>
            <p class="t2"><?php echo $row['goods_name'];?></p>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
<?php else: ?>
        <div class="pos posA1 wide-pre-Box content-mediaBox">
          <p class="noAjaxData">자료가 존재하지 않습니다.</p>
        </div>
<?php endif; ?>
</article>