      <footer id="footer"  <? if ($pageNum == "1"){?> class="h_main"<?} else {?> class="h_sub" <? } ?>>
        <div class="fooer_inner">
          <h1 class="blind">하단정보</h1>

              <h2 class="blind">하단메뉴</h1>
              <div class="bnb">
                  <ul class="lst">
                    <li><a href="/art1/about_us.php">About</a></li>
                    <li><a href="/art1/contact.php">Contact</a></li>
                    <li><a href="/service/terms.php">이용약관</a></li>
                    <li class="policy"><a href="/service/policy.php"> 개인정보취급방침</a></li>
                    <li class="writer"><a href="/artist"><span>작가등록</span></a></li>
                  </ul>

              </div><!-- //bnb -->


              <h2 class="blind">회사정보</h1>
              <article class="company_info">
              	<div class="emailContact">
	                <div class="email">
	                  <p class="pc">뉴스레터를 받으실 이메일주소를 남겨주세요.</p>
	                  <p class="pc">매주 art1의 뉴스레터를 보내드립니다.</p>
                    <p class="mobile">이메일주소를 남겨주시면, 매주 art1의 뉴스레터를 보내드립니다.</p>
	                  <div class="sendemail">
		                  <input type="text" value="" class="email_input" id="newsletter" placeholder="Email address"  />
		                  <div class="btns">
		                    <button id="butNewsletter">Send</button>
		                  </div>
	                  </div>
	                </div>
                  <div class="copyright_m">
                    ⓒ2016. art1. All Rights Reserved.
                  </div>
        					<div class="contact">
        						<p>Contact Info.</p>
        						<ul>
        							<li class="contact1"><a href="tel:02-6325-9271">02-6325-9271</a></li>
        							<li class="contact4">02-6005-9277</li>
        							<li class="contact2"><a href="mailto:art1@art1.com">art1@art1.com</a></li>
        						</ul>
        					</div>
                </div><!--//email-->
                <div class="address">
                    <h2 class="blind">하단메뉴</h1>
                    <!-- <ul class="lst">
                        <li><a href="#">art1</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Market</a></li>
                    </ul> -->
                    
                    <address>
                        <p class="fw-b fc_white2">(주)아트1닷컴</p>
                        <!-- <p>대표이사 : 강호빈</p> -->
                        <p>주소 : 서울시 중구 퇴계로 212-13(필동2가)</p>
                        <p>사업자등록번호 : 101-87-01278&nbsp;&nbsp;&nbsp;<a href="http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no=1018701278" title="새창" class="btn_sa"  onclick="onftcopen(); return false;" >사업자정보확인</a> </p>
                        <!-- <p>사업자등록번호 : 101-87-01278&nbsp;&nbsp;&nbsp;<a href="http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no=1018701278" title="새창"  onclick="onftcopen(); return false;" ><img src="/images/footer/btn_sa.gif" alt="사업자정보확인"></a> </p> -->
                        <p>통신판매업신고번호 : 제2015-서울종로-0173호</p>
                        <p>개인정보관리 : 이진우</p>
                        <p>호스팅사업자 : (주)오케이토마토</p>
                        <p>에스크로사업자정보 : 세틀뱅크(주)</p>
                        <p>상담가능시간 : 오전 9시~오후6시(토요일 및 공휴일은 휴무)</p>
                    </address>

                    <div class="more">더보기</div>
                </div>
                <div class="copyright">
                  <p>아트1의 모든 기사(콘텐츠)는 저작권법의 보호를 받으며, <span class="space">무단 전재.복사.배포 등을 금지합니다.</span></p>
                  <p>ⓒ2016. art1. All Rights Reserved.</p>
                  <p>본 사이트는 explorer 9.0 이상 해상도 1920x1080에 <span class="space">최적화 되어 있습니다.</span></p>
                </div>

            </article><!--//company_info-->
              <script>
                    function onftcopen(){
                      var url = "http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no="+1018701278;
                      window.open(url, "communicationViewPopup", "width=750, height=700;");
                      }

                $("#footer .address .more").click(function() {
                  var body = $("html, body"),
                      add = $("#footer .company_info .address address"),
                      txt = $("#footer .address .more");

                  if(!$("#footer .company_info .address address").hasClass('on')){
                    add.stop().animate({
                      "height": 164},
                      500, function() {
                      $(this).css("height", "100%");
                      $(this).addClass("on");
                      txt.text("닫기");
                      body.animate({scrollTop:body.height()}, '1000');
                    });
                  }else{
                    add.stop().animate({
                      "height": 0},
                      500, function() {
                      $(this).css("height", "");
                      $(this).removeClass("on");
                      txt.text("더보기");
                    });
                  }
                });
            </script>


        </div><!--fooer_inner-->
    </footer><!--//footer-->


