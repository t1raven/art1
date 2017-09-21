<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? $_POST['mode'] : null;
$news_idx = isset($_POST['idx']) ? $_POST['idx'] : null;
$newsCate1 = isset($_POST['newsCate1']) ? $_POST['newsCate1'] : null;
$title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null;
$title = isset($title) ? Str_replace('\'','&#39;',$title) : null;

$reporter = isset($_POST['reporter']) ? $_POST['reporter'] : '아트1';
$source = isset($_POST['source']) ? $_POST['source'] : null;
$cdate_d = isset($_POST['cdate_d']) ? $_POST['cdate_d'] : null;
$cdate_h = isset($_POST['cdate_h']) ? $_POST['cdate_h'] : null;
$cdate_m = isset($_POST['cdate_m']) ? $_POST['cdate_m'] : null;
/*
$recent_status = isset($_POST['reserve_status']) ? $_POST['reserve_status'] : null;
$cdate_d = isset($_POST['reserve_d']) ? $_POST['reserve_d'] : null;
$cdate_h = isset($_POST['reserve_h']) ? $_POST['reserve_h'] : null;
$cdate_m = isset($_POST['reserve_m']) ? $_POST['reserve_m'] : null;
*/
$recent_status = isset($_POST['recent_status']) ? $_POST['recent_status'] : null;
$display_status = isset($_POST['display_status']) ? $_POST['display_status'] : null;
$addTbl = isset($_SESSION['addTbl']) ? $_POST['addTbl'] : null;
$arrAddTbl = isset($_POST['arrAddTbl']) ? $_POST['arrAddTbl'] : null;
$arrImgOrVideo = isset($_POST['ImgOrVideo']) ? $_POST['ImgOrVideo'] : null;
$arr_img_comment = isset($_POST['img_comment']) ? $_POST['img_comment'] : null;
$arr_img_content = isset($_POST['img_content']) ? $_POST['img_content'] : null;
$arr_video_url = isset($_POST['video_url']) ? $_POST['video_url'] : null;
$arr_video_content = isset($_POST['video_content']) ? $_POST['video_content'] : null;
$arr_imgFile = isset($_FILES['imgFile']) ? $_FILES['imgFile'] : null;
$arr_videoFile = isset($_FILES['videoFile']) ? $_FILES['videoFile'] : null;

$arr_paragraph_idx = isset($_POST['paragraph_idx']) ? $_POST['paragraph_idx'] : null;
$arr_old_ori_file_name = isset($_POST['old_ori_file_name']) ? $_POST['old_ori_file_name'] : null;
$arr_old_up_file_name = isset($_POST['old_up_file_name']) ? $_POST['old_up_file_name'] : null;

//if ($recent_status == 'Y' ){ $reserve_date = $reserve_d.' '.$reserve_h.':'.$reserve_m.':00'; } //예약설정
$create_date = $cdate_d.' '.$cdate_h.':'.$cdate_m.':00'; // 입력일 설정

$reporter = (empty($reporter))? '아트1' : $reporter ;

//JS::ConsoleLog($display_status);
//exit;


foreach ($arrImgOrVideo as $value) {
    $arr_ImgOrVideo[] = $value;
}

$News = new News();
$News->setAttr('news_idx', $news_idx);
$News->setAttr('news_category_idx', $newsCate1);
$News->setAttr('news_title', $title);
$News->setAttr('reporter_name', $reporter);
$News->setAttr('source', $source);
$News->setAttr('recent_status', $recent_status);
$News->setAttr('display_status', $display_status);
$News->setAttr('create_date', $create_date);

$News->setAttr('arr_ImgOrVideo', $arr_ImgOrVideo);

$News->setAttr('arr_imgFile', $arr_imgFile);
$News->setAttr('arr_img_comment', $arr_img_comment);
$News->setAttr('arr_img_content', $arr_img_content);

$News->setAttr('arr_videoFile', $arr_videoFile);
$News->setAttr('arr_video_url', $arr_video_url);
$News->setAttr('arr_video_content', $arr_video_content);

$News->setAttr('arr_paragraph_idx', $arr_paragraph_idx);

/*
// imageWaterMaking(워터마크를 집어넣을 이미지경로/이미지화일명, 워터마크로 쓸 이미지, 이미지의퀄리티)
echo newsUploadPath ;
$newsUploadPath11 = '/home/arthongs/www/'.newsUploadPath;
//mkdir(newsUploadPath, 0777);

$ARGimagePath = $newsUploadPath11.'1421142634LWWSG3GNHY.jpg';
$ARGwaterMakeSourceImage = $newsUploadPath11.'142114016169XSDFMB3F.jpg';
$result = imageWaterMaking($ARGimagePath, $ARGwaterMakeSourceImage, 30);
//JS::ConsoleLog($result);
echo print_r($result);

exit;
*/

