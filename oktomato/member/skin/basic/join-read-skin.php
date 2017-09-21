<?php
require_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'lib/class/member/member.class.php');

$user_idx = isset($_GET['idx']) ? $_GET['idx'] : null;
$s_date =  isset($_GET['s_date']) ? $_GET['s_date'] : null;
$l_date =  isset($_GET['l_date']) ? $_GET['l_date'] : null;
$u_level =  isset($_GET['u_level']) ? $_GET['u_level'] : null;
$word =  isset($_GET['word']) ? $_GET['word'] : null;
$page =  isset($_GET['page']) ? $_GET['page'] : null;


$listParams = '&at=list&s_date='.$s_date.'&l_date='.$l_date.'&u_level='.$u_level.'&word='.$word;
$editParams = '&at=write&idx='.$user_idx.'&s_date='.$s_date.'&l_date='.$l_date.'&u_level='.$u_level.'&word='.$word.'&mode=edit';
$replyParams = '&at=write&code='.$bbs_code.'&idx='.$bbs_idx.'&mode=reply';

$Member = new Member();
$Member->setAttr("user_idx", $user_idx);

try {
	if (!$Member->getRead($dbh)) {
		 throw new Exception("게시물이 존재하지 않습니다.");
	}
} catch(Exception $e) {
	$dbh = null;
	JS::LocationHref($e->getMessage(), PHP_SELF.'?page='.$page.$listParams);
	exit;
}
?>
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>

<p>이름 : <?php echo $Member->attr['user_name']; ?> </p>
<p>이메일 : <?php echo $Member->attr['user_id']; ?></p>
<p>이메일 수신여부 : <?php if (!empty($Member->attr['newsletter_status'])) { echo('수신동의'); } else { echo('수신거부'); }   ?></p>
<p>SMS 수신여부 : <?php if (!empty($Member->attr['sms_status'])) { echo('수신동의'); } else { echo('수신거부'); }   ?> </p>
<p>회원레벨  : <?php echo $Member->attr['user_level_name']; ?> </p>
<?php
unset($Member->attr);
?>
</br>
<button onclick="location.href='/oktomato/member/join-list.php?page=<?=$page.$listParams?>'">목록</button>
<button onclick="location.href='/oktomato/member/join-write.php?page=<?=$page.$editParams?>'">수정</button>
<button onclick="articleDelete();">삭제</button>


<script type="text/javascript">
function articleDelete()
{
	if(!confirm('회원을 정보를 삭제하시겠습니까? 삭제된 데이터는 복구할 수 없습니다.')){
		return false;
	}

	$.ajax({
		type:"POST",
		url:"/oktomato/member/__delete.php",
		dataType:"JSON",
		data:{"idx":<?php echo $user_idx;?>},
		success: function(data) {
			if (data.cnt > 0) {
				alert("삭제되었습니다.");
				location.href="/oktomato/member/join-list.php?at=list";
				//location.reload();
			}
			else{
				alert("삭제할 수 없습니다.");
			}
		},
		error: function(xhr, status, error) {
			alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
		}
	});

}
</script>