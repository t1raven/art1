<?
require $_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php';
require ROOT.'lib/class/bbs/'.basename(__DIR__).'.class.php';
require ROOT.'lib/class/member/login.class.php';
require ROOT.'lib/class/admininfo/badwords.class.php';
require ROOT.'lib/function/common.php';
//require ROOT.'lib/include/controler.inc.php';

//로그인 체크후 사용 가능
if( $arr_user = Login::getLoginCheck('/') ){
	$user_level_code = $arr_user['user_level_code']; 
	$user_idx = $arr_user['user_idx']; 
}else{
	exit;
}

$bbs_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : null;
$comment_idx = isset($_POST['cidx']) ? Xss::chkXSS($_POST['cidx']) : null;
$comment_title = isset($_POST['com_title']) ? Xss::chkXSS($_POST['com_title']) : null;
$comment_content = isset($_POST['com_content']) ? Xss::chkXSS($_POST['com_content']) : null;

$comment_content = Badwords::badWords ($dbh, $comment_content);
if (empty(trim($comment_content)) ) { JS::Alert('댓글 내용을 입력하셔야 합니다.');  exit; }

/*
echo $mode .'<br>';
echo $bbs_idx .'<br>';
echo $comment_idx .'<br>';
echo $comment_content .'<br>';
*/
//exit;

$Bbs = new Bbs();
$Bbs->setAttr('bbs_idx', $bbs_idx);
$Bbs->setAttr('comment_idx', $comment_idx);
$Bbs->setAttr('comment_title', $comment_title);
$Bbs->setAttr('comment_content', $comment_content);
$Bbs->setAttr('user_idx', $user_idx);
$Bbs->setAttr('origin_user_idx', $user_idx);


try {
	//if ($mode == 'reply' && !is_null($bbs_idx)) {
	if ($mode == 'reply') {
		if ($Bbs->replyComment($dbh)) {
			Js::LocationReplace('코멘트 등록되었습니다.', '/bbs/?at=read&idx='.$bbs_idx, 'parent');
		}
		else {
		//	throw new Exception('게시물이 답변되지 않았습니다. 잠시후에 다시 하세요!');
		echo '코멘트 등록 안됨';
		}
	}
	elseif ($mode == 'edit' && !is_null($bbs_idx) && !is_null($bbs_code)) {
		/*
		if ($Bbs->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', '/bbs/?at=list&code='.$bbs_code, 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
		*/
	}
	else {
		if ($Bbs->insertComment($dbh)) {
			Js::LocationReplace('등록되었습니다.', '/bbs/?at=read&idx='.$bbs_idx, 'parent');
		}
		else {
			throw new Exception('게시물이 등록되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
}
catch(Exception $e) {
	 echo $e->getMessage();
	//mysql_unbuffered_query('rollback');
	JS::HistoryBack($e->getMessage());
}

$dbh = null;
$Bbs = null;
unset($dbh);
unset($Bbs);
?>