<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/news/news.class.php';
 ?>
<?php
$news_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;

$readParams = 'page='.$page.'&at=read&subm='.$subm.'&cate='.$cate.'&word='.$word ;

$read_count = false;

if ($cook_news_view){ //페이지 뷰 카운팅을 위해 쿠키저장
	$temp = explode(",",$cook_news_view);
	if ( !in_array($news_idx,$temp) ) { // 배열에 번호가 없을경우
		setcookie('cook_news_view',$_COOKIE['cook_news_view'].','.$news_idx,time()+86400);
		$read_count = true;
	}else{
		$read_count = false ;
	}

}else{
	setcookie('cook_news_view',$news_idx,time()+86400);
	$read_count = true;
}

$News = new News();
$News->setAttr("news_idx", $news_idx);
$News->setAttr("news_category_idx", $cate);
$News->setAttr("read_count", $read_count);


try {
	if (!$News->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}


/*
$snsTitle = $News->attr['reporter_name'];
$snsImg = $PUBLIC['HOME'].newsUploadPath.$row[0]['up_file_name'];
$snsUrl = $PUBLIC['HOME'].$_SERVER['PHP_SELF'];
$snsDescription = str_replace("\r\n", '', strip_tags($row[0]['img_comment']));
*/
?>

<meta name="title" content="<?php echo SITE_NAME?>" />
<meta name="description" content="<?php echo $row['news_title'];?>" />
<link rel="image_src" href="<?php echo  newsUploadPath.$row['up_file_name'] ; ?>" />


	<div class="inner">
		<div class="view_box" onclick="stopgoup(event);">
			<div class="inner ">
				<div class="img_box swiper-container">
					<ul class="swiper-wrapper" onclick="">

<?php
$tmp = $News->getListParagraph($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_cnt = isset($total_cnt) ? $total_cnt : 1;

$i = 0;
foreach($list as $row) {
?>
						<li class="swiper-slide"><img src="<?php echo  newsUploadPath.$row['up_file_name'] ; ?>"/></li>
<?php
		$i=$i+1;
}
?>
					</ul>
				</div>
				<div class="con_box">
					<h1>Written by <span class="writer">[<?php echo $News->attr['source'];?>] <?php echo $News->attr['reporter_name'];?></span></h1>
					<p class="date"><?php echo substr($News->attr['create_date'],0,4)?>.<?php echo substr($News->attr['create_date'],5,2)?>.<?php echo substr($News->attr['create_date'],8,2)?></p>
					<ul class="clearfix">
						<li><a href="javascript:;" onclick="shareFaceBookMM();"><img src="/images/bbs/ico_bbs_view1_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="페이스북"></a></li>
						<li><a href="javascript:;" onclick="shareGooglePlusMM();"><img src="/images/bbs/ico_bbs_view5_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="구글플러스"></a></li>
						<li><a href="javascript:;" onclick="sharePinterestMM();"><img src="/images/bbs/ico_bbs_view2_off.gif" onmouseover="$(this).imgConversion(true);" onmouseout="$(this).imgConversion(false);" alt="Pinterest"></a></li>
						<li class="img_list"><span>1</span> / <?php echo $i ; ?></li>
					</ul>
				</div>
			</div>
			<div class="pageing">
	           <button class="prev"><img src="/images/btn/btn_prev_op.png" alt="이전"></button>
	           <button class="next"><img src="/images/btn/btn_next_op.png" alt="다음"></button>
	         </div>
	         <button class="btn_close" onclick="closeCardView();"><img src="/images/btn/btn_close3.png" /></button>
		</div>
	</div>

<?php
$News = null;
$dbh = null;
unset($News);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>