<? include "../inc/config.php"; ?>
<?php
  $categoriName = "art1";
  $pageName = "Exhibition";
  $pageNum = "1";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "b";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<?
if($_GET["name"] != ''){
?>
<style>
	#spot_sub .cont{visibility:hidden;}
</style>
<?
}
?>
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
<script>
	var para = "<?=$_GET["name"]?>";
	if(para){
		$("#container_sub").css({"opacity":0});
	}
	
	$(function(){
		if(para){
			if($("#"+para).length > 0){
				window.scrollTo(0,$("#"+para).offset().top-$("#header").height()-20);
			}
		}
		$("#spot_sub .cont").css({"visibility":"visible"});
		$("#container_sub").css({"opacity":1});
	});
</script>
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
          <? include "tab_art1.php"; ?> 
          <section id="art1_exhibition" class="content-mediaBox margin1">
          	
			 <article id="name10" class="photographer n10">
                 <div class="movie"  id="movIeA10">
                     <? if($check_ie === false){ ?>
                     <button class="backPlay"  onclick="playVid(8,this);"><img src="/images/bg/bg_mov10.jpg" alt=""></button>
                     <?}else{?>
             
                     <?}?>
                  </div>
                 <h1> “나노그래피, 시각예술의 또 다른 가능성” </h1>
                 <div class="t1">
					<p>이 세상에 존재하는 무수히 많은 존재 중 우리 눈에 보이는 것은 얼마나 될까? 지호준의 작업은 이에 대한 물음에서 시작한다.</p> 
					<p>보이는 것이 전부가 아니라는 것에 대한 탐구로서 과학을 도구로 활용하고 사진을 찍어 예술로 완성한다.</p>
					<p>이처럼 이질적으로 보이는 예술과 과학을 접목하여 작업하는 지호준 작가는 미술의 영역을 확장시키며 미술이 나아갈 또 다른 가능성을 제시한다.</p>
					<p>작가의 작품을 통해 우리 주변에 존재하지만 보이지 않는 세계에 대해 인지해보는 시간을 가져보자.</p>
                 </div> 
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/artist_photo10.jpg" alt="지호준" width="200"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>지호준</span> JI HO JUN <a href="/marketPlace/artist.php?idx=83"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2014</span> 신갤러리, 뉴욕</dd>
                          <dd><span class="year">2013</span> 신갤러리, 뉴욕</dd>
                          <dd><span class="year">2013</span> 갤러리 이배, 부산</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2015</span> 제7회 아트로드 77, 헤이리, 파주</dd>
                          <dd><span class="year">2015</span> 더 메터리얼, 어반플레이스, 서울</dd>
                          <dd><span class="year">2014</span> 앱솔루트 보드카 워홀과 친구들, 진화랑, 서울</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!--//info -->
             </article> <!-- //photographer -->
             
			 <article id="name8" class="photographer n8">
                 <div class="movie"  id="movIeA8">
                     <? if($check_ie === false){ ?>
                     <button class="backPlay"  onclick="playVid(7,this);"><img src="/images/bg/bg_mov8.jpg" alt=""></button>
                     <?}else{?>
             
                     <?}?>
                  </div>
                 <h1> “현대인의 영혼을 지켜주는 힐링 갑옷 프로젝트!” </h1>
                 <div class="t1">
                   <p>손종준 작가의 작업은 조각, 설치, 사진, 영상, 퍼포먼스 등 다양한 방식으로 전개된다.</p>
                   <p>이러한 작업들은 오브제를 제작하는 것에서 출발하는데 갑주 형상을 한 이 오브제는 사회적 약자로 일컬어지는 대상에게 장착되어 그들을 물리적·정신적으로 방어하고 보호한다.</p>
                   <p>만연한 개인주의와 인간성의 획일화로 현대인들은 자기 자신을 지키기 위해 공격적인 성향과 동시에 충격 방지 대책이 필요해졌다. 작가는 이러한 현대인들에게 작업의 시리즈명이기도 한 ‘Defensive Measure’ 즉 자위적 조치를 함으로써 힘을 실어주어 영웅으로 탈바꿈시킨다.</p>
                   <p>차가운 금속재료로 사이보그를 만들지만 누구보다도 따듯한 마음으로 인간미 넘치는 작업을 하며 대중을 위한 미술로 대중과 소통하고자 하는 작가 손종준.</p>
                   <p>그의 작품과 함께 우리도 영웅이 되어보자. </p>
                   
                 </div> 
                  
                  <div class="info">
                    <div class="photo"><img src="/upload/artist/14332357422CKPAGAN9D.jpg" alt="suger meat" width="145"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>손종준</span> SON JONG JUN <a href="/marketPlace/artist.php?idx=71"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2013</span> Nomadic Navajo_서울문화재단 홍은예술창작센터, 서울</dd>
                          <dd><span class="year">2013</span> Defensive Measure_쿤스트독, 서울</dd>
                          <dd><span class="year">2010</span> Defensive Measure_문신미술관, 서울</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2015</span> 아트프로젝트 울산 2015_울산 문화의거리, 울산</dd>
                          <dd><span class="year">2015</span> 기능적인 불협화음_7 1/2프로젝트 스페이스, 서울</dd>
                          <dd><span class="year">2015</span> Exchange Exhibition by Residency Artists_일주선화재단, 서울</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!--//info -->
             </article> <!-- //photographer -->
              
			 <article id="name7" class="photographer n7">
                 <div class="movie"  id="movIeA7">
                       <? if($check_ie === false){ ?>
                       <button class="backPlay"  onclick="playVid(6,this);"><img src="/images/bg/bg_mov7.jpg" alt=""></button>
                     <!-- <button class="play" onclick="playVid(6,this);"><img src="/images/btn/btn_play2.png" alt="동영상 플레이 하기"></button> -->
                     <!-- <video id="movA7" poster="/images/bg/bg_mov_noPlay7.jpg" controls=""><source src="/ArtistRec7.mp4" type="video/mp4"><source src="ArtistRec7.ogv" type="video/ogv"></video> -->
                     <?}else{?>
             
                     <?}?>
                  </div>
                 <h1> “슈가와 미트의 맛있는 만남” </h1>
                 <div class="t1">
                   <p>달콤한 음식(Sugar)을 좋아하는 지원재와 고기(Meat)를 좋아하는 이찬행이 만나 ‘슈가미트’가 되었다. </p>
                   <p>식성을 그대로 네이밍했듯이 작품 또한 그들의 취향을 솔직하게 보여준다. </p>
                   <p>친근하고 대중적인 소재를 강렬하고 독특하게 표현하며 슈가미트는 그들만의 스타일을 만들었다.</p> 
                   <p>캔버스, 지면 뿐 아니라 벽, 스케이트보드 등 그 밖에 무엇이든 그들에게는 캔버스가 된다. </p>
                   <p>매체에 구애받지 않는 자유로운 작업으로 우리에게 위트와 영감을 선사하는 두 청년이 앞으로 또 어떤 새로운 시도를 할지 기대된다.</p>
                 </div> 
                  
                  <div class="info">
                    <div class="photo"><img src="/images/bg/bg_artist7.jpg" alt="suger meat" width="145"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>슈가 미트</span> Suger Meat <a href="/marketPlace/artist.php?idx=77"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2015</span>   Sugarmeat 432st, DRAWINGBLIND 갤러리, 이태원, 서울</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2014</span> ART TOY CULTURE, DDP, 동대문, 서울</dd>
                          <dd><span class="year">2014</span> EXPO80 Group Exhibition</dd>
                          <dd><span class="year">2012</span> Kiehl’s RIDE ON NEWYORK Exhibition</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!--//info -->

              </article> <!-- //photographer -->
              <article id="name6" class="photographer n6">
                 <div class="movie"  id="movIeA6">
                       <? if($check_ie === false){ ?>
                       <button class="backPlay"  onclick="playVid(5,this);"><img src="/images/bg/bg_mov6.png" alt=""></button>
                     <?}else{?>
             
                     <?}?> 
                  <!-- width="1280" height="750"  -->
                      <!-- <iframe src="https://www.youtube.com/embed/KFTNAZfq9E4" frameborder="0" allowfullscreen></iframe> -->
                      <!-- <iframe src="//www.youtube.com/embed/KFTNAZfq9E4?version=2&loop=1&autoplay=0&wmode=transparent&playlist=KFTNAZfq9E4" frameborder="0" allowscriptaccess="always" allowfullscreen="true" wmode="Opaque" ></iframe> -->
                  </div>
                 <h1> “시대의 아이콘과 12간지(干支)를 결합한 이원주 작가” </h1>
                 <div class="t1">
                   <p>그의 작품을 보면 익숙하면서도 낯설고, 회화 작품 같으면서도 조각 작품 같다.</p>
                   <p>이원주 작가는 모두에게 익숙한 장면을 그린 후 그 속의 인물을 반인반수로 표현하여 익숙한 장면에 낯설음을 주었고 평면 위에 요철 기복을 가한 부조라는 기법을 사용하여 평면적이면서 입체적인 느낌을 주었다. </p>
                   <p>이원주 작가는 작품으로 대중들과 소통하기위해 누구나 알만한 시대의 아이콘을 소재로 하여 작업한다. 친절한 그의 배려 덕분에 우리는 미술을 한 발 더 친근하게 느낄 수 있을 것이다. </p>
                   <p>작가의 소망대로 많은 사람들에게 작품으로 기억되는 작가가 되길 바란다.</p>
                 </div> 
                  
                  <div class="info">
                    <div class="photo"><img src="/upload/artist/142587799574PD36RUZ2.jpg" alt="LEE WON JOO" width="145"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>이원주</span> LEE WON JOO <a href="/marketPlace/artist.php?idx=46"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2015</span>   「숨은 ‘간지’ 찾기, 이원주 개인展」(Art Space J_Cube1/성남)</dd>
                          <dd><span class="year">2015</span>   「Life- 12개의 표상,이원주 개인展」갤러리이안 예술가 지원 프로젝트(갤러리이안 /대전)</dd>
                          <dd><span class="year">2014</span>   「이원주 개인展」 갤러리미고 기획초대 (갤러리미고 /부산)</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2015</span> &lt;고려대학교 개교 110주년 기념 특별&gt;展, 虎視㽑㽑-호랑이 예술을 즐기다,(고려대학교 박물관/서울)</dd>
                          <dd><span class="year">2015</span> 가정의달 특별기획초대,&lt;가족일기&gt;展,(양평군립미술관/경기)</dd>
                          <dd><span class="year">2015</span> 뿡갈로 특별전 - Perception 이희영,이원주 2인展 (갤러리뿡갈로/서울)</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!--//info -->

               </article> <!-- //photographer -->
               
                            <article id="name5" class="photographer n5">
                 <div class="movie"  id="movIeA5">
                       <? if($check_ie === false){ ?>
                       <button class="backPlay"  onclick="playVid(4,this);"><img src="/images/bg/bg_mov5.jpg" alt=""></button>
                     <?}else{?>
             
                     <?}?> 
                  <!-- width="1280" height="750"  -->
                      <!-- <iframe src="https://www.youtube.com/embed/KFTNAZfq9E4" frameborder="0" allowfullscreen></iframe> -->
                      <!-- <iframe src="//www.youtube.com/embed/KFTNAZfq9E4?version=2&loop=1&autoplay=0&wmode=transparent&playlist=KFTNAZfq9E4" frameborder="0" allowscriptaccess="always" allowfullscreen="true" wmode="Opaque" ></iframe> -->
                  </div>
                 <h1> “역동적인 에너지와 섬세함이 공존하는 이현배 작가의 푸른 세계에 빠지다” </h1>
                 <div class="t1">
                   <p>보이는 것과 보이지 않는 것의 경계를 넘나들며 작업하는 이현배 작가. </p>
                   <p>그의 작업은 푸른색으로 대표하여 이야기 할 수 있다. 하지만 자세히 살펴보면 단순히 푸른색이 아니다. 캔버스에 안료를 흘리고 뿌린 뒤 드라이어로 말림으로써, 스스로 고이고 흘러내린 흔적들을 따라 형상을 만들어가는 작업과정은 작가의 의도와 우연성이 결합된 것이다. 이 같은 과정을 통해 완성된 하늘인 듯 우주인 듯 바다인 듯한 공간을 그린 작업은 오랜 시간과 노력을 요하며, 작가는 이렇게 우연성에서 시작하여 모호한 세계를 만들어 나아간다. <br>작가가 만든 ‘세계’는 소용돌이 치는 듯한 추상적이고 역동적인 힘이 느껴지는 동시에 섬세한 아름다움이 공존하여 신비롭게 다가온다.</p>
                 </div> 
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/artist_photo5.jpg" alt="LEE HYUN BAE (b.1979)" width="145"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>이현배</span> LEE HYUN BAE (b.1979) <a href="/marketPlace/artist.php?idx=48"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2014</span>   Mindscapes 아트컴퍼니 긱, 서울</dd>
                          <dd><span class="year">2010</span>   Paintorama 서울시립미술관, 난지 갤러리, 서울</dd>
                          <dd><span class="year">2009</span>   Autonomous Paintings SeMA 전시지원프로그램 선정작가전, 인사아트센터, 서울</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2014</span> 10 solo shows 헬로우 뮤지움, 서울</dd>
                          <dd><span class="year">2014</span> 와우열전 홍익대학교 회화과 동문전, 홍익대학교 현대미술관, 서울</dd>
                          <dd><span class="year">2013</span> 제4회 성남 문화재단 신진작가 공모전 성남아트센터 미술관 본관</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!--//info -->

               </article> <!-- //photographer -->

              
              <article id="name4" class="photographer n4">
                  <div class="movie" id="movIeA4">
                  <!-- width="1280" height="750"  -->
                  <? if($check_ie === false){ ?>
                      <button class="backPlay"  onclick="playVid(3,this);"><img src="/images/bg/bg_mov4.jpg" alt=""></button>
                  <?}?>
                  </div>
                  <h1>“FUN, PRETTY, LOVELY”…바비를 닮은 작가 윤정원</h1>
                  <div class="t1">
                    <p>시장에서 구입한 천, 플라스틱 구슬, 큐빅 액세서리...어디서나 쉽게 구할 수 있는 기성품이 윤정원 작가에게는 곧 자신을 표현하는 수단이다.</p>
                    <p>평소 작가는 남대문과 동대문 시장을 다니며 평범한 사물들을 재조합하여 페인팅, 설치, 의상, 사진 등 여러 장르의 작업을 만들어 낸다.</p>
                    <p>작가의 작업실을 가득 채운 ‘구슬과 장난감으로 이뤄진 반짝이는 샹들리에’, ‘다양한 오브제들로 엮어낸 목걸이’, ‘작가의 손에서 재탄생한 바비인형’ 등의<br /> 키치적인 작품은 어릴 적 소녀들이 꿈꾸던 소망을 현실화한 느낌이다.</p>
                    <p>하나같이 유쾌하고 사랑스러운 작품들에서 인터뷰 내내 ‘하하하’ 웃던 윤정원 작가의 웃음이 보이는 듯하다.</p>
                  </div>
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/img_photographer4.jpg" alt="윤정원 Yoon Jeong Won (b.1971)"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>윤정원</span> Yoon Jeong Won (b.1971) <a href="/marketPlace/artist.php?idx=59"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2013</span>  최고의 사치, 트렁크갤러리, 서울 </dd>
                          <dd><span class="year">2012</span>  Fantasy Universe, 애경백화점_ AK 갤러리, 수원</dd>
                          <dd><span class="year">2011</span>  Smileplanet at Royal and Skape, 갤러리 스케이프 & 갤러리 로얄, 서울</dd>
                        </dl>

                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2014</span>  욕망의 여섯 가지 얼굴, 스페이스K_광주, 광주 </dd>
                          <dd><span class="year">2013</span>  서울시립 북서울미술관 개관전 Ⅱ부: 장면의 재구성 #2 _ NEW SCENES, 서울 시립 북서울미술관, 서울</dd>
                          <dd><span class="year">2013</span>  애니마믹 비엔날레 2013-2014, 내 안의 드라마, 대구미술관, 대구</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!-- //info -->

              </article><!-- //photographer -->

              <article id="name3" class="photographer n3">
                  <div class="movie" id="movIeA3">
                        <? if($check_ie === false){ ?>
                        <button class="backPlay"  onclick="playVid(2,this);"><img src="/images/bg/bg_mov3.jpg" alt=""></button>
                        <?}?>
                  </div>
                  <!-- width="1280" height="750"  -->
                  <h1>"철로 종이접기를?! 장세일 작가는 가능했다"</h1>
                  <div class="t1">
                    <p>편안한 웃음으로 우리를 맞이한 장세일 작가는 부드러움 뒷면에 단단한 무언가가 숨겨져 있는 듯 보였다.</p>
                    <p>홀로 매끈하게 잘라낸 차디찬 철 조각을 이리저리 짜 맞추고 용접을 해나가는 외로운 작업. 이를 위해 종이접기 하는 것이 취미가 되어버렸다는 그는 웃음을 짓다가도<br /> 이내 사색에 잠기곤 했다.</p>
                    <p>“지금이 슬럼프”라고 말하면서도 “차근차근 해나가겠다”는 그의 말에서 왠지 모를 자신감과 우직함이 넘쳐 보였다.</p>  
                  </div>
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/img_photographer3.jpg" alt="장세일 Jang Se Il  (b.1981)"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>장세일</span> Jang Se Il  (b.1981) <a href="/marketPlace/artist.php?idx=33"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2013</span>  standard animal, 갤러리포월스, 서울 </dd>
                          <dd><span class="year">2010</span>  standard animal, 코사스페이스, 서울 </dd>
                          <dd><span class="year">2009</span>  장세일의 숨기다 전, 대안공간눈, 수원 </dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2015</span>  12 animals story, 롯데갤러리, 안양</dd>
                          <dd><span class="year">2014</span>  KBS춘천 개국70주년기념대한민국 현대조각가 초대전, KBS방송국, 춘천</dd>
                          <dd><span class="year">2014</span>  크리스마스, 세브란스 아트스페이스, 서울</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!-- //info -->

              </article><!-- //photographer -->

              <article  id="name2" class="photographer n2">
                  <div class="movie"  id="movIeA2">
                      <? if($check_ie === false){ ?>
                      <button class="backPlay"  onclick="playVid(1,this);"><img src="/images/bg/bg_mov2.jpg" alt=""></button>
                      <?}?>
                  </div>
                  <h1>“어른아이같은 감성을 지닌 에테르의 세계를 엿보다"</h1>
                  <div class="t1">
                    <p>스스로를 드러내기 보다는 작품 뒤로 숨고 싶다는 작가 에테르. 그의 작업실은 한 소년이 가장 소중한 물건들을 하나하나 숨겨둔 비밀의 방과 같았다.</p>
                    <p>오래된 물건의 아우라를 좋아한다는 작가의 공간속에는 작품 속 등장했던 소재들이 가득 채워져 있었다.</p>
                    <p>빈티지한 그의 공간과 작품을 보던 우리는 이내 어린시절로 돌아가 목마를 타고 학교 앞 문방구의 장난감을 만지작거리는 상상에 빠졌다.</p>
                  </div>
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/img_photographer2.jpg" alt="에테르 ETHER (b.   ?    )"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>에테르</span>  ETHER (b.   ?    ) <a href="/marketPlace/artist.php?idx=21"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>단체전</dt>
                          <dd><span class="year">2014</span>  ART FAIR TOKYO, 갤러리 스케이프, 서울</dd>
                          <dd><span class="year">2014</span>  PANITOF VIEW, 갤러리 스케이프, 서울</dd>
                          <dd><span class="year">2013</span>  Limited Use, 스페이스 꿀, 서울</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!-- //info -->

              </article><!-- //photographer -->


              <article id="name1" class="photographer n1">
                  <div class="movie"  id="movIeA1">
                        <? if($check_ie === false){ ?>
                        <button class="backPlay"  onclick="playVid(0,this);"><img src="/images/bg/bg_mov1.jpg" alt=""></button>
                      <?}else{?>

                      <?}?>
                  <!-- width="1280" height="750"  -->
                      <!-- <iframe src="https://www.youtube.com/embed/KFTNAZfq9E4" frameborder="0" allowfullscreen></iframe> -->
                      <!-- <iframe src="//www.youtube.com/embed/KFTNAZfq9E4?version=2&loop=1&autoplay=0&wmode=transparent&playlist=KFTNAZfq9E4" frameborder="0" allowscriptaccess="always" allowfullscreen="true" wmode="Opaque" ></iframe> -->
                  </div>
                  <h1>“소나무로 인생을 얘기하는 작가”…이길래를 만나다 </h1>
                  <div class="t1">
                    <p>동파이프를 이용해 소나무를 탄생시키는 ‘소나무 작가’, 이길래. 그의 작품에서는 단단함과 동시에 따뜻함이 묻어나온다. </p>
                    <p>10여 년 동안 무명작가로서의 고통을 수도하듯 보냈다는 작가의 작업에서는 오랜 인고 끝에 완성된 끈기가 엿보인다.<br /> 차갑고 딱딱한 수백·수천개의 동파이프를 얇게 잘라 고리 모양으로 일일이 용접해 붙여가는 작업은 서두르지 않고 차곡차곡 시간의 흐름에 따라 무언가를<br /> 축적해 나아간 작가의 삶과 같아 보였다. </p>
                    <p>소나무 숲에 둘러싸인 작업실에서 작업하는 작가를 직접 만나보니 단단하지만 따뜻함을 품고 있는 그의 작품이 작가를 닮았다.</p>
                  </div>
                  
                  <div class="info">
                    <div class="photo"><img src="/images/art1/img_photographer1.jpg" alt="이길래 LEE GIL RAE (b.1961)"></div><!-- //photo -->
                    <div class="cont">
                        <h2><span>이길래</span> LEE GIL RAE (b.1961) <a href="/marketPlace/artist.php?idx=60"><img src="/images/market/btn_more.jpg" alt="자세히 보기"></a></h2>
                        <dl class="n1">
                          <dt>개인전</dt>
                          <dd><span class="year">2012</span>   제 8회 개인전, 갤러리BK, 서울</dd>
                          <dd><span class="year">2010</span>   제 7회 개인전, 사비나미술관, 서울</dd>
                          <dd><span class="year">2008</span>   제 6회 개인전, 사비나미술관, 서울</dd>
                        </dl>
                        <dl class="n2">
                          <dt>단체전</dt>
                          <dd><span class="year">2013</span> Dream Blossom – 장 프랑소와 라리유, 이길래 2인展, 오페라갤러리, 서울</dd>
                          <dd><span class="year">2012</span> Metal Spirit, 갤러리그림손, 서울</dd>
                          <dd><span class="year">2011</span> 아트웨이프로젝트전, 포항시립미술관, 포항</dd>
                        </dl>
                    </div><!-- //cont -->
                  </div><!-- //info -->

              </article><!-- //photographer -->




