<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

if ($_SESSION['user_idx']) {
	require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');

	$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
	$covery_idx = isset($_POST['idx']) ? (int)$_POST['idx'] : null;

	$Articovery = new Articovery();
	$Articovery->setAttr('covery_idx', $covery_idx);
	$Articovery->setAttr('user_idx', $user_idx);
	$myPinList = $Articovery->getMyPin($dbh);
?>
<div class="pos">
	<?php for($i = 0; $i < 9; $i++) : ?>
	<div class="thumb">
		<?php if (!empty($myPinList[$i]['works_img'])) : ?>
		<a href="#" class="i-cut" onclick="bpop('<?php echo $myPinList[$i]['works_idx']; ?>'); return false;"><img src="<?php echo articoverySmallImgUploadPath.$myPinList[$i]['works_img']; ?>" alt=""></a>
		<?php else: ?>
		<a href="javascript:;" class="i-cut" onclick="void(0);"><img src="/images/articovery/img_noimg.gif" alt=""></a>
		<?php endif; ?>
	</div>
	<?php endfor; ?>
</div>
<?php

	$dbh = null;
	$Articovery = null;
	unset($dhb);
	unset($Articovery);
}
