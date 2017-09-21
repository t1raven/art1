<?php
if (!defined('OKTOMATO')) exit;
/*
//$newsUploadP= '/home/arthongs/www'.UPLOAD_DIR.'news' ; //-- News 업로드 파일 저장소
//echo ($newsUploadP .'<br>');
//exit;

//mkdir($newsUploadP, '0777');
//chmod($newsUploadP, '0757');
//exec("rm -rf $newsUploadP");

//chmod($newsUploadP, '0757');
*/
$Snslink = new Snslink();

$tmp = $Snslink->getList($dbh);
$list = $tmp[0];

require('skin/basic/list.head.skin.php');

foreach($list as $row) {
	include('skin/basic/list.body.skin.php');
}
require('skin/basic/list.foot.skin.php');

$Snslink = null;
$dbh = null;
$list = null;
$tmp = null;
unset($Snslink);
unset($dbh);
unset($list_cate);
unset($tmp);
if (gc_enabled()) gc_collect_cycles();
?>

