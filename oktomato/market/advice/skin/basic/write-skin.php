<?php
if (!defined('OKTOMATO')) exit;
//require $_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php';
//require $_SERVER['DOCUMENT_ROOT'].'lib/class/market/advice.class.php';

//상담을 위해서는 반드시 로그인을 해야 하나?
session_start(); // 세션 데이터 초기화
$user_idx = $_SESSION['user_idx'];
//$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
//$user_id = AES256::dec($_SESSION['user_id'], AES_KEY);

if(empty($user_idx)){
	echo('로그인을 하셔야 합니다. <br><br>');
}

$advice_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$Advice = new Advice();
$Advice->setAttr("advice_idx", $advice_idx);

if ($mode == 'edit') {
	$Advice->getRead($dbh);
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
<input type="hidden" name="idx" value="<?php echo $Advice->attr['Advice_idx'];?>">
<input type="hidden" name="goods_idx" value="<?php echo $Advice->attr['goods_idx'];?>">
<input type="hidden" name="goods_name" value="<?php echo $Advice->attr['goods_name'];?>">
<input type="hidden" name="user_view_url" value="<?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];?>">
<input type="hidden" name="how_to_request" id="how_to_request" value="tel">

*상담관리 입력 테스트 입니다.<br>
*실제로는 FRONT 단에서 유저가 입력을 합니다. <br><br>

<p> 상담 유형 선택 : 
<select name="request_type" id="request_type">
	<option value=""></option>
	<option value="advice">상담</option>
	<option value="rental">렌탈</option>
</select> 
* 프론트 단에서 입력폼은 따로 있습니다.
</p>
<p>이름 <input type="text" name="user_name" value="<?php echo $Advice->attr['advice_user_name']; ?>" class="inp {label:'이름',required:true}" placeholder="이름" required></p>
<p class="rental">기관명 <input type="text" name="user_company" value="<?php echo $Advice->attr['advice_company']; ?>" ></p>
답변 요청 방법
<input type="button" id="btn_tel" value="전화답변" onclick="getDpToggle('divEmail','divTel', 'how_to_request', 'tel' , 'user_email');">
<input type="button" id="btn_email" value="이메일답변" onclick="getDpToggle('divTel','divEmail', 'how_to_request', 'email' , 'user_tel');">

<div id="divTel" >연락처 <input type="text" name="user_tel" id="user_tel"  value="<?php echo $Advice->attr['advice_user_tel']; ?>" ></div>

<div id="divEmail" style="display:none;">이메일 <input type="text" name="user_email" id="user_email" value="<?php echo $Advice->attr['advice_user_email']; ?>"></div>
<p  class="rental">공간대상<br>
<textarea name="setting_room" rows="3" cols="60"><?php echo $Advice->attr['setting_room']; ?></textarea>
</p>
<p>상담내용<br>
<textarea name="content" rows="5" cols="60"><?php echo $Advice->attr['advice_user_content']; ?></textarea>
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

//$(".rental").css("display","none");
$("#request_type").change(function(){
    if($("#request_type option:selected").val() == 'rental'){
		//alert('렌탈');
		$(".rental").css("display","");
	}else if($("#request_type option:selected").val() == 'advice'){
		//alert('상담');
		$(".rental").css("display","none");
	}
});

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
