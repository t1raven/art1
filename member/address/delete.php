<?php
if (!defined('OKTOMATO')) exit;

$result = 0;
$addr_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;

if (!empty($addr_idx) && is_numeric($addr_idx)) {
	$Address = new Address();
	$Address->setAttr('addr_idx', $addr_idx);
	$result = ($Address->delete($dbh)) ? 1 : 0;
}
echo '{"cnt":'.$result.'}';

$Address = null;
$dbh = null;
unset($Address);
unset($dbh);
?>