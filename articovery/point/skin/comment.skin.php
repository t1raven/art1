<?php if (!defined('OKTOMATO')) exit; ?>
<div class="tbl_wrap">
	<table>
		<thead>
			<tr>
				<th colspan="4" class="tit_comment"><strong><?php echo sizeof($comments); ?> POINT & Comment</strong><!--<span>45 POINT / Comment</span>--></th>
				<th><a href="#" class="btn_extend" onclick="return false;"><img src="/images/articovery/ico_extend.png" alt=""></a></th>
			</tr>
		</thead>
		<tbody>
		<?php if (sizeof($comments) > 0) : ?>
			<?php foreach ($comments as $key => $row) : ?>
			<tr>
				<td class="user_ico">
					<span class="<?php echo $aryColor[array_rand($aryColor, 1)]; ?>"><?php echo strtoupper(substr($row['user_id'], 0, 1)); ?></span>
				</td>
				<td class="user_info">
					<p class="user_id"><?php echo explode('@', $row['user_id'])[0]; ?></p>
					<p class="write_time"><?php echo date('Y. n.j a g:i', strtotime($row['create_date'])); ?></p>
				</td>
				<td class="comment">
					<p><?php if ($row['display_state'] == 'Y') { echo $row['opinion']; } else { echo '블라인드 처리된 코멘트입니다.'; } ?></p>
				</td>
				<td class="sep_point">
					<div class="point_circle" data-point="<?php echo $row['technique_score']; ?>"></div>
					<div class="point_circle" data-point="<?php echo $row['artistic_score']; ?>"></div>
					<div class="point_circle" data-point="<?php echo $row['creativity_score']; ?>"></div>
					<div class="point_circle" data-point="<?php echo $row['potential_score']; ?>"></div>
				</td>
				<td class="avg_point">
					<p><?php echo $row['final_score']; ?></p>
				</td>
			</tr>
			<?php endforeach ; ?>
		<?php else : ?>
			<tr>
				<td colspan="5" style="text-align:center">자료가 존재하지 않습니다.</td>
			</tr>
		<?php endif ; ?>
		</tbody>
	</table>
</div>
<?php echo $pageUtil->attr[pageHtml]; ?>

<script>
$(function(){
	for ( var i = 0; i < $(".point_circle").length; i++ ) {
		$(".point_circle").eq(i).radialIndicator({
			radius:19,
			barWidth: 1,
			initValue: $(".point_circle").eq(i).data('point'),
			roundCorner : true,
			percentage: false,
			minValue: 0,
			maxValue: 10,
			barColor: '#000000',
			displayNumber: true
		});
	}
});
</script>
