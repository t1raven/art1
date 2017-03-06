<?php
$aj = isset($_GET['aj']) ? Xss::chkXSS(trim((int)$_GET['aj'])) : null;

if (empty($aj)){
	require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
}

require ROOT.'lib/class/market/advice.class.php';

$goods_idx = isset($_GET['goods']) ? Xss::chkXSS(trim((int)$_GET['goods'])) : null;

$Advice = new Advice();
$Advice->setAttr('goods_idx', $goods_idx);

if (!empty($goods_idx)){
	$Advice->getGoodsRead($dbh);
	$goods_value = $Advice->attr['goods_name'].'('.$Advice->attr['artist_name'].')' ;
}else{
	$goods_value = '선택된 작품이 없습니다.';
}

?>
<form name="adviceFrm" method="post" action="/member/advice/index.php?at=update" onsubmit="return false;">
<input type="hidden" name="request_type" value="advice">
<input type="hidden" name="goods_idx" value="<?php echo $goods_idx;?>">
<input type="hidden" name="user_view_url" id="user_view_url" value="">
<section id="resevationArea">
   <div class="inner">
   <button type="button" class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close.png" alt="닫기"></button>
    <!-- <header class="header">
        <h1 class="title1">상담등록</h1>
        <button class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close.png" alt="닫기"></button>
    </header> -->
    <div class="lft_group">
        <div class="formMailType2">
            <ul>
<?php if (!empty($goods_idx)){
?>
                <li>
                    <strong class="h">문의작품</strong>
                    <div class="cont txt">
                      <p><?php echo $goods_value ?></p>
                    </div>
                </li>
<?php 
} 
?>
                <li>
                    <strong class="h">문의자명</strong>
                    <div class="cont">
                      <input type="text" name="user_name" id="user_name" class="inp_txt2" onfocus="loginCheck();">
                    </div>
                </li>
                <li>
                    <strong class="h">문의내용</strong>
                    <div class="cont">
                      <input type="text" name="content" id="content" class="inp_txt2" onfocus="loginCheck();">
                    </div>
                </li>
                <li>
                    <strong class="h">답변방법선택</strong>
                    <div class="cont">
                      <div class="lst_check type2 radio">
                        <span>
                            <label for="tMedium_tel">전화답변</label>
                            <input type="radio" name="how_to_request" id="tMedium_tel" value="tel" checked onfocus="loginCheck();">
                        </span>
                        <span>
                            <label for="tMedium_email">메일답변</label>
                            <input type="radio" name="how_to_request" id="tMedium_email" value="email" onfocus="loginCheck();">
                        </span>
                       </div><!-- //lst_check -->
                    </div>
                </li>
                <li id="view_email" style="display:none;">
                    <strong class="h">이메일</strong>
                    <div class="cont">
                        <input type="text" name="user_email" id="user_email" class="inp_txt2" onfocus="loginCheck();">    
                    </div>
                </li>
                <li id="view_tel" >
                <strong class="h">전화번호</strong>
                <div class="cont">
                    <input type="text" name="user_tel" id="user_tel" class="inp_txt2" numberonly="true" onfocus="loginCheck();">    
                </div>
                </li>
            </ul>
        </div>
    </div><!-- //lft_group -->
    <div class="rgh_group">
        <ul>
          <li>
            <p class="h">전화</p>
            <p>02-6325-9271</p>
          </li>
		  <li>
            <p class="h">메일</p>
            <p><a href="mailto:art1@art1.com">art1@art1.com</a></p>
          </li>
		  <li>
            <p class="h">팩스</p>
            <p>02-6005-9277</p>
          </li>
        </ul>
    </div><!-- //rgh_group -->
    <div class="btn_bot">
        <a href="javascript:advice_save();" class="btn_pack black fzb">보내기</a>
    </div><!-- //btn_bot -->



  
 </div>
 </section>

  </form>
<script type="text/javascript">

$(document).on("keyup", "input:text[numberOnly]", function() {$(this).val( $(this).val().replace(/[^0-9]/gi,"") );});
$(document).on("keyup", "input:text[datetimeOnly]", function() {$(this).val( $(this).val().replace(/[^0-9:\-]/gi,"") );});

function loginCheck(){ //ajax 로 본 페이지가 두번 호출 되는 관계로 포커스 이벤트가 발생할 때 로그인 체크를 한다.
	var id = "<?php echo isset($_SESSION['user_idx']);?>";
	if (id == "")	{
		//alert("로그인 후 글을 작성해 주세요.");
		if(confirm("로그인을 해야 사용할 수 있는 기능입니다.\r\n로그인 페이지로 이동하시겠습니까?")){
			location.href="/member/login.php?returnUrl="+location.href;
		}
		return false;
	}else{
		return true;
	}
}

$("#user_view_url").val(location.href);
checkListMotion();

$("#tMedium_tel").on("click", function(){
	$("#view_email").css('display','none');
	$("#view_tel").css('display','block');
	$("#user_email").val("");
});
$("#tMedium_email").on("click", function(){
	$("#view_email").css('display','block');
	$("#view_tel").css('display','none');
	$("#user_tel").val("");
});
/*
function chkForm(f){
	if(chkDefaultForm(f) ){
		f.target = "action_ifrm";
		f.submit();
	}
}
*/
function advice_save(){
	var f =document.adviceFrm;
		//chkForm(document.adviceFrm);
	if ($("#user_name").val()==''){ alert('문의자명을 입력하셔야 합니다.'); $("#user_name").focus(); return false; }
	if ($("#content").val()==''){ alert('문의내용을 입력하셔야 합니다.'); $("#content").focus(); return false; }
	if ( $(':radio[name="how_to_request"]:checked').val()=='tel' && $("#user_tel").val()==''){ alert('답변받을 전화번호를 입력하셔야 합니다.'); $("#user_tel").focus(); return false; }
	if ( $(':radio[name="how_to_request"]:checked').val()=='email' && $("#user_email").val()=='' ){ alert('답변받을 이메일을 입력하셔야 합니다.'); $("#user_email").focus(); return false; }
	if ( $("#user_email").val() !='' ){ 
		var regExp = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if (regExp.test( $("#user_email").val() == false)) {  alert("잘못된 이메일 형식입니다."); return false; }
	}

	f.target = "action_ifrm";
	f.submit();
}

</script>

 <?
 $dbh = null;
$Advice = null;
unset($dbh);
unset($Advice);
if (gc_enabled()) gc_collect_cycles();

echo ACTION_IFRAME;
 ?>