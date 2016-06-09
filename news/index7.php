<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
		<div class="tabBox mb2">
			<ul>
				<li><a href="index1.php">In brief</a></li>
				<li><a href="index2.php">Trend</a></li>
				<li><a href="index3.php">People</a></li>
				<li><a href="index4.php">World</a></li>
				<li><a href="index5.php">Trouble</a></li>
				<li><a href="index6.php">Episode</a></li>
				<li class="on"><a href="index7.php">Community</a></li>
			</ul>
		</div>
              <div class="content-mediaBox margin1">
                  <section id="bbs_nomal_list" class="content-mediaBox">
                      <header class="header">
                          <p class="total">총 <strong>40</strong>개의 글이 등록되었습니다.</p>
                          <div class="bbs_searchbox">
                              <span class="inp"><input type="text"  title="검색어 입력"></span>
                              <button class="btn"><img src="/images/btn/btn_search.jpg" alt="검색"></button>
                          </div>
                      </header>
                      <div class="bbs_table"  >
                          <table summary="no,제목,작성일,조회수에 관한 게시판입니다.">
                            <colgroup>
                              <col class="no mobileNone">
                              <col class="data">
                              <col>
                              <col class="data mobileNone">
                              <col class="view mobileNone" >
                            </colgroup>
                              <thead>
                                <tr>
                                  <th scope="col" class="mobileNone">NO</th>
                                  <th scope="col">구분</th>
                                  <th scope="col">제목</th>
                                  <th scope="col" class="mobileNone">작성일</th>
                                  <th scope="col" class="mobileNone">조회수</th>
                                </tr>
                              </thead>  
                              <tbody>
                                <tr>
                                  <td class="mobileNone">40</td>
                                  <td>학술행사</td>
                                  <td class="ta-l"><a href="news_view.php">대림미술관 모바일 앱을 소개합니다.  </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                <tr>
                                  <td class="mobileNone">39</td>
                                  <td>공지</td>
                                  <td class="ta-l"><a href="news_view.php">[D PASS #01] 11/08(토) 어쿠스틱블랑(박기영)의 오프닝 콘서트 </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                <tr>
                                  <td class="mobileNone">38</td>
                                  <td>강좌</td>
                                  <td class="ta-l"><a href="#">[D PASS #01] 11/08(토) 어쿠스틱블랑(박기영)의 오프닝 콘서트  </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                <tr>
                                  <td class="mobileNone">37</td>
                                  <td>공모</td>
                                  <td class="ta-l"><a href="#">온라인 회원을 위한 특별한 초대, 린다 매카트니 사진전 사전 오픈  </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                <tr>
                                  <td class="mobileNone">36</td>
                                  <td>강좌</td>
                                  <td class="ta-l"><a href="#">린다 매카트니 전시 퀴즈 이벤트 당첨자 발표 </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                 <tr>
                                  <td class="mobileNone">35</td>
                                  <td>구인구직</td>
                                  <td class="ta-l"><a href="#">[구슬모아당구장] 10/25(토) 남궁선 전시 연계프로그램 영화상영회  음주토크 개최 </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                                <tr>
                                  <td class="mobileNone">34</td>
                                  <td>전시</td>
                                  <td class="ta-l"><a href="#">대림미술관 모바일 앱을 소개합니다.  </a></td>
                                  <td>2014. 11. 05</td>
                                  <td class="mobileNone">121</td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </section>
                  <div class="btn_bot">
                    <div class="paginate">
                      <a href="#" class="btn"><img src="/images/bbs/btn_prev2_off.gif" alt="처음"></a>
                      <a href="#" class="btn prev"><img src="/images/bbs/btn_prev_off.gif" alt="이전"></a>
                      <a href="#" class="num on">1</a>
                      <a href="#" class="num">2</a>
                      <a href="#" class="btn next"><img src="/images/bbs/btn_next_off.gif" alt="다음"></a>
                      <a href="#" class="btn"><img src="/images/bbs/btn_next2_off.gif" alt="마지막"></a>
                    </div>
                    <div class="rgh_group">
                      <a href="news_write.php" class="btn_pack black samll">글쓰기</a>
                    </div>
                  </div><!-- //btn_bot -->   
              </div><!-- //content-mediaBox -->
          








      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





