<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_news_view" class="content-mediaBox margin1">
			<section id="bbs_view_ty1">
				<div class="inner">
					<header class="header">
						<h1><strong><?php echo $news->attr['news_category_name']; ?></strong><?php echo $news->attr['news_title']; ?></h1>
						<p class="data"><?php echo str_replace('-', '.', substr($news->attr['create_date'], 0, 10)); ?></p>
						<ul class="util clearfix">
							<!--li><a href="#" class="mail">메일보내기</a></li-->
							<li><a href="#" class="print" id="btnPrint1" onclick="print_ok();">프린트하기</a></li>
						</ul>
						<article class="content">
							<div class="bbs_infor">
								<!--p><a class="file" href=""><img src="/images/galleries/ico_attached_file.gif" alt="" /> <span>첨부파일1.jpg</span></a></p-->
								<p><span class="writer"><strong>[<?php echo $news->attr['source'];?>]</strong> <?php echo $news->attr['reporter_name'];?></p>
							</div>
							<ul class="ico_list">
								<li><a href=""><img src="/images/bbs/ico_bbs_view1_off.gif" alt="페이스북" /></a></li>
								<!--
								<li><a href=""><img src="/images/bbs/ico_bbs_view3_off.gif" alt="인스타그램" /></a></li>
								<li><a href=""><img src="/images/bbs/ico_bbs_view4_off.gif" alt="픽터파이" /></a></li>
								-->
								<li><a href=""><img src="/images/bbs/ico_bbs_view5_off.gif" alt="구글플러스" /></a></li>
								<li><a href=""><img src="/images/bbs/ico_bbs_view2_off.gif" alt="핀터레스트" /></a></li>
							</ul>
						</article><!-- //content -->
					</header><!-- //header -->

