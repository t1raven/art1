<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = '접속통계';
$pageNum = '9';
$subNum = '1';
$thirdNum = '0';
$nBeginYears = 2015;
$endYears = date('Y');
$thisMonth = date('n');
$thisDay = date('d');

$years = isset($_POST['years']) ? Xss::chkXSS($_POST['years']) : $endYears;
$months = isset($_POST['months']) ? Xss::chkXSS($_POST['months']) : $thisMonth;
$days = isset($_POST['days']) ? Xss::chkXSS($_POST['days']) : $thisDay;

$tmpMonth = (strlen($thisMonth) < 2) ? '0'.$thisMonth : $thisMonth;
$nEndYears = (int)$endYears;
$nYears = (int)$years;
$nMonths = (int)$months;
$nDays = (int)$days;




$Statistics = new Statistics();
$Statistics->setAttr('years', $years);
$Statistics->setAttr('months', $tmpMonth);
$Statistics->setAttr('days', $days);
$aTime = $Statistics->geTimeVisitor($dbh);
$join = $Statistics->geTimeJoin($dbh);




/*
echo $years;
echo $tmpMonth;
echo $days;
*/
//exit;


if (count($aTime) < 2) {
	for($i = 0; $i < 24; $i++) {
		$aTime[$i] = 0;
	}
}


for($i = 0; $i < 24; $i++) {
	$aJoin[$i] = 0;
}

if (count($join) > 0) {
	foreach($join as $row) {
		$aJoin[$row['hours']] = $row['counts'];
	}
}


$db = null;
$Statistics = null;
unset($db);
unset($Statistics);
//exit;



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
			<h1 class="title1">시간별 접속통계</h1>
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
				<select name="days">
					<?php for($k = 1; $k <= 31; $k++): ?>
					<option value="<?php echo $k; ?>"<?php if ($k === $nDays): ?> selected<?php endif; ?>><?php echo $k; ?></option>
					<?php endfor; ?>
				</select>
				 <button type="button" class="btn_pack1 ov-b small" id="btnSearch" onclick="getSearch(this.form);">검색</button>
			</div>
			</form>
			<!--그래프 영역입니다-->
			<section class="graphArea">
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
		['시각', '접속통계', '신규회원'],
		['0:00', <?php echo $aTime[0]; ?>, <?php echo $aJoin[0]; ?>],
		['1:00', <?php echo $aTime[1]; ?>, <?php echo $aJoin[1]; ?>],
		['2:00', <?php echo $aTime[2]; ?>, <?php echo $aJoin[2]; ?>],
		['3:00', <?php echo $aTime[3]; ?>, <?php echo $aJoin[3]; ?>],
		['4:00', <?php echo $aTime[4]; ?>, <?php echo $aJoin[4]; ?>],
		['5:00', <?php echo $aTime[5]; ?>, <?php echo $aJoin[5]; ?>],
		['6:00', <?php echo $aTime[6]; ?>, <?php echo $aJoin[6]; ?>],
		['7:00', <?php echo $aTime[7]; ?>, <?php echo $aJoin[7]; ?>],
		['8:00', <?php echo $aTime[8]; ?>, <?php echo $aJoin[8]; ?>],
		['9:00', <?php echo $aTime[9]; ?>, <?php echo $aJoin[9]; ?>],
		['10:00', <?php echo $aTime[10]; ?>, <?php echo $aJoin[10]; ?>],
		['11:00', <?php echo $aTime[11]; ?>, <?php echo $aJoin[11]; ?>],
		['12:00', <?php echo $aTime[12]; ?>, <?php echo $aJoin[12]; ?>],
		['13:00', <?php echo $aTime[13]; ?>, <?php echo $aJoin[13]; ?>],
		['14:00', <?php echo $aTime[14]; ?>, <?php echo $aJoin[14]; ?>],
		['15:00', <?php echo $aTime[15]; ?>, <?php echo $aJoin[15]; ?>],
		['16:00', <?php echo $aTime[16]; ?>, <?php echo $aJoin[16]; ?>],
		['17:00', <?php echo $aTime[17]; ?>, <?php echo $aJoin[17]; ?>],
		['18:00', <?php echo $aTime[18]; ?>, <?php echo $aJoin[18]; ?>],
		['19:00', <?php echo $aTime[19]; ?>, <?php echo $aJoin[19]; ?>],
		['20:00', <?php echo $aTime[20]; ?>, <?php echo $aJoin[20]; ?>],
		['21:00', <?php echo $aTime[21]; ?>, <?php echo $aJoin[21]; ?>],
		['22:00', <?php echo $aTime[22]; ?>, <?php echo $aJoin[22]; ?>],
		['23:00', <?php echo $aTime[23]; ?>, <?php echo $aJoin[23]; ?>]        ]);

	var options = {
		//title: '',
		//vAxis: {title: '시각',  titleTextStyle: {color: 'red'}}
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
