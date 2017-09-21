<div class="pos">
<?php if ($user_level == '99') : ?>

	<?php foreach($myPinList as $row) : ?>
	<div class="thumb">
		<?php if (!empty($row['works_img'])) : ?>
		<a href="#" class="i-cut" onclick="bpop('<?php echo $row['works_idx']; ?>'); return false;"><img src="<?php echo articoverySmallImgUploadPath.$row['works_img']; ?>" alt=""></a>
		<?php else: ?>
		<a href="javascript:;" class="i-cut" onclick="void(0);"><img src="/images/articovery/img_noimg.gif" alt=""></a>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>

<?php else : ?>

	<?php for($i = 0; $i < 9; $i++) : ?>
	<div class="thumb">
		<?php if (!empty($myPinList[$i]['works_img'])) : ?>
		<a href="#" class="i-cut" onclick="bpop('<?php echo $myPinList[$i]['works_idx']; ?>'); return false;"><img src="<?php echo articoverySmallImgUploadPath.$myPinList[$i]['works_img']; ?>" alt=""></a>
		<?php else: ?>
		<a href="javascript:;" class="i-cut" onclick="void(0);"><img src="/images/articovery/img_noimg.gif" alt=""></a>
		<?php endif; ?>
	</div>
	<?php endfor; ?>

<?php endif ; ?>
</div>
