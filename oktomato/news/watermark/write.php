<?php
if (!defined('OKTOMATO')) exit;

$water_idx = isset($_GET['idx']) ? (int)$_GET['idx'] : 6 ;

$Watermark = new Watermark();
$Watermark->setAttr('water_idx', $water_idx);
$Watermark->getEdit($dbh);

require('skin/basic/write.skin.php');

$Watermark = null;
$dbh = null;
unset($Watermark);
unset($dbh);
if (gc_enabled()) gc_collect_cycles();
?>