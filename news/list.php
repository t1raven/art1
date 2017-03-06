<?php
if (!defined('OKTOMATO')) exit;

if (!empty($news_skin_type))
{
	//echo "chk".$news_skin_type;
	$word = isset($_GET['word']) ? $_GET['word'] : null;
	$sz = isset($_GET['sz']) ? (int)$_GET['sz'] : 10;
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	if( $news_category_idx==15 || $news_category_idx ==3 || $news_category_idx ==14 ){
		$sz = 12;
	}

	$cate =$news_category_idx;
	$readParams = 'page='.$page.'&at=read&subm='.$subm.'&cate='.$cate.'&word='.$word ;
	$params = 'at='.$at.'&subm='.$subm.'&cate='.$cate.'&word='.$word ;

	$News = new News();
	$News->setAttr("cate", $cate);
	$News->setAttr("word", $word);
	$News->setAttr("page", $page);
	$News->setAttr("sz", $sz);

	if( $news_category_idx==2 ){
		$News->setAttr("cate", $cate);
	}

	$tmp = $News->getFrontList($dbh);
	$list = $tmp[0];
	$total_cnt = $tmp[1];
	$total_all_cnt = $tmp[2];

	// 페이지 처리
	$pageUtil = new PageUtil();
	$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
	$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
	$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
	$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
	$idCnt = 0;


	require('skin/'.$news_skin_type.'/list.head.skin.php');

	foreach($list as $row) {
		//리센트뉴스 S

		if (empty($row['news_recent_up_file_name'])){
			//$list_img = newsUploadPath.$row['up_file_name'];
			if(empty($row['file_code'])){
				if (substr($row['up_file_name'],0,4) =='http') {
					$rescent_img =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
				}
				else {
					$rescent_img = (!empty($row['up_file_name']))  ? newsUploadPath.$row['up_file_name'] : null;
				}
			}else{
				$rescent_img = (!empty($row['up_file_name']))  ? $row['up_file_name'] : null;  //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
			}
		}else{
			$rescent_img = (!empty($row['news_recent_up_file_name'])) ? newsUploadPath.$row['news_recent_up_file_name'] : null;
		}
		//리센트뉴스 E

		//목록 이미지S
		if (empty($row['news_main_up_file_name'])){
			//$list_img = newsUploadPath.$row['up_file_name'];
			if(empty($row['file_code'])){
				if (substr($row['up_file_name'],0,4) =='http') {
					$list_img =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
				}
				else {
					$list_img = (!empty($row['up_file_name']))  ? newsUploadPath.$row['up_file_name'] : null;
				}
			}else{
				$list_img = (!empty($row['up_file_name']))  ? $row['up_file_name'] : null;  //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
			}
		}else{
			$list_img = (!empty($row['news_main_up_file_name'])) ? newsUploadPath.$row['news_main_up_file_name'] : null;
		}
		//목록 이미지E


		include('skin/'.$news_skin_type.'/list.body.skin.php');
		$PAGE_UNCOUNT --;
		$idCnt = $idCnt + 1;
	}


	require('skin/'.$news_skin_type.'/list.foot.skin.php');

	$News = null;
	$dbh = null;
	$tmp = null;
	$list = null;
	unset($News);
	unset($dbh);
	unset($tmp);
	unset($list);
	if (gc_enabled()) gc_collect_cycles();
}
else
{
	header('Location:/');
}
?>