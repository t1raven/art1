<? include "../inc/config.php"; ?>
<?php
  $categoriName = "작가등록";
  $pageName = "작가등록";
  $pageNum = "10";
  $subNum = "3";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub" class="content-mediaBox margin1">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 

		<section id="photographerArea" class="content-mediaBox margin1">
			<h1 class="title6">개요</h1>
			<div class="txtBox">
				<p>‘작가등록 서비스’는 아트원 사이트에 게재될 작가프로필을 작가가 직접 입력하는 서비스입니다. 본 서비스를 통해 작가는 빠르고 정확하게 작가프로필을 등록할 수 있으며, 
이후 추가 혹은 수정된 항목을 즉각적으로 변경할 수 있습니다. 다음과 같은 간단한 가입저러차에 따라 등록한 작가는 아트원에서 제공하는 다양한 혜택을 체공받습니다.</p>
				<p class="ex">※ 직접등록이 불가한 작가의 경우 아트원에 문의 후 정보를 보내주시면 담당자가 등록해드립니다.</p>
			</div>
			
			<div class="lst_process">
				<ul>
					<li class="step1">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.01</p>
								<p class="tit">양식에 따라 내용 입력</p>
							</div>
						</div>
					</li>
					<li class="step2">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.02</p>
								<p class="tit">내용 확인 후 개별연락 :<br>내용 보완 또는 작품요청</p>
							</div>
						</div>
					</li>
					<li class="step3">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.03</p>
								<p class="tit">작품거래 계약체결</p>
							</div>
						</div>
					</li>
					<li class="step4">
						<div class="inner">
							<div class="box">
								<p class="step">STEP.04</p>
								<p class="tit">art1.com 마켓 작품 온라인 등록</p>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
			<h1 class="title6">등록혜택</h1>
			<div class="txtBox">
				<p>등록된 작가를 대상으로 일부작가를 전시개최 및 언론사기반의 특별프로모션을 다음과 같이 진행합니다.</p>
				<div class="box_gray">
					<ul>
						<li>1. 작품 판매 및 렌탈 대행</li>
						<li>2. 미술상 (최대2000만원)</li>
						<li>3. 개인전 개최 </li>
						<li>4. 언론홍보 (메이져급 언론통신사 기사게재)</li>
					</ul>
				</div>
				<p>※ 자세한 혜택과 내용은 작품거래 계약시 안내합니다.</p>
			</div>
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
                            <label for="name" class="pos">홍길동</label>
                            <input name="name" type="text" class="inp_txt lh w110" id="name" value="" title="작가명(Kr) 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">작가명 (En) *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="first_name" class="pos">First Name</label>
                            <input name="first_name" type="text" class="inp_txt lh w60" id="first_name" value="" title="First Name 입력">
                            </span>
                            <span class="col_td auto">
                            <label for="last_name" class="pos">Last Name</label>
                            <input name="last_name" type="text" class="inp_txt lh w60" id="last_name" value="" title="Last Name 입력">
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
                                     <input type="file" class="file" name="photo_file" />
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
                                  <input type="file" class="file" name="cv_file" />
                               </div>
                                                           </div>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">직업 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="job" class="pos">화가/문화센터강사/연구원</label>
                            <input name="job" type="text" class="inp_txt lh w190" id="job" value="" title="직업 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">출생년월일 *</th>
                         <td >
                            <span class="datapiker"><input name="birthday" type="text" class="inp_txt date" id="birthday" value=""></span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">장르 *</th>
                         <td >
                            <span class="col_td auto">
                            <label for="genre" class="pos">서양화/극사실화</label>
                            <input name="genre" type="text" class="inp_txt lh w190" id="genre" value="" title="장르 입력">
                            </span>
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">휴대폰 *</th>
                         <td >
                            <input name="mobile" type="text" class="inp_txt w150 only_number" id="mobile" value="" maxlength="11" title="휴대폰 번호 입력">
                         </td>
                      </tr>
                      <tr>
                         <th scope="row">이메일 *</th>
                         <td >
                            <input name="email" type="text" class="inp_txt w190" id="email" value="" maxlength="60" title="이메일 주소 입력">
                         </td>
                      </tr>
                   </tbody>
               </table>
            </div>
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
                          <select name="education_year[]">
                                                      <option value="2015">2015</option>
                                                      <option value="2014">2014</option>
                                                      <option value="2013">2013</option>
                                                      <option value="2012">2012</option>
                                                      <option value="2011">2011</option>
                                                      <option value="2010">2010</option>
                                                      <option value="2009">2009</option>
                                                      <option value="2008">2008</option>
                                                      <option value="2007">2007</option>
                                                      <option value="2006">2006</option>
                                                      <option value="2005">2005</option>
                                                      <option value="2004">2004</option>
                                                      <option value="2003">2003</option>
                                                      <option value="2002">2002</option>
                                                      <option value="2001">2001</option>
                                                      <option value="2000">2000</option>
                                                      <option value="1999">1999</option>
                                                      <option value="1998">1998</option>
                                                      <option value="1997">1997</option>
                                                      <option value="1996">1996</option>
                                                      <option value="1995">1995</option>
                                                      <option value="1994">1994</option>
                                                      <option value="1993">1993</option>
                                                      <option value="1992">1992</option>
                                                      <option value="1991">1991</option>
                                                      <option value="1990">1990</option>
                                                      <option value="1989">1989</option>
                                                      <option value="1988">1988</option>
                                                      <option value="1987">1987</option>
                                                      <option value="1986">1986</option>
                                                      <option value="1985">1985</option>
                                                      <option value="1984">1984</option>
                                                      <option value="1983">1983</option>
                                                      <option value="1982">1982</option>
                                                      <option value="1981">1981</option>
                                                      <option value="1980">1980</option>
                                                      <option value="1979">1979</option>
                                                      <option value="1978">1978</option>
                                                      <option value="1977">1977</option>
                                                      <option value="1976">1976</option>
                                                      <option value="1975">1975</option>
                                                      <option value="1974">1974</option>
                                                      <option value="1973">1973</option>
                                                      <option value="1972">1972</option>
                                                      <option value="1971">1971</option>
                                                      <option value="1970">1970</option>
                                                    </select>
                          <input name="education_name[]" type="text" class="inp_txt w390" id="" value="" title="학력 1st 입력">
                        </td>
                     </tr>
                                          <tr>
                        <th scope="row">학력 2<sup>nd</sup></th>
                        <td >
                          <select name="education_year[]">
                                                      <option value="2015">2015</option>
                                                      <option value="2014">2014</option>
                                                      <option value="2013">2013</option>
                                                      <option value="2012">2012</option>
                                                      <option value="2011">2011</option>
                                                      <option value="2010">2010</option>
                                                      <option value="2009">2009</option>
                                                      <option value="2008">2008</option>
                                                      <option value="2007">2007</option>
                                                      <option value="2006">2006</option>
                                                      <option value="2005">2005</option>
                                                      <option value="2004">2004</option>
                                                      <option value="2003">2003</option>
                                                      <option value="2002">2002</option>
                                                      <option value="2001">2001</option>
                                                      <option value="2000">2000</option>
                                                      <option value="1999">1999</option>
                                                      <option value="1998">1998</option>
                                                      <option value="1997">1997</option>
                                                      <option value="1996">1996</option>
                                                      <option value="1995">1995</option>
                                                      <option value="1994">1994</option>
                                                      <option value="1993">1993</option>
                                                      <option value="1992">1992</option>
                                                      <option value="1991">1991</option>
                                                      <option value="1990">1990</option>
                                                      <option value="1989">1989</option>
                                                      <option value="1988">1988</option>
                                                      <option value="1987">1987</option>
                                                      <option value="1986">1986</option>
                                                      <option value="1985">1985</option>
                                                      <option value="1984">1984</option>
                                                      <option value="1983">1983</option>
                                                      <option value="1982">1982</option>
                                                      <option value="1981">1981</option>
                                                      <option value="1980">1980</option>
                                                      <option value="1979">1979</option>
                                                      <option value="1978">1978</option>
                                                      <option value="1977">1977</option>
                                                      <option value="1976">1976</option>
                                                      <option value="1975">1975</option>
                                                      <option value="1974">1974</option>
                                                      <option value="1973">1973</option>
                                                      <option value="1972">1972</option>
                                                      <option value="1971">1971</option>
                                                      <option value="1970">1970</option>
                                                    </select>
                          <input name="education_name[]" type="text" class="inp_txt w390" id="" value="" title="학력 2nd 입력">
                        </td>
                     </tr>
                     
                                         <tr>
                        <th scope="row">수상 1<sup>st</sup></th>
                        <td >
                          <select name="award_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="award_name[]" type="text" class="inp_txt w390" id="" value="" title="수상 1st 입력">
                      </td>
                     </tr>
                                         <tr>
                        <th scope="row">수상 2<sup>nd</sup></th>
                        <td >
                          <select name="award_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="award_name[]" type="text" class="inp_txt w390" id="" value="" title="수상 2nd 입력">
                      </td>
                     </tr>
                                         <tr>
                        <th scope="row">수상 3<sup>rd</sup></th>
                        <td >
                          <select name="award_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="award_name[]" type="text" class="inp_txt w390" id="" value="" title="수상 3rd 입력">
                      </td>
                     </tr>
                    
                                         <tr>
                        <th scope="row">개인전 1<sup>st</sup></th>
                        <td >
                          <select name="private_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="private_name[]" type="text" class="inp_txt w390" id="" value="" title="개인전 1st 입력">
                        </td>
                     </tr>
                                          <tr>
                        <th scope="row">개인전 2<sup>nd</sup></th>
                        <td >
                          <select name="private_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="private_name[]" type="text" class="inp_txt w390" id="" value="" title="개인전 2nd 입력">
                        </td>
                     </tr>
                                          <tr>
                        <th scope="row">개인전 3<sup>rd</sup></th>
                        <td >
                          <select name="private_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="private_name[]" type="text" class="inp_txt w390" id="" value="" title="개인전 3rd 입력">
                        </td>
                     </tr>
                     
                                          <tr>
                        <th scope="row">단체전 1<sup>st</sup></th>
                        <td >
                          <select name="team_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="team_name[]" type="text" class="inp_txt w390" id="" value="" title="단체전 1st 입력">
                        </td>
                     </tr>
                                          <tr>
                        <th scope="row">단체전 2<sup>nd</sup></th>
                        <td >
                          <select name="team_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="team_name[]" type="text" class="inp_txt w390" id="" value="" title="단체전 2nd 입력">
                        </td>
                     </tr>
                                          <tr>
                        <th scope="row">단체전 3<sup>rd</sup></th>
                        <td >
                          <select name="team_year[]">
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                      </select>
                          <input name="team_name[]" type="text" class="inp_txt w390" id="" value="" title="단체전 3rd 입력">
                        </td>
                     </tr>
                     
                  </tbody>
               </table>
            </div>
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
                        <td colspan="2"class=""><input name="major_work_txt" type="text" class="inp_txt w190 searchPopup" id="major_work_txt" value="" readonly><input name="major_work" type="hidden" class="inp_txt w190 searchPopup" id="major_work" value=""> <a href="#mainInfoPopup" class="searchPopup layerOpen" onclick="setParam('major_work', '')"><img src="/oktomato/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
                     </tr>
                     <tr>
                        <th scope="row">작가인사말 *</th>
                        <td colspan="2">
                           <div class="textarea">
                              <textarea name="greeting" id="greeting"></textarea>
                           </div>
                           <p>40단어 제한, 현재 <span id="greeting_bytes">00</span> 단어</p>
                        </td>
                     </tr>
                                                                               <tr>
                        <th scope="row" rowspan="5">연도별 작품수*</th>
                        <th scope="row">2015<input name="artwork_year[]" type="hidden" value="2015"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="0" title=""></td>
                     </tr>
                                                                                                    <tr>
                        <th scope="row">2014<input name="artwork_year[]" type="hidden" value="2014"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="0" title=""></td>
                     </tr>
                                                                                                    <tr>
                        <th scope="row">2013<input name="artwork_year[]" type="hidden" value="2013"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="0" title=""></td>
                     </tr>
                                                                                                    <tr>
                        <th scope="row">2012<input name="artwork_year[]" type="hidden" value="2012"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="0" title=""></td>
                     </tr>
                                                                                                    <tr>
                        <th scope="row">2011<input name="artwork_year[]" type="hidden" value="2011"></th>
                        <td><input name="artwork_cnt[]" type="text" class="inp_txt w50 only_number" value="0" title=""></td>
                     </tr>
                                                          <tr>
                        <th scope="row" rowspan="5">소셜</th>
                        <th scope="row">홈페이지</th>
                        <td><input name="homepage" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">블로그</th>
                        <td><input name="blog" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">페이스북</th>
                        <td><input name="facebook" type="text" class="inp_txt w200" id="" value="" title=""></td>
                     </tr>
                     <tr>
                        <th scope="row">다른SNS 1</th>
                        <td >
                           <span class="col_td auto">
                             <label for="sns_1_name" class="pos">SNS Name</label>
                             <input name="sns_1_name" type="text" class="inp_txt lh w100" id="sns_1_name" value="" title=" 입력">
                           </span>
                           <span class="col_td auto">
                             <label for="sns_1_url" class="pos">URL</label>
                             <input name="sns_1_url" type="text" class="inp_txt lh w100" id="sns_1_url" value="" title=" 입력">
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">다른 SNS 2</th>
                        <td >
                           <span class="col_td auto">
                             <label for="sns_2_name" class="pos">SNS Name</label>
                             <input name="sns_2_name" type="text" class="inp_txt lh w100" id="sns_2_name" value="" title=" 입력">
                           </span>
                           <span class="col_td auto">
                             <label for="sns_2_url" class="pos">URL</label>
                             <input name="sns_2_url" type="text" class="inp_txt lh w100" id="sns_2_url" value="" title=" 입력">
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">승인 여부</th>
                        <td colspan="2">
                           <div class="lst_check radio">
                              <span>
                                <label for="approval_1">승인</label>
                                <input type="radio" name="approval" id="approval_1" value="Y">
                              </span>
                              <span>
                                <label for="approval_2">거절</label>
                                <input type="radio" name="approval" id="approval_2" value="N" checked>
                              </span>
                           </div>
                        </td>
                     </tr>
               </table>
            </div>
            <div class="bot_align">
               <div class="btn_right">
                  <button type="button" class="btn_pack1 gray ov-b small rato" id="btnList">List</button>
                  <button type="button" class="btn_pack1 ov-b small rato" id="btnSave">Save</button>
               </div>
            </div>

			
		</section>      
		</script>
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

	LabelHidden(".inp_txt.lh");
	//bbsCheckbox();
	checkListMotion();
	initFileUploads();

	$("#btnList").click(function() {
		location.href="index.php";
	});
	$("#btnSave").click(function() {
		chkForm(document.writeFrm);
	});
		});
</script>
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













