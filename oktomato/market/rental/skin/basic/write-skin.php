<?php
require_once('../../../lib/include/global.inc.php');
require_once('../../../lib/class/rental/rental.class.php');

$rental_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$Rental = new Rental();
$Rental->setAttr("rental_idx", $rental_idx);

if ($mode == 'edit') {
	$Rental->getRead($dbh);
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta name="title" content="머니투데이">
<meta name="author" content="OKTOMATO">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title></title>
<meta charset="utf-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/jquery.chkform.js"></script>
</head>
<body>

<form name="joinFrm" method="post" action="index.php?at=update" onsubmit="return false;">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="idx" value="<?php echo $Rental->attr['Rental_idx'];?>">
<input type="hidden" name="goods_idx" value="<?php echo $Rental->attr['goods_idx'];?>">
<input type="hidden" name="goods_name" value="<?php echo $Rental->attr['goods_name'];?>">
<input type="hidden" name="user_view_url" value="<?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];?>">
<input type="hidden" name="how_to_request" id="how_to_request" value="tel">

*렌탈관리 입력 테스트 입니다.<br>
*실제로는 FRONT 단에서 유저가 입력을 합니다. <br><br>

<p>이름 <input type="text" name="user_name" value="<?php echo $Rental->attr['rental_user_name']; ?>" class="inp {label:'이름',required:true}" placeholder="이름" required></p>
<p>기관명 <input type="text" name="user_company" value="<?php echo $Rental->attr['rental_company']; ?>" class="inp {label:'기관명',required:false}" placeholder="기관명" required></p>
답변 요청 방법
<input type="button" id="btn_tel" value="전화답변" onclick="getDpToggle('divEmail','divTel', 'how_to_request', 'tel' , 'user_email');">
<input type="button" id="btn_email" value="이메일답변" onclick="getDpToggle('divTel','divEmail', 'how_to_request', 'email' , 'user_tel');">

<div id="divTel" >연락처 <input type="text" name="user_tel" id="user_tel"  value="<?php echo $Rental->attr['rental_user_tel']; ?>" ></div>

<div id="divEmail" style="display:none;">이메일 <input type="text" name="user_email" id="user_email" value="<?php echo $Rental->attr['rental_user_email']; ?>"></div>
<p>공간대상<br>
<textarea name="setting_room" rows="3" cols="60"><?php echo $Rental->attr['setting_room']; ?></textarea>
</p>
<p>상담내용<br>
<textarea name="content" rows="5" cols="60"><?php echo $Rental->attr['rental_user_content']; ?></textarea>
</p>


<button id="btnSave">저장</button>
</form>
<script type="text/javascript">
function chkForm(f){
	if(chkDefaultForm(f) ){
		//f.target = "action_ifrm";
		f.submit();
	}
}

function getDpToggle(id1,id2, hid, onoff, hInputId ){
		$("#"+id1).css('display','none');
		$("#"+hInputId).val('');
		//alert($("#"+hInId).val());
		$("#"+id2).css('display','block');
		$("#"+hid).val(onoff);
		//alert( $("#"+hid).val() );
}

$(function(){

	

	$("#btnSave").click(function(){
		 chkForm(document.joinFrm);
	});


});
</script>
<?php echo ACTION_IFRAME;?>
</body>
</html>
<?php
//phpinfo();
?>
