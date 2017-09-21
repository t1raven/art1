<?php
if (!defined('OKTOMATO')) exit;

$categoriName = 'articovery';
$pageName = 'articovery';
$pageNum = '5';
$subNum = '1';
$thirdNum = '0';
$pathType = 'b';

include ROOT.'inc/link.php';
include ROOT.'inc/top.php';
include ROOT.'inc/header.php';
require 'skin/list.skin.php';
include ROOT.'inc/footer.php';
include ROOT.'inc/bot.php';
