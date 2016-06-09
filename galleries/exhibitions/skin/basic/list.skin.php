<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_exhibition" class="content-mediaBox margin1">
			<?php if (is_array($topList)) : ?>
			<section class="sect_exhibitions" class="area_lato">
				<div class="gallery_list_exhi">
					<ul>
						<?php foreach($topList as $val): ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesExhibitionsUploadPath, $val['upfileName']; ?>" alt="" />
								<a class="cover" href="?at=read&idx=<?php echo $val['galleryIdx']; ?>&eidx=<?php echo $val['exhibitionIdx']; ?>">
									<div class="detail_circle big"><span></span></div>
								</a>
							</div>
							<div class="con">
								<header>
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('exhibition',  '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="calendar('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['exhibitionTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['description'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
								</header>
								<h3><?php echo $val['exhibitionTitleEn']; ?></h3>
								<p><?php echo $val['artistNameEn']; ?></p>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>

			<?php if (is_array($list)) : ?>
			<section class="sect_exhibitions_list" class="area_lato">
				<div class="gallery_list_exhi2">
					<ul>
						<?php foreach($list as $val): ?>
						<li>
							<div class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesExhibitionsUploadPath, 'l_', $val['upfileName']; ?>" alt="Exhibitions Image" />
								<a class="cover" href="?at=read&idx=<?php echo $idx; ?>&eidx=<?php echo $val['exhibitionIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<header>
									<ul class="link_share_btns">
										<li class="calender">											
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar Image" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>

											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="calendar('exhibition', '<?php echo $val['exhibitionIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share Image" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['exhibitionTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['description'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesExhibitionsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['exhibitionTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<div class="txt">
										<h4><?php echo $val['exhibitionTitleEn']; ?></h4>
										<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
									</div>
								</header>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
			<?php endif ; ?>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script src="/js/idangerous.swiper.min.js"></script>
<script>
iCutterOwen([".gallery_list_exhi .img", ".gallery_list_exhi2 .img"]);
</script>