<?php
foreach($list as $row) {

	if (empty($news->attr['file_code']) || substr($row['up_file_name'], 0, 4)  != 'http') {
		$img_src = newsUploadPath.$row['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
	}
	else {
		$img_src =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
	}




	if ($row['img_or_video']=='img') {
		if (!empty($row['up_file_name'])) {
	?>
						<div class="img" style="max-width:600px; text-align:center; margin:0 auto;">
							<span style="display:block; margin-bottom:15px;"><img style="max-width:100%;" src="<?php echo $img_src;?>" alt=""></span>
							<p style="margin-bottom:20px;"><?php echo $row['img_comment'];?></p>
						</div>
	<?php
		}
	}
	elseif($row['img_or_video']=='video') {
		if (!empty($row['video_url'])) {
			$aYtUrl = explode('/',htmlspecialchars_decode($row['video_url']));
			$youtubeCode = array_pop($aYtUrl);
	?>
						<p style="text-align:center;margin-bottom: 30px;">
						<div style="max-width:560px; margin:auto;margin-bottom:30px;">
							<div style="position: relative; padding-bottom: 56.25%; height: 0;  overflow: hidden;">
							<iframe src="//www.youtube.com/embed/<?php echo $youtubeCode?>" frameborder="0" allowfullscreen style="position: absolute; top:0; left: 0; width: 100%; height: 100%;"></iframe>
							<!-- <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $youtubeCode?>" frameborder="0" allowfullscreen ></iframe> -->
							</div>
						</div>
						</p>
	<?php
		}
	}
	?>
						<p style="text-align:left; font-size: 15px; line-height: 22px; max-width:800px; margin:0 auto;">
						  <?php echo nl2br(LIB_LIB::get_special_tag_arrays($row['new_paragraph_content'], array('a','b')));?>
						</p>
	<?php
	//본문을 넣고 활성화할 태그를 배열로 넣는다.  (디비에 < :  &#60; ,  > : &#62; 로 변경되어 들어갔을때만 사용 가능)
	// get_special_tag_arrays($str, $strip_tags)
	?>
<?php } ?>

					<!--
					<div class="img" style="max-width:600px; text-align:center; margin:0 auto;">
						<span style="display:block; margin-bottom:15px;"><img style="max-width:100%;" src="/images/tmp/tmp_bbs_view.jpg" alt=""></span>
						<p style="margin-bottom:20px;">전소정_ 열두 개의 방, 잉크젯 프린트, 50x29cm_2014</p>
					</div>

					<p style="text-align:center; font-size: 15px; line-height: 22px; max-width:800px; margin:0 auto;">
					  전시는 영화 '마담뺑덕'의 등장하는 인물들의 오마쥬로 이루어진다. 학규(정우성)와 덕이(이솜) 그리고 학규의 딸 청이(박소영)의 방을 구성, 각 공간별로 캐릭터의 개성을 느낄 수 있는 작품들을 배치했다. 이번 전시는 영화 소품과 스틸컷을 전시하는 기존의 영화 전시회와 달리 5인의 현대 미술 작가들이 영화를 새로운 시각으로 재해석한 작품들을 창작해 그간 없던 새로운 영화와 미술의 예술적 결합을 선보인다. 특히 ‘학규의 Bad Room’이라는 전시공간에는 사전에 촬영한 정우성의 이미지를 침대 위에 투사, 관객이 침대 위에 누워 실제 배우와 함께 있는 듯한 느낌을 받을 수 있는 작품이 전시돼 있다. 더욱이 침대 위에 투사된 정우성 이미지는 고정된 이미지가 아니라 여러 동작을 반복한다. 또 관람객은 정우성의 친절한 해설을 들을 수 있다. 정우성의 목소리가 담긴 오디오 가이드가 마련됐다. 지난 18일 정우성과 이솜이 갤러리 정식 오픈 전에 직접 방문해 전시에 대한 기대감을 드러내기도 했다.
					</p>
					-->
				</div><!-- //inner -->
			</section><!-- //bbs_view_ty1 -->
			<!--
			<div class="comentArea">
				<div class="inputBox">
					<span class="input"><textarea name="" id="" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
				</div>
				<div class="replyBox">
					<div class="reply">
						<div class="inner">
							<p class="infor"><span class="writer">Oktom***</span><span class="time">2014/05/30 09:14</span></p>
							<ul class="btn_list">
								<li class="reply_input_btn"><a href="#" onclick="return false;">댓글</a></li>
								<li><a href="#">삭제</a></li>
								<li><a href="#">수정</a></li>
							</ul>
							<div class="cont">
								<p>세월호 참사때 나온 뉴스사진같습니다~~~<br />
								빠른시일에 모든것이 해결이 되고 하루빨리 경기도 회복이 되었으면 합니다~~~ 세월호 참사때 나온 뉴스사진같습니다~~~세월호 참사때 나온 뉴스사진같다.</p>
							</div>
							<button class="btn_reply">답글 1</button>
						</div>
						<div class="reply input">
							<div class="inner">
								<p class="infor"><span class="writer">작성자명</span></p>
								<div class="inputBox">
									<span class="input"><textarea name="" id="" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
								</div>
							</div>
						</div>
					</div>
					<div class="reply by">
						<div class="inner">
							<p class="infor"><span class="writer">Oktom***</span><span class="time">2014/05/30 09:14</span></p>
							<ul class="btn_list">
								<li><a href="">삭제</a></li>
								<li><a href="">수정</a></li>
							</ul>
							<div class="cont">
								<p>세월호 참사때 나온 뉴스사진같습니다~~~<br />
								빠른시일에 모든것 이 해결이 되고 하루빨리 경기도 회복이 되었으면 합니다~~~ 세월호 참사때 나온 뉴스사진같습니다~~~세월호 참사때 나온 뉴스사진같다.</p>
							</div>
						</div>
					</div>
					<div class="reply">
						<div class="inner">
							<p class="infor"><span class="writer">Oktom***</span><span class="time">2014/05/30 09:14</span></p>
							<ul class="btn_list">
								<li class="reply_input_btn"><a href="#" onclick="return false;">댓글</a></li>
								<li><a href="#">삭제</a></li>
								<li><a href="#">수정</a></li>
							</ul>
							<div class="cont">
								<p>세월호 참사때 나온 뉴스사진같습니다~~~<br />
								빠른시일에 모든것이 해결이 되고 하루빨리 경기도 회복이 되었으면 합니다~~~ 세월호 참사때 나온 뉴스사진같습니다~~~세월호 참사때 나온 뉴스사진같다.</p>
							</div>
							<button class="btn_reply">답글 0</button>
						</div>
						<div class="reply input">
							<div class="inner">
								<p class="infor"><span class="writer">작성자명</span></p>
								<div class="inputBox">
									<span class="input"><textarea name="" id="" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
								</div>
							</div>
						</div>
					</div>

					<div class="reply">
						<div class="inner">
							<p class="infor"><span class="writer">Oktom***</span><span class="time">2014/05/30 09:14</span></p>
							<ul class="btn_list">
								<li class="reply_input_btn"><a href="#" onclick="return false;">댓글</a></li>
								<li><a href="#">삭제</a></li>
								<li><a href="#">수정</a></li>
							</ul>
							<div class="cont">
								<p>세월호 참사때 나온 뉴스사진같습니다~~~<br />
								빠른시일에 모든것이 해결이 되고 하루빨리 경기도 회복이 되었으면 합니다~~~ 세월호 참사때 나온 뉴스사진같습니다~~~세월호 참사때 나온 뉴스사진같다.</p>
							</div>
							<button class="btn_reply">답글 0</button>
						</div>
						<div class="reply input">
						<div class="inner">
							<p class="infor"><span class="writer">작성자명</span></p>
							<div class="inputBox">
								<span class="input"><textarea name="" id="" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			-->

			<div class="btn_bot">
				<div class="lft_group">
					<?php if (!empty($prevHref)) : ?><a href="<?php echo $prevHref; ?>" class="btn_pack prev samll">이전글</a><?php endif ; ?>
					<?php if (!empty($nextHref)) : ?><a href="<?php echo $nextHref; ?>" class="btn_pack next samll">다음글</a><?php endif ; ?>
				</div>
				<div class="rgh_group">
					<a href="/galleries/news/?idx=<?php echo $idx; ?>" class="btn_pack samll">목록</a>
				</div>
			</div><!-- //btn_bot -->
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script type="text/javascript">
$(".reply .btn_list .reply_input_btn").click(function(){
	if ($(this).parents(".reply").find(".reply.input").css("display") == "none") {
		$(this).parents(".reply").find(".reply.input").slideDown();
	}else{
		$(this).parents(".reply").find(".reply.input").slideUp();
	}
});
$(".btn_reply").click(function(){
	if ($(this).parents(".reply").next(".reply.by").css("display") == "none") {
		$(this).addClass("on").parents(".reply").next(".reply.by").slideDown();
	}else{
		$(this).removeClass("on").parents(".reply").next(".reply.by").slideUp();
	}
});

$(".ico_list li").hover(function(){
$(this).find("img").attr("src",$(this).find("img").attr("src").split("_off").join("_on"));
},function(){
$(this).find("img").attr("src",$(this).find("img").attr("src").split("_on").join("_off"));
});

iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
$(window).resize(function(){
	iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
})

function print_ok() {
	window.open("/news/print_pop.php","print_iframe");
}
</script>
<iframe name="print_iframe" id="print_iframe" src="" width="0" height="0" style="display:"></iframe>