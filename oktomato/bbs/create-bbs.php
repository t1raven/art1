<?php
require_once('../../lib/include/global.inc.php');
require_once('../../lib/class/bbs/createbbs.class.php');

$bbs_code = $_GET['code'];
$mode = '';
$selectSkin = '';

if ($bbs_code) {
	$CreateBbs = new CreateBbs();
	$CreateBbs->setAttr('bbs_code', $bbs_code);
	$CreateBbs->getRead($dbh);
	$selectSkin = $CreateBbs->attr['bbs_skin'];
	$mode = 'edit';
}

$bbsSkinPath = opendir('../../bbs/skin');

while(($dir = readdir($bbsSkinPath)) !== false) {
	if ($dir != "." && $dir != "..") {
		$aDir[] = $dir;
	}
}

sort($aDir);
reset($aDir);

foreach($aDir as $val) {
	$sOption .= ($selectSkin === $val) ? '<option value="'.$val.'" selected>'.$val.'</option>' : '<option value="'.$val.'">'.$val.'</option>';
}

unset($val);
unset($aDir);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta name="title" content="한국세라믹학회">
<meta name="author" content="OKTOMATO">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>메인 | 한국세라믹학회 관리자모드</title>
<meta charset="utf-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/jquery.chkform.js"></script>
</head>
<body>

<form name="createBbsFrm" method="post" action="create-bbs-update.php">
<input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">

게시판 등록
<p>게시판명<input type="text" name="name" value="<?php echo $CreateBbs->attr['bbs_name'];?>"></p>
<p>게시판코드<input type="text" name="code" value="<?php echo $CreateBbs->attr['bbs_code'];?>"></p>
<p>게시판스킨
<select name="skin"><?php echo $sOption;?></select>


</p>
<p>분류항목<input type="text" name="category" value=""></p>
<p>업로드용량<input type="text" name="upload_size" value="<?php echo $CreateBbs->attr['upload_size'];?>"></p>
<p>제목글자수제한<input type="text" name="title_length" value="<?php echo $CreateBbs->attr['title_length'];?>"></p>
<p>New아이콘적용시한<input type="text" name="new_time" value="<?php echo $CreateBbs->attr['new_time'];?>"></p>
<p>Hit아이콘적활성화 조회수<input type="text" name="hit_cnt" value="<?php echo $CreateBbs->attr['hit_cnt'];?>"></p>
<p>한페이지 출력 개수<input type="text" name="list_size" value="<?php echo $CreateBbs->attr['list_size'];?>"></p>
<p>페이징 개수<input type="text" name="block_size" value="<?php echo $CreateBbs->attr['block_size'];?>"></p>
<p>이미지 사이즈
	<input type="text" name="width_size" value="<?php echo $CreateBbs->attr['img_size_width'];?>">
	<input type="text" name="height_size" value="<?php echo $CreateBbs->attr['img_size_height'];?>">
	정비율<input type="checkbox" name="size_type" value="1"<?php if($CreateBbs->attr['img_size_type']):?> checked<?php endif;?>>
</p>

권한 설정
<p>목록 권한<input type="checkbox" name="list_level" value="99"<?php if($CreateBbs->attr['list_level']):?> checked<?php endif;?>></p>
<p>내용보기 권한<input type="checkbox" name="read_level" value="99"<?php if($CreateBbs->attr['read_level']):?> checked<?php endif;?>></p>
<p>작성 권한<input type="checkbox" name="write_level" value="99"<?php if($CreateBbs->attr['write_level']):?> checked<?php endif;?>></p>
<p>답변 권한<input type="checkbox" name="reply_level" value="99"<?php if($CreateBbs->attr['reply_level']):?> checked<?php endif;?>></p>
<p>댓글 권한<input type="checkbox" name="comment_level" value="99"<?php if($CreateBbs->attr['comment_level']):?> checked<?php endif;?>></p>
<p>경고 문구<input type="text" name="alert_msg" value="<?php echo $CreateBbs->attr['comment_level'];?>"></p>


사용여부
<p>공지글
	<input type="radio" name="notice_state" value="1"<?php if($CreateBbs->attr['notice_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="notice_state" value="0"<?php if(!$CreateBbs->attr['notice_state']):?> checked<?php endif;?>>사용안함
</p>
<p>비밀글
	<input type="radio" name="secret_state" value="1"<?php if($CreateBbs->attr['secret_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="secret_state" value="0"<?php if(!$CreateBbs->attr['secret_state']):?> checked<?php endif;?>>사용안함
</p>
<p>답글
	<input type="radio" name="reply_state" value="1"<?php if($CreateBbs->attr['reply_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="reply_state" value="0"<?php if(!$CreateBbs->attr['reply_state']):?> checked<?php endif;?>>사용안함
</p>
<p>댓글
	<input type="radio" name="comment_state" value="1"<?php if($CreateBbs->attr['comment_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="comment_state" value="0"<?php if(!$CreateBbs->attr['comment_state']):?> checked<?php endif;?>>사용안함
</p>
<p>내용페이지에 목록 출력
	<input type="radio" name="read_list_state" value="1"<?php if($CreateBbs->attr['read_list_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="read_list_state" value="0"<?php if(!$CreateBbs->attr['read_list_state']):?> checked<?php endif;?>>사용안함
</p>

부가서비스
<p>비회원 정보수집동의
	<input type="radio" name="nomember_agree" value="1"<?php if($CreateBbs->attr['nomember_agree']):?> checked<?php endif;?>>사용
	<input type="radio" name="nomember_agree" value="0"<?php if(!$CreateBbs->attr['nomember_agree']):?> checked<?php endif;?>>사용안함
</p>
<p>스팸방지
	<input type="radio" name="spam_state" value="1"<?php if($CreateBbs->attr['spam_state']):?> checked<?php endif;?>>사용
	<input type="radio" name="spam_state" value="0"<?php if(!$CreateBbs->attr['spam_state']):?> checked<?php endif;?>>사용안함
</p>
<p>금칙어 사용
	<input type="radio" name="prohibition_word" value="1"<?php if($CreateBbs->attr['prohibition_word']):?> checked<?php endif;?>>사용
	<input type="radio" name="prohibition_word" value="0"<?php if(!$CreateBbs->attr['prohibition_word']):?> checked<?php endif;?>>사용안함
</p>
<p>SMS전송
	<input type="checkbox" name="write_sms_state" value="1"<?php if($CreateBbs->attr['write_sms_state']):?> checked<?php endif;?>>새글 작성시 SMS전송
	<input type="checkbox" name="reply_sms_state" value="1"<?php if($CreateBbs->attr['reply_sms_state']):?> checked<?php endif;?>>답글 작성시 SMS전송
</p>
<p>
	담당자<input type="text" name="sms_charger" value="<?php echo $CreateBbs->attr['sms_charger'];?>">
	휴대전화번호<input type="text" name="sms_nbr" value="<?php echo $CreateBbs->attr['sms_nbr'];?>">
</p>
</form>


<P>
	<button onclick="document.createBbsFrm.submit();">저장</button>
	<?php if($bbs_code):?><button onclick="deleteBbs();">삭제</button><?php endif;?>
	<button onclick="document.location.href='bbs-list.php'">목록</button>
</p>


<?php echo ACTION_IFRAME;?>
<script>
function deleteBbs() {
	if (confirm("정말 삭제하시겠습니까?")) {
		$("#mode").val("delete");
		document.createBbsFrm.submit();
	}
}
</script>
</body>
</html>