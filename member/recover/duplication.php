<?php
if (!defined('OKTOMATO')) exit;

$user_id = isset($_POST['uid']) ? Xss::chkXSS($_POST['uid']) : null;

if (empty($user_id) || is_null($user_id)) {
	$result = 2;
}
else {
	if (LIB_LIB::chkMail(trim($user_id))) {
		$Recover = new Recover();
		$Recover->setAttr('user_id', $user_id);
		$Recover->setAttr('del_state', 'N');
		$result = ($Recover->chkEmailDuplication($dbh)) ? 0 : 1;
		$dbh = null;
		unset($Recover);
	}
	else {
		$result = 3;
	}
}
?>
{"cnt":<?php echo $result ;?>}