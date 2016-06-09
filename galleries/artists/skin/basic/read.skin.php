<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_artist_view" class="content-mediaBox margin1">
			<section class="gallery_artist_view">
				<div class="bx_left area_lato">
					<header>
						<dl>
							<dt>
								<div class="img">
									<img src="<?php echo galleriesArtistsUploadPath, $artists->attr['upfileName']; ?>" alt="" />
								</div>
							</dt>
							<dd>
								<div class="links">
									<ul class="link_share_btns t2">
										<?php if ($isExhibition > 0) : ?>
										<li class="calender">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_photo.png" alt="exhibition" /><span class="h_on"><img src="/images/galleries/ico_photo_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<div class="txt"><a href="/galleries/exhibitions?idx=<?php echo $idx; ?>&aidx=<?php echo $aidx ; ?>" class="text">View the Exhibition</a></div>
												<div class="tail"></div>
											</div>
										</li>
										<?php endif ; ?>
										<li class="sns">
											<a href="javascript:;" class="img_h">
												<span><img src="/images/galleries/ico_link2.png" alt="Link Share" /><span class="h_on"><img src="/images/galleries/ico_link2_on.png" alt="" /></span></span>
											</a>
											<div class="hv">
												<ul>
													<li><a href="javascript:;" onclick="shareFaceBook('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtistsUploadPath, $artists->attr['upfileName']; ?>', '<?php echo urlencode($artists->attr['artistNameEn']); ?>','<?php echo urlencode(substr(strip_tags(htmlspecialchars_decode($artists->attr['introduction'])), 0, 20)); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_1.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_1_on.png" alt="" /></span></a></li>
													<li><a href="javascript:;" onclick="shareGooglePlus('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo str_replace("'", '', $artists->attr['artistNameEn']); ?>');" class="bx_img_h"><img src="/images/galleries/ico_sns_t2_3.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_3_on.png" alt="" /></span></a></li>
													<li><a href="javascript:" onclick="sharePinterest('<?php echo $PUBLIC['HOME'], $_SERVER['REQUEST_URI']; ?>', '<?php echo $PUBLIC['HOME'], galleriesArtistsUploadPath, $artists->attr['upfileName']; ?>', '<?php echo str_replace("'", '', $artists->attr['artistNameEn']); ?>');"class="bx_img_h"><img src="/images/galleries/ico_sns_t2_4.png" alt="" /><span class="h_on"><img src="/images/galleries/ico_sns_t2_4_on.png" alt="" /></span></a></li>
												</ul>
												<div class="tail"></div>
											</div>
										</li>
									</ul>
								</div>
								<div class="inner">
									<h4><?php echo $artists->attr['artistNameEn']; ?></h4>
									<p><?php if (!empty($artists->attr['birthday'])) { echo '(', $artists->attr['birthday'], '- )'; } else { echo 'Closed'; } ?></p>
								</div>
							</dd>
						</dl>
					</header>
					<div class="con">
						<p><?php echo nl2br($artists->attr['introduction']); ?></p>
					</div>
				</div>

				<div class="bx_right">
					<h3 class="area_lato">Artworks <span>(<?php echo $myArtworksCnt; ?>)</span></h3>
					<section class="sect_artworks">
						<?php if (is_array($myArtworksList)) : ?>
						<div class="gallery_list_artwork">
							<ul>
								<?php foreach($myArtworksList as $val) : ?>
								<!--
								<li>
									<div class="inner">
										<div href="" class="img out_cover">
											<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
											<a class="cover" href="/galleries/artworks/?at=read&idx=<?php echo $idx; ?>&widx=<?php echo $val['worksIdx']; ?>">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?php echo $val['artistNameEn']; ?></h4>
										<p><?php echo $val['worksNameEn']; ?></p>
									</div>
								</li>
								-->
								<li>
									<div class="inner">
										<div href="javascript:;" class="img out_cover" onclick="showLayerArtworksView('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>', '', '<?php echo $aidx ; ?>', '', 'artists');">
											<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_', $val['upfileName']; ?>" alt="" />
											<a class="cover" href="javascript:;">
												<div class="detail_circle"><span></span></div>
											</a>
										</div>
										<h4><?php echo $val['artistNameEn']; ?></h4>
										<p><?php echo $val['worksNameEn']; ?></p>
									</div>
								</li>
								<?php endforeach ; ?>
							</ul>
						</div>
						<?php else : ?>
						<div style="text-align:center">Data does not exist.</div>
						<?php endif ; ?>
					</section>
				</div>
			</section>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
<script>
iCutterOwen(".gallery_artist_view header .img");
</script>
