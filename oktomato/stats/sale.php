<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = '접속통계';
$pageNum = '9';
$subNum = '5';
$thirdNum = '0';

$nBeginYears = 2015;
$endYears = date('Y');
$thisMonth = date('n');

$years = isset($_POST['years']) ? Xss::chkXSS($_POST['years']) : $endYears;
$months = isset($_POST['months']) ? Xss::chkXSS($_POST['months']) : $thisMonth;

$tmpMonth = (strlen($months) < 2) ? '0'.$months : $months;
$nEndYears = (int)$endYears;
$nYears = (int)$years;
$nMonths = (int)$months;
$Statistics = new Statistics();
$Statistics->setAttr('years', $years);
$Statistics->setAttr('months', $tmpMonth);
$aDay = $Statistics->getDaySale($dbh);

//print_r($aDay);
//exit;

$nFirstDay = 1;
$lastDay = date('t', mktime(0, 0, 0, $months, 1, $years));
$nLastDay = (int)$lastDay;
$nTmpLastDay = $nLastDay - 1;

$j = 1;

for($i = 0; $i < $nLastDay; $i++) {
	$aTmpDay[$i] = 0;
	$aTmpDayJoin[$i] = 0;
	$sMonths = (strlen($months) < 2) ? '0'.$months : $months;
	$sDays = (strlen($j) < 2) ? '0'.$j : $j;
	$aYYYYMMDD[$i] = $years.'.'.$sMonths.'.'.$sDays;
	++$j;
}

foreach($aDay as $day) {
	$aTmpDay[$day['days'] - 1] = $day['amounts'];
}


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
			<form name="timeFrm" method="post">
			<h1 class="title1">매출 통계</h1>
			<div class="t-c">
				<select name="years">
					<?php for($i = $nBeginYears; $i <= $nEndYears; $i++): ?>
					<option value="<?php echo $i; ?>"<?php if ($i === $nYears): ?> selected<?php endif; ?>><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				<select name="months">
					<?php for($j = 1; $j <= 12; $j++): ?>
					<option value="<?php echo $j; ?>"<?php if ($j === $nMonths): ?> selected<?php endif; ?>><?php echo $j; ?></option>
					<?php endfor; ?>
				</select>
				 <button type="button" class="btn_pack1 ov-b small" id="btnSearch" onclick="getSearch(this.form);">검색</button>
			</div>
			</form>
			<section class="graphArea">
			<!--그래프 영역입니다-->
				<div id="chart_div" style="width: 900px; height: 1500px;"></div>
			</section>
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

var data = google.visualization.arrayToDataTable([
	['월별', '판매금액'],
	<?php
	for($i = 0; $i < $nLastDay; $i++) {
		if ($i === $nTmpLastDay) {
	?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpDay[$i]; ?>]
	<?php
	}
		else {
	?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpDay[$i]; ?>],
	<?php
		}
	}
	?>

	]);

	var options = {
		//title: '',
		//vAxis: {title: '일별',  titleTextStyle: {color: 'red'}}
	};

	var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

	chart.draw(data, options);
}

function getSearch(f) {
	f.submit();
}
</script>
<?php
include '../inc/bot.php';
