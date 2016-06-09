<?php
if (!defined('OKTOMATO')) exit;

$categoriName = 'MEMBERSHIP';
$pageName = 'MEMBERSHIP';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
<section id="container_sub">
	<div class="container_inner">
		<?php include(ROOT.'inc/path.php'); ?>
		<section id="quickSearchArea">
			<section id="formMailArea"  class="content-mediaBox margin1">
				<div class="formMailType1">
					<form name="sendFrm" method="post">
					<input type="hidden" name="at" value="update">
					<h1>비밀번호를 잊으셨나요?</h1>
					<p class="sub_txt">계정의 이메일 주소를 입력해주세요. 해당 메일주소로 <br/>비밀번호를 재 설정할 수 있는 링크를 보내드립니다.</p>
						<div class="box_group">
							<ul>
								<li>
									<label class="h" for="email">E-mail Address *</label>
									<input type="text" title="이메일" name="email" id="email" class="inp_txt2 {label:'이메일',required:true,email:true,minlength:5,maxlength:60}" maxlength="60" />
								</li>
							</ul>
						</div>
						<div class="btn_bot">
							<a href="javascript:void(0);" onclick="window.history.go(-1);" class="btn_pack samll2 black">Back</a>
							<a href="javascript:void(0);" id="btnSend" class="btn_pack samll2 black">Send</a>
						</div>
					</div>
				</form>
			</section>
		</section>
	</div>
</section>
<script src="/js/jquery.chkform.js"></script>
<script>
$("#btnSend").click(function(){
	chkForm(document.sendFrm);
});

function chkForm(f) {
	if (chkDefaultForm(f)) {
		//f.target = "action_ifrm";
		f.submit();
	}
}
</script>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');