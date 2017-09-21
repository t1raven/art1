<?php 
/////////////////////////////////////
//  작성일 : 2015-02-25
//  작성자 : 이용태
//  수정일 : 2015-02-25
//  설명 : 머니투데이 지난 기사를 .txt 파일로 받아 일괄 저장 모듈
//  상세 : 머니투데이에서 전달 받은 .txt 파일을  /oktomato/news/newstxt/ 경로에 업로드 후
//            본 파일을 실행하면(웹에서 열면) 파일명을 기준으로 저장되지 않은 파일을 찾아 art1 뉴스에 저장 
// * 주의 : 업로드 되는 파일은 양식이 모두 동일해야 처리 가능. // 만일 양식이 다른 파일이 들어왔을 경우 엉뚱한 데이터가 입력될 수 있음.
/////////////////////////////////////

exit; //파일을 업로드 하지 않을때는 막아둔다.

require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//$directory = "/oktomato/news/newstxt/"; //업데이트할 뉴스 txt 파일이 있는 디렉토리 경로

$dir_1 = "art1_news/2013/12/";
$directory = "/oktomato/news/newstxt/".$dir_1 ; //업데이트할 뉴스 txt 파일이 있는 디렉토리 경로

$setdir = newsUploadPath ; //    /upload/news/'; //이미지 저장 위치
//echo $DOCUMENT_ROOT ;

///////////////////////
//테스트 완료 후 news.class.php 로 이전 하려고 했으나 insert()에 수정 사항이 있어서 그냥 씀
class News
{
	var $attr;

	function __construct() {
		$this->attr = array();
	}

	function setAttr($key, $value){
		$this->attr[$key] = $value;
		//echo "<br>set:$key:".gettype($value);
		//echo "<br>set:$key:".$value;
	}

	function getAddslashes($key){
		//return addslashes($this->attr[$key]);
		//return ($this->attr[$key] == null) ? null : addslashes($this->attr[$key]);

		//if (is_null($this->attr[$key]) || $this->attr[$key] == '') {
		if (is_null($this->attr[$key])) {
			//echo "<br>$key:rtn null";
			return null;
		}
		else {
			if (gettype($this->attr[$key]) == 'string') {
				//echo "<br>$key:rtn string";
				return addslashes($this->attr[$key]);
			}
			else {
				//echo "<br>$key:rtn letter";
				return $this->attr[$key];
			}
		}
	}

	function setHtmlspecialchars($key) {
		while(list($key,$val) = each($this->attr) )
			$this->attr[$key] = htmlspecialchars($val);
	}


