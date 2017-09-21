<?php
   $pageName = "List";
   $pageNum = "4";
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
            <h1 class="title1">Facebook</h1>
            <div class="lst_table3">
               <table summary="Facebook">
                  <caption>Facebook</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" rowspan="4">Content1 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content2 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content3 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content4 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content5 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
            <div class="bot_align">
               <div class="btn_right">
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
               </div>
            </div>
         </section>
		 <section class="section_box">
            <h1 class="title1">Printerest</h1>
            <div class="lst_table3">
               <table summary="Printerest">
                  <caption>Printerest</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" rowspan="4">Content1 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content2 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content3 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content4 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content5 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
            <div class="bot_align">
               <div class="btn_right">
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
               </div>
            </div>
         </section>
		 <section class="section_box">
            <h1 class="title1">Instagram</h1>
            <div class="lst_table3">
               <table summary="Instagram">
                  <caption>Instagram</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" rowspan="4">Content1 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content2 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content3 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content4 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content5 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
            <div class="bot_align">
               <div class="btn_right">
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
               </div>
            </div>
         </section>
		 <section class="section_box">
            <h1 class="title1">Pictify</h1>
            <div class="lst_table3">
               <table summary="Pictify">
                  <caption>Pictify</caption>
                  <colgroup>
                     <col class="th1">
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row" rowspan="4">Content1 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content2 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content3 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content4 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
					 <tr>
                        <th scope="row" rowspan="4">Content5 </th>
                        <th scope="row" >이미지</th>
                        <td>
                           <div class="clearfix">
                              <div class="fileinputs" >
                                 <span style="background:#ddd; display:inline-block;"><img id="goodsImg0" src="" width="132" height="100" alt="이미지를 업로드해주세요."></span>
                                 <button type="button" id="btn_regist0"  class="btn_regist">이미지 등록</button>
                                 <button type="button" id="btn_delete0" class="btn_delete" onclick="deleteListImg();">이미지 삭제</button>
                                 <div id="upload_status0" style="display:none;">
                                    <img src="/images/btn/ajax-loader.gif" style="padding-top:3px;padding-left:30px"><br>업로드 중입니다.
                                 </div>
                              </div>
                              <!--div class="lst_Upload">
                                 <span class="tag">썸네일.jpg <button>삭제</button></span>
                                 </div-->
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >제목</th>
                        <td >
                           <span class="col_td auto">
                           <label for="tit" class="pos">낭만주의의 자아</label>
                           <input name="" type="text" class="inp_txt lh w190" id="tit" value=""> 
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >텍스트</th>
                        <td>
                           <div class="textarea">
                              <textarea name=""></textarea>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row" >입력일</th>
                        <td> 
                           <span class="datapiker">
                           <input name="sd" type="text" class="inp_txt date" id="sd" value="">
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
            <div class="bot_align">
               <div class="btn_right">
                  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
               </div>
            </div>
         </section>
         <!--// section_box -->
      </article>
   </div>
   <!-- //container_inner -->
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
<section id="RecommendedListPopup" class="layer_popup1">
   <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   <article class="cont">
      <h1>검색결과</h1>
      <div class="scrollBox2">
         <ul>
            <li><button>김순응 대표</button></li>
            <li><button>전준호 작가</button></li>
            <li><button>홍길동 대표</button></li>
            <li><button>박홍길 작기</button></li>
         </ul>
      </div>
      <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u">작품등록</span>을 진행해 주십시오.</p>
   </article>
</section>
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
      btnHover(".btnOvr");
   
    })
</script>
<? include "../inc/bot.php"; ?>