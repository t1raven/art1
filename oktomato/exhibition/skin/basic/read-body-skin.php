<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$exh_idx = setIsset($_GET['idx'], null);
$page = setIsset($_GET['page'], 1);
$list_size = 1;
$search_type = setIsset($_GET['st'], 0);
$word = setIsset($_GET['word'], '');


$listParams = '&at=list&code='.$bbs_code.'&st='.$search_type.'&word='.$word.'&category='.$category;
$editParams = '&at=write&idx='.$exh_idx.'&st='.$search_type.'&word='.$word.'&mode=edit';
$replyParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&mode=reply';

$Exhibition = new exhibition();
$Exhibition->setAttr("exh_idx", $exh_idx);

//exit;
$aAttachFile = '';

try {
	if (!$Exhibition->getRead($dbh)) {
		 throw new Exception("게시물이 존재하지 않습니다.");
	}

	$aAttachFile = $Exhibition->getFileInfo($dbh, $bbs_idx, $bbs_code, 2);
}
catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}
?>
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>



<div>작성일 : <?php echo $Exhibition->attr['reg_date']; ?></div>
<div>작성자 : <?php echo $Exhibition->attr['user_name']; ?></div>
<div>제목 : <?php echo $Exhibition->attr['exh_title']; ?></div>
<div>회사명 : <?php echo $Exhibition->attr['exh_company']; ?></div>
<div>연락처 : <?php echo $Exhibition->attr['exh_tel']; ?></div>
<div>노출기간 : <?php echo substr($Exhibition->attr['exh_start_date'],0,10); ?> ~ <?php echo substr($Exhibition->attr['exh_last_date'],0,10); ?> </div>
<div>링크주소 : <?php if ($Exhibition->attr['exh_link']){ echo ('<a href=\''.$Exhibition->attr['exh_link'].'\' target=_blank>'.$Exhibition->attr['exh_link'].'</a>');} ?></div>
<div>승인여부 : <?php echo $Exhibition->attr['exh_confirm']; ?></div>
<div>전시이미지 : 
<?php
if ( $Exhibition->attr['up_file_name'] != '' ) {
	echo ('<img src='.exhUploadPath.$Exhibition->attr['up_file_name'].' width=100>');
}
?>
</div>

<?php if (!empty($aAttachFile)) : ?>
<div>첨부파일 :
	<?php
		foreach($aAttachFile as $val) {
			echo $val['ori_file_name'];
		}
	?>
</div>
<?php endif;?>

<div>내용 :<?php echo str_replace('\\"', '"', htmlspecialchars_decode($Exhibition->attr['exh_content'])); ?>
<?php
unset($Exhibition->attr);
?>
</br>
<button onclick="location.href='<?=PHP_SELF?>?page=<?=$page.$listParams?>'">목록</button>
<button onclick="location.href='<?=PHP_SELF?>?page=<?=$page.$editParams?>'">수정</button>
<button onclick="articleDelete();">삭제</button>

<script type="text/javascript">
function articleDelete()
{
	alert('삭제');
	$.ajax({
		type:"POST",
		url:"/oktomato/exhibition/__delete.php",
		dataType:"JSON",
		data:{"idx":<?php echo $exh_idx;?>},
		success: function(data) {
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				location.href="/oktomato/exhibition/?at=list";
				//location.reload();
			}
			else{
				alert("삭제할 수 없습니다.");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}
</script>