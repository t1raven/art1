<?php
include_once($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/function/common.php');
include_once($_SERVER['DOCUMENT_ROOT'].'lib/class/member/member.class.php');


$s_date = setIsset($_GET['s_date'], NULL);
$l_date = setIsset($_GET['l_date'], NULL);
$u_level = setIsset($_GET['u_level'], NULL);
$word = setIsset($_GET['word'],NULL);
$page = setIsset($_GET['page'], 1);
$list_size = setIsset($_GET['list_size'], 10);
$orderby = setIsset($_GET['orderby'], NULL);
//$list_size = 10;

//$params = 'at='.$at.'&st='.$search_type.'&word='.$word.'&category='.$category;
$readParams = '&at=read&s_date='.$s_date.'&l_date='.$l_date.'&u_level='.$u_level.'&word='.$word ;
$params = 'at='.$at.'&list_size='.$list_size.'&orderby='.$orderby.'&word='.$word.'&s_date='.$s_date.'&l_date='.$l_date.'&u_level='.$u_level;
//$params = getQusryString ('at='.$at.'&list_size='.$list_size.'&orderby='.$orderby.'&word='.$word.'&s_date='.$s_date.'&l_date='.$l_date.'&u_level='.$u_level) ; 
//$readParams = getQusryString ('&at=read') ; 

$Member = new Member();
$Member->setAttr("page", $page);
$Member->setAttr("list_size", $list_size);
$Member->setAttr("word", $word);
$Member->setAttr("bdate", $s_date);
$Member->setAttr("edate", $l_date);
$Member->setAttr("ulevel", $u_level);
$Member->setAttr("orderby", $orderby);
$tmp = $Member->getList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
$total_all_cnt = $tmp[2];

echo 'u_level: '.$u_level.'<br>';
echo 'total_all_cnt :'. $total_all_cnt.'<br>';

//회원권한 정보 호출 S
$tmp1 = $Member->getListMemberLevel($dbh);
$list_mem_level = $tmp1[0];
//회원권한 정보 호출 E

##-- 페이지 처리
$pageUtil = new PageUtil();
//$DEFAULT['NumPerPage'] = 10; # NUMBER PER PAGE
$DEFAULT['NumPerPage'] = $list_size;
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);


?>
<!DOCTYPE html>
<meta charset='utf-8' />
<!--// 달력 CSS  S-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script>
 $(function() {
  $("#datepicker").datepicker({
	dateFormat: 'yy-mm-dd',
  });
  $("#datepicker2").datepicker({
	dateFormat: 'yy-mm-dd',
  });
 });
</script>
<!--// 달력 CSS  E-->

