<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/market/marketmain.class.php');

$beginIdx = isset($_POST['idx']) ? $_POST['idx'] : null;
$aMdChoiceBannerList = null;
$Marketmain = new Marketmain();
$mdChoiceBanner = $Marketmain->getMdChoiceBanner($dbh, $beginIdx);
$Marketmain = null;
$dbh = null;

unset($Marketmain);
unset($dbh);
?>
<ul>
<?php if (is_array($mdChoiceBanner)): ?>
  <?php foreach($mdChoiceBanner as $row): ?>
  <li><a href="#"><img src="<?php echo goodsListImgUploadPath, $row['goods_list_img'];?>" alt=""></a></li>
  <?php endforeach; ?>
<?php else: ?>
  <li>
    <div class="pos posA1 wide-pre-Box content-mediaBox">
     <p class="noAjaxData">자료가 존재하지 않습니다.</p>
    </div>
  </li>
<?php endif; ?>
</ul>

<?php if (is_array($mdChoiceBanner)): ?>
<script>
$(function(){
	//bxslider
	var slider2 =  $('.MDChoice .bxBanner > ul').bxSlider({
		auto: false,
		autoControls: false,
		stopAuto: false,
		speed:800,
		pause:7000
	});

	$(document).on('click','.bx-next, .bx-prev , .bx-pager-link , .bxBanner',function() {
		//slider2.stopAuto();
		//slider2.startAuto();
	});
});
</script>
<?php endif; ?>