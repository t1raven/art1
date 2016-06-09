<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MY ACCOUNT";
  $pageName = "주소록 관리";
  $pageNum = "5";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 

  <section id="container_sub"  class="mt0">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
        <? include "tab_myaccount.php"; ?> 
        <div class="dashSubArea">
            <h1 class="title1 content-mediaBox">배송주소록</h1>
            <section id="addressArea" class="content-mediaBox margin1">
              

              <article class="lft_group">
                <h2 class="title3">저장된 주소록</h2>
                  <div class="lst_order">
                    <div class="lst">
                      <div class="inner">
                          <h1>기본배송주소</h1>
                          <div class="txt">
                                <p>홍길동 / 회사</p>
                                <p>서울시 양천구 오목로 180 2층</p>
                          </div>
                          <div class="btn">
                              <a href="#"><span class="fc_blue">수정</span></a> 
                              <a href="#"><span class="fc_blue">삭제</span></a>
                          </div>
                        </div>
                    </div><!-- //lst -->
                    <div class="lst">
                      <div class="inner">
                          <h1>기본배송주소</h1>
                          <div class="txt">
                                <p>홍길동 / 회사</p>
                                <p>서울시 양천구 오목로 180 2층</p>
                          </div>
                           <div class="btn">
                              <a href="#"><span class="fc_blue">수정</span></a> 
                              <a href="#"><span class="fc_blue">삭제</span></a>
                          </div>
                        </div>
                    </div><!-- //lst -->
                    <div class="lst">
                      <div class="inner">
                          <h1>기본배송주소</h1>
                          <div class="txt">
                                <p>홍길동 / 회사</p>
                                <p>서울시 양천구 오목로 180 2층</p>
                          </div>
                           <div class="btn">
                              <a href="#"><span class="fc_blue">수정</span></a> 
                              <a href="#"><span class="fc_blue">삭제</span></a>
                          </div>
                        </div>
                    </div><!-- //lst -->
                    <div class="lst">
                      <div class="inner">
                          <h1>기본배송주소</h1>
                          <div class="txt">
                                <p>홍길동 / 회사</p>
                                <p>서울시 양천구 오목로 180 2층</p>
                          </div>
                           <div class="btn">
                              <a href="#"><span class="fc_blue">수정</span></a> 
                              <a href="#"><span class="fc_blue">삭제</span></a>
                          </div>
                        </div>
                    </div><!-- //lst -->
                 </div><!-- //lst_order -->
              </article><!-- //lft_group -->

              <article class="rgh_group">
                <h2 class="title3">신규주소 추가</h2>
                  <div class="formMailType1">
                        <ul>
                          <li>
                                <label for="" class="h">이름</label>
                                <input type="text" name="" id="" class="inp_txt2">
                          </li>
                          <li class="address">
                                <label for="" class="h">우편번호</label>
                                <input type="text" name="" id="" class="inp_txt2">
                                <button class="btn_pack radius fw-b add" onclick="LayerPopup_type('#addressFind')">우편번호 검색</button>
                          </li>
                          <li>
                                <label for="" class="h">기본주소</label>
                                <input type="text" name="" id="" class="inp_txt2">
                          </li>
                          <li>
                                <label for="" class="h">상세주소</label>
                                <input type="text" name="" id="" class="inp_txt2">
                          </li>
                          <li>
                                <label for="" class="h">이메일</label>
                                <input type="text" name="" id="" class="inp_txt2">
                          </li>
                          <li>
                                <label for="" class="h">전화번호</label>
                                <input type="text" name="" id="" class="inp_txt2">
                          </li>
                        </ul>
                        <span class="check_listbox box"><label for="">기본 배송지로 설정</label><input type="checkbox" id="" name="" value=""></span>

                        <div class="btn_bot">
                          <a href="/member/modify.php" class="btn_pack samll2 black">저장</a>
                        </div><!-- //btn_bot -->
                  </div>                  
              </article><!-- //lft_group -->
            </section><!-- //addressArea --> 
            <script type="text/javascript">bbsCheckbox();tabTransformation(4,"c");</script>
        </div><!-- dashSubArea -->

        
      

      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <section id="addressFind" class="layerPopup" style="display:none">
    <div class="inner">
        <header class="header">
            <h1>우편번호 찾기</h1>
            <button class="close" onclick="LayerPopup_type('close')"><img src="/images/btn/btn_close.png" alt="닫기"></button>
        </header>
        <article>
          <div class="ex_box">
            <p>찾고자하는 주소의 도로명 또는 건물명을 입력하세요.</p>
            <p class="ex">(예:중앙로,불정로 432번길)</p>
          </div><!-- //gray_box -->
        </article>
        <div class="searchAddress1">
          <ul>
            <li>
              <strong>시/도</strong>
              <select name="" id="">
                <option value="1">전체</option>
                <option value="1">1</option>
                <option value="1">2</option>
              </select>
            </li>
            <li>
              <strong>도로명</strong>
              <div class="bbs_searchbox">
                  <span class="inp"><input type="text" name="word" id="word" title="검색어 입력" value=""></span>
                  <button class="btn"><img src="/images/btn/btn_search2.jpg" alt="검색"></button>
              </div>
            </li>
            <li><a href="#" class="ch_add">바뀐주소 찾아보기 &gt;&gt;</a></li>
          </ul>
        </div>

        <div class="searchAddress2">
          <p class="total">검색결과 : <strong>2</strong>건</p>
          <div class="addbox">
            <table summary="우편번호 찾기 검색결과 입니다.">
              <caption>우편번호 찾기 검색결과</caption>
              <colgroup>
                <col width="95">
                <col>
              </colgroup>
              <thead>
                  <tr>
                    <th scope="col">우편번호</th>
                    <th scope="col">주소</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <td class="ta-c"><a href="#">138-170</a></td>
                    <td><a href="#">서울시 송파구 송파동 서울시 송파구 송파동 서울시 송파구 송파동</a></td>
                  </tr>
                  <tr>
                    <td class="ta-c"><a href="#">138-170</a></td>
                    <td><a href="#">서울시 송파구 송파동</a></td>
                  </tr>
                  <tr>
                    <td class="ta-c"><a href="#">138-170</a></td>
                    <td><a href="#">서울시 송파구 송파동</a></td>
                  </tr>
              </tbody>
            </table>
          </div><!-- //addbox -->
        </div><!-- //searchAddress2 -->
      </div><!-- //inner -->  
  </section><!-- //layerPopup -->

  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













