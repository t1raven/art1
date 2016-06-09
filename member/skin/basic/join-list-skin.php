<?php
include_once('../lib/include/global.inc.php');
include_once('../lib/function/common.php');
include_once('../lib/class/member/member.class.php');

$page = setIsset($_GET['page'], 1);
$list_size = 10;

$member = new Member();
$tmp = $member->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;


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
function allCheck1()
{
	$("input[name='idxs[]']:checkbox").attr("checked", true);
}
function allCheck2()
{
	$("input[name='idxs[]']:checkbox").attr("checked", false);
}
function deleteArticle()
{
	document.listFrm.submit();
}
</script>

<form name="listFrm" method="post" action="/bbs/delete.php">
<input type="hidden" name="mode" value="delete">
<input type="hidden" name="code" value="<?php echo $bbs_code;?>">
<table border="1">
<tr>
	<!--<td></td>-->
	<td>번호</td>
	<td>성명</td>
	<td>날짜</td>
<tr>
<?php foreach($list as $row){ ?>
<tr>
	<!--<td><input type="checkbox" name="idxs[]" value="<?php echo($row['user_idx']);?>"></td>-->
	<td><?php echo($PAGE_UNCOUNT);?></td>
	<td><a href="join-write.php?idx=<?php echo $row['user_idx'];?>&mode=edit"><?php echo $row['user_name'];?></a></td>
	<td><?php echo($row['reg_date']);?></td>

</tr>
<?php
	$PAGE_UNCOUNT --;
}

unset($tmp);
unset($list);
?>
</table>
</form>
</br>
<div>
<form name="search" method="get">
<input type="hidden" name="at" value="<?php echo $at;?>">
<input type="hidden" name="code" value="<?php echo $bbs_code;?>">
<input type="hidden" name="category" value="<?php echo $category;?>">
<!--
<select name="st">
	<option value="1"<?php if($search_type==1) echo(' selected');?>>제목</option>
	<option value="2"<?php if($search_type==2) echo(' selected');?>>내용</option>
	<option value="3"<?php if($search_type==3) echo(' selected');?>>작성자</option>
</select>
<input type="text" name="word"><button>검색</button>
-->
</form>
</div>

<?php //echo $Pagination->attr['pageHtml'];?>
<?=$pageUtil->attr[pageHtml]?>
<!--<div>
<button onclick="allCheck1();">전체선택</button>
<button onclick="allCheck2();">전체해제</button>
<button onclick="deleteArticle();">삭제</button>
<button onclick="location.href='/bbs/?at=write&code=<?php echo $bbs_code;?>'">작성</button>
</div>-->
</html>

