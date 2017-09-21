<?php
 $pageName = "List";
 $pageNum = "3";
 $subNum = "5";
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
        <h1 class="title1">Curation</h1>
        <div class="lst_table3">
          <table summary="Curation">
            <caption>Curation</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">카피라이트</th>
                <td><input name="" type="text" class="inp_txt w390" id="" value=""  ></td>
              </tr>
			   <tr>
                <th scope="row">기획전 제목</th>
                <td><input name="" type="text" class="inp_txt w390" id="" value=""  ></td>
              </tr>
             <tr>
                <th scope="row">배너</th>
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
					<th scope="row">상태</th>
					<td colspan="3"><div class="lst_check radio"><span><label for="exp_y">노출</label><input type="radio" name="exp_y" id="exp_y" checked></span> &nbsp;<span><label for="exp_n">비노출</label><input type="radio" name="exp_n" id="exp_n" ></span></div></td>
				</tr>
              </tbody>
          </table>

        </div><!-- //lst_table3 -->
      </section><!--// section_box -->
	<section class="section_box">

			<h1 class="title1">Pragraph 1</h1>

			<div class="lst_table3">

				<table summary="Pragraph 1">

				  <caption>Pragraph 1</caption>

				  <colgroup>

					<col class="th1">
					<col>

				  </colgroup>

				  <tbody>

					<tr>
					  <th scope="row" >서브타이틀</th>
					 <td><input name="" type="text" class="inp_txt w190" id="" value=""  > </td>
					</tr>
					<tr>
					  <th scope="row" >작품1</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품2</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품3</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품4</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품5</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품6</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품7</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품8</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품9</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품10</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품11</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품12</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품13</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품14</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품15</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품16</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품17</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품18</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품19</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품20</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
				  </tbody>

				</table>

			  </div><!-- //lst_table3 -->
				<div class="bot_align">
				</div>
	</section><!--// section_box -->
	<section class="section_box">

			<h1 class="title1">Pragraph 2</h1>

			<div class="lst_table3">

				<table summary="Pragraph 2">

				  <caption>Pragraph 2</caption>

				  <colgroup>

					<col class="th1">
					<col>

				  </colgroup>

				  <tbody>

					<tr>
					  <th scope="row" >서브타이틀</th>
					 <td><input name="" type="text" class="inp_txt w190" id="" value=""  > </td>
					</tr>
					<tr>
					  <th scope="row" >작품1</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품2</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품3</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품4</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품5</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품6</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품7</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품8</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품9</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품10</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품11</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품12</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품13</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품14</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품15</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품16</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품17</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품18</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품19</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품20</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
				  </tbody>

				</table>

			  </div><!-- //lst_table3 -->

	</section><!--// section_box -->
	<section class="section_box">

			<h1 class="title1">Pragraph 3</h1>

			<div class="lst_table3">

				<table summary="Pragraph 3">

				  <caption>Pragraph 3</caption>

				  <colgroup>

					<col class="th1">
					<col>

				  </colgroup>

				  <tbody>

					<tr>
					  <th scope="row" >서브타이틀</th>
					 <td><input name="" type="text" class="inp_txt w190" id="" value=""  > </td>
					</tr>
					<tr>
					  <th scope="row" >작품1</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품2</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품3</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품4</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품5</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품6</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품7</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품8</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품9</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품10</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품11</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품12</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품13</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품14</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품15</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품16</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품17</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품18</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품19</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품20</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
				  </tbody>

				</table>

			  </div><!-- //lst_table3 -->
				<div class="bot_align">

					  <div class="btn_right">

					</div>
				</div>
	</section><!--// section_box -->
	<section class="section_box">

			<h1 class="title1">Pragraph 4</h1>

			<div class="lst_table3">

				<table summary="Pragraph 4">

				  <caption>Pragraph 4</caption>

				  <colgroup>

					<col class="th1">
					<col>

				  </colgroup>

				  <tbody>

					<tr>
					  <th scope="row" >서브타이틀</th>
					 <td><input name="" type="text" class="inp_txt w190" id="" value=""  > </td>
					</tr>
					<tr>
					  <th scope="row" >작품1</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품2</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품3</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품4</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품5</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품6</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품7</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품8</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품9</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품10</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품11</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품12</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품13</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품14</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품15</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품16</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품17</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품18</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품19</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품20</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
				  </tbody>

				</table>

			  </div><!-- //lst_table3 -->
				<div class="bot_align">

					  <div class="btn_right">

					</div>
				</div>
	</section><!--// section_box -->
	<section class="section_box">

			<h1 class="title1">Pragraph 5</h1>

			<div class="lst_table3">

				<table summary="Pragraph 5">

				  <caption>Pragraph 5</caption>

				  <colgroup>

					<col class="th1">
					<col>

				  </colgroup>

				  <tbody>

					<tr>
					  <th scope="row" >서브타이틀</th>
					 <td><input name="" type="text" class="inp_txt w190" id="" value=""  > </td>
					</tr>
					<tr>
					  <th scope="row" >작품1</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품2</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품3</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품4</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품5</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품6</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품7</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품8</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품9</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품10</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품11</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품12</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품13</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품14</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품15</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품16</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품17</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품18</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품19</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
					<tr>
					  <th scope="row" >작품20</th>
					 <td class="layerPopup"><input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly > <a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a></td>
					</tr>
				  </tbody>

				</table>

			  </div><!-- //lst_table3 -->
				<div class="bot_align">

					  <div class="btn_right">
					 <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">List</button>
					  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
					</div>
				</div>
	</section><!--// section_box -->
     </article>
  </div>
 </section>
		
	 

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

    btnHover(".btnOvr");



  })

 </script>
<? include "../inc/bot.php"; ?>