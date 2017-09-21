<?php if (!defined('OKTOMATO')) exit; ?>
			<?php if (is_array($list)) : ?>
				<?php foreach ($list as $row) : ?>
				<div class="box-thumb">
					<a href="javascript:void(0);" class="inner">
						<?php if ($_SESSION['user_idx']): ?>
						<span class="thumb" onclick="bpop('<?php echo $row['works_idx']; ?>'); return false;">
						<?php else: ?>
						<span class="thumb" onclick="layerPopup3.open('index.php','popup_join', '', {'at':'join'});return false;">
						<?php endif; ?>
							<span class="img"><img src="/upload/articovery/thumb/<?php echo $row['works_img']; ?>" alt=""></span>
						</span>
						<span class="cont">
							<span class="h"><?php echo $row['works_make_type']; ?></span>
							<span class="pin">
								<span class="img"><img src="/images/articovery/img_pin_<?php if (in_array($row['works_idx'], $aryMyPin)) : ?>on<?php else: ?>off<?php endif; ?>.png" id="img-pin-<?php echo $row['works_idx']; ?>" alt=""></span>
								<span class="t1">PIN <?php echo number_format($row['works_pin_count']); ?></span>
							</span>
						</span>
					</a>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
