<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');

$pageName = 'MAIN';
$pageNum = '0';
$subNum = '0';
$thirdNum = '0';


/*
$k = 6;
$no = 3;
$beginDay = date('Y-m-d', strtotime('-6 day'));
$endDay = date('Y-m-d', strtotime('+1 day'));

$Statistics = new Statistics();
$Statistics->setAttr('beginDay', $beginDay);
$Statistics->setAttr('endDay', $endDay);
$aWeekDayJoin = $Statistics->getWeekDayJoin($dbh); // 최근 일주 신규회원가입
$aWeekDayVisitorPageView = $Statistics->getWeekDayVisitorPageView($dbh); // 최근 일주 접속회원 & 최근 일주 페이지뷰
$aWeekDaySale = $Statistics->getWeekDaySale($dbh); // 최근 일주 매출
$aAdviceList = $Statistics->getAdviceList($dbh); // 최근 일주 매출

//print_r($aWeekDayJoin);
//print_r($aWeekDayVisitorPageView);
//print_r($aWeekDaySale);

$point = 0;

for($i = 0; $i < 7; $i++) {
	$aYYYYMMDD[$i] = str_replace('-', '.', date('Y-m-d', strtotime('-'.$k.' day')));
	$nDay = (int)substr($aYYYYMMDD[$i], -2);
	//echo '<br>nDay:'.$nDay;
	//echo '<br>aWeekDaySale:'.$aWeekDaySale[$i]['days'];
	$aTmpWeekDayJoin[$i]  = ($nDay === (int)$aWeekDayJoin[$i]['days']) ? $aWeekDayJoin[$i]['counts'] : 0;
	$aTmpWeekDayVisitor[$i]  = ($nDay === (int)$aWeekDayVisitorPageView[$i]['days']) ? $aWeekDayVisitorPageView[$i]['visitor_cnt'] : 0;
	$aTmpWeekDayPageView[$i]  = ($nDay === (int)$aWeekDayVisitorPageView[$i]['days']) ? $aWeekDayVisitorPageView[$i]['page_view_cnt'] : 0;
	//$aTmpWeekDaySale[$i]  = ($nDay === (int)$aWeekDaySale[$i]['days']) ? $aWeekDaySale[$i]['amounts'] : 0;

	if ($nDay === (int)$aWeekDaySale[$point]['days']) {
		$aTmpWeekDaySale[$i] = $aWeekDaySale[$point]['amounts'];
		++$point;
	}
	else {
		$aTmpWeekDaySale[$i] = 0;
	}

	--$k;
}
*/

/*
$point = 0;
for($i = 0; $i < 7; $i++) {
	$aYYYYMMDD[$i] = str_replace('-', '.', date('Y-m-d', strtotime('-'.$k.' day')));
	$nDay = (int)substr($aYYYYMMDD[$i], -2);

	if ($nDay === (int)$aWeekDaySale[$point]['days']) {
		$aTmpWeekDaySale[$i] = $aWeekDaySale[$point]['amounts'];
		++$point;
	}
	else {
		$aTmpWeekDaySale[$i] = 0;
	}
	//$aTmpWeekDaySale[$i]  = ($nDay === (int)$aWeekDaySale[$i]['days']) ? $aWeekDaySale[$i]['amounts'] : 0;
}
*/



//통계 데이터 S
$k = 6;
$no = 3;
$beginDay = date('Y-m-d', strtotime('-6 day'));
$endDay = date('Y-m-d', strtotime('+1 day'));

$Statistics = new Statistics();
$Statistics->setAttr('beginDay', $beginDay);
$Statistics->setAttr('endDay', $endDay);
$aWeekDayJoin = $Statistics->getWeekDayJoin($dbh); // 최근 일주 신규회원가입
$aWeekDayVisitorPageView = $Statistics->getWeekDayVisitorPageView($dbh); // 최근 일주 접속회원 & 최근 일주 페이지뷰
$aWeekDaySale = $Statistics->getWeekDaySale($dbh); // 최근 일주 매출
$aAdviceList = $Statistics->getAdviceList($dbh); // 답변 필요 문의

$point = 0;

$aTmpWeekDayJoin = array_fill(0, 7, 0);
$aTmpWeekDayVisitor = array_fill(0, 7, 0);
$aTmpWeekDayPageView = array_fill(0, 7, 0);


