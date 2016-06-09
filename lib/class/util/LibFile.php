<?php
# FILE CLASS ######################################################################################
class LIB_FILE
{

	# GET EXTENTION NAME
	public static function ExtensionName($FileName)
	{
		$aFileName = explode(".", $FileName);
		$str = strtolower(array_pop($aFileName));
		return $str;
	}

	public static function ExtCheck($Rule, $ExtensionName)
	{
		$Rules = explode("|", $Rule);
		if( in_array($ExtensionName, $Rules) ) return true;
		else return false;
	}

	public static function MimeCheck($Rule, $file)
	{
		$Rules = explode("|", $Rule);

		if( in_array(mime_content_type($file), $Rules) ) return true;
		else return false;
	}


	public static function replaceFilename($RealFileName){
		if(!$RealFileName)
		{
			return "";
		}
		else{
			$RealFileName = str_ireplace(" ", "", $RealFileName);
			$RealFileName = strip_tags($RealFileName);
			$RealFileName = preg_replace ("/[ #\&\+\-%@=\/\\\:;,'\"\^`~|\!\?\*$#<>()\[\]\{\}]/i", "",  $RealFileName );
			//$RealFileName = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $RealFileName);
			return $RealFileName;
		}
	}

	# FILE NewFileName
	public static function NewFileName($SavePath, $RealFileName)
	{
		if(!$RealFileName)
		{
			return "";
		}
		else{
			$RealFileName = LIB_FILE::replaceFilename($RealFileName); //str_replace("'","",trim($RealFileName) );
			$ArrRealFileName = explode(".",$RealFileName);
			if(count($ArrRealFileName) > 1){

				for($i = 0; $i < count($ArrRealFileName) - 1;$i++){
					$OrgFileName .= $ArrRealFileName[$i];
					if($i < count($ArrRealFileName) - 2) $GetFileName .= ".";
				}
				$FileExt = $ArrRealFileName[count($ArrRealFileName) - 1];
			}
			else{
				$OrgFileName = $RealFileName;
				$FileExt = "";
			}



			$NewFile = "";
			if ($FileExt) $FileExt = "." . $FileExt;
			$FileExist = true;
			$GetFileName = $SavePath . "/" . $OrgFileName . $FileExt;
			$CountFileName = 0;
			$NewFile = $OrgFileName . $FileExt;
			while ($FileExist) {
				if (is_file ($GetFileName) ) {
					$CountFileName++;
					$NewFile = $OrgFileName . "_" . $CountFileName . $FileExt;
					$GetFileName = $SavePath . "/" .  $NewFile;
				} else {
					$FileExist = false;
				}
			}
			return $NewFile;
		}
	}


	# FILE UPLOAD
	public static function FileUpload($File, $FileName, $Rule, $SavePath)
	{
		//echo "<br>File:$File";
		//echo "<br>FileName:$FileName";

		$ExtName = LIB_FILE::ExtensionName($FileName);
		$ExtCheck = LIB_FILE::ExtCheck($Rule, $ExtName);
		if( $ExtCheck != true )
		{
			JS::HistoryBack("사용가능한 파일형식이 아닙니다. ($FileName)");
		}else{
			## $FileName = LIB_FILE::NewFileName($SavePath, $FileName); ## 미리 새로운 이름구하고 적용한다.
			copy($File, $SavePath."/".$FileName);
			chmod($SavePath."/".$FileName, 0666);
			@unlink($File);
		}
	}

