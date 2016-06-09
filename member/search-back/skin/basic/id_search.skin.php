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

<section id="formMailArea"  class="content-mediaBox margin1">
	<div class="formMailType1">
		<form name="ssFrm" method="post" action="?at=update">
		<h1>비밀번호를 잊으셨나요?</h1>
		<p class="sub_txt">계정의 이메일 주소를 입력해주세요. 해당 메일주소로 <br/>비밀번호를 재 설정할 수 있는 링크를 보내드립니다.</p>
			<div class="box_group">
				<ul>
					<li>
						<label class="h" for="uid">E-mail Address *</label>
						<input type="text" title="이메일" name="uid" id="uid"  value=""  class="inp_txt2" required />
					</li>
				</ul>
			</div>
	
	<!-- 원본 소스 주석 처리		
		   <div class="inner">
		      <div class="smartBox">
				<h1 class="smart_tit">비밀번호 검색</h1>
		         <div class="smartTableBox">
					<div class="arr"><img src="/images/bg/img_smart_arr.gif" alt="" /></div>
		         </div>
					<div class="searchBar">
						<div class="inner">
		
								<div class="col2">
										
										<span class="col_td auto">
											<label for="uid" class="pos">회원님의 아이디(이메일)를 입력해 주세요.</label>
											<input name="uid" type="text" class="inp_txt lh" id="uid" title="아이디(이메일)">
										</span>
								</div>
						</div>
					</div>
		      </div>
		   </div>
	-->
		<div class="btn_bot">
			<a href="javascript:void(0);" onclick="window.history.go(-1);" class="btn_pack samll2 black">Back</a>
			<a href="javascript:void(0);" onclick="getSearch();" class="btn_pack samll2 black">Send</a>
		</div>
	</div>
	</form>
</section>	
<script>
function getSearch() {
	if ($("#uid").val() == "") {
		alert("이메일을 입력해주세요");
		$("#uid").focus();
		return false;
	}
	location.href="/member/search/skin/basic/id_search_result.php"
	//document.ssFrm.submit();
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




