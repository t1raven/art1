<?php
if (!defined('OKTOMATO')) exit;

$mode = isset($_POST['mode']) ? $_POST['mode'] : null;
$news_idx = isset($_POST['idx']) ? $_POST['idx'] : null;
$newsCate1 = isset($_POST['newsCate1']) ? $_POST['newsCate1'] : null;
$title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null;
$title = isset($title) ? Str_replace('\'','&#39;',$title) : null;

//$water_status = isset($_POST['water_status']) ? $_POST['water_status'] : null ;
$reporter = isset($_POST['reporter']) ? $_POST['reporter'] : '아트1';

$source = isset($_POST['source']) ? $_POST['source'] : null;
$cdate_d = isset($_POST['cdate_d']) ? $_POST['cdate_d'] : null;
$cdate_h = isset($_POST['cdate_h']) ? $_POST['cdate_h'] : null;
$cdate_m = isset($_POST['cdate_m']) ? $_POST['cdate_m'] : null;

$recent_status = isset($_POST['recent_status']) ? $_POST['recent_status'] : null;
$display_status = isset($_POST['display_status']) ? $_POST['display_status'] : null;

$old_news_main_up_file_name = isset($_POST['old_news_main_up_file_name']) ? $_POST['old_news_main_up_file_name'] : null;
$old_news_main_ori_file_name = isset($_POST['old_news_main_ori_file_name']) ? $_POST['old_news_main_ori_file_name'] : null;

$old_news_recent_up_file_name = isset($_POST['old_news_recent_up_file_name']) ? $_POST['old_news_recent_up_file_name'] : null;
$old_news_recent_ori_file_name = isset($_POST['old_news_recent_ori_file_name']) ? $_POST['old_news_recent_ori_file_name'] : null;

$water_status_main = isset($_POST['water_status_main']) ? $_POST['water_status_main'] : null;
$water_status_recent = isset($_POST['water_status_recent']) ? $_POST['water_status_recent'] : null;

$imgMainFile = isset($_FILES['imgMainFile']) ? $_FILES['imgMainFile'] : null;
$imgRecentFile = isset($_FILES['imgRecentFile']) ? $_FILES['imgRecentFile'] : null;

$addTbl = isset($_SESSION['addTbl']) ? $_POST['addTbl'] : null;
$arrAddTbl = isset($_POST['arrAddTbl']) ? $_POST['arrAddTbl'] : null;
$arrImgOrVideo = isset($_POST['ImgOrVideo']) ? $_POST['ImgOrVideo'] : null;
$arr_img_comment = isset($_POST['img_comment']) ? $_POST['img_comment'] : null;
$arr_img_content = isset($_POST['img_content']) ? $_POST['img_content'] : null;
$arr_video_url = isset($_POST['video_url']) ? $_POST['video_url'] : null;
$arr_video_content = isset($_POST['video_content']) ? $_POST['video_content'] : null;

$arrWaterStatusImg =  isset($_POST['water_status_img']) ? $_POST['water_status_img'] : null;
$arrWaterStatusVideo =  isset($_PmOST['water_status_video']) ? $_POST['water_status_video'] : null;

$arr_imgFile = isset($_FILES['imgFile']) ? $_FILES['imgFile'] : null;
$arr_videoFile = isset($_FILES['videoFile']) ? $_FILES['videoFile'] : null;

$arr_paragraph_idx = isset($_POST['paragraph_idx']) ? $_POST['paragraph_idx'] : null;
$arr_old_ori_file_name = isset($_POST['old_ori_file_name']) ? $_POST['old_ori_file_name'] : null;
$arr_old_up_file_name = isset($_POST['old_up_file_name']) ? $_POST['old_up_file_name'] : null;

//if ($recent_status == 'Y' ){ $reserve_date = $reserve_d.' '.$reserve_h.':'.$reserve_m.':00'; } //예약설정
$create_date = $cdate_d.' '.$cdate_h.':'.$cdate_m.':00'; // 입력일 설정

$reporter = (empty($reporter))? '아트1' : $reporter ;


foreach ($arrImgOrVideo as $value) {
    $arr_ImgOrVideo[] = $value;
}

