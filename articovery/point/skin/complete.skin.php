<?php if (!defined('OKTOMATO')) exit; ?>
<div class="btn_close_wrap">
	<button type="button" name="">
		<img src="/images/articovery/ico_closex.png" alt="닫기">
	</button>
</div>

<?php if ($isPointAble) : ?>
	<div class="text_wrap">
		<p class="title"><?php echo $artist; ?> 작가에 대한 POINT를 완료하셨습니다!</p>
		<?php if ($user_level == '20') : ?>
		<!-- 전문가 패널 -->
		<p class="subtitle">Point하신 내용은 다른 전문가 패널에게 공개되지 않으며, 합산된 전문가 패널의 합계 평균값만 최종 공개됩니다.</p>
		<p class="descript">Point하신 점수와 작품평의 내용은 전문가 패널 심사기간(2017년 6월 21일 ~ 29일) 내에 수정 가능합니다.</p>
		<?php else : ?>
		<!-- 일반 패널 -->
		<p class="subtitle">TOP9 작가의 작품을 모두 POINT 하셔야 참여가 완료됩니다.</p>
		<p class="descript">(9명의 POINT 완료 후, 연락처 등록까지 해주셔야 이벤트 참여가 모두 완료됩니다.)</p>
		<?php endif ; ?>
	</div>

	<div class="content_wrap">
		<div class="review_area">
			<p class="tit_review">[완료한 POINT 리스트]</p>
			<div class="review_li">
				<ul>
					<?php foreach ($select as $key => $row) : ?>
					<li<?php if (in_array($select[$key]['artist_idx'], $aryArtistIdx)): ?> class="on"<?php endif; ?> onclick="read('<?php echo $row['covery_idx']; ?>','<?php echo $row['point_idx']; ?>');">
						<div><img src="<?php echo $aryImage[$key]; ?>" alt=""></div>
						<p><?php echo $select[$key]['artist_name']; ?></p>
					</li>
					<?php endforeach ; ?>
				</ul>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="text_wrap">
		<!-- 기간 만료 -->
		<p class="subtitle">POINT 기간이 아니거나 기간이 만료되었습니다.</p>
		<p class="descript">POINT 기간에만 평가 할 수 있습니다.</p>
	</div>
<?php endif ; ?>

<div class="btn_wrap">
	<button type="button" name="button" onclick="list();">POINT 메인 화면으로 돌아가기</button>
</div>
<script type="text/javascript">
$(function(){
	$(".btn_close_wrap > button").click(function(){
		$(".point_pop_wrap").hide();
		$(".popup_bg").hide();
	});
});
</script>
