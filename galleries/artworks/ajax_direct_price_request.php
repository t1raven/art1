<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/galleries/init.class'.SOURCE_EXT;

$idx = isset($_POST['idx']) ? (int)LIB_LIB::CkSearch($_POST['idx']) : null;
$widx = isset($_POST['widx']) ? (int)LIB_LIB::CkSearch($_POST['widx']) : null;

if (empty($idx) || $idx === 1 || empty($widx)) {
	//header('Location:/notfound.html');
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($widx) && is_numeric($widx)) {
	if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) {
		$userEmail = AES256::dec($_SESSION['user_id'], AES_KEY);

		if (!empty($_SESSION['user_id'])) {
			$userId = explode('@', $userEmail)[0];
		}
		else {
			$userId = null;
		}

		$init = new Init();
		$init->setAttr('idx', $idx);
		$galleryName = $init->getGalleryName($dbh);
		$init = null;
		unset($init);
	}
	else {
		exit;
	}
}
?>
<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
	<div id="pop_direct_request_gallery" class="pop_type1 pop_gallery">
		<div class="inner">
			<h2 class="area_lato">Direct Price Request <button class="btn_close" onclick="popFn.hide($('#pop_direct_request_gallery'));"><img src="/images/market/btn_close3_off.png" alt="닫기" /></button></h2>
			<div class="cont">
				<div class="bx_completed">
					<h3><strong><?php echo $userId; ?></strong> 님</h3>
					<p><strong><?php echo $galleryName; ?></strong> 에 작품 가격 문의가 전달되었습니다.</p>
					<p>가까운 시일 내에 이용하고 계신 메일로 답변이 도착할 예정입니다.</p>
					<p>갤러리즈를 이용해주셔서 감사합니다.</p>
				</div>
				<div class="bx_completed">
					<h3>Dear <strong><?php echo $userId; ?></strong></h3>
					<p>A price request has been sent to <strong><?php echo $galleryName; ?></strong> regarding the artwork.</p>
					<p>You should receive a reply email from the gallery soon.</p>
					<p>Thank you for visiting galleries.</p>
				</div>
			</div>
		</div>
	</div><!-- pop_direct_request_gallery -->
<?php endif ; ?>