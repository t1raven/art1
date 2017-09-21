<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz =1000000;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Pin = new Pin();
$Pin->setAttr("page", $page);
$Pin->setAttr("sz", $sz);
$Pin->setAttr("st", $st);
$Pin->setAttr("nm", $nm);
$Pin->setAttr("bdate", $bdate);
$Pin->setAttr("edate", $edate);
$Pin->setAttr("sort", $sort);
$Pin->setAttr("od", $od);

$tmp = $Pin->getContactList($dbh);
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
		<th>아이디</th>
		<th>연락처</th>
		<th>IP</th>
		<th>등록일</th>
	</tr>
<?php foreach($list as $key => $row) : ?>
	<tr>
		<td><?php echo $total_cnt-- ; ?></td>
		<td><?php echo($row['covery_name']); ?></td>
		<td><?php echo $row['user_id']; ?></td>
		<td><?php echo $row['user_contact']; ?></td>
		<td><?php echo long2ip($row['ip_addr']); ?></td>
		<td><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
	</tr>
<?php endforeach ; ?>
</table>
<?
$Pin = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Pin);
unset($tmp);
unset($list);
unset($dbh);
