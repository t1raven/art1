<?php if (!defined('OKTOMATO')) exit; ?>
<section id="pop_alert1">
	<header>
		<button class="close b-close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
	</header>
	<div class="ta-c mb30"><img src="/images/articovery/img_f.gif" alt=""></div>
	<div class="box">
		<?php if ($IsContact == 0) : ?>
		<div class="t1">선택한 PIN 작품을 취소하시겠습니까?</div>
		<div class="btnbot">
			<button class="btnColor_1 b-close">아니오</button>
			<button class="btnColor_2 b-close" onclick="setMyPinCancel('<?php echo $works_idx; ?>', '<?php echo $flag; ?>');">예</button>
		</div>
	<?php else : ?>
		<div class="t1">이미 이벤트에 응모하였습니다.<p>더 이상 PIN을 취소할 수 없습니다.</p></div>
		<div class="btnbot">
			<button class="btnColor_1 b-close">닫기</button>
		</div>
	<?php endif ; ?>
	</div>
</section>
