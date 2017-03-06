<!DOCTYPE html>
<html lang="ko" >
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" > <!-- 쿼크모드 불가, 익스/크롬최신버전 @일단 7버전에 맞추어-->
        <meta content="오케이토마토, OKTOMATO" name="title" />
        <meta content="오케이토마토, OKTOMATO" name="description" />
        <meta name="Keywords" content="오케이토마토, OKTOMATO"-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"> <!--모바일 제작시 1:1 비율 정의-->
	    <meta name="msapplication-TileColor" content="#"/><meta name="msapplication-square150x150logo" content="square.png"/><link rel="next" href="/next"/><link rel="prev" href="/prev"/> <!--윈도우8 버전 적용-->
    
		<link rel="shortcut icon" href="/oktomato/favicon.ico">
		<link rel="stylesheet" type="text/css" href="/oktomato/css/admin.css" media="all" /> 
        <!--link rel="stylesheet" type="text/css"href="/oktomato/css/media.css"  media="all"/--> 
		<script src="/oktomato/js/public_smo_scripts.js"></script>
            <!-- 호출시 changecss('.AClass', 'font-size', '30px');
            changecss ('(클래스이름)', '(속성이름)', '(적용할속성값)'); -->
             
        <!--[if lt IE 9]>
		<script type="text/javascript">
			window.onload = function() {
				changecss('.notice_alert', 'display', 'inline-block');
			}
		</script>
 
            <script src="/oktomato/js/IE9.js">IE7_PNG_SUFFIX=".png";</script> 
            <script src="/oktomato/js/html5shiv.js"></script> 
            <script src="/oktomato/js/respond.min.js"></script>
            
        <![endif]-->
    
        <!--
            1. 8이하 IE에서 CSS를 9로 호환 http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js
            2. 구버전 IE에서 HTML5 태그적용 초기화 http://html5shiv.googlecode.com/svn/trunk/html5.js
            3. 구버전 IE에서 HTML5 태그적용 호환
            4. 구버전 IE를 위하여 http://css3pie.com/에서 그라데이션 그림자 외곽선 모양참고
            익스플로러 gt(초과) gte(이상) it(미만) lte(이하) 적용
        -->
 
        
        
        
        <!-- 버전별 다른 스타일시트 적용 -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="/css/admin6.css" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="/css/admin7.css" /><![endif]-->
        <!--[if IE 8]><link rel="stylesheet" type="text/css" href="/css/admin8.css" /><![endif]-->      


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
 
	</head>
    <body>
    <div class="notice_alert">브라우저가 올바른 HTML5를 표시할 수 없습니다. 구글 크롬을 사용하시거나 브라우저를 업데이트 하세요.(익스버전 테스트용)</div>
   
 
			<header>
                <div class="logo_place left"><h4>스타일 시트 GUIDE</h4></div>
                <div class="top_nav right padding-right">
                        <a href="#basic_go" class="login-button">기본설정</a>
                        <a href="#font_go" class="login-button">폰트설정</a>
                        <a href="#margin_go" class="login-button">여백설정</a>
                        <a href="#btn_go" class="login-button">버튼설정</a>
                        <a href="#box_go" class="login-button">input 설정</a>
                        <a href="#inputbox_go" class="login-button">입력박스 설정</a>
                        <a href="#table_go" class="login-button">테이블설정</a>
                </div>
			</header>
 			<div class="space20"></div>
            
                        
                            <div class="page_width">
                            
                                    <!--기본설정.시작-->
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                      <caption>
                                        <h5 class="left">■ 기본설정(▽ 아래 몇 개는 변수로 저장해서 홈페이지 빌더처럼 관리자 컨트롤 가능하게 )</h5>
                                        <a name="basic_go"></a><br /><br /><br /><br />
                                      </caption>
                                      <thead>
                                        <tr>
                                          <td width="20%" align="center" valign="middle">구분</td>
                                          <td width="30%" align="center" valign="middle">내용</td>
                                          <td width="20%" align="center" valign="middle">구분</td>
                                          <td width="30%" align="center" valign="middle">내용</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">DOCTYPE</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font" >▷ &lt;!DOCTYPE html&gt;</span></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">메타태그</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">&lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge,chrome=1&quot; &gt; <br>        
                                            &lt;!-- 쿼크모드 불가, 익스, 크롬최신버전--&gt;<br>
                                          </span></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">기본 폰트</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ 나눔고딕, dotum, sans-serif</span></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">어드민 이미지 저장소</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ /oktomato/img/general</span></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">관리자 
                                            스타일 시트</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ link href=&quot;/oktomato/css/admin.css&quot;</span></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">스타일 리셋 <br />
                                            for Cross Browsing</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ @import url('reset.css');</span></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">Defalut BackGroundColor</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span style=" display:inline-block; width:100%; background-color:#f7f7f7; "><span class="reference_font">▷ 배경색 : #f7f7f7</span></span></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">Defalut FontColor</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ #999999</span></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF"><a href="#">하이퍼링크 
                                            색상</a></td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ #0F0F0F</span></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF"><span style="color:#ff1c00">하이퍼링크 
                                            오버 색상</span></td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ #ff1c00</span></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">페이지 드래그 Color</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span style=" display:inline-block; width:100%; background-color:#ff1c00; color:#FF0">폰트색: #FF0 & 배경색 : #ff1c</span><br /></td>
                                          <td width="20%" align="left" valign="middle" bgcolor="#FFFFFF">기본폰트 
                                            size</td>
                                          <td width="30%" align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">▷ 13px</span></td>
                                          </tr>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>
                                    <!--기본설정.끝-->                
                            </div>
                        
                        
                        
                        
                            <div class="page_width">
                                    <!--폰트설정.시작-->
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                    <caption><h5 class="left">■ 폰트설정</h5></caption>
                                    <a name="font_go"></a><br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h1>H1</h1></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 60px <br />
                                          ▷ text-align:없음</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h2> H2</h2></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 40px <br />
                                          ▷ text-align:없음</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h3> H3</h3></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 30px <br />
                                          ▷ text-align:없음</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h4> H4</h4></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 18px <br />
                                          ▷ text-align:없음</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5> H5</h5></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 16px <br />
                                          ▷ text-align:없음</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h6>H6</h6></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size : 14px <br />
                                          ▷ text-align:없음</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="navi_title"  style="background-color:#000; display:inline-block; width:100%;"><a href="#">navi_title a</a></span></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ font-size:14px<br />
                                          ▷      margin-left:18px;<br />
                                          ▷      margin-top:5px;<br />
                                          ▷ 오버시 흰색 &amp; 그림자</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
                                        <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle"><span style="background-color:#000; display:inline-block; width:100%;"><h5 class="white_font">white_font</h5></span></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ white_font 인 <br />
                                          ▷      흰색이라 배경흑백 처리</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5 class="grey_font">grey_font</h5></td>
                                        <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5 class="black_font">black_font</h5></td>
                                        <td align="left" valign="top">&nbsp;</td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5 class="red_font">red_font</h5></td>
                                        <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5 class="font_shadows_white">font_shadows_white</h5></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 그레이 폰트 그림자</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><h5 class="font_shadows_black">font_shadows_black</h5></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 검정색 폰트 그림자</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF">font_size_12px ~ <span class="font_size_20px">font_size_20px</span></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 12px부터 ~ 20px까지</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="reference_font">reference_font</span></td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 특수설명 : 돋움, 굵게, 12px</span></td>
                                      </tr>
                                      </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    <!--폰트설정.끝-->                    
            
                            </div>
                        
                        
                        
                            <div class="page_width">
                                    <!--여백설정.시작-->                        
                                    <h5 class="left">■ 여백설정</h5>
                                    <a name="margin_go"></a><br /><br />
                                    
                                    <div class="space10"></div>
                                    <h4 class="left input3">위아래 여백설정</h4><div class="width_5"></div>
                                    space1<div class="width_5"></div>space5<div class="width_5"></div>space10<div class="width_5"></div>space20<div class="width_5"></div>space30<div class="width_5"></div>space40<div class="width_5"></div>space50까지
                                    <span class="reference_font">▷ width:100%; height:높이는 숫자만큼px; clear:both</span>
                                    <div class="space10"></div>
                                    
                                    <h4 class="left input3">좌우폭 설정</h4><div class="width_5"></div>
                                    pec_10<div class="width_5"></div> 
                                    ~ 
                                    <div class="width_5"></div>pec_100까지
                                    <span class="reference_font">▷ width:퍼센트는 10단위 숫자만큼%;</span>
                                    <div class="space10"></div>


                                    <h4 class="left input3">고정 높이 설정</h4><div class="width_5"></div>
                                    pec_h_10<div class="width_5"></div> 
                                    ~ 
                                    <div class="width_5"></div>pec_h_100까지
                                    <span class="reference_font">▷ width:10px 숫자만큼 증ㄱㅁ감;</span>
                                    <div class="space10"></div>
                                    
                                    
                                    <h4 class="left input3"><a name="margin_go"></a>좌우여백 설정</h4><div class="width_5"></div>
                                    width_5<div class="width_5"></div>
                                    width_10 ~
                                    <div class="width_5"></div>width_100까지
                                    <span class="reference_font">▷ 원하는 좌우측에 넣어서 간격주기 width:40px; height:1px; display:inline-block;</span>
                                    <div class="space10"></div>
                                    
                                    
                                    <h4 class="left input3"><a name="margin_go"></a>전체가로 라인 설정</h4>
                                    <div class="space5"></div>
                                    line_style1<div class="width_10"></div>
                                    <span class="reference_font">▷ 높이 1px 가로 100% 위마진(10px) 아래마진(20px) background-color:#CCC</span>
                                    <div class="line_style1"></div>
                                    
                                    
                                    <div class="space1"></div>
                                    line_style2<div class="width_10"></div>
                                    <span class="reference_font">▷ 높이 2px 가로 100% </span><span class="reference_font">위마진(10px) 아래마진(20px) background-color:#CCC</span>
                                    <div class="line_style2"></div>
                                    
                                    
                                    <div class="space1"></div>
                                    line_style2_1<div class="width_10"></div>
                                    <span class="reference_font">▷ 높이 2px 가로 20% </span><span class="reference_font">위마진(10px) 아래마진(20px) background-color:#CCC</span>
                                    <div class="line_style2_1"></div>
                                    <div class="space20"></div>
                                    
                                    <div class="space1"></div>
                                    line_style2 > line_style2_1<div class="width_10"></div><span class="reference_font">▷ line_style2안에 line_style2_1 사용시</span>
                                    <div class="line_style2">
                                        <div class="line_style2_1"></div>
                                    </div>
                                    
                                    <div class="space1"></div>
                                    HR태그
                                    <hr/>
                                    <div class="space1"></div>


									<h4 class="left input3">왼쪽정렬 left</h4><div class="width_5"></div>
                                    <span class="reference_font">▷ float:left;</span>
                                    <div class="space1"></div>
                                    <hr/>

									<h4 class="right input3">오른쪽정렬 left</h4><div class="width_5"></div>
                                    <span class="reference_font right">▷ float:right;</span>
                                    <div class="space1"></div>
                                    <hr/>
                                    
									<h4 class="center_align input3">가운데정렬 center</h4><div class="width_5"></div>
                                    <span class="reference_font center_align">▷ float:center;</span>
                                    <div class="space1"></div>
                                    <hr/>
                                    
                                    
                                    <div class="left padding-separator" style="border:1px solid #CCCCCC">padding-separator</div><div class="width_5"></div>
                                    <span class="reference_font">▷ 내부 위아래 여백 { padding-top:25px; padding-bottom:22px; }</span>
                                    <div class="space1"></div>
                                    <hr/>
                                    


                                    <div  class="left margin-separator" style="border:1px solid #CCCCCC">margin-separator</div><div class="width_5"></div>
                                    <span class="reference_font">▷ 외부 위아래 여백 { margin-top:12px; margin-bottom:12px; }</span>
                                    <div class="space1"></div>
                                    <hr/>


                                    <div  class="left padding-left" style="border:1px solid #CCCCCC">padding-left</div><div class="width_5"></div>
                                    <span class="reference_font">▷ 내/외부 왼쪽 여백{ padding-left:10px; margin-left:10px; }</span>
                                    <div class="space1"></div>
                                    <hr/>
                                     
                                    <div  class="left padding-right" style="border:1px solid #CCCCCC">padding-right</div><div class="width_5"></div>
                                    <span class="reference_font">▷ 내/외부 우측 여백{ padding-right:10px; margin-right:10px; }</span>
                                    <div class="space1"></div>
                                    <hr/>
                                    <!--여백설정.끝-->
                            </div>
                        
                        
                        
                        
                            <div class="page_width">
                                    <!--버튼설정.시작-->
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                    <caption>
                                    <h5 class="left">■ 버튼설정</h5></caption>
                                    <a name="btn_go"></a></a><br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="input3">input3</span><br />
                                          <br />
                                          클래스명 : input3</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 위,아래 padding : 2px;<br />
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 높이 : 25px;<br />
                                          ▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 14px<br />
                                          ▷ 검정색 폰트<br />
                                          ▷ 배경색 #f5f5f5<br>
                                          ※ 링크되지 않아도 마우스 커서 활성화</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="login-button">login-button</a><br />
                                          <br />
                                          클래스명 : login-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 가로 116px <br />
                                          ▷ 높이 : 42px;<br />
                                          ▷ 폰트 사이즈 16px<br />
                                          ▷ 텍스트 그림자 효과<br />
                                          ▷ 배경색 이미지 활용</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="login-button_left">button</a><br />
                                          클래스명 : login-button_left </td>
                                        <td align="left" valign="top"><span class="reference_font">                                          ▷ 가로 115px <br />
                                          ▷ 높이 : 43px;<br />
                                          ▷ 폰트 사이즈 16px<br />
                                          ▷ 텍스트 그림자 효과<br />
                                          ▷ 배경색 이미지 활용</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="login-button_right">button</a><br />
                                          클래스명 : login-button_right </td>
                                        <td align="left" valign="top"><span class="reference_font">                                          ▷ 가로 115px <br />
                                          ▷ 높이 : 43px;<br />
                                          ▷ 폰트 사이즈 16px<br />
                                          ▷ 텍스트 그림자 효과<br />
                                          ▷ 배경색 이미지 활용</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_red">button_normal_red</a><br />
                                          <br />
                                          클래스명 : button_normal_red</td>
                                        <td align="left" valign="top"><span class="reference_font">                                          ▷ 가로 100% <br />
                                          ▷ 높이 : 42px;<br />
                                          ▷ 폰트 사이즈 13px<br />
                                          ▷ 텍스트 그림자 효과<br />
                                          ▷ 배경색 이미지 활용</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_gray">button_normal_gray</a><br />
                                          <br />
                                          클래스명 : button_normal_gray</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 좌측과 동일</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_red_to_black">button_normal_red_to_black</a><br />
                                          <br />
                                          클래스명 : button_normal_red_to_black</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_gray_black">button_normal_gray_black</a><br />
                                          <br />
                                          클래스명 : button_normal_gray_black</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_red_to_white">button_normal_red_to_white</a><br />
                                          <br />
                                          클래스명 : button_normal_red_to_white</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_gray_red">button_normal_gray_red</a><br />
                                          <br />
                                          클래스명 : button_normal_gray_red</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_white">button_normal_white</a><br />
                                          <br />
                                          클래스명 : button_normal_white</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_black">button_normal_black</a><br />
                                          <br />
                                          클래스명 : button_normal_black</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_white_to_red">button_normal_white_to_red</a><br />
                                          <br />
                                          클래스명 : button_normal_white_to_red</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_black_gray">button_normal_black_gray</a><br />
                                          <br />
                                          클래스명 : button_normal_black_gray</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_white_to_gray">button_normal_white_to_gray</a><br />
                                          <br />
                                          클래스명 : button_normal_white_to_gray</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="button_normal_black_red">button_normal_black_red</a><br />
                                          <br />
                                          클래스명 : button_normal_black_red</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="green-button">green-button</a><br />
                                          <br />
                                        클래스명 : green-button</td>
                                        <td align="left" valign="top"><span class="reference_font">                                        ▷ 가로 212px <br />
                                        ▷ 높이 : 45px;<br />
                                        ▷ 폰트 사이즈 14px<br />
                                        ▷ 텍스트 그림자 효과<br />
                                        ▷ 배경 이미지 활용</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="greendark-button">greendark-button</a><br />
                                          <br />
                                          클래스명 : greendark-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="greenwhite-button">greenwhite-button</a><br />
                                          <br />
                                          클래스명 : greenwhite-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="blue-button">blue-button</a><br />
                                          <br />
                                          클래스명 : blue-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="skyblue-button">skyblue-button</a><br />
                                          <br />
                                          클래스명 : skyblue-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="red-button">red-button</a><br />
                                          <br />
                                          클래스명 : red-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="yellow-button">yellow-button</a><br />
                                          <br />
                                          클래스명 : yellow-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="greyblue-button">greyblue-button</a><br />
                                          <br />
                                          클래스명 : greyblue-button</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_black">btn_small_black</a>
                                          <br>
                                          <br>
                                          클래스명 : btn_small_black</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 가로 112px <br />
                                          ▷ 높이 : 45px;<br />
                                          ▷ 폰트 사이즈 12px<br />
                                          ▷ 텍스트 그림자 효과<br />
                                          ▷ 배경 이미지 활용</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_darkblue">btn_small_darkblue</a> <br>
                                          <br>
                                        클래스명 : btn_small_darkblue</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_kaki">btn_small_kaki</a> <br>
                                          <br>
                                          클래스명 : btn_small_kaki</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_orange">btn_small_orange</a> <br>
                                          <br>
                                          클래스명 : btn_small_orange</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_pink">btn_small_pink</a> <br>
                                          <br>
                                          클래스명 : btn_small_pink</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_purple">btn_small_purple</a> <br>
                                          <br>
                                          클래스명 : btn_small_purple</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_red">btn_small_red</a> <br>
                                          <br>
                                          클래스명 : btn_small_red</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><a href="#" class="btn_small_grey">btn_small_grey</a> <br>
                                          <br>
                                          클래스명 : btn_small_grey</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 상동</span></td>
                                      </tr>
                                      </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    <!--버튼설정.끝-->
              </div>
                        
                        
                        
                            <div class="page_width">
                                    <!--박스설정.시작-->
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                    <caption>
                                    <h5 class="left">■ 기본 버튼설정</h5></caption>
                                    <a name="box_go"></a><br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="input">input</span> <br>
                                          <br>
                                          클래스명 : input</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 위,아래 padding : 2px;<br />
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 높이 : 25px;<br />
                                          ▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 14px<br />
                                          ▷ 검정색 폰트</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="input2">input2</span> <br>
                                          <br>
                                          클래스명 : input2</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ 인풋박스 <br />
                                          ▷ 위,아래 padding : 2px;<br />
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 높이 : 25px;<br />
                                          ▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 14px<br />
                                          ▷ 검정색 폰트<br />
                                          ▷ 배경색 #f5f5f5</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="bnt_style">bnt_style</span>
                                        <br>
                                        <br>
										클래스명 : btn_style </td>
                                        <td align="left" valign="top">
                                          <p><span class="reference_font">▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 좌우측 내부여백 padding : 10px;<br />                                          
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 12px<br />
                                        ▷ 배경 이미지 처리</span></p></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="list_style"><<</span><span class="list_style "><</span><span class="list_style">100</span><span class="list_style">>></span><span class="list_style">>></span> <br>
                                          <br>
                                          클래스명 : list_style</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ display:inline-block; <br>
                                          ▷                                        text-align:center;<br>
                                          ▷ 가로너비 : 30px;<br />
                                          ▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 좌우측 내부여백 padding : 10px;<br />
                                            ▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 : 23px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px<br />
                                            ▷ 배경 이미지 처리</span></p></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="list_style"><<</span><span class="list_style"><</span><span class="list_style">100</span><span class="list_style">>></span><span class="list_style">>></span><br>
                                          <br>
                                          클래스명 : list_style2</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ display:inline-block; <br>
                                          ▷                                        text-align:center;<br>
                                          ▷ 가로너비 : 30px;<br />
                                          ▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 좌우측 내부여백 padding : 10px;<br />
                                            ▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 : 23px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px<br />
                                            ▷ 배경 이미지 처리</span></p></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="list_style3">222</span> <br>
                                          <br>
                                          클래스명 : list_style3</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ display:inline-block; <br>
                                          ▷                                        text-align:center;<br>
                                          ▷ 가로너비 : 50px;<br />
                                          ▷ display:inline-block; <br>
                                          ▷                                        text-align:center;<br>
                                          ▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 좌우측 내부여백 padding : 10px;<br />
                                            ▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 : 23px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px<br />
                                            ▷ 배경 이미지 처리</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="bbs_list_style"><<</span><span class="bbs_list_style "><</span><span class="bbs_list_style">100</span><span class="bbs_list_style">>></span><span class="bbs_list_style">>></span> <br>
                                          <br>
                                          클래스명 : bbs_list_style</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ display:inline-block; <br>
                                          ▷                                        text-align:center;<br>
                                          ▷ 가로너비 : 30px;<br />
                                          ▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 좌우측 내부여백 padding : 10px;<br />
                                            ▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 : 30px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px<br />
                                            ▷ 배경 이미지 처리</span></p></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="label">label</span> <br>
                                          <br>
                                          클래스명 : label</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ float:left; <br>
                                          ▷                                        text-align:left;<br>
                                          ▷ 좌우측 외부여백  : 8px;<br />
                                          </span><span class="reference_font">▷ 위,아래 내부 여백 : 6px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px</span></td>
                                      </tr>
                                      </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    <!--박스설정.끝-->
                            </div>
                        



                        
                            <div class="page_width">
                                    <!--입력박스설정.시작-->
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                    <caption>
                                    <h5 class="left">■ Form Input type설정</h5></caption>
                                    <a name="inputbox_go"></a><br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">Class Name</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">comment</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
                                        <td width="25%" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" class="text_area_style" />
                                          <br>
                                          <br>
                                        클래스명 : text_area_style</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ input type=&quot;text&quot;<br />
                                          ▷ 가로사이즈 : 없음.<br />
                                          ▷ 위,아래 padding : 2px;<br />
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 최소 높이 : 30px;<br />
                                          ▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 13px</span></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" class="text_area_style_40 pec_h_100" />
                                          <br>
                                          <br>
                                          클래스명 : text_area_style_40<br>
                                          클래스명 : pec_h_100</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ input type=&quot;text&quot;<br />
                                          ▷ 가로사이즈 : 40% (10단위로 올감)<br>
                                          ▷ 위,아래 padding : 2px;<br />
                                          ▷ 위,아래 margin : 5px;<br />
                                          ▷ 최소 높이 : 30px;<br />
