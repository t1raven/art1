<?php if (!defined('OKTOMATO')) exit;?>

<input type="hidden" name="PMid" value="art1com0"><br> <!--가맹점id(필수)-->
<input type="hidden" name="PAmt" value="<?php echo $totalAccount;?>"><br><!--금액(필수)-->

<input type="hidden" name="t_PGoods" value="<?php echo $defaultGoodsName;?>"><!--상품명(필수)-->
<input type="hidden" name="POid" value="<?php echo $POid;?>"><!--주문번호(필수)-->
<input type="hidden" name="t_PMname" value="(주)아트1닷컴"><!--가맹점한글명(필수)-->
<input type="hidden" name="PEname" value="art1"><!--가맹점영문명(필수)-->
<input type="hidden" name="t_PUname" value="<?php echo AES256::dec($_SESSION['user_name'], AES_KEY);?>"><!--주문자명(필수)-->
<input type="hidden" name="t_PNoti" value=""> <!-- 회원사에서 이용할 수 있는 여유필드 -->

<input type="hidden" name="PNoteUrl" value="<?php echo HOME;?>/order/rnoti.php"><!--결제성공시 노티전송받을 url -->
<input type="hidden" name="PNextPUrl" value="<?php echo HOME;?>/order/pay_rcv_m.php"><!--결제성공/오류시 호출될 url. pay_result.php-->
<input type="hidden" name="PCancPUrl" value="<?php echo HOME;?>" ><!--결제취소시 호출될 url-->
<input type="hidden" name="PVtransDt" value=""><!--가상계좌입금대기유효기간(가상계좌채번시 필수)-->
<input type="hidden" name="t_PBname" value="세틀뱅크"><!--가맹점명(계좌이체사용시필수)-->
<input type="hidden" name="PEmail" value="<?php echo AES256::dec($_SESSION['user_id'], AES_KEY);?>"><!--고객 email-->

<!-- 한글처리위해 비워둡니다. -->
<input type="hidden" name="PGoods">
<input type="hidden" name="PNoti">
<input type="hidden" name="PMname">
<input type="hidden" name="PUname">
<input type="hidden" name="PBname">

<input type="hidden" name="address" id="address">
<input type="hidden" name="rec_name" id="rec_name">
<input type="hidden" name="rec_zip" id="rec_zip" value="123456">
<input type="hidden" name="rec_addr_1" id="rec_addr_1">
<input type="hidden" name="rec_addr_2" id="rec_addr_2">
<input type="hidden" name="delivery_price" value="0">
<input type="hidden" name="freight_collect_price" value="0">
<input type="hidden" name="payment_type" value="2">
<input type="hidden" name="payment_name" value="신용카드">
<input type="hidden" name="escrow_state" value="">
<input type="hidden" name="escrow_tran_state" value="">
<input type="hidden" name="rec_tel" id="rec_tel" value="">
<input type="hidden" name="rec_email" id="rec_email" value="">

<script language="javascript">
webbrowser=navigator.appVersion;
var isIPHONE = (navigator.userAgent.match('iPhone') != null || navigator.userAgent.match('iPod') != null);
var isIPAD = (navigator.userAgent.match('iPad') != null);
var isANDROID = (navigator.userAgent.match('Android') != null);

function on_card()
{
	if ($("#address").val() == "") {
		alert("선택한 배송 주소가 없습니다.\r\n먼저 배송 주소를 선택하세요.");
		return false;
	}

	if ($("#PPhone").val() == "") {
		alert("휴대전화번호를 입력하세요.");
		$("#PPhone").focus();
		return false;
	}


	var f = document.addrFrm;
	window.name = "STPG_CLIENT";

	f.t_PNoti.value = f.rec_name.value;
	f.t_PNoti.value += '§' + f.rec_zip.value;
	f.t_PNoti.value += '§' + f.rec_addr_1.value;
	f.t_PNoti.value += '§' + f.rec_addr_2.value;
	f.t_PNoti.value += '§' + f.delivery_price.value;
	f.t_PNoti.value += '§' + f.freight_collect_price.value;
	f.t_PNoti.value += '§' + f.payment_type.value;
	f.t_PNoti.value += '§' + f.payment_name.value;
	f.t_PNoti.value += '§' + f.escrow_state.value;
	f.t_PNoti.value += '§' + f.escrow_tran_state.value;
	f.t_PNoti.value += '§' + f.t_PGoods.value;
	f.t_PNoti.value += '§' + f.rec_tel.value;
	f.t_PNoti.value += '§' + f.rec_email.value;

	f.action = "https://pg.settlebank.co.kr/card/MbCardAction.do";
	strEncode();//한글인코딩
	f.submit();
}

//파라미터 값이 한글인 경우 여기서 인코딩을 해준다.
function strEncode(){
	var addrFrm = document.addrFrm;
	addrFrm.PGoods.value = encodeURI(addrFrm.t_PGoods.value);
	addrFrm.PNoti.value = encodeURI(addrFrm.t_PNoti.value);
	addrFrm.PMname.value = encodeURI(addrFrm.t_PMname.value);
	addrFrm.PUname.value = encodeURI(addrFrm.t_PUname.value);
	addrFrm.PBname.value = encodeURI(addrFrm.t_PBname.value);
}
</script>
