<?php

// 파라미터 검사
function setIsset($arg, $v) {
	if (is_null($v)) {
		//echo "<br>string";
		return (isset($arg)) ? $arg : null;
	}
	else {
		if (isset($arg)) {
			if (is_null($arg) || empty($arg)) {
				//echo "<br>int-is null";
				return $v;
			}
			else {
				return $arg;
			}
		}
		else {
			//echo "<br>int-is not null:$v";
			return $v;
		}
	}
}

// 전체 페이지 구하기
function getTotalPage($total_cnt, $list_size) {
	if ($total_cnt == 0 ) {
		return 1;
	}
	elseif (($total_cnt % $list_size) == 0) {
		return $total_cnt / $list_size;
	}
	else {
		return (int)($total_cnt / $list_size) + 1;
	}
}


function setPaging($total_page, $block_size, $page, $params, $list_page) {
	$first_page = '<img src=\'/btn/btn_prev2.gif\' alt=\'처음\'>';
	$pre_page = '<img src=\'/btn/btn_prev.gif alt\'=\'이전\'>';
	$next_page = '<img src=\'/btn/btn_next.gif alt\'=\'다음\'>';
	$end_page = '<img src=\'/btn/btn_next2.gif\' alt=\'마지막\'>';

	If ($page % $block_size == 0) {
		$min_page = (int)($page / $block_size - 1) * $block_size + 1;
	}
	else {
		$min_page = (int)($page / $block_size) * $block_size + 1;
	}

	If (($min_page + $block_size - 1) > $total_page) {
		$max_page = $total_page;
	}
	else {
		$max_page = $min_page + $block_size - 1;
	}

	If ($page == 1) {
		echo '<a href=\'#\' class=\'btn\'>'.$first_page.'</a>';
	}
	else {
		echo '<a href='.$list_page.'?page=1&'.$params.' class=\'btn\'>'.$first_page.'</a>';
	}


	If ($min_page > $block_size) {
		$tmpMinPage = $min_page - 1;

		//echo '<a href=\"'.$list_page.'?page='.$min_page-1.$page_params.'\" class=\"btn prev\">'.$pre_page.'</a>';
		echo '<a href=\"'.$list_page.'?page='.$tmpMinPage.$page_params.'\" class=\'btn prev\'>'.$pre_page.'</a>';
	}
	else {
		echo '<a href=\'#\' class=\'btn prev\'>'.$pre_page.'</a>';
	}

	for($i = $min_page; $i < $max_page; $i++) {
		If ($i == $page) {
			echo  '<a href=\'#\' class=\'num on\'>'.$i.'</a>';
		}
		else {
			echo '<a href=\"'.$list_page.'?page='.$i.$page_params.'\" class=\'num\'>'.$i.'</a>';
		}
	}

	If ($max_page < $total_page) {
		$tmpMaxPage = $max_page + 1;
		echo '<a href=\"'.$list_page.'?page='.$tmpMaxPage.$page_params.'\" class=\'btn next\'>'.$next_page.'</a>';
	}
	else {
		echo '<a href=\'#\' class=\'btn next\'>'.$next_page.'</a>';
	}

	If ($page == $total_page) {
		echo '<a href=\'#\' class=\'btn\'>'.$end_page.'</a>';
	}
	else {
		echo '<a href=\"'.$list_page.'?page='.$total_page.$page_params.'\" class=\"btn\">'.$end_page.'</a>';
	}
}


// 구분자를 통해 데이터를 배열화
function getArrayReturn($a) {
	$tmp = null;
	$cnt = $a;

	foreach($a as $v) {
		$tmp .= $v.'§';
	}
	return $tmp;
}
?>