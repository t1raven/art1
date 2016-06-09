<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/galleries/init.class'.SOURCE_EXT;
require ROOT.'lib/class/galleries/artworks.class'.SOURCE_EXT;
require ROOT.'lib/class/partner/contact.class'.SOURCE_EXT;
require ROOT.'lib/function/email/mail.func'.SOURCE_EXT;

$idx = isset($_POST['idx']) ? (int)LIB_LIB::CkSearch($_POST['idx']) : null;
$widx = isset($_POST['widx']) ? (int)LIB_LIB::CkSearch($_POST['widx']) : null;
$email = isset($_POST['email']) ? LIB_LIB::CkSearch($_POST['email']) : null;
$name = isset($_POST['name']) ? LIB_LIB::CkSearch($_POST['name']) : null;
$phone = isset($_POST['phone']) ? LIB_LIB::CkSearch($_POST['phone']) : null;
$msg = isset($_POST['msg']) ? LIB_LIB::CkSearch($_POST['msg']) : null;
$cnt = 0;

if (empty($_SESSION['user_idx']) || empty($_SESSION['user_id']) || $_SESSION['logged_in'] !== 1 || empty($_SESSION['user_ip'])) {
	echo '{"cnt":"'.$cnt.'"}';
	exit;
}

if (!LIB_LIB::chkMail($email)) {
	//echo "chk1";
	echo '{"cnt":"'.$cnt.'"}';
	exit;
}