	function insert($dbh) {
		try {
			$bTransaction = false;
			$dbh->beginTransaction();

			$news_idx = $this->getAddslashes('news_idx');
			$news_category_idx = $this->getAddslashes('news_category_idx');
			$news_title = $this->getAddslashes('news_title');
			$reporter_name = $this->getAddslashes('reporter_name');
			$source = $this->getAddslashes('source');
			$create_date = $this->getAddslashes('create_date');
			$recent_status = $this->getAddslashes('recent_status');
			$display_status = $this->getAddslashes('display_status');
			$news_main_up_file_name = $this->getAddslashes('main_up_file_name');
			$news_main_ori_file_name = $this->getAddslashes('main_ori_file_name');
			$file_code = $this->getAddslashes('file_code'); //파일로 입력되는 뉴스코드(일반 입력에서는 처리되지 않는다.)

			$ip_addr = ip2long($_SERVER['REMOTE_ADDR']);

			$arr_ImgOrVideo = $this->getAddslashes('arr_ImgOrVideo');
			$arr_imgFile = $this->getAddslashes('arr_imgFile');
			$arr_img_comment = $this->getAddslashes('arr_img_comment');
			$arr_img_content = $this->getAddslashes('arr_img_content');
			$arr_videoFile = $this->getAddslashes('arr_videoFile');
			$arr_video_url = $this->getAddslashes('arr_video_url');
			$arr_video_content = $this->getAddslashes('arr_video_content');

			$arr_up_file_name = $this->getAddslashes('arr_up_file_name');
			$arr_ori_file_name = $this->getAddslashes('arr_ori_file_name');

			$arr_this_value = $this->getAddslashes('arr_this_value');


			//recent_status 초기화
			if ($recent_status == 'Y' ) {
				$sql = 'UPDATE news_main SET recent_status = \'N\' WHERE news_category_idx = :news_category_idx ';
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
				if ($stmt->execute()) {
					$bTransaction = true ;
				}
			}else{
				$bTransaction = true ;
			}

			$sql = 'INSERT INTO news_main (
							news_category_idx, news_title, reporter_name, 
							source, recent_status, display_status, 
							news_main_up_file_name, news_main_ori_file_name,
							ip_addr, create_date, file_code
						) VALUES(
							:news_category_idx, :news_title, :reporter_name, 
							:source, :recent_status, :display_status, 
							:news_main_up_file_name, :news_main_ori_file_name,
							:ip_addr, :create_date, :file_code
						)';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':news_category_idx',$news_category_idx,			PDO::PARAM_INT);
			$stmt->bindParam(':news_title',$news_title,											PDO::PARAM_STR, 30);
			$stmt->bindParam(':reporter_name',$reporter_name,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':source',$source,													PDO::PARAM_STR, 30);
			$stmt->bindParam(':recent_status',$recent_status,								PDO::PARAM_STR, 30);
			$stmt->bindParam(':display_status',$display_status,							PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_up_file_name',$news_main_up_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':news_main_ori_file_name',$news_main_ori_file_name,			PDO::PARAM_STR, 30);
			$stmt->bindParam(':ip_addr',$ip_addr,												PDO::PARAM_INT);
			$stmt->bindParam(':create_date',$create_date,									PDO::PARAM_STR, 30);
			$stmt->bindParam(':file_code',$file_code,									PDO::PARAM_STR, 30);


			if ($stmt->execute() && $bTransaction ) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				//echo('뉴스 메인 입력 에러');
				exit;
			}

			

			$news_idx = $dbh->lastInsertId(); //마지막으로 삽입된 행의 ID, 시퀀스 객체의 마지막 값을 리턴


			if ($news_idx) { //단락업로드
				$sql = '';
				$i=0;
				
				//echo print_r ($arr_ImgOrVideo) .'<br>';
				foreach ($arr_ImgOrVideo as $value) {
					//단락만큼 돌면서 업로드
					//echo $value .'<br>';
					if ($arr_this_value[$i]) { //유효한 입력 값이 있으면 처리
						if ($value == 'I'){ //이미지
							$new_paragraph_content =Str_replace('<','&#60;',$arr_img_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content = htmlspecialchars($arr_img_content[$i]);
							$img_or_video = 'img';
							$img_comment = $arr_img_comment[$i];
							$video_url = NULL;
							$imgfile = $arr_imgFile;
						}elseif($value == 'V'){ //비디오
							$new_paragraph_content =Str_replace('<','&#60;',$arr_video_content[$i]);
							$new_paragraph_content =Str_replace('>','&#62;',$new_paragraph_content);
							//$new_paragraph_content =$arr_video_content[$i];
							$img_or_video = 'video';
							$img_comment = NULL;
							$video_url = htmlspecialchars($arr_video_url[$i]);
						}
						$up_file_name = htmlspecialchars($arr_up_file_name[$i]);
						$ori_file_name = htmlspecialchars($arr_ori_file_name[$i]);

						//$new_paragraph_content = htmlspecialchars($new_paragraph_content);
						$new_paragraph_content = strip_tags($new_paragraph_content,'<img>');



						$sql = 'INSERT INTO news_paragraph (
								news_idx, new_paragraph_content, img_or_video, 
								ori_file_name, up_file_name, img_comment, video_url
							) VALUES (
								:news_idx, :new_paragraph_content, :img_or_video, 
								:ori_file_name, :up_file_name, :img_comment, :video_url
							)';

						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(':news_idx',$news_idx,													PDO::PARAM_INT);
						$stmt->bindParam(':new_paragraph_content',$new_paragraph_content,	PDO::PARAM_STR, 30);
						$stmt->bindParam(':img_or_video',$img_or_video,										PDO::PARAM_STR, 30);
						$stmt->bindParam(':ori_file_name',$ori_file_name,										PDO::PARAM_STR, 30);
						$stmt->bindParam(':up_file_name',$up_file_name,										PDO::PARAM_STR, 30);
						$stmt->bindParam(':img_comment',$img_comment,										PDO::PARAM_STR, 30);
						$stmt->bindParam(':video_url',$video_url,													PDO::PARAM_STR, 30);

						if ($stmt->execute()) {
							$bTransaction = true;
						}
						else {
							throw new Exception('error');
						}
					}
					$i=$i+1;
				}

			}
/*
			if ($bTransaction) {
				$resurt = $dbh->commit();
				//echo 'result : '.$result.'<br>';
			}
			else {
				$dbh->rollback();
			}
*/		
			if ($bTransaction){
				return $news_idx;
			}else{
				return $bTransaction;
			}
			/*
			if ($stmt->execute() && $dbh->lastInsertId() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
			*/
		}
		catch(PDOExecption $e) {
			//print 'Error!: ' . $e->getMessage() . '</br>';
		}
	}


	function getTxtFileCount($dbh) { //텍스트 파일을 기존에 업로드 했는지 체크
		try {
			$file_name = $this->getAddslashes('file_name');
			$sql = 'select count(*) as count from news_file_upload_txt  where file_name = :file_name ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':file_name', $file_name, PDO::PARAM_STR, 30);
			$stmt->execute();

			$count_txt_file = $stmt->fetchColumn();
			$this->setAttr('count_txt_file', $count_txt_file);
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}

	function getTxtFileUpdate($dbh) { //텍스트 파일명을 저장
		try {
			$bTransaction = false;
			//$dbh->beginTransaction();
			
			$file_name = $this->getAddslashes('file_name');
			$file_code = $this->getAddslashes('file_code');

			$sql = 'INSERT INTO news_file_upload_txt ( file_name, file_code ) values ( :file_name, :file_code ) ';
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':file_name', $file_name, PDO::PARAM_STR, 30);
			$stmt->bindParam(':file_code', $file_code, PDO::PARAM_STR, 30);
			
			if ($stmt->execute() ) {
				$bTransaction = true;
			}
			else {
				throw new Exception('error');
				//echo('뉴스 파일 입력 에러');
				exit;
			}

			if ($bTransaction) {
				$resurt = $dbh->commit();
				//echo 'result : '.$result.'<br>';
			}
			else {
				$dbh->rollback();
			}

			return $bTransaction;
		}
		catch(PDOExecption $e) {
			JS::HistoryBack($e->getMessage());
		}
	}


}
///////////////////////


