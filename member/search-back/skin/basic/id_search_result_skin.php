<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

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

<section id="dashSubArea"  class="content-mediaBox margin1">
	<div class="formMailType1">
		<h1>비밀번호를 잊으셨나요?</h1>
	  	<section id="formMailArea"  class="content-mediaBox margin1">
	       <div class="formMailType1 changeID">
	            	<p class="sub_txt">지정하신 이메일로 패스워드를 변경할 수 있는 링크가 발송되었습니다.</p>
	              <div class="btns">
	                <!-- a href="/member/modify.php" class="btn_pack samll2 black">수정</a -->
					<a href="/" id="" class="btn_pack samll2 black">Home</a>
	              </div><!-- //btn_bot -->
			</div>	
		</section>
	</div>
</section>	
<script>
function getSearch() {
	if ($("#uid").val() == "") {
		alert("이메일을 입력해주세요");
		$("#uid").focus();
		return false;
	}
	document.ssFrm.submit();
}
</script>




          </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<script>
$(".searchBar").find(".btn_search").click(function(){
	if ($(".smartTableBox").css("display") == "none")
	{
	$(this).addClass("on")
	$(".smartTableBox").slideDown();
	}else{
	$(".smartTableBox").slideUp();
	$(this).removeClass("on")
	}
});
checkListMotion();
bbsCheckbox();
LabelHidden(".inp_txt.lh");
</script>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>




