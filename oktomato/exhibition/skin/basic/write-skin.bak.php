<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$exh_idx = setIsset($_GET['idx'], null);
$page = setIsset($_GET['page'], 1);
$list_size = 1;
$search_type = setIsset($_GET['st'], 0);
$word = setIsset($_GET['word'], '');
$category = setIsset($_GET['category'], null);
$mode = setIsset($_GET['mode'], null);

$Exhibition = new exhibition();
$Exhibition->setAttr("exh_idx", $exh_idx);
//$Exhibition->setAttr("page", $category);

if ($mode == 'edit') {
	$Exhibition->getRead($dbh);
	$aFileInfo = $Exhibition->getFileInfo($dbh, $exh_idx);
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
<script src="/js/jquery.chkform.js"></script>

<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>

<!--// 달력 S-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script>
 $(function() {
  $("#datepicker").datepicker({
	dateFormat: 'yy-mm-dd',
  });
  $("#datepicker2").datepicker({
	dateFormat: 'yy-mm-dd',
  });
 });
</script>
<!--// 달력 E-->

</head>
<body>
<form name="writeFrm" method="post" action="/oktomato/exhibition/update.php" enctype="multipart/form-data" onsubmit="return false;" >
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Exhibition->attr['exh_idx']; ?>">
<input type="hidden" name="mode" value="<?php echo $mode; ?>">
<input type="hidden" name="old_up_file_name" value="<?php echo $Exhibition->attr['up_file_name']; ?>">
<input type="hidden" name="old_ori_file_name" value="<?php echo $Exhibition->attr['ori_file_name']; ?>">
	<div>제목 : <input type="text" name="title" value="<?php echo $Exhibition->attr['exh_title']; ?>" class="inp {label:'제목',required:true}" placeholder="제목" required ></div>
	<div>회사명 : <input type="text" name="company" value="<?php echo $Exhibition->attr['exh_company']; ?>"></div>
	<div>연락처 : <input type="text" name="tel" value="<?php echo $Exhibition->attr['exh_tel']; ?>"></div>
	<div>노출기간 : <input type="text" name="start_date" value="<?php echo $Exhibition->attr['exh_start_date']; ?>"  id="datepicker"> ~ 
							<input type="text" name="last_date" value="<?php echo $Exhibition->attr['exh_last_date']; ?>"  id="datepicker2">
	</div>
	<div>링크주소<input type="text" name="link" value="<?php echo $Exhibition->attr['exh_link']; ?>"></div>
	<div>승인여부
		<select name="confirm">
			<option value="0" <?php if( $Exhibition->attr['exh_confirm'] == 0) { echo('selected'); } ?> >미승인</option>
			<option value="1" <?php if( $Exhibition->attr['exh_confirm'] == 1) { echo('selected'); } ?> >승인</option>
		</select>
	</div>
	<div>전시이미지 
	<?php
		if ( $Exhibition->attr['up_file_name'] != '' ) {
			echo ('<img src='.exhUploadPath.$Exhibition->attr['up_file_name'].' width=100>');
		}
	?>
	<br><input type="file" name="file_img"> 281*118 <br><br></div>
	<textarea name="content" id="content" rows="10" cols="100" style="width:766px; height:412px; display:none;"><?php echo str_replace('\\"', '"', htmlspecialchars_decode($Exhibition->attr['exh_content'])); ?></textarea>
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
		
		/*
		if(chkDefaultForm(elClickedObj.form) ){
			//f.target = "action_ifrm";
			elClickedObj.form.submit();
		}
		*/
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
