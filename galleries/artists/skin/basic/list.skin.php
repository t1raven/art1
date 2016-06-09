<?php if (!defined('OKTOMATO')) exit; ?>

<section id="container_sub">
	<div class="container_inner">
		<?php include '../../inc/path.php'; ?>
		<?php include '../tab_galleries.php'; ?>
		<div id="area_gallery_artist" class="content-mediaBox margin1">
			<section class="sect_artist area_lato">
				<div class="gallery_list_aritst">
					<ul>
					<?php if (is_array($list)) : ?>
						<?php foreach($list as $val) : ?>
						<li>
							<a href="/galleries/artists/?at=read&idx=<?php echo $idx; ?>&aidx=<?php echo $val['artistIdx']; ?>" class="img"><img src="<?php echo galleriesArtistsUploadPath, $val['upfileName']; ?>" alt="" /></a>
							<p><?php echo $val['artistNameEn']; ?></p>
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
<script>
iCutterOwen(".gallery_list_aritst .img");
</script>
