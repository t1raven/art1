<?php
require_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'lib/class/member/member.class.php');

$user_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$Member = new Member();
$Member->setAttr("user_idx", $user_idx);

if ($mode == 'edit') {
	$Member->getRead($dbh);
}

//회원권한 정보 호출 S
$tmp = $Member->getListMemberLevel($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//회원권한 정보 호출 E

$newsletter_status = $Member->getNewletterStatus($dbh,$Member->attr['user_id']);
echo('newsletter_status:'.$newsletter_status .'<br>');
if ($newsletter_status) {
	$newsletter_bgcolor_y="#33ccff";
	$newsletter_bgcolor_n= "#fff";
} else {
	$newsletter_bgcolor_y= "#fff";
	$newsletter_bgcolor_n= "#33ccff";
}
/*
if ($Member->attr['newsletter_status']=='Y'){ 
	$newsletter_bgcolor_y="#33ccff";
	$newsletter_bgcolor_n= "#fff";
}else{ 
	$newsletter_bgcolor_y= "#fff";
	$newsletter_bgcolor_n= "#33ccff";
}   
*/
if ($Member->attr['sms_status']=='Y'){ 
	$sms_bgcolor_y="#33ccff";
	$sms_bgcolor_n="#fff";
}else{ 
	$sms_bgcolor_y="#fff";
	$sms_bgcolor_n="#33ccff";
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
<form name="joinFrm" method="post" action="/oktomato/member/join-update.php" onsubmit="return false;">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="idx" value="<?php echo $Member->attr['user_idx'];?>">
<input type="hidden" name="newsletter_status" id="newsletter_status" value="<?php if ($Member->attr['newsletter_status']=='Y'){ echo('Y');}else{ echo('N') ; }   ?>" >
<input type="hidden" name="sms_status"  id="sms_status" value="<?php if ($Member->attr['sms_status']=='Y'){  echo('Y'); }else{ echo('N') ; }  ?>" >


<?php
if ($mode == 'edit' ){ //회원 정보 수정
?>
<table board=1>
	<tr>
		<td> 아이디(이메일)* </td>
		<td> <input type="text" name="id" value="<?php echo $Member->attr['user_id']; ?>" class="inp {label:'이메일',required:true}" placeholder="이메일" required > </td>
	</tr>
	<tr>
		<td>비밀번호*</td>
		<td><input type="password" name="pwd" placeholder="비밀번호"> <button id="btnSave">Save</button>
			cf. 비밀번호는 신규발급만 가능합니다.
		</td> 
	</tr>
	<tr>
		<td>뉴스레터 수신*</td>
		<td><span id="newsletter_y" style="background-color:<?php echo $newsletter_bgcolor_y; ?>" onclick="getCssBgcolor('newsletter_y','newsletter_n', 'newsletter_status', 'Y' )">Y</span>
			<span  id="newsletter_n" style="background-color:<?php echo $newsletter_bgcolor_n; ?>" onclick="getCssBgcolor('newsletter_n','newsletter_y', 'newsletter_status', 'N' )">N</span>
		</td>
	</tr>
	<tr>
		<td>SMS 수신*</td>
		<td><span id="sms_y" style="background-color:<?php echo $sms_bgcolor_y; ?>" onclick="getCssBgcolor('sms_y','sms_n', 'sms_status', 'Y' )">Y</span>
			<span  id="sms_n" style="background-color:<?php echo $sms_bgcolor_n; ?>" onclick="getCssBgcolor('sms_n','sms_y', 'sms_status', 'N' )">N</span>
		</td>
	</tr>
</table>
<button onclick="location.href='join-list.php'">List</button> 
<button id="btnSave1">Save</button>
<script>
function getCssBgcolor(id1,id2, hid, onoff ){
	$("#"+id1).css('background-color', '#33ccff');
	$("#"+id2).css('background-color', '#fff');
	$("#"+hid).val(onoff);
	//alert( $("#"+hid).val() );
}
</script>
<!--
<p>이름 <input type="text" name="name" value="<?php echo $Member->attr['user_name']; ?>" class="inp {label:'이름',required:true}" placeholder="이름" required readonly></p>
<p>이메일<input type="text" name="id" value="<?php echo $Member->attr['user_id']; ?>" class="inp {label:'이메일',required:true}" placeholder="이메일" required readonly>이메일로 입력하세요</p>
<p>비밀번호 <input type="password" name="pwd" placeholder="비밀번호"> * 비밀번호를 입력하지 않으면 기존 비밀번호가 유지 됩니다.</p>
<p>비밀번호 재입력<input type="password" name="rpwd"  placeholder="비밀번호 재입력" ></p>
-->
<?php
}else{ //회원 정보 입력
?>
<p>이름 <input type="text" name="name" value="<?php echo $Member->attr['user_name']; ?>" class="inp {label:'이름',required:true}" placeholder="이름" required></p>
<p>이메일<input type="text" name="id" value="<?php echo $Member->attr['user_id']; ?>" class="inp {label:'이메일',required:true}" placeholder="이메일" required>이메일로 입력하세요</p>
<p>이메일 재입력<input type="text" name="rid" value="<?php echo $Member->attr['user_id']; ?>" class="inp {label:'이메일 재입력',required:true}" placeholder="이메일 재입력" required></p>
<p>비밀번호 <input type="text" name="pwd" class="inp {label:'비밀번호',required:true}" placeholder="비밀번호" required> </p>
<p>비밀번호 재입력<input type="text" name="rpwd"class="inp {label:'비밀번호 재입력',required:true}" placeholder="비밀번호 재입력" required></p>
<?php
}
?>
<!-- p>회원권한
	<select name="user_level_code">
	<?php foreach($list as $row){ ?>
		<option value="<?php echo $row['user_level_code'];?>" <?php if ($row['user_level_code'] == $Member->attr['user_level_code']){echo"selected";}  ?> ><?php echo $row['user_level_name'];?></option>
	<?php
	}
	unset($tmp);
	unset($list);
	?>
	</select>
</p -->
<button id="btnSave">저장</button>
</form>
<script type="text/javascript">
function chkForm(f){
	if(chkDefaultForm(f) ){
		//f.target = "action_ifrm";
		f.submit();
	}
}
$(function(){
	$("#btnSave").click(function(){
		chkForm(document.joinFrm);
	});
	$("#btnSave1").click(function(){
		//alert('ddd');
		chkForm(document.joinFrm);
	});
});
</script>
<?php echo ACTION_IFRAME;?>
</body>
</html>
