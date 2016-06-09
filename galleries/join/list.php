<?php
if (!defined('OKTOMATO')) exit;

$categoriName = '입점신청';
$pageName = 'Artists';
$pageNum = '4';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/spot_sub.php';
require 'skin/basic/list.skin.php';
include '../../inc/footer.php';
include '../../inc/bot.php';

$dbh = null;
$about = null;
unset($dbh);
unset($about);