if (empty($idx) || $idx === 1 || empty($widx)) {
	//echo "chk2";
	echo '{"cnt":"'.$cnt.'"}';
	exit;
}
else if (!empty($idx) && is_numeric($idx) && !empty($widx) && is_numeric($widx)) {
	$artworks = new Artworks();
	$artworks->setAttr('idx', $idx);
	$artworks->setAttr('widx', $widx);

	if ($artworks->getRead($dbh)) {
		$artworksList = $artworks->getArtworksList($dbh);
		$artworksImg = $PUBLIC['HOME'].galleriesArtworksUploadPath.$artworksList[0]['upfileName'];
		$depth = (!empty($artworks->attr['depth'])) ? ' x '.$artworks->attr['depth'] : null;
		$init = new Init();
		$init->setAttr('idx', $idx);
		$gallery = $init->getGalleryInfo($dbh);
		$init = null;
		unset($init);
		$galleryEmail = $gallery['email'];
	}
	//echo "galleryEmail:$galleryEmail";
	$name = (!empty($name)) ? $name : '미입력';
	$phone = (!empty($phone)) ? $phone : '미입력';

	$contact = new Contact();
	$contact->setAttr('galleryIdx',$idx);
	$contact->setAttr('userIdx', AES256::dec($_SESSION['user_idx'], AES_KEY));
	$contact->setAttr('senderName', $name);
	$contact->setAttr('senderEmail', $email);
	$contact->setAttr('senderPhone', $phone);
	$contact->setAttr('msg', $msg);
	$contact->setAttr('receiverName', $gallery['galleryNameKr']);
	$contact->setAttr('artistIdx', $artworks->attr['artistIdx']);
	$contact->setAttr('artistName', $artworks->attr['artistName']);
	$contact->setAttr('worksIdx', $artworks->attr['worksIdx']);
	$contact->setAttr('worksName', $artworks->attr['worksName']);
	$contact->setAttr('makingDate', $artworks->attr['makingDate']);

	try {
		//echo "chk3";
		if ($contact->insert($dbh)) {
			$strContent = "
				<!DOCTYPE html>
				<html>
				<head>
				<meta charset='utf-8'>
				</head>
				<body>
					<table cellpadding='0' cellspacing='0' style='border-collapse:separate;border-spacing:0;width:100%;background:#fff;padding:0px 0px;'>
						<tbody>
							<tr>
								<td>
									<table align='center' cellpadding='0' cellspacing='0' style='width:722px;border-collapse:separate;border-spacing:0;background:#ffffff;margin:0px auto;padding:0;'>
										<tr>
											<td style='padding:33px 38px 120px 38px;margin:0;width:100%;border:1px solid #D8D8D8'>
												<table align='center' cellpadding='0' cellspacing='0' style='width:100%; border-collapse:separate;border-spacing:0;background:#ffffff;margin:0px auto;'>
													<tbody>
														<tr>
															<td style='padding:0px 0px 14px 0;margin:0;width:100%;text-align: right;border-bottom:3px solid #333333;'>
																<img src='http://art1.com/images/galleries/newsletter_logo_gray.gif'  align='absmiddle' border='0'>
															</td>
														</tr>
														<tr>
															<td style='padding:55px 0px 40px 0;margin:0;width:100%;text-align: center'>
																<p style='padding:0;font-size:15px;color:#666666;line-height:25px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0 0 0px'>
																	갤러리즈를 통해 ".$name."님으로 부터 문의메세지가 도착했습니다.<br />고객의 문의내용에 가능하면 즉시 회답을 권장합니다.
																</p>
															</td>
														</tr>
														<tr>
															<td style='padding:19px 10px 19px 10px;margin:0;width:100%;text-align: center;border-top:1px solid #DBDBDB;border-bottom:1px solid #DBDBDB;'>
																<table align='center' cellpadding='0' cellspacing='0' style='width:100%; border-collapse:separate;border-spacing:0;background:#ffffff;margin:0px auto;'>
																	<tbody>
																		<tr>
																			<td style='padding:0 0 0 0;width:200px;border:1px solid #D4D4D4;height:200px;background-color:#F8F8F8;margin:0 0 0 0;overflow:hidden;'>
																				<img style='width:100%;' src='".$artworksImg."' alt='' />
																			</td>
																			<td style='padding:0 0 0 0;width:45px;margin:0 0 0 0;'></td>
																			<td style='padding:30px 0 0 0;margin:0 0 0 0;text-align: left;vertical-align: top'>

																				<p style='padding:0;font-size:18px;color:#333333;font-weight:bold;line-height:24px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0 0 20px 0'>".$artworks->attr['artistNameEn']."</p>
																				<p style='padding:0;font-size:15px;color:#333333;font-weight:bold;line-height:24px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0 0 0 0'>".$artworks->attr['worksNameEn'].", ".$artworks->attr['makingDate']."</p>
																				<p style='padding:0;font-size:12px;color:#666666;line-height:24px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,'gulim',\'굴림\',sans-serif;margin:0 0 0 0'>". $artworks->attr['material']." <br />".$artworks->attr['height']." x ".$artworks->attr['width'].$depth." cm</p>

																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
														<tr>
															<td style='padding:25px 5px 5px 5px;margin:0;width:100%;text-align: center;text-align: left'>
																<p style='font-size:18px;font-weight:700;color:#333;line-height:30px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0;padding:0;'>
																	고객정보
																</p>
															</td>
														</tr>
														<tr>
															<td style='padding:10px 5px 10px 5px;margin:0;width:100%;text-align: center;text-align: left'>
																<p style='font-size:15px;color:#666;line-height:30px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0;padding:0;'>
																	E-mail : <a style='color:#666;font-size:15px;' href='mailto:art1@art1.com'>".$email."</a>
																</p>
																<p style='font-size:15px;color:#666;line-height:30px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0;padding:0;'>
																	Name : ".$name."
																</p>
																<p style='font-size:15px;color:#666;line-height:30px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0;padding:0;'>
																	Phone : <a style='color:#666;font-size:15px;' href='tel:".$phone."'>".$phone."</a>
																</p>
																<p style='font-size:15px;color:#666;line-height:30px;font-family:arial,\'맑은 고딕\', \'Malgun Gothic\', \'돋움\', dotum,\'gulim\',\'굴림\',sans-serif;margin:0;padding:0;'>
																	Message : ".nl2br($msg)."
																</p>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					</body>
				</html>";


				//echo $strContent;

			mailer($name, $email, $galleryEmail, 'Contact Gallery 메일입니다.', $strContent, 1);
			//mailer($name, $email, 'ycpark@oktomato.net', 'Contact Gallery 메일입니다.', $strContent, 1);
			//mailer(SITE_NAME, $email, 'ycpark@oktomato.net', 'Direct Price Request 입니다.', $strContent, 1);
			//Js::LocationHref('', PHP_SELF.'?at=complete', 'parent');
			$cnt = 1;
		}
	}
	catch(Exception $e) {
		//echo "chk4";
		//echo $e->getMessage();
		//echo '{"cnt":"'.$cnt.'"}';
		//$cnt = 0;

	}
}

$dbh = null;
$contact = null;
$artworks = null;
unset($dbh);
unset($contact);
unset($artworks);
?>
{"cnt":<?php echo $cnt; ?>}