for($i = 0; $i < 7; $i++) {
	$join_day[$i] =  date("d",strtotime(-6 + $i ." day"));
	foreach($aWeekDayJoin  as $row){
		if(sprintf("%02d",$row['days']) == sprintf("%02d",$join_day[$i]) ) {
			$aTmpWeekDayJoin[$i] =  $row['counts'];
		}
	}

	foreach($aWeekDayVisitorPageView  as $row){
		if(sprintf("%02d",$row['days']) == sprintf("%02d",$join_day[$i]) ) {
			$aTmpWeekDayVisitor[$i] =  $row['visitor_cnt'];
		}
	}

	foreach($aWeekDayVisitorPageView  as $row){
		if(sprintf("%02d",$row['days']) == sprintf("%02d",$join_day[$i]) ) {
			$aTmpWeekDayPageView[$i] =  $row['page_view_cnt'];
		}
	}

}

for($i = 0; $i < 7; $i++) {
	$aYYYYMMDD[$i] = str_replace('-', '.', date('Y-m-d', strtotime('-'.$k.' day')));
	$nDay = (int)substr($aYYYYMMDD[$i], -2);

	if ($nDay === (int)$aWeekDaySale[$point]['days']) {
		$aTmpWeekDaySale[$i] = $aWeekDaySale[$point]['amounts'];
		++$point;
	}
	else {
		$aTmpWeekDaySale[$i] = 0;
	}

	--$k;
}
//통계 데이터 E



$db = null;
$Statistics = null;
unset($db);
unset($Statistics);

include(ROOT.'oktomato/inc/link.php');
include(ROOT.'oktomato/inc/top.php');
include(ROOT.'oktomato/inc/header.php');
include(ROOT.'oktomato/inc/side.php');
?>
<section id="container">
	<div class="container_inner">
		<?php include(ROOT.'oktomato/inc/path.php'); ?>
		 <article class="content">
			<section class="section_box">
				<h1 class="title1">art1 statistics</h1>
				<div class="graphBox" style="width:1051px, height:200px;text-align:center">
					<section>
						<div id="help_discrete_date_chart"></div>
					</section>
					<section>
						<div id="help_discrete_date_chart2"></div>
					</section>
					<div class="lst_table2 t-c">
						<table summary="">
							<caption></caption>
							<colgroup>
							<col class="no_1">
							<col>
							<col>
							<col>
							<col>
							</colgroup>
							<thead>
								<tr>
									<th scope="row"></th>
									<th scope="row">신규회원</th>
									<th scope="row">접속자</th>
									<th scope="row">페이지뷰</th>
									<th scope="row">매출</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i=0;
								foreach($aYYYYMMDD as $row){ ?>
								<tr>
									<td><?php echo $row?></td>
									<td ><?php echo $aTmpWeekDayJoin[$i]; ?></td>
									<td><?php echo $aTmpWeekDayVisitor[$i]; ?></td>
									<td><?php echo $aTmpWeekDayPageView[$i]; ?></td>
									<td class="amount"><?php echo $aTmpWeekDaySale[$i]; ?></td>
								</tr>
								<?php
									$i++;
								}
								?>
							<?php //for($i = 0; $i < 7; $i++): ?>
								<!--<tr>
									<td><?php echo $aYYYYMMDD[$i]; ?></td>
									<td ><?php echo number_format($aTmpWeekDayJoin[$i]); ?></td>
									<td><?php echo number_format($aTmpWeekDayVisitor[$i]); ?></td>
									<td><?php echo number_format($aTmpWeekDayPageView[$i]); ?></td>
									<td><?php echo number_format($aTmpWeekDaySale[$i]); ?></td>
								</tr>
								-->
							<?php //endfor; ?>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<section class="section_box">
				<h1 class="title1">답변필요문의</h1>
				<div class="lst_table2 t-c">
					<table summary="">
						<caption></caption>
						<colgroup>
						<col class="no_1">
						<col>
						<col>
						<col>
						<col>
						<col class="data">
						<col class="control1">
						</colgroup>
						<thead>
							<tr>
							<th scope="row">No</th>
							<th scope="row">이름</th>
							<th scope="row">요청작품명</th>
							<th scope="row">문의유형</th>
							<th scope="row">등록일</th>
							<th scope="row">상태</th>
							<th scope="row">관리</th>
						</tr>
						</thead>
						<tbody>
					<?php
						if  (is_array($aAdviceList) && count($aAdviceList) > 0) {
							foreach($aAdviceList as $row) {
								if ($row['request_status']) {
									$request_status = ' fc_red ';
									$request_status_text = ' 답변완료 ';
								} else {
									$request_status = '';
									$request_status_text = ' 답변대기 ';
								}
								if ($row['request_type'] == 'rental') {
									$request_type_text = '렌탈';
								}elseif($row['request_type'] == 'advice') {
									$request_type_text = '상담';
								}
					?>
							<tr>
								<td><?php echo $no; ?></td>
								<td class="name"><?php echo $row['advice_user_name'];?></td>
								<td><?php echo $row['goods_name'];?></td>
								<td><?php echo $request_type_text;?></td>
								<td class="fc1"><?php echo substr($row['create_date'], 0, 10);?></td>
								<td><span class="<?php echo $request_status;?>"><?php echo $request_status_text;?></span></td>
								<td>
									<div class="user_td_control1">
										<button onclick="editArticle(<?php echo $row['advice_idx'];?>);">수정</button>
										<button onclick="deleteArticle(<?php echo $row['advice_idx'];?>);">삭제</button>
									</div>
								</td>
							</tr>
					<?php
							--$no;
							}
						}
						else {
					?>
							<tr>
								<td colspan="7">자료가 없습니다.</td>
							</tr>

					<?php
						}
					?>
						</tbody>
					</table>
				</div>
			</section> <!-- //lst_table2 -->
		</article>
	</div> <!-- //container_inner -->
