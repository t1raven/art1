 <section id="eventListPopup" class="layer_popup1">
	<header class="searchBox">
	<input name="eventtitle" type="text" class="inp_txt w190 searchPopup" id="eventtitle">
	<button class="searchPopup" type="button" onclick="searchEventExhibition();"><img src="/oktomato/images/btn/btn_search_off.jpg" alt="검색"></button>
	<button class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
	</header>
	<article class="cont">
	<h1>검색결과</h1>
	<div class="scrollBox1" id="div-event">
	  <ul>
	  </ul>
	</div>
	<p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u" onclick="createEventExhibition();" style="cursor:pointer;">기획전등록</span>을 진행해 주십시오.</p>
	</article>
</section>