<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require(ROOT.'lib/class/market/event.class.php');
require(ROOT.'lib/class/market/marketmain.class.php');
require(ROOT.'lib/class/market/goods.class.php');
include(ROOT.'inc/config.php');

$z = 0;
$i = 1;
$categoriName = 'MARKET';
$pageName = 'MARKET';
$pageNum = '3';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';
$_SESSION['rdmNbr'] = null;

$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : 1;  //view page 에서 목록으로를 눌렀을때 처리를 위한 변수
$isto = isset($_GET['isto']) ? 'isto'.(int)$_GET['isto'] : null; ; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 섹션으로 찾아가기 위한 변수

$Marketmain = new Marketmain();
$mainBannerListRolling = $Marketmain->getMainBannerListRolling($dbh);
$genreBannerList = $Marketmain->getGenreBannerList($dbh);
$artWorkTotalCount = $Marketmain->getArtWorkCount($dbh);

//print_r($mainBannerListRolling);

include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>


<script src="/js/cookie.js"></script>
<script src="/js/jquery.stellar.min.js"></script>

<div class="blackBg"></div>
  <div id="zoomBg" style="display:none">
  <div class="photo">
    <div class="inner">
      <span><img src="<?php echo goodsBigImgUploadPath, $imgList[0]['goods_img'];?>" alt="" /></span>
    </div>
  </div>
  <div class="artSlide">
    <button class="up"><img src="/images/market/btn_slideup.jpg" alt="위로"></button>
    <button class="down"><img src="/images/market/btn_slidedown.jpg" alt="아래로"></button>
    <ul class="list">
      <li><span class="on"></span><a href="#" data-img="/upload/goods/middle/14212150545Z6GP4SSQK.jpg"><img src="/upload/goods/small/14212150545Z6GP4SSQK.jpg" alt="" ></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp1.jpg" alt="" /></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp2.jpg" alt="" /></a></li>
      <li><a href="#"><img src="/images/market/img_small_tmp3.jpg" alt="" /></a></li>
    </ul>
  </div>
  <button class="close">Close <span><img src="/images/market/ico_market_close1.gif" alt="" /></span></button>
  </div>
  <div id="marketBg" style="display: none">
    <h3 class="h_gallery">IN GALLERY</h3>
  <div class="bg gallery"><img src="/images/market/bg_gallery.jpg" alt="" /></div>
    <h3 class="h_living">IN LIVING</h3>
  <div class="bg living"><img src="/images/market/bg_living.jpg" alt="" /></div>
    <h3 class="h_corridor">IN CORRIDOR</h3>
  <div class="bg corridor"><img src="/images/market/bg_corridor.jpg" alt="" /></div>
  <div class="btnClose"><button><img src="/images/market/btn_bg_close.png" alt="" /></button></div>
  </div>