</section> <!-- //container -->
<script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

<script type="text/javascript">
google.setOnLoadCallback(drawHelpCharts);
google.setOnLoadCallback(drawHelpCharts2);

function drawHelpCharts() {
	// Create and populate the data table.
	var dateData = new google.visualization.DataTable();
	dateData.addColumn('string', '일자');
	dateData.addColumn('number', '신규회원');
	dateData.addColumn('number', '접속자');
	dateData.addColumn('number', '페이지뷰');
	dateData.addRows([

<?php for($i = 0; $i < 7; $i++): ?>
	<?php if ($i === 6): ?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpWeekDayJoin[$i]; ?>, <?php echo $aTmpWeekDayVisitor[$i]; ?>, <?php echo $aTmpWeekDayPageView[$i]; ?>]
	<?php else: ?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpWeekDayJoin[$i]; ?>, <?php echo $aTmpWeekDayVisitor[$i]; ?>, <?php echo $aTmpWeekDayPageView[$i]; ?>],
	<?php endif; ?>
<?php endfor; ?>
	]);

	var discreteOptions = {
		title: '최근 1주',
		width: 1200, height: 400,
		//legend: 'none',
		pointSize: 10
	};

	var discreteDateChart = new google.visualization.LineChart(document.getElementById('help_discrete_date_chart'));
	discreteDateChart.draw(dateData, discreteOptions);
}

function drawHelpCharts2() {
	// Create and populate the data table.
	var dateData2 = new google.visualization.DataTable();
	dateData2.addColumn('string', '일자');
	dateData2.addColumn('number', '매출');
	dateData2.addRows([
<?php for($i = 0; $i < 7; $i++): ?>
	<?php if ($i === 6): ?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpWeekDaySale[$i]; ?>]
	<?php else: ?>
	['<?php echo $aYYYYMMDD[$i]; ?>', <?php echo $aTmpWeekDaySale[$i]; ?>],
	<?php endif; ?>
<?php endfor; ?>
	]);

	var discreteOptions2 = {
		title: '최근 1주',
		width: 1200, height: 400,
		//legend: 'none',
		pointSize: 10
	};

	var discreteDateChart2 = new google.visualization.LineChart(document.getElementById('help_discrete_date_chart2'));
	discreteDateChart2.draw(dateData2, discreteOptions2);
}

<?php if (is_array($aAdviceList) && count($aAdviceList) > 0): ?>
function editArticle(idx) {
	location.href="/oktomato/market/advice/?at=read&idx="+idx+"&page=1&mode=edit";
}

function deleteArticle(idx) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"/oktomato/market/advice/__delete.php",
			dataType:"JSON",
			data:{"idx":idx},
			success: function(data) {
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
					location.reload();
				}
				else{
					alert("삭제할 수 없습니다.");
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}
<?php endif; ?>
</script>
<?php
include(ROOT.'oktomato/inc/bot.php');