<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/include/chk.gallery.inc.php';
require ROOT.'lib/class/partner/artfairs.class'.SOURCE_EXT;

$sw = isset($_POST['sw']) ? LIB_LIB::CkSearch($_POST['sw']) : null;
$txt = isset($_POST['txt']) ? $_POST['txt'] : null;
$num = isset($_POST['num']) ? $_POST['num'] : null;

$artfairs = new Artfairs();
$artfairs->setAttr('sw', $sw);

if (!empty($sw)) {
	$list = $artfairs->searchArtfairs($dbh);
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
			<input type="radio" name="fairPoolIdx" value="<?php echo  $row['fairPoolIdx']; ?>">
			<input type="hidden" name="fairTitle" value="<?php echo  $row['fairTitle']; ?>">
			<input type="hidden" name="fairTitleEn" value="<?php echo  $row['fairTitleEn']; ?>">
			<input type="hidden" name="beginDate" value="<?php echo  $row['beginDate']; ?>">
			<input type="hidden" name="endDate" value="<?php echo  $row['endDate']; ?>">
			<input type="hidden" name="link" value="<?php echo  $row['link']; ?>">
			<input type="hidden" name="upfileName" value="<?php echo  $row['upfileName']; ?>">
			<input type="hidden" name="num" value="<?php echo  $num; ?>">
		</td>
		<td><div class="img"><img src="<?php echo galleriesArtFairsUploadPath, $row['upfileName']; ?>" alt="" /></div></td>
		<td><?php echo $row['fairTitle'], '(', $row['fairTitleEn'], ')' ; ?></td>
	</tr>
	<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="4">검색 결과가 존재하지 않습니다.</td>
	</tr>
<?php endif ; ?>
<?php
$artfairs = null;
$list = null;
$dbh = null;
unset($artfairs);
unset($list);
unset($dbh);