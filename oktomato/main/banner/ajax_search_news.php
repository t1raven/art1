<?php
require $_SERVER['DOCUMENT_ROOT'].'/lib/include/global.inc.php';
require(ROOT.'/lib/include/chk.admin.inc'.SOURCE_EXT );
require ROOT.'/lib/class/banner/banner.class'.SOURCE_EXT;

header("Content-Type: application/json; charset=UTF-8");

$word			= isset($_POST['search_news']) ?Xss::chkXSS(trim($_POST['search_news'])) : null;
$menu			= isset($_POST['menu']) ?Xss::chkXSS(trim($_POST['menu'])) : null; //menu
$sz		= isset($_POST['sz']) ? (int)$_POST['sz'] : 10;
$page	= isset($_POST['page']) ? (int)$_POST['page'] : 1;
$sort		= isset($_GET['_POST']) ? (int)$_POST['sort'] : 0; // 0:등록일순 , 1:작가명순
$od		= isset($_GET['_POST']) ? (int)$_GET['_POST'] : 0; // 0:내림차순,  1:올림차순
$ex		= isset($_POST['ex']) ?Xss::chkXSS(trim($_POST['ex'])) : null;

$banner = new Banner();
$banner->setAttr('word', $word);
$banner->setAttr("page", $page);
$banner->setAttr("sz", $sz);
$banner->setAttr("sort", $sort);
$banner->setAttr("od", $od);

$tmp = $banner->getNewsList($dbh);
$list = $tmp[0];
$total_cnt = $tmp[1];
//$total_cnt = count($tmp[0]);
$total_all_cnt = $tmp[2];

// 페이지 처리
$pageUtil = new PageUtil();
$DEFAULT['NumPerPage'] = $sz; # NUMBER PER PAGE
$DEFAULT['NumPerStart'] = $DEFAULT['NumPerPage'] * ($page - 1);
$PAGE_UNCOUNT = $total_cnt - $DEFAULT['NumPerStart'];
//$pageUtil->pageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$pageUtil->scriptPageLimiter($DEFAULT['NumPerPage'], $DEFAULT['NumPerBlock'], $total_cnt, $page, $params);
$idCnt = 0;

?>
<div class="lst_table2 t-c">
				<table summary="상품관리 검색결과(all, No., 상품명, 가격, 노출유무, 등록일, 관리) 정보를 확인하는 표">
                  <caption>상품관리 검색결과</caption>
                  <colgroup>
                     <col>
					 <col>
					 <col>
                     <col class="name">
                     <col class="no_1">
                     <col>
                     <col>
                  </colgroup>
                  <thead>
                     <tr>
                        <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                        <th scope="row">번호</th>
						<th scope="row">고유번호</th>
						<th scope="row">카테고리</th>
						<th scope="row">제목</th>
						<th scope="row">작성자</th>
						<th scope="row">날짜</th>
                        <th scope="row">관리</th>
                     </tr>
                  </thead>
                  <tbody>
<?php
if (!empty($list)) {
	$i = 0;
	foreach( $list as $row){ 
		$text = mb_substr ( $row['new_paragraph_content'] , 0 , 300, "UTF-8" );
		//$text = $row['new_paragraph_content'] ;
		$text = preg_replace('/\r\n|\r|\n/','',nl2br($text) );  //개행문자가 있으면 json 오류가 나므로 개행문자를 없앤다.
		$text = str_replace('"','\&#34;', $text  );  
		$text = str_replace("'",'\&#39;', $text  );  
		$text = str_replace('"','', $text  ); 
		$text = str_replace("'","", $text  );  
		
		$title = str_replace("\"", '', $row['news_title']);
		$title = str_replace('"','\"', $title  );  
		$title = str_replace("'","\'", $title  );  
		$title = str_replace('&#34;','\&#34;', $title  );  
		$title = str_replace("&#39;",'\&#39;', $title  );  
		$title = str_replace('"','', $title  ); 
		$title = str_replace("'","", $title  );  
		$title = trim($title);

		if($ex === '1'  || $ex === '2'  || $ex === '3' ){ //01. Headline News
			$img = $row['news_recent_up_file_name'];
			if(empty($img)){
				$img = $row['news_main_up_file_name'];
			}
		}else{
			$img = $row['news_main_up_file_name'];
		}

		if(empty($img)){
			$img = $row['up_file_name'];
		}

?>	
					 <tr>
                        <td><?php echo($PAGE_UNCOUNT);?></td>
						<td><?php echo $row['news_idx'];?></td>
						<td><?php echo $row['news_category_name'];?></td>
                        <td  class="name"><?php echo $row['news_title'];?></td>
						<td ><?php echo $row['reporter_name'];?></td>
						<td><?php echo substr($row['create_date'],0,10);?></td>
                        <td>
                           <div class="user_td_control1">
							<button type="button" onClick="newsSelect('<?php echo $row['news_idx'];?>', '<?php echo $title;?>', '<?php echo $row['new_paragraph_idx'];?>', '<?php echo $text ?>', '<?php echo $img?>', '<?php echo $row['news_category_idx'];?>', '<?php echo $row['news_category_name'];?>','<?php echo $row['reporter_name'];?>','<?php echo $row['create_date']?>','<?php echo $ex ?>')">선택</button>

                           </div>
                        </td>
                     </tr>	
<?php	
		$PAGE_UNCOUNT --;
		$idCnt = $idCnt + 1;
	
		$i++;
	}
}else{
	?>
					<tr>
                        <td colspan="8">검색 결과가 없습니다.</td>
                     </tr>	
	<?php
}
//$outp .="]";

echo($outp);
?>
                  </tbody>
               </table>


				<div class="bot_align">
				   <?=$pageUtil->attr[pageHtml]?>
				</div>


            </div>

<?php




$banner = null;
$dbh = null;
$tmp = null;
$list = null;
unset($banner);
unset($dbh);
unset($tmp);
unset($list);
if (gc_enabled()) gc_collect_cycles();
?>
