<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/include/chk.gallery.inc.php';
require ROOT.'lib/class/partner/artists.class'.SOURCE_EXT;

$artistName = isset($_POST['artist']) ? LIB_LIB::CkSearch($_POST['artist']) : null;
$txt = isset($_POST['txt']) ? $_POST['txt'] : null;
$num = isset($_POST['num']) ? $_POST['num'] : null;

$artists = new Artists();
$artists->setAttr('artistName', $artistName);

if (!empty($artistName)) {
	$list = $artists->searchArtist($dbh);
	$cnt = count($list);
}
else {
	$list[] = null;
	$cnt = 0;
}
?>

<?php if ($cnt > 0 && is_array($list)) : ?>
	<?php foreach($list as $row) : ?>
	<tr>
		<td>
			<input type="radio" name="artistIdx" value="<?php echo  $row['artistIdx']; ?>">
			<input type="hidden" name="artistName" value="<?php echo  $row['artistName']; ?>">
			<input type="hidden" name="artistNameEn" value="<?php echo  $row['artistNameEn']; ?>">
			<input type="hidden" name="num" value="<?php echo  $num; ?>">
		</td>
		<td><div class="img"><img src="<?php echo galleriesArtistsUploadPath, $row['upfileName']; ?>" alt="" /></div></td>
		<td><?php echo $row['artistName'], '(', $row['birthday'], ')' ; ?></td>
		<td><?php echo $row['artistNameEn']; ?></td>
	</tr>
	<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="4">검색 결과가 존재하지 않습니다.</td>
	</tr>
<?php endif ; ?>
<?php
$artists = null;
$list = null;
$dbh = null;
unset($artists);
unset($list);
unset($dbh);