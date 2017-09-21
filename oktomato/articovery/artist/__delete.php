<?php
include $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'lib/class/market/artist.class.php';

$artist_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$attach = isset($_POST['attach']) ? Xss::chkXSS($_POST['attach']) : null;
$result = 0;


if (!empty($artist_idx)) {
	$Artist = new Artist();
	$Artist->setAttr('artist_idx', $artist_idx);

	if ($attach === 'photo' || $attach === 'cv') {
		$result = ($Artist->deleteAttachAjax($dbh, $attach)) ? 1 : 0;
	}
	else {
		$result = ($Artist->delete($dbh)) ? 1 : 0;
	}
	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}