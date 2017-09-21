<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = 1000000;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Comment = new Comment();
$Comment->setAttr("page", $page);
$Comment->setAttr("sz", $sz);
$Comment->setAttr("st", $st);
$Comment->setAttr("nm", $nm);
$Comment->setAttr("bdate", $bdate);
$Comment->setAttr("edate", $edate);
$Comment->setAttr("sort", $sort);
$Comment->setAttr("od", $od);

$tmp = $Comment->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$file_name = 'comment_'.date("Ymd").'.xls';

header("Content-Type: text/html; charset=UTF-8");
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename =".$file_name);
header("Content-Description: PHP4 Generated Data");
header("Content-Type: text/html; charset=utf-8");
?>
<meta content="application/vnd.ms-excel; charset=UTF-8" name="Content-type">
<table border="1">
	<tr>
		<th>No</th>
		<th>아티커버리명</th>
		<th>구분</th>
		<th>아이디</th>
		<th>기술성</th>
		<th>예술성</th>
		<th>창조성</th>
		<th>가능성</th>
		<th>평균</th>
		<th>의견</th>
		<th>IP</th>
		<th>등록일</th>
		<th>상태</th>
	</tr>
<?php foreach($list as $key => $row) : ?>
	<tr>
		<td><?php echo $total_cnt-- ; ?></td>
		<td><?php echo($row['covery_name']); ?></td>
		<td><?php if ($row['is_expert'] == 'Y') : ?>패널<?php else : ?>일반<?php endif ; ?></td>
		<td><?php echo $row['user_id']; ?></td>
		<td><?php echo $row['technique_score']; ?></td>
		<td><?php echo $row['artistic_score']; ?></td>
		<td><?php echo $row['creativity_score']; ?></td>
		<td><?php echo $row['potential_score']; ?></td>
		<td><?php echo $row['final_score']; ?></td>
		<td><?php echo htmlspecialchars_decode($row['opinion'], ENT_QUOTES); ?></td>
		<td><?php echo long2ip($row['ip_addr']);?></td>
		<td><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
		<td><?php if ($row['display_state'] === 'Y') : ?>노출<?php else : ?>비노출<?php endif ; ?></td>
	</tr>
<?php endforeach ; ?>
</table>
<?
$Comment = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Comment);
unset($tmp);
unset($list);
unset($dbh);
