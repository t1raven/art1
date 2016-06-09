<?php
//exit;
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/news.class.php';

$word = isset($_GET['word']) ? $_GET['word'] : null;

$cate = isset($_GET['cate']) ? $_GET['cate'] : NULL ;
$news_skin_type = isset($_GET['news_skin_type']) ? $_GET['news_skin_type'] : NULL ;
$news_category_name= isset($_GET['news_category_name']) ? $_GET['news_category_name'] : NULL ;
$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 30;
$def_sz = $sz;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$dps = 'Y';

$back_page = isset($_GET['back_page']) ? (int)$_GET['back_page'] : null; ; //view page 에서 목록으로를 눌렀을때 처리를 위한 변수
$at_tmp = isset($_GET['at_tmp']) ? $_GET['at_tmp'] : null; //view page 에서 목록(뒤로)으로를 눌렀을때 해당 메뉴로 찾아가기 위한 변수

//$back_page 이 있을 경우 목록 계산

/*
if ( $check_mobile == true ){
	$sz = 6;
}
//else{
//	$sz = ARTWORKSLISTCOUNT;
//}
*/

if (!empty($back_page)) {
	$sz = $back_page * $sz;
	//$page = $page + $back_page ;

}



$News = new News();
$News->setAttr("word", $word);
$News->setAttr("cate", $cate);
$News->setAttr("page", $page);
$News->setAttr("sz", $sz);
$News->setAttr("dps", $dps);

$tmp = $News->getFrontList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_all_cnt = $tmp[2];

echo '
<script>$("#total_num").text("'.$total_cnt.'")</script>
';


// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;
//require('skin/'.$news_skin_type.'/list.head.skin.php');

//echo 'PAGE_UNCOUNT :'.$PAGE_UNCOUNT.'<br>';

$i = 0;
foreach($list as $row) {
	if (!empty($back_page) ) { //뒤로를 위한 처리
		$page = (int)($i / $def_sz +1) ;
	}

	if(empty($row['file_code']) || substr($row['up_file_name'],0,4) !='http'){
		$img_src = newsUploadPath.$row['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
	}else{
		$img_src =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
	}

	/*
	if(empty($row['file_code'])){
		$img_src = newsUploadPath.$row['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
	}else{
		$img_src =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
	}
	*/
	include('skin/tile/list.body.skin.php');

	$PAGE_UNCOUNT --;
	$i ++ ;
}
//require('skin/'.$news_skin_type.'/list.foot.skin.php');

$News = null;
$dbh = null;
$tmp = null;
$list = null;
unset($News);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>