<?php

include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

session_start(); // 세션 데이터 초기화

$user_idx = isset($_SESSION['user_idx']) ? $_SESSION['user_idx'] : null;
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;

$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
$user_name = AES256::dec($_SESSION['user_name'], AES_KEY);

//echo(ROOT.exhUploadPath.'<br>');

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
<title>전시관리 입력 테스트 폼</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/jquery.chkform.js"></script>

<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>

</head>
<body>
<div>
전시관리 입력 테스트 폼 입니다.<br>
실제로는  FRONT 페이지에서 유저가 입력하게 됩니다.<br>
로그인한 유저만 전시 베너를 신청할 수 있습니다.<br><br>
</div>
<form name="writeFrm" method="post" action="/oktomato/exhibition/update.php" enctype="multipart/form-data" onsubmit="return false;" >
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Exhibition->attr['exh_idx']; ?>">
<input type="hidden" name="mode" value="<?php echo $mode; ?>">
<input type="hidden" name="old_up_file_name" value="<?php echo $Exhibition->attr['up_file_name']; ?>">
<input type="hidden" name="old_ori_file_name" value="<?php echo $Exhibition->attr['ori_file_name']; ?>">
	<div>신청자명 : <input type="text" name="user_name" value="<?php echo $user_name; ?>"></div>
	<div>연락처 : <input type="text" name="tel" value="<?php echo $Exhibition->attr['exh_tel']; ?>"></div>
	<div>베너등록 
	<?php
		if ( $Exhibition->attr['up_file_name'] != '' ) {
			echo ('<img src='.exhUploadPath.$Exhibition->attr['up_file_name'].' width=100>');
		}
	?>
	<br><input type="file" name="file_img"> 281*118 <br><br></div>
	<div>링크주소<input type="text" name="link" value="<?php echo $Exhibition->attr['exh_link']; ?>"></div>
	<button id="btnSave">저장</button>
<!-- input type="button" onclick="submitContents(this);" value="서버로 내용 전송" / -->
</form>


</body>
</html>

<script>
$(function(){
	function chkForm(f){
		if(chkDefaultForm(f) ){
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		// chkForm(document.joinFrm);
		document.writeFrm.submit();
	});
});
</script>