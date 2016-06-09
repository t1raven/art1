<?php
require_once('../lib/include/global.inc.php');
require_once('../lib/class/member/member.class.php');

$user_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$member = new Member();
$member->setAttr("user_idx", $user_idx);

if ($mode == 'edit') {
	$member->getRead($dbh);
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
<form name="joinFrm" method="post" action="/member/join-update.php" onsubmit="return false;">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="idx" value="<?php echo $member->attr['user_idx'];?>">

<p>이름 <input type="text" name="name" value="<?php echo $member->attr['user_name']; ?>" class="inp {label:'이름',required:true}" placeholder="이름" required></p>
<p>이메일<input type="text" name="id" value="<?php echo $member->attr['user_id']; ?>" class="inp {label:'이메일',required:true}" placeholder="이메일" required>이메일로 입력하세요</p>
<p>이메일 재입력<input type="text" name="rid" value="<?php echo $member->attr['user_id']; ?>" class="inp {label:'이메일 재입력',required:true}" placeholder="이메일 재입력" required></p>
<p>비밀번호 <input type="text" name="pwd" class="inp {label:'비밀번호',required:true}" placeholder="비밀번호" required></p>
<p>비밀번호 재입력<input type="text" name="rpwd"class="inp {label:'비밀번호 재입력',required:true}" placeholder="비밀번호 재입력" required></p>

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
});
</script>
<?php echo ACTION_IFRAME;?>
</body>
</html>