//디렉토리에 있는 파일목록을 가져온다.
function getFileNames($directory) {
    $results = array(); 
    $handler = opendir($directory); 
    while ($file = readdir($handler)) { 
        if ($file != '.' && $file != '..' && is_dir($file) != '1') {
            $results[] = $file; 
        }
    } 
    closedir($handler); 
    return $results;
}

//뉴스 파일이 많아서 set_image_file 함수 사용하지 않음..
//외부 이미지를 가져와서 이미지 저장
//$host : 가져올 이미지 host // $host = 'thumb.mt.co.kr';
//$file_path : 가져올 이미지 path // $file_path = '/06/2014/12/';
//$file_name : 가져올 이미지 file_name // $file_name = '2014122309237143913_2.jpg';
//$setdir : 저장 할 위치 // $setdir = '/upload/bbs/';
function set_image_file($host, $file_path, $file_name, $setdir){
	$fp = fsockopen($host,80,$errno,$errstr,10); 
	if ( $fp ) { 
		$send = 'GET '.$file_path.$file_name.' HTTP/1.1'."\r\n"; 
		$send.= 'Host: '.$host. "\r\n"; 
		$send.= 'Connection: Close'."\r\n\r\n"; 
		fwrite($fp,$send); 
		$content = ''; 
		while ( !feof($fp) ) $content.= fread($fp,1024); 
		$content = substr($content,strpos($content,"\r\n\r\n")+4); 
		fclose($fp); 

		//echo $content ;

		//exit;

		$im = imagecreatefromstring($content); 
		//echo $im .'<br>';
		imagejpeg($im,$_SERVER['DOCUMENT_ROOT'].$setdir.$file_name,100); 
	}

}


//내용을 받아 특정 tag 를 제거한다
function strip_tag_arrays($str, $strip_tags) {
	foreach ($strip_tags as $key => $val) {
		$str = preg_replace("/<{$val}[^>]*>/i", '', $str);
		$str = preg_replace("/<\/{$val}>/i", '', $str);
	}
	return $str;
}

function tag_del($val){
	$val = strip_tag_arrays($val, array('table','tr','td','img','p','STRONG','FONT')); //테이블 테그만 제거
	return $val;
}

echo '<br>'. print_r(getFileNames($DOCUMENT_ROOT.$directory));
$arr_files = getFileNames($DOCUMENT_ROOT.$directory);
?>

<html lang="ko">
<meta charset="utf-8">

