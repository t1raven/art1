<?php
   $pageName = "View";
   $pageNum = "3";
   $subNum = "1";
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
            <h1 class="title1">Registration</h1>
            <div class="lst_table3">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
				   <caption>작가 등록</caption>
				   <colgroup>
					  <col class="th1">
					  <col>
				   </colgroup>
				   <tbody>
					  <tr>
						 <th scope="row">작가명 (kr) *</th>
						 <td >
							<span class="col_td auto">
							<label for="tit" class="pos">홍길동</label>
							<input name="tit" type="text" class="inp_txt lh w110" id="tit" value="" title="작가명(Kr) 입력">  
							</span>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">작가명 (En) *</th>
						 <td >
							<span class="col_td auto">
							<label for="tit2" class="pos">First Name</label>
							<input name="tit2" type="text" class="inp_txt lh w60" id="tit2" value="" title="First Name 입력">   
							</span>
							<span class="col_td auto">
							<label for="tit3" class="pos">Last Name</label>
							<input name="tit3" type="text" class="inp_txt lh w60" id="tit3" value="" title="Last Name 입력">   
							</span>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">사진등록</th>
						 <td >
							<div class="photoUpload">
							   <div class="photo"></div>
							   <div class="cont clearfix">
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
					  <tr>
						 <th scope="row">CV *</th>
						 <td >
							<div class="clearfix">
							   <div class="fileinputs" >
								  <input type="file" class="file" />
							   </div>
							   <div class="lst_Upload">
								  <span class="tag">이진아cv.pdf <button>삭제</button></span>
							   </div>
							</div>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">직업 *</th>
						 <td >
							<span class="col_td auto">
							<label for="jop" class="pos">화가/문화센터강사/연구원</label>
							<input name="jop" type="text" class="inp_txt lh w190" id="jop" value="" title="직업 입력">  
							</span>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">출생년월일 *</th>
						 <td >
							<select name="" id="">
							   <option value="2014">2014</option>
							</select>
							<span class="datapiker"><input name="sd" type="text" class="inp_txt date" id="sd" value=""></span>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">장르 *</th>
						 <td >
							<span class="col_td auto">
							<label for="cate" class="pos">서양화/극사실화</label>
							<input name="jop" type="text" class="inp_txt lh w190" id="cate" value="" title="장르 입력">  
							</span>
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">휴대폰 *</th>
						 <td >
							<!-- <select name="" id="">
							   <option value="010">010</option>
							   </select>
							   <input name="" type="text" class="inp_txt w50" id="" value="" title="휴대폰 4자리 입력">  
							   <input name="" type="text" class="inp_txt w50" id="" value="" title="휴대폰 4자리 입력">   -->
							<input name="" type="text" class="inp_txt w150" id="" value="" title="휴대폰 번호 입력">
						 </td>
					  </tr>
					  <tr>
						 <th scope="row">이메일 *</th>
						 <td >
							<!--  <input name="" type="text" class="inp_txt w110" id="" value="" title="이메일 아이디">  @
							   <select name="" id="">
								 <option value="naver">naver.com</option>
							   </select> -->
							<input name="" type="text" class="inp_txt w190" id="" value="" title="이메일 주소 입력">
						 </td>
					  </tr>
				   </tbody>
               </table>
            </div>
         </section>
         <section class="section_box">
			 <h1 class="title1">Personal Info.</h1>
            <div class="lst_table3">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                  <caption>작가 등록</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">학력 1<sup>st</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="학력 1st 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">학력 2<sup>nd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="학력 2nd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">수상 1<sup>st</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="수상 1st 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">수상 2<sup>nd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="수상 2nd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">수상 3<sup>rd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="수상 3rd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">개인전 1<sup>st</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="개인전 1st 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">개인전 2<sup>nd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="개인전 2nd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">개인전 3<sup>rd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="개인전 3rd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">개인전 4<sup>th</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="개인전 4th 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">개인전 5<sup>th</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="개인전 5th 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">단체전 1<sup>st</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="단체전 1st 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">단체전 2<sup>nd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="단체전 2nd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">단체전 3<sup>rd</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="단체전 3rd 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">단체전 4<sup>th</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="단체전 4th 입력">   
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">단체전 5<sup>th</sup></th>
                        <td >
                           <select name="" id="">
                              <option value="2014">2014</option>
                           </select>
                           <input name="" type="text" class="inp_txt w390" id="" value="" title="단체전 5th 입력">   
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </section> 
		
         <section class="section_box">
            <h1 class="title1">Additional Info.</h1>
            <div class="lst_table3">
               <table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
                  <caption>작가 등록</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" >대표작 *</th>
                        <td colspan="2"class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                     </tr>
                     <tr>
                        <th scope="row">작가인사말 *</th>
                        <td colspan="2">
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                           <p>40단어 제한, 현재 00단어</p>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" rowspan="5">연도별 작품수*</th>
                        <th scope="row">2014</th>
                        <td><input name="" type="text" class="inp_txt w50" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">2013</th>
                        <td><input name="" type="text" class="inp_txt w50" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">2013</th>
                        <td><input name="" type="text" class="inp_txt w50" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">2013</th>
                        <td><input name="" type="text" class="inp_txt w50" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">2013</th>
                        <td><input name="" type="text" class="inp_txt w50" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row" rowspan="5">소셜</th>
                        <th scope="row">홈페이지</th>
                        <td><input name="" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">블로그</th>
                        <td><input name="" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">페이스북</th>
                        <td>http://www.facebook.com/<input name="" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">다른SNS 1</th>
                        <td >
                           <span class="col_td auto">
                           <label for="sns1" class="pos">SNS Name</label>
                           <input name="sns1" type="text" class="inp_txt lh w100" id="sns1" value="" title=" 입력">  
                           </span>
                           <span class="col_td auto">
                           <label for="url1" class="pos">URL</label>
                           <input name="url1" type="text" class="inp_txt lh w100" id="url1" value="" title=" 입력">  
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">다른 SNS 2</th>
                        <td >
                           <span class="col_td auto">
                           <label for="sns2" class="pos">SNS Name</label>
                           <input name="sns2" type="text" class="inp_txt lh w100" id="sns2" value="" title=" 입력">  
                           </span>
                           <span class="col_td auto">
                           <label for="url2" class="pos">URL</label>
                           <input name="url2" type="text" class="inp_txt lh w100" id="url2" value="" title=" 입력">  
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">등록승인</th>
                        <td colspan="2">
                           <div class="lst_check radio">
                              <span>
                              <label for="frame1">승인</label>
                              <input type="radio" name="frame" id="frame1" checked>
                              </span>
                              <span>
                              <label for="frame2">거절</label>
                              <input type="radio" name="frame" id="frame2" >
                              </span>
                           </div>
                        </td>
                     </tr>
               </table>
            </div>
            <div class="bot_align">
               <div class="btn_right">
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 gray ov-b small rato">List</button>
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
               </div>
            </div>
         </section>
      </article>
   </div>
</section>
<!-- //container -->
<section id="mainInfoPopup" class="layer_popup1">
   <header class="searchBox">
      <input name="" type="text" class="inp_txt w190 searchPopup" id="" value="" > 
      <button class="searchPopup"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" alt="검색"></button>
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
      <h1>검색결과</h1>
      <div class="scrollBox1">
         <ul>
            <li><button>서길동(1977) 생명의숲</button></li>
            <li><button>서길동(1977) 생명의숲</button></li>
            <li><button>서길동(1977) 생명의숲</button></li>
         </ul>
      </div>
      <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u">작가등록</span>을 진행해 주십시오.</p>
   </article>
</section>
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
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>