<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require $_SERVER['DOCUMENT_ROOT'].'lib/class/market/marketmain.class.php';

$evt_title = isset($_POST['eventtitle']) ? $_POST['eventtitle'] : null;
$txt = isset($_POST['txt']) ? $_POST['txt'] : null;
$num = isset($_POST['num']) ? $_POST['num'] : null;

$Marketmain = new Marketmain();
$Marketmain->setAttr("evt_title", $evt_title);

if (!empty($evt_title)) {
	$list = $Marketmain->getEventExhibitionList($dbh);
	$cnt = count($list);
	//print_r($list);
}
else {
	$list[] = null;
	$cnt = 0;
}

$i = 1;

if ($cnt > 0) {
	foreach($list as $row){
		$idx = $row['evt_idx'];
		$eventTitle = $row['evt_title'];
		$htmlClass =  ($i / 2 == 0) ? ' class=rgh' : '';
?>
		<li><button type="button" onclick="setEventExhibitionInsert('<?php echo $idx;?>','<?php echo $eventTitle;?>','<?php echo $txt;?>','<?php echo $num;?>');"><?php echo $eventTitle; ?></button></li>
<?php
		++$i;
	}

}
else {
?>
	<li>검색 결과가 존재하지 않습니다.</li>;
<?php
}

$Marketmain = null;
$list = null;
$dbh = null;
unset($Marketmain);
unset($list);
unset($dbh);
?>