<?php 
$News = new News();

 foreach($arr_files as $file){ 
	//파일의 저장 유무 정보를 가져온다. S
	//없으면 news_main , news_paragraph 테이블에 저장
	$News->setAttr("file_name", $file);
	$News->getTxtFileCount($dbh);
	$file_state = $News->attr['count_txt_file'];
	//파일의 저장 유무 정보를 가져온다. E

	//echo 'file_state : '.$file_state .'';
	
	if($file_state == 0 ){
		echo $file. ' 파일 처리 중 <br />
';

		//$read_file = file_get_contents('../newstxt/'.$file);
		$read_file = file_get_contents('../newstxt/'.$dir_1.$file);

		$read_file = iconv('CP949','UTF-8',$read_file);   //utf-8로 문자열 변환

//		echo $read_file .'';

		//$object = simplexml_load_string($read_file);

		if(strpos($read_file, '<table ') !== false) {  
			//이미지가 있다. //단락 나눔
			$img_state = true;
		} else {  
			//이미지가 없다. //단락 하나
			$img_state = false;
		}

		$arr_t = explode('',$read_file);
		$file_code = $arr_t[0];
		$title = $arr_t[1];
		$reporter = $arr_t[2];
		$reporter_1 = $arr_t[3];
		$email = $arr_t[4];
		$input_date = $arr_t[5];
		$input_date_y = substr($input_date,0,4);
		$input_date_m = substr($input_date,4,2);
		$input_date_d = substr($input_date,6,2);
		$input_date_h = substr($input_date,8,2);
		$input_date_i = substr($input_date,10,2);
		$cdate_d = $input_date_y.'-'.$input_date_m.'-'.$input_date_d;
		$source =  $arr_t[7];

		$arr_read_file = explode('<table',$arr_t[6]); // 문자를 구분해서 배열처리한다.

		 $i = 0;
		 foreach($arr_read_file as $v){  //파일을 메인 부분과 단락으로 구분 

			
			if ($i == 0 ){

				$news_top_content_check = strlen(trim(explode('<table ',$arr_t [6])[0])); //상단에 이미지가 아니라 뉴스 본문이 먼저 나오는 경우를 체크 // 0 이상
			
		
				//echo 'news_top_content_check : '.$news_top_content_check .'';

				if($img_state == true && $news_top_content_check > 0 ){ 
					//이미지가 상단에 있지 않은 경우 처리 //이미지가 없는 상단 본문 처리
					$arr_this_value[$i] = True ;  //유효한 값 유무
					$arr_up_file_name[$i] = null;
					$arr_ori_file_name[$i] = null;
					$arr_img_comment[$i] =  null ;
					$arr_img_content[$i] =  tag_del(explode('<table ',$arr_t [6])[0]) ;
					$arr_ImgOrVideo[$i] = 'I';

				}

			}
			
			$arr_img = explode('<img src="',$v)[1]; // 문자를 구분해서 배열처리한다.
			$arr_img = explode('"',$arr_img)[0];

			$arr_img_path = explode('/',$arr_img);
			$img_host = $arr_img_path[2];
			$img_path = '/'.$arr_img_path[3].'/'.$arr_img_path[4].'/'.$arr_img_path[5].'/';
			$img_name = $arr_img_path[6];


			
			$v = '<table '. $v;

			//$img_comment = strip_tags(explode('</table>',$v)[0]);
			$img_comment = tag_del(explode('</table>',$v)[0].'</table>');
			//$img_content = strip_tags(explode('</table>',$v)[1]);
			$img_content = tag_del(explode('</table>',$v)[1]);


			$img_content =  ( substr($img_content,0, 1)=='?' )? substr($img_content,1, strlen($img_content)) : $img_content ; //문단 앞에 ? 가 있는 경우 잘라낸다.
			//$img_content = ltrim($img_content,'?') ; //문단 앞에 ? 가 있는 경우 잘라낸다.
			
			//$img_content = explode('머니투데이1|',$img_content)[0];
			$img_content = trim($img_content);

			//$img_content_foot = explode('머니투데이1|',$img_content)[1];

			if ($i > 0 ){
				if($news_top_content_check > 0 ){
					//본문이 먼저 나오고 이미지가 있는 경우 // 먼저 상단에서 $i == 0  을 먼저 처리하고 이후 처리된다.
					$arr_this_value[$i] = True ;  //유효한 값 유무
					$arr_up_file_name[$i] = $arr_img;
					$arr_ori_file_name[$i] = $arr_img;
					$arr_img_comment[$i] =  $img_comment ;
					$arr_img_content[$i] =   $img_content ;
					$arr_ImgOrVideo[$i] = 'I';
				}else{
					//이미지가 상단에 오는 경우
					$arr_this_value[$i -1] = True ;  //유효한 값 유무
					$arr_up_file_name[$i -1] = $arr_img;
					$arr_ori_file_name[$i -1] = $arr_img;
					$arr_img_comment[$i -1] =  $img_comment ;
					$arr_img_content[$i -1] =   $img_content ;
					$arr_ImgOrVideo[$i -1] = 'I';
				}
				

				//외부 이미지를 옮긴다. S //사용안함
				//set_image_file($img_host, $img_path, $img_name, $setdir); 
				//외부 이미지를 옮긴다. E
			}elseif($img_state == false){ 
				//이미지가 없는 경우
				
				$arr_this_value[$i] = True ;  //유효한 값 유무
				$arr_up_file_name[$i] = null;
				$arr_ori_file_name[$i] = null;
				$arr_img_comment[$i] =  null ;
				$arr_img_content[$i] =   tag_del($arr_t [6]) ;
				$arr_ImgOrVideo[$i] = 'I';
			}
			$enter = '';
			
			 // echo $arr_v; 
			  echo '

		';
			$i++;
		}


		//뉴스 테이블에 저장 S
		$newsCate1 = 2 ; //일단 임의로 카테고리 저장
		$title = isset($title) ? htmlspecialchars($title) : null;
		$title = isset($title) ? Str_replace('\'','&#39;',$title) : null;

		$reporter = isset($reporter) ? $reporter.' '.$reporter_1 : '아트1';
		$source = isset($source) ? $source : '머니투데이';
		$cdate_d = isset($cdate_d) ? $cdate_d : null;
		$cdate_h = isset($input_date_h) ? $input_date_h : null;
		$cdate_m = isset($input_date_i) ? $input_date_i : null;
		$create_date = $cdate_d.' '.$cdate_h.':'.$cdate_m.':00'; // 입력일 설정
		$recent_status = 'N';
		$display_status = 'Y';
/*
		echo 'file_code : '.$file_code .'
		';
		echo 'title : '.$title .'
		';
		echo 'reporter : '.$reporter .'
		';
		echo 'source : '.$source .'
		';
		echo 'cdate_d : '.$cdate_d .'
		';
		echo 'cdate_h : '.$cdate_h .'
		';
		echo 'cdate_m : '.$cdate_m .'
		';
		echo 'recent_status : '.$recent_status .'
		';
		echo 'display_status : '.$display_status .'
		';
*/

//		echo 'arr_ImgOrVideo : '.print_r($arr_ImgOrVideo);
//		echo 'arr_up_file_name : '.print_r($arr_up_file_name);
//		echo 'arr_ori_file_name : '. print_r($arr_ori_file_name);
//		echo 'arr_img_comment : '. print_r($arr_img_comment);
//		echo 'arr_img_content : '. print_r($arr_img_content);


		$News = new News();
		$News->setAttr('news_category_idx', $newsCate1);
		$News->setAttr('news_title', $title);
		$News->setAttr('reporter_name', $reporter);
		$News->setAttr('source', $source);
		$News->setAttr('recent_status', $recent_status);
		$News->setAttr('display_status', $display_status);
		$News->setAttr('create_date', $create_date);

		$News->setAttr('arr_ImgOrVideo', $arr_ImgOrVideo);

		$News->setAttr('arr_img_comment', $arr_img_comment);
		$News->setAttr('arr_img_content', $arr_img_content);

		$News->setAttr('arr_up_file_name', $arr_up_file_name);
		$News->setAttr('arr_ori_file_name', $arr_ori_file_name);
		$News->setAttr('arr_this_value', $arr_this_value);

		$News->setAttr('file_code', $file_code);
		

///*
		//저장 S
		$news_idx = $News->insert($dbh);
		echo('news_idx :'.$news_idx.'<br>');

		if ($news_idx) {
			echo ' 등록 되었습니다.';
			//Js::LocationReplace('등록되었습니다.', '?at=write&mode=edit&idx='.$news_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
		//저장 E

		//뉴스 테이블에 저장 E


		//파일을 처리했으면 정보를 저장. S
		$News->setAttr("file_name", $file);
		$News->setAttr("file_code", $file_code);
		if ($News->getTxtFileUpdate($dbh)) {
			echo $file .' 처리 완료
			';
		}else{
			echo $file .' 처리 ERROR
			';
		}
		//파일의 처리했으면 정보를 저장. E
//*/
	}//if($file_state == 0 )
	unset($arr_ImgOrVideo); 
	unset($arr_up_file_name); 
	unset($arr_ori_file_name); 
	unset($arr_img_comment); 
	unset($arr_img_content); 
 }


$dbh = null;
$News = null;
unset($dbh);
unset($News);
 ?>