<section id="marketRView">
    <div class="inner_view">
          <header class="header">
            <h1>아이스크림을 옮기는 방법 <span>변대용</span></h1>
            <a href="artist.php?idx=33">작가의 다른작품보기 +</a>
            <ul class="sns">
              <li><button type="button" onclick="shareFaceBook();"><img src="/images/market/btn_sns1_off.gif" alt="페이스북"></button></li>
              <li><button type="button" onclick="sharePinterest();"><img src="/images/market/btn_sns2_off.gif" alt="핀터레스트"></button></li>
              <li><button type="button"><img src="/images/market/btn_sns3_off.gif" alt="인스타그램"></button></li>
              <li><button type="button" onclick="shareGooglePlus();"><img src="/images/market/btn_sns4_off.gif" alt="구글플러스"></button></li>
            </ul>
            <button class="close">
              <img src="/images/market/btn_close.gif" alt="">
            </button>
          </header>

          <article class="product_info">
              <div class="BigArea">
                <p class="copy">ⓒ2013. <span style="font-weight:bold; line-height:22px;">장세일</span>. All Rights Reserved.   작품이미지의 도용 및 무단 재배포를 금지합니다.</p>
                <div class="img">
                    <span class="sale"><img src="/images/market/ico_sale.png" alt="판매된"></span>
                    <!-- <span class="rental"><img src="/images/market/ico_rental.png" alt="랜탈됨"></span> -->
                    <img src="/upload/goods/middle/14262314375V5PEYPFEU.jpg" alt="">
                </div>
              </div><!-- //BigArea -->

              <div class="product_des">
                  <div class="group_lft">
                      <img src="/images/market/img_siezView.jpg" alt="각 연령별 높이">
                  </div><!-- //group_lft -->
                  <div class="group_rgh">
                      <p class="price"> 
                          <span class="h">판매가  ₩</span> 
                          <span class="mon">6,000,000</span>  
                          <span class="sale_end">- 판매종료</span>       

                          <span class="rantal">
                              <span class="h">렌탈가 ₩</span>  
                              <span class="mon">400,000</span > <span class="moth">/ 월</span>
                              <span class="rantal_end">- 렌탈 중</span>       
                          </span>
                          <span class="info_rantal">(렌탈 기간에 따라 요금이 상이합니다. <a href="rental/index.php?goods=149" class="link">렌탈정책보기</a> )</span>
                          
                    </p>
                    <ul class="details_list">
                        <li><strong>Material</strong> <span>:  FRP</span></li>
                        <li><strong>Frame</strong> <span>:  framed</span></li>
                        <li><strong>Size</strong> <span>:  50x40x10cm</span></li>
                        <li><strong>Year</strong> <span>:  2012</span></li>
                    </ul>
                    <div class="btn">
                        <button type="button" id="btnRequest" class=" layerOpen request"><span>REQUEST</span></button>
                        <button type="button" id="btnWishlist" class=""><span>WISH LIST</span></button>
                        <button type="button" id="btnBasket" class=" layerOpen cart"><span>CART</span></button>
                        <button type="button" id="btnRental" class=""><span>RENTAL</span></button>
                            <div class="layerPopupT1 request" style="display: none;">
                                <div class="inner">
                                    <h3 class="tit">Send Request</h3>
                                    <ul class="list">
                                        <li><p class="tit">이름</p>
                                        <input type="text" name="" class="n_txt" id=""></li>
                                        <li><p class="tit">전화번호(숫자만 입력해주세요)</p>
                                        <input type="text" name="" class="n_txt" id=""></li>
                                        <li><p class="tit">상담내용</p>
                                        <textarea name="" id="" cols="30" rows="10" class="n_area"></textarea></li>
                                        <li class="last"><p class="tit">담당자 연락처</p>
                                        <dl class="contact_list">
                                        <dt>이진우 팀장</dt>
                                        <dd>+82.10.4651.2308(KOREA)</dd>
                                        <dd>jinwoo@mt.co.kr</dd>
                                        </dl>
                                        <dl class="contact_list">
                                        <dt>강필웅 실장</dt>
                                        <dd>+82.10.3885.6846(KOREA)</dd>
                                        <dd>jinwoo@mt.co.kr</dd>
                                        </dl>
                                        </li>
                                    </ul>
                                    <div class="common_btn">
                                        <a href="" class="btnPack2 normal min"><span>SEND</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="layerPopupT1 cart"  style="display: none;">
                                <div class="inner">
                                    <h3 class="tit">ADD TO CART</h3>
                                    <p class="txt">선택하신 작품을 장바구니에 담았습니다.</p>
                                    <p class="cart_btn"><button class="close">계속 쇼핑하기</button> &nbsp; <a class="cart" href="/basket/index.php">장바구니 보러가기</a></p>
                                </div>
                                <div class="close_pos"><button class="close"><img src="/images/market/ico_market_close1.gif" alt="닫기"></button></div>
                            </div>
                      </div><!-- //btn -->
                      <div class="util">
                        <button class="zoom">+ Zoom</button>
                        <button class="viewRoom">@ View</button>
                        <div class="lst_gal">
                           <ul>
                              <li><button data-type="gallery">Gallery</button></li>
                              <li><button data-type="living">Living</button></li>
                              <li><button data-type="corridor">Corridor</button></li>
                           </ul>
                      </div>
                    </div>


                </div><!-- //group_rgh -->

              </div><!-- //product_des -->
          </article><!-- //product_info -->
          <div class="tabBox">
            <!-- <h3 class="h_tab"><button style="border-top:1px solid #ddd;">In brief</button></h3> -->
              <ul>
                  <li><span><a href="#WorkDetail">Work Detail</a></span></li>
                  <li><span><a href="#Artist">Artist</a></span></li>
                  <li><span><a href="#Recommends">Recommends</a></span></li>
                  <li><span><a href="#Shipping">Shipping</a></span></li>
              </ul>
            <!-- <span class="prev" style="display: none;"><img src="/images/ico/ico_tabarr_lft.png" alt=""></span>
             <span class="next" style="display: none;"><img src="/images/ico/ico_tabarr_rgh.png" alt=""></span> -->
          </div>

          <article id="WorkDetail" class="proview_area2">
              <h1><span class="ico">Curator's Note</span></h1>
              <div class="t1">
                <p>변대용 작가는 사람-사람, 동물-사람 등 ‘관계’에 집중하여, 팝아트적 이미지 형상에 ‘일상’과 ‘관계’에서 비롯되는 우화를 녹여내는 작업을 진행한다.화려한 색감으로 매끈하게 마감된 작업 이면에는 냉혹한 현실에 대한 은유적 발언이 숨겨져 있으며, 작가는 자신의 이야기를 작업에 반영하여 스스로 내적 트라우마를 치유하고 대중들 역시 치유받기를 바란다.</p>
                <p>작가의 작품은 겉보기에 매끈하고 빈틈이 없어 기계로 작업한 듯 보이지만, 철저히 아날로그적인 방식을 통해 완성된다. 흙으로 빚고, 석고로 캐스팅 한 뒤 표면이 매끄러워 질 때까지 반복해서 갈아내는 샌딩 작업을 통해 비로소 정확하고 깔끔한 마감, 선명한 색감의 작품이 완성되는 것이다.</p>
              </div>
              <div class="table_type before">
                  <table style="table-layout:fixed;">
                  <colgroup>
                  <col width="15.17543859649%">
                  <col width="">
                  <col width="15.17543859649%">
                  <col width="">
                  </colgroup>
                      <tbody>
                      <tr>
                          <th scope="col">작품명</th>
                          <td>낮.밝은.숲</td>
                          <th scope="col">사이즈</th>
                          <td>130x160cm</td>
                      </tr>
                      <tr>
                          <th scope="col">장르</th>
                          <td>회화(풍경)</td>
                          <th scope="col">제작년도</th>
                          <td>2011</td>
                      </tr>
                      <tr>
                          <th scope="col">프레임 여부</th>
                          <td>무</td>
                          <th scope="col">전시 및 출품내역</th>
                          <td>2015</td>
                      </tr>
                      <tr>
                          <th scope="col">재료</th>
                          <td colspan="3">천 위에 채색</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </article><!-- //WorkDetail -->
          <article id="Artist"  class="proview_area2">
                <div class="group_lft">
                      <img src="/upload/artist/1425358451HPM4A5XWUU.jpg" alt="">      
                </div><!-- //group_lft -->

          <div class="group_rgh">
              <p class="name"><span>장세일</span></p>
              <p class="t1">현재 대유문화재단 산하 영은 미술관에서 주관하는 영은레지던시 프로젝트에 입주해 참여하고 있으며, 2015년 갤러리EM에서 대규모 개인전을 앞두고 있습니다.</p>
              <div class="lst about">
                  <ul>
                      <li>
                          <div class="h">직업</div>
                          <div class="cont">작가</div>
                      </li>
                      <li>
                          <div class="h">생년월일</div>
                          <div class="cont">1972.02.26</div>
                      </li>
                      <li>
                          <div class="h">장르</div>
                          <div class="cont">조각</div>
                      </li>
                  </ul>
              </div>
              <div class="lst exp">
                  <ul>
                      <li>
                          <div class="h">학력</div>
                          <div class="cont">
                              <p>2014  부산대학교 예술대 미술학과 박사수료</p>
                              <p>2001  부산대학교 예술대 미술학과 조소전공 석사 졸업</p>
                          </div>
                      </li>
                      <li>
                          <div class="h">개인전</div>
                          <div class="cont">
                              <p>2014  아이스크림을 먹다. (프랑스 문화원/ 부산)</p>
                              <p>2014  색채학을 위한 실습( 시민갤러리/ 부산)</p>
                              <p>2014  The Chunk 덩어리들(스페이스 오뉴월, 미부아트센터/ 서울, 부산)</p>
                          </div>
                      </li>
                      <li>
                          <div class="h">단체전</div>
                          <div class="cont">
                              <p>2013  POP PARTY (인사아트센타/서울)</p>
                              <p>2012  북극곰 남극으로 가다((예술의 전당V갤러리/서울)</p>
                              <p>2012  줄- 넘기(경기대 미술관/ 경기도)</p>
                          </div>
                      </li>
                      <li>
                          <div class="h">수상</div>
                          <div class="cont">
                              <p>2010  부산청년작가상(부산예총)</p>
                              <p>2010  송은 미술 선정작가(송은문화재단)</p>
                              <p>2010  퍼블릭아트 선정작가</p>
                          </div>
                      </li>
                  </ul>
              </div>
              <div class="lst_graph">
                    <ul>
                       <li class="n1">
                            <div class="bar" style="height:0px"><span>0</span></div>
                            <p class="year">2011</p>
                      </li>
                      <li class="n2">
                          <div class="bar" style="height:0px"><span>0</span></div>
                          <p class="year">2012</p>
                      </li>
                      <li class="n3">
                          <div class="bar" style="height:0px"><span>0</span></div>
                          <p class="year">2013</p>
                      </li>
                      <li class="n4">
                        <div class="bar" style="height:0px"><span>0</span></div>
                        <p class="year">2014</p>
                      </li>
                      <li class="n5">
                        <div class="bar" style="height:0px"><span>0</span></div>
                        <p class="year">2015</p>
                      </li>
                  </ul>
              </div>          
          </div><!-- //group_rgh -->
            
          </article><!-- //Artist -->
          <article id="Recommends"  class="proview_area2">
              <div id="shoppingArea">
                <h3 class="tit">이 작품을 본 고객이 함께 본 작품</h3>

                <section id="shopping_list_id" class="shopping_list">
                  <button class="prev"><img src="/images/common/btn_prev_view.gif" alt="이전"></button>
                  <button class="next"><img src="/images/common/btn_next_view.gif" alt="다음"></button>
                  <div class="inner">
                        <ul>
                              <li>
                                 <div class="img"><a href="?goods=241"><img src="/upload/goods/list/1425014538UN5Q8GLBP6.jpg" alt=""></a></div>
                                  <div class="txt">
                                      <p class="writer">앨리슨</p>
                                      <p class="art_tit">양자리</p>
                                  </div>
                              </li>
                              <li>
                                 <div class="img"><a href="?goods=241"><img src="/upload/goods/list/1425014538UN5Q8GLBP6.jpg" alt=""></a></div>
                                  <div class="txt">
                                      <p class="writer">앨리슨</p>
                                      <p class="art_tit">양자리</p>
                                  </div>
                              </li>
                              <li>
                                  <div class="img"><a href="?goods=426"><img src="/upload/goods/list/1428478943PNPP7T7X7X.jpg" alt=""></a></div>
                                  <div class="txt">
                                      <p class="writer">김수현</p>
                                      <p class="art_tit">우두커니 나의 우주는</p>
                                  </div>
                              </li>
                          </ul>
                  </div>
                </section>
              </div>

            
          </article><!-- //Recommends -->
          <article id="Shipping"  class="proview_area2">
                <section id="orderInfo">
                <h2 class="title5">배송안내</h2>
                <div class="txtBox">
                  <p>작품배송은 ‘아트1’에서 일괄진행하고 국내배송을 기준으로 하며, 발생되는 모든 배송, 설치 및 반환비용은 구매자가 일괄 부담합니다. 각각의 작품은 모두 개별 배송되며, 보험조건이나 파손위험도 등의 조건에 따라 배송수단 및 배송료가 상이할 수 있음을 밝힙니다.</p>
                </div>
                <div class="box_gray">
                  <ul>
                    <li class="n1">
                      <p>
                        <strong>1:1 상담을 통한 렌탈 및 구매</strong>
                        상담내용 기반으로 작품셀렉(약 2일 소요)  →  작가에게 인수인계  →  작가와 ‘아트1’ 전문가의 작품 컨디션 체크  →  ‘아트1’의 패키지에 안전하게 포장  →  art1 전문 배송업체를 통해 개별 배송  →  현장 컨디션 체크   →  설치
                      </p>
                    </li>
                    <li class="n2">
                      <p>
                        <strong>사이트를 통한 직접 렌탈 및 구매</strong>
                        구매/렌탈접수  →  작가에게 인수인계  →  ‘아트1’전문가의 컨디션 체크  →  ‘아트1’의 패키지에 안전하게 포장  →  ‘아트1’ 전문 배송업체를 통해 발송  →  현장 컨디션 체크  →  설치 <br>※ 작품 발송 후 배송까지 평균 2일 소요됩니다.

                      </p>
                    </li>
                    <li class="n3">
                      <p>
                        <strong>아트프로젝트</strong>
                   주문 즉시 art1의 패키지에 안전하게 포장  →  발송  <br>※ 발송 후 배송까지 평균 2일 소요됩니다.
                      </p>
                    </li>
                  </ul>
                </div>
                <div class="txtBox">
                  <!-- <ol class="lst_num1">
                    <li><span class="num">- </span>배송일정은 계약금이입금된 후 배송날짜를 배정해서 안내해 드립니다.</li>
                    <li><span class="num">- </span> 도서 산간지역의 경우 평균배송기간보다 지연될 수 있습니다.</li>
                    <li><span class="num">- </span> 주문폭주, 특정기간(명절, 공휴일 등), 택배사 사정 등에 따라 배송이 지연될 수있으니 양해바랍니다. </li>
                  </ol> -->
                </div>
                <h2 class="title5 n2">교환/반품안내</h2>
                <div class="txtBox">
                  <ol class="lst_num1">
                    <li><span class="num">1.</span> 오배송, 제품 하자, 단순변심으로 인한 교환/반품 모두작품 인도일기준 7일 이내에가능합니다.</li>
                    <li><span class="num">2.</span> 상품하자 및 오배송 등의 사유로 교환/반품시 배송비는 업체가 부담하며, 고객 변심에 의한 교환/반품인 경우에는고객이 부담하여야 합니다.</li>
                    <li><span class="num">3.</span> 반품 택배비는 작품에 따라 상이할 수 있으므로 반드시 고객센터로 확인 후 교환/반품 접수바랍니다.</li>
                    <li><span class="num">4.</span> 교환/반품을 원하는 작품은 수령일 기준 7일내에 보내야 합니다.    </li>
                  </ol>
                </div>
                <h2 class="title5 n3">청약 철회가 불가능한 경우</h2>
                <div class="txtBox">
                  <ol class="lst_num1">
                    <li><span class="num">1.</span>고객님의 사유로 작품이 파훼손되어 복구불가한 경우</li>
                    <li><span class="num">2.</span> 이용자의 사용 또는 일부 쇠에 의하여 재화 등의 가치가 현저히 감소한 경우</li>
                    <li><span class="num">3.</span> 시간의 경과에 의하여 재판매가 곤란할 정도로 작품의 가치가 현저히 감소한 경우</li>
                    <li><span class="num">4.</span> 작품보증서를 분실한 경우</li>
                  </ol>
                </div>
              </section>
          </article><!-- //Shipping -->
    </div>
</section>

<section id="layerNewletter" >
	<input type="hidden" name="mode" id="mode" value="join">
	<input type="hidden" name="returnUrl" id="returnUrl" value="/">
    <header class="header">
        <p>회원가입을 하시면 더 많은 혜택을<br>  누리실 수 있습니다.</p>
        <h1>JOIN US</h1>
        <button class="close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
    </header>
    <article class="cont">
      <div class="join">
        <div class="btnColor facebook">
          <a href="javascript:facebookLogin('join');"><span><img src="/images/ico/ico_face_mo.gif" alt="페이스북">&nbsp;facebook으로 회원가입</span></a>
        </div>
        <div class="btnColor google">
          <a href="javascript:googleOpen('<?php echo $authUrl?>');"><span><img src="/images/ico/ico_google_mo.gif" alt="구글">&nbsp;</span>Google+으로 회원가입</a>
        </div>
        <div class="btnColor line"><a href="/member/join/?at=write">회원가입</a></div>
        <p class="log">이미 가입하셨다면, <a href="/member/login.php">로그인하기</a></p>
        <!-- <p class="tams"><a href="/service/terms.php">이용약관</a>과 <a href="/service/policy.php">개인정보취급방침</a>에 동의합니다.</p> -->
      </div>
      <div class="email">
	    <form onSubmit="return newsletterSend()" >
          <label for="newLetterEmail" class="h">뉴스레터를 받으실 이메일주소를 남겨주세요. <br>매주 art1의 뉴스레터를 보내드립니다.</label>
          <input type="text" class="inp_eamil" id="newLetterEmail" >
          <div class="agree">
            <p>
              <input type="checkbox" id="newLetterEmail2" value="Y">
              <label for="newLetterEmail2">개인정보 제공에 동의합니다.</label>
            </p>
          </div>
	   </form>
      </div>
    </article>
    <div class="btn_bot">
      <!-- button onclick="newsletterSend()">SEND</button -->
	  <button onclick="newsletterSend();">뉴스레터 신청하기</button>

    </div>
    <footer class="footer">
        <input type="checkbox" id="a_week" value="Y" onClick="weekPopClose();">
        <label for="a_week">일주일동안 보지않기</label>
        <button class="close"> |  닫기</button>
    </footer> 
</section>

<script>
$(function(){
	<?php
	if ($_SESSION['user_idx']){
	?>
			loginPopClose();
	<?
	}
	?>
	/*
	if (getCookie("cookLoginPopClose") == "true")	{  //일주일간 안 열리도록...
		loginPopClose();
	}
	*/
});

function loginPopClose(){
	//console.log("loginPopClose 실행");
	$("#layerNewletter").css("display","none");
	$("#cover").remove();
}

function weekPopClose(){ //일주일간 열지 않기
	//alert($("input:checkbox[id='a_week']").is(":checked"));
	if ( $("input:checkbox[id='a_week']").is(":checked") == true){
		setCookie("cookLoginPopClose",true, 7);
	}
}

function newsletterSend(){
	var email = $("#newLetterEmail").val();
	if ($('input:checkbox[id="newLetterEmail2"]').is(":checked") == false ){
		alert("개인정보 제공에 동의 하셔야 합니다.");
		$("#newLetterEmail2").focus();
		return false;
	}

	$.ajax({
		type:"POST",
		url:"/member/__newsletter_insert.php",
		data:{"email":email},
		dataType:"JSON",
		success: function(data) {
			//alert(data.cnt);
			if (data.cnt == 1) {
				alert("이메일이 등록 되었습니다.");
				loginPopClose();
				return false;

			} else if (data.cnt == 91) {
				alert("이메일 주소를 입력해 주세요.");
				return false;
			} else if (data.cnt == 92) {
				alert("이메일 형식이 맞지 않습니다..");
				return false;
			} else if (data.cnt == 93) {
				alert("이미 등록된 이메일 입니다.");
				return false;
			}else{
				alert("데이터 변경에 실패하였습니다.");
				return false;
				//location.reload();
			}

		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			return false;
		}
	});
	return false; //새로고침 방지

}


//뉴스레터
function newsletter(){
  var obj = $("#layerNewletter");
  var wrap = $("#wrap");
  var WinHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  var ml= -(obj.outerWidth() / 2) ;
  var mt = WinHeight - obj.outerHeight();
  if( mt > 0){
    mt = mt / 2
  }else{
    mt = 10
  }

  if(WinHeight < obj.outerHeight() ){
    $("#layerNewletter").css({"position":"absolute"});
	wrap.css({
		"overflow":"hidden",
		"height":obj.outerHeight() + 50
	})//css
  }else{
	wrap.css({
		"overflow":"hidden",
		"height":WinHeight
	})//css
		
}

  $("#layerNewletter").css({
  "display":"block",
  "left":"50%",
  "top":mt,
  "margin-left":ml
  });

  var backgound = $("<div>").attr({
     "id": "cover"
   }).css({
     "height": $("#wrap").outerHeight(true),
     "z-index":11,
     "cursor":"pointer"
   })
  $("body").append(backgound);

  $("#layerNewletter .close , #cover").off().on("click",function(){
	  wrap.css({
		"overflow":"",
		"height":""
	})//css
    $("#layerNewletter").css("display","none");
    $("#cover").remove();
    //document.getElementById('movA1').play();
  });

}//newsletter

$(function(){
	
  <?php
	//if (! isset($_SESSION['user_idx']) ){ //회원로그인이 되어 있지 않으면 팝업 활성
	if (! isset($_SESSION['user_idx']) &&  !isset($isto)  ){ // 로그인 되어 있지 않고 뒤로가기로 넘어오지 않았으면  팝업 활성
		
	?>
		if (getCookie("cookLoginPopClose") != "true")	{  //일주일간 안 열리도록...
			newsletter();     
		}
  //	newsletter();     
	<?php  } ?>
//  awardClock();  
//  lstMovMotion("#sect1 .lst_mov > .lst > li");

})

</script>


<!--//로그인 레이어팝업 E-->







  <section id="container_sub">
    <div class="container_inner">
      <?php include "../inc/path.php"; ?>
      <section id="marketArea">

        <section class="marketVisual content-mediaBox margin1">
          <header class="header">
            <h1 class="blind">마켓메인비주얼</h1>
            <h2 class="blind">공유하기</h2>
            <dl class="share">
                <dt><button><img src="/images/btn/btn_share.png" alt="공유하기"></button></dt>
                <dd>
                  <ul>
                    <li><button type="button" onclick="shareFaceBook();"><img src="/images/btn/btn_share1_off.png" alt="페이스북"></button></li>
                    <li><button type="button" onclick="sharePinterest();"><img src="/images/btn/btn_share2_off.png" alt="핀터레스트"></button></li>
                    <!--li><button><img src="/images/btn/btn_share3_off.png" alt="인스타그램"></button></li>
                    <li><button><img src="/images/btn/btn_share4_off.png" alt="픽터파이"></button></li-->
                    <li><button type="button" onclick="shareGooglePlus();"><img src="/images/btn/btn_share5_off.png" alt="구글플러스"></button></li>
                  </ul>
                </dd>
            </dl>
          </header>
          <article class="marketVisualArticle">
              <div class="dmp-controls">
                <div class="pageing">
                   <button class="prev"><img src="/images/btn/btn_prev_op.png" alt="이전"></button>
                   <button class="next"><img src="/images/btn/btn_next_op.png" alt="다음"></button>
                 </div><!-- //pageing -->
               </div>
              <div class="list">
              <!--
                  마켓 분기처리 작업 dmp:150323
                 <ul>
                 <?php foreach($mainBannerListRolling as $val): ?>
                 <?php
					 if ($val['mmb_gubun'] === 'A') {
						$sHref = 'artwork_view.php?goods='.$val['goods_idx'];
					}
					else{
					   if ($val['evt_idx'] === '10' ||$val['evt_idx'] === '12') {
						   $sHref = '/art1/promotion.php';
					   }
					   else {
							$sHref = 'exhibitions.php?evt='.$val['evt_idx'];
					   }
					}
				?>
                     <li>
                       <div class="photo"><a href="<?php echo $sHref; ?>"><img src="<?php echo marketMainUploadPath, $val['mmb_img_rename']; ?>" alt=""></a></div>
                     </li>
                 <?php endforeach; ?>
                 </ul>
                 
                 -->

                 <ul>
                   <li class="on">
                       <div class="photo">
                            <a href="exhibitions.php?evt=13">
                                <img src="/images/tmp/img_april.jpg" alt="" class="pc" >
                                <img src="/images/tmp/img_april_1.jpg" alt="" class="mobile" >
                            </a>
                        </div>
                     </li>
                     <li>
                       <div class="photo">
                            <a href="/art1/promotion.php">
                              <img src="/upload/market/main/1426582698R3KF7ND8PN.jpg" alt="" class="pc">
                              <img src="/images/tmp/tmp_marketPromotion_1.jpg" alt="" class="mobile">
                            </a>
                       </div>
                    </li>
                </ul>

              </div><!--//list -->

              <div class="cont">
                 <ul>
                 <?php foreach($mainBannerListRolling as $val): ?>
                     <li>
                       <div class="spec">
					   <?php
							if ($val['mmb_gubun'] === 'A') {
								$goodsSize = '';
								$artWorkInfo = $Marketmain->getMainBannerListRollingArtWork($dbh, $val['goods_idx']);

								if (!empty($artWorkInfo['goods_width'])) {
									$goodsSize .= $artWorkInfo['goods_width'];
								}

								if (!empty($artWorkInfo['goods_depth'])) {
									$goodsSize .= 'x'.$artWorkInfo['goods_depth'];
								}

								if (!empty($artWorkInfo['goods_height'])) {
									if ((int)$artWorkInfo['goods_height'] > 0) {
										$goodsSize .= 'x'.$artWorkInfo['goods_height'].'cm';
									}
									else {
										$goodsSize .= 'cm';
									}
								}
								else {
									$goodsSize .= 'cm';
								}
					   ?>
                          <h3><?php echo $artWorkInfo['goods_name']; ?><strong><?php echo $artWorkInfo['artist_name']; ?></strong></h3>
                          <p class="t1"><?php echo $artWorkInfo['goods_material']; ?></p>
                          <p><?php echo $goodsSize; ?></p>
                          <p><?php echo $artWorkInfo['goods_make_year']; ?></p>
                          <a href="artwork_view.php?goods=<?php echo $artWorkInfo['goods_idx']; ?>" class="btn">View Detail &gt; </a>
					   <?php
							}
							else{
								$eventInfo = $Marketmain->getMainBannerListRollingEvent($dbh, $val['evt_idx']);
						?>
                          <h3><?php echo $eventInfo['evt_title']; ?></h3>
                          <p class="t1"><?php echo $eventInfo['evt_copyright']; ?></p>
                          <!--p>100x58cm</p>
                          <p>2011</p-->
                          <a href="exhibitions.php.?evt=<?php echo $artWorkInfo['evt_idx']; ?>" class="btn">View Detail &gt; </a>
					   <?php } ?>
                       </div>
                     </li>
                 <?php endforeach; ?>
                 </ul>
              </div><!--//list -->
              <img src="/images/tmp/tmp_market_1.jpg" alt="" class="boxsize">
           </article><!-- //marketVisualArticle -->
        </section><!-- //marketVisual -->

       <section class="categori content-mediaBox margin1">
         <div class="list">
             <ul>
             <?php foreach($genreBannerList as $genre):?>
               <li class="n<?php echo $i; ?>">
                 <div class="photo"><img src="<?php echo marketGenreUploadPath, $genre['goods_img_rename']; ?>" alt=""></div>
                 <div class="spec">
                    <h3><?php echo $aMedium[$z]; ?></h3>
                    <a href="#categoriList" data-filter=".<?php echo $aEngMedium[$z]; ?>" class="btn">View Detail &gt; </a>
                 </div>
               </li>
               <?php ++$i; ++$z; endforeach; ?>
              </ul>
          </div><!--//list -->
       </section><!-- //categori -->

       <div id="categoriList" class="tabBox">
            <h3 class="h_tab"><button>전체</button></h3>
          <ul style="display: block;">
                <li class="on"><a href="#categoriList" data-filter="*">전체</a></li>
                <?php $i = 0; foreach($aEngMedium as $val): ?>
                <li><a href="#categoriList" data-filter=".<?php echo $val;?>"><?php echo $aMedium[$i];?></a></li>
                <?php ++$i; endforeach; ?>
          </ul>
      </div>

      <div class="searchArea content-mediaBox margin1">
          <div class="inner">
                <ul class="sort_lst">
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든 테마</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aSubject as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngSubject[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든사이즈</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aSize as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngSize[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box color">
                            <dt><button><span>모든 컬러</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aColor as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngColor[$j];?>"><span> <?php echo $val;?></span></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="sort_box">
                            <dt><button><span>모든 가격</span></button></dt>
                            <dd>
                              <ul>
                                <li class="n0"><button data-filter="">전체</button></li>
                                <?php $j = 0; $i = 1; foreach($aPrice as $val): ?>
                                <li class="n<?php echo $i;?>"><button data-filter=".<?php echo $aEngPrice[$j];?>"><?php echo $val;?></button></li>
                                <?php ++$j; ++$i; endforeach; ?>
                              </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <!--button class="btn_result">Search tools</button-->
                <div class="search2">
                  <div class="lst_check type3">
                      <span>
                          <label for="search2inp">렌탈가능</label>
                          <input type="radio" name="search2inp" id="search2inp" >
                      </span>
                      <span>
                          <label for="search3inp">판매중</label>
                          <input type="radio" name="search3inp" id="search3inp">
                      </span>
                     </div><!-- //lst_check -->
                     <div class="inpBox">
                          <input type="text" id="" name="" title="검색어 입력">
                          <button><img src="/images/btn/btn_search.png" alt="검색하기"></button>
                     </div>
              </div>
           </div>
      </div><!-- //searchArea -->

      <script src="/js/isotope.pkgd.min.js"></script>
      <script src="/js/jquery.transform2d.js"></script>
      <div id="marketProductAjax" class="content-mediaBox margin1">
          <? include "ajax_marketModeTest.php"; ?>
      </div>
      <div class="btn_bot cen">
        <button class="more-ajax2" onClick="nextPage();" id="nextMore"  style="display:none"><img src="/images/btn/btn_ajaxmore.jpg" alt="더보기"></button>
    </div>
      <!-- <button class="more-ajax" onclick="nextPage();" id="nextMore" style="display:none"><span>+ 더보기</span></button> -->

  </section><!-- //marketPlaceArea -->

    </div><!-- //container_inner -->
  </section><!-- //container_sub -->

<script>
var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    //서치툴 토글
    $("#marketArea .searchArea .search2").css("display","none");
    $("#marketArea .searchArea").stop().animate({"height":60},300)
    
    $("#marketArea .searchArea .btn_result").on("click",function(){
       var obj = $("#marketArea .searchArea .search2");
       if(obj.css("display") == "none"){
        $("#marketArea .searchArea").stop().animate({"height":100},300)
        obj.slideDown(300);
       }else{
        $("#marketArea .searchArea").stop().animate({"height":60},300)
        obj.slideUp(300);
       }

    });

    
    if(winWidth >= 640){
    iCutter("#marketArea .marketVisual .list > ul > li .photo");
    }else{
      $("#marketArea .marketVisual .list > ul > li .photo img.mobile").css({
        "width":"",
        "height":"",
        "margin-left":""
      })
    }

    iCutter("#marketArea .categori .list > ul > li .photo");

    var $container = $("#marketProductAjax");
    var scrollNewsStartFlag = false;
    var loadingImg = $("<img>").addClass("loading").attr("src","../images/ico/ajax-loader.gif").css({
    "position":"absolute",
    "left":"50%",
    "top":0,
    "margin-left":-30
  });

    
    var filterValue = ["*"];
    var page = 1;
    var totalCount = <?php echo $artWorkTotalCount;?>;
    var totalPage = Math.ceil(totalCount / <?php echo ARTWORKSLISTCOUNT;?>);


    var marketImgLoad = imagesLoaded( $container );
    function onAlways( instance ) {
      $container.find("img").fadeIn( 2000);
          $container.isotope({
           sortBy : 'random',
           itemSelector: '.newsBox',
            masonry : {
            columnWidth : 1
          }
       //    filter: '*'
          });
          $container.off("click.motionView").on( 'click.motionView', '.newsBox .Boximg > a',marketViewMotion);
    };
    marketImgLoad.on( 'always', onAlways );

  var marketViewViewport = $("#marketRView");
  var marketViewViewportInner = marketViewViewport.find(".inner_view");    

  

  function marketViewOpen(){

      function resize(){
          var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
          var outsideSize = $(".container_inner").offset().left;
         if(winWidth > 1250){
              marketViewViewport.stop().animate({"width":marketViewViewportInner.outerWidth(true) + outsideSize},500,function(){
              });
              marketViewViewport.css("padding-right","");    

         }else if(winWidth <= 1250 && winWidth > 960  ){ 
               marketViewViewport.stop().animate({"width":marketViewViewportInner.outerWidth(true)},500,function(){
              });
               marketViewViewport.css("padding-right",40);    

         }else if(winWidth <= 960 ){       
            marketViewViewport.css({
              "width":"96%",
              "padding":"2%"
            }); 

         }
          
          
          //con("outsideSize:::::"+outsideSize);

      }
      $("body").off("mousewheel");
      $("html").addClass("noScroll");

       resize(); 
       zoomMotion();
       viewInRoom();
       tab("#marketRView .tabBox",1);
       coverOpen();
       //rollngbanner1();
      $("#marketRView .header .close,#coverSolo").on("click.marketView",marketViewClose);
      $(window).on("resize.marketView",function(){resize();});

  };//marketViewOpen


   function marketViewClose(){
    $("html").removeClass("noScroll");
      marketViewViewport.stop().animate({"width":0},500,function(){
          marketViewViewport.css({
            "width":"",
            "padding-right":""
          });    
      });
      $.srSmoothscroll({step: 100,speed: 400,ease: 'swing'});
      coverClose();
      $("#marketRView .header .close,#coverSolo").off("click.marketView");
      $(window).off("resize.marketView");
  };//marketViewOpen



  

  function marketViewMotion(){
    var $this = $(this);
    marketViewOpen();

    $.ajax({
          type:"GET",
          url:"ajax_marketView.php",
          dataType:"html",
          data:{"page":page},
          success : function(data) {
          /*  var $data2 = data;
              $this.addClass('viewOn').find(".newsBox_inner").css("display","none").end().append(boxView);
              $this.find(".boxView").append($data2);   
              // $this.find(".boxView").find("#marketView1").css("display","none");
              $this.find(".boxView").imagesLoaded(function(){
               $this.find(".boxView").css("display","block");
               $container.isotope('layout');
                 setTimeout(function(){
                  var offset = $container.find(".viewOn").offset().top - ($("#header").outerHeight() + 5);  

                  $('html,body').animate({scrollTop:offset}, 600);
                },600);*/
             //});//imagesLoaded

          },error : function(xhr, status, error) {
            alert(error);
           }
      })
    
     event.preventDefault();

  }

  $(window).on("scroll.test",function(){
    con("window Top:::::::::"+$(window).scrollTop());
    con("objTop:::::::::"+$("#isto409").offset().top);

  })
  

  function loadingStart(num){
    $("#marketProductAjax").append(loadingImg);
    loadingImg.css("top",num);
  };

 function nextPage(){
    loadingStart($("#marketProductAjax").outerHeight());
    getItemElement();
    if (totalPage <= page){
      $("#nextMore").css("display","none");
    }
 }


function scrollNewEvent(w) {

  var win = $(window),
  doc = $(document),
  body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
  var top = win.scrollTop() + win.height();
  var endHeight = $("#marketProductAjax").offset().top + $("#marketProductAjax").outerHeight() +150;
  if (top > endHeight ) {
    if (totalPage >= page) {
      startScroll();
    }
  }

  function startScroll() {
    if (!scrollNewsStartFlag) {
      scrollNewsStartFlag = true;
      if (page <= 3 ) {
        nextPage();
      }else{
        if (totalPage >= page) {
          $("#nextMore").css("display","");
        }
        else {
          $("#nextMore").css("display","none");
        }
        $container.isotope('layout');
      }
      /*
      loadingStart($("#marketProductAjax").outerHeight());
      getItemElement();
      */
      }
  }
};//scrollNewEvent


function filterAjaxChange(){
  alert(filterValue);
   $.ajax({
          type:"GET",
          url:"ajax_marketModeTest.php",
          dataType:"html",
          data:{"page":page},
          success : function(data) {
                  $("<div id='tmpData'></div>").html(data).appendTo($container);
                    var $data2 = $($container.find("#tmpData").html());
                    $("#tmpData").remove();
                    $data2.imagesLoaded(function(){
                    $container
                    .isotope( 'remove', $container.children(), function() {
                    })
                    .isotope( 'insert', $data2 )
                    
                  
                    scrollNewsStartFlag = false;

                      });//imagesLoaded
          },error : function(xhr, status, error) {
            alert(error);
           }
      })

  $container.off("click.motionView").on( 'click.motionView', '.newsBox',marketViewMotion);   


}


    $(".categori > .list > ul > li  a , #categoriList > ul > li > a").click(function(event){
            if(!$(this).parent().hasClass("on")){
             var  inNum = -1;
             var index = $(this).parents("li").index();
             $('html,body').animate({scrollTop:$(this.hash).offset().top - 100}, 500);
               /*if($(this).attr('data-filter') == "*"){
                  var lang = filterValue.length;
                      if(lang == 1 ){ 
                        filterValue[0] = $(this).attr('data-filter'); 
                      }else{
                        filterValue.splice( 0, 1);
                      }
                  }else{*/

                    $("#categoriList > ul > li").each(function(index){
                      //alert($(this).find("a").attr('data-filter'))
                         inNum =   $.inArray($(this).find("a").attr('data-filter') , filterValue);          
                        if(inNum >= 0){
                            filterValue.splice(inNum , 1);
                        }

                    });

                    $(".categori > .list > ul > li").each(function(index){
                      //alert($(this).find("a").attr('data-filter'))
                         inNum =   $.inArray($(this).find("a").attr('data-filter') , filterValue);          
                        if(inNum >= 0){
                            filterValue.splice(inNum , 1);
                        }

                    });

                     
                  if($(this).attr('data-filter') == "*"){  
                    //alert($(this).attr('data-filter')) ;
                    var lang = filterValue.length;
                    // alert($(this).attr('data-filter')) ;
                    // alert(lang) ;
                    if(lang == 0 ){ 
                      filterValue.push($(this).attr('data-filter'));
                    }
                  }else{
                    filterValue.push($(this).attr('data-filter'));
                  }
                 // }
                 //  for( var i=0; i< lang; i++) {
                 //              filterValue.splice( i, 1);
                 //  }
                //  filterValue.splice( 0, 1);
             // }

            

            if($(this).parents("li").find(".photo").length > 0){
                //dmp : 150402  전체가 추가되면서 인덱스가 추가됨 
                index = index + 1;
                //dmp : 150402  회화와 판화 위치가 바뀌면서 인덱스가 꼬임 
                if($(this).attr('data-filter') == ".Print"){
                    index = 4;
                }else if($(this).attr('data-filter') == ".Conversation"){
                    index = 1; 
                }

              }
            $("#categoriList > ul > li").each(function(){
              $(this).removeClass("on");
                $("#categoriList > ul > li:eq("+index+")").addClass("on");  
            });

            filterAjaxChange(filterValue);
          }
            event.preventDefault();
    });


    $(".sort_lst dl.sort_box dd > ul > li").on("mousedown",function(event){
            var parenTindex = $(this).parents("li").index()+1;
            var index = $(this).index();
            var  inNum = -1;



            
          
              
              $(this).parent().find("li").each(function(index){
                  inNum =   $.inArray($(this).find("button").attr('data-filter') , filterValue);          
                  if(inNum >= 0){
                      filterValue.splice(inNum , 1);
                  }
              });



              //alert($(this).find("button").attr('data-filter'))

              if($(this).find("button").attr('data-filter') != ""){
              
                     if($.inArray("*" , filterValue) >= 0  ){
                      //alert(filterValue.length);
                      if(filterValue.length > 0){

                         inNum =   $.inArray("*" , filterValue);          
                          if(inNum >= 0){
                              filterValue.splice(inNum , 1);
                          }  //if 
                       } //if

                  }//if :inArray

                filterValue.push($(this).find("button").attr('data-filter'));
                filterValue.join(', ');

              }

              if(filterValue.length == 0){
                  filterValue[0] = "*";
              }

              


          



              filterAjaxChange(filterValue);
              event.preventDefault();



            
    });



      

   

    function getItemElement() {
        $.ajax({
          type:"GET",
          url:"ajax_marketModeTest.php",
          dataType:"html",
          data:{"page":page},
          success : function(data) {
            loadingImg.animate({
                  "opacity":0
                },500,function(){
                  $(this).css("opacity",1).remove();
                    $("<div id='tmpData'></div>").html(data).appendTo($container);
                      var $data2 = $($container.find("#tmpData").html());
                      $container.append($data2);
                      $("#tmpData").remove();
                      $data2.imagesLoaded(function(){
                           $container
                           .isotope('appended',$data2)
                           .isotope('layout');
                            page ++;
                            scrollNewsStartFlag = false;
                            $container.off("click.motionView").on( 'click.motionView', '.newsBox',marketViewMotion);       
                        });//imagesLoaded
                })//loading
          },
           complete : function(data) {

           },error : function(xhr, status, error) {
            alert(error);
            $container.children().remove();
            $('<p class="noProduct">상품이 존재하지 않습니다.</p>').appendTo($container);
           }
      })
  }//getItemElement


$(window).on("scroll",function(){
 scrollNewEvent();
})













  var mainTimeOutSet;
    $(function(){

        $(window).resize(function(){
            var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            clearInterval(mainTimeOutSet);
            mainTimeOutSet = setTimeout(function(){
                if(winWidth >= 640){
                  iCutterLoadNone("#marketArea .marketVisual .list > ul > li .photo");
                }else{
                  $("#marketArea .marketVisual .list > ul > li .photo img.mobile").css({
                    "width":"",
                    "height":"",
                    "margin-left":""
                  })
                }

                iCutterLoadNone("#marketArea .categori .list > ul > li .photo");
            },1000);
          })

    //공유하기
    $(".share > dt > button").on("click",function(){
      var child = $(this).parent().next().find(">ul>li");
        forFade(child,(child.css("display") == "none") ? true : false);
    });
    //공유하기 버튼 오버
    $(".share > dd  button").on("mouseenter mouseleave",function(e){
        $(this).find("img").imgConversion((e.type == "mouseenter") ? true : false);
    });

    //작품 오버시 cover
    //
    function mouseEnter(){
      var elemt = $(this);
      var photo = elemt.find(".photo");
      var cont = elemt.find(".spec");
      var cover = $("<div class='cover'></div>");
      var speed = 300;
      if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1.3)"},10000);
      elemt.append(cover);
      fadePlayMotion(cont , true , speed);
      fadePlayMotion(cover , true , speed);
    }

    function mouseLeave(){
      var elemt = $(this);
      var photo = elemt.find(".photo");
      var cont = elemt.find(".spec");
      var cover = elemt.find(".cover");
      var photo = elemt.find(".photo");
      var speed = 300;
       if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1)"},100);
      fadePlayMotion(cont , false , speed);
      cover.stop().animate({"opacity":0},speed,function(){
            $(this).css("display","none").remove();
          });
    }

     function visualBoxEnter(){
      var elemt = $(this);
      var cont = elemt.find(".marketVisualArticle >.cont");
      var photo = elemt.find(".marketVisualArticle >.list > ul > li.on > .photo");
      var cover = $("<div class='cover'></div>");
      var speed = 300;
      $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").css("display","block");
      elemt.append(cover);
      //if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1.4)"},30000);
      fadePlayMotion(cont , true , speed);
      fadePlayMotion(cover , true , speed);
    }

    function visualBoxLeave(){
      var elemt = $(this);
      var cover = elemt.find(".cover");
      var cont = elemt.find(".marketVisualArticle >.cont");
      var photo = elemt.find(".marketVisualArticle >.list > ul > li.on > .photo");
      //var cont = elemt.find(".spec");
      $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").css("display","none");
      var speed = 300;
       //if(Modernizr.csstransforms) photo.find("img").stop().animate({"transform": "scale(1)"},100);
      fadePlayMotion(cont , false , speed);
      cover.stop().animate({"opacity":0},speed,function(){
          $(this).css("display","none").remove();
        });
    }

    $(".categori .list > ul > li ").on("mouseenter",mouseEnter).on("mouseleave",mouseLeave);

       var visualNum = 0;
       var marketVisualInterval;
       var visualTotal = $("#marketArea .marketVisual .list > ul > li").length - 1;
       $("#marketArea .marketVisual .list > ul > li:eq("+visualNum+")").addClass("on");
       $("#marketArea .marketVisual .cont > ul > li:eq("+visualNum+")").addClass("on");
       function visualAction(page){
          var photo = $("#marketArea .marketVisual .list > ul > li:eq("+page+")");
          var cont = $("#marketArea .marketVisual .cont > ul > li:eq("+page+")");
          var prevPhoto = $("#marketArea .marketVisual .list > ul > li.on");
          var prevCont = $("#marketArea .marketVisual .cont > ul > li.on");
          prevPhoto.removeClass("on");
          prevCont.removeClass("on");
          photo.addClass("on");
          cont.addClass("on");


        };

        $("#marketArea .marketVisual .list > ul > li").swipe( {
          //Generic swipe handler for all directions
          swipeLeft:function(event, direction, distance, duration, fingerCount) {
                if(visualNum < 0){
                      visualNum = visualTotal-1;
                  }else{
                    visualNum --;
                  }

                visualAction(visualNum);
           
          },
           swipeRight:function(event, direction, distance, duration, fingerCount) {
                if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }
                  visualAction(visualNum);
          },
          excludedElements:".noSwipe",
          threshold:80
        });

        $("#marketArea .marketVisual .prev , #marketArea .marketVisual .next").on("click",function(){
              if($(this).hasClass("prev")){
                  if(visualNum < 0){
                      visualNum = visualTotal-1;
                  }else{
                    visualNum --;
                  }

                visualAction(visualNum);

              }else if($(this).hasClass("next")){

                if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }

                visualAction(visualNum);
              }
        });

        visualAction(visualNum);

         function marketVisualRun(){
            marketVisualInterval = setInterval (marketVisual_setintervarl, 4000);
          }
        
          function marketVisualStop(){
            clearInterval(marketVisualInterval);  
          }
          
          function marketVisual_setintervarl(){
            if(visualNum >= visualTotal){
                      visualNum = 0;
                  }else{
                    visualNum ++;
                  }

                visualAction(visualNum);
      }

      marketVisualRun();


  })


   //차례로 페이드  함수
   function forFade(chi,sw){
      var child = chi;
      var Switch = sw;
      if(Modernizr.opacity){
        var length = child.length;
         if(Switch){
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").css({
                "display":"block",
                "opacity":0
              }).stop().delay(100*i).animate({
                "opacity":1
              },300);
            };
          }else{
            for (var i = 0; i < length; i++) {
              child.filter(":eq("+i+")").stop().animate({
                  "opacity":0
                },200,function(){
                 $(this).css({"display":"none"});
                });

            };
          }
        }else{//ie8
            child.css("display",(Switch) ? "block" : "none");
        }//Modernizr

   }

  
  function viewInRoom(){
    var win = $(window),
    doc = $(document),
    viewport = win.height(),
    wrap = $("#wrap"),
    body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html');
    var bigImg = $(".BigArea .img img").attr("src");
    var oL = $(".BigArea").find(".img").offset().left;
    var oT = $(".BigArea").find(".img").offset().top;
    var btn = $(".viewRoom"),
        lst = $(".lst_gal");

    var marketBg = $("#marketBg"),
      marketImg = marketBg.find(".img"),
      close = marketBg.find(".btnClose button");

    function viewMotion(){
      var type = $(this).data("type");
      var bigImg = $(".BigArea .img > img").attr("src");
      var img = $("<img>").attr("src",bigImg)
      .css({
      "position":"absolute",
      "left":oL,
      "top":oT,
      "z-index":10
      })
      .addClass("upImg").appendTo(marketBg);
      viewport = win.height();
      win.scrollTop(0);
      wrap.css({
        "height":viewport,
        "overflow":"hidden"
      });
      marketBg.css({"opacity":1,"display":"block"})
      .find(".bg."+type).css({"display":"block","opacity":0})
      .animate({"opacity":1},800).end()
      .find("h3.h_"+type).css("display","block");

      $(".upImg").delay(800).animate({
        "left":"50%",
        "top":178,
        "width":230,
        "margin-left":-115
      },1000);
      close.off().on("click",function(){
        wrap.css({
          "height":"",
          "overflow":""
        });
        marketBg.animate({"opacity":0},400,function(){
          $(this).css({"display":"none"}).find(".bg."+type).css({"display":"none"}).end().find("h3.h_"+type).css("display","none");
          $(".upImg").remove();
        });

      });
    }///viewMotion

    lst.find("button").off().on("click",viewMotion);
    btn.on("click",function(){
      lst.css("display",(lst.css("display") == "block") ? "none" : "block");
    });
  };






