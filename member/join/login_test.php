<script src="/oktomato//js/jquery-1.9.1.min.js"></script>
<span id="signinButton">
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="880186086225-h5vlgcbisb4u9gujhkj9d6il8d1dsoda.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schemas.google.com/AddActivity"
    data-scope="https://www.googleapis.com/auth/plus.login"
	>
  </span>
</span>





<script src="/js/jquery.chkform.js"></script>
<script type="text/javascript">
function chkForm(f){
	if ($("#returnUrl<?php echo $ajax_state;?>").val() == '' ){
		$("#returnUrl<?php echo $ajax_state;?>").val(document.location.href) ;
	}

	if(chkDefaultForm(f) ){
		f.target = "action_ifrm";
		f.submit();
	}
}
function loginCheck(){
	
	//alert(document.location.href);
	if ($("#uid<?php echo $ajax_state;?>").val()==''){ alert('아이디를 입력하셔야 합니다.'); $("#uid").focus(); return false; }
	if ($("#upwd<?php echo $ajax_state;?>").val()==''){ alert('비밀번호를 입력하셔야 합니다.'); $("#upwd").focus(); return false; }
	
	chkForm(document.loginFrm<?php echo $ajax_state;?>);
}
</script>



    <!-- google login 로그인 연동 S //이 비동기 자바스크립트를 </body> 태그 앞에 배치 -->
    <script type="text/javascript">

      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();

    </script>
	<!-- google login 로그인 연동  E //이 비동기 자바스크립트를 </body> 태그 앞에 배치 -->


<script>

function signinCallback(authResult) {
  if (authResult['access_token']) {
    // 승인 성공
    // 사용자가 승인되었으므로 로그인 버튼 숨김. 예:
	alert("승인성공");
	alert(authResult['id_token']);
    //document.getElementById('signinButton').setAttribute('style', 'display: none');
  } else if (authResult['error']) {
    // 오류가 발생했습니다.
    // 가능한 오류 코드:
    //   "access_denied" - 사용자가 앱에 대한 액세스 거부
    //   "immediate_failed" - 사용자가 자동으로 로그인할 수 없음
    // console.log('오류 발생: ' + authResult['error']);
  }
}

</script>
<script type="text/javascript">
function disconnectUser(access_token) {
	alert('dasdf');
  var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' +
      access_token;

  // 비동기 GET 요청을 수행합니다.
  $.ajax({
    type: 'GET',
    url: revokeUrl,
    async: false,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(nullResponse) {
      // 사용자가 연결 해제되었으므로 작업을 수행합니다.
      // 응답은 항상 정의되지 않음입니다.
    },
    error: function(e) {
      // 오류 처리
      // console.log(e);
      // 실패한 경우 사용자가 수동으로 연결 해제하게 할 수 있습니다.
      // https://plus.google.com/apps
    }
  });
}
// 버튼 클릭으로 연결 해제를 실행할 수 있습니다.
//$('#revokeButton').click(disconnectUser);
$('#revokeButton').click(function(){
alert('dasdf');
});
</script>

<button type="button" id="revokeButton">revokeButton</button>
