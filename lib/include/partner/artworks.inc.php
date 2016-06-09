<?php if (!defined('OKTOMATO')) exit; ?>

		<section id="bannerListPopup2" class="layer_popup2">
			<header class="searchBox">
				<input type="text" class="inp_txt w190 searchPopup" name="artworks" id="artworks" placeholder="작품명 또는 작가명을 입력하세요." onkeypress="if(event.keyCode==13){searchArtworks();return false;}">
				<button class="searchPopup" type="button" onclick="searchArtworks();"><img src="/oktomato/images/btn/btn_search_off.jpg" alt="검색"></button>
				<button type="button" class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
			</header>
			<article class="cont">
				<h1>검색결과</h1>
				<div class="scrollBox1">
					<ul>
						<li>
							<table id="table-artworks">
								<colgroup>
									<col width="50"/>
									<col width="120"/>
									<col />
								</colgroup>
								<tbody>
								</tbody>
							</table>
						</li>
					</ul>
					<!--
					<div class="bot_align">
						<div class="paginate">
							<a href="#" class="btn next" onclick="return false;"><img src="/images/paginate/btn_prev2.gif" alt="처음"></a>
							<a href="#" class="btn next" onclick="return false;"><img src="/images/paginate/btn_prev.gif" alt="이전"></a>
							<a href="#" class="num on" onclick="return false;">1</a>
							<a href="#" class="num" onclick="return false;">2</a>
							<a href="#" class="num" onclick="return false;">3</a>
							<a href="#" class="num" onclick="return false;">4</a>
							<a href="#" class="num" onclick="return false;">5</a>
							<a href="#" class="num" onclick="return false;">6</a>
							<a href="#" class="num" onclick="return false;">7</a>
							<a href="#" class="num" onclick="return false;">8</a>
							<a href="#" class="num" onclick="return false;">9</a>
							<a href="#" class="num" onclick="return false;">10</a>
							<a href="#" class="btn next" onclick="return false;"><img src="/images/paginate/btn_next.gif" alt="다음"></a>
							<a href="#" class="btn next" onclick="return false;"><img src="/images/paginate/btn_next2.gif" alt="마지막"></a>
						</div>
					</div>
					-->
				</div>
				<p class="tip">※ 검색결과가 없을 경우 <a href="<?php echo $link_02_04; ?>" class="txt_line">신규 작품 등록</a>을 진행 주십시오.</p>
			</article>
			<div class="align_right">
				<button type="button" class="btn_pack1 ov-b small rato" onclick="insertArtworks();">Save</button>
				<button type="button" class="close btn_pack1 ov-b gray small rato">Cancel</button>
			</div>
		</section>

		<!--검색 레이어 E -->