function zoomMotion(){
      var $wrap = $("#wrap");
      var $zoomBox = $("#zoomBg");
      var $bigImg = $(".BigArea .img");
      var $zoomImg = $zoomBox.find(".photo");
      var myScroll;
      myScroll = new IScroll('#zoomBg .photo', { scrollX: false, freeScroll: true });

$("button.zoom").click(function(){
        $(window).scrollTop(0);
        var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var windowTop = $(window).scrollTop();
            var bigImgSrc = $bigImg.find("img").attr("src");
            var backgound = $("<div>").attr({
               "id": "cover"
             }).css({
               "height": windowHeight,
               "z-index":11,
               "cursor":"pointer",
               "display":"none"
             })
            $("body").append(backgound);
            $wrap.css({
              "overflow":"hidden",
              "height":windowHeight
            })

            //$zoomImg.find("img").attr("src",bigImgSrc);

        $zoomBox.css({
          "left":"50%",
          "top":20,
          "width": "90%",
          "height" : (windowHeight - 40),
          "margin-left" : "-45%"
        })

          fadePlayMotion($zoomBox , true , 400);
          fadePlayMotion(backgound , true , 400);
          $("#zoomBg .close , #cover").on("click",zoomClose);
          $(window).on("resize",zoomClose);
          myScroll.refresh();

          function zoomClose(){

          fadePlayMotion($("#cover") , false , 400);
          $zoomBox.fadeTo(400,0,function(){
            $(this).css("display","none");
            $("#cover").remove();
          });
          $wrap.css({
                "overflow":"",
                "height":""
              })
          $("#zoomBg .close , #cover").off("click");
          $(window).off("resize",zoomClose);
        };//zoomClose
      });

  }//zoomMotion






      


