<?php
//echo $_SERVER["SCRIPT_NAME"];
//www �� ������ www �ּҷ� �����̷��� //by 2015-01-09 �̿���
/*
if($_SERVER["HTTP_HOST"] != 'www.art1.com'){
	$query_string = (!empty($_SERVER["QUERY_STRING"]))? '?'.$_SERVER["QUERY_STRING"]: NULL ;
	$script_name = ($_SERVER["SCRIPT_NAME"]=='/index.php')? NULL : $_SERVER["SCRIPT_NAME"] ;
	header('Location: http://www.art1.com'.$script_name.$query_string);
	exit;
}
*/
require $_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php';
@session_start(); // ���� ������ �ʱ�ȭ

$currentFolder = "";
?>
