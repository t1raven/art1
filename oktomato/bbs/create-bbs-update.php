<?php
require_once('../../lib/include/global.inc.php');
require_once('../../lib/class/bbs/createbbs.class.php');

$bbs_code = isset($_POST['code']) ? $_POST['code'] : null;
$bbs_name = isset($_POST['name']) ? $_POST['name'] : null;
$bbs_skin = isset($_POST['skin']) ? $_POST['skin'] : null;
$bbs_category = isset($_POST['category']) ? $_POST['category'] : null;
$list_level = isset($_POST['list_level']) ? $_POST['list_level'] : null;
$read_level = isset($_POST['read_level']) ? $_POST['read_level'] : null;
$write_level = isset($_POST['write_level']) ? $_POST['write_level'] : null;
$reply_level = isset($_POST['reply_level']) ? $_POST['reply_level'] : null;
$comment_level = isset($_POST['comment_level']) ? $_POST['comment_level'] : null;
$alert_msg = isset($_POST['alert_msg']) ? $_POST['alert_msg'] : null;
$title_length = isset($_POST['title_length']) ? $_POST['title_length'] : null;
$new_time = isset($_POST['new_time']) ? $_POST['new_time'] : null;
$hit_cnt = isset($_POST['hit_cnt']) ? $_POST['hit_cnt'] : null;
$img_size_width = isset($_POST['width_size']) ? $_POST['width_size'] : null;
$img_size_height = isset($_POST['height_size']) ? $_POST['height_size'] : null;
$img_size_type = isset($_POST['size_type']) ? $_POST['size_type'] : null;
$list_size = isset($_POST['list_size']) ? $_POST['list_size'] : null;
$block_size = isset($_POST['block_size']) ? $_POST['block_size'] : null;
$upload_size = isset($_POST['upload_size']) ? $_POST['upload_size'] : null;
$comment_state = isset($_POST['comment_state']) ? $_POST['comment_state'] : null;
$secret_state = isset($_POST['secret_state']) ? $_POST['secret_state'] : null;
$read_list_state = isset($_POST['read_list_state']) ? $_POST['read_list_state'] : null;
$notice_state = isset($_POST['notice_state']) ? $_POST['notice_state'] : 0;
$reply_state = isset($_POST['reply_state']) ? $_POST['reply_state'] : 0;
$write_sms_state = isset($_POST['write_sms_state']) ? $_POST['write_sms_state'] : null;
$reply_sms_state = isset($_POST['reply_sms_state']) ? $_POST['reply_sms_state'] : null;
$sms_charger = isset($_POST['sms_charger']) ? $_POST['sms_charger'] : null;
$sms_nbr = isset($_POST['sms_nbr']) ? $_POST['sms_nbr'] : null;
$write_email = isset($_POST['write_email']) ? $_POST['write_email'] : 0;
$reply_email = isset($_POST['reply_email']) ? $_POST['reply_email'] : 0;
$email_charger = isset($_POST['email_charger']) ? $_POST['email_charger'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nomember_agree = isset($_POST['nomember_agree']) ? $_POST['nomember_agree'] : null;
$spam_state = isset($_POST['spam_state']) ? $_POST['spam_state'] : null;
$prohibition_word = isset($_POST['prohibition_word']) ? $_POST['prohibition_word'] : null;
$del_state = isset($_POST['del_state']) ? $_POST['del_state'] : null;
$mode = isset($_POST['mode']) ? $_POST['mode'] : null;

$BbsCreate = new CreateBbs();
$BbsCreate->setAttr('bbs_code', $bbs_code);
$BbsCreate->setAttr('bbs_name', $bbs_name);
$BbsCreate->setAttr('bbs_skin', $bbs_skin);
$BbsCreate->setAttr('bbs_category', $bbs_category);
$BbsCreate->setAttr('list_level', $list_level);
$BbsCreate->setAttr('read_level', $read_level);
$BbsCreate->setAttr('write_level', $write_level);
$BbsCreate->setAttr('reply_level', $reply_level);
$BbsCreate->setAttr('comment_level', $comment_level);
$BbsCreate->setAttr('alert_msg', $alert_msg);
$BbsCreate->setAttr('title_length', $title_length);
$BbsCreate->setAttr('new_time', $new_time);
$BbsCreate->setAttr('hit_cnt', $hit_cnt);
$BbsCreate->setAttr('img_size_width', $img_size_width);
$BbsCreate->setAttr('img_size_height', $img_size_height);
$BbsCreate->setAttr('img_size_type', $img_size_type);
$BbsCreate->setAttr('list_size', $list_size);
$BbsCreate->setAttr('block_size', $block_size);
$BbsCreate->setAttr('upload_size', $upload_size);
$BbsCreate->setAttr('comment_state', $comment_state);
$BbsCreate->setAttr('secret_state', $secret_state);
$BbsCreate->setAttr('read_list_state', $read_list_state);
$BbsCreate->setAttr('notice_state', $notice_state);
$BbsCreate->setAttr('reply_state', $reply_state);
$BbsCreate->setAttr('write_sms_state', $write_sms_state);
$BbsCreate->setAttr('reply_sms_state', $reply_sms_state);
$BbsCreate->setAttr('sms_charger', $sms_charger);
$BbsCreate->setAttr('sms_nbr', $sms_nbr);
$BbsCreate->setAttr('write_email', $write_email);
$BbsCreate->setAttr('reply_email', $reply_email);
$BbsCreate->setAttr('email', $email);
$BbsCreate->setAttr('nomember_agree', $nomember_agree);
$BbsCreate->setAttr('spam_state', $spam_state);
$BbsCreate->setAttr('prohibition_word', $prohibition_word);
$BbsCreate->setAttr('del_state', $del_state);

try {
	if ($mode == 'edit' && !is_null($bbs_code)) {
		if ($BbsCreate->update($dbh)) {
			JS::LocationReplace('수정되었습니다.', 'bbs-list.php', '');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요.');
		}
	}
	elseif ($mode == 'delete' && !is_null($bbs_code)) {
		if ($BbsCreate->delete($dbh)) {
			JS::LocationReplace('수정되었습니다.', 'bbs-list.php', '');
		}
		else {
			throw new Exception('수정되지 않았습니다. 잠시후에 다시 하세요.');
		}
	}

	else {
		if ($BbsCreate->insert($dbh)) {
			JS::LocationReplace('생성되었습니다.', 'bbs-list.php', '');
		}
		else {
			throw new Exception('생성되지 않았습니다. 잠시후에 다시 하세요.');
		}
	}
}
catch(Exception $e) {
	 $dbh = null;
	 echo $e->getMessage();
	JS::HistoryBack( $e->getMessage() );
}

if ($dbh != null) $dbh = null;
?>