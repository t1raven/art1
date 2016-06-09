<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/include/chk.gallery.inc.php';
require ROOT.'lib/class/partner/artworks.class'.SOURCE_EXT;

$worksName = isset($_POST['artworks']) ? LIB_LIB::CkSearch($_POST['artworks']) : null;
$txt = isset($_POST['txt']) ? $_POST['txt'] : null;
$num = isset($_POST['num']) ? $_POST['num'] : null;

$artworks = new Artworks();
$artworks->setAttr('worksName', $worksName);

if (!empty($worksName)) {
	$list = $artworks->searchArtworks($dbh);
	$cnt = count($list);
}
else {
	$list[] = null;
	$cnt = 0;
}


if ($cnt > 0 && is_array($list)) {
	foreach($list as $row) {
?>
	<tr>
		<td>
			<input type="radio" name="worksIdx" value="<?php echo  $row['worksIdx']; ?>">
			<input type="hidden" name="worksName" value="<?php echo  $row['worksName']; ?>">
			<input type="hidden" name="worksNameEn" value="<?php echo  $row['worksNameEn']; ?>">
			<input type="hidden" name="artistIdx" value="<?php echo  $row['artistIdx']; ?>">
			<input type="hidden" name="artistName" value="<?php echo  $row['artistName']; ?>">
			<input type="hidden" name="artistNameEn" value="<?php echo  $row['artistNameEn']; ?>">
			<input type="hidden" name="artworksImg" value="<?php echo  $row['upfileName']; ?>">
			<input type="hidden" name="num" value="<?php echo  $num; ?>">
		</td>
		<td><div class="img"><img src="<?php echo galleriesArtworksUploadPath, $row['upfileName']; ?>" alt="" /></div></td>
		<td><?php echo $row['artistName'], '(', $row['artistNameEn'], ')', ' | ', $row['worksName'], '(', $row['makingDate'], ')' ; ?></td>
	</tr>
<?php
	}
}
else {
?>
	<tr>
		<td colspan="3">검색 결과가 존재하지 않습니다.</td>
	</tr>
<?php
}

$artworks = null;
$list = null;
$dbh = null;
unset($artworks);
unset($list);
unset($dbh);