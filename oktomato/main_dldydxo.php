<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/include/chk.admin.inc.php');
require(ROOT.'lib/class/statistics/statistics.class.php');
require(ROOT.'lib/class/exhibition/exhibition.class.php');

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
				<div id="preview_div"></div>
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


			<?php
			$period_days = '7';
			$edate = date("Y-m-d");
			$bdate = date("Y-m-d", strtotime($edate.'-'.$period_days.' days') );

			$Exhibition = new Exhibition();
			$Exhibition->setAttr("word", $word);
			$Exhibition->setAttr("page", 1);
			$Exhibition->setAttr("sz", 100);
			$Exhibition->setAttr("bdate", $bdate);
			$Exhibition->setAttr("edate", $edate);
			$Exhibition->setAttr("sort", $sort);
			$Exhibition->setAttr("od", $od);
			$Exhibition->setAttr("cfm", "W");
			$tmp = $Exhibition->getList($dbh);
			$aExhibitionList = $tmp[0];
			$total_cnt = $tmp[1];
			$total_all_cnt = $tmp[2];

			?>
			<script>
			var preview_div_text = " <p><span class='title2'>Preview</span> 전시관리에 최근 <?php echo $period_days?>일간 승인대기 중 목록이 <span class='fc_red'><?php echo $total_cnt?> 건</span> 있습니다.</p><br> ";
			$("#preview_div").html(preview_div_text);
			</script>
			<section class="section_box">
				<h1 class="title1">Preview 전시관리 (최근 일주일간 등록건 중 승인대기 목록)</h1>
				<div class="lst_table2 t-c">
				
				<table summary="전시관리 결과">
					<input type="hidden" name="mode" value="delete">
					<caption>검색결과리스트_테이블</caption>
					<colgroup>
					  <col>
					  <col>
					  <col>
					  <col>
					  <col>
					  <col>
					</colgroup>
					<thead>
					  <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
						<th scope="row">No</th>
						<th scope="row">배너</th>
						<th scope="row">링크</th>
						<th scope="row">신청자명</th>
						<th scope="row">연락처</th>
						<th scope="row">신청일</th>
					  </tr>
					</thead>
					<tbody>
					<?php
						if  (is_array($aExhibitionList) && count($aExhibitionList) > 0) {
							foreach($aExhibitionList as $row) {

								if($row['exh_confirm'] == 'W') { $cfm_css = 'fc_red' ;}
								if($row['exh_confirm'] == 'Y') { $cfm_css = 'fc_blue' ;}
								if($row['exh_confirm'] == 'N') { $cfm_css = '' ;}
								?>
								  
								  <tr>
									<td><?php echo($PAGE_UNCOUNT);?></td>
									<!-- td><a href="javascript:previewImg('<?php echo $row['exh_idx'];?>');" class="fc_blue td_u">Preview</a></td -->
									<td><a href="#RecommendedImgPopup" class="fc_blue td_u layerOpenImg" data-idx="<?php echo $row['exh_idx'];?>" >Preview</a></td>
								   <td><a href="<?php echo($row['exh_link']);?>" target="_blank" class="fc_blue td_u">Link</a></td>
								   <td class="name"><a href="/oktomato/member/?at=read&idx=<?php echo $row['user_idx']?>"><?php echo($row['exh_user_name']);?></a></td>
									<td class="fc1"><?php echo($row['exh_tel']);?></td>
									<td class="fc1"><?php echo(substr($row['create_date'],0,10));?></td>
								  </tr>


									<script>
										$(".layerOpen").click(function(){
										$(".layer_popup1").css("display","none");
										var id = $(this).attr("href");
										var x = $(this).offset().left-150;
										var y = $(this).offset().top-100;
										layerBoxOffset(id,x,y);
										return false;

									});
									</script>
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

		  <section id="RecommendedListPopup" class="layer_popup1 trea">
			 <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
			 <article class="cont">
				<h1>처리</h1>
				<div class="scrollBox2 trea">
				  <ul class="butt_list">
					<li><button class="buttTxt" data-confirm="Y" >승인</button></li>
					<li><button class="buttTxt" data-confirm="W">대기</button></li>
					<li><button class="buttTxt" data-confirm="N">거절</button></li>
					<li><button class="buttTxt" data-confirm="D">삭제</button></li>
				  </ul>
				</div>
			 </article> 
		 </section>

		 <section id="RecommendedImgPopup" class="layer_popup2" >
		</section>
       
<script>
 $(function(){
  //레이어 팝업

//previewImg(idx);
  //이미지 팝업
   $(".layerOpenImg").click(function(){
		var idx = $(this).data("idx"); //카테고리 코드

        $(".layer_popup2").css("position","absolute");
		$(".layer_popup2").css("display","none");
        var id = $(this).attr("href");
        var x = $(this).offset().left -210;
        var y = $(this).offset().top-1450;

		layerBoxOffset(id,x,y);
		previewImg(idx);

        return false;

    });


	function previewImg(idx) {
		$.ajax({
			type:"POST",
			url:"/oktomato/exhibition/__file_view.php",
			data:{"idx":idx},
			success: function(data) {
				// alert(data);
				//$("#divImgPreview").html(data);  
				$("#RecommendedImgPopup").html(data);  
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}

});

	  function hiddenPopup(e,id){ //레이어 이외의 곳 클릭시 팝업닫기
		$('#'+id).each(function(){
				if( $(this).css('display') == 'block' )
				{
					var l_position = $(this).offset();
					//l_position.right = parseInt(l_position.left) + ($(this).width()) ;
					l_position.right = parseInt(l_position.left) + ($(this).outerWidth()) ;
					
					//l_position.bottom = parseInt(l_position.top) + parseInt($(this).height());
					l_position.bottom = parseInt(l_position.top) + parseInt($(this).outerHeight());

					if(   ( l_position.left <= e.pageX && e.pageX <= l_position.right )
							&& ( l_position.top <= e.pageY && e.pageY <= l_position.bottom ) ){
						//alert( 'popup in click' );
					}else{
						//alert( 'popup out click' );
						//$(this).hide("fast");
						$(this).hide();
					}
				}
		});
	}

$(document).mousedown(function(e){ //레이어 이외의 곳 클릭시 팝업닫기
	hiddenPopup(e,'RecommendedListPopup');
	hiddenPopup(e,'RecommendedImgPopup');
});

</script>





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