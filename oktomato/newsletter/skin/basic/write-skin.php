<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
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
<form name="newsletterFrm" method="post" action="/oktomato/newsletter/update.php" onsubmit="return false;">
<table board=1>
	<tr>
		<td> E-MAIL ADDRESS <br />
				<input type="text" name="email" value="<?php echo $Newsletter->attr['newsletter_email']; ?>" class="inp {label:'이메일',required:true}" placeholder="이메일" required > </td>
	</tr>
	<tr>
		<td>
			입력하신 이메일 정보는 Arthongs 뉴스레터 발송에만 사용되며,<br> 다른용도로는 활용되지 않습니다.<br>
			자세한 개인보호보호정책은 여기를 클릭하세요.<br>
		</td> 
	</tr>
	<tr>
		<td>
			<input type="checkbox" name=""> 개인정보 제공에 동의합니다.
		</td> 
	</tr>
</table>
<!-- button onclick="location.href='join-list.php'">SEND</button --> 
<button id="btnSave">SEND</button>

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
		 chkForm(document.newsletterFrm);
	});
});
</script>
<?php echo ACTION_IFRAME;?>
</body>
</html>
