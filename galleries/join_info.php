<?php
include "../inc/config.php";

$categoriName = "입점신청";
$pageName = "Artists";
$pageNum = "4";
$subNum = "0";
$thirdNum = "0";
$pathType = "a";
?>
<?php include "../inc/link.php"; ?>
<?php include "../inc/top.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../inc/spot_sub.php"; ?>
  <section id="container_sub" class="content-mediaBox margin1">
    <div class="container_inner">
      <?php include(ROOT.'inc/path.php'); ?>
		<section id="apply_info_area">
			<section class="key_feature">
				<h1 class="title8 top_line">갤러리즈 핵심 기능 8가지</h1>
				<table class="tb_features">
					<tbody>
						<tr>
							<th><strong><img src="/images/galleries/ico_join1.png" alt="" /></strong></th>
							<td>
								<p>관리자 계정을 통한 독립적인 온라인 갤러리 페이지 </p>
								<p><strong>갤러리 페이지 내 작품, 작가, 전시 정보 운영·관리 기능</strong></p>
							</td>
							<th><strong><img src="/images/galleries/ico_join2.png" alt="" /></strong></th>
							<td>
								<p>갤러리와 고객 간의 직접 거래 기능 </p>
								<p>‘<strong>다이렉트 프라이스 리퀘스트</strong>’ (판매수수료0%)</p>
							</td>
						</tr>
						<tr>
							<th><strong><img src="/images/galleries/ico_join3.png" alt="" /></strong></th>
							<td>
								<p>정보 노출의 내용, 범위 선택, 실시간 운영·관리 </p>
								<p>(<strong>작품 판매가 비공개 정책</strong>/필수사항)</p>
							</td>
							<th><strong><img src="/images/galleries/ico_join4.png" alt="" /></strong></th>
							<td>
								<p>구글 캘린더, 애플 캘린더 등 </p>
								<p>관심 <strong>전시 일정 자동 캘린더 동기화</strong></p>
							</td>
						</tr>
						<tr>
							<th><strong><img src="/images/galleries/ico_join5.png" alt="" /></strong></th>
							<td>
								<p>갤러리 소속 작가, 전시 작품, 소장품 등 </p>
								<p><strong>온라인</strong> 클라우드 (총 300건)</p>
							</td>
							<th><strong><img src="/images/galleries/ico_join6.png" alt="" /></strong></th>
							<td>
								<p>작가, 갤러리 <strong>통합 스마트 검색</strong> 및 지역, 장르별 소팅</p>
							</td>
						</tr>
						<tr>
							<th><strong><img src="/images/galleries/ico_join7.png" alt="" /></strong></th>
							<td>
								<p>전시 배너, 행사 안내, 게시판 등 <strong>갤러리 홍보 극대화</strong></p>
							</td>
							<th><strong><img src="/images/galleries/ico_join8.png" alt="" /></strong></th>
							<td>
								<p>갤러리 기사 링크, 아트페어 링크, 소속 작가 SNS 등 </p>
								<p><strong>링크 쉐어 플러그인 연동</strong></p>
							</td>
						</tr>
					</tbody>
				</table>
<script>
	function tableColor(){
		var t = $("table.tb_features");
		var list = t.find('tr');
		var len = list.length;
		for(var i = 0 ; i < len ; i = i+2){
			list.eq(i+1).addClass('gray');
		}
	}
	tableColor();
</script>
			</section>
			<section class="process_lst2">
				<h1 class="title8 top_line">갤러리즈 입점 절차</h1>
				<div class="inner">
					<ul>
						<li>
							<h1><img src="/images/ico/ico_arti_proc01.gif" alt="단계1"/></h1>
							<div>
								<h2><span class="ipt"><strong>입점신청 : </strong>입점 신청 페이지에 갤러리 정보 작성</span><a href="/galleries/join/">입점 신청하기</a></h2>
							</div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc02.gif" alt="단계2"/></h1>
							<div>
								<h2><span><strong>개점승인 : </strong>신청 자료 검토 후 개별 연락</span></h2>
								<p class="tip2">* 아트페어 참가, 연간 기획/초대전 횟수, 소속작가 현황 등 갤러리 업력 및 규모에 따라 갤러리즈 입점 승인이 제한될 수 있습니다.</p>
							</div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc03.gif" alt="단계3"/></h1>
							<div><h2><span><strong>대금납부 : </strong>입점료 및 이용료(월) 납부</span></h2></div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc04.gif" alt="단계4"/></h1>
							<div><h2><span><strong>계정등록 : </strong>납부 확인 후 갤러리즈 관리자 페이지 접속 계정 아이디/패스워드 부여</span></h2></div>
						</li>
						<li class="last">
							<h1><img src="/images/ico/ico_arti_proc05.gif" alt="단계5"/></h1>
							<div><h2><span><strong>개점완료 : </strong>관리자 페이지에 접속하여 직접 갤러리 페이지 운영·관리</span></h2></div>
						</li>
					</ul>
					<div class="line"></div>
				</div>
			</section>
			<section class="contact_info">
				<h1 class="title8 top_line">문의</h1>
				<ul class="clearfix">
					<li><img src="/images/galleries/ico_email02.gif" alt="email"><a href="mailto:galleriesart1@art1.com">galleriesart1@art1.com</a></li>
					<li><img src="/images/galleries/ico_phone02.gif" alt="phone"><a href="tel:02-6325-9271">02-6325-9271</a></li>
				</ul>
			</section>
		</section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
<script>
$(function(){
	LabelHidden(".inp_txt.lh");
	initFileUploads();
});
</script>
<?php include "../inc/footer.php"; ?>
<?php include "../inc/bot.php"; ?>





