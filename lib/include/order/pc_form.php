<?php if (!defined('OKTOMATO')) exit;?>

<!-- 결과처리를 위한 파라미터 -->
<input type="hidden" name="PHash" value="">
<input type="hidden" name="PData" value="">
<input type="hidden" name="PStateCd" value="">
<input type="hidden" name="POrderId" value="">
<!-- 결과처리를 위한 파라미터 -->

<input type="hidden" name="PNoteUrl" value="<?php echo HOME;?>/order/rnoti.php"> <!--db처리 url 예)http://www.***.com/rnoti.php -->
<input type="hidden" name="PNextPUrl" value="<?php echo HOME;?>/order/pay_rcv.php"> <!--성공,실패 화면처리 예)http://www.***.com/pay_rcv.php -->
<input type="hidden" name="PCancPUrl" value=""> <!-- 결제창을 닫은 경우 화면처리 예)http://www.***.com/pay_rcv.php -->

<input type="hidden" name="PEmail" value="<?php echo AES256::dec($_SESSION['user_id'], AES_KEY);?>"> <!-- 결제자 e-mail -->
<input type="hidden" name="PPhone" value=""> <!-- 결제자 연락처 -->
<input type="hidden" name="POid" value="<?php echo $POid;?>"> <!-- P_OID를 회원사에서 직접넘겨주는 경우에 함수 on_load()에서 주문번호 넣는 부분을 주석처리하시기 바랍니다 -->
<input type="hidden" name="t_PGoods" value="<?php echo $defaultGoodsName;?>"> <!-- 상품명 -->
<input type="hidden" name="t_PNoti" value=""> <!-- 회원사에서 이용할 수 있는 여유필드 -->
<input type="hidden" name="t_PMname" value="(주)아트1닷컴"> <!-- 회원사 한글명 -->
<input type="hidden" name="t_PUname" value="<?php echo AES256::dec($_SESSION['user_name'], AES_KEY);?>"> <!-- 결제자 이름-->
<input type="hidden" name="t_PBname" value="테스트"> <!-- 계좌이체/가상계좌입금시 고객통장에 찍힐 통장인자명 -->
<input type="hidden" name="PEname" value="art1"> <!-- 신용카드 결제시 영문가맹점명 -->
<input type="hidden" name="PVtransDt" value=""> <!-- 가상계좌입금마감일 : 가상계좌에서만 사용합니다 예)20120101235959  -->
<input type="hidden" name="PTarget">

<!-- 한글처리위해 비워둡니다. -->
<input type="hidden" name="PGoods">
<input type="hidden" name="PNoti">
<input type="hidden" name="PMname">
<input type="hidden" name="PUname">
<input type="hidden" name="PBname">

<input type="hidden" name="PMid" value="art1com0"></td> <!--상점아이디 -->
<input type="hidden" name="PAmt" value="<?php echo $totalAccount;?>">

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
var width = 350;
var height = 475;
var xpos = (screen.width - width) / 2;
var ypos = (screen.width - height) / 6;
var position = "top=" + ypos + ",left=" + xpos;
var features = position + ", width="+width+", height="+height+",toolbar=no, location=no";

webbrowser=navigator.appVersion;

function on_card()
{
	if ($("#address").val() == "") {
		alert("선택한 배송 주소가 없습니다.\r\n먼저 배송 주소를 선택하세요.");
		return false;
	}

	var f = document.addrFrm;
	window.name = "STPG_CLIENT";
	wallet = window.open("", "STPG_WALLET", features);

	if ( wallet != null) {
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
		f.target = "STPG_WALLET";
		f.action = "https://pg.settlebank.co.kr/card/CardAction.do";

		//$("#btnCard").attr("disabled", true);
		/*
		f.bt_card.disabled = true;
		f.bt_bank.disabled = true;
		f.bt_mobile.disabled = true;
		f.bt_vbank.disabled = true;
		*/

		strEncode();//한글인코딩
		f.submit();
	}
	else {
		if ((webbrowser.indexOf("Windows NT 5.1")!=-1) && (webbrowser.indexOf("SV1")!=-1)) {	// Windows XP Service Pack 2
			alert("팝업이 차단되었습니다. 브라우저의 상단 노란색 [알림 표시줄]을 클릭하신 후 팝업창 허용을 선택하여 주세요.");
		} else {
			alert("팝업이 차단되었습니다.");
		}
	}
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

//goResult() - 함수설명 : 결재완료후 결과값을 지정된 결과페이지(pay_result.php)로 전송합니다.
function goResult(){
	document.addrFrm.target = "";
	document.addrFrm.action = "/order/order_end.php";
	document.addrFrm.submit();
}
// eparamSet() - 함수설명 : 결재완료후 (pay_rcv.php로부터)결과값을 받아 지정된 결과페이지(pay_result.php)로 전송될 form에 세팅합니다.
function rstparamSet(data,hash,state,oid){
	document.addrFrm.PData.value = data;
	document.addrFrm.PHash.value = hash;
	document.addrFrm.PStateCd.value = state;
	document.addrFrm.POrderId.value = oid;
}
</script>