<? if($check_ie === true){ ?>
 <script src="/js/jwplayer.js"></script>
<?}?>
<script>
<? if($check_ie === true){ ?>
  $(function(){
      var jwp =null,jwp2 =null, jwp3 =null, jwp4 =null, jwp5 =null, jwp6 =null, jwp7 =null, jwp8 =null;
       jwp = jwplayer('movIeA1').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay1.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec1.flv"
                       });


        jwp2 = jwplayer('movIeA2').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay2.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec2.flv"
                       });


         jwp3 = jwplayer('movIeA3').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay3.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec3.flv"
                       });


          jwp4 = jwplayer('movIeA4').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay4.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec4.flv"
                       });

          jwp5 = jwplayer('movIeA5').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay5.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec5.flv"
                       });  
          jwp6 = jwplayer('movIeA6').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay6.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec6.flv"
                       });  
          jwp7 = jwplayer('movIeA7').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay7.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec7.flv"
                       });  
          jwp8 = jwplayer('movIeA8').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay8.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec8.flv"
                       });  
          jwp8 = jwplayer('movIeA10').setup({
                           controls: false, // v6
                           controlbar: "none", //v5
                           width: "100%",
                           height: "100%",
                           image: "/images/bg/bg_mov_noPlay10.jpg",
                           autostart: false,
                           repeat:"always",
                           icons: false, // disable a big play button on the middle of screen
                           flashplayer: "/swf/jwplayer44.swf",
                           file: "/ArtistRec10.flv"
                       });                         
})
<?}?>

      var vid = [
        document.getElementById("movA1"),
        document.getElementById("movA2"),
        document.getElementById("movA3"),
        document.getElementById("movA4"),
        document.getElementById("movA5"),
        document.getElementById("movA6"),
        document.getElementById("movA7"),
        document.getElementById("movA8"),
        document.getElementById("movA10")
      ]
      var vid_name = [
      	"ArtistRec1",
      	"ArtistRec2",
      	"ArtistRec3",
      	"ArtistRec4",
      	"ArtistRec5",
      	"ArtistRec6",
      	"ArtistRec7",
      	"ArtistRec8",
      	"ArtistRec10"
      ]
      function playVid(n,t) {
          var $this = $(t);
          var idx = n+1;
          if(!document.getElementById("movA"+idx)){
          	<?if($check_mobile === false){?>
          		$this.parent().append("<video id='movA"+idx+"' poster='/images/bg/bg_mov_noPlay"+idx+".jpg' controls=''><source src='/"+vid_name[n]+".mp4' type='video/mp4'><source src='/"+vid_name[n]+".ogv' type='video/ogv'></video>");
          	<?}else{?>
          		$this.parent().append("<video id='movA"+idx+"' poster='/images/bg/bg_mov_noPlay"+idx+".jpg' controls=''><source src='/"+vid_name[n]+"_m.mp4' type='video/mp4'><source src='/"+vid_name[n]+"_m.ogv' type='video/ogv'></video>");
          	<?}?>
          }
          
          var mov_bx = document.getElementById("movA"+idx);
          mov_bx.play();
          setTimeout(function(){
          	$this.css("display","none");
          },100);
          mov_bx.addEventListener("ended", function () {
              $this.css("display","block");
            }, false);

      } 

      function pauseVid(n) {
          vid[n].play(); 
      }


  





    </script>


          </section>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>





