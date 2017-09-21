<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'Write';
$pageNum = '8';
$subNum = '3';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
<section id="container">
   <div class="container_inner">
      <?php include '../../inc/path.php';?>
      <article class="content">
      <form name="writeFrm" id="writeFrm" action="index.php" method="post" onsubmit="return false;">
         <input type="hidden" name="at" value="update">
         <section class="section_box">
            <h1 class="title1">뉴스레터 작성</h1>
            <div class="lst_table3">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                   <caption>작가 등록</caption>
                   <colgroup>
                      <col class="th1">
                      <col>
                   </colgroup>
                   <tbody>
                      <tr>
                         <th scope="row">받는 사람</th>
                         <td>
                            <input type="text" name="email" id="email" class="inp_txt wp80"><span><input type="checkbox" name="isNewsLetter" id="isNewsLetter" value="Y">뉴스레터 신청자 포함
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">제목 *</th>
                         <td >
                            <input type="text" name="title" id="title" class="inp_txt wp80">
                         </td>
                      </tr>
                      <tr>
                         <td colspan="2">
                            <textarea name="content" id="content" rows="10" cols="100" style="width:100%; height:300px; display:none;"></textarea>
                         </td>
                      </tr>
                   </tbody>
               </table>
                   <article class="content">
                    <div class="textarea"><?php  include 'container.php'; ?></div>
                  </article><!-- //content -->
            </div>
            <div class="bot_align">
               <div class="btn_right">
                   <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
                  <button type="button" class="btn_pack1 ov-b small rato" id="btnSend" onclick="submitContents(this);">Send</button>
               </div>
            </div>
         </section>
         </form>
      </article>
   </div>
</section>
<!-- //container -->
<div id="waiting">
	<div class="inner">
		<h1><img src="/images/bg/submit_loading.gif" alt="loading"></h1>
		<p>잠시만 기다려 주세요....</p>
	</div>
</div>

<?php echo ACTION_IFRAME;?>


<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
	/*
	//레이어 팝업
	$(".layerOpen").click(function(){
		$(".layer_popup1").css("display","none");
		var id = $(this).attr("href");
		var x = $(this).offset().left;
		var y = $(this).offset().top-10;
		layerBoxOffset(id,x,y);
		return false;
	});
	*/

	//LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	//checkListMotion();
	//initFileUploads();

	$("#btnList").click(function() {
		location.href="index.php?<?php echo PageUtil::_param_get('at=list&idx='); ?>";
	});

	/*
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});
	*/
});

var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "content",
	sSkinURI: "/editor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["content"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["content"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("content").value를 이용해서 처리하면 됩니다.

	try {
		$("#file_list option").attr("selected", true);

		if ($("input:checkbox[name='isNewsLetter']").is(":checked") == false) {
			if ($("#email").val().trim() == "") {
				alert("받는 사람의 이메일을 입력하세요.");
				$("#email").focus();
				return false;
			}
			else {

			}
		}

		if ($("#title").val().trim() == "") {
			alert("제목을 입력하세요.");
			$("#title").focus();
			return false;
		}

		if ($("#content").val().trim() == "" || $("#content").val() == "<p>&nbsp;</p>") {
			alert("내용을 입력하셔야 합니다.");
			$("#content").focus();
			return false;
		}

		$("#waiting").show();
		elClickedObj.form.target = "action_ifrm" ;
		elClickedObj.form.submit();

	} catch(e) {
		console.log(e);
	}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["content"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>
<?php
include '../../inc/bot.php';