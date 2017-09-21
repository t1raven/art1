<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = 1000000;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$gnm = isset($_GET['gnm']) ? LIB_LIB::CkSearch($_GET['gnm']) : null; // 작품명
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Work = new Work();
$Work->setAttr("page", $page);
$Work->setAttr("sz", $sz);
$Work->setAttr("st", $st);
$Work->setAttr("gnm", $gnm);
$Work->setAttr("nm", $nm);
$Work->setAttr("bdate", $bdate);
$Work->setAttr("edate", $edate);
$Work->setAttr("sort", $sort);
$Work->setAttr("od", $od);

$tmp = $Work->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$file_name = 'artwork_'.date("Ymd").'.xls';

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
		<th>작품명</th>
		<th>작가명</th>
		<th>PIN</th>
		<th>상태</th>
		<th>등록일</th>
	</tr>
<?php foreach($list as $key => $row) : ?>
	<tr>
		<td><?php echo $total_cnt-- ; ?></td>
		<td><?php echo($row['covery_name']); ?></td>
		<td><?php echo($row['works_name']); ?></td>
		<td><?php echo $row['artist_name']; ?></td>
		<td><?php echo $row['works_pin_count']; ?></td>
		<td><?php if ($row['display_state'] === 'Y') : ?>노출<?php else : ?>비노출<?php endif ; ?></td>
		<td><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
	</tr>
<?php endforeach ; ?>
</table>
<?
$Work = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Work);
unset($tmp);
unset($list);
unset($dbh);
