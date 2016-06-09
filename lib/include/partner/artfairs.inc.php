<?php if (!defined('OKTOMATO')) exit; ?>

			<!--검색 레이어 S -->
			<section id="bannerListPopup3" class="layer_popup2">
				<header class="searchBox">
					<input type="text" class="inp_txt w190 searchPopup" name="sw" id="sw" placeholder="페어명을 입력하세요." onkeypress="if(event.keyCode==13){searchArtFair();return false;}">
					<button class="searchPopup" type="button" onclick="searchArtFair();"><img src="/oktomato/images/btn/btn_search_off.jpg" alt="검색"></button>
					<button type="button" class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
				</header>
				<article class="cont">
					<h1>검색결과</h1>
					<div class="scrollBox1">
						<ul>
							<li>
								<table id="table-artfairs">
									<colgroup>
										<col width="50"/>
										<col width="120"/>
										<col />
										<col />
									</colgroup>
									<tbody>
										<!--
										<tr>
											<td><input type="radio" name="ip_artist" id="ip_artist"/></td>
											<td><div class="img"><img src="/upload/goods/list/1444204699GAKFBYDNSS.jpg" alt="" /></div></td>
											<td>홍길동</td>
										</tr>
										<tr>
											<td><input type="radio" name="ip_artist" id="ip_artist"/></td>
											<td><div class="img"><img src="/upload/goods/list/1444204699GAKFBYDNSS.jpg" alt="" /></div></td>
											<td>홍길동</td>
										</tr>
										<tr>
											<td><input type="radio" name="ip_artist" id="ip_artist"/></td>
											<td><div class="img"><img src="/upload/goods/list/1444204699GAKFBYDNSS.jpg" alt="" /></div></td>
											<td>홍길동</td>
										</tr>
										-->
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
					<p class="tip">※ 검색결과가 없을 경우 사이트 관리자에게 문의하여 주세요.</p>
				</article>
				<div class="align_right">
					<button type="button" class="btn_pack1 ov-b small rato" onclick="insertArtfair();">Save</button>
					<button type="button" class="close btn_pack1 ov-b gray small rato">Cancel</button>
				</div>
			</section>
			<!--검색 레이어 E -->