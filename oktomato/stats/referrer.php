<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = '접속통계';
$pageNum = '9';
$subNum = '6';
$thirdNum = '0';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;

$Statistics = new Statistics();
$Statistics->setAttr('page', $page);
$Statistics->setAttr('sz', $sz);


$tmp = $Statistics->getReferrer($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//echo $total_cnt;
//echo print_r($list);

// 페이지 처리
$params = '';
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);

include '../inc/link.php';
include '../inc/top.php';
include '../inc/header.php';
include '../inc/side.php';
?>
 <section id="container">
  <div class="container_inner">
    <?php include '../inc/path.php'; ?>
    <?php include '../inc/datepicker_setting.php'; ?>
     <article class="content">
      <section class="section_box">
		<h1 class="title1">경로별 접속자 통계</h1>
			<section>
				<div class="lst_table2 t-c">
				  <table summary="">
					<caption></caption>
					<colgroup>
					  <col width="90%">
					  <col width="10%">
					</colgroup>
					<thead>
					  <tr>
						<th scope="row">접속 경로</th>
						<th scope="row">카운터</th>
					  </tr>
					</thead>
					<tbody>
					<?php foreach($list as $row): ?>
					  <tr>
						<td class="t-l"><?php echo $row['referrer']; ?></td>
						<td><?php echo $row['cnt']; ?></td>
					  </tr>
					 <?php endforeach; ?>
					</tbody>
				  </table>
				</div>
				<div class="bot_align">
				 <?=$pageUtil->attr[pageHtml]?>
				</div>
			</section>
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<?php include "../inc/bot.php"; ?>