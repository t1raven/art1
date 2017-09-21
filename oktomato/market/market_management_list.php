<?php
 $pageName = "List";
 $pageNum = "3";
 $subNum = "4";
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
			<h1 class="title1">Selection</h1>
			<div class="lst_table3">
				<table summary="Selection">
				  <caption>Selection</caption>
				  <colgroup>
					<col class="th1">
					<col>
				  </colgroup>
				  <tbody>
					<tr>
					  <th scope="row">Issue1 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">Issue2 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">Issue3 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">Focused Works 1 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">Focused Works 2 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">Focused Works 3 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">AWARDED ARTIST 1 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">AWARDED ARTIST 2 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
					<tr>
					  <th scope="row">AWARDED ARTIST 3 *</th>
					  <td class="layerPopup">
						<input name="" type="text" class="inp_txt w190 searchPopup" id="" value=""  readonly >
						<a href="#mainInfoPopup" class="searchPopup layerOpen"><img src="<?=$currentFolder?>/images/btn/btn_search_off.jpg" class="btnOvr" alt="검색"></a>
					  </td>
					</tr>
				  </tbody>
				</table>
			  </div><!-- //lst_table3 -->
			<div class="bot_align">
              <div class="btn_right">
              <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
            </div>
          </div>
		  </section><!--// section_box -->
		  <section class="section_box">
				<h1 class="title1">MD CHOICE</h1>
				<div class="lst_table3">
					<table summary="MD CHOICE">
					  <caption>MD CHOICE</caption>
					  <colgroup>
						<col class="th1">
						<col class="th1">
						<col>
					  </colgroup>
					  <tbody>
						<tr>
						  <th scope="row" rowspan="6">Slot1 *</th>
						  <th scope="row" >타이틀</th>
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
						  <th scope="row" rowspan="6">Slot2 *</th>
						  <th scope="row" >타이틀</th>
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
						  <th scope="row" rowspan="6">Slot3 *</th>
						  <th scope="row" >타이틀</th>
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
						  <th scope="row" rowspan="6">Slot4 *</th>
						  <th scope="row" >타이틀</th>
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
						  <th scope="row" rowspan="6">Slot5 *</th>
						  <th scope="row" >타이틀</th>
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

					  </tbody>
					</table>
				  </div><!-- //lst_table3 -->
				<div class="bot_align">
					  <div class="btn_right">
					  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
					</div>
				  </div>
			  </section><!--// section_box -->
			  <section class="section_box">
				<h1 class="title1">Collection</h1>
				<div class="lst_table3">
					<table summary="MD CHOICE">
					  <caption>MD CHOICE</caption>
					  <colgroup>
						<col class="th1">
						<col class="th1">
						<col>
					  </colgroup>
					  <tbody>
						<tr>
						  <th scope="row" rowspan="4">Top Seller *</th>
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
						<tr>
						  <th scope="row" rowspan="4">MD'S PICK *</th>
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
						<tr>
						  <th scope="row" rowspan="4">NEW ARRIVALS *</th>
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
						</tr>


					  </tbody>
					</table>
				  </div><!-- //lst_table3 -->
				<div class="bot_align">
					  <div class="btn_right">
					  <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button>
					</div>
				  </div>
			  </section><!--// section_box -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

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