foreach ($arrWaterStatusImg as $value) {
    $arr_WaterStatusImg[] = $value;
}

/*
echo print_r( $arrWaterStatusVideo) ;
foreach ($arrWaterStatusVideo as $value) {
    $arr_WaterStatusVideo[] = $value;
}
*/
//response.End

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


//if (empty($newsCate1) ) { JS::HistoryBack('뉴스 카테고리를 선택해 주세요.');  exit; }
if (empty($newsCate1) ) { JS::Alert('뉴스 카테고리를 선택해 주세요.');  exit; }
if (empty($title) ) { JS::Alert('타이틀을 입력해 주세요.');  exit; }
//if (empty($reporter) ) { JS::HistoryBack('기자명을 입력해 주세요');  exit; }
//if (empty($arr_img_content[0]) && empty($arr_video_content[0]) ) { JS::Alert('뉴스 첫번째 단락 내용이 없습니다.');  exit; }

if ($newsCate1 == 15 ){ //카드뉴스는 이미지만 입력된다.
	if ( empty($arr_imgFile['name'][0]) && empty($arr_old_up_file_name[0]) ) {
		JS::Alert('카드 뉴스 첫번째 단락 이미지가 없습니다.');  exit;
	}
}else{
	if (empty($arr_img_content[0]) && empty($arr_video_content[0]) ) { JS::Alert('뉴스 첫번째 단락 내용이 없습니다.');  exit; }
}


try {
//이미지 업로딩S
$i=0;
//echo $mode .'<br>';

//phpinfo();


////////////////////////////////
// 뉴스 목록 이미지 처리 S
//if($newsCate1 == 1){
	if ($imgMainFile['name']) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $imgMainFile['tmp_name'])) {
			Js::Alert('사용 가능한 파일형식이 아닙니다1.('.$imgMainFile['name'].')');
			exit();
		}
	}

	if ($imgMainFile['name']) {
		$main_up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($imgMainFile['name']);
		$main_ori_file_name = $imgMainFile['name'];

		if($newsCate1 == 1){
			LIB_FILE::ThumNail($imgMainFile['tmp_name'], $main_up_file_name, $main_up_file_name, ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "700", "1024", ""); // 섬네일
		}elseif ($newsCate1 == 15 ){
			LIB_FILE::ThumNail($imgMainFile['tmp_name'], $main_up_file_name, $main_up_file_name, ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "367", "367", ""); // 섬네일
		}else{
			LIB_FILE::ThumNail($imgMainFile['tmp_name'], $main_up_file_name, $main_up_file_name, ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "600", "1024", ""); // 섬네일
		}

		//워터마크 처리 .
		if ($water_status_main=='Y') {
			$watermark_img =  Watermark::getWatermarkimage($dbh, 6); //워터마크로 찍을 이미지
			$result = LIB_FILE::imageWaterMaking(ROOT.newsUploadPath.$main_up_file_name, ROOT.newsUploadPath.$watermark_img, 100,10,10,100); //워터마크 처리

			if($result[0] == 0 ) {
				Js::Alert('워터마크 처리 중 오류가 발생했습니다. '.$result[1]);
				exit;
			}
		}

		// 등록된 사진 삭제
		if (!empty($old_news_main_up_file_name)) {
			LIB_FILE::DeleteFile(ROOT.newsUploadPath.$old_news_main_up_file_name);
		}

	}else {
		$main_up_file_name = $old_news_main_up_file_name;
		$main_ori_file_name = $old_news_main_ori_file_name;
	}

	$News->setAttr('main_up_file_name', $main_up_file_name);
	$News->setAttr('main_ori_file_name', $main_ori_file_name);
//}else{
//	$News->setAttr('main_up_file_name', null );
//	$News->setAttr('main_ori_file_name', null );
//}
// 뉴스 목록 이미지 처리 E
////////////////////////////////

