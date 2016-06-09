
<nav class="side">
	<div id="menu-button" class="icon">
		<div class="hit-area"></div>
		<div id="menu-button-hover" >
			<div id="menu-button-line" ></div>
			<div id="menu-button-text">MENU</div>
		</div>
		<div id="menu-button-icon" style="opacity: 1;"><img src="/_oktomato/images/bg/bg_menuopen_off.gif" alt="메뉴열기"></div>
	</div>
	<div class="inner">
		<? if ( $pageNum == "1") { ?>
		<h1>회원</h1>
		<ul class="snb">
			<li class="s1"><a href="<?=$currentFolder?><?=goUrl(0101)?>">00/ 대쉬보드</a></li>
			<li class="s2"><a href="<?=$currentFolder?><?=goUrl(0102)?>">01/ 회원목록</a></li>
			<li class="s3"><a href="<?=$currentFolder?><?=goUrl(0103)?>">02/ 회원명부</a></li>
			<li class="s4"><a href="<?=$currentFolder?><?=goUrl(0104)?>">03/ 제위원회 관리</a></li>
			<li class="s5"><a href="<?=$currentFolder?><?=goUrl(0105)?>">04/ 단체회원</a></li>
			<!--<li class="s6"><a href="<?=$currentFolder?><?=goUrl(0106)?>">05/ 회원통계</a></li>
			<li class="s7"><a href="<?=$currentFolder?><?=goUrl(0107)?>">06/ 환경설정</a></li>
			<li class="s8"><a href="<?=$currentFolder?><?=goUrl(0108)?>">07/ 회원가입</a></li>-->
		</ul>
		<? } elseif ( $pageNum == "2") { ?>
		<h1>회계</h1>
		<ul class="snb">
			<li class="s1"><a href="<?=$currentFolder?><?=goUrl(0201)?>">00/ 대쉬보드</a></li>
			<li class="s2"><a href="<?=$currentFolder?><?=goUrl(0202)?>">01/ 연회비세팅</a></li>
			<li class="s3"><a href="<?=$currentFolder?><?=goUrl(0203)?>">02/ 학술대회비 관리</a></li>
			<li class="s4"><a href="<?=$currentFolder?><?=goUrl(0204)?>">03/ 논문심사료 관리</a></li>
			<li class="s5"><a href="<?=$currentFolder?><?=goUrl(0205)?>">04/ 기타회비 관리</a></li>
			<li class="s6"><a href="<?=$currentFolder?><?=goUrl(0206)?>">05/ 무통장입금 계좌</a></li>
		</ul>
		<? } elseif ( $pageNum == "3") { ?>
		<h1>학술대회</h1>
		<ul class="snb">
			<li class="s1"><a href="<?=$currentFolder?><?=goUrl(0301)?>">00/ 대쉬보드</a></li>
			<li class="s2"><a href="<?=$currentFolder?><?=goUrl(0302)?>">01/ 학술대회리스트</a></li>
			<li class="s3"><a href="<?=$currentFolder?><?=goUrl(0303)?>">02/ 학술대회관리</a></li>
			<li class="s4"><a href="<?=$currentFolder?><?=goUrl(0304)?>">03/ 참가자 관리</a></li>
			<li class="s5"><a href="<?=$currentFolder?><?=goUrl(0305)?>">04/ 초록관리</a></li>
			<li class="s6"><a href="<?=$currentFolder?><?=goUrl(0306)?>">05/ 기기전시관리</a></li>
		</ul>
		<? } elseif ( $pageNum == "7") { ?>
		<h1>메일ㆍSMS</h1>
		<ul class="snb">
			<li class="s1"><a href="<?=$currentFolder?><?=goUrl(0701)?>">00/ SMS 자동발송 설정</a></li>
			<li class="s2"><a href="<?=$currentFolder?><?=goUrl(0702)?>">01/ SMS발송</a></li>
			<li class="s3"><a href="<?=$currentFolder?><?=goUrl(0703)?>">02/ 메일발송</a></li>
		</ul>
		<? } ?>
	</div>
</nav>
<!-- //snb -->