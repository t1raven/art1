<?php
//phpinfo();
//exit;

require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require(ROOT.'lib/include/chk.admin.inc.php');
require ROOT.'lib/class/news/'.basename(__DIR__).'.class.php';
require ROOT.'lib/class/news/newstype.class.php';

require ROOT.'lib/class/news/watermark.class.php';

require ROOT.'lib/include/controler.inc.php';
?>