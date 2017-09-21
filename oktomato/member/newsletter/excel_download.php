<?php
if (!defined('OKTOMATO')) exit;

$Member = new Member();
$Member->setAttr("word", null);
$Member->setAttr("page", 1);
$Member->setAttr("sz", 1000000);
$Member->setAttr("bdate", null);
$Member->setAttr("edate", null);
$Member->setAttr("sort", 0);
$Member->setAttr("od", 0);
$tmp = $Member->getNewsletterList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_all_cnt = $tmp[2];

header("Content-Type: text/html; charset=UTF-8");

//파일명 지정
$file_name = 'mailing_'.date("Ymd").'.xls';


header( "Content-type: application/vnd.ms-excel" );   
header( "Content-type: application/vnd.ms-excel; charset=utf-8");  
header( "Content-Disposition: attachment; filename =".$file_name );   
header( "Content-Description: PHP4 Generated Data" );   
header( "Content-Type: text/html; charset=utf-8"); 


?>
<meta content="application/vnd.ms-excel; charset=UTF-8" name="Content-type"> 
<table border="1">
	<tr><th>메일</th><th>날짜</th></tr>
<?php
foreach($list as $row) { 
?>
	<tr>
		<td><?php echo $row['newsletter_email'] ?></td>
		<td><?php echo $row['create_date'] ?></td>
	</tr>
<?php } ?>
</table>
<?
$Member = null;
$dbh = null;
$tmp = null;
$list = null;
unset($Member);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>