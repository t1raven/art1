<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = 1000000;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Artist = new Artist();
$Artist->setAttr("page", $page);
$Artist->setAttr("sz", $sz);
$Artist->setAttr("st", $st);
$Artist->setAttr("nm", $nm);
$Artist->setAttr("enm", $enm);
$Artist->setAttr("bdate", $bdate);
$Artist->setAttr("edate", $edate);
$Artist->setAttr("sort", $sort);
$Artist->setAttr("od", $od);

$tmp = $Artist->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$file_name = 'artist_'.date("Ymd").'.xls';

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
		<th>작가명</th>
		<th>PIN</th>
		<th>휴대폰번호</th>
		<th>이메일</th>
		<th>상태</th>
		<th>등록일</th>
	</tr>
<?php foreach($list as $key => $row) : ?>
	<tr>
		<td><?php echo $total_cnt-- ; ?></td>
		<td><?php echo htmlspecialchars(stripslashes($row['covery_name']));?></td>
		<td><?php echo htmlspecialchars(stripslashes($row['artist_name']));?></td>
		<td><?php echo number_format($row['total_pin_count']);?></td>
		<td><?php echo htmlspecialchars(stripslashes($row['artist_mobile']));?></td>
		<td><?php echo htmlspecialchars(stripslashes($row['artist_email']));?></td>
		<td><?php if ($row['display_state'] === 'Y') : ?>노출<?php else : ?>비노출<?php endif ; ?></td>
		<td><?php echo strtr(substr($row['create_date'], 0, 10), '-', '.' );?></td>
	</tr>
<?php endforeach ; ?>
</table>
<?
$Artist = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Artist);
unset($tmp);
unset($list);
unset($dbh);
