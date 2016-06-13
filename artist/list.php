<?php
// include('write.php');
?>

<? include "../inc/config.php"; ?>
<?php
$categoriName = '작가등록';
$pageName = '작가등록';
$pageNum = '10';
$subNum = '3';
$thirdNum = '0';
$pathType = 'a';
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?>  
      	
		<section id="photographerArea" class="content-mediaBox margin1">
			<section class="benfit_lst">
				<h1 class="title8 top_line">작가등록 혜택</h1>
				<div class="txtBox">
					<p>
						온라인 마켓에서 뉴스, 영상아카이브, 커뮤니티까지 원스톱 미술포털을 지향하는 아트1은 대한민국 온라인 미술시장의 새로운 지평을 열고, 작가와 대중이 함께 만나는 장이 되기를 희망합니다. 
						또한 아트1 온라인 마켓에서는 작품거래에 있어 작가 중심의 수수료정책을 적용하여, 국내작가들의 보다 활발한 작품 활동을 장려하고 실질적인 지원책을 마련하고자 합니다. 작가분들의 많은 관심과 참여 바랍니다.
					</p>
				</div>
				<div class="inner">
					<ul class="clearfix">
						<li class="bp_gray">
							<img src="/images/ico/ico_benefit01.gif" alt="혜택1">
							<hgroup>
								<h1>01</h1>
								<h2>온라인 마켓에서 작품 렌탈 및 판매</h2>
							</hgroup>
						</li>
						<li class="bp_brwo">
							<img src="/images/ico/ico_benefit02.gif" alt="혜택2">
							<hgroup>
								<h1>02</h1>
								<h2>뉴스페이지에서 작가소개 및 기사생산<span class="tmp">(아트1, 뉴스1, 뉴시스, 머니투데이 등)</span></h2>
							</hgroup>
						</li>
						<li class="bp_pink">
							<img src="/images/ico/ico_benefit03.gif" alt="혜택3">
							<hgroup>
								<h1>03</h1>
								<h2>아트1 ‘ARTIST REC’ 영상아카이브 촬영<span class="tmp">및 MTN방송 작가소개 광고 송출</span></h2>
							</hgroup>
						</li>
						<li class="bp_gray">
							<img src="/images/ico/ico_benefit04.gif" alt="혜택4">
							<hgroup>
								<h1>04</h1>
								<h2>아트1 아트콜라보레이션, 기업 프로모션<span class="tmp">참여 작가등록</span></h2>
							</hgroup>
						</li>
						<li class="bp_brwo">
							<img src="/images/ico/ico_benefit05.gif" alt="혜택5">
							<hgroup>
								<h1>05</h1>
								<h2>이미지라이브러리 토픽이미지 <span class="tmp">(아트1, 뉴스1, 뉴시스, 머니투데이 등) </span><span class="tmp">아트갤러리 등록</span></h2>
							</hgroup>
						</li>
						<li class="bp_pink">
							<img src="/images/ico/ico_benefit06.gif" alt="혜택6">
							<hgroup>
								<h1>06</h1>
								<h2>작품 고화질 촬영 및 빅데이터 제작, <span class="tmp">오프라인 전시개최</span></h2>
							</hgroup>
						</li>
					</ul>
				</div>
			</section>

			
			<section class="process_lst2">
				<h1 class="title8 top_line">작가등록 방법</h1>
				<div class="inner">
					<ul>
						<li>
							<h1><img src="/images/ico/ico_arti_proc01.gif" alt="단계1"/></h1>
							<div>
								<h2><span class="ipt">art1.com 작가등록 페이지에 작가등록 정보 작성</span><a href="/artist/?at=write">작가등록하기 +</a></h2>
							</div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc02.gif" alt="단계2"/></h1>
							<div class="bg_lock">
								<h2><span class="ipt">웹하드(webhard.co.kr) 로그인</span><a href="http://www.webhard.co.kr/" target="_blank">자료업로드하기 +</a></h2>
								<p class="tip">아이디 &nbsp;art1com &nbsp;/ &nbsp;비밀번호 &nbsp;art1com</p>
								<dl class="circle_pc">
									<dt><span class="h100"></span><span>GUEST그룹<span class="tmp">폴더</span></span></dt>
									<dd><img src="/images/bg/bg_arrow.png" alt="화살표"/></dd>
									<dt><span class="h100"></span><span>market<span class="tmp">폴더</span></span></dt>
									<dd><img src="/images/bg/bg_arrow.png" alt="화살표"/></dd>
									<dt><span class="h100"></span><span>‘작가명’으로<span class="tmp">폴더생성</span></span></dt>
									<dd><img src="/images/bg/bg_arrow.png" alt="화살표"/></dd>
									<dt><span class="h100"></span><span>비밀번호<span class="tmp">설정</span></span></dt>
									<dd><img src="/images/bg/bg_arrow.png" alt="화살표"/></dd>
									<dt><span class="h100"></span><span>업로드</span></dt>
								</dl>
								<p class="tip2">* 반드시 ‘작가명’으로 폴더를 만들어주시고, 비밀번호를 설정하시기 바랍니다.</p>
								<dl class="note">
									<dt>업로드 자료</dt>
									<dd><span>1</span> 개인프로필 (개인전/단체전/수상경력/학력/연락처/주소 등 자세히 기술)</dd>
									<dd><span>2</span> 프로필 사진(증명사진은 제외합니다.)</dd>
									<dd><span>3</span> 작품이미지 첨부(5 ~ 15점, 사이즈: 300dpi 이상 2mb 이하)
										<ul>
											<li>작품이미지 파일명으로 [제목, 사이즈, 재료, 제작년도, 작품판매가(시장거래가), 프레임 유무] 기재</li>
											<li>국영문 모두 기입(해당자에 한함)</li>
										</ul>
									</dd>
									<dd><span>4</span> 작가노트 및 작업계획서</dd>
								</dl>
							</div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc03.gif" alt="단계3"/></h1>
							<div><h2><span>아트1 심사단의 심사 후 개별연락</span></h2></div>
						</li>
						<li>
							<h1><img src="/images/ico/ico_arti_proc04.gif" alt="단계4"/></h1>
							<div><h2><span>작가공문, 작품 거래계약서 및 저작물 이용 동의서 확인 후 계약 진행여부 결정</span></h2></div>
						</li>
						<li class="last">
							<h1><img src="/images/ico/ico_arti_proc05.gif" alt="단계5"/></h1>
							<div><h2><span>서면계약 진행</span></h2></div>
						</li>
					</ul>
					<div class="line"></div>
				</div>
			</section>
			<section class="contact_info">
				<h1 class="title8 top_line">문의</h1>
				<ul class="clearfix">
					<li><div><img src="/images/bg/ico_email02.gif" alt="email"><span>E-mail: </span><a href="mailto:art1@art1.com">art1@art1.com</a> / <a href="mailto:curator@art1.com">curator@art1.com</a></div></li>
					<li><div><img src="/images/bg/ico_phone02.gif" alt="phone"><span>Tel: </span>02-6325-9271 / 02-6325-9270</div></li>
					<li><div><img src="/images/bg/ico_fax02.gif" alt="fax"><span>Fax: </span>02-6005-9277</div></li>
				</ul>
			</section>
			
			
			
		</section>


      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





