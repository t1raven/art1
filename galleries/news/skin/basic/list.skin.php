<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_news" class="content-mediaBox margin1">
			<section class="sect_gallery_news">
				<div id="bbs_thumb_t5" class="type_gallary">
					<header class="header">
						<p class="total">총 <strong><?php echo number_format($totalCnt); ?></strong>개의 글이 등록되었습니다.</p>
						<div class="bx_search">
							<form name="searchFrm"  action="?<?php echo $param;?>" method="get" onsubmit="return getSubmit()">
							<p><input type="hidden" name="idx" value="<?php echo $idx; ?>"><input type="text" name="sw" id="sw" title="검색어 입력" value="<?php echo $sw;?>"> <button class="btn_pack samll2 black area_lato">Search</button></p>
							</form>
						</div>
					</header>
					<ul>
					<?php if ($totalCnt > 0) : ?>
						<?php foreach($list as $val)  : ?>
						<?php
								//목록 이미지S
								if (empty($val['news_main_up_file_name'])) {
									if (empty($val['file_code'])) {
										$list_img = newsUploadPath.$val['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
									}
									else{
										$list_img =$val['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
									}
								}
								else {
									$list_img = newsUploadPath.$val['news_main_up_file_name'];
								}
								//목록 이미지E
						?>
						<li>
							<?php if (!empty($list_img)) : ?>
							<div class="thumb">
								<a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><img src="<?php echo $list_img; ?>" alt=""></a>
							</div>
							<?php endif; ?>
							<div class="cont">
								<h1><a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo htmlspecialchars_decode($val['news_title']);?></a></h1>
								<p class="txt"><a href="/galleries/news/?at=read&idx=<?php echo $idx; ?>&nidx=<?php echo $val['idx']; ?>&article=<?php echo $val['news_idx']; ?>"><?php echo $val['new_paragraph_content'] ;?></a></p>
								<p class="data"><?php echo (empty($val['source'])) ? '' : '[', $val['source'], ']'  ;?> <?php echo $val['reporter_name'];?> | <?php echo str_replace('-', '.', substr($val['create_date'], 0, 10)); ?></p>
							</div>
						</li>
						<? endforeach; ?>
					<?php else : ?>
						<li>
							<div style="text-align:center">Data dose not exist.</div>
						</li>
					<?php endif ; ?>
					</ul>
				</div>
			</section>
			<?php echo $pageUtil->attr[pageHtml]; ?>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script>
iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
$(window).resize(function(){
	iCutterOwen("#bbs_thumb_t5 > ul > li .thumb");
});
function getSubmit(){
	if ($("#sw").val() == ""){
		alert("검색어를 입력하셔야 합니다.");
		$("#sw").focus();
		return false;
	}
}
</script>
