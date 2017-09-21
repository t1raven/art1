<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require $_SERVER['DOCUMENT_ROOT'].'lib/class/market/marketmain.class.php';

$goods_name = isset($_POST['artwork']) ? $_POST['artwork'] : null;
$txt = isset($_POST['txt']) ? $_POST['txt'] : null;
$num = isset($_POST['num']) ? $_POST['num'] : null;

$Marketmain = new Marketmain();
$Marketmain->setAttr("goods_name", $goods_name);

if (!empty($goods_name)) {
	$list = $Marketmain->getGoodsListInfo($dbh);
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
		$idx = $row['goods_idx'];
		$goodsName = $row['goods_name'];
		$artistName = $row['artist_name'];
		$htmlClass =  ($i / 2 == 0) ? ' class=rgh' : '';
?>
		<li><button type="button" onclick="setArtWorkInsert('<?php echo $idx;?>','<?php echo $goodsName;?>','<?php echo $artistName;?>','<?php echo $txt;?>','<?php echo $num;?>');"><?php echo $row['goods_name'].'('.$row['artist_name'].')';?></button></li>
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
