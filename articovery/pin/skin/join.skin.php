<?php if (!defined('OKTOMATO')) exit; ?>
<section id="layerNewletter" class="type2">
	<header class="header">
		<div class="txt_group mb40">
			<p class="h"><span class="line">당신을 사로잡은 작품을 PIN 해주세요.</span></p>
			<p class="t1">로그인 후, 가장 마음에 드는 9점의 작품을 PIN하면 참여완료!</p>
			<div class="mt25">
				<p>추첨을 통해 빕스 식사권(2명 각 2매씩), 스타벅스 기프티콘(30명)을 드립니다.</p>
				<p>(이벤트 상품 수령을 위해 PIN 투표 후, 반드시 연락처를 남겨주세요)</p>
			</div>
		</div>
		<h1 class="mt40">Join us</h1>
		<button class="close b-close"><img src="/images/btn/btn_close.png" alt="닫기"></button>
	</header>
	<article class="cont">
		<input type="hidden" name="mode" id="mode" value="join">
		<div class="join">
			<div class="btnColor facebook">
				<a href="javascript:facebookLogin('join');"><span><img src="/images/ico/ico_face_mo.gif" alt="페이스북">&nbsp;facebook으로 회원가입</span></a>
			</div>
			<div class="btnColor google">
				<a href="javascript:googleOpen('<?php echo $authUrl?>');"><span><img src="/images/ico/ico_google_mo.gif" alt="구글">&nbsp;</span>Google+으로 회원가입</a>
			</div>
			<div class="btnColor line"><a href="/member/join/?at=write">회원가입</a></div>
				<p class="log">이미 가입하셨다면, <a href="/member/login.php?returnUrl=/articovery/pin/">로그인하기</a></p>
			</div>
		</div>
	</article>
	<!-- <footer class="footer">
		<input type="checkbox" id="a_week" value="Y" onclick="weekPopClose();">
		<label for="a_week">일주일동안 보지않기</label>
		<button class="close b-close"> |  닫기</button>
	</footer> -->
</section>
