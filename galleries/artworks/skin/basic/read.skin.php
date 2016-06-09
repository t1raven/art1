<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_artwork_view" class="content-mediaBox margin1">
			<section class="gallery_artwork_view">
				<div class="bx_left">
					<div class="bx_img">
						<div class="bx_slide">
							<ul>
							<?php if (is_array($artworksList)) : ?>
								<?php foreach($artworksList as $key => $val) : ?>
								<li<?php if ($key === 0) : ?> class="on"<?php endif ; ?>><img src="<?php echo galleriesArtworksUploadPath, 'r_', $val['upfileName']; ?>" alt="" class="ict_hide"/></li>
								<?php endforeach; ?>
							<?php endif ; ?>
								<!--
								<li><img src="/images/galleries/img_work1.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work2.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work3.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work4.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work5.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work6.jpg" alt="" /></li>
								<li><img src="/images/galleries/img_work7.jpg" alt="" /></li>
								-->
							</ul>
						</div>
						<div class="thumnail">
							<ul>
							</ul>
						</div>
					</div>
				</div>
				<div class="bx_right">
					<header>
						<h3><span><?php echo $artworks->attr['artistNameEn']; ?></span> <button class="view_more" onclick="mvArtist('<?php echo $idx; ?>', '<?php echo $artworks->attr['artistIdx']; ?>');"><span>자세히보기</span></button></h3>
						<h4><?php echo $artworks->attr['worksNameEn'], ', ', $artworks->attr['makingDate']; ?></h4>
						<p><?php echo $artworks->attr['material']; ?></p>
						<p><?php echo $artworks->attr['height']; ?> x <?php echo $artworks->attr['width']; ?><?php if (!empty($artworks->attr['depth'])) : ?> x  <?php echo $artworks->attr['depth']; ?><?php endif ; ?> cm</p>
					</header>
					<div class="btns">
					<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
						<button onclick="sendRequest('<?php echo $idx; ?>', '<?php echo $widx; ?>');">Direct Price Request<span class="h_ov">작품가격 바로 문의</span></button>
						<button onclick="popFn.show($('#pop_contact_gallery'));">Contact Gallery<span class="h_ov">작품 상세 문의</span></button>
					<?php else : ?>
						<button onclick="goLogin();">Direct Price Requests<span class="h_ov">작품가격 바로 문의</span></button>
						<button onclick="goLogin();">Contact Gallery<span class="h_ov">작품 상세 문의</span></button>
					<?php endif ; ?>
						<?php if ($isExhibition > 0) : ?><button onclick="goExhibition('<?php echo $idx; ?>', '<?php echo $artworks->attr['artistIdx']; ?>');">View the Exhibition<span class="h_ov">전시회 보기</span></button><?php endif ; ?>
					</div>
					<div class="links">
						<ul class="g_sns_type1">
							<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtworksUploadPath, $artworks->attr['upfileName']; ?>', '<?php echo urlencode($artworks->attr['worksNameEn']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($artworks->attr['material'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_1_on.png" alt="" /></span></a></li>
							<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $artworks->attr['worksNameEn']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t1_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_4_on.png" alt="" /></span></a></li>
							<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtworksUploadPath, $artworks->attr['upfileName']; ?>', '<?php echo str_replace("'", '', $artworks->attr['worksNameEn']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t1_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t1_3_on.png" alt="" /></span></a></li>
						</ul>
					</div>
				</div>
			</section>
		</div>

	<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
		<div id="pop_common"></div>
		<div id="pop_contact_gallery" class="pop_type1 pop_gallery">
			<div class="inner">
				<h2 class="area_lato">Contact Gallery <button class="btn_close" onclick="popFn.hide($('#pop_contact_gallery'));"><img src="/images/market/btn_close3_off.png" alt="닫기" /></button></h2>
				<div class="cont">
					<div class="bx_info">
						<div class="img"><img src="<?php echo galleriesArtworksUploadPath, $artworksList[0]['upfileName']; ?>" alt="" /></div>
						<div class="info">
							<h3><?php echo $artworks->attr['artistNameEn']; ?></h3>
							<h4><?php echo $artworks->attr['worksNameEn'], ', ', $artworks->attr['makingDate']; ?></h4>
							<p><?php echo $artworks->attr['height']; ?> x <?php echo $artworks->attr['width']; ?><?php if (!empty($artworks->attr['depth'])) : ?> x  <?php echo $artworks->attr['depth']; ?><?php endif ; ?> cm</p>
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
					<div class="btns"><button type="button" id="btnSend">Send</button></div>
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
		</div><!-- pop_contact_gallery -->

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
		</div><!-- pop_contact_gallery -->
	<?php endif ; ?>

	</div><!-- //container_inner -->
</section><!-- //container_sub -->

<script>
function goLogin() {
	alert('로그인 후 이용할 수 있습니다.');
	//location='/member/login.php?returnUrl='+location.href;
	location='/member/login.php?returnUrl=<?php echo $url; ?>';
}
function mvArtist(idx, aidx) {
	window.location.href ="/galleries/artists/?at=read&idx="+idx+"&aidx="+aidx;
}
function alignSpot(){
	var bxImg = $("#area_gallery_artwork_view .gallery_artwork_view .bx_img");
	iCutterInOwen("#area_gallery_artwork_view .gallery_artwork_view .bx_img .bx_slide > ul > li")
	var artSpot = bxImg.find(".bx_slide > ul > li");
	var len = artSpot.length;
	if(len > 1){
		var str = "";
		for(var k = 0 ; k < len ; k++){
			var img = artSpot.eq(k).html();
			str +='<li '+(k==0 ? "class=\'on\'" : "")+'><div class="inner"><a href="javascript:;">'+img+'</a></div></li>'
		}
		bxImg.find(".thumnail > ul").html(str);
		iCutterOwen("#area_gallery_artwork_view .thumnail a");
		bxImg.find(".thumnail a").on('click',function(){
			var conLi = bxImg.find(".bx_slide > ul > li");
			var par = $(this).parent().parent();
			var idx = par.index();
			collaboSpotMotion({tab : par, con : conLi, idx : idx});
		})
	}
}

function collaboSpotMotion(o){
	if(!o.tab.hasClass('on')){
		o.tab.siblings('.on').removeClass('on').end().addClass('on');
		o.con.eq(o.idx).siblings('.on').removeClass('on').end().addClass('on');
	}
}
alignSpot();

<?php if (!empty($_SESSION['user_id']) && $_SESSION['logged_in']  === 1) : ?>
$(function(){
	$("#btnSend").click(function() {
		sendContact();
	});
	//popFn.show($('#pop_contact_gallery_sent'));
});

function sendRequest(idx, widx) {
	$.ajax({
		type:"POST",
		url:"request.php",
		dataType:"json",
		data:{"idx":idx, "widx":widx, "at":"request"},
		success: function(data){
			if (data.cnt > 0) {
				popFn.show($('#pop_direct_request_gallery'));
				//console.log(data);
				//$("#table-artworks > tbody").html(data);
			}
			else {
				alert("메일 전송 실패!!");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}

function sendContact(){
	var pattern = /([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/;
	if ($("#email").val().trim() == "") {
		alert("이메일을 입력하세요.");
		return false;

	}
	else {
		if (!pattern.test($("#email").val())) {
			alert("이메일이 유효하지 않습니다.");
			return false;
		}
	}

	if ($("#msg").val().trim() == "") {
		alert("문의 내용을 입력하세요.");
		return false;
	}
	else {
		$.ajax({
			type:"POST",
			url:"contact.php",
			dataType:"json",
			data:{"idx":$("#idx").val(), "widx":$("#widx").val(), "email":$("#email").val(), "name":$("#name").val(), "phone":$("#phone").val(), "msg":$("#msg").val()},
			success: function(data){
				if (data.cnt > 0) {
					popFn.change({prev:$('#pop_contact_gallery'), next : $('#pop_contact_gallery_sent')});
				}
				else {
					alert("메일 전송 실패!!");
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}
<?php endif ; ?>
function goExhibition(idx, aidx) {
	location.href = "/galleries/exhibitions?idx="+idx+"&aidx="+aidx;
}
</script>

