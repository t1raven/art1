<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_artwork" class="content-mediaBox margin1">
			<section class="sect_artworks">
				<div class="gallery_list_artwork">
					<ul>
					<?php if (is_array($list)) : ?>
						<?php foreach($list as $val) : ?>
						<!--
						<li>
							<div class="inner">
								<div href="" class="img out_cover">
									<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_'.$val['upfileName']; ?>" alt="" />
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
								<div href="javascript:;" class="img out_cover"onclick="showLayerArtworksView('<?php echo $idx; ?>', '<?php echo $val['worksIdx']; ?>', '', '', '', 'artworks');">
									<img class="area_zoom" src="<?php echo galleriesArtworksUploadPath, 'l_'.$val['upfileName']; ?>" alt="" />
									<a class="cover" href="javascript:;">
										<div class="detail_circle"><span></span></div>
									</a>
								</div>
								<h4><?php echo $val['artistNameEn']; ?></h4>
								<p><?php echo $val['worksNameEn']; ?></p>
							</div>
						</li>
						<?php endforeach ; ?>
					<?php else : ?>
						<li>
							<div style="text-align:center">No data </div>
						</li>
					<?php endif ; ?>
					</ul>
				</div>
			</section>
		</div>
	</div><!-- //container_inner -->
</section><!-- //container_sub -->
