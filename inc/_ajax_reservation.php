<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/member/login.class.php';
require ROOT.'lib/class/market/advice.class.php';
?>

<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
<?php
$goods_idx = isset($_GET['goods']) ? Xss::chkXSS(trim($_GET['goods'])) : null;
//$goods=16;
//로그인 체크
if ( ! ($arr_user = Login::getLoginCheck(urlencode($_SERVER["REQUEST_URI"]))) ){
	exit;
}
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
<input type="hidden" name="user_view_url" value="<?php echo urlencode('http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']);?>">
<section id="resevationArea">
   <div class="inner">
    <header class="header">
        <h1 class="title1">상담등록</h1>
        <button class="close" onclick="fixedPopupClose();"><img src="/images/btn/btn_close2.gif" alt="닫기"></button>
    </header>
    <div class="lft_group">
        <div class="formMailType2">
            <ul>
                <li>
                    <strong class="h">문의작품</strong>
                    <div class="cont txt">
                      <p><?php echo $goods_value ?></p>
                    </div>
                </li>
                <li>
                    <strong class="h">문의자명</strong>
                    <div class="cont">
                      <input type="text" name="user_name" id="user_name" class="inp_txt2">
                    </div>
                </li>
                <li>
                    <strong class="h">문의내용</strong>
                    <div class="cont">
                      <input type="text" name="content" id="content" class="inp_txt2">
                    </div>
                </li>
                <li>
                    <strong class="h">답변방법선택</strong>
                    <div class="cont">
                      <div class="lst_check type2 radio">
                        <span>
                            <label for="tMedium_tel">전화답변</label>
                            <input type="radio" name="how_to_request" id="tMedium_tel" value="tel" checked>
                        </span>
                        <span>
                            <label for="tMedium_email">메일답변</label>
                            <input type="radio" name="how_to_request" id="tMedium_email" value="email">
                        </span>
                       </div><!-- //lst_check -->
                    </div>
                </li>
                <li id="view_email">
                    <strong class="h">이메일</strong>
                    <div class="cont">
                        <input type="text" name="user_email" id="user_email" class="inp_txt2" >    
                    </div>
                </li>
                <li id="view_tel" style="display:none;">
                <strong class="h">전화번호</strong>
                <div class="cont">
                    <input type="text" name="user_tel" id="user_tel" class="inp_txt2" numberonly="true">    
                </div>
                </li>
            </ul>
        </div>
    </div><!-- //lft_group -->
    <div class="rgh_group">
        <ul>
          <li>
            <p class="h">이진우 팀장</p>
            <p>+82.10.4651.238(KOREA)</p>
            <p>jinwoo@mt.co.kr</p>
          </li>
          <li>
            <p class="h">강필웅 팀장</p>
            <p>+82.10.4651.238(KOREA)</p>
            <p>jinwoo@mt.co.kr</p>
          </li>
          <li>
            <p class="h">이진우 팀장</p>
            <p>+82.10.4651.238(KOREA)</p>
            <p>jinwoo@mt.co.kr</p>
          </li>
          <li>
            <p class="h">이진우 팀장</p>
            <p>+82.10.4651.238(KOREA)</p>
            <p>jinwoo@mt.co.kr</p>
          </li>
        </ul>
    </div><!-- //rgh_group -->
    <div class="btn_bot">
        <a href="javascript:void(0);" id="btnSave" class="btn_pack black fzb">보내기</a>
    </div><!-- //btn_bot -->

 </div>
 </section>
 </form>

<script type="text/javascript">
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

function chkForm(f){
	if(chkDefaultForm(f) ){
		//f.target = "action_ifrm";
		f.submit();
	}
}

$(function(){
	$("#btnSave").click(function(){
		alert("dasdf");
		chkForm(document.joinFrm);
	});

	$(document).on("keyup", "input:text[numberOnly]", function() {$(this).val( $(this).val().replace(/[^0-9]/gi,"") );});
	$(document).on("keyup", "input:text[datetimeOnly]", function() {$(this).val( $(this).val().replace(/[^0-9:\-]/gi,"") );});
});

$(function(){

});
</script>

 <?
 $dbh = null;
$Advice = null;
unset($dbh);
unset($Advice);
if (gc_enabled()) gc_collect_cycles();
 ?>