<?php
if (!defined('OKTOMATO')) exit;

$auth_key = isset($_GET['query']) ? Xss::chkXSS(trim($_GET['query'])) : null;

$categoriName = 'MEMBERSHIP';
$pageName = 'MEMBERSHIP';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

if (empty($auth_key)) {
	header('Location:/');
	exit;
}

$Recover = new Recover();
$Recover->setAttr('auth_key', $auth_key);
$Recover->setAttr('auth_state', 'N');

if (!$Recover->getRead($dbh)) {
	Js::LocationHref('유효하지 않은 인증키이거나, 인증키가 만료되었습니다.', '/', 'top');
	exit;
}

if (empty($Recover->attr['user_idx']) || is_null($Recover->attr['user_idx'])) {
	Js::LocationHref('유효하지 않은 인증키이거나, 인증키가 만료되었습니다.', '/', 'top');
	exit;
}

$_SESSION['auth_user_idx'] = AES256::enc($Recover->attr['user_idx'], AES_KEY);

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
<section id="container_sub"  class="mt0">
	<form name="writeFrm" method="post" onsubmit="return false;">
	<input type="hidden" name="at" value="update">
	<input type="hidden" name="ouid" id="ouid" value="<?php echo $Recover->attr['user_id']; ?>">
	<input type="hidden" name="query" id="query" value="<?php echo $auth_key; ?>">
	<div class="container_inner">
		<?php include(ROOT.'inc/path.php'); ?>
		<div class="dashSubArea">
			<h1 class="title1 content-mediaBox ">기본정보수정[패스워드 변경]</h1>
			<section id="formMailArea"  class="content-mediaBox margin1">
				<div class="formMailType1 searchID">
					<p class="sub_txt">새로운 패스워드를 입력해 주세요.</p>
					 <ul>
						<li>
							<label for="" class="h">E-Mail Address *</label>
							<input type="text" name="uid" id="uid" class="inp_txt2 {label:'이메일',required:true,email:true,minlength:4,maxlegnth:60}" value="<?php echo $Recover->attr['user_id']; ?>" maxlength="60" onblur="chkDuplication();"/>
							 <p class="alert_txt" id="alert_uid"></p>
						</li>
					</ul>
						<p class="sub_txt">패스워드는 최소 6자 이상만 허용됩니다.<br />보안을 위해 숫자와 문자 또는 특수기호를 혼용해 주세요.</p>
					<ul>
						<li>
							<label for="" class="h">New Password *</label>
							<input type="password" name="pwd" id="pwd"  class="inp_txt2 {label:'비밀번호',required:true,minlength:6,maxlegnth:20}" maxlength="20"/>
						</li>
						<li>
							<label for="" class="h">Confirm New Password *</label>
							<input type="password" name="rpwd" id="rpwd"  class="inp_txt2 {label:'비밀번호 재입력',required:true,minlength:6,maxlegnth:20}" maxlength="20" onkeyup="pwdCompare();" />
							<p class="alert_txt" id="alert_pwd">비밀번호를 한번 더 입력하여 주세요.</p>
						</li>
					</ul>
					<div class="btn_bot">
						<a href="javascript:void(0);" id="btnSave" class="btn_pack samll2 black">Save</a>
					</div>
				</div>
			</section>
		</div>
	</div>
	</form>
</section>
<script src="/js/jquery.chkform.js"></script>
<script type="text/javascript">
var chkEmail = false;

function chkForm(f){
	if(chkDefaultForm(f) ){
		if ($("#pwd").val() !== $("#rpwd").val()) {
			alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
			$("#rpwd").val('');
			$("#rpwd").focus();
			return false;
		}

		if ($("#ouid").val() == $("#uid").val()) {
			chkEmail = true;
		}

		if (chkEmail) {
			//f.target = "action_ifrm";
			f.submit();
		}
		else {
			alert("이메일을 확인하세요.");
		}
	}
}

function chkDuplication() {
	if ($("#ouid").val() == $("#uid").val()) {
		$("#alert_uid").html("사용 가능한 이메일입니다.");
		 chkEmail = true;
	}
	else {
		$.ajax({
			url: "index.php",
			type: "POST",
			dataType: "json",
			data: {"uid":$("#uid").val(), "at":"duplication"},
			success:function(data) {
				if (data.cnt == 0) {
					// 가능
					$("#alert_uid").html("사용 가능한 이메일입니다.");
					chkEmail = true;
				}
				else if (data.cnt == 1) {
					// 중복으로 인한 불가능
					$("#alert_uid").html("중복된 이메일 입니다. 다른 이메일을 입력해 주세요.");
					chkEmail = false;
				}
				else if (data.cnt == 2) {
					$("#alert_uid").html("이메일을 입력하세요.");
					chkEmail = false;
				}
				else if (data.cnt == 3) {
					$("#alert_uid").html("이메일이 유효하지 않습니다.");
					chkEmail = false;
				}
				else {
					$("#alert_uid").html("오류입니다.");
					chkEmail = false;
				}
			},
			error:function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			},
		});
	}
}

function pwdCompare() {
	if ($("#pwd").val() == "") {
		$("#alert_pwd").html("비밀번호를 먼저 입력해 주세요.");
	}
	else if ($("#pwd").val() == $("#rpwd").val()) {
		$("#alert_pwd").html("");
	}
	else {
		$("#alert_pwd").html(" 비밀번호가 일치하지 않습니다.");
	}
}

$(function(){
	$("#btnSave").click(function(){
		chkForm(document.writeFrm);
	});
});
</script>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');

$Recover = null;
unset($Recover);