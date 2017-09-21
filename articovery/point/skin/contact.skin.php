<?php if (!defined('OKTOMATO')) exit; ?>
<div class="btn_close_wrap">
	<button type="button" name="">
		<img src="/images/articovery/ico_closex.png" alt="닫기">
	</button>
</div>
<div class="text_wrap">
	<p class="title">모든 POINT를 완료하셨습니다</p>
	<p class="subtitle">이벤트 상품 수령을 위해, 반드시 연락처를 남겨주세요.</p>
	<p class="descript">추첨을 통해 TOP1 작가의 원화 작품을 드립니다.</p>
</div>
<div class="content_wrap">
	<div class="email">
			<label for="hpfgf" class="h">핸드폰 번호</label>
			<input type="tel" class="inp_eamil mb25" name="contact" id="contact" maxlength="11" placeholder="‘-’  제외" >
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
					<label for="roll_agree">이용약관에 동의하시겠습니까? 약관 동의 내용을 보시려면 <span class="c-point"><a href="/service/terms.php" class="here c-point fw-b" target="_blank">여기</a></span>를 클릭하세요</label>
				</p>
				<p>
					<input type="checkbox" name="private_agree" id="private_agree" value="Y">
					<label for="private_agree">개인정보 취급방침에 동의하시겠습니까? 개인정보 취급방침 내용을보시려면 <span class="c-point"><a href="/service/policy.php" class="here c-point fw-b" target="_blank">여기</a></span>를 클릭하세요</label>
				</p>
			</div>
	</div>
	<div class="btn_wrap a_center">
		<button class="btnColor_1 b-close">취소</button>
		<button class="btnColor_2" onclick="setPointContact();">완료</button>
	</div>
</div>

<script>
$(function(){
	$(".btn_close_wrap > button").add(".btn_wrap > button.btnColor_1").click(function(){
		$(".point_pop_wrap").hide();
		$(".popup_bg").hide();
	});
});
function setPointContact(){
	var regNumber = /^[0-9]*$/;
	var contact = $("#contact").val();
	if(contact.trim() == ""){
		alert("핸드폰 번호를 입력하세요.");
		$("#contact").focus();
		event.stopPropagation();
		return false;
	}else{
		if(!regNumber.test(contact)){
			alert("핸드폰 번호는 숫자만 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
		if(contact.length < 10){
			alert("핸드폰 번호가 유효하지 않습니다.다시 입력해 주세요.");
			$("#contact").focus();
			event.stopPropagation();
			return false;
		}
	}

	if ($(":radio[id=sms_agree1]").is(":checked") == false){
		alert("sms 수신동의에 동의 하셔야 합니다.");
		$("#sms_agree1").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="roll_agree"]').is(":checked") == false ){
		alert("이용약관에 동의 하셔야 합니다.");
		$("#roll_agree").focus();
		event.stopPropagation();
		return false;
	}

	if ($('input:checkbox[id="private_agree"]').is(":checked") == false ){
		alert("개인정보 취급방침에 동의 하셔야 합니다.");
		$("#private_agree").focus();
		event.stopPropagation();
		return false;
	}

	$.ajax({
		url:"index.php",
		type:"post",
		data:{"covery":$("#covery").val(), "contact":contact, "at":"cupdate"},
		dataType:"json",
		success: function(data){
			if(data.result == 1){
				$(".popup_bg").fadeOut();
				$(".point_pop_wrap.complete").fadeOut();
				$(".point_pop_alert").fadeIn();
				$(".point_pop_alert > div.btn_wrap > button").text("등록되었습니다.");
			}else{
				if(data.dup == 1){
					alert("이미 응모하셨기 때문에 더 이상 응모할 수 없습니다.");
				}else{
					alert("등록 오류가 발생했습니다.\r\n관리자에게 문의하여 주세요");
				}
			}
		},
		error: function(xhr, status, error){
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}
</script>
