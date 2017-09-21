<?php
if (!defined('OKTOMATO')) exit;

$news_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;
$newsCate1 = isset($_GET['newsCate1']) ? (int)$_GET['newsCate1'] : null;
$at = isset($_GET['at']) ? $_GET['at'] : null;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : 10;
$st = isset($_GET['st']) ? $_GET['st'] : 0;
$nm = isset($_GET['nm']) ? $_GET['nm'] : null;
$enm = isset($_GET['enm']) ? $_GET['enm'] : null;
$bdate = isset($_GET['bdate']) ? $_GET['bdate'] : null;
$edate = isset($_GET['edate']) ? $_GET['edate'] : null;
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$sort = isset($_GET['sort']) ? (int)$_GET['sort'] : 0; // 0:등록일순 , 1:작가명순
$od = isset($_GET['od']) ? (int)$_GET['od'] : 0; // 0:내림차순,  1:올림차순
$yyyy = date('Y');
$aArtistEnName[] = '';

$News = new News();
$News->setAttr('news_idx', $news_idx);

if (!is_null($news_idx) && is_int($news_idx)) {
	$News->getEdit($dbh);
	$newsCate1 = $News->attr['news_category_idx'];
	$news_title =  $News->attr['news_title'];
	$reporter_name = $News->attr['reporter_name'];
	$source = $News->attr['source'];
	$recent_status = $News->attr['recent_status'];
	$display_status = $News->attr['display_status'];
	$create_date = $News->attr['create_date'];
	$file_code = $News->attr['file_code'];

}else{
	$create_date = date('Y-m-d H:i:s');
}

$cdate_d = substr($create_date,0,10);
$cdate_h = substr($create_date,11,2);
$cdate_m = substr($create_date,14,1);


//echo $cdate_m .'<br>';
//include 'skin/basic/write-skin.php';


require('skin/basic/write.head.skin.php');

$i=1;
if ($mode=='edit'){

	$tmp = $News->getListParagraph($dbh);
	$list = $tmp[0];
	$total_cnt = $tmp[1];
	$total_cnt = isset($total_cnt) ? $total_cnt : 1;
	echo('<script>$("#addTbl").val('.$total_cnt.')</script>');
	
	
	foreach($list as $row) { 
		if(empty($file_code) || substr($row['up_file_name'],0,4) !='http'){
			$img_src = newsUploadPath.$row['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
		}else{
			$img_src =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
		}

		include('skin/basic/write.body.skin.php');
		$i=$i+1;

	}
}else{
	echo('<script>$("#addTbl").val(5)</script>');
	for($i=1 ; $i<=5; $i++){ //최초 화면은 무조건 5개 가져온다.
		include('skin/basic/write.body.skin.php');
	}
	
}
require('skin/basic/write.foot.skin.php');



echo ACTION_IFRAME;

$News = null;
$dbh = null;
$list_cate = null;
$tmp = null;
unset($News);
unset($dbh);
unset($list_cate);
unset($tmp);
if (gc_enabled()) gc_collect_cycles();
?>