//if (empty($newsCate1) ) { JS::HistoryBack('뉴스 카테고리를 선택해 주세요.');  exit; }
if (empty($newsCate1) ) { JS::Alert('뉴스 카테고리를 선택해 주세요.');  exit; }
if (empty($title) ) { JS::Alert('타이틀을 입력해 주세요.');  exit; }
//if (empty($reporter) ) { JS::HistoryBack('기자명을 입력해 주세요');  exit; }
if (empty($arr_img_content[0]) && empty($arr_video_content[0]) ) { JS::Alert('뉴스 첫번째 단락 내용이 없습니다.');  exit; }

try {
//이미지 업로딩S
$i=0;
//echo $mode .'<br>';

//phpinfo();

foreach ($arr_ImgOrVideo as $value) {
		$arr_this_value[$i] = True ;
		if($value == 'I'){ //이미지일때 처리
		$arr_img =  $arr_imgFile;
	}elseif($value == 'V'){ //비디오 일때 처리
		$arr_img =  $arr_videoFile;
	}

//echo 'arr_img :'.$arr_img['name'][$i] .'<br>';
//echo 'tmp_name :'.$arr_img['tmp_name'][$i] .'<br>';
//echo 'old_ori_file_name : '.$arr_old_ori_file_name[$i].'<br>';
//echo 'old_up_file_name : '.$arr_old_up_file_name[$i].'<br>';
//echo 'MimeCheck :'. LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'][$i]) .'<br>';

	if (!empty($arr_img['name'][$i])) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $arr_img['tmp_name'][$i])) {
			//Js::LocationReplace('사용 가능한 파일형식이 아닙니다1.('.$arr_imgFile['name'][$i].')', '?at=write', 'parent');
			Js::Alert('사용 가능한 파일형식이 아닙니다1.('.$arr_imgFile['name'][$i].')');

			//setFree();
			exit();
		}
	}

	//이미지 파일업로드 S
		if ($arr_img['name'][$i]) {

			// 기존파일명
			$arr_up_file_name[$i] = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($arr_img['name'][$i]);
			$arr_ori_file_name[$i] = $arr_img['name'][$i];

				//echo $arr_img['size'][$i] .'<br>';
				//exit;
				// 파일 업로드 //이미지를 리사이징 해서 저장. //ROOT.goodsMiddleImgUploadPath
				if($newsCate1 == 1){ //뉴스 메인이면 이미지를 700에 맞춘다.
					LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $arr_up_file_name[$i], ROOT.newsUploadPath, $EXT['IMG'], $arr_img['size'][$i], "700", "2048", ""); // 섬네일
				}else{
					LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $arr_up_file_name[$i], ROOT.newsUploadPath, $EXT['IMG'], $arr_img['size'][$i], "600", "2048", ""); // 섬네일
				}

			//LIB_FILE::FileUpload($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $EXT['IMG'], ROOT.newsUploadPath); //원본이미지 저장 // 원본이미지를 저장할때는 위의 섬네일로 생성되는 파일명을 수정해 줘야 한다.
				// 등록된 사진 삭제
			if (!empty($arr_old_up_file_name[$i])) {
				LIB_FILE::DeleteFile(ROOT.newsUploadPath.$arr_old_up_file_name[$i]);
			}

		}else {
			$arr_up_file_name[$i] = $arr_old_up_file_name[$i];
			$arr_ori_file_name[$i] = $arr_old_ori_file_name[$i];

		}

	//이미지 파일 업로드 E

	//아무 값도 들어오지 않으면 무시할 수 있는 값을 처리 // 입력 로직에서 해당 값을 가지고 처리
	if ( empty($arr_img['name'][$i]) && empty($arr_img_comment[$i]) && empty($arr_img_content[$i]) && empty($arr_video_url[$i]) && empty($arr_video_content[$i])  ) {
		$arr_this_value[$i] = False  ;
		//$arr_this_value[$i] = True  ;
	}


	$i = $i +1;
}

$News->setAttr('arr_up_file_name', $arr_up_file_name);
$News->setAttr('arr_ori_file_name', $arr_ori_file_name);
$News->setAttr('arr_this_value', $arr_this_value);


//이미지 업로딩E

//echo(" $mode == 'edit' && !is_null($news_idx ");



	if ($mode == 'edit' && !is_null($news_idx) ) {
		//echo("수정 <br>");
		if ($News->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', '?at=write&mode=edit&idx='.$news_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {

		$news_idx = $News->insert($dbh);
		//echo('news_idx :'.$news_idx.'<br>');

		if ($news_idx) {
			Js::LocationReplace('등록되었습니다.', '?at=write&mode=edit&idx='.$news_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	// echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$News = null;
unset($dbh);
unset($News);
?>