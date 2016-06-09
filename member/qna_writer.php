<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MY ACCOUNT";
  $pageName = "상담작성";
  $pageNum = "5";
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
	  <div class="tabBox">
			<ul>
				<li ><a href="dashboard.php">대쉬보드</a></li>
				<li ><a href="modify.php">기본정보수정</a></li>
				<li class="on"><a href="qna.php">상담내역</a></li>
				<li><a href="address.php">주소록관리</a></li>
				<li><a href="order_Information.php">위시리스트</a></li>
				<li><a href="contact_us.php">주문정보</a></li>
			</ul>
		</div>
		<div id="qna_writerBox">
			<h1>상담등록</h1>
			<div class="inner">
				<div class="lft_area">
					<div class="inner">
						<ul>
							<li><span class="th">문의작품</span>
								<div class="td">
									<span class="col_td ">
									<label for="name" class="pos">이름을 입력하세요</label>
									<input name="name" type="text" class="inp_txt lh w95p" id="name" value="" title="이름을 입력하세요">  
									</span>
								</div>
							</li>
							<li><span class="th">문의자명</span>
							<div class="td">
								<input name="name" type="text" class="inp_txt lh w95p" id="name" value="" title="문의자명을 입력하세요">  
							</div></li>
							<li><span class="th">문의내용</span>
								<div class="td">
									<div class="textarea">
									   <textarea name=""></textarea>
									</div>
								 </div>
								</li>
							<li><span class="th">답변방법선택</span>
								<div class="td">
									<div class="lst_check radio">
										 <span class="blue">
									  <label for="call">전화답변</label>
									  <input type="radio" name="call " id="call" checked>
									  </span>
										 <span class="blue">
									  <label for="mail">메일답변</label>
									  <input type="radio" name="mail" id="mail" >
									  </span>
									</div>
								</div>
							</li>
							<li><span class="th">전화번호</span><div class="td"><select name="" id=""><option value="">010</option></select> - <input name="name" type="text" class="inp_txt lh w110" id="name" value="" title="문의자명을 입력하세요">   - <input name="name" type="text" class="inp_txt lh w110" id="name" value="" title="문의자명을 입력하세요">  </div></li>
							<li><span class="th">이메일</span><div class="td"><input name="name" type="text" class="inp_txt lh w110" id="name" value="" title="문의자명을 입력하세요">  @ <input name="name" type="text" class="inp_txt lh w110" id="name" value="" title="문의자명을 입력하세요"> <select name="" id=""><option value="">직접입력</option></select> </div></li>
						</ul>
					</div>
				</div>
				<div class="rgh_area">
					<ul>
						<li>
							<p class="name">이진우 팀장</p>
							<p class="phone">+82.10.4651.2308(KOREA)</p>
							<p class="mail"><a href="mailto:jinwoo@mt.co.kr">jinwoo@mt.co.kr</a></p>
						</li>
						<li>
							<p class="name">강필웅</p>
							<p class="phone">+82.10.3885.6846(KOREA)</p>
							<p class="mail">jinwoo@mt.co.kr</p>
						</li>
						<li>
							<p class="name">유승일부장</p>
							<p class="phone">+82.10.4651.2308(KOREA)</p>
							<p class="mail">jinwoo@mt.co.kr</p>
						</li>
						<li>
							<p class="name">강필웅 실장</p>
							<p class="phone">+82.10.3885.6846(KOREA)</p>
							<p class="mail">jinwoo@mt.co.kr</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
      
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
   
   
    })
   
</script>
      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













