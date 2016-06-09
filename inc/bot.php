</div>
<div id="quickBtn">
   <? if ($pageNum == "3"){
			if ( $at_tmp == 'artist' ){
				$bak_link_tmp = 'artist.php';
			}else{
				$bak_link_tmp = 'index.php';
			}
   ?>
   <!-- a href="index.php?<?php echo PageUtil::_param_get('');?>" style="display:none" class="back"><img src="/images/btn/btn_back.png" alt="뒤로가기"></a -->
   <a href="<?php echo $bak_link_tmp?>?<?php echo PageUtil::_param_get('');?>" style="display:none" class="back"><img src="/images/btn/btn_back.png" alt="뒤로가기"></a>
   <? }else if($pageNum == "2"){
	//$back_url_m 은 /news/skin/common/read.foot.skin.php  에서 설정된다.
   ?>
    <!-- a href="?<?php echo PageUtil::_param_get('at='.$at_tmp.'&subm='.$subm);?>" style="display:none" class="back"><img src="/images/btn/btn_back.png" alt="뒤로가기"></a -->
	<a href="<?php echo $back_url_m ?>" style="display:none" class="back"><img src="/images/btn/btn_back.png" alt="뒤로가기"></a>
   <? }?>
   <a href="#wrap"><img src="/images/btn/btn_top.png" alt="최상단으로"></a>
</div>
<!-- 이 비동기 자바스크립트를 </body> 태그 앞에 배치 -->
<div id="pop_bx_common"></div>
    <script>



    	var pageNum = "<?=$pageNum?>";
      var subNum = "<?=$subNum?>";
      var threeNum = "<?=$threeNum?>";

      /*
      var imgPopupTopLoad = imagesLoaded( $("#art1guide") );
      imgPopupTopLoad.on( 'always', onAlways );
      function onAlways( instance ) {
            var openFlag = getCookie("openFlag");
            if(openFlag =="1"){
            }else if( pageNum == 0  ){
              topStartOpen();
            }
      }
       */




          function topStartOpen(){
            var objH = $("#art1guide").outerHeight();
             $("#art1guide").css("display","block");

               $("#header").stop().css({"top":objH});
               $("#container_main").stop().css({"padding-top":  parseInt($ ("#container_main").stop().css("padding-top")) + objH});
              $("#art1guide").find(".close , .nextClose").on("click",topBannerClose);

             $(window).on("resize.openBanner",function(){
              var wdith = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                  objH = $("#art1guide").outerHeight();
                  $("#header").stop().css({"top":objH});
                  if(wdith < 960){
                   $("#container_main").stop().css({"padding-top":objH + $("#header").height() });
                  }else{
                   $("#container_main").stop().css({"padding-top":141 });
                  }
              //    topBannerClose();
                  //$(window).off("resize.openBanner");
             });
          }

          function topBannerClose(){
              if($(this).hasClass("nextClose")){
                  setCookie("openFlag","1",7);
              };
              $("#art1guide").slideUp(300);
              $("#header").stop().animate({"top":0},300);
                $("#container_main").css("padding-top","");
               /*$("#container_main").stop().animate({"padding-top": parseInt($("#container_main").css("padding-top"))  });  */
              $("#art1guide").find(".close, .nextClose").off("click",topBannerClose);
              $(window).off("resize.openBanner");
          }

          function topBannerStartClose(){
            $("#art1guide").slideUp(0);
            $("#header").stop().css({"top":0});
           $("#container_main").stop().css({"padding-top":""});
            $("#art1guide").find(".close, .nextClose").off("click",topBannerClose);
            $(window).off("resize.openBanner");

          }
          //var openFlag = getCookie("openFlag");
           //

      var token = '';
	  (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();

	 function signinCallback(authResult) {

  if (authResult['access_token']) {
		token = authResult['access_token'];
	// 승인 성공
    // 사용자가 승인되었으므로 로그인 버튼 숨김. 예:

    document.getElementById('signinButton').setAttribute('style', 'display: none');
    document.getElementById('logout').setAttribute('style', 'display: block');
  } else if (authResult['error']) {
    // 오류가 발생했습니다.
    // 가능한 오류 코드:
    //   "access_denied" - 사용자가 앱에 대한 액세스 거부
    //   "immediate_failed" - 사용자가 자동으로 로그인할 수 없음
    // console.log('오류 발생: ' + authResult['error']);
  }
}

	function disconnectUser() {
	//var access_token = gapi.auth.getToken().access_token;


  var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + token;

  // 비동기 GET 요청을 수행합니다.
  $.ajax({
    type: 'GET',
    url: revokeUrl,
    async: false,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(nullResponse) {alert("성공");
      // 사용자가 연결 해제되었으므로 작업을 수행합니다.
      // 응답은 항상 정의되지 않음입니다.
	  location.reload();
    },
    error: function(e) {alert("실패");
      // 오류 처리
      // console.log(e);
      // 실패한 경우 사용자가 수동으로 연결 해제하게 할 수 있습니다.
      // https://plus.google.com/apps
    }
  });
}

	</script>

	<script>
$("#butNewsletter").on("click",function(){ //뉴스레터
	var email = $("#newsletter").val();
	$.ajax({
		type:"POST",
		url:"/member/__newsletter_insert.php",
		data:{"email":email},
		dataType:"JSON",
		success: function(data) {
			//alert(data);
			if (data.cnt == 1) {
				alert("이메일이 등록 되었습니다..");
			} else if (data.cnt == 91) {
				alert("이메일 주소를 입력해 주세요.");
			} else if (data.cnt == 92) {
				alert("이메일 형식이 맞지 않습니다..");
			} else if (data.cnt == 93) {
				alert("이미 등록된 이메일 입니다.");
			}else{
				alert("데이터 변경에 실패하였습니다.");
				//location.reload();
			}

		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
})
</script>
  <!-- <span id="signinButton">
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="346767402049-vd6b74uv9kosnuu7upntd853k8tls0fl.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schemas.google.com/AddActivity"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
  </span>
  <div id="logout" style="display:none"><a href="javascript:disconnectUser();">out</a></div> -->

<!-- 공통 적용 스크립트 , 모든 페이지에 노출되도록 설치. 단 전환페이지 설정값보다 항상 하단에 위치해야함 -->
<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"> </script>
<script type="text/javascript">
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_1b6af043f80d";
if (!_nasa) var _nasa={};
wcs.inflow();
wcs_do(_nasa);
</script>

<?php echo ACTION_IFRAME; ?>
</body>
</html>
