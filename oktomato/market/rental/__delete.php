<?php
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/market/'.basename(__DIR__).'.class.php';
//require ROOT.'lib/include/controler.inc.php';


$rental_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$result = 0;


if (!empty($rental_idx)) {
	$Rental = new Rental();
	$Rental->setAttr('rental_idx', $rental_idx);

	$result = ($Rental->delete($dbh)) ? 1 : 0;

	$dbh = null;
}
?>
{"cnt":<?php echo $result;?>}