<?php
if (!defined('OKTOMATO')) exit;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = 1000000;
$st = isset($_GET['st']) ? (int)$_GET['st'] : 0;
$nm = isset($_GET['nm']) ? LIB_LIB::CkSearch($_GET['nm']) : null; // 작가명
$bdate = isset($_GET['bdate']) ? LIB_LIB::CkSearch($_GET['bdate']) : null;
$edate = isset($_GET['edate']) ? LIB_LIB::CkSearch($_GET['edate']) : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순

$Point = new Point();
$Point->setAttr('page', $page);
$Point->setAttr('sz', $sz);
$Point->setAttr('st', $st);
$Point->setAttr('nm', $nm);
$Point->setAttr('bdate', $bdate);
$Point->setAttr('edate', $edate);
$Point->setAttr('sort', $sort);
$Point->setAttr('od', $od);

$tmp = $Point->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$file_name = 'point_'.date("Ymd").'.xls';

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
		<th>포인트</th>
		<th>전문가점수</th>
		<th>사용자점수</th>
		<th>합계</th>
		<th>등록일</th>
		<th>상태</th>
	</tr>
<?php foreach($list as $key => $row) : ?>
<?php
			$score = $Point->getScoreSum($dbh, $row['covery_idx'], $row['point_idx']);
			if (is_array($score) && count($score) > 0) {
				$expertSum = $score['expert_sum'];
				$memberSum = $score['member_sum'];
			}
			else {
				$expertSum = 0;
				$memberSum = 0;
			}
?>
	<tr>
		<td><?php echo $total_cnt-- ; ?></td>
		<td><?php echo($row['covery_name']); ?></td>
		<td><?php echo($row['artist_name']); ?></td>
		<td><?php echo $row['total_point']; ?></td>
		<td><?php echo $expertSum; ?></td>
		<td><?php echo $memberSum; ?></td>
		<td><?php echo $expertSum + $memberSum; ?></td>
		<td><?php echo strtr($row['create_date'], '-', '.' ); ?></td>
		<td><?php if ($row['display_state'] === 'Y') : ?>노출<?php else : ?>비노출<?php endif ; ?></td>
	</tr>
<?php endforeach ; ?>
</table>
<?
$Point = null;
$tmp = null;
$list = null;
$dbh = null;
unset($Point);
unset($tmp);
unset($list);
unset($dbh);
