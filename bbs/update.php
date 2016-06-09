<?php
/*
include_once('../lib/include/global.inc.php');
include_once('../lib/class/bbs/bbs.class.php');
include_once('../lib/function/common.php');
*/


//로그인 체크후 사용 가능
if( $arr_user = Login::getLoginCheck('/') ){
	$user_level_code = $arr_user['user_level_code'];
	$user_idx = $arr_user['user_idx'];
}else{
	exit;
}

$bbs_idx = isset($_POST['idx']) ? Xss::chkXSS($_POST['idx']) : null;
$bbs_code = isset($_POST['code']) ? Xss::chkXSS($_POST['code']) : null;
$bbs_category = isset($_POST['category']) ? Xss::chkXSS($_POST['category']) : 10;
$bbs_author = isset($_POST['author']) ? Xss::chkXSS($_POST['author']) : null;
//$bbs_title = isset($_POST['title']) ? Xss::chkXSS($_POST['title']) : null;

$bbs_title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null;
//$bbs_title = isset($bbs_title) ? str_replace('\'','&//39;',Xss::chkXSS($bbs_title)) : null;
$bbs_title = isset($bbs_title) ? str_replace('\'','&#39;', $bbs_title) : null;


$bbs_content = isset($_POST['content']) ? Xss::chkXSS($_POST['content']) : null;
$bbs_pwd = isset($_POST['pwd']) ? Xss::chkXSS($_POST['pwd']) : null;
$bbs_list_img = isset($_POST['list_img']) ? Xss::chkXSS($_POST['list_img']) : null;
$notice = isset($_POST['notice']) ? Xss::chkXSS($_POST['notice']) : 0;
$secret = isset($_POST['secret']) ? Xss::chkXSS($_POST['secret']) : 0;
$begin_date = isset($_POST['begin_date']) ? Xss::chkXSS($_POST['begin_date']) : null;
$end_date = isset($_POST['end_date']) ? Xss::chkXSS($_POST['end_date']) : null;
$winning_date = isset($_POST['winning_date']) ? Xss::chkXSS($_POST['winning_date']) : null;
$mode = isset($_POST['mode']) ? Xss::chkXSS($_POST['mode']) : null;
$file_list = isset($_POST['file_list']) ? Xss::chkXSS($_POST['file_list']) : null;


//echo 'notice :'.$notice.'<br>';


/*
$bbs_idx = isset($_POST['idx']) ? AntiXSS::setFilter($_POST['idx'], "white", "everything") : null;
$bbs_code = isset($_POST['code']) ? AntiXSS::setFilter($_POST['code'], "white", "string") : null;
$bbs_category = isset($_POST['category']) ? AntiXSS::setFilter($_POST['category'], "white", "everything") : null;
$bbs_author = isset($_POST['author']) ? AntiXSS::setFilter($_POST['author'], "white", "string") : null;
$bbs_title = isset($_POST['title']) ? AntiXSS::setFilter($_POST['title'], "white", "string") : null;
$bbs_content = isset($_POST['content']) ? AntiXSS::setFilter($_POST['content'], "white", "string") : null;
$bbs_pwd = isset($_POST['pwd']) ? AntiXSS::setFilter($_POST['pwd'], "white", "string") : null;
$bbs_list_img = isset($_POST['list_img']) ? AntiXSS::setFilter($_POST['list_img'], "white", "string") : null;
$notice = isset($_POST['notice']) ? AntiXSS::setFilter($_POST['notice'], "white", "number") : 0;
$secret = isset($_POST['secret']) ? AntiXSS::setFilter($_POST['secret'], "white", "number") : 0;
$begin_date = isset($_POST['begin_date']) ? AntiXSS::setFilter($_POST['begin_date'], "white", "string") : null;
$end_date = isset($_POST['end_date']) ? AntiXSS::setFilter($_POST['end_date'], "white", "string") : null;
$winning_date = isset($_POST['winning_date']) ? AntiXSS::setFilter($_POST['winning_date'], "white", "string") : null;
$mode = isset($_POST['mode']) ? AntiXSS::setFilter($_POST['mode'], "white", "string") : null;
$file_list = isset($_POST['file_list']) ? Xss::chkXSS($_POST['file_list']) : null;
*/


//echo "notice:".gettype($notice);
//echo "file_list:".$file_list;

/*
foreach($file_list as $v){
	echo $v."<br>";
}
*/
//exit;


//$bbs_depth = '1';
//echo 'bbs_category :'.$bbs_category ;
//exit;
//$user_idx = '123456';
//$origin_user_idx = '123456';
//$bbs_author = '홍길동';
//$bbs_title = '제목';
//$bbs_content = '내용';
//$bbs_item = null;
//$bbs_pwd = '123456';
//$bbs_list_img = null;
//$bbs_state = null;
//$file_cnt = 0;
//$comment_cnt = 0;
//$notice = 0;
//$secret = 0;
//$begin_date = null;
//$end_date = null;
//$winning_date = null;

/////////////////////
// 금칙어 필터링 S
$bbs_content = Badwords::badWords ($dbh, $bbs_content);
$bbs_title = Badwords::badWords ($dbh, $bbs_title);
//echo Badwords::badWords ($dbh, $bbs_content);
//exit;
// 금칙어 필터링 E
/////////////////////



$Bbs = new Bbs();
$Bbs->setAttr('bbs_idx', $bbs_idx);
$Bbs->setAttr('bbs_code', $bbs_code);
$Bbs->setAttr('bbs_category', $bbs_category);
$Bbs->setAttr('user_idx', $user_idx);
//$Bbs->setAttr('origin_user_idx', $origin_user_idx);
$Bbs->setAttr('origin_user_idx', $user_idx);
$Bbs->setAttr('bbs_author', $bbs_author);
$Bbs->setAttr('bbs_title', $bbs_title);
$Bbs->setAttr('bbs_content', $bbs_content);
$Bbs->setAttr('bbs_item', $bbs_item);
$Bbs->setAttr('bbs_pwd', $bbs_pwd);
$Bbs->setAttr('bbs_hit', $bbs_hit);
$Bbs->setAttr('bbs_list_img', $bbs_list_img);
$Bbs->setAttr('bbs_state', $bbs_state);
$Bbs->setAttr('file_cnt', $file_cnt);
$Bbs->setAttr('comment_cnt', $comment_cnt);
$Bbs->setAttr('notice', $notice);
$Bbs->setAttr('secret', $secret);
$Bbs->setAttr('begin_date', $begin_date);
$Bbs->setAttr('end_date', $end_date);
$Bbs->setAttr('winning_date', $winning_date);
$Bbs->setAttr('file_list', $file_list);


try {
	if ($mode == 'reply' && !is_null($bbs_idx)) {
		if ($Bbs->reply($dbh)) {
			Js::LocationReplace('등록되었습니다.', '/bbs/?at=list&code='.$bbs_code, 'parent');
		}
		else {
			throw new Exception('게시물이 답변되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	elseif ($mode == 'edit' && !is_null($bbs_idx) && !is_null($bbs_code)) {
		if ($Bbs->update($dbh)) {
			Js::LocationReplace('수정되었습니다.', '/bbs/?at=list&code='.$bbs_code, 'parent');
		}
		else {
			throw new Exception('게시물이 수정되지 않았습니다. 잠시후에 다시 하세요!');
		}
	}
	else {
		if ($Bbs->insert($dbh)) {
			Js::LocationReplace('등록되었습니다.', '/bbs/?at=list&code='.$bbs_code, 'parent');
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