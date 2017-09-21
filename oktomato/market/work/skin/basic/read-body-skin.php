<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/lib/class/bbs/bbs.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$bbs_idx = setIsset($_GET['idx'], null);
$bbs_code = setIsset($_GET['code'], null);
$page = setIsset($_GET['page'], 1);
$list_size = 1;
$search_type = setIsset($_GET['st'], 0);
$word = setIsset($_GET['word'], '');
$category = setIsset($_GET['category'], null);
$listParams = '&at=list&code='.$bbs_code.'&st='.$search_type.'&word='.$word.'&category='.$category;
$editParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&st='.$search_type.'&word='.$word.'&category='.$category.'&mode=edit';
$replyParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&mode=reply';
$Bbs = new Bbs();
$Bbs->setAttr("bbs_idx", $bbs_idx);
$Bbs->setAttr("bbs_code", $bbs_code);

$aAttachFile = '';

try {
	if (!$Bbs->getRead($dbh)) {
		 throw new Exception("게시물이 존재하지 않습니다.");
	}

	$aAttachFile = $Bbs->getFileInfo($dbh, $bbs_idx, $bbs_code, 2);
}
catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}

?>
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>



<div>제목 : <?php echo $Bbs->attr['bbs_title']; ?></div>
<div>이름 : <?php echo $Bbs->attr['bbs_author']; ?></div>
<div>날짜 : <?php echo $Bbs->attr['reg_date']; ?></div>
<div>조회 : <?php echo $Bbs->attr['bbs_hit']; ?></div>
<?php if (!empty($aAttachFile)) : ?>
<div>첨부파일 :
	<?php
		foreach($aAttachFile as $val) {
			echo $val['ori_file_name'];
		}
	?>
</div>
<?php endif;?>

<div>내용 :<?php echo str_replace('\\"', '"', htmlspecialchars_decode($Bbs->attr['bbs_content'])); ?>
<?php
unset($Bbs->attr);
?>
</br>
<button onclick="location.href='<?=PHP_SELF?>?page=<?=$page.$listParams?>'">목록</button>
<button onclick="location.href='<?=PHP_SELF?>?page=<?=$page.$editParams?>'">수정</button>
<button onclick="location.href='<?=PHP_SELF?>?page=<?=$page.$replyParams?>'">답변</button>
<button onclick="articleDelete();">삭제</button>

<script type="text/javascript">
function articleDelete()
{
	$.ajax({
		type:"POST",
		url:"/bbs/__delete.php",
		dataType:"JSON",
		data:{"idx":<?php echo $bbs_idx;?>, "code":"<?php echo $bbs_code;?>"},
		success: function(data) {
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				location.href="/bbs/?at=list&code=<?php echo $bbs_code;?>";
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