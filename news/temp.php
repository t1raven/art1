<?php
//www 가 없으면 www 주소로 리다이렉팅
if($_SERVER["HTTP_HOST"] != 'www.art1.com'){
	$query_string = (!empty($_SERVER["QUERY_STRING"]))? $query_string = '?'.$_SERVER["QUERY_STRING"]: NULL ; 
	header('Location: http://www.art1.com'.$_SERVER["SCRIPT_NAME"].$query_string);
}
?>