<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_pair" class="content-mediaBox margin1">
			<section id="sect_gallery_fair" class="area_lato">
				<?php if (is_array($list)) : ?>
				<div class="gallery_list_fair">
					<h1>Current Art Fairs</h1>
					<ul>
						<?php foreach($list as $val) : ?>
						<li>
							<div href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>" class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesArtFairsUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
								<a class="cover" href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<div class="bx_links">
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['fairTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['fairTitleEn'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<h4><?php echo $val['fairTitleEn']; ?></h4>
								</div>
								<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="gallery_list_fair">
					<h1>Uncoming Art Fairs</h1>
					<ul>
						<?php foreach($list as $val) : ?>
						<li>
							<div href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>" class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesArtFairsUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
								<a class="cover" href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<div class="bx_links">
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['fairTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['fairTitleEn'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<h4><?php echo $val['fairTitleEn']; ?></h4>
								</div>
								<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="gallery_list_fair">
					<h1>Past Art Fairs</h1>
					<ul>
						<?php foreach($list as $val) : ?>
						<li>
							<div href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>" class="img out_cover">
								<img class="area_zoom" src="<?php echo galleriesArtFairsUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
								<a class="cover" href="/galleries/artfairs/?at=read&idx=<?php echo $idx; ?>&fidx=<?php echo $val['fairIdx']; ?>">
									<div class="detail_circle"><span></span></div>
								</a>
							</div>
							<div class="con">
								<div class="bx_links">
									<ul class="link_share_btns">
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_calender2.png" alt="Calendar" /><span class="h_on"><img src="/images/galleries/ico_calender2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_1.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_1_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="googleCal('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_2.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_2_on.png" alt=""></span></a></li>
													<li><a href="javascript:;" onclick="calendar('fair', '<?php echo $val['fairIdx']; ?>');" class="bx_img_h"><img src="/images/galleries/ico_cal_3.png" alt=""><span class="h_on"><img src="/images/galleries/ico_cal_3_on.png" alt=""></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo urlencode($val['fairTitle']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($val['fairTitleEn'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_2.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_2_on.png" alt="" /></span></a></li> -->
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtFairsUploadPath, $val['upfileName']; ?>', '<?php echo str_replace("'", '', $val['fairTitle']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
													<!-- <li><a href="" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_5.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_5_on.png" alt="" /></span></a></li> -->
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
									<h4><?php echo $val['fairTitleEn']; ?></h4>
								</div>
								<p><?php echo str_replace('-', '.', $val['beginDate']), ' ~ ', str_replace('-', '.', $val['endDate']); ?></p>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php else : ?>
					<div style="text-align:center">No data</div>
				<?php endif ; ?>
			</section>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script>
$.srSmoothscroll = function(options) {};
iCutterOwen(".gallery_list_fair .img");
</script>
