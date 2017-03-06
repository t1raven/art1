<?php
/*if (!defined('OKTOMATO')) exit;*/

$pageNum = "1";
$subNum = "1";
$thirdNum = "0";

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';

function strReplaceQuotationMark ($str) { //큰따옴표, 작은따옴표 변경
		$str = str_replace('"','&#34;', $str  );  
		$str = str_replace("'","&#39;", $str  );  
		$str = str_replace('"','', $str  ); 
		$str = str_replace("'","", $str  );  
		$str = trim($str);

		return $str;
}

?>

<link rel="stylesheet" href="/oktomato/css/main_renew.css" />
<script src="/oktomato/js/isotope.pkgd.min.js"></script>
<script src="/oktomato/js/idangerous.swiper.min.js"></script>

 <section id="container">
  <div class="container_inner" style="max-width: 1600px;">
    <?php include '../../inc/path.php'; ?>
     <article class="content" style="position:relative;">
        
		<section id="NewsV2" class="section_box main-grid desktop">
            <h1 class="title1">00. Section News</h1>
            <div class="lst_check radio display_opt">
				<label>Display : </label>
				<span class="on">
				  <label for="isDisplayD0">Desktop</label>
				  <input type="radio" name="isDisplay[0]" id="isDisplayD0" value="desktop" checked="">
				</span>
				<span>
				  <label for="isDisplayL0">Laptop</label>
				  <input type="radio" name="isDisplay[0]" id="isDisplayL0" value="laptop">
				</span>
				<span>
				  <label for="isDisplayT0">Tablet</label>
				  <input type="radio" name="isDisplay[0]" id="isDisplayT0" value="tablet">
				</span>
				<span>
				  <label for="isDisplayM0">Mobile</label>
				  <input type="radio" name="isDisplay[0]" id="isDisplayM0" value="mobile">
				</span>
			</div>
            <div class="inner">
            	<div class="bx_news">
            		<ul>
            			<li class="grid-sizer"></li>
						<li class="grid-item w2 slider">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato" onclick="edit_cont();">Edit</button>
								</div>
  								<ul class="img slide">
									<li><img src="/upload/news/1485997255QA5HAMHWA2.jpg" alt="뉴스기사" /></li>
									<li><img src="/upload/news/1485922590X9MV4WDNF6.jpg" alt="뉴스기사" /></li>
									<li><img src="/upload/news/14858209879LKZW7ZVNB.jpg" alt="뉴스기사" /></li>
								</ul>
								<div class="con_t2">
									<h2 class="rato">HEADLINE</h2>
									<div id="news_sect_slide1" class="bx_slide">
										<ul class="swiper-wrapper swiper-no-swiping">
											<li class="swiper-slide ">
												<h3><a>미술이 자연을 담는 법…일우스페이스 '네오 내추럴리즘'전</a></h3>
												<p>
													<a>강인구, 김춘환, 이광호, 이기봉, 이세현 작가의 그룹전이 서울 중구 서소문동에 위치한 한진그룹 산하 일우재단의 전시공간 일우스페이스에서 열리고 있다. <br><br>'네오 내추럴리즘'이라는 주제로 열리는 일우스페이스의 올해 첫번째 기획전에서는 21세기 '신 자연주의'를 이야기한다. 19세기 말 프랑스 소설가 에밀 졸라를 중심으로 문학, 철학, 미술 등 다양한 분야에 영향을 준 자연주의는 자연과 현실을 사실적으로 관찰하고 객관적으로 받아들이는 사상이다. 특히 미술 분야에서는 사실주의 화파의 근간이 되기도 했다. <br><br>전시에서는 자연과 현 </a>
												</p>
											</li>
											<li class="swiper-slide ">
												<h3><a>비디오아티스트 고(故) 박현기의 숨겨진 드로잉을 만나다</a></h3>
												<p>
													<a>비디오 아티스트 박현기(1942-2000)의 드로잉 작업들을 대규모로 선보이는 전시가 오는 2일부터 서울 종로구 사간동 갤러리현대에서 열린다. <br><br>'박현기-보이는 것과 보이지 않는 것'(Visible, Invisible)이라는 주제로 열리는 이번 전시에서는 1993~1994년 집중적으로 제작된 오일스틱 드로잉 20여 점과 주요 설치 작품 4~5점을 볼 수 있다.  <br><br>특히 드로잉 작업들은 한 화면에서 단어와 형상들이 반복된다. 작가가 생전에 일관된 태도로 관심을 가져 왔던 이미지의 중첩과 바라보는 것의 문제에 대해 드로잉을 </a>
												</p>
											</li>
											<li class="swiper-slide ">
												<h3><a>'단색화' 런던·뉴욕서 다시 날개…박서보·김기린·정상화 개인전 잇따라</a></h3>
												<p>
													<a>단색화가 새해 다시 세계미술시장의 주목을 받고 있다. <br><br>세계 미술계의 큰손으로 꼽히는 화이트 큐브, 리만 머피갤러리, 레비 고비 갤러리등이 단색화가들을 러브콜, '단색화'를 조명중이다. 그동안 단색화가 그룹전으로 존재감을 높였다면, 올해는 대표 화가들의 해외 개인전이 잇따르고 있다. <br><br>국내에서는 뒤늦게 집중한 단색화는 'K-아트'의 새로운 한류로 인기몰이다. 팔순이 넘은 단색화가들도 놀랍다. "생각만 했던 공간에서 전시"하며 화가로서의 생전 환희를 누리고 있다. </a>
												</p>
											</li>
										</ul>
										<div class="pagination"></div>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato" onclick="edit_cont();">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>News Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>News Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>News Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>News Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="bx_logo">
									<div class="inner2">
										<div id="news_timer" class="bx_time">
											<h2><span>10:00</span><small> PM</small></h2>
											<h3>1월 1일 월요일</h3>
										</div>
										<div class="logos">
											<a target="_blank"><img src="/images/main/logo_space_art1.png" alt="space_art1"></a>
											<a target="_blank"><img src="/images/main/logo_media_art1.png" alt="media_art1"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>News Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>News Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>News Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>News Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item w2 board">
							<div class="inner">
								<div class="bx_bbs_list">
									<div class="inner2">
										<div class="list">
											<ul class="depth1">
												<li class="show">
													<table class="depth2">
														<tbody>
															<tr><th>Episode</th><td><a>전시에 미술 작품이 없다?…비평가들의 비평 전시 '눈길'</a></td><td class="date">Feb.02</td></tr>
															<tr><th>People</th><td><a>'소우주'가 된 갤러리…설치미술가 애나 한 '폰즈 인 스페이스 0.5'전</a></td><td class="date">Feb.02</td></tr>
															<tr><th>Trend</th><td><a>재능문화, JCC 미술관 ‘제1회 JCC 예술상 및 프론티어 미술대상’ 수상자 발표</a></td><td class="date">Feb.02</td></tr>
															<tr><th>Episode</th><td><a>순수예술과 대중문화 사이…그라플렉스 '볼드 팩토리'전</a></td><td class="date">Feb.02</td></tr>
															<tr><th>Episode</th><td><a>개관 1년 넘었는데…초대 국립亞전당장 네 번째 공모</a></td><td class="date">Feb.02</td></tr>
															<tr><th>Episode</th><td><a>"사용한 유료 관람권 가져오면 책 무료로 드립니다"</a></td><td class="date">Feb.02</td></tr>
															<tr><th>People</th><td><a>서울시립미술관 신임 관장에 최효준씨 내정</a></td><td class="date">Feb.01</td></tr>
														</tbody>
													</table>
												</li>
											</ul>
										</div>
										<div class="btns">
											<button><img src="/images/main/ico_page_up1.png" alt=""></button>
											<button><img src="/images/main/ico_page_down1.png" alt=""></button>
										</div>
									</div>
								</div>
							</div>
						</li>
            		</ul>
            	</div>
            	<div class="bot_banner">
            		<div class="inner">
            			<div class="util">
							<button class="btn_pack1 gray ov-b small rato">Edit</button>
						</div>
            			<div class="img">
            				<!-- <img src="/upload/banner/14859114808PLM72S55E.jpg" class="pc" alt="">
            				<img src="/upload/banner/1485911480DULCHKGD2Z.jpg" class="mobile" alt=""> -->
            			</div>
            		</div>
            	</div>
            </div>
        </section><!--// section_box -->

        <section id="" class="section_box main-grid desktop">
            <h1 class="title1">01. Section 1</h1>
        	<div class="lst_check radio display_opt">
				<label>Display : </label>
				<span class="on">
				  <label for="isDisplayD1">Desktop</label>
				  <input type="radio" name="isDisplay[1]" id="isDisplayD1" value="desktop" checked="">
				</span>
				<span>
				  <label for="isDisplayL1">Laptop</label>
				  <input type="radio" name="isDisplay[1]" id="isDisplayL1" value="laptop">
				</span>
				<span>
				  <label for="isDisplayT1">Tablet</label>
				  <input type="radio" name="isDisplay[1]" id="isDisplayT1" value="tablet">
				</span>
				<span>
				  <label for="isDisplayM1">Mobile</label>
				  <input type="radio" name="isDisplay[1]" id="isDisplayM1" value="mobile">
				</span>
			</div>
            <div class="inner">
            	<div class="bx_news">
            		<ul>
            			<li class="grid-sizer"></li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item w2 h2 stamp">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
            		</ul>
            	</div>
            	<div class="bot_banner">
            		<div class="inner">
            			<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
            			<div class="img">
            				<!-- <img src="/upload/banner/14859114808PLM72S55E.jpg" class="pc" alt="">
            				<img src="/upload/banner/1485911480DULCHKGD2Z.jpg" class="mobile" alt=""> -->
            			</div>
            		</div>
            	</div>
        </section><!--// section_box -->

        <section id="" class="section_box main-grid desktop">
            <h1 class="title1">02. Section 2</h1>
        	<div class="lst_check radio display_opt">
				<label>Display : </label>
				<span class="on">
				  <label for="isDisplayD2">Desktop</label>
				  <input type="radio" name="isDisplay[2]" id="isDisplayD2" value="desktop" checked="">
				</span>
				<span>
				  <label for="isDisplayL2">Laptop</label>
				  <input type="radio" name="isDisplay[2]" id="isDisplayL2" value="laptop">
				</span>
				<span>
				  <label for="isDisplayT2">Tablet</label>
				  <input type="radio" name="isDisplay[2]" id="isDisplayT2" value="tablet">
				</span>
				<span>
				  <label for="isDisplayM2">Mobile</label>
				  <input type="radio" name="isDisplay[2]" id="isDisplayM2" value="mobile">
				</span>
			</div>
            <div class="inner">
            	<div class="bx_news">
            		<ul>
            			<li class="grid-sizer"></li>
						<li class="grid-item w2 h2">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
            		</ul>
            	</div>
            	<div class="bot_banner">
            		<div class="inner">
            			<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
            			<div class="img">
            				<!-- <img src="/upload/banner/14859114808PLM72S55E.jpg" class="pc" alt="">
            				<img src="/upload/banner/1485911480DULCHKGD2Z.jpg" class="mobile" alt=""> -->
            			</div>
            		</div>
            	</div>
        </section><!--// section_box -->

        <section id="" class="section_box main-grid desktop">
            <h1 class="title1">03. Section 3</h1>
        	<div class="lst_check radio display_opt">
				<label>Display : </label>
				<span class="on">
				  <label for="isDisplayD3">Desktop</label>
				  <input type="radio" name="isDisplay[3]" id="isDisplayD3" value="desktop" checked="">
				</span>
				<span>
				  <label for="isDisplayL3">Laptop</label>
				  <input type="radio" name="isDisplay[3]" id="isDisplayL3" value="laptop">
				</span>
				<span>
				  <label for="isDisplayT3">Tablet</label>
				  <input type="radio" name="isDisplay[3]" id="isDisplayT3" value="tablet">
				</span>
				<span>
				  <label for="isDisplayM3">Mobile</label>
				  <input type="radio" name="isDisplay[3]" id="isDisplayM3" value="mobile">
				</span>
			</div>
            <div class="inner">
            	<div class="bx_news">
            		<ul>
            			<li class="grid-sizer"></li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item w2 h2 stamp">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item w2">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
						<li class="grid-item">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="bx_link">
									<div class="inner">
										<dl>
											<dt>
												<div class="bx_tit">
													<h2>Title</h2>
													<div class="line"></div>
												</div>
											</dt>
											<dd>
												<p>Text</p>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</li>
						<li class="grid-item md_hide">
							<div class="inner">
								<div class="util">
									<button class="btn_pack1 gray ov-b small rato">Edit</button>
								</div>
								<div class="img"></div>
								<dl class="con">
									<dt>
										<div class="bx_tit">
											<h2>Category</h2>
											<h3>Title</h3>
										</div>
									</dt>
									<dd>
										<div class="inner">
											<p>Text</p>
											<span class="view_more"><span>Read more &nbsp;&nbsp;</span><img src="/images/main/ico_read_more.png" alt=""></span>
										</div>
									</dd>
								</dl>
							</div>
						</li>
            		</ul>
            	</div>
            	<div class="bot_banner">
            		<div class="inner">
            			<div class="util">
							<button class="btn_pack1 gray ov-b small rato">Edit</button>
						</div>
            			<div class="img">
            				<!-- <img src="/upload/banner/14859114808PLM72S55E.jpg" class="pc" alt="">
            				<img src="/upload/banner/1485911480DULCHKGD2Z.jpg" class="mobile" alt=""> -->
            			</div>
            		</div>
            	</div>
        </section><!--// section_box -->

		<!-- 팝업 -->
		<section id="pop_edit" class="pop_type1">
		    <div class="inner">
		    	<div class="pop_header">
		    		<div class="inner container">
						<h1>Headline News</h1>
						<button class="pop_close">Close</button>
					</div>
		    	</div>
		        <div class="pop_content">
		        	
		        </div>
		    </div>
		</section>


     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<script type="text/javascript">
	var newsAni = {
		flag : true,
		swipe : function(){
			var bx = $("#NewsV2 .slider > .inner");
			if($("#news_sect_slide1 .swiper-slide").length <= 1){
				bx.find(".img.slide > li").css("visibility","visible");
			}else{
				var newsSp = new Swiper("#news_sect_slide1", {
					cssWidthAndHeight : 'height',
					noSwiping : true,
					speed : 500,
					pagination : "#news_sect_slide1 .pagination",
					paginationClickable : true,
					onSlideChangeStart : function(){
						idx = (newsSp.activeLoopIndex);
						newsAni.fade(idx);
					}
				});
				var nowIdx = newsSp.activeLoopIndex;
				 
				bx.find(".img.slide > li").eq(nowIdx).addClass('on').css({opacity:1}).siblings().css({opacity:0});
				var len = $("#news_sect_slide1 .swiper-slide").not(".swiper-slide-duplicate").length;
				
			}
		},
		fade : function(idx){
			var bx = $("#NewsV2 .slider > .inner .img.slide");
			var li = bx.find(" > li");		
			var liOn = li.filter(function(){return $(this).hasClass("on");});
			liOn.stop().animate({opacity:0}, 400, 'linear' , function(){
				liOn.removeClass('on');
				li.eq(idx).addClass('on').delay(100).animate({opacity:1}, 400, 'linear' ,function(){
					newsAni.flag = true;
				});
			})
		}
	}

	//iCutterOwen(["#NewsV2 .bx_news > ul > li.w2 ul.img.slide > li", "#NewsV2 .bx_news > ul > li:not(.w2) .img"]);
	newsAni.swipe();

	$(function(){
	  
		checkListMotion();

		var $grid = $('.main-grid .bx_news > ul').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			stamp: '.stamp',
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});

		$(".display_opt input[type='radio']").change(function(){
			$(this).closest(".main-grid").removeClass("desktop laptop tablet mobile").addClass($(this).val());
			$grid.isotope('layout');
			boxAllHeight();
			newsAni.swipe();
		});
	
	});

	function edit_cont() {
		popFn.show($("#pop_edit"), {
			onLoad : function() {	

			}
		});
	}


</script>

<?php
include '../../inc/bot.php';

$dbh = null;
$Marketmain = null;
$mainBannerList = null;
$genreBannerList = null;
unset($Marketmain);
unset($mainBannerList);
unset($genreBannerList);
unset($dbh);
?>