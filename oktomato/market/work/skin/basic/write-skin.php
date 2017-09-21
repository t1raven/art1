<?php
ob_start('ob_gzhandler');
include_once('../../lib/include/global.inc.php');
include_once('../../lib/class/work/work.class.php');

$work_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$Work = new Work();
$Work->setAttr('work_idx', $work_idx);


if ($mode === 'edit') {
	$Work->getEdit($dbh);
	//$aFileInfo = $Work->getFileInfo($dbh, $artist_idx, $bbs_code);
}

//print_r($aFileInfo);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>작품 관리</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../../js/common.js"></script>
<script src="../../js/jquery.chkform.js"></script>
<script type="text/javascript">
function searchArtist() {
	window.open("search-artist.php","검색","width=400, height=300, toolbar=no, menubar=no, scrollbars=no, resizable=yes" );
}
</script>
</head>
<body>
<form name="writeFrm" method="post" action="update.php" enctype="multipart/form-data">
<input type="hidden" name="at" value="update">
<input type="hidden" name="idx" id="idx" value="<?php echo $Work->attr['work_idx'];?>">
<input type="text" name="artist_idx" value="14">
<input type="hidden" name="mode" value="<?php echo $mode;?>">
<input type="hidden" name="old_img" value="<?php echo $Work->attr['work_img_0'];?>|<?php echo $Work->attr['work_img_1'];?>|<?php echo $Work->attr['work_img_2'];?>|<?php echo $Work->attr['work_img_3'];?>|<?php echo $Work->attr['work_img_4'];?>|<?php echo $Work->attr['work_img_5'];?>|<?php echo $Work->attr['work_img_6'];?>|<?php echo $Work->attr['work_img_7'];?>|<?php echo $Work->attr['work_img_8'];?>|<?php echo $Work->attr['work_img_9'];?>|<?php echo $Work->attr['work_img_10'];?>">
<div>
<table>
	<tr>
		<td>Medium</td>
		<td>
			<input type="radio" name="medium" value="0"<?php if ($Work->attr['work_medium'] === '0'):?> checked<?php endif;?>>Design
			<input type="radio" name="medium" value="1"<?php if ($Work->attr['work_medium'] === '1'):?> checked<?php endif;?>>Drawing
			<input type="radio" name="medium" value="2"<?php if ($Work->attr['work_medium'] === '2'):?> checked<?php endif;?>>Painting
			<input type="radio" name="medium" value="3"<?php if ($Work->attr['work_medium'] === '3'):?> checked<?php endif;?>>Film Video
			<input type="radio" name="medium" value="4"<?php if ($Work->attr['work_medium'] === '4'):?> checked<?php endif;?>>Installation
			<input type="radio" name="medium" value="5"<?php if ($Work->attr['work_medium'] === '5'):?> checked<?php endif;?>>Sculpture
			<input type="radio" name="medium" value="6"<?php if ($Work->attr['work_medium'] === '6'):?> checked<?php endif;?>>Print
			<input type="radio" name="medium" value="7"<?php if ($Work->attr['work_medium'] === '7'):?> checked<?php endif;?>>Photography
		</td>
	</tr>
	<tr>
		<td>Subject</td>
		<td>
			<input type="radio" name="subject" value="0"<?php if ($Work->attr['work_subject'] === '0'):?> checked<?php endif;?>>Poitical
			<input type="radio" name="subject" value="1"<?php if ($Work->attr['work_subject'] === '1'):?> checked<?php endif;?>>Landscape
			<input type="radio" name="subject" value="2"<?php if ($Work->attr['work_subject'] === '2'):?> checked<?php endif;?>>Humor
			<input type="radio" name="subject" value="3"<?php if ($Work->attr['work_subject'] === '3'):?> checked<?php endif;?>>Science
			<input type="radio" name="subject" value="4"<?php if ($Work->attr['work_subject'] === '4'):?> checked<?php endif;?>>Fashion
			<input type="radio" name="subject" value="5"<?php if ($Work->attr['work_subject'] === '5'):?> checked<?php endif;?>>Cityscape
			<input type="radio" name="subject" value="6"<?php if ($Work->attr['work_subject'] === '6'):?> checked<?php endif;?>>Animals
			<input type="radio" name="subject" value="7"<?php if ($Work->attr['work_subject'] === '7'):?> checked<?php endif;?>>Still life
			<input type="radio" name="subject" value="8"<?php if ($Work->attr['work_subject'] === '8'):?> checked<?php endif;?>>Portait
		</td>
	</tr>
	<tr>
		<td>Size</td>
		<td>
			<input type="radio" name="size" value="0"<?php if ($Work->attr['work_size'] === '0'):?> checked<?php endif;?>>S(~50)
			<input type="radio" name="size" value="1"<?php if ($Work->attr['work_size'] === '1'):?> checked<?php endif;?>>M(~100)
			<input type="radio" name="size" value="2"<?php if ($Work->attr['work_size'] === '2'):?> checked<?php endif;?>>L(100~)
			<input type="radio" name="size" value="3"<?php if ($Work->attr['work_size'] === '3'):?> checked<?php endif;?>>ETC
		</td>
	</tr>