▷ 테두리 선  border:1px solid #ccc<br />
                                          ▷ 폰트 사이즈 13px</span></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"> <input type="text" class="text_area_style_100" />
                                          <br>
                                          <br>
                                        클래스명 : text_area_style_100</td>
                                        <td align="left" valign="top"><span class="reference_font">▷ input type=&quot;text&quot;<br />
                                          ▷ 가로사이즈 : 100%<br>
▷ 위,아래 padding : 2px;<br />
▷ 위,아래 margin : 5px;<br />
▷ 최소 높이 : 30px;<br />
▷ 테두리 선  border:1px solid #ccc<br />
▷ 폰트 사이즈 13px</span></td>
                                        <td align="left" valign="middle">※ 기본 인풋 TEXT 글래스 text_area_style에 <br>
                                        가로 비율 pec_10 ~ pec_100 클래스를 <br>
                                        혼용해서도 사용가능함.</td>
                                        <td align="left" valign="middle">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><form name="form1" method="post" action="">
                                          <label>
                                            <input type="checkbox" name="checkbox_test" value="체크" id="check_test_0" class="chk_style">
                                            체크1</label>
                                          <label>
                                            <input type="checkbox" name="checkbox_test" value="체크" id="check_test_1" class="chk_style">
                                            체크2</label>
                                          <label>
                                            <input type="checkbox" name="checkbox_test" value="체크" id="check_test_2" class="chk_style">
                                            체크3</label>
                                          <label>
                                            <input type="checkbox" name="checkbox_test" value="체크" id="check_test_3" class="chk_style">
                                            체크4</label>
                                        </form>
                                          <br>
                                          <br>
                                          클래스명 : chk_style</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 16px</span></p></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><form name="form1" method="post" action="">
                                          <label>
                                            <input type="radio" name="radio_test" value="라디오" id="radio_test_0" class="radio_style">
                                            라디오1</label>
                                          <label>
                                            <input type="radio" name="radio_test" value="라디오" id="radio_test_1" class="radio_style">
                                            라디오2</label>
                                          <label>
                                            <input type="radio" name="radio_test" value="라디오" id="radio_test_2" class="radio_style">
                                            라디오3</label>
                                          <label>
                                            <input type="radio" name="radio_test" value="라디오" id="radio_test_3" class="radio_style">
                                            라디오4</label>
                                        </form>
                                          <br>
                                          <br>
                                          클래스명 : radio_style</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 16px</span></p></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><select name="select_test" class="select_style">
                                        </select>
                                          <br>
                                          <br>
                                          클래스명 : select_style</td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ 전체 padding : 2px;<br />
                                          </span><span class="reference_font">▷ 위,아래 margin : 5px;<br />
                                            ▷ 폰트11px<br>
                                            ▷ 높이 23px</span><br>
                                          <span class="reference_font">▷ 테두리 : border:1px solid #ccc </span></p></td>
                                        <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="file_test" type="file" class="file_style">
                                          <br>
                                          <br>
                                          클래스명 : file_style </td>
                                        <td align="left" valign="top"><p><span class="reference_font">▷ 전체 padding : 1px;<br />
                                          </span><span class="reference_font">▷ 위,아래 margin : 5px;<br />
                                            ▷ 높이 : 26px;<br />
                                            ▷ 테두리 선  border:1px solid #ccc<br />
                                            ▷ 폰트 사이즈 11px</span></p></td>
                                      </tr>
                                      </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    <!-- 입력박스.끝-->
              </div>
                        



                                                
                            <div class="page_width">
                                    <!--테이블설정.시작--><a name="table_go"></a>
                              <table width="100%" align="center"  class="table_normal" summary="">
                                    <caption>
                                    <h5 class="left">■ 테이블설정 : table_normal</h5>
                                    </caption>
                                    <br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%">Class Name</td>
                                        <td width="25%">comment</td>
                                        <td width="25%">Class Name</td>
                                        <td width="25%">comment</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>                                          클래스명 : table_normal</td>
                                        <td><span class="reference_font">▷ table_normal : 기본 테이블 형태<br>
