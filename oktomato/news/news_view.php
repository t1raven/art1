<?php
 $pageName = "List";
 $pageNum = "2";
 $subNum = "2";
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
			<h1 class="title1">Category</h1>
			<div class="lst_table3">
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>작가 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody>
					  <tr>
						  <th scope="row">뉴스카테고리 선택</th>
						  <td>
							<div class="lst_check radio">
								<span><label for="bri">In Brief</label><input type="radio" name="bri" id="bri" checked></span>
								<span><label for="trend">Trend</label><input type="radio" name="trend" id="trend" ></span>
								<span><label for="people">Peple</label><input type="radio" name="people" id="people" ></span>
								<span><label for="world">World</label><input type="radio" name="world" id="world" ></span>
								<span><label for="trouble">Trouble</label><input type="radio" name="trouble" id="trouble" ></span>
								<span><label for="epi">Episode</label><input type="radio" name="epi" id="epi" ></span><br />
							</div>
						  </td>
						</tr>
						 <tr>
						  <th scope="row">뉴스카테고리 선택</th>
						  <td>
							<div class="lst_check radio">
								<span><label for="notice">공지</label><input type="radio" name="notice" id="notice"></span>
								<span><label for="fes">학술행사</label><input type="radio" name="fes" id="fes" ></span>
								<span><label for="course">강좌</label><input type="radio" name="course" id="course" ></span>
								<span><label for="col">공모</label><input type="radio" name="col" id="col" ></span>
								<span><label for="recu">구인구직</label><input type="radio" name="recu" id="recu" ></span>
								<span><label for="show">전시소식</label><input type="radio" name="show" id="show" ></span>
								<span><label for="book">도서</label><input type="radio" name="book" id="book" ></span>
							</div>
						  </td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

		<section class="section_box">
			<h1 class="title1">Info.</h1>
			<div class="lst_table3">
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>작가 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody>
					  <tr>
						<th scope="row" >타이틀</th>
						<td >
						  <input name="" type="text" class="inp_txt w390" id="" value="" title="타이틀 입력">   
						</td>
					  </tr>
						<tr>
							<th scope="row" >기자명</th>
							<td >
							  <input name="" type="text" class="inp_txt w390" id="" value="" title="기자명 입력">   
							</td>
						</tr>
						<tr>
							<th scope="row" >출처</th>
							<td >
							  <input name="" type="text" class="inp_txt w390" id="" value="" title="출처 입력">   
							</td>
						</tr>
						<tr>
							<th scope="row" >입력일시</th>
							<td >
							 <!--  <input name="" type="text" class="inp_txt w390" id="" value="" title="입력일시 입력">    -->
							 <span class="datapiker"><input name="sd" type="text" class="inp_txt date" id="sd" value=""></span>
							 <select name="" id="">
							 	<option value="">01시</option>
							 	<option value="">02시</option>
							 	<option value="">03시</option>
							 	<option value="">04시</option>
							 	<option value="">05시</option>
							 	<option value="">06시</option>
							 	<option value="">07시</option>
							 	<option value="">08시</option>
							 	<option value="">09시</option>
							 	<option value="">10시</option>
							 	<option value="">11시</option>
							 	<option value="">12시</option>
							 	<option value="">13시</option>
							 	<option value="">14시</option>
							 	<option value="">15시</option>
							 	<option value="">16시</option>
							 	<option value="">17시</option>
							 	<option value="">18시</option>
							 	<option value="">19시</option>
							 	<option value="">20시</option>
							 	<option value="">21시</option>
							 	<option value="">22시</option>
							 	<option value="">23시</option>
							 	<option value="">24시</option>
							 </select>
							 <select name="" id="">
								<option value="">00분</option>
							 	<option value="">10분</option>
							 	<option value="">20분</option>
							 	<option value="">30분</option>
							 	<option value="">40분</option>
							 	<option value="">50분</option>
							 </select>
							</td>
						</tr>
						<tr>
							<th scope="row">노출여부</th>
							<td >
							 <div class="lst_check radio">

								  <span>

									<label for="exp">노출</label>

									<input type="radio" name="exp" id="exp" checked>

								  </span>

								  <span>

									<label for="exp_n">비노출</label>

									<input type="radio" name="exp_n" id="exp_n">

								  </span>

								</div>
							</td>
						  </tr>
					</tbody>
				</table>
			</div>
		</section>
		<section class="section_box">

        <h1 class="title1">Paragraph 1</h1>

        <div class="lst_table3">

          <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">

            <caption>작가 등록</caption>

            <colgroup>

              <col class="th1">

              <col>

            </colgroup>

            <tbody>

              <tr>

                <th scope="row">이미지/영상 선택</th>

                <td >

                 <div class="lst_check radio">

                      <span class="img_on">

                        <label for="img">이미지</label>

                        <input type="radio" name="img" id="img" checked>

                      </span>

                      <span class="video_on">

                        <label for="video">영상</label>

                        <input type="radio" name="video" id="video">
                      </span>
                    </div>
                </td>
              </tr>
              <tr class="imgArea">
                <th scope="row">이미지</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" />
                      </div>
                      <div class="lst_Upload">
                        <span class="tag">홍길동.jpg <button>삭제</button></span>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="imgArea">
                <th scope="row" >이미지 설명</th>
                <td >
                  <input name="" type="text" class="inp_txt w390" id="" value="" title="이미지설명 입력">   
                </td>
              </tr>
			  <tr  class="imgArea">
                <th scope="row">단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name=""></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="imgArea">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp <button><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>
			    <tr class="videoArea">
                <th scope="row">영상 썸네일</th>
                <td >
                  <div class="photoUpload">
                    <div class="photo"></div>
                    <div class="cont clearfix">
						<p>가로1024px 이하. 1MB제한.</p>
                      <div class="fileinputs" >
                        <input type="file" class="file" />
                      </div>
                      <div class="lst_Upload">
                        <span class="tag">홍길동.jpg <button>삭제</button></span>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="videoArea">
                <th scope="row" >영상 URL</th>
                <td >
                  <input name="" type="text" class="inp_txt w390" id="" value="" title=" 영상 URL 입력">   
                </td>
              </tr>
			  <tr class="videoArea">
                <th scope="row" >단락 텍스트</th>
                <td >
					 <div class="textarea">
                      <textarea name=""></textarea>
                    </div>
                </td>
              </tr>
			  <tr class="videoArea">
                <th scope="row" >단락 추가/삭제</th>
                <td >
					 <div class="t-c">
                      <button><img src="<?=$currentFolder?>/images/common/btn_plus.gif" alt="" /></button>&nbsp <button><img src="<?=$currentFolder?>/images/common/btn_minus.gif" alt="" /></button>
                    </div>
                </td>
              </tr>
            </tbody>

          </table>

          <div class="bot_align">

            <div class="btn_right">

              <button onclick="alert('준비중입니다.');" class="btn_pack1 gray ov-b small rato">List</button>

              <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>

            </div>

        </div>

        </div><!-- //lst_table3 -->

        

        

        

        

      </section>

      <!-- //lst_table2 -->
	 </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
 <script>



 $(function(){

	 $(".img_on").click(function(){
		$("tr.videoArea").css("display","none")
			$("tr.imgArea").css("display","table-row")
			
	 });

	 $(".video_on").click(function(){
		$("tr.videoArea").css("display","table-row")
			$("tr.imgArea").css("display","none")
			
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



  })

 </script>

<? include "../inc/bot.php"; ?>