<script src="/oktomato/js/term-date.js"></script>
<script type="text/javascript">
function articleDelete(idx)
{
	if(!confirm('회원을 정보를 삭제하시겠습니까? 삭제된 데이터는 복구할 수 없습니다.')){
		return false;
	}
	$.ajax({
		type:"POST",
		url:"/oktomato/member/__delete.php",
		dataType:"JSON",
		data:{"idx":idx},
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
<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script -->

<script type="text/javascript">
function allCheck1()
{
	$("input[name='idxs[]']:checkbox").attr("checked", true);
}
function allCheck2()
{
	$("input[name='idxs[]']:checkbox").attr("checked", false);
}
function deleteArticle()
{
	document.listFrm.submit();
}
	
$("#check_all").bind("click", function() {
		$("input[name='idxs[]']:checkbox").attr("checked", true);
});
</script>
<form name="search_form" method="get">
<table border="1">
	<tr>
		<td>검색어</td>
		<td><input type="text" name="word" value="<?php echo $word; ?>"></td>
	</tr>
	<tr>
		<td>주문정보</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>가입일</td>
		<td><input type="text" name="s_date" id="datepicker" value="<?php echo $s_date; ?>"> ~ <input type="text" name="l_date" id="datepicker2" value="<?php echo $l_date; ?>"></td>
	</tr>
	<?php
	if ($word != '' ||  ($s_date !='' && $l_date !='') ) {
	?>
	<tr>
		<td>초기화</td>
		<td> <a href="?">검색결과 초기화</a> </td>
	</tr>
	<?
	}
	?>
</table>

<div>
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	
	<br /><button>Search</button>
</div>
</form>

<form name="listFrm" method="post" action="/oktomato/member/delete.php">
<input type="hidden" name="mode" value="delete">
<input type="hidden" name="code" value="<?php echo $bbs_code;?>">
<div>Search Result <br>Result : <?php echo $total_cnt  ;?> / <?php echo $total_all_cnt  ;?></div>
<div><a href="?orderby=10">↑가나다순</a> | <a href="?orderby=11">↓가나다순</a> / <a href="?orderby=20">↑등록일순</a> | <a href="?orderby=21">등록일순↓</a> </div>
<div><a href="?list_size=2">2</a> / <a href="?list_size=3">3</a> / <a href="?list_size=4">4</a> / <a href="?list_size=5">5</a> / <a href="?list_size=6">6</a> </div>
<div><a href="?list_size=10">10</a> / 15 / 20 / 25 / 30 </div>
<table border="1">
<tr>
	<td></td>
	<td>NO</td>
	<td>이메일</td>
	<td>주문정보</td>
	<td>가입일</td>
	<td>관리</td>
<tr>
<?php foreach($list as $row){ ?>
<tr>
	<td><input type="checkbox" name="idxs[]" value="<?php echo($row['user_idx']);?>"></td>
	<td><?php echo($PAGE_UNCOUNT);?></td>
	<td><a href="join-read.php?idx=<?php echo $row['user_idx'].$readParams;?>"><?php echo $row['user_id'];?></a></td>
	<td>&nbsp;</td>
	<td><?php echo($row['create_date']);?></td>
	<td><a href="join-write.php?idx=<?php echo $row['user_idx'].$readParams;?>.&mode=edit">수정</a> | 
		<a href="#notice-list" onclick="articleDelete('<?php echo $row['user_idx'];?>'); return false;">삭제</a>
	</td>

</tr>

<?php
	$PAGE_UNCOUNT --;
}

unset($tmp);
unset($list);
?>
</table>
</form>
</br>
<div>
<form name="search" method="get">
<input type="hidden" name="at" value="<?php echo $at;?>">
<input type="hidden" name="code" value="<?php echo $bbs_code;?>">
<input type="hidden" name="category" value="<?php echo $category;?>">

</form>
</div>

<?php //echo $Pagination->attr['pageHtml'];?>
<?=$pageUtil->attr[pageHtml]?>
<div>
<input type='button' id='check_all' value='모두 선택' />
<input type='button' id='uncheck_all' value='모두 해제' />
<button onclick="allCheck1();">전체선택</button>
<button onclick="allCheck2();">전체해제</button>
<button onclick="deleteArticle();">삭제</button>
<button onclick="location.href='/oktomato/member/join-write.php'">작성</button>
</div>
</html>

<?php
/*///////////////////////////////
getQusryString ($str_value)
작성자 : 이용태
작성일 : 2014-12-04
설명 : 
입력된 값을 $_SERVER['QUERY_STRING'] 과 비교하여 QUERY_STRING을 재 작성
변수에 값이 없으면 삭제, 동일한 변수가 있으면 재설정, 새로운 값이 있으면 추가 
예 :
$_SERVER['QUERY_STRING'] : page=1&at=&list_size=10&orderby=&word=&s_date=&l_date=&u_level=
getQusryString ('at=read&mmmm=1&page=4') ; 
return : page=4&at=read&list_size=10&mmmm=1&
*////////////////////////////////
function getQusryString ($str_value) {
	$query_str = $_SERVER['QUERY_STRING'];
	$arr_str_value = explode ('&', $str_value);
	$arr_query_str = explode ('&', $query_str);
	$getString = '';
	$i = 0;

	while (list($key, $val) = each($arr_str_value)) { //입력된 값을 &로 쪼깨서 루프
		$str_tf = false;
		$arr_str_value_key = $key ;
		//$str_value_val = explode ('=', $val);
		$str_value_val[0] = substr($val,0,strpos ($val,'=') );
		$str_value_val[1] = substr($val,strpos ($val,'=')+1, strlen($val) );

		if ($getString == '') {
			$arr_query_str = explode ('&', $query_str);
		} else {
			$arr_query_str = explode ('&', $getString);
			$getString = '';
		}

		while (list($key, $val) = each($arr_query_str)) { //QUERY_STRING 값을 & 로 쪼개서 루프
			$arr_query_str_s[0] = substr($val,0,strpos ($val,'=') );
			$arr_query_str_s[1] = substr($val,strpos ($val,'=')+1, strlen($val) );

			if($arr_query_str_s[0]){
				
				if ($arr_query_str_s[0] == $str_value_val[0] ){ //QUERY_STRING의 변수가 입력된 값의 변수가 같으면 새 value 값 입력 
						$arr_query_str_s[1] = $str_value_val[1];
						$getString = $getString .'&'.$arr_query_str_s[0].'='. $arr_query_str_s[1];
						$str_tf = true;
				}else{
					if ($arr_query_str_s[1]) { //QUERY_STRING 기존의 값을 입력
						$getString .= '&'.$arr_query_str_s[0].'='. $arr_query_str_s[1];
						$str_tf = false;
					}else{
						$str_tf = false;
					}
				}
			}
			
			if ($i > 100 ) { //무한루프 방지
				exit;
			};

			$i = $i + 1;
		}
		
		if ($str_tf == false ){
			$getString = $getString. '&'.$arr_str_value[$arr_str_value_key];
			//$getString = implode($arr_query_str_s,'='); 
		}

	}

	$new_arr = array_unique ( explode ('&', $getString) ); //중복된 값을 제거
	$new_value = implode($new_arr,'&'); 
	$new_value = substr($new_value,1,strlen($new_value) );

	return $new_value;

}
echo getQusryString ('') ; 
?>