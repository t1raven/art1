<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = '접속통계';
$pageNum = '9';
$subNum = '4';
$thirdNum = '0';

$Statistics = new Statistics();
$aOS = $Statistics->getOSVisitor($dbh);
$aBrowser = $Statistics->getBrowser($dbh);
$aScreen = $Statistics->getScreen($dbh);

$osCnt = count($aOS);
$browserCnt = count($aBrowser);
$screenCnt = count($aScreen);


$db = null;
$Statistics = null;
unset($db);
unset($Statistics);

include '../inc/link.php';
include '../inc/top.php';
include '../inc/header.php';
include '../inc/side.php';
?>
<section id="container">
	<div class="container_inner">
	<?php include '../inc/path.php'; ?>
		<article class="content">
			<section class="section_box">
				<h1 class="title1">OS별 접속자</h1>
				<section class="graphArea">
					<!--그래프 영역입니다-->
					<div id="piechart-os" style="width: 900px; height: 500px;"></div>
				</section>
			</section>
			<section class="section_box">
				<h1 class="title1">브라우저별 접속자</h1>
				<section class="graphArea">
				<!--그래프 영역입니다-->
					<div id="piechart-browser" style="width: 900px; height: 500px;"></div>
				</section>
			</section>
			<section class="section_box">
				<h1 class="title1">해상도별 접속자</h1>
				<section class="graphArea">
				<!--그래프 영역입니다-->
					<div id="piechart-screen" style="width: 900px; height: 500px;"></div>
				</section>
			</section>
		</article>
	</div> <!-- //container_inner -->
</section> <!-- //container -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawChart2);
google.setOnLoadCallback(drawChart3);
function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Operating System', 'Counts'],
<?php $i = 1; foreach($aOS as $v): ?>
	<?php if ($i === $osCnt):?>
	['<?php echo $v['os']; ?>',<?php echo $v['cnt']; ?>]
	<?php else: ?>
	['<?php echo $v['os']; ?>',<?php echo $v['cnt']; ?>],
	<?php endif; ?>
<?php ++$i; endforeach; ?>
	]);

	var options = {
		//title: 'OS별 접속자'
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart-os'));

	chart.draw(data, options);
}


function drawChart2() {
	var data2 = google.visualization.arrayToDataTable([
		['Browser', 'Counts'],
<?php $i = 1; foreach($aBrowser as $v): ?>
	<?php if ($i === $browserCnt):?>
	['<?php echo $v['browser']; ?>',<?php echo $v['cnt']; ?>]
	<?php else: ?>
	['<?php echo $v['browser']; ?>',<?php echo $v['cnt']; ?>],
	<?php endif; ?>
<?php ++$i; endforeach; ?>
	]);

	var options = {
		//title: '브라우저별 접속자'
	};

	var chart2 = new google.visualization.PieChart(document.getElementById('piechart-browser'));

	chart2.draw(data2, options);
}

function drawChart3() {
	var data3 = google.visualization.arrayToDataTable([
		['Screen', 'counts'],
<?php $i = 1; foreach($aScreen as $v): ?>
	<?php if ($i === $screenCnt):?>
	['<?php echo $v['screen_x']; ?>x<?php echo $v['screen_y']; ?>',<?php echo $v['cnt']; ?>]
	<?php else: ?>
	['<?php echo $v['screen_x']; ?>x<?php echo $v['screen_y']; ?>',<?php echo $v['cnt']; ?>],
	<?php endif; ?>
<?php ++$i; endforeach; ?>
	]);

	var options = {
		//title: '해상도별 접속자'
	};

	var chart3 = new google.visualization.PieChart(document.getElementById('piechart-screen'));

	chart3.draw(data3, options);
}

</script>
<?php
include '../inc/bot.php';
