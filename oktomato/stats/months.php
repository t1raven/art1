<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = '접속통계';
$pageNum = '9';
$subNum = '3';
$thirdNum = '0';

$nBeginYears = 2015;
$endYears = date('Y');


$years = isset($_POST['years']) ? Xss::chkXSS($_POST['years']) : $endYears;



$nEndYears = (int)$endYears;
$nYears = (int)$years;

$Statistics = new Statistics();
$Statistics->setAttr('years', $years);
$Statistics->setAttr('months', $tmpMonth);
$aMonth = $Statistics->getMonthVisitor($dbh);
$aMonthJoin = $Statistics->getMonthJoin($dbh);
//print_r($aMonth);
//print_r($aMonthJoin);
//exit;

//$nFirstDay = 1;
//$lastDay = date('t', mktime(0, 0, 0, $months, 1, $years));
//$nLastDay = (int)$lastDay;
//$nTmpLastDay = $nLastDay - 1;

$j = 1;

for($i = 0; $i < 12; $i++) {
	$aTmpMonth[$i] = 0;
	$aTmpMonthView[$i] = 0;
	$aTmpMonthJoin[$i] = 0;
	$sMonths = (strlen($j) < 2) ? '0'.$j : $j;
	$aYYYYMM[$i] = $years.'.'.$sMonths;
	++$j;
}

foreach($aMonth as $month) {
	$aTmpMonth[$month['months']-1] = $month['total'];
	$aTmpMonthView[$month['months']-1] = $month['total_view'];
}

foreach($aMonthJoin as $join) {
	$aTmpMonthJoin[$join['months']-1] = $join['counts'];
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
			<h1 class="title1">월별 접속통계</h1>
			<div class="t-c">
				<select name="years">
					<?php for($i = $nBeginYears; $i <= $nEndYears; $i++): ?>
					<option value="<?php echo $i; ?>"<?php if ($i === $nYears): ?> selected<?php endif; ?>><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				 <button type="button" class="btn_pack1 ov-b small" id="btnSearch" onclick="getSearch(this.form);">검색</button>
			</div>
			</form>
			<section class="graphArea">
			<!--그래프 영역입니다-->
				<div id="chart_div" style="width: 900px; height: 800px;"></div>
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
	['월별', '접속통계', '신규회원','페이지뷰'],
	<?php
	for($i = 0; $i < 12; $i++) {
		if ($i === 11) {
	?>
	['<?php echo $aYYYYMM[$i]; ?>', <?php echo $aTmpMonth[$i]; ?>, <?php echo $aTmpMonthJoin[$i]; ?>, <?php echo $aTmpMonthView[$i]; ?>]
	<?php
	}
		else {
	?>
	['<?php echo $aYYYYMM[$i]; ?>', <?php echo $aTmpMonth[$i]; ?>, <?php echo $aTmpMonthJoin[$i]; ?>, <?php echo $aTmpMonthView[$i]; ?>],
	<?php
		}
	}
	?>

	]);

	var options = {
		//title: '',
		//vAxis: {title: '월별',  titleTextStyle: {color: 'red'}}
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
