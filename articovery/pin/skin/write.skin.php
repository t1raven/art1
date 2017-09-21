<?php if (!defined('OKTOMATO')) exit; ?>
<section id="pop_alert3">
	<header>
		<button class="close  b-close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
	</header>
	<div class="ta-c mb25"><img src="/images/articovery/img_f2.gif" alt=""></div>
	<div class="box">
		<div class="t1">모든 PIN을 완료하셨습니다</div>
		<p class="txt1">이벤트 상품 수령을 위해, 반드시 연락처를 남겨주세요.</p>
		<p class="txt2">추첨을 통해 빕스 식사권(2명 각 2매씩), 스타벅스 기프티콘(30명)을 드립니다.</p>
	</div>
	<div class="email">
			<label for="hpfgf" class="h">핸드폰 번호</label>
			<input type="text" class="inp_eamil mb25" name="contact" id="contact" maxlength="11" placeholder="‘-’  제외" >
			<input type="hidden" name="covery" id="covery" value="<?php echo $covery; ?>">
			<label for="hpfgf" class="h">sms 수신동의</label>
			<div class="fsf">
				<p class="fl">* sms 미 수신 시 이벤트 당첨이 취소됩니다</p>
				<p class="fr">
					<input type="radio" name="sms_agree" id="sms_agree1" value="Y" checked="checked">
					<label for="sms_agree1">예</label> &nbsp;
					<input type="radio" name="sms_agree" id="sms_agree2" value="N">
					<label for="sms_agree2">아니오</label>
				</p>
			</div>
			<div class="agree">
				<p>
					<input type="checkbox" name="roll_agree" id="roll_agree" value="Y">
					<label for="roll_agree">이용약관에 동의하시겠습니까? <span class="c-point">약관 동의 내용을 보시려면 <a href="/service/terms.php" class="here c-point fw-b" target="_blank">여기</a>를 클릭하세요</span></label>
				</p>
				<p>
					<input type="checkbox" name="private_agree" id="private_agree" value="Y">
					<label for="private_agree">개인정보 취급방침에 동의하시겠습니까? <span class="c-point">개인정보 취급방침 내용을보시려면 <a href="/service/policy.php" class="here c-point fw-b" target="_blank">여기</a>를 클릭하세요</span></label>
				</p>
			</div>
	</div>
	<div class="btnbot">
		<button class="btnColor_1 b-close">취소</button>
		<button class="btnColor_2 b-close" onclick="setPinContact();">완료</button>
	</div>
</section>
