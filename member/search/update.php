<?php
if (!defined('OKTOMATO')) exit;

$user_id = isset($_POST['email']) ? Xss::chkXSS(trim($_POST['email'])) : null;

if (!LIB_LIB::chkMail($user_id)) {
	JS::HistoryBack('유효한 이메일이 아닙니다.');
	exit;
}

$Search = new Search();
$Search->setAttr('user_id', $user_id);
$Search->setAttr('auth_state', 'N');
$Search->setAttr('del_state', 'N');

try {
	if ($Search->getMemberSearch($dbh)) {
		if (is_null($Search->attr['sns_join']) || empty($Search->attr['sns_join'])) {
			// 일반회원

			//$auth_key =  hash('sha256', mt_rand(100000, 999999));
			$auth_key =  LIB_FILE::randomGenerator();
			//$auth_key2 = date('Ymd').strtoupper(substr(md5(mt_rand()*10000000), 3, 5));
			$Search->setAttr('user_idx', $Search->attr['user_idx']);
			$Search->setAttr('auth_key', $auth_key);


			if ($isExist = $Search->getAuthIsExist($dbh)  === '0') {

				if ($Search->insert($dbh)) {
					$strContent = "
					<html lang='ko'>
						<head>
							<meta charset='utf-8'>
						</head>
						<body>
						<table cellpadding='0' cellspacing='0' style='width:100%;padding:10px 0px'>
							<tbody>
								<tr>
									<td>
										<table align='center' cellpadding='0' cellspacing='0' style='width:600px;border-collapse:separate;border-spacing:0;font-family:arial,sans-serif;table-layout:fixed;color:#333;background:#ffffff;'>
											<tr>
												<td colspan='2' style='padding:10px 10px 0px 10px'>
													<h1><img src='http://www.art1.com/images/header/logo.jpg' ></h1>
												</td>
											</tr>
											<tr>
												<td colspan='2' style='padding:0px 10px'>
													<p style='font-size:20px;font-weight:bold;padding-bottom:13px;'>비밀번호를 잊으셨나요?</p>
												</td>
											</tr>
											<tr>
												<td colspan='2' style='padding:0px 10px'>
													<p style='font-size:13px;line-height:20px;margin:10px 0px;'>
														회원님이 요청하신 패스워드 변경 링크입니다.<br/>
														<a href='http://www.art1.com/member/recover/?query=$auth_key' target='_blank'>[여기]</a>를 클릭해서 이동하거나, 아래 링크를 복사해서 주소창에 입력한 후 이동한 페이지에서 새로운 패스워드를 설정해 주세요.<br/>
														<a href='http://www.art1.com/member/recover/?query=$auth_key' target='_blank'>http://www.art1.com/member/recover/?query=$auth_key</a>
													</p>
													<p style='font-size:13px;line-height:20px;margin:10px 0px;'>패스워드를 변경하지 않길 원하시거나, 패스워드 변경 요청을 신청하지 않은 경우, 본 이메일을 무시해 주십시오.</p>
													<p style='font-size:13px;line-height:20px;margin:10px 0px;'>
														본 이메일은 회신을 허용하지 않는 발신전용 메일입니다.<br />
														다른 문의사항이 있으신 경우, 웹사이트 하단의 고객센터로 문의 주시기 바랍니다.<br />
														감사합니다.
													</p>
												</td>
											</tr>
											<tr>
												<td style='width:70%'></td>
												<td style='padding:0px 0px 10px 0px;width:30%;'>
													<p style='color:#333;font-size:15px;margin:7px 0px;'>(주)아트1 닷컴</p>
													<p style='color:#666;font-size:13px;margin:7px 0px;'>2015. art1. All Rights Reserved.</p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						</body>
					</html>";

					mailer(SITE_NAME, SITE_MAIL, $user_id, '비밀번호 안내드립니다.', $strContent, 1);
					Js::LocationHref('', PHP_SELF.'?at=complete', 'parent');
				}
				else {
					throw new Exception('오류가 발생했습니다. 관리자에게 문의하여 주세요.');
				}
			}
			else {
				JS::HistoryBack('이미 인증 이메일이 발송되어 다시 인증 이메일을 발송 할 수 없습니다.');
			}
		}
		else {
			// SNS 회원
			if ($Search->attr['sns_join'] === 'facebook') {
				Js::LocationHref('페이스북 회원으로 가입하셨습니다.\r\n페이스북으로 이동합니다.', 'https://www.facebook.com/', 'top');
			}
			else if ($Search->attr['sns_join'] === 'google') {
				Js::LocationHref('구글 회원으로 가입하셨습니다.\r\n구글로 이동합니다.', 'https://accounts.google.com/', 'top');
			}
		}
	}
	else {
		JS::HistoryBack('일치하는 정보가 없습니다.');
	}
}
catch(Exception $e) {
	echo $e->getMessage();
}

$dbh = null;
$Search = null;
unset($dbh);
unset($Search);