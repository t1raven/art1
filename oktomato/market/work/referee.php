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
		//$sHTML .='<li><button'.$htmlClass.' type=\"button\" onclick=\"setArtistInsert('.$row['artist_idx'].', '.$row['artist_name'].');\">'.$row['artist_name'].$row['birth_year'].$row['education_name_1'].'</button></li>';
		$sHTML .="<li><button type='button' onclick=setRefereeInsert('".$idx."','".$name."');>".$row['referee'].'</button></li>';
		$i++;
	}
	$result = '__complete';
}
else {
	$sHTML = '<li>검색 결과가 존재하지 않습니다.</li>';
	$result = '__complete';
}

$Artist = null;
$dbh = null;
unset($Artist);
unset($list);
unset($dbh);
?>
{"result":"<?php echo $result?>", "sHTML": "<?php echo $sHTML?>"}