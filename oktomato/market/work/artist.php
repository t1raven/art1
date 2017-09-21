<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require $_SERVER['DOCUMENT_ROOT'].'lib/class/market/artist.class.php';

$artist_name = isset($_POST['artist']) ? $_POST['artist'] : null;

$Artist = new Artist();
$Artist->setAttr("artist_name", $artist_name);

if (!empty($artist_name)) {
	$list = $Artist->getSearchArtist($dbh);
	$cnt = count($list);
}
else {
	$list[] = null;
	$cnt = 0;
}

$i = 1;

if ($cnt > 0) {
	foreach($list as $row){
		$idx = $row['artist_idx'];
		$name = $row['artist_name'];
		$htmlClass =  ($i / 2 == 0) ? ' class=rgh' : '';
?>
		<li><button<?php echo $htmlClass;?> type="button" onclick="setArtistInsert('<?php echo $idx;?>','<?php echo $name;?>');"><?php echo $row['artist_name'].'('.substr($row['artist_birthday'], 0, 4).')  '.$row['education_name_1'];?></button></li>
<?php
		++$i;
	}

}
else {
?>
	<li>검색 결과가 존재하지 않습니다.</li>
<?php
}

$Artist = null;
$dbh = null;
unset($Artist);
unset($list);
unset($dbh);
?>
