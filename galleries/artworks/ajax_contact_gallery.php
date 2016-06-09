<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/galleries/'.basename(__DIR__).'.class'.SOURCE_EXT;
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

		$artworks = new Artworks();
		$artworks->setAttr('idx', $idx);
		$artworks->setAttr('widx', $widx);

		if ($artworks->getRead($dbh)) {
			// 탭 메뉴을 위한 로직
			$init = new Init();
			$init->setAttr('idx', $idx);
			$galleryName = $init->getGalleryName($dbh);
			$init = null;
			unset($init);
		}
	}
	else {
		exit;
	}
}
?>
<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
	<div id="pop_contact_gallery" class="pop_type1 pop_gallery">
		<div class="inner">
			<h2 class="area_lato">Contact Gallery <button class="btn_close" onclick="popFn.hide($('#pop_contact_gallery'));"><img src="/images/market/btn_close3_off.png" alt="닫기" /></button></h2>
			<div class="cont">
				<div class="bx_info">
					<div class="img"><img src="<?php echo galleriesArtworksUploadPath, $artworks->attr['upfileName']; ?>" alt="" /></div>
					<div class="info">
						<h3><?php echo $artworks->attr['artistNameEn']; ?></h3>
						<h4><?php echo $artworks->attr['worksNameEn'], ', ', $artworks->attr['makingDate']; ?></h4>
						<p><?php echo $artworks->attr['material']; ?></p>
						<?php if ((int)$artworks->attr['height'] > 0 || (int)$artworks->attr['width'] > 0) : ?>
						<p><?php echo $artworks->attr['height']; ?> x <?php echo $artworks->attr['width']; ?><?php if (!empty($artworks->attr['depth'])) : ?> x  <?php echo $artworks->attr['depth']; ?><?php endif ; ?> cm</p>
						<?php else : ?>
						<p>Variable dimensions</p>
						<?php endif ; ?>

					</div>
				</div>
				<form name="frm" id="frm" method="post" onsubmit="return false;">
					<input type="hidden" name="at" value="contact">
					<input type="hidden" name="idx" id="idx" value="<?php echo $idx; ?>">
					<input type="hidden" name="widx" id="widx" value="<?php echo $widx; ?>">
					<dl class="bx_form">
						<dt>이메일 *</dt>
						<dd><input type="text" name="email" id="email" class="ipt_type2 w100p {label:'이메일',required:true,email:true}" maxlength="60" value="<?php echo $userEmail; ?>" /></dd>
						<dt>이름</dt>
						<dd><input type="text" name="name" id="name" class="ipt_type2 w100p {label:'이름',required:false,minlength:2,maxlength:50}" maxlength="50"/></dd>
						<dt>연락처</dt>
						<dd><input type="text" name="phone" id="phone" class="ipt_type2 w100p {label:'연락처',required:false,minlength:8,maxlength:30}"  maxlength="30"/></dd>
						<dt>문의내용 *</dt>
						<dd><textarea name="msg" id="msg" cols="30" rows="8" class="txa_type2 {label:'문의내용',required:true,minlength:5}" placeholder="문의 내용을 입력하세요."></textarea></dd>
					</dl>
				</form>
				<div class="btns"><button type="button" id="btnSend" onclick="sendContact();">Send</button></div>
			</div>
		</div>
	</div><!-- pop_contact_gallery -->

	<div id="pop_contact_gallery_sent" class="pop_type1 pop_gallery">
		<div class="inner">
			<h2 class="area_lato">Contact Gallery <button class="btn_close" onclick="popFn.hide($('#pop_contact_gallery_sent'));"><img src="/images/market/btn_close3_off.png" alt="닫기" /></button></h2>
			<div class="cont">
				<div class="bx_completed">
					<h3><strong><?php echo $userId; ?></strong> 님</h3>
					<p><strong><?php echo $galleryName; ?></strong> 에 작품 문의가 전달되었습니다.</p>
					<p>가까운 시일 내에 기재하신 메일로 답변이 도착할 예정입니다.</p>
					<p>갤러리즈를 이용해주셔서 감사합니다.</p>
				</div>
				<div class="bx_completed">
					<h3>Dear <strong><?php echo $userId; ?></strong></h3>
					<p>A request has been sent to <strong><?php echo $galleryName; ?></strong> regarding the artwork.</p>
					<p>You should receive a reply email from the gallery soon.</p>
					<p>Thank you for visiting galleries.</p>
				</div>
			</div>
		</div>
	</div><!-- pop_contact_gallery_sent -->
<?php endif ; ?>
<?php
$db = null;
$artworks = null;
unset($artworks);