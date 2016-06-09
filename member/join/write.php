<?php
if (!defined('OKTOMATO')) exit;

//구글 로그인 로직 처리
require_once '../../google_login_oauth/inc_google_login_check.php';

require('skin/basic/write.skin.php');

echo ACTION_IFRAME;
?>