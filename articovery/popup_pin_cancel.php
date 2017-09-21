<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

if ($_SESSION['user_idx']) {
	require(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');
	$works_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;

}
else{
	exit;
}
?>
<section id="pop_alert1">
	<header>
		<button class="close b-close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
		 </header>
		<div class="ta-c mb30"><img src="/images/articovery/img_f.gif" alt=""></div>
		<div class="box">
			<div class="t1">선택한 PIN 작품을 취소하시겠습니까?</div>
			<div class="btnbot">
				<button class="btnColor_1 b-close">아니오</button>
				<button class="btnColor_2 b-close" onclick="setMyPinCancel('<?php echo $works_idx; ?>');">예</button>
			</div>
		</div>
</section>
