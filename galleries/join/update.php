<?php
if (!defined('OKTOMATO')) exit;

if ($aryURL['host'] !== $_SERVER['HTTP_HOST']) {
	exit;
}
else {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' || is_array($_POST)) {
		$result = 'fail';
		$msg = '잘못된 접근입니다.';
		$url = null;

		$join = new Join();

		foreach($_POST as $key => $value) {
			if (!is_array($value)) {
				$join->setAttr($key, LIB_LIB::CkWord($value));
				//echo $key.'=>'.$value;
			}
			else {
				$$key = $value;
			}
		}

		if (empty($join->attr['galleryId'])) {
			$msg = '계정을 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['overlap']) || $join->attr['overlap'] === 'Y') {
			$msg = '계정 중복을 확인하여 주세요..';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (!empty($join->attr['galleryId'])) {
			if (!$join->chkAccount($dbh)) {
				$msg = '사용 불가능한 계정입니다.\r\n다른 계정을 입력하여 주세요.' ;
				setFinal($join, $dbh, $result, $msg, $url);
			}
		}

		if (empty($join->attr['galleryNameKr'])) {
			$msg = '갤러리명(kr)을 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['galleryNameEn'])) {
			$msg = '갤러리명(En)을 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['zipCode'])) {
			$msg = '우편번호를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['addr1'])) {
			$msg = '주소를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['addr2'])) {
			$msg = '상세 주소를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['addr1En'])) {
			$msg = '주소(영문)를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['homepage'])) {
			$msg = '홈페이지 주소를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['email'])) {
			$msg = '이메일을 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['tel'])) {
			$msg = '전화번호를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['fax'])) {
			$msg = '팩스번호를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}



		/*
		if (empty($join->attr['contactName'])) {
			$msg = '담당자명을 입력하세요';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['contactTel'])) {
			$msg = '담당자 연락처를 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}

		if (empty($join->attr['contactEmail'])) {
			$msg = '담당자 이메일을 입력하세요.';
			setFinal($join, $dbh, $result, $msg, $url);
		}
		*/

		try {
			if ($join->attr['at'] === 'update' ) {
				// 갤러리 로고 ai 파일 처리
				if (!empty($_FILES['upfile']['name'])) {
					if (!LIB_FILE::MimeCheck($MIME['PDF'], $_FILES['upfile']['tmp_name'])) {
						$msg = '갤러리 로고 파일은 업로드 불가능한 파일 형식입니다.';
						setFinal($join, $dbh, $result, $msg, $url);
					}
					else {
						$join->attr['fileName'] = $_FILES['upfile']['name'];
						$join->attr['upfileName'] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['upfile']['name']); // 파일명 생성

						if (!LIB_FILE::ExtCheck($EXT['AI'], LIB_FILE::ExtensionName($join->attr['upfileName']))) {  // 파일 확장자 검사
							$msg = '갤러리 로고 파일은 업로드 불가능한 파일 형식입니다.';
							setFinal($join, $dbh, $result, $msg, $url);
						}
						else {
							LIB_FILE::FileUpload($_FILES['upfile']['tmp_name'], $join->attr['upfileName'], $EXT['AI'], ROOT.galleriesAboutUploadPath); // 파일 업로드
							if (!empty($join->attr['oldUpfileName'])) {
								LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.$join->attr['oldUpfileName']); // 등록된 파일 삭제
							}
						}
					}
				}
				else {
					$join->attr['fileName'] = $join->attr['oldFileName'];
					$join->attr['upfileName'] = $join->attr['oldUpfileName'];
				}

				// 사업자등록증 파일 처리
				if (!empty($_FILES['upfile2']['name'])) {
					if (!LIB_FILE::MimeCheck($MIME['IMG_PDF'], $_FILES['upfile2']['tmp_name'])) {
						$msg = '사업자등록증 파일은 업로드 불가능한 파일 형식입니다.';
						setFinal($join, $dbh, $result, $msg, $url);
					}
					else {
						$join->attr['fileName2'] = $_FILES['upfile2']['name'];
						$join->attr['upfileName2'] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($_FILES['upfile2']['name']); // 파일명 생성
						LIB_FILE::FileUpload($_FILES['upfile2']['tmp_name'], $join->attr['upfileName2'], $EXT['IMG_PDF'], ROOT.galleriesAboutUploadPath); // 파일 업로드
						if (!empty($join->attr['oldUpfileName2'])) {
							LIB_FILE::DeleteFile(ROOT.galleriesAboutUploadPath.$join->attr['oldUpfileName2']); // 등록된 파일 삭제
						}
					}
				}
				else {
					$join->attr['fileName2'] = $join->attr['oldFileName2'];
					$join->attr['upfileName2'] = $join->attr['oldUpfileName2'];
				}


				$rResult = $join->insert($dbh);


				if ($rResult[0] && $rResult[1] === 'success') {
					$msg = '입점신청이 완료되었습니다';
					$url = '/galleries/join_completed.php';
				}
				else {
					$msg = '오류가 발생했습니다.';
				}
				$result = $rResult[1];
			}
		}
		catch(Exception $e) {
			echo  'Error:'.$e->getMessage();
			$msg = '오류가 발생했습니다.';
		}
		setFinal($join, $dbh, $result, $msg, $url);
	}
}


function setFinal($join, $dbh, $result, $msg, $url) {
	$dbh = null;
	$join = null;
	unset($dbh);
	unset($join);
	echo '{"result":"'.$result.'", "msg":"'.$msg.'", "url":"'.$url.'"}';
	exit;
}
