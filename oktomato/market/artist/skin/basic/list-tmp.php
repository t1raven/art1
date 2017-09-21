<?php
require_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'lib/class/artist/artist.class.php');


$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$params = 'at='.$at.'&st='.$st.'&nm='.$nm.'&enm='.$enm;

$Artist = new Artist();
$Artist->setAttr("page", $page);
$Artist->setAttr("sz", $sz);
$Artist->setAttr("st", $st);
$Artist->setAttr("nm", $nm);
$Artist->setAttr("enm", $enm);
$Artist->setAttr("bdate", $bdate);
$Artist->setAttr("edate", $edate);

$tmp = $Artist->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;
//echo print_r($list);





##-- 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = 10; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params)



?>
<!DOCTYPE html>
<meta charset='utf-8' />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
function allCheck1() {
	$("input[name='idxs[]']:checkbox").attr("checked", true);
}
function allCheck2() {
	$("input[name='idxs[]']:checkbox").attr("checked", false);
}
function deleteAll() {

	if (confirm("정말 삭제하겠습니까?")) {
		document.listFrm.submit();
	}

}

function deleteArticle(idx) {
	$.ajax({
		type:"POST",
		url:"__delete.php",
		dataType:"JSON",
		data:{"idx":idx},
		success: function(data) {
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				//location.href="?at=list";
				location.reload();
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

<div>
<form name="searchFrm" method="get">
	<input type="hidden" name="at" value="<?php echo $at;?>">
	검색어<input type="text" name="nm" value="" placeholder="국문명">
	<input type=radio name=st value="0"<?php if ($st === 0):?> checked<?php endif;?>>And
	<input type=radio name=st value="1"<?php if ($st === 1):?> checked<?php endif;?>>Or
	<input type="text" name="enm" value="" placeholder="영문명">
	<p>등록일<input type="text" name="bdate" value="" placeholder="시작일"> ~ <input type="text" name="edate" value="" placeholder="시작일"></p>
	<p>초기화</p>

	<p><button>검색</button><p>
</form>
</div>



<div>
<form name="listFrm" method="post" action="delete.php" target="action_ifrm">
<input type="hidden" name="mode" value="delete">
<table border="1">
<tr>
	<td><input type="checkbox" name="all-idxs"></td>
	<td>번호</td>
	<td>작가명(Kr)</td>
	<td>작가명(En)</td>
	<td>등록일</td>
	<td>관리</td>

<tr>
<?php foreach($list as $row){ ?>
<tr>
	<td><input type="checkbox" name="idxs[]" value="<?php echo($row['artist_idx']);?>"></td>
	<td><?php echo($PAGE_UNCOUNT);?></td>
	<td><?php echo($row['artist_name']);?></td>
	<td><?php echo($row['artist_en_name']);?></td>
	<td><?php echo($row['create_date']);?></td>
	<td>
		<a href="?at=write&idx=<?php echo $row['artist_idx'];?>&page=<?php echo $page?>&mode=edit">수정</a>
		<a href="javascript:void(0);" onclick="deleteArticle(<?php echo $row['artist_idx'];?>);">삭제</a>
	</td>
</tr>
<?php
	$PAGE_UNCOUNT --;
}

unset($tmp);
unset($list);
?>
</table>
</form>
</div>

<div>
	<?php //echo $Pagination->attr['pageHtml'];?>
	<?=$pageUtil->attr[pageHtml]?>
</div>
</br>
<div>
	<?php if ($total_cnt > 0){?><button onclick="deleteAll();">삭제</button><?php }?>
	<button onclick="location.href='?at=write'">작성</button>
</div>
<?php echo ACTION_IFRAME;?>
</html>

