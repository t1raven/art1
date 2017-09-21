<?php if (!defined('OKTOMATO')) exit; ?>

	<div class="btn_close_wrap">
		<button type="button" name="">
			<img src="/images/articovery/ico_closex.png" alt="닫기">
		</button>
	</div>

	<div class="text_wrap">
		<p class="title">POINT 기간이 아니거나 기간이 만료되었습니다.</p>
		<p class="subtitle">POINT 기간에만 평가 할 수 있습니다.</p>
		<p class="subtitle">POINT 이벤트에 응모하신 경우 작품을 수정할 수 없습니다.</p>
	</div>
	<!--
	<div class="btn_wrap">
		<button type="button" name="button" class="go_complete" >닫기</button>
	</div>
	-->


<script type="text/javascript">
$(function(){
	$(".btn_close_wrap > button").click(function(){
		$(".point_pop_wrap").hide();
		$(".popup_bg").hide();
	});
});
</script>
