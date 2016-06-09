<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/bbs/bbs.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$bbs_idx = setIsset($_GET['idx'], null);
$bbs_code = setIsset($_GET['code'], null);
$page = setIsset($_GET['page'], 1);
$list_size = 1;
$search_type = setIsset($_GET['st'], 0);
$word = setIsset($_GET['word'], '');
$category = setIsset($_GET['category'], null);
$mode = setIsset($_GET['mode'], null);

$Bbs = new Bbs();
$Bbs->setAttr("bbs_idx", $bbs_idx);
$Bbs->setAttr("bbs_code", $bbs_code);
$Bbs->setAttr("page", $category);

if ($mode == 'edit') {
	$Bbs->getRead($dbh, $bbs_idx, $bbs_code);
	$aFileInfo = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code);
}
elseif ($mode == 'replay') {

}

//print_r($aFileInfo);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>네이버 :: Smart Editor 2 &#8482;</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>
<form name="writeFrm" method="post" action="/bbs/update.php">
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
<input type="hidden" name="code" id="code" value="<?php echo $Bbs->attr['bbs_code']; ?>">
<input type="hidden" name="mode" value="<?php echo $mode; ?>">


	<div>공지사항<input type="checkbox" name="notice" value="1"<?php if($Bbs->attr['notice'] ==1) echo ' checked'; ?>></div>
	<div>비밀글<input type="checkbox" name="secret" value="1"<?php if($Bbs->attr['secret'] ==1) echo ' checked'; ?>></div>
	<div>비밀번호<input type="text" name="pwd" value=""></div>
	<div>이름<input type="text" name="author" value="<?php echo $Bbs->attr['bbs_author']; ?>"></div>
	<div>제목<input type="text" name="title" value="<?php echo $Bbs->attr['bbs_title']; ?>"></div>
	<textarea name="content" id="content" rows="10" cols="100" style="width:766px; height:412px; display:none;"><?php echo str_replace('\\"', '"', htmlspecialchars_decode($Bbs->attr['bbs_content'])); ?></textarea>
	<p>
		<input type="button" onclick="pasteHTML();" value="본문에 내용 넣기" />
		<input type="button" onclick="showHTML();" value="본문 내용 가져오기" />
		<input type="button" onclick="submitContents(this);" value="서버로 내용 전송" />
		<input type="button" onclick="setDefaultFont();" value="기본 폰트 지정하기 (궁서_24)" />
	</p>
	<p>
		<?php include_once('container.php'); ?>
	</p>
</form>

<script type="text/javascript">
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
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["content"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>

</body>
</html>