</table>
</div>




<div>작가<input type="text" name="artist_name" value="<?php echo $Work->attr['artist_name'];?>"><button type="button" onclick="searchArtist();">search</button></div>
<div>작품명<input type="text" name="work_name" value="<?php echo $Work->attr['work_name'];?>"></div>
<div>
	제작년도
	<select name="make_year">
		<?php for($i=1970; $i<2014; $i++):?>
		<option value="<?php echo $i;?>"<?php if ((int)$Work->attr['make_year'] === $i):?> selected<?php endif;?>><?php echo $i;?></option>
		<?php endfor;?>
		<option>
	</select>
</div>
<div>제작방식<input type="text" name="make_type" value="<?php echo $Work->attr['make_type'];?>"></div>
<div>프레임
	<input type="radio" name="is_frame" value="1"<?php if ($Work->attr['is_frame'] === '1'):?> checked<?php endif;?>>Framed
	<input type="radio" name="is_frame" value="0"<?php if ($Work->attr['is_frame'] === '0'):?> checked<?php endif;?>>Non-Framed
</div>
<div>사이즈
	<input type="text" name="width_size" value="<?php echo $Work->attr['width_size'];?>" class="only_number_dot" placeholder="가로">
	<input type="text" name="height_size" value="<?php echo $Work->attr['height_size'];?>" class="only_number_dot" placeholder="세로">
</div>

<div>구매여부
	<input type="radio" name="is_buy" value="1"<?php if ($Work->attr['is_buy'] === '1'):?> checked<?php endif;?>>Yes
	<input type="radio" name="is_buy" value="0"<?php if ($Work->attr['is_buy'] === '0'):?> checked<?php endif;?>>No
</div>
<div>구매가격<input type="text" name="buy_price" value="<?php echo $Work->attr['buy_price'];?>"></div>
<div>렌탈여부
	<input type="radio" name="is_lental" value="1"<?php if ($Work->attr['is_lental'] === '1'):?> checked<?php endif;?>>Yes
	<input type="radio" name="is_lental" value="0"<?php if ($Work->attr['is_lental'] === '0'):?> checked<?php endif;?>>No
</div>
<div>렌탈가격<input type="text" name="lental_price" value="<?php echo $Work->attr['lental_price'];?>"></div>
<div>작품설명<textarea name="description"><?php echo $Work->attr['work_description'];?></textarea></div>
<div>재료<input type="text" name="material" value="<?php echo $Work->attr['work_material'];?>"></div>
<div>
	전시/출품내역
	<select name="exhibit_year">
		<?php for($i=1970; $i<2014; $i++):?>
		<option value="<?php echo $i;?>"<?php if ((int)$Work->attr['exhibit_year'] === $i):?> selected<?php endif;?>><?php echo $i;?></option>
		<?php endfor;?>
		<option>
	</select>
	<input type="text" name="exhibit_item" value="<?php echo $Work->attr['exhibit_item'];?>">
</div>




<?php for($i=0; $i<=10; $i++):?>
<div>Slot<?php echo $i?><input type="file" name="img[]"></div>
<?php endfor;?>


</form>

<div>
<button onclick="document.writeFrm.submit();">저장</button>
<button onclick="location.href='?at=list'">목록</button>
</div>
</body>
</html>