function shareFaceBook() {
	//var url = "http://www.facebook.com/sharer.php?u=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>";
	var url = "http://www.facebook.com/sharer.php?u=<?php echo SHARE_URL;?>";
	window.open(url, '', '');
}

function sharePinterest() {
	var coverImage = '';
	var desc = '';
	//var url = "http://pinterest.com/pin/create/button/?url=<?php echo SHARE_URL;?>?goods=<?php echo $goods_idx?>&media=" + coverImage + "&description=" + desc;
	var url = "http://pinterest.com/pin/create/button/?url=<?php echo SHARE_URL;?>?media=" + coverImage + "&description=" + desc;
	window.open(url, '', '');
}

function shareGooglePlus() {
	var url = "https://plus.google.com/share?url=<?php echo SHARE_URL;?>";
	window.open(url, '', 'width=490 height=470');
}
</script>

<script>
    checkListMotion(".lst_check.type3");
    var price = '', medium = '', subject = '', size = '';
          //alert(e.which); // 1:좌클릭, 2:휠클릭, 3:우클릭
             function sortDesignMotion(obj){
                var o = $(obj);

                function selectRemove(){
                    o.css({
                      "z-index":2
                    }).find("dd").css({
                      "display":"none"
                    });
                 }

                o.each(function(){
                    var t = $(this);
                    var name = $(this).find("dt").text();

                    function selectOptionOpen(event){
                      event.stopPropagation();
                      var elemt = $(this);
                      var option = elemt.parent().next();
                      var box = elemt.parents("dl");
                      var open = option.css("display") == "block";
                       if(!open){
                          selectRemove();
                          box.css("z-index",5);
                          option.slideDown(300);
                       }else{
                           box.css("z-index",2);
                           option.slideUp(300);
                       }

                        $("html").off().on("mousedown",function(event){
                           if(event.which == 1){
                              box.css("z-index",2);
                              option.slideUp(300);
                              }
                           });

                       option.find("button").off().on("mousedown",function(event){
                          if(event.which == 1){
                            var num = $(this).parent().attr("class").replace("n","");
                             if( num == 0 ){
                                box.find("dt>button>span").text(name);
                             }else{
                                box.find("dt>button>span").text($(this).text());
                             }
                           }
                       });
                    }//selectOptionOpen
                    t.find(">dt>button").on("mousedown",selectOptionOpen)
                });
             };

            $(function(){ sortDesignMotion(".sort_box"); });
</script>



<?php
include(ROOT.'inc/footer.php');
include(ROOT.'inc/bot.php');

$dbh = null;
$Marketmain = null;
$mainBannerListRolling = null;
$genreBannerList = null;
$artWorkTotalCount = null;

unset($dbh);
unset($Marketmain);
unset($mainBannerListRolling);
unset($genreBannerList);
unset($artWorkTotalCount);
?>

<script>

$(function(){
    //$("body").off("mousewheel");
	<?php
	if ($_SESSION['user_idx']){
	?>
		//	loginPopClose();
	<?
	}
	?>
});


</script>