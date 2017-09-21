<?php
if (!defined('OKTOMATO')) exit;

$emailIdx = isset($_GET['idx']) ? $_GET['idx'] : null;

$sendmail = new Sendmail();
$sendmail->setAttr("emailIdx", $emailIdx);
$result = $sendmail->getRead($dbh);

include 'skin/basic/read.skin.php';

$sendmail = null;
$dbh = null;
unset($sendmail);
unset($dbh);

if (gc_enabled()) gc_collect_cycles();