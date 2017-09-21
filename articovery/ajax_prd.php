<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once(ROOT.'lib/class/articovery/'.basename(__DIR__).'.class.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sz = isset($_GET['sz']) ? $_GET['sz'] : ARTWORKSLISTCOUNT;

if ( $check_mobile == true ){
	$sz = 15;
}else{
	$sz = ARTWORKSLISTCOUNT;
}

$Articovery = new Articovery();
$covery_idx = $Articovery->getCoveryIdx($dbh);
$Articovery->setAttr('covery_idx', '1');
$Articovery->setAttr('page', $page);
$Articovery->setAttr('sz', $sz);
$worksTotalCount = $Articovery->getWorksCount($dbh);
$totalPage = ceil($worksTotalCount / $sz);

if ((int)$page === 1) {
	unset($_SESSION['rdmNbr']);
}

if ($worksTotalCount > 0) {
	$j = 0;

	if ($worksTotalCount >= $sz) {
		$kk = $worksTotalCount % $sz;

		if ($kk === 0) {
			$aCnt = $worksTotalCount - $sz;
		}
		else {
			$aCnt = $worksTotalCount - ($kk + $sz);
		}

		//echo "kk:$kk";
		//echo "aCnt:$aCnt";

		for ($i = 0; $i <= $aCnt; $i+=$sz) {
			$aValue[$j] = $i;
			$j++;
		}
	}
	else {
		$aValue[0] = 0;
	}



	//print_r($aValue);

	if (!is_null($_SESSION['rdmNbr'])) {
		//echo "세션존재";
	}
	else {
		//echo "세션존재하지 않음";
		$aryLastValue = $aValue[sizeof($aValue) -1];

		shuffle($aValue);

		$_SESSION['rdmNbr'] = $aValue;

		//print_r($_SESSION['rdmNbr']);

		if ($worksTotalCount > $sz) {
			if ($kk !== 0) {
				$_SESSION['rdmNbr'][sizeof($aValue)] = $aryLastValue + $sz;
			}
		}

		//print_r($_SESSION['rdmNbr']);
	}


	$Articovery->setAttr('rdmstart', $_SESSION['rdmNbr'][(int)$page - 1]);

	$tmp = $Articovery->getList2($dbh); // ori
	//$tmp = $Articovery->getList($dbh);
	$list = $tmp[0];

	if ($_SESSION['user_idx']) {
		$user_idx = AES256::dec($_SESSION['user_idx'], AES_KEY);
		$Articovery->setAttr('user_idx', $user_idx);
		$myPinList = $Articovery->getMyPin($dbh);
		//print_r($myPinList);

		if (sizeof($myPinList) < 0) {
			for($i=0; $i < sizeof($myPinList); $i++) {
				$aryMyPin[$i] = $myPinList[$i]['works_idx'];
			}
		}
		else {
			$aryMyPin = array();
		}

		//$myPinList = $Articovery->getMyPinList($dbh);
	}
	else {
		$aryMyPin = array();
	}

?>

<?php foreach ($list as $row) : ?>
<div class="box-thumb">
	<a href="javascript:void(0);" class="inner">
		<?php if ($_SESSION['user_idx']): ?>
		<span class="thumb" onclick="bpop('<?php echo $row['works_idx']; ?>'); return false;">
		<?php else: ?>
		<span class="thumb" onclick="layerPopup3.open('popup_join.php','popup_join');return false;">
		<?php endif; ?>
			<span class="img"><img src="/upload/articovery/thumb/<?php echo $row['works_img']; ?>" alt=""></span>
		</span>
		<span class="cont">
			<span class="h"><?php echo $row['works_make_type']; ?></span>
			<span class="pin">
				<span class="img"><img src="/images/articovery/img_pin_<?php if (in_array($row['works_idx'], $aryMyPin)) : ?>on<?php else: ?>off<?php endif; ?>.png" id="img-pin-<?php echo $row['works_idx']; ?>" alt="">
				</span>
				<span class="t1">
					PIN <?php echo number_format($row['works_pin_count']); ?>
				</span>
			</span>
		</span>
</a>
</div>
<?php endforeach; ?>

<?php
}

$dbh = null;
$Articovery = null;
unset($dbh);
unset($Articovery);

