<?php
   $pageName = "View";
   $pageNum = "3";
   $subNum = "10";
   $thirdNum = "0";
   ?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<? include "../inc/side.php"; ?>
<section id="container">
   <div class="container_inner">
   <? include "../inc/path.php"; ?>
   <? include "../inc/datepicker_setting.php"; ?>
   <article class="content">
      <section class="section_box">
         <div class="lft_Box">
            <h1 class="title1">주문자 정보</h1>
            <div class="lst_table3">
               <table summary="주문자정보">
                  <caption>주문자정보</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">주문자명</th>
                        <td>홍길동</td>
                     </tr>
                     <tr>
                        <th scope="row">전화번호</th>
                        <td >010-1234-5678</td>
                     </tr>
                     <tr>
                        <th scope="row">이메일</th>
                        <td >fejaiofaejsio@aafjeio.com</td>
                     </tr>
                     <tr>
                        <th scope="row">주문자주소</th>
                        <td >양천구 오목로 180 평화빌딩 2층</td>
                     </tr>
                     
                  </tbody>
               </table>
               <!-- //lst_table3 -->
            </div>
		</div>
		<div class="rgh_Box">
		   <h1 class="title1">배송자 정보</h1>
		   <div class="lst_table3">
               <table summary="배송자 정보">
                  <caption>배송자 정보</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">받는분</th>
                        <td>홍길동</td>
                     </tr>
                     <tr>
                        <th scope="row">전화번호</th>
                        <td >010-1234-5678</td>
                     </tr>
                     <tr>
                        <th scope="row">이메일</th>
                        <td >fejaiofaejsio@aafjeio.com</td>
                     </tr>
                     <tr>
                        <th scope="row">받는분주소</th>
                        <td >양천구 오목로 180 평화빌딩 2층</td>
                     </tr>
                  </tbody>
               </table>
               <!-- //lst_table3 -->
            </div>
		</div>
      </section>
	  <section class="section_box">
		<h1 class="title1">Order Detail</h1>
		<div class="lst_table3">
		   <table summary="주문정보">
			  <caption>주문 정보</caption>
			  <colgroup>
				 <col class="th1">
				 <col>
			  </colgroup>
			  <tbody>
				 <tr>
					<th scope="row">주문번호</th>
					<td>3434C344D34312</td>
				 </tr>
				 <tr>
					<th scope="row">주문상품</th>
					<td >
						<ul>
							<li><a href="#" class="fc_blue td-u">어둠의 다크</a>(홍길동) \2,300,000</li>
							<li><a href="#" class="fc_blue td-u">어둠의 다크</a>(홍길동) \2,300,000</li>
						</ul>
					</td>
				 </tr>
				 <tr>
					<th scope="row">주문일시</th>
					<td >2014-11-06 09:27:43</td>
				 </tr>
				 <tr>
					<th scope="row">결제 방법</th>
					<td >신용카드</td>
				 </tr>
				  <tr>
					<th scope="row">결제금액정보</th>
					<td >2,338,000원</td>
				 </tr>
				  <tr>
					<th scope="row">현 주문 상태</th>
					<td >
						<div class="order_stat_Box">
							<ul>
								<li><span class="tit">주문접수</span> (2014.10.29 10:13)</li>
								<li><span class="tit">입금완료</span> (2014.10.29 10:13)</li>
								<li><span class="tit">상품준비중</span> <span class="datapiker"><input name="sd" type="text" class="inp_txt date" id="sd" value=""></span></li>
								<li><span class="tit">배송 중</span> <span class="datapiker"><input name="sd" type="text" class="inp_txt date" id="sd" value=""></span></li>
								<li class="last"><span class="tit">배송완료</span> <span class="datapiker"><input name="sd" type="text" class="inp_txt date" id="sd" value=""></span></li>
							</ul>
							<div class="lnvoice">송장번호 : 
								<span class="col_td auto">
								<label for="com" class="pos">배송업체명</label>
								<input name="tit" type="text" class="inp_txt lh w90" id="com" value=""> 
								</span> 
								<span class="col_td auto">
								<label for="num" class="pos">송장번호</label>
								<input name="tit" type="text" class="inp_txt lh w250" id="num" value=""> 
								</span> 
							</div>
						</div>
					</td>
				 </tr>
			  </tbody>
		   </table>
		   <!-- //lst_table3 -->
		</div>
	  </section>
      <!-- //lst_table2 -->
   </article>
   </div> <!-- //container_inner -->
</section>
<!-- //container -->
<script>
   $(function(){
   
   
   
    //레이어 팝업
   
     $(".layerOpen").click(function(){
   
          $(".layer_popup1").css("display","none");
   
          var id = $(this).attr("href");
   
          var x = $(this).offset().left;
   
          var y = $(this).offset().top-10;
   
          layerBoxOffset(id,x,y);
   
          return false;
   
   
   
      });
   
   
   
     // and / or 스위치 함수
   
      $("button.btn_switch").click(function(){
   
          var text = $(this).text();
   
          $(this).text((text == "AND") ? "OR":"AND");
   
          //$("#anor").val($(this).text());
   
      });
   
      
   
      LabelHidden(".inp_txt.lh");
   
      bbsCheckbox();
   
      checkListMotion();
   
      initFileUploads();
   
      btnHover(".btnOvr");
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>