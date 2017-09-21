<?php
if (!defined('OKTOMATO')) exit;

$provision_idx = isset($_POST['idx']) ? $_POST['idx'] : null;
$provision_content = isset($_POST['content']) ? $_POST['content'] : null;
$provision_content = isset($provision_content) ? Str_replace('\'','&//39;',Xss::chkXSS($provision_content)) : null;
$provision_content = Str_replace('"','&quot;',  $provision_content);

//echo $provision_content ;
//exit;
$Provision = new Provision();

$Provision->setAttr('provision_idx', $provision_idx);
$Provision->setAttr('provision_content', $provision_content);

try {
	if ($Provision->update($dbh)) {
				Js::LocationReplace('수정되었습니다.', '?at=write&idx='.$provision_idx, 'parent');
	}else {
		throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	//JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Provision = null;
unset($dbh);
unset($Provision);
?>