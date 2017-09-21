<?php
if (!defined('OKTOMATO')) exit;

$email = isset($_POST['email']) ? Xss::chkXSS($_POST['email']) : null;
$isNewsLetter = isset($_POST['isNewsLetter']) ? Xss::chkXSS($_POST['isNewsLetter']) : null;
$title = isset($_POST['title']) ? Xss::chkXSS($_POST['title']) : null;
$content = isset($_POST['content']) ? Xss::chkXSS($_POST['content']) : null;
$file_list = isset($_POST['file_list']) ? Xss::chkXSS($_POST['file_list']) : null;


// 유효성 검사
if ($isNewsLetter !== 'Y') {
	if (empty($email)) {
		JS::LocationReload('받는 사람의 이메일을 입력하세요.', '', 'parent');
		setFree();
		exit();
	}
}

if (empty($title)) {
	JS::LocationReload('제목을 입력하세요', '', 'parent');
	setFree();
	exit();
}

if (empty($content)) {
	JS::LocationReload('내용을 입력하세요', '', 'parent');
	setFree();
	exit();
}
else {
	$tmpContent = str_replace(tempUploadPath, HOME.emailUploadPath, $content);

	//preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $match); // 일치하는것 모두 검색
	//print_r($match);
	//echo $tmpContent;
	//exit();

	$content ='<html><head><meta charset="utf-8"></head><body>'.$tmpContent.'</body></html>';


	$sendmail = new Sendmail();
	$sendmail->setAttr('email', $email);
	$sendmail->setAttr('title', $title);
	$sendmail->setAttr('content', $content);
	$sendmail->setAttr('file_list', $file_list);

	//

	try {
		if ($sendmail->insert($dbh)) {
			$successCnt = 0;
			$failCnt = 0;
			$emailIdx = $sendmail->attr['emailIdx'];

			if ($isNewsLetter === 'Y') {
				$aEmail = $sendmail->getNewsLetterList($dbh);
				//$aEmail = array();
				//echo "chk1";
			}
			else {
				$aEmail = array();
				//echo "chk2";
			}

			if (!empty($email)) {
				$tmpEmail = explode(',', $email);
				foreach($tmpEmail as $val) {
					array_push($aEmail, array('toEmail'=>trim($val)));
				}
			}

			//print_r($aEmail);

			foreach($aEmail as $val) {
				$token = $val['token'];
				$toEmail = trim($val['toEmail']);

				if (LIB_LIB::chkMail($toEmail)) {
					$key1 = base64_encode(AES256::enc($emailIdx, AES_KEY));
					$key2 = base64_encode(AES256::enc($toEmail, AES_KEY));
					$token = base64_encode(AES256::enc($token, AES_KEY));
					$tmpContent = str_replace('{EMAIL_REJECT_URL}', HOME.'/reject.php?token='.$token.'&email='.$key2, $content);
					$content2 ='<html><head><meta charset="utf-8"></head><body>'.$tmpContent.'<img src="'.HOME.'/chkmail.php?key1='.$key1.'&key2='.$key2.'" width="1" height="1" style="display:none"></body></html>';

					 if (mailer(SITE_NAME, SITE_MAIL, $toEmail, $title, $content2, 1)) {
						$successCnt += 1;
						$isSuccess = 1;
					 }
					 else {
						$failCnt += 1;
						$isSuccess = 0;
					 }

					$sendmail->setAttr('emailIdx', $emailIdx);
					$sendmail->setAttr('toEmail', $toEmail);
					$sendmail->setAttr('isSuccess', $isSuccess);
					$sendmail->insertLog($dbh);
				}
			}

			$sendmail->setAttr('successCnt', $successCnt);
			$sendmail->setAttr('failCnt', $failCnt);
			$sendmail->update($dbh);
			Js::LocationReplace('발송되었습니다.', '', 'parent');
		}
		else {
				JS::LocationReload('발송되지 않았습니다. 잠시 후에 다시 시도하세요!', '', 'parent');
				setFree();
				exit();
		}
	}
	catch(Exception $e) {
		 //echo $e->getMessage();
		JS::HistoryBack($e->getMessage());
	}

	setFree();
}

function setFree() {
	$dbh = null;
	$sendmail = null;
	unset($dbh);
	unset($sendmail);
}