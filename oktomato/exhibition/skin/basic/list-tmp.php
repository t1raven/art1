<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/exhibition/exhibition.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');

$at = setIsset($_GET['at'], NULL);
$bbs_code = setIsset($_GET['code'], NULL);
$page = setIsset($_GET['page'], 1);
$list_size = 10;
$word = setIsset($_GET['word'], NULL);
$s_date = setIsset($_GET['s_date'], NULL);
$l_date = setIsset($_GET['l_date'], NULL);
$cfm =  setIsset($_GET['cfm'], NULL);
$params = 'at='.$at.'&code='.$bbs_code.'&st='.$search_type.'&word='.$word.'&category='.$category;

//echo("s_date : $s_date <br> l_date : $l_date <br>");
//echo("cfm : $cfm <br>");

$Exhibition = new Exhibition();
$Exhibition->setAttr("page", $page);
$Exhibition->setAttr("list_size", $list_size);
$Exhibition->setAttr("search_type", $search_type);
$Exhibition->setAttr("word", $word);
$Exhibition->setAttr("bdate", $s_date);
$Exhibition->setAttr("edate", $l_date);
$Exhibition->setAttr("cfm", $cfm);
$tmp = $Exhibition->getList($dbh);
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
<!--// 달력 CSS  S-->
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
<!--// 달력 CSS  E-->

<form name="search_form" method="get" action="?">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<p>검색조건</p>
<p>검색 : <input type="text" name="word" value="<?php echo $word; ?>"></p>
<p>등록 기간 : <input type="text" name="s_date" id="datepicker" value="<?php echo($s_date); ?>"> ~ <input type="text" name="l_date" id="datepicker2" value="<?php echo($l_date); ?>">
</p> 
<p>승인여부 : 
<input type="radio" name="cfm" value="" checked>전체
<input type="radio" name="cfm" value="2">승인
<input type="radio" name="cfm" value="9">거절
<input type="radio" name="cfm" value="1">대기
</p> 
<p>초기화 : 검색초기화
</p> 
<p>
<input type="submit" value="Search">
</p>
</form>

<form name="listFrm" method="post" action="/bbs/delete.php">
<input type="hidden" name="mode" value="delete">
<input type="hidden" name="code" value="<?php echo $bbs_code;?>">
<table border="1">
<!-- tr>
	<td></td>
	<td>번호</td>
	<td>성명</td>
	<td>아이디</td>
	<td>제목</td>
	<td>전화번호</td>
	<td>회사명</td>
	<td>노출기간</td>
	<td>링크</td>
	<td>승인여부</td>
	<td>입력일</td>
<tr -->
<tr>
	<td></td>
	<td>No.</td>
	<td>베너</td>
	<td>링크</td>
	<td>신청자명</td>
	<td>연락처</td>
	<td>신청일</td>
	<td>상태</td>
<tr>
<?php foreach($list as $row){ ?>
<tr>
	<td><input type="checkbox" name="idxs[]" value="<?php echo($row['exh_idx']);?>"></td>
	<td><?php echo($PAGE_UNCOUNT);?></td>
	<td><a href="javascript:previewImg('<?php echo $row['exh_idx'];?>');">Preview</a></td>
	<td><a href="<?php echo($row['exh_link']);?>" target="_blank">Link</a></td>
	<td><a href="/oktomato/exhibition/?at=read&idx=<?php echo $row['exh_idx'];?>"><?php echo($row['user_name']);?></a></td>
	<td><?php echo($row['exh_tel']);?></td>
	<td><?php echo(substr($row['reg_date'],0,10));?></td>
	<td>상태</td>
	<!-- td>
		<a href="/oktomato/exhibition/?at=read&idx=<?php echo $row['exh_idx'];?>&page=<?php echo $page?>"><?php echo($row['exh_title']);?></a></td>
	<td><?php echo($row['exh_tel']);?></td>
	<td><?php echo($row['exh_company']);?></td>
	<td><?php echo(substr($row['exh_start_date'],0,10) );?> ~ <?php echo(substr($row['exh_last_date'],0,10));?></td>
	<td><?php if ($row['exh_link']){ echo ('<a href=\''.$row['exh_link'].'\' target=_blank>'.$row['exh_link'].'</a>');} ?></td>
	<td><?php echo $Exhibition->getComfirmText($row['exh_confirm']) ; ?> </td>
	<td><?php echo(substr($row['reg_date'],0,10));?></td -->
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
<select name="st">
	<option value="1"<?php if($search_type==1) echo(' selected');?>>제목</option>
	<option value="2"<?php if($search_type==2) echo(' selected');?>>내용</option>
	<option value="3"<?php if($search_type==3) echo(' selected');?>>작성자</option>
</select>
<input type="text" name="word"><button>검색</button>
</form>
</div>

<?php //echo $Pagination->attr['pageHtml'];?>
<?=$pageUtil->attr[pageHtml]?>
<div>
<button onclick="allCheck1();">전체선택</button>
<button onclick="allCheck2();">전체해제</button>
<button onclick="deleteArticle();">삭제</button>
<button onclick="location.href='/oktomato/exhibition/?at=write&code=<?php echo $bbs_code;?>'">작성</button>
</div>

<div id="divImgPreview"></div>
</html>

<script>
function previewImg(idx) {
	$.ajax({
		type:"POST",
		url:"__file_view.php",
		data:{"idx":idx},
		success: function(data) {
			// alert(data);
			$("#divImgPreview").html(data);  
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}
</script>
