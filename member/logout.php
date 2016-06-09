<?php
require_once('../lib/include/global.inc.php');
$logout = true;
//require $_SERVER['DOCUMENT_ROOT'].'google_login_oauth/inc_google_login_check.php'; //구글 로그인 처리



//////////////////////
/////////////
// google login  by 2015-01-02  이용태
// 회원가입과 로그인 로직에서 include 한다.
// 구글로 회원가입과 로그인 처리
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/google_login_oauth/src/Google_Client.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/google_login_oauth/src/contrib/Google_Oauth2Service.php';
session_start();

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  return;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if (isset($logout)) {
  unset($_SESSION['token']);
  $client->revokeToken();
  //JS::LocationHref('로그아웃처리.', '/', 'parent');
}
/*
if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();

//  print_r($user);
$email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
$id = filter_var($user['id'], FILTER_SANITIZE_NUMBER_INT);

//echo '<br>email :'.$email.'<br>';
//echo '<br>id :'.$id.'<br>';


//  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
  $content = $user;

  $_SESSION['token'] = $client->getAccessToken();
}

else {
  $authUrl = $client->createAuthUrl();
}

//$authUrl = $client->createAuthUrl();
//echo $authUrl ;
if(isset($authUrl)) {
  //   $content = "<a class='login' href='$authUrl'>로그인</a>";
}
else {
 //  $content = "<a class='logout' href='?logout'>로그아웃</a>";
}
//echo "ddd";
//$content = "<br><a class='logout' href='?logout'>로그아웃</a>";
//echo $content;

*/
//////////////////////

session_destroy();
//JS::LocationHref('안녕히가세요.', '/member/login.php', 'parent');
JS::LocationHref('감사합니다.', '/', 'parent');

//include_once('skin/basic/logout-skin.php');
?>

