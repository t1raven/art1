<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/social/snscontents.class.php';
require ROOT.'lib/class/social/snslink.class.php';

$idx = isset($_POST['idx']) ? (int)$_POST['idx'] : 1;
$id = isset($_POST['id']) ? Xss::chkXSS($_POST['id']) : null;

//echo $idx .' : '. $id .'<br />';
/*
ajaxSoclal('SnsFacebook', '__ajax_sns.php',1);
ajaxSoclal('SnsPinterest', '__ajax_sns.php',6);
ajaxSoclal('SnsInstagram', '__ajax_sns.php',11);
ajaxSoclal('SnsPictify', '__ajax_sns.php',16);
*/

if ($id=='SnsFacebook') {
  $sns_link_idx = 1;
  $article_class = 'facebook bxsh bdrs';
  $article_id = 'SnsFacebook';
  $title_img = '/images/main/ico_sns_01.png';
  $sns_text = 'facebook';
  $next_first = 1;
}
elseif ($id=='SnsPinterest') {
  $sns_link_idx = 2;
  $article_class = 'pinterest bxsh bdrs';
  $article_id = 'SnsPinterest';
  $title_img = '/images/main/ico_sns_02.png';
  $sns_text = 'pinterest';
  $next_first = 6;
}
elseif ($id=='SnsInstagram') {
  $sns_link_idx = 3;
  $article_class = 'instagram bxsh bdrs';
  $article_id = 'SnsInstagram';
  $title_img = '/images/main/ico_sns_03.png';
  $sns_text = 'pinterest';
  $next_first = 11;
}
elseif ($id=='SnsPictify') {
  $sns_link_idx = 4;
  $article_class = 'pictify bxsh bdrs';
  $article_id = 'SnsPictify';
  $title_img = '/images/main/ti_sns4.jpg';
  $sns_text = 'PICTIFY';
  $next_first = 16;
}

$Snscontents = new Snscontents();
$Snscontents->setAttr("sns_link_idx", $sns_link_idx);
$Snscontents->setAttr("sns_contents_idx", $idx );
$aList = $Snscontents->getRead($dbh);




try {
	/*
	if (!$Snscontents->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
	*/
} catch(Exception $e) {
	$dbh = null;
	//JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	//exit;
}

function daydiff($dateTo){
	//날짜를 받아서 일주일 이내면 몇 일 전
	//일주일 이후면 몇 주 전이면 몇 주 전 이라는 메시지 리턴

	$thisTime=new DateTime(date("Y-m-d"));
	$dateTo_tmp =new DateTime($dateTo);
	$result = date_diff( $dateTo_tmp, $thisTime);

	$days =  $result ->days;

	if ($days == 0){
		$mag = '오늘' ;
	}elseif ($days < 7){
		$mag = $days .'일 전' ;
	}else{
		$mag = round($days/7,0) .'주 전' ;
	}
	return $mag;
}


$sns_link = $Snscontents::getLink($dbh, $sns_link_idx );
?>

<div class="inner_sns_box">
	<h2><a href="<?php echo $sns_link; ?>" target="_blank"><img src="<?php echo $title_img; ?>" alt="<?php echo $sns_text; ?>" /></a></h2>
	<div class="sns_conbox">
<?php if (is_array($aList)): ?>
	<?php foreach($aList as $list): ?>
		<div class="conbox_inner">
			<div class="photo"><img src="<?php echo snsUploadPath, $list['up_file_name']; ?>" alt="<?php echo $sns_text; ?>_photo" /></div>
			<div class="cont">
				<h3><a href="<?php echo $sns_link; ?>" target="_blank"><?php echo (mb_strlen($list['sns_content_title'], 'UTF-8') > 14) ? mb_substr($list['sns_content_title'], 0, 14, 'UTF-8').' ...' : $list['sns_content_title']; ?></h3></a>
				<p><a href="<?php echo $sns_link; ?>" target="_blank"><?php echo $list['sns_content']; ?></a></p>
				<span class="date"><?php echo daydiff($list['create_date']); ?></span>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
	</div>
</div>

<?
$dbh = null;
$Snscontents = null;
unset($dbh);
unset($Snscontents);