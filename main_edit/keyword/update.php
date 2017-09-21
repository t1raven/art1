<?php
if (!defined('OKTOMATO')) exit;


$aMainKeywordIdx = isset($_POST['mainKeywordIdx']) ? $_POST['mainKeywordIdx'] : null;
$aKeywordText = isset($_POST['keywordText']) ? $_POST['keywordText'] : null;
$aKeywordLink = isset($_POST['keywordLink']) ? $_POST['keywordLink'] : null;
$aSort = isset($_POST['sort']) ? $_POST['sort'] : null;

$main = new Main();

$i=0;
foreach ($aMainKeywordIdx as $value) {
	$aIsNew[$i] =  $_POST['isNew_'.$i];
	$i++;
}

$main->setAttr('aMainKeywordIdx', $aMainKeywordIdx);
$main->setAttr('aKeywordText', $aKeywordText);
$main->setAttr('aKeywordLink', $aKeywordLink);
$main->setAttr('aIsNew', $aIsNew);
$main->setAttr('aSort', $aSort);

try{
	if (!empty($aMainKeywordIdx) ) {
		//echo "chk1";
		$rResult[0] = $main->updateKeyword($dbh);
		if($rResult[0]) {
			$msg = "업데이트 성공";
			$result = true;
		} else {
			$result = false;
		}
	}
	else {
		$msg = "ajax Error";
		//echo "chk2";
		//$rResult = $main->insertArr($dbh);
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//JS::HistoryBack($e->getMessage());
}

$banner = null;
$dbh = null;

unset($banner);
unset($dbh);
?>
{"result":"<?php echo $result?>", "msg":"<?php echo $msg?>"}