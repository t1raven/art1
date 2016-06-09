<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/admininfo/provision.class.php';

$provision_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : null;

$Provision = new Provision();
$Provision->setAttr("provision_idx", (int)$provision_idx);

try {
	if (!$Provision->getRead($dbh)) {
		throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	echo $e->getMessage();
	$dbh = null;
	exit;
}
?>

<? include "../inc/config.php"; ?>
<?php
if ($provision_idx == 1 ){
  $categoriName = "개인정보취급방침";
  $pageName = "개인정보취급방침";
}elseif ($provision_idx == 2 ){
  $categoriName = "이용약관";
  $pageName = "이용약관";
}elseif ($provision_idx == 3 ){
  $categoriName = "환불정책";
  $pageName = "환불정책";
}elseif ($provision_idx == 4 ){
  $categoriName = "배송정책(작품)";
  $pageName = "배송정책(작품)";
}elseif ($provision_idx == 5 ){
  $categoriName = "배송정책(상품)";
  $pageName = "배송정책(상품)";
}


  $pageNum = "10";
  $subNum = "1";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 



<?php echo htmlspecialchars_decode (   htmlspecialchars_decode($Provision->attr['provision_content']) ); ?>



  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













