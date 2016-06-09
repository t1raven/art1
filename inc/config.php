<?php
//echo $_SERVER["SCRIPT_NAME"];
//www 가 없으면 www 주소로 리다이렉팅 //by 2015-01-09 이용태
/*
if($_SERVER["HTTP_HOST"] != 'www.art1.com'){
	$query_string = (!empty($_SERVER["QUERY_STRING"]))? '?'.$_SERVER["QUERY_STRING"]: NULL ;
	$script_name = ($_SERVER["SCRIPT_NAME"]=='/index.php')? NULL : $_SERVER["SCRIPT_NAME"] ;
	header('Location: http://www.art1.com'.$script_name.$query_string);
	exit;
}
*/
require $_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php';
@session_start(); // 세션 데이터 초기화

$currentFolder = "";
?>