	## 업로드 파일 아이콘
	public static function GetFileIcon($FileName){
		$ExtName = LIB_FILE::ExtensionName($FileName);
		$ReturnValue = "";
		switch($ExtName){
			case "doc"			 : $ReturnValue = "icon_file_doc.gif";				 break;
			case "docx"			 : $ReturnValue = "icon_file_doc.gif";				 break;
			case "xls"			 : $ReturnValue = "icon_file_excel.gif";			 break;
			case "xlsx"			 : $ReturnValue = "icon_file_excel.gif";			 break;
			case "hwp"			 : $ReturnValue = "icon_file_hwp.gif";				 break;
			case "jpg"			 : $ReturnValue = "icon_file_img.gif";				 break;
			case "gif"			 : $ReturnValue = "icon_file_img.gif";				 break;
			case "png"			 : $ReturnValue = "icon_file_img.gif";				 break;
			case "bmp"			 : $ReturnValue = "icon_file_img.gif";				 break;
			case "pdf"			 : $ReturnValue = "icon_file_pdf.gif";				 break;
			case "ppt"			 : $ReturnValue = "icon_file_ppt.gif";				 break;
			case "pptx"			 : $ReturnValue = "icon_file_ppt.gif";				 break;
			case "avi"			 : $ReturnValue = "icon_file_vod.gif";				 break;
			case "asf"			 : $ReturnValue = "icon_file_vod.gif";				 break;
			case "wmv"			 : $ReturnValue = "icon_file_vod.gif";				 break;
			case "zip"			 : $ReturnValue = "icon_file_zip.gif";				 break;
			case "rar"			 : $ReturnValue = "icon_file_zip.gif";				 break;
			case "7z"			 : $ReturnValue = "icon_file_zip.gif";				 break;
			default				 : $ReturnValue = "icon_file_etc.gif";				 break;
		}
		return $ReturnValue;
	}

	# 저장디렉토리 구분
	public static function GetDirName($dir,$num)
	{
		return $dir.(5000 * (ceil($num / 5000) - 1 ) );
	}


	# GET ImageSize
	public static function GetGetImageSize($File,$SavePath,$width=0,$height=0)
	{
		$im = "";
		if(is_file("$SavePath/$File") )
		{
			$im = getimagesize("$SavePath/$File");
			if(is_array($im) )
			{
				if($im[0] > $width && $width > 0)
				{
					$c = $im[0] / $width;
					$im[0] = ceil($im[0] / $c);
					$im[1] = ceil($im[1] / $c);
					$im[3] = "width=\"{$im[0]}\" height=\"{$im[1]}\"";
				}
				if($im[1] > $height && $height > 0)
				{
					$c = $im[1] / $height;
					$im[0] = ceil($im[0] / $c);
					$im[1] = ceil($im[1] / $c);
					$im[3] = "width=\"{$im[0]}\" height=\"{$im[1]}\"";
				}
			}
		}
		return $im;
	}

