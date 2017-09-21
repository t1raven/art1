<!-- include 이후 삭제 영역 Start -->
<? include "../../inc/config.php"; ?>
<?php
  $categoriName = "articovery";
  $pageName = "articovery";
  $pageNum = "5";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "b";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<!-- include 이후 삭제 영역 End-->

<?php if (!defined('OKTOMATO')) exit; ?>
<script type="text/javascript" src="/js/nouislider.js"></script>
<script type="text/javascript" src="/js/radialIndicator.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/nouislider.css">
<link rel="stylesheet" type="text/css" href="/css/articovery.css">
<section id="container_sub" class="articovery_cont">
	<div class="container_inner">
		<div id="articovery" class="point view">
			<div class="visual fst">
				<div class="inner">
					<div class="logo">
						<img src="/images/articovery/b_articovery.png"/>
					</div>
					<div class="menu">
						<ul>
							<li>
								<a href="/articovery/about/">
									<span class="t1">ABOUT</span>
									<span class="t2">4.4 ~ 5.23</span>
								</a>
							</li>
							<li>
								<a href="/articovery/pin/">
									<span class="t1">PIN</span>
									<span class="t2">5.30 ~ 6.20</span>
								</a>
							</li>
							<li class="on">
								<a href="/articovery/point/">
									<span class="t1">POINT</span>
									<span class="t2">7.4 ~ 8.1</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
      <div class="feature" id="visualDetail">
				<div class="inner">
					<div class="feature_head">
						<div class="desc">
							 나지수 - <span class="u_line">Flowers in Chaos</span>, 2017, Mixed media, 130 x 130 cm (detail)
							<div class="allpin_wrap">
								<div class="img"><img src="/images/articovery/ico_allpin.png" alt=""></div>
								<div class="txt"><p>ALL PIN <span><?php echo number_format($allPin); ?></span></p></div>
							</div>
						</div>
					</div>
				</div>
        <div class="feature" id="artAbout">
          <div class="inner">
            <ul>
              <li class="artist_area">
                <div class="inner">
                  <div class="artist_name">
                    <p>Na<br />Ji Su</p>
                  </div>
                  <div class="artist_info">
                    <p>나지수 / 회화</p>
                    <p>2016 동대학원 미술학과 한국화전공 수료</p>
                    <p>2014 전남대학교 미술학과 한국화전공 졸업</p>
                  </div>
                  <div class="artist_pic">
                    <div class="inner">
                      <img src="/images/articovery/bg_author_1_1.png" alt="">
                    </div>
                  </div>
                </div>
              </li>
              <li class="desc_area">
                <div class="inner">
                  <p>
                    내 작품 속에서 인과관계와의 연결은 인간군상을 하나로 한 추상적인 의미로 인간의 형상과 우주의 현상이 어우러지는 이미지 추상 형태를 표현한다.<br />
                    인간이라는 단어는 즉, 사람 사이의 관계에 대한 의미를 내포하기도 하며, 복잡한 현대사회 속에서 살아가는 우리들의 삶의 이야기를 다각도로 본 형상화된 내면의 세계로 해석해보고, 이미지를 연결시키는 여러 인간군상들을 형태로 반복함으로 사람과 사람 사이의 관계의 이야기들을 작품으로 담고자 했다.<br />
                    인간의 형상들은 즉흥적인 드로잉을 통하여 감정을 그대로 화판에 옮긴 것이다. <br />
                    즉각적인 감정이나 그때의 인상을 남기기 위한 기록이기도 하다.
                  </p>
                  <p>
                    한국 전통 재료인 먹과 기법을 사용하며 인과관계에 대한 동양사상의 ‘연기설’을 모티브로 작업을 구상한다.<br />
                    ‘연기설’은 모든 현상은 무수한 원인(因:hetu)과 조건(緣:pratyaya)이 상호 관계하여 성립되므로, 독립·자존적인 것은 하나도 없고, 모든 조건·원인이 없으면 결과(果:phala)도 없다는 설이다. 관계는 실, 또는 끈으로 연결하여 표현되어 시각적으로 연결에 대한 구체적인 형상을 통해 직접적으로 메시지를 전달한다.
                  </p>
                </div>
              </li>
              <li class="exhibit_area">
                <div class="inner">
                  <div class="solo_ex">
                    <p class="tit_exhibit">Selected Solo Exhibitions</p>
                    <p>2017 인과관계, 유스퀘어 금호갤러리, 광주</p>
                    <p>2016 연결관계, 무각사 로터스갤러리, 광주</p>
                  </div>
                  <div class="group_ex">
                    <p class="tit_exhibit">Selected Group Exhibitions</p>
                    <p>2017 꼬끼요~,</p>
                    <p class="pd_left">광주시립미술관 아트라운지, 광주</p>
                    <p>2016 쉼, 한평갤러리, 광주</p>
                    <p>2015 천상에 펼치다, 삼탄아트마인, 정선</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
			</div>

			<div class="feature fst" id="artWorks">
				<div class="inner">
					<div class="title_wrap">
						<p>Artworks</p>
					</div>
					<div class="list_wrap">
						<ul>
							<li class="n1">
								<div>
									<a href="#"><img src="/images/articovery/img_artworks_1_1_1.jpg" alt=""></a>
									<span class="cont">
										<span class="h">나지수 - Blue Stream, 2017, Mixed media, 74 × 90 cm</span>
									</span>
								</div>
							</li>
							<li class="n2">
								<div>
									<a href="#"><img src="/images/articovery/img_artworks_1_1_2.jpg" alt=""></a>
									<span class="cont">
										<span class="h">나지수 - Talk About, 2017, Mixed media, 162.2 × 130 cm</span>
									</span>
								</div>
							</li>
							<li class="n3">
								<div>
									<a href="#"><img src="/images/articovery/img_artworks_1_1_3.jpg" alt=""></a>
									<span class="cont">
										<span class="h">나지수 - X - Stream, 2017, Mixed media on Korean paper, 74 × 90 cm</span>
									</span>
								</div>
							</li>
							<li class="n4">
								<div>
									<a href="#"><img src="/images/articovery/img_artworks_1_1_4.jpg" alt=""></a>
									<span class="cont">
										<span class="h">나지수 - Planet, 2016, Mixed media, 95.5 × 130.5 cm</span>
									</span>
								</div>
							</li>
              <li class="n5">
								<div>
									<a href="#"><img src="/images/articovery/img_artworks_1_1_5.jpg" alt=""></a>
									<span class="cont">
										<span class="h">나지수 - Flowers in Chaos, 2017, Mixed media, 130 × 130 cm</span>
									</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>













			<div class="feature" id="pointNow">
			  <div class="inner">
          <div class="img_ban_area">
            <a href="#" onclick="return false;">
              <img src="/images/articovery/img_pointnow_ban.png" alt="">
              <img src="/images/articovery/ico_pointnowclick.png" alt="" class="on_click">
            </a>
          </div>
          <div class="comment_area">
            <div class="tbl_wrap">
              <table>
                <thead>
                  <tr>
                    <th colspan="4" class="tit_comment"><strong>POINT / Comment</strong><span>45 POINT / Comment</span></th>
                    <th><a href="#" class="btn_extend" onclick="return false;"><img src="/images/articovery/ico_extend.png" alt=""></a></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="user_ico">
                      <span class="black">K</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="6"></div>
                      <div class="point_circle" data-point="6"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="green">L</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="red">Y</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="purple">K</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="9"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="black">H</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="6"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="6"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="black">S</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="6"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="black">D</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="6"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="red">W</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="10"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="user_ico">
                      <span class="purple">O</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">Keem</p>
                      <p class="write_time">2017. 05. 02. am 9:00</p>
                    </td>
                    <td class="comment">
                      <p>우와 TOP9이라니!!! 취향저격, 핀때부터 밀었습니다~ TOP1이 되시길 빌어요~ :-)</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="8"></div>
                      <div class="point_circle" data-point="7"></div>
                      <div class="point_circle" data-point="7"></div>
                    </td>
                    <td class="avg_point">
                      <p>6.50</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="paginate">
            <a href="#" class="start">&#10094;&#10094;</a>
            <a href="#" class="prev">&#10094;</a>
            <a href="#" class="on"><span title="현재 페이지">1</span></a>
            <a href="#"><span>2</span></a>
            <a href="#"><span>3</span></a>
            <a href="#"><span>4</span></a>
            <a href="#"><span>5</span></a>
            <a href="#"><span>6</span></a>
            <a href="#"><span>7</span></a>
            <a href="#"><span>8</span></a>
            <a href="#"><span>9</span></a>
            <a href="#"><span>10</span></a>
            <a href="#" class="next">&#10095;</a>
            <a href="#" class="end">&#10095;&#10095;</a>
          </div> -->
          <div class='paginate'>
            <a href='#' class='btn prev'>처음</a>
            <a href='#' class='btn prev2'>이전10페이지</a>
            <a href='#' class='num on'>1</a>
            <a href='#' class='num'>2</a>
            <a href='#' class='num'>3</a>
            <a href='#' class='num'>4</a>
            <a href='#' class='num'>5</a>
            <a href='#' class='num'>6</a>
            <a href='#' class='num'>7</a>
            <a href='#' class='num'>8</a>
            <a href='#' class='num'>9</a>
            <a href='#' class='num'>10</a>
            <a href='#' class='btn next2'>다음10페이지</a>
            <a href='#' class='btn next'>끝</a>
          </div>
          <div class="title_wrap">
            <p>전문가 패널 합계 평균값</p>
          </div>
          <div class="comment_area expert">
            <div class="tbl_wrap">
              <table>
                <tbody>
                  <tr>
                    <td class="user_ico">
                      <span class="black">K</span>
                    </td>
                    <td class="user_info">
                      <p class="user_id">전문가 패널</p>
                      <p class="write_time">art1.com</p>
                    </td>
                    <td class="comment">
                      <p>Comment</p>
                    </td>
                    <td class="sep_point">
                      <div class="point_circle" data-point="8.3"></div>
                      <div class="point_circle" data-point="8.1"></div>
                      <div class="point_circle" data-point="7.5"></div>
                      <div class="point_circle" data-point="7.5"></div>
                    </td>
                    <td class="avg_point">
                      <p>8.20</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- 레이어팝업 -->
          <div class="popup_bg"></div>
          <div class="point_pop_wrap write">
            <div class="btn_close_wrap">
              <button type="button" name="">
                <img src="/images/articovery/ico_closex.png" alt="닫기">
              </button>
            </div>

            <!-- 대중 -->
            <div class="text_wrap">
              <p class="title">TOP9의 작품을 POINT 해주세요!</p>
              <p class="subtitle">로그인 후, 9명 작가의 각 5점의 작품을 보고 <span>4개의 항목을 POINT 후, 작품평을 작성</span> 하면 참여완료!</p>
              <p class="descript">추첨을 통해 단 한분께 ‘TOP 1 작가의 작품’을 드립니다.</p>
              <p class="descript">(이벤트 상품 수령을 위해 9명의 POINT 완료 후, 반드시 연락처를 남겨주세요)</p>
            </div>

            <!-- 전문가 패널 -->
            <!-- <div class="text_wrap">
              <p class="title">TOP9의 작품을 POINT 해주세요!</p>
              <p class="subtitle">9명 작가의 각 5점의 작품을 보고 <span>4개의 항목을 POINT 후, 작품평을 작성</span> 하면 참여완료!</p>
            </div> -->

            <div class="content_wrap">
              <div class="review_area">
                <p class="tit_review">[작품 다시보기]</p>
                <div class="review_li">
                  <ul>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_review_1_1_1.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_review_1_1_2.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_review_1_1_3.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_review_1_1_4.jpg" alt="">
                        </div>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_review_1_1_5.jpg" alt="">
                        </div>
                    </li>
                  </ul>
                </div>
                <p class="tit_q">Q.해당 작가의 작품에 대한의견을 남겨주세요.<br />
                  여러분의 소중한 의견이 작가에게 많은 도움이 됩니다.</p>
                <textarea name="name" rows="6" cols="80" placeholder="500자 이하"></textarea>
              </div>
              <div class="pointing_area">
                <p class="tit_review">[POINT 하기]</p>
                <div class="bar_area">
                  <ul>
                    <li>
                      <div class="txt">
                        <p>Technique / 기술성</p>
                      </div>
                      <div class="bar sliderRangeArea">
						<label>1</label>
						<div class="sliderRanges">
							<div class="sliderRange" data-start="1"></div>
						</div>
						<label>10</label>
                      </div>
                    </li>
                    <li>
                      <div class="txt">
                        <p>Artistic Quality / 예술성</p>
                      </div>
                      <div class="bar sliderRangeArea">
						<label>1</label>
						<div class="sliderRanges">
							<div class="sliderRange" data-start="1"></div>
						</div>
						<label>10</label>
                      </div>
                    </li>
                    <li>
                      <div class="txt">
                        <p>Creativity / 창의성</p>
                      </div>
                      <div class="bar sliderRangeArea">
						<label>1</label>
						<div class="sliderRanges">
							<div class="sliderRange" data-start="1"></div>
						</div>
						<label>10</label>
                      </div>
                    </li>
                    <li>
                      <div class="txt">
                        <p>Potential / 가능성</p>
                      </div>
                      <div class="bar sliderRangeArea">
						<label>1</label>
						<div class="sliderRanges">
							<div class="sliderRange" data-start="1"></div>
						</div>
						<label>10</label>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="fscore_area">
                  <p>Final score
                    <span>8.85</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="btn_wrap">
              <button type="button" name="button" class="go_complete">POINT 완료하기!</button>
            </div>
          </div>

          <div class="point_pop_wrap complete">
            <div class="btn_close_wrap">
              <button type="button" name="">
                <img src="/images/articovery/ico_closex.png" alt="닫기">
              </button>
            </div>

            <!-- 대중 -->
            <div class="text_wrap">
              <p class="title">나지수 작가에 대한 POINT를 완료하셨습니다!</p>
              <p class="subtitle">TOP9 작가의 작품을 모두 POINT 하셔야 참여가 완료됩니다.</p>
              <p class="descript">(9명의 POINT 완료 후, 연락처등록까지 해주셔야 이벤트 참여가 모두 완료됩니다.)</p>
            </div>

            <!-- 전문가 패널 -->
            <!-- <div class="text_wrap">
              <p class="title">함미나 작가에 대한 POINT를 완료하셨습니다!</p>
              <p class="subtitle">Point하신 내용은 다른 전문가 패널에게 공개되지 않으며, 합산된 전문가 패널의 합계평균값만 최종 공개됩니다.</p>
              <p class="descript">Point하신 점수와 작품평의 내용은 전문가 패널 심사기간내에 (2017년 6월 21일 ~ 29일) 언제든지 수정가능합니다.</p>
            </div> -->

            <div class="content_wrap">
              <div class="review_area">
                <p class="tit_review">[완료한 POINT 리스트]</p>
                <div class="review_li">
                  <ul>
                    <li class="on">
                        <div>
                          <img src="/images/articovery/thum_complete_1_1.jpg" alt="">
                        </div>
                        <p>나지수</p>
                    </li>
                    <li class="on">
                        <div>
                          <img src="/images/articovery/thum_complete_1_2.jpg" alt="">
                        </div>
                        <p>베리킴</p>
                    </li>
                    <li class="on">
                        <div>
                          <img src="/images/articovery/thum_complete_1_3.jpg" alt="">
                        </div>
                        <p>은유영</p>
                    </li>
                    <li class="on">
                        <div>
                          <img src="/images/articovery/thum_complete_1_4.jpg" alt="">
                        </div>
                        <p>전병택</p>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_complete_1_5.jpg" alt="">
                        </div>
                        <p>정다운</p>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_complete_1_6.jpg" alt="">
                        </div>
                        <p>정현균</p>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_complete_1_7.jpg" alt="">
                        </div>
                        <p>정현용</p>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_complete_1_8.jpg" alt="">
                        </div>
                        <p>조은영</p>
                    </li>
                    <li>
                        <div>
                          <img src="/images/articovery/thum_complete_1_9.jpg" alt="">
                        </div>
                        <p>천눈이</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="btn_wrap">
              <button type="button" name="button" onclick="location.href='list_new.php'">POINT 메인 화면으로 돌아가기</button>
            </div>
          </div>
          <div class="popup_alert_bg"></div>
          <div class="point_pop_alert">
            <div class="btn_alertx_wrap">
              <button type="button" name="">
                <img src="/images/articovery/ico_closex.png" alt="닫기">
              </button>
            </div>
            <p>!</p>
            <div class="btn_wrap">
              <button type="button" name="button">작품평을 완료하지 않았습니다.</button>
            </div>
          </div>


			  </div>
			</div>
			<div class="footer"></div>
		</div>

    <!-- detail view layerpopup Start -->
    <div class="popup_prd_bg"></div>
    <div class="popup_prd">
      <div class="thumb b-close">
      </div>
      <div class="head">
        <div class="inner">
          <p class="h">나지수 - Blue Stream, 2017, Mixed media, 74 × 90 cm</p>
          <div class="rgh">
            <button class="b-close">닫기</button>
          </div>
        </div>
      </div>
    </div>
    <!-- detail view layerpopup End -->

  </section><!-- //container_sub -->

  <script>
    $(function(){
      $("#pointNow .img_ban_area > a").click(function(){
        $(".point_pop_wrap.write").fadeIn();
        $(".popup_bg").fadeIn();
      });
      $(".btn_close_wrap > button").click(function(){
        $(".point_pop_wrap").fadeOut();
        $(".popup_bg").fadeOut();
      });
      $(".popup_bg").click(function(){
        $(".point_pop_wrap").fadeOut();
        $(this).fadeOut();
      });
      $(".btn_wrap .go_complete").click(function(){
        var tarea = $(".review_area textarea").val().length;
        if (tarea == 0) {
          $(".popup_alert_bg").fadeIn();
          $(".point_pop_alert").fadeIn();
        }else{
          $(".point_pop_wrap.complete").fadeIn();
          $(".point_pop_wrap.write").fadeOut();
        }
      });
      $(".btn_alertx_wrap > button").click(function(){
        $(".point_pop_alert").fadeOut();
        $(".popup_alert_bg").fadeOut();
      });
      $(".popup_alert_bg").click(function(){
        $(".point_pop_alert").fadeOut();
        $(this).fadeOut();
      });
      $(".point_pop_alert .btn_wrap button").click(function(){
        $(".point_pop_alert").fadeOut();
        $(".popup_alert_bg").fadeOut();
      });

      $("#pointNow.feature .img_ban_area a").bind("mouseover mouseenter",function(){
        $("#pointNow.feature .img_ban_area img.on_click").show();
      }).bind("mouseout mouseleave",function(){
        $("#pointNow.feature .img_ban_area img.on_click").hide();
      });

      for ( var i = 0; i < $(".point_circle").length; i++ ) {
        $(".point_circle").eq(i).radialIndicator({
          radius:19,
          barWidth: 1,
          initValue: $(".point_circle").eq(i).data('point'),
          roundCorner : true,
          percentage: false,
          minValue: 0,
          maxValue: 10,
          barColor: '#000000',
          displayNumber: true
        });
      }

      // image mouse cursor(ie x;;;)
      $(".popup_prd").bind("mouseover mouseenter",function(){
        $(this).css("cursor", "url(/images/articovery/img_cursor2.png), pointer");
      }).bind("mouseout mouseleave",function(){
        $(this).css("cursor", "default");
      });
      $("#articovery.point.view #artWorks.feature .list_wrap li a").bind("mouseover mouseenter",function(){
        $(this).css("cursor", "url(/images/articovery/img_cursor.png), pointer");
      }).bind("mouseout mouseleave",function(){
        $(this).css("cursor", "default");
      });

      // detail view layerpopup Action
      var artwork_top = "";
      $("#articovery.point.view #artWorks.feature .list_wrap li a").click(function(){
        artwork_top = $(this).parents("li").position();
        $(".popup_prd").fadeIn();
        $(".popup_prd_bg").fadeIn();
        if($(this).parents().hasClass("n1")){
          $(".popup_prd > .thumb").html("<img src='/images/articovery/img_artworks_1_1_1_big.jpg' alt='' />");
        }else if($(this).parents().hasClass("n2")){
          $(".popup_prd > .thumb").html("<img src='/images/articovery/img_artworks_1_1_2_big.jpg' alt='' />")
        }else if($(this).parents().hasClass("n3")){
          $(".popup_prd > .thumb").html("<img src='/images/articovery/img_artworks_1_1_3_big.jpg' alt='' />")
        }else if($(this).parents().hasClass("n4")){
          $(".popup_prd > .thumb").html("<img src='/images/articovery/img_artworks_1_1_4_big.jpg' alt='' />")
        }else if($(this).parents().hasClass("n5")){
          $(".popup_prd > .thumb").html("<img src='/images/articovery/img_artworks_1_1_5_big.jpg' alt='' />")
        }
      });
      $(".b-close").click(function(){
        $(".popup_prd").fadeOut();
        $(".popup_prd_bg").fadeOut();
        $(window).scrollTop(artwork_top.top);
      });
      $(".popup_prd_bg").click(function(){
        $(".popup_prd").fadeOut();
        $(this).fadeOut();
      });
    });
  </script>
  <script type="text/javascript">
	var rangeSliders = document.getElementsByClassName('sliderRange');
	for ( var i = 0; i < rangeSliders.length; i++ ) {
		noUiSlider.create(rangeSliders[i], {
			start: [$(rangeSliders[i]).data("start")],
			connect: [true, false],
			//step: 1,
			range: {
				'min': 1,
				'max': 10
			},
			tooltips: [wNumb({ decimals: 0 })],
		});
		rangeSliders[i].noUiSlider.on('slide', totalRangeVal);
		if(i == rangeSliders.length-1) rangeSliders[i].noUiSlider.on('update', totalRangeVal);
	}

  function totalRangeVal(argument) {
    var totalVal = 0;
    for ( var i = 0; i < rangeSliders.length; i++ ) {
      if(i != 3){
        totalVal += parseInt(rangeSliders[i].noUiSlider.get())*0.3;
      }else{
        totalVal += parseInt(rangeSliders[i].noUiSlider.get())*0.1;
      }
    }
    $('.fscore_area span').text(totalVal.toFixed(2));
  }

  </script>

<? include "../../inc/footer.php"; ?>
<? include "../../inc/bot.php"; ?>
