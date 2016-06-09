<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/marketmain.class.php');

$i = 0;
$tbl = 'market_selection';
$col = 'ms_focused_works';
$Marketmain = new Marketmain();
$list = $Marketmain->getCollection($dbh, $tbl, $col);
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);

if (is_array($list)) {
?>
<article id="focused" class="lst_horizontal style1">
    <ul class="wide-slide-child">
      <?php foreach($list as $row){?>
      <li<?php if ($i === 0):?> class="on"<?php endif;?>>
        <div class="item"><a href="artwork_view.php?goods=<?php echo $row['goods_idx'];?>"><img src="<?php echo goodsListImgUploadPath.$row['goods_list_img'];?>" alt=""></a></div>
        <div class="cont">
          <p class="h"><?php echo $row['goods_name'];?></p>
          <p class="by">by <?php echo $row['artist_name'];?></p>
        </div>
      </li>
      <?php ++$i;}?>
    </ul>
</article>
<?php }?>