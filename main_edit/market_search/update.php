<?php
if (!defined('OKTOMATO')) exit;

$mainContentIdx			= isset($_POST['mainContentIdx']) ? $_POST['mainContentIdx'] : null;
$goodsIdx					= isset($_POST['goodsIdx']) ? $_POST['goodsIdx'] : null;
$contentType				= isset($_POST['contentType']) ? $_POST['contentType'] : null;
$colortype					= isset($_POST['colortype']) ? $_POST['colortype'] : null;
$positionType				= isset($_POST['positiontype']) ? $_POST['positiontype'] : null;

$colortype					= ($colortype != 'black') ? 'W' : 'B' ;
$positionType				= ($positionType != 'right') ? 'L' : 'R' ;

$main = new Main();
$main->setAttr('mainContentIdx', Xss::chkXSS($mainContentIdx));
$main->setAttr('goodsIdx', Xss::chkXSS($goodsIdx));
$main->setAttr('contentType', Xss::chkXSS($contentType));
$main->setAttr('colortype', Xss::chkXSS($colortype));
$main->setAttr('positionType', Xss::chkXSS($positionType));

try{
	if (!empty($mainContentIdx) ) {
		//다른 컨텐츠를 선택해서 기존의 파일을 삭제할 수 없을 경우 이전에 등록된 이미지 삭제
		$row = $main->getContentEdit($dbh, $mainContentIdx);
		if(!empty($row['upFileName'])) {
			LIB_FILE::DeleteFile(str_replace('//','/',ROOT.$row['upFileName']) );
		}
		
		$rResult = $main->updateContent($dbh);
		$msg = "업데이트 성공";
	}
	else {
		$msg = "ajax Error";
		//$rResult = $main->insertArr($dbh);
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//JS::HistoryBack($e->getMessage());
}

$Content = null;
$dbh = null;

unset($Content);
unset($dbh);
?>
{"result":"<?php echo $rResult?>", "msg":"<?php echo $msg?>"}