▷ caption : H5태그<br>
▷ thead : 중앙정렬 / 배경색 그레이<br />
▷ tbody : 중앙정렬 / 색없음. <br>
▷ tfoot : 배경색 그레이<br>
▷ 폰트사이즈 : 12px<br>
▷ 수직정렬 : 가운데<br>
▷ 전체 폭 설정 없음</span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="middle">&nbsp;</td>
                                        <td align="left" valign="top">&nbsp;</td>
                                        <td align="left" valign="middle">&nbsp;</td>
                                        <td align="left" valign="top">&nbsp;</td>
                                      </tr>
                                </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    <!--테이블설정.끝-->



                                    <table width="100%" align="center"  class="table_dummy" summary="">
                                    <caption>
                                    <h5 class="left">■ 테이블설정 : table_dummy</h5>
                                    </caption>
                                    <br /><br />
                                    <thead>
                                      <tr>
                                        <td width="25%">Class Name</td>
                                        <td width="25%">comment</td>
                                        <td width="25%">Class Name</td>
                                        <td width="25%">comment</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>클래스명 : table_dummy</td>
                                        <td bgcolor="#CCCCCC"><span class="reference_font">▷ table_dummy : 더미 테이블<br>
                                          ▷ 레이아웃설정을 위한 빈 테이블<br>