	# IMAGE THUMBNAIL
	public static function ThumNail($file, $filename, $save_filename, $save_path, $stic, $max_size="1048576", $max_width="450", $max_height="2048", $fixation="")
	{
		$Extname=LIB_FILE::ExtensionName($filename);
		$ExtCheck = LIB_FILE::ExtCheck($stic, $Extname);
		/*
		//if(trim($file)!="none" && !eregi($stic, $Extname))
		if(trim($file)!="none" && !preg_match($stic, $Extname))
		{
			JS::HistoryBack("사용가능한 파일형식이 아닙니다. ($filename)");
			exit;
		}
		*/

		if( $ExtCheck != true )
		{
			JS::HistoryBack("사용가능한 파일형식이 아닙니다. ($filename)");
		}


		if(filesize($file) > $max_size)
		{
			JS::HistoryBack("업로드 화일 용량을 초과 하였습니다($filename)");
			exit;
		}

		$img_info = getImageSize($file);
		if($img_info[2] == 1)
		{
			$src_img = ImageCreateFromGif($file);
			}elseif($img_info[2] == 2){
			$src_img = ImageCreateFromJPEG($file);
			}elseif($img_info[2] == 3){
			$src_img = ImageCreateFromPNG($file);
			}else{
			return 0;
		}
		$img_width = $img_info[0];
		$img_height = $img_info[1];

		# SCALE CALC
		if($img_width > $max_width && $img_height <= $max_height)
		{
			$dst_width = $max_width;
			$dst_height = ceil(($img_height * $max_width)/$img_width);
		}elseif($img_height > $max_height && $img_width <= $max_width){
			$dst_height = $max_height;
			$dst_width = ceil(($img_width * $max_height)/$img_height);
		}elseif($img_width > $max_width && $img_height > $max_height){
			$dst_width = $max_width;
			$dst_height = ceil(($img_height * $max_width)/$img_width);
			if($dst_height > $max_height)
			{
				$dst_height = $max_height;
				$dst_width = ceil(($dst_width * $max_height)/$dst_height);
			}
		}else{
			$dst_width = $img_width;
			$dst_height = $img_height;
		}

		if($fixation=="1")
		{
			# FIXATION
			if($dst_width < $max_width) $srcx = ceil(($max_width - $dst_width)/2); else $srcx = 0;
			if($dst_height < $max_height) $srcy = ceil(($max_height - $dst_height)/2); else $srcy = 0;
			if($img_info[2] == 1)
			{
				$dst_img = imagecreate($max_width, $max_height);
			}else{
				$dst_img = imagecreatetruecolor($max_width, $max_height);
			}
			$bgc = ImageColorAllocate($dst_img, 255, 255, 255);
			ImageFilledRectangle($dst_img, 0, 0, $max_width, $max_height, $bgc);
			ImageCopyResampled($dst_img, $src_img, $srcx, $srcy, 0, 0, $dst_width, $dst_height, ImageSX($src_img),ImageSY($src_img));
		}elseif($fixation=="2"){
			# FULL
			if($dst_width < $max_width) $srcx = ceil(($max_width - $dst_width)/2); else $srcx = 0;
			if($dst_height < $max_height) $srcy = ceil(($max_height - $dst_height)/2); else $srcy = 0;
			if($img_info[2] == 1)
			{
				$dst_img = imagecreate($max_width, $max_height);
			}else{
				$dst_img = imagecreatetruecolor($max_width, $max_height);
			}
			$bgc = ImageColorAllocate($dst_img, 255, 255, 255);
			ImageFilledRectangle($dst_img, 0, 0, $max_width, $max_height, $bgc);
			ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $max_width, $max_height, ImageSX($src_img),ImageSY($src_img));
		}else{
			# NORMAL
			if($img_info[2] == 1)
			{
				$dst_img = imagecreate($dst_width, $dst_height);
			}else{
				$dst_img = imagecreatetruecolor($dst_width, $dst_height);
			}
			$bgc = ImageColorAllocate($dst_img, 255, 255, 255);
			ImageFilledRectangle($dst_img, 0, 0, $dst_width, $dst_height, $bgc);
			ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_width, $dst_height, ImageSX($src_img),ImageSY($src_img));
		}

		if($img_info[2] == 1)
		{
			ImageInterlace($dst_img);
			ImageGif($dst_img, $save_path.$save_filename);
		}elseif($img_info[2] == 2){
			ImageInterlace($dst_img);
			//ImageJPEG($dst_img, $save_path.$save_filename, 72);
			ImageJPEG($dst_img, $save_path.$save_filename, 100); //이미지 퀄리티 100으로 조정 by 2015-04-16 이용태
		}elseif($img_info[2] == 3){
			ImagePNG($dst_img, $save_path.$save_filename);
		}
		ImageDestroy($dst_img);
		ImageDestroy($src_img);
	}

	# FORMAT FILESIZE
	public static function FormatFilesize($bytes)
	{
		$kb = 1024;
		$mb = 1048576;
		$gb = 1073741824;
		$tb = 1099511627776;
		settype($bytes, "integer");
		if (!empty($bytes))
		{
			if ($bytes < $kb)
			{
				return $bytes . " bytes";
			}elseif ($bytes < $mb){
				return round($bytes / $kb, 2) . " Kb";
			}else if ($bytes < $gb){
				return round($bytes / $mb, 2) . " Mb";
			}else if ($bytes < $tb){
				return round($bytes / $gb, 2) . " Gb";
			}else{
				return round($bytes / $tb, 2) . " Tb";
			}
		}else{
			return '0';
		}
	}

	# READ FILE
	public static function ReadFile($file)
	{
		if (@file_exists($file) == 0)
		{
			return "file not exist";
		}else{
			$fd = fopen($file, "r");
			$contents = fread ($fd, filesize($file));
			fclose($fd);
			return $contents;
		}
	}

	# WRITE FILE
	public static function WriteFile($file, $data, $mode = "w")
	{
		$fh = fopen($file, $mode);
		if ($fh or $mode == 'w')
		{
			@ignore_user_abort(true);
			@flock($fh, LOCK_EX);
			@fwrite($fh, $data);
			@flock($fh, LOCK_UN);
			@fclose($fh);
			@ignore_user_abort(false);
			return true;
		}
		return false;
	}

	# ADD WRITE FILE
	public static function AddFile($file,$add_data, $method = "w")
	{
		if(!is_file($file))
		{
			$method='w';
		}else{
			$data = file_get_contents($file);
		}
		if (ereg($_SERVER['DOCUMENT_ROOT'], $file))
		{
			$fh = fopen($file, $method);
			if ($fh)
			{
				@flock($fh, LOCK_EX);
				@$add_data .= $data;
				@fwrite($fh, $add_data);
				@flock($fh, LOCK_UN);
				@fclose($fh);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	# DELETE FILE
	public static function DeleteFile($file)
	{
		$delete = @unlink($file);
		clearstatcache();
		if (@file_exists($file))
		{
			//$filesys = eregi_replace("/", "\\", $file);
			$filesys = preg_replace("/", "\\", $file);
			$delete = @exec("del $filesys");
			clearstatcache();
			if (@file_exists($file))
			{
				$delete = @chmod ($file, 0775);
				$delete = @unlink($file);
				$delete = @exec("del $filesys");
			}
		}
		clearstatcache();
		if (@file_exists($file)) return false; else return true;
	}

	# MAKE DIRECTORY
	public static function CreateFolder($dir_name, $mode=0777)
	{
		if(!is_dir($dir_name))
		{
			mkdir($dir_name, $mode);
			return chmod($dir_name, $mode);
		}
	}

	# REMOVE DIRECTORY
	public static function RemoveDir($dir)
	{
		# if ($_SERVER['DOCUMENT_ROOT'] != substr($dir, 0, strlen($_SERVER['DOCUMENT_ROOT']))) exit;
		if (!ini_get("safe_mode") && OS == 'UNIX')
		{
			exec("rm -rf $dir");
		}else{
			$current_dir = @opendir($dir);
			while ($entryname = @readdir($current_dir))
			{
				if (is_dir("$dir/$entryname") and ($entryname != "." and $entryname != ".."))
				{
					remove_dir("$dir/$entryname");
				}elseif ($entryname != "." and $entryname != ".."){
					clearstatcache();
					unlink("$dir/$entryname");
				}
			}
			@closedir($current_dir);
			@rmdir(${dir});
		}
		if (is_dir($dir))	return false; else return true;
	}

	# COPY DIRECTORY
	public static function CopyDir($source_dir, $target_dir)
	{
		if (!file_exists($target_dir))
		{
			mkdir($target_dir, 0777);
		}
		$files = ls_a($source_dir);
		foreach ($files as $file)
		{
			if ($file)
			{
				$source_file = $source_dir . "/" . $file;
				$target_file = $target_dir . "/" . $file;
				if (is_dir($source_file))
				{
					copy_dir($source_file, $target_file);
				}else{
					@copy($source_file, $target_file);
					@chmod($target_file, 0666);
				}
			}
		}
	}

	# DIRECTORY LIST
	public static function Ls($wh)
	{
		$files = Array();
		if($handle = @opendir($wh))
		{
			while(false !== ($file = readdir($handle)))
			{
				if($file !== "." && $file !== "..") $files[] = $file;
			}
			@closedir($handle);
		}
		return $files;
	}


	public static function randomGenerator ($min=8, $max=32, $special=NULL, $chararray=NULL)
	{
		$random_chars = array();

		if ($chararray == NULL) {
			$str = "abcdefghijklmnopqrstuvwxyz";
			$str .= strtoupper($str);
			$str .= "1234567890";

			if ($special) {
				$str .= "!@#$%";
			}
		}
		else {
			$str = $charray;
		}

		for ($i=0; $i<strlen($str)-1; $i++) {
			$random_chars[$i] = $str[$i];
		}

		srand((float)microtime()*1000000);
		shuffle($random_chars);

		$length = rand($min, $max);
		$rdata = '';

		for ($i=0; $i<$length; $i++) {
			$char = rand(0, count($random_chars) - 1);
			$rdata .= $random_chars[$char];
		}
		return $rdata;
	}

	// 파일 이동
	public static function moveFile($source, $target)
	{
		//echo $source;
		if (file_exists($source)) {
			//echo "파일 존재";
			if (!file_exists($target)) {
				@copy($source, $target);
				if (file_exists($target)) {
					@unlink($source);
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			//echo "파일 존재하지 않음";
			return false;
		}
	}


	/*-----------------------------------------------------------------------------
	*        제작자 : 강훈일
	*        제작일 : 2004. 1. 6
	*        이메일 : kanghoonil@npine.com , hoonil@javastars.com
	*
	*        수정자 : 이용태 (인터넷에서 퍼옴)
	*        수정일 : 2015-01-14
	*        수정내용 : 배경투명 워터마크 처리
	*                        워터마크 위치 우측 하단 기준 패딩 처리
	*                        투명도 처리 Gif
	*        > 함수 설명 <
	*        워터마크 처리 함수
	*
	*        > 전달인자 설명 <
	*        $imagePath                             :                워터마크를 처리할 이미지
	*        $waterMakeSourceImage        :                워터마크 이미지 //배경이 투명한 이미지를 넣을 경우 gif 만 가능 //png는 이미지에서 투명도 조정
	*        $ARGimageQuality                   :                이미지 퀄리티
	*        $w_padding                             :                우측 하단 기준 워터마크 패딩 (Width)
	*        $h_padding                              :                우측 하단 기준 워터마크 패딩 (Height)
	*        $pct                                         :                0 ~ 100 투명도 주기 100 불투명, 0 완전 투명(워터마크 처리하지 않음) //현재 사용하지 않음
	*
	-----------------------------------------------------------------------------*/
	public static function imageWaterMaking($ARGimagePath, $ARGwaterMakeSourceImage, $ARGimageQuality = 100, $w_padding = 5,  $h_padding = 5, $pct = 50){
					//#####----- 이미지 정보 가져오기 -----#####
					$getSourceImageInfo = getimagesize($ARGimagePath);
					//#####----- 원본 이미지 검사 -----#####
					if(!$getSourceImageInfo[0]){
									return ARRAY(0, "!!! 원본 이미지가 존재하지 않습니다. !!!");
					}
					$getwaterMakeSourceImageInfo = GETIMAGESIZE($ARGwaterMakeSourceImage);
					//#####----- 워터마크 이미지 검사 -----#####
					if(!$getwaterMakeSourceImageInfo[0]){
									return ARRAY(0, "!!! 워터마크 이미지가 존재하지 않습니다. !!!");
					}

					//#####----- 원본 이미지 생성(로드) -----#####
					switch($getSourceImageInfo[2]){
									case 1 :        #####----- GIF 포맷 형식 -----#####
															$sourceImage = IMAGECREATEFROMGIF($ARGimagePath);
															break;
									case 2 :        #####----- JPG 포맷 형식 -----#####
															$sourceImage = IMAGECREATEFROMJPEG($ARGimagePath);
															break;
									case 3 :        #####----- PNG 포맷 형식 -----#####
															$sourceImage = IMAGECREATEFROMPNG($ARGimagePath);
															break;
									default :        #####----- GIF, JPG, PNG 포맷방식이 아닐경우 오류 값을 리턴 후 종료 -----#####
															return array(0, "!!! 원본이미지가 GIF, JPG, PNG 포맷 방식이 아니어서 이미지 정보를 읽어올 수 없습니다. !!!");
					}

					//#####----- 워터마크 이미지 생성(로드) -----#####
					switch($getwaterMakeSourceImageInfo[2]){
									case 1 :        //#####----- GIF 포맷 형식 -----#####
															$waterMakeSourceImage = IMAGECREATEFROMGIF($ARGwaterMakeSourceImage);
															break;
									case 2 :        //#####----- JPG 포맷 형식 -----#####
															$waterMakeSourceImage = IMAGECREATEFROMJPEG($ARGwaterMakeSourceImage);
															break;
									case 3 :        //#####----- PNG 포맷 형식 -----#####
															$waterMakeSourceImage = IMAGECREATEFROMPNG($ARGwaterMakeSourceImage);
															break;
									default :        //#####----- GIF, JPG, PNG 포맷방식이 아닐경우 오류 값을 리턴 후 종료 -----#####
															return array(0, "!!! 워터마크이미지가 GIF, JPG, PNG 포맷 방식이 아니어서 이미지 정보를 읽어올 수 없습니다. !!!");
					}


					//#####----- 워터마크 위치 구하기(중앙에 워터마크 삽입) -----#####
					//$waterMakePositionWidth = ($getSourceImageInfo[0] - $getwaterMakeSourceImageInfo[0]) / 2;
					//$waterMakePositionHeight = ($getSourceImageInfo[1] - $getwaterMakeSourceImageInfo[1]) / 2;

					//#####----- 워터마크 위치 구하기(우측 하단 패팅값을 줘서 삽입) -----#####
					$waterMakePositionWidth = ($getSourceImageInfo[0] - $getwaterMakeSourceImageInfo[0])  - $w_padding;
					$waterMakePositionHeight = ($getSourceImageInfo[1] - $getwaterMakeSourceImageInfo[1]) - $h_padding;

					//#####----- 이미지 그리기 -----#####
					//불투명 워터마크
					//IMAGECOPYRESIZED($sourceImage, $waterMakeSourceImage, $waterMakePositionWidth, $waterMakePositionHeight, 0, 0, ImageSX($waterMakeSourceImage), ImageSY($waterMakeSourceImage), ImageSX($waterMakeSourceImage), ImageSY($waterMakeSourceImage));

					//배경이 투명한 워터마크 처리 (Png 파일 처리 가능) // 투명도 줄 수 없음
					imagecopyresampled($sourceImage, $waterMakeSourceImage, $waterMakePositionWidth, $waterMakePositionHeight, 0, 0, ImageSX($waterMakeSourceImage), ImageSY($waterMakeSourceImage), ImageSX($waterMakeSourceImage), ImageSY($waterMakeSourceImage));

					//배경이 투명한 워터마크 처리 (gif 파일 - 투명도 줄 수 있음)
					//imagecopymerge ( $sourceImage, $waterMakeSourceImage, $waterMakePositionWidth, $waterMakePositionHeight, 0, 0, ImageSX($waterMakeSourceImage), ImageSY($waterMakeSourceImage) , $pct );


					//#####----- 이미지 저장 -----#####
					switch($getSourceImageInfo[2]){
									case 1 :        //#####----- GIF 포맷 형식 -----#####
															if(IMAGEGIF($sourceImage, $ARGimagePath, $ARGimageQuality)){
																			return ARRAY(1, "GIF 형식 워터마크 이미지가 처리 되었습니다.");
															}else{
																			return ARRAY(0, "GIF 형식 워터마크 이미지가 처리 도중 오류가 발생했습니다.");
															}
															break;
									case 2 :        //#####----- JPG 포맷 형식 -----#####
															if(IMAGEJPEG($sourceImage, $ARGimagePath, $ARGimageQuality)){
																			return ARRAY(1, "JPG 형식 워터마크 이미지가 처리 되었습니다.");
															}else{
																			return ARRAY(0, "JPG 형식 워터마크 이미지가 처리 도중 오류가 발생했습니다.");
															}
															break;
									case 3 :        //#####----- PNG 포맷 형식 -----#####
															if(IMAGEPNG($sourceImage, $ARGimagePath, $ARGimageQuality)){
																			return ARRAY(1, "PNG 형식 워터마크 이미지가 처리 되었습니다.");
															}else{
																			return ARRAY(0, "PNG 형식 워터마크 이미지가 처리 도중 오류가 발생했습니다.");
															}
															break;
									default :        //#####----- GIF, JPG, PNG 포맷방식이 아닐경우 오류 값을 리턴 후 종료 -----#####
															return ARRAY(0, "!!! 원본마크이미지가 GIF, JPG, PNG 포맷 방식이 아니어서 이미지 정보를 읽어올 수 없습니다. !!!");
					}


	}


}


?>