  //페이스북 로그인 연동 
  //2014-12-31 by 이용태
  

/////////////////////////
// facebook login Start

   // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      
	  //document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      
	  //document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function facebookLogin(val){
//		FB.logout();
		FB.login(function(response) {
	   if (response.authResponse) {
			 console.log('Welcome!  Fetching your information.... ');
			 FB.api('/me', function(response) {
				console.log('Good to see you, ' + response.name + ' :::' + response.email);
				//alert( response.email);
				
				if(val == 'join'){ //회원가입을 한다.
					ajaxSnsMemberJoin(response.email, 'facebook', response.id);
				}
				if(val == 'login'){ //로그인처리
					ajaxSnsMemberLogin(response.email, 'facebook',response.id);
				}
				
			 });
	   } else {
		 console.log('User cancelled login or did not fully authorize.');
	   }
	 },{scope: 'public_profile,email'});
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '763051133779822',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

 
  FB.logout(function(response) {
  // user is now logged out
	});

  };

  // Load the SDK asynchronously
  /*
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  */
  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      //console.log('Successful login for: ' + response.name);
	  console.log('Successful login for: ' + response.email);
      //document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.email + '!';
    });
  }
/*
function logout_f(){
	 FB.logout();
}
*/
// facebook login  End
////////////////////////////


function ajaxSnsMemberJoin(email, sns, id) {

	$.ajax({
		type:"POST",
		url:"/member/join/__sns_join.php",
		//url:"?at=__delete",
		dataType:"JSON",
		data:{"email":email,"sns":sns,"id":id},
		success: function(data) {
			//alert('data : ' + data);
			if (data.cnt > 0) {
				if(data.cnt == 91){
					alert('이미 등록된 아이디 입니다. 로그인 후 이용해 주세요.');
					return;
				}
				if(data.cnt == 92){
					alert('회원 아이디에 값이 없습니다. 관리자에 문의하세요.');
					return;
				}
				if(data.cnt == 93){
					alert('유효한 이메일이 아닙니다. 관리자에 문의하세요.');
					return;
				}
				if(data.cnt == 99){
					alert('입력 중 오류가 발생하였습니다.');
					return;
				}
				alert("회원가입이 되었습니다. 로그인 후 이용해 주세요.");
				location.href="/member/login.php";
				//location.reload();
			}
			else{

			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}


function ajaxSnsMemberLogin(email, sns, id){
	//alert(" email : "+email);
	$.ajax({
		type:"POST",
		url:"/member/__sns_login_check.php",
		//url:"?at=__delete",
		dataType:"JSON",
		data:{"email":email,"sns":sns,"id":id},
		success: function(data) {
			//alert('data : ' + data);
			if (data.cnt > 0) {
				if(data.cnt == 92){
					alert('회원 아이디에 값이 없습니다. 관리자에 문의하세요.');
					return;
				}
				if(data.cnt == 94){
					alert("회원님은 "+ sns +"를 통해 회원가입이 되어 있지 않습니다. 회원가입 후 이용해 주세요. ");
					return;
				}
				if(data.cnt == 99){
					alert('로그인 중 오류가 발생하였습니다.');
					return;
				}
				alert("환영합니다. ");
				//location.href="/member/login.php";
				//alert(location.href);
				selfPageUrl = location.href
				selfPage = selfPageUrl.split("/");
				selfPage = selfPage.pop();
				//alert(selfPage);
				
				if (selfPage == "login.php"){
					location.href="/";
				}else{
					location.reload();
				}
				//location.href="/member/login.php";
				//location.reload();
			}
			else{

			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});
}
  