▷ 기본정렬 : 수직.위 / 수평.정렬없음.<br>
▷ 전체 폭 설정 없음                                        </span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      </tbody>  
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                    
                                    
                                    
                                    <table width="100%" align="center"  class="table_guide" summary="">
                                      <caption>
                                        <h5 class="left">■ 테이블설정 : table_guide</h5>
                                      </caption>
                                      <br />
                                      <br />
                                      <thead>
                                        <tr>
                                          <td width="25%">Class Name</td>
                                          <td width="25%">comment</td>
                                          <td width="25%">Class Name</td>
                                          <td width="25%">comment</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td> 클래스명 : table_guide</td>
                                          <td><span class="reference_font">▷ table_guide : 기본 테이블 형태<br>
                                            ▷ caption : H5태그<br>
                                            ▷ thead : 중앙정렬 / 배경색 그레이<br />
                                            ▷ tbody : 왼쪽정렬 / 색없음. <br>
                                            ▷ tfoot : 배경색 그레이<br>
                                            ▷ 폰트사이즈 : 13px<br>
                                            ▷ 수직정렬 : 가운데<br>
                                            ▷ 전체 폭 설정 없음</span></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>
                                    
                                    
                                    <table width="100%" align="center"  class="table_style_05" summary="">
                                      <caption>
                                        <h5 class="left">■ 테이블설정 : table01 / table_style_05 은 지워야겠음.</h5>
                                        
                                      </caption>
                                      <br />
                                      <br />
                                      <thead>
                                        <tr>
                                          <td width="25%">Class Name</td>
                                          <td width="25%">comment</td>
                                          <td width="25%">Class Name</td>
                                          <td width="25%">comment</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td> 클래스명 : table01</td>
                                          <td><span class="reference_font">▷ table01 : 기본 테이블 형태<br>
                                            ▷ caption : H5태그<br>
                                            ▷ thead : 중앙정렬 / 배경색 그레이<br />
                                            ▷ tbody : 왼쪽정렬 / 색없음. <br>
                                            ▷ tfoot : 배경색 그레이<br>
                                            ▷ 폰트사이즈 : 13px<br>
                                            ▷ 수직정렬 : 가운데<br>
                                            ▷ 전체 폭 설정 없음</span></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                    </table>
                                    <!--테이블설정.끝-->


              </div>