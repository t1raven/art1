<?php
if (!defined('OKTOMATO')) exit;

$covery_idx = isset($_POST['cidx']) ? $_POST['cidx'] : 1;
$point_idx = isset($_POST['pidx']) ? $_POST['pidx'] : 1;
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$sz = isset($_POST['sz']) ? $_POST['sz'] : 10;
$aryColor = array('black', 'green', 'red', 'purple');
//$params = 'at='.$at;

$Point = new Point();
$Point->setAttr('covery_idx', $covery_idx);
$Point->setAttr('point_idx', $point_idx);
$Point->setAttr('page', $page);
$Point->setAttr('sz', $sz);

$tmp = $Point->getPointComment($dbh);
$comments = $tmp[0];
$total_cnt = $tmp[1];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = 10; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->scriptPageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page);

require 'skin/comment.skin.php';

$Point = null;
$dbh = null;
unset($Point);
unset($dbh);
