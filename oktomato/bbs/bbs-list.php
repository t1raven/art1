<?php
require_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'lib/class/bbs/createbbs.class.php');

$at = $_GET['at'];
$bbs_code = $_GET['code'];
$page = $_GET['page'];
$list_size = 10;
$search_type = $_GET['st'];
$word = $_GET['word'];
$category = $_GET['category'];
$params = 'at='.$at.'&code='.$bbs_code.'&st='.$search_type.'&word='.$word.'&category='.$category;

$page = ($page) ? $page : 1;


/*
echo "<br>at:$at";
echo "<br>bbs_code:$bbs_code";
echo "<br>page:$page";
echo "<br>list_size:$list_size";
echo "<br>search_type:$search_type";
echo "<br>word:$word";
echo "<br>category:$category";
*/

$CreateBbs = new CreateBbs();
$CreateBbs->setAttr("bbs_code", $bbs_code);
$CreateBbs->setAttr("page", $page);
$CreateBbs->setAttr("list_size", $list_size);
$CreateBbs->setAttr("search_type", $search_type);
$CreateBbs->setAttr("word", $word);
$CreateBbs->setAttr("category", $category);
$tmp = $CreateBbs->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;
//echo print_r($list);


/*
$sql = "CALL up_bbs_list (?, ?, ?, ?, ?, ?)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $bbs_code, PDO::PARAM_STR, 30);
$stmt->bindParam(2, $page, PDO::PARAM_INT);
$stmt->bindParam(3, $list_size, PDO::PARAM_INT);
$stmt->bindParam(4, $search_type, PDO::PARAM_INT);
$stmt->bindParam(5, $word, PDO::PARAM_STR, 20);
$stmt->bindParam(6, $category, PDO::PARAM_INT);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/



/*
$sql = 'CALL up_bbs_list (:bbs_code, :page, :list_type, :search_type, :word, :category)';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':bbs_code', $bbs_code, PDO::PARAM_STR, 30);
$stmt->bindParam(':page', $page, PDO::PARAM_INT);
$stmt->bindParam(':list_type', $list_size, PDO::PARAM_INT);
$stmt->bindParam(':search_type', $search_type, PDO::PARAM_INT);
$stmt->bindParam(':word', $word, PDO::PARAM_STR, 20);
$stmt->bindParam(':category', $category, PDO::PARAM_INT);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $dbh->prepare("select @total_cnt");
$stmt->execute();
$total_cnt = $stmt->fetchColumn();

$dbh = null;
*/



//print_r ($list);
//print ($cnt);
//echo "<br>";
//foreach($list as $row) {
//	echo $row[user_idx];
//}

/*
foreach($list as $row):
	//echo $row['user_idx'].$row['bbs_author'];
	echo $row['user_idx'].$row['bbs_author'];
endforeach;
*/





//do {
//   $rows = $sth->fetchAll(PDO::FETCH_NUM);
//   if ($rows) {
//       print_r($rows);
//   }
//} while ($sth->nextRowset());

/*
while($rows = $sth->fetchAll(PDO::FETCH_ASSOC)) {
    print("<pre>");
    print_r($rows);
    print("</pre>");
	print("<br>cnt:".$row['cnt']);
	//print ("cnt:".$rows['total_cnt']);
}
*/

//echo $row['cnt'];
//$totalCnt = $dbh->query("");
//$totalCnt = $dbh->exec("select @total_cnt");
//echo "totalCnt:".$totalCnt;

//$dbh = null;


//$BBS_LIST_SIZE = 2;
//$blockSize = 10;
//$list_page = '/bbs/index.php';


/*
$totalPage = getTotalPage($total_cnt, $BBS_LIST_SIZE);
$Pagination = new Pagination();
$Pagination->setPaging($totalPage, $blockSize, $page, $params)
*/

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
	<td>게시판이름</td>
	<td>게시판 스킨</td>
	<td>생성일</td>
<tr>
<?php foreach($list as $row){ ?>
<tr>
	<!--<td><input type="checkbox" name="idxs[]" value="<?php echo($row['bbs_idx']);?>"></td>-->
	<td><?php echo($PAGE_UNCOUNT);?></td>
	<td><a href="create-bbs.php?code=<?php echo $row['bbs_code'];?>"><?php echo($row['bbs_name']);?></a></td>
	<td><?php echo($row['bbs_skin']);?></td>
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
<!--<select name="st">
	<option value="1"<?php if($search_type==1) echo(' selected');?>>제목</option>
	<option value="2"<?php if($search_type==2) echo(' selected');?>>내용</option>
	<option value="3"<?php if($search_type==3) echo(' selected');?>>작성자</option>
</select>
<input type="text" name="word"><button>검색</button>
-->
</form>
</div>

<?php //echo $Pagination->attr['pageHtml'];?>
<?//=$pageUtil->attr[pageHtml]?>
<div>
<!--<button onclick="allCheck1();">전체선택</button>
<button onclick="allCheck2();">전체해제</button>
<button onclick="deleteArticle();">삭제</button>-->
<button onclick="location.href='create-bbs.php'">작성</button>
</div>
</html>

