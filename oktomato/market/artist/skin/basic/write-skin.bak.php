<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/artist/artist.class.php');

$artist_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$aArtistEnName[] = '';

$Artist = new Artist();
$Artist->setAttr('artist_idx', $artist_idx);


if ($mode === 'edit') {
	$Artist->getRead($dbh, $artist_idx);
	$aArtistEnName = explode(" ", $Artist->attr['artist_en_name']);
	//$aFileInfo = $Artist->getFileInfo($dbh, $artist_idx, $bbs_code);
}

//print_r($aFileInfo);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>네이버 :: Smart Editor 2 &#8482;</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<form name="writeFrm" method="post" action="update.php" enctype="multipart/form-data">
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Artist->attr['artist_idx'];?>">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="old_photo_file" value="<?php echo $Artist->attr['photo_up_file_name'];?>"></div>
<input type="hidden" name="old_photo_ori_file" value="<?php echo $Artist->attr['photo_ori_file_name'];?>"></div>

<input type="hidden" name="old_cv_file" value="<?php echo $Artist->attr['cv_up_file_name'];?>"></div>
<input type="hidden" name="old_cv_ori_file" value="<?php echo $Artist->attr['cv_ori_file_name'];?>"></div>

<div>성명<input type="text" name="name" value="<?php echo $Artist->attr['artist_name'];?>"></div>
<div>영문first명<input type="text" name="first_name" value="<?php echo $aArtistEnName[0];?>"></div>
<div>영문last명<input type="text" name="last_name" value="<?php echo $aArtistEnName[1];?>"></div>
<div>출생<input type="text" name="birth_year" value="<?php echo $Artist->attr['birth_year'];?>"></div>
<div>
	졸업년도1<input type="text" name="education_year_1" value="<?php echo $Artist->attr['education_year_1'];?>">
	교육기관명1<input type="text" name="education_name_1" value="<?php echo $Artist->attr['education_name_1'];?>">
</div>

<div>
	졸업년도2<input type="text" name="education_year_2" value="<?php echo $Artist->attr['education_year_2'];?>">
	교육기관명2<input type="text" name="education_name_2" value="<?php echo $Artist->attr['education_name_2'];?>">
</div>


</br>

<div>
수상경력년도1<input type="text" name="award_year_1" value="<?php echo $Artist->attr['award_year_1'];?>">
수상전이름1<input type="text" name="award_name_1" value="<?php echo $Artist->attr['award_name_1'];?>">
</div>

<div>
	수상경력년도2<input type="text" name="award_year_2" value="<?php echo $Artist->attr['award_year_2'];?>">
	수상전이름2<input type="text" name="award_name_2" value="<?php echo $Artist->attr['award_name_2'];?>">
</div>

<div>
	수상경력년도3<input type="text" name="award_year_3" value="<?php echo $Artist->attr['award_year_3'];?>">
	수상전이름3<input type="text" name="award_name_3" value="<?php echo $Artist->attr['award_name_3'];?>">
</div>


</br>

<div>
	개인전년도1<input type="text" name="private_year_1" value="<?php echo $Artist->attr['private_year_1'];?>">
	개인전이름1<input type="text" name="private_name_1" value="<?php echo $Artist->attr['private_name_1'];?>">
</div>

<div>
	개인전년도2<input type="text" name="private_year_2" value="<?php echo $Artist->attr['private_year_2'];?>">
	개인전이름2<input type="text" name="private_name_2" value="<?php echo $Artist->attr['private_name_2'];?>">
</div>

<div>
	개인전년도3<input type="text" name="private_year_3" value="<?php echo $Artist->attr['private_year_3'];?>">
	개인전이름3<input type="text" name="private_name_3" value="<?php echo $Artist->attr['private_name_3'];?>">
</div>
<div>
	개인전년도4<input type="text" name="private_year_4" value="<?php echo $Artist->attr['private_year_4'];?>">
	개인전이름4<input type="text" name="private_name_4" value="<?php echo $Artist->attr['private_name_4'];?>">
</div>
<div>
	개인전년도5<input type="text" name="private_year_5" value="<?php echo $Artist->attr['private_year_5'];?>">
	개인전이름5<input type="text" name="private_name_5" value="<?php echo $Artist->attr['private_name_5'];?>">
</div>


</br>

<div>
	단체전년도1<input type="text" name="team_year_1" value="<?php echo $Artist->attr['team_year_1'];?>">
	단체전이름1<input type="text" name="team_name_1" value="<?php echo $Artist->attr['team_name_1'];?>">
</div>

<div>
	단체전년도2<input type="text" name="team_year_2" value="<?php echo $Artist->attr['team_year_2'];?>">
	단체전이름2<input type="text" name="team_name_2" value="<?php echo $Artist->attr['team_name_2'];?>">
</div>

<div>
	단체전년도3<input type="text" name="team_year_3" value="<?php echo $Artist->attr['team_year_3'];?>">
	단체전이름3<input type="text" name="team_name_3" value="<?php echo $Artist->attr['team_name_3'];?>">
</div>
<div>
	단체전년도4<input type="text" name="team_year_4" value="<?php echo $Artist->attr['team_year_4'];?>">
	단체전이름4<input type="text" name="team_name_4" value="<?php echo $Artist->attr['team_name_4'];?>">
</div>
<div>
	단체전년도5<input type="text" name="team_year_5" value="<?php echo $Artist->attr['team_year_5'];?>">
	단체전이름5<input type="text" name="team_name_5" value="<?php echo $Artist->attr['team_name_5'];?>">
</div>

</br>

<div>
	사진<input type="file" name="photo_file" value="">
		<?php if(!empty($Artist->attr['photo_up_file_name'])):?><img src="<?php echo artistUploadPath.$Artist->attr['photo_up_file_name'];?>" width="200" height="200"><?php endif;?>
</div>
<div>
	이력<input type="file" name="cv_file" value="">
	이력파일<a href="download.php?idx=<?php echo $Artist->attr['artist_idx'];?>"><?php echo $Artist->attr['cv_ori_file_name'];?></a>
</div>

</form>

<div>
<button onclick="document.writeFrm.submit();">저장</button>
<button onclick="location.href='?at=list'">목록</button>
</div>
</body>
</html>