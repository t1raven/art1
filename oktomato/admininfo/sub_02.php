<?php
 $pageName = "";
 $pageNum = "7";
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
			<div class="admin_tab_list">
				<ul>
					<li class="on"><a href="">개인정보취급방침</a></li>
					<li><a href="">이용약관</a></li>
					<li><a href="">환불정책</a></li>
					<li><a href="">배송정책(작품)</a></li>
					<li><a href="">배송정책(상품)</a></li>
				</ul>
			</div>
      </section>
	  <section class="section_box">
            <div class="lst_table3">
               <table summary="Sub Info.">
                  <caption>Sub Info.</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <!-- <tr>
                        <th scope="row">View in Room</th>
                        
                        <td>
                        
                          <div class="lst_check radio">
                        
                            <span>
                        
                              <label for="viewinroom1">오피스</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom1" checked>
                        
                            </span>
                        
                            <span>
                        
                              <label for="viewinroom2">갤러리</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom2" >
                        
                            </span>
                        
                            <span>
                        
                              <label for="viewinroom3">홈</label>
                        
                              <input type="radio" name="viewinroom" id="viewinroom3" >
                        
                            </span>
                        
                          </div>
                        
                        </td>
                        
                        </tr> -->
                     <tr>
                        <th scope="row">내용 *</th>
                        <td>
                           <div class="textarea">
                              <textarea style="height:500px;"name=""></textarea>
                           </div>
                        </td>
                     </tr>
                    
                  </tbody>
               </table>
            </div>
            <!-- //lst_table3 -->
         </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

<? include "../inc/bot.php"; ?>