////////////////////////////////
// 리센트 이미지 처리 S
	if ($imgRecentFile['name']) {
		if (!LIB_FILE::MimeCheck($MIME['IMG'], $imgRecentFile['tmp_name'])) {
			Js::Alert('사용 가능한 파일형식이 아닙니다1.('.$imgRecentFile['name'].')');
			exit();
		}
	}

	if ($imgRecentFile['name']) {
		$recent_up_file_name = time() . LIB_LIB::SecuID(10) . "." . LIB_FILE::ExtensionName($imgRecentFile['name']);
		$recent_ori_file_name = $imgRecentFile['name'];


		LIB_FILE::ThumNail($imgRecentFile['tmp_name'], $recent_up_file_name, $recent_up_file_name, ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "698", "300", ""); // 섬네일


		//워터마크 처리 .
		if ($water_status_recent=='Y') {
			$watermark_img =  Watermark::getWatermarkimage($dbh, 6); //워터마크로 찍을 이미지
			$result = LIB_FILE::imageWaterMaking(ROOT.newsUploadPath.$recent_up_file_name, ROOT.newsUploadPath.$watermark_img, 100,10,10,100); //워터마크 처리

			if($result[0] == 0 ) {
				Js::Alert('워터마크 처리 중 오류가 발생했습니다. '.$result[1]);
				exit;
			}
		}

		// 등록된 사진 삭제
		echo "<script>console.log('old_news_recent_up_file_name1 : ".$old_news_recent_up_file_name."');</script>";
		if (!empty($old_news_recent_up_file_name)) {
			echo "<script>console.log('old_news_recent_up_file_name : ".$old_news_recent_up_file_name."');</script>";
			LIB_FILE::DeleteFile(ROOT.newsUploadPath.$old_news_recent_up_file_name);
		}

	}else {
		$recent_up_file_name = $old_news_recent_up_file_name;
		$recent_ori_file_name = $old_news_recent_ori_file_name;
	}

	$News->setAttr('recent_up_file_name', $recent_up_file_name);
	$News->setAttr('recent_ori_file_name', $recent_ori_file_name);

// 리센트 이미지 처리 E
////////////////////////////////


foreach ($arr_ImgOrVideo as $value) {
	$arr_this_value[$i] = True ;

	if($value == 'I'){ //이미지일때 처리
		$arr_img =  $arr_imgFile;
		$arr_water_status = $arr_WaterStatusImg;
	}elseif($value == 'V'){ //비디오 일때 처리
		$arr_img =  $arr_videoFile;
		$arr_water_status = $arr_WaterStatusVideo;
	}


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
			if ($newsCate1 == 15 ){
				LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $arr_up_file_name[$i], ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "750", "750", ""); // 섬네일
			}else{
				LIB_FILE::ThumNail($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $arr_up_file_name[$i], ROOT.newsUploadPath, $EXT['IMG'], MAXFILESIZE, "600", "2048", ""); // 섬네일
			}

			//LIB_FILE::FileUpload($arr_img['tmp_name'][$i], $arr_up_file_name[$i], $EXT['IMG'], ROOT.newsUploadPath); //원본이미지 저장 // 원본이미지를 저장할때는 위의 섬네일로 생성되는 파일명을 수정해 줘야 한다.

				//워터마크 처리 S //
				if ($arr_water_status[$i]=='Y') {
					$watermark_img =  Watermark::getWatermarkimage($dbh, 6); //워터마크로 찍을 이미지
					$result = LIB_FILE::imageWaterMaking(ROOT.newsUploadPath.$arr_up_file_name[$i], ROOT.newsUploadPath.$watermark_img, 100,10,10,100); //워터마크 처리
				}
				//워터마크 처리 E


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
			//Js::LocationReplace('수정되었습니다.', '?at=write&mode=edit&idx='.$news_idx, 'parent');
			//Js::LocationReplace('수정되었습니다.', '?'.PageUtil::_param_get('idx='.$news_idx.'&at=write&mode=edit'), 'parent');
			Js::LocationReplace('수정되었습니다.', '?'.PageUtil::_param_get('at=list'), 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {

		$news_idx = $News->insert($dbh);
		echo('news_idx :'.$news_idx.'<br>');

		if ($news_idx) {
			//Js::LocationReplace('등록되었습니다.', '?at=write&mode=edit&idx='.$news_idx, 'parent');
			Js::LocationReplace('등록되었습니다.', '?at=list', 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$News = null;
unset($dbh);
unset($News);
?>