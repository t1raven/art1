<?php
// 아티스타 목록
?>
			<li><a class="img" href="#<?php echo $row['news_idx'];?>"><img src="<?php echo $list_img;?>" /></a></li>
<?php
//post 용
//아티스타 목록을 가져왔으면 아티스타 정보가 있는 날짜의 주간에 등록된 정보(2:ARS,3:인브리프,4:주전자)를 가져온다.

for($i = 2; $i <=4 ; $i++) {

	$News->setAttr("artistStarDate", $row['create_date']);
	$News->setAttr("postCategoy", $i);
	$aPostList = $News->getFrontPostList234($dbh);
	//echo '<br> artistStarDate = '.$row['create_date'];

	if(!empty($aPostList)) {

		foreach($aPostList as $rowPost) {
			//목록 이미지S
			if (empty($rowPost['news_main_up_file_name'])){
				//$list_img = newsUploadPath.$rowPost['up_file_name'];
				if(empty($rowPost['file_code'])){
					if (substr($rowPost['up_file_name'],0,4) =='http') {
						$post_list_img =$rowPost['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
					}
					else {
						$post_list_img = (!empty($rowPost['up_file_name']))  ? newsUploadPath.$rowPost['up_file_name'] : null;
					}
				}else{
					$post_list_img = (!empty($rowPost['up_file_name']))  ? $rowPost['up_file_name'] : null;  //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
				}
			}else{
				$post_list_img = (!empty($rowPost['news_main_up_file_name'])) ? newsUploadPath.$rowPost['news_main_up_file_name'] : null;
			}
			//목록 이미지E

			?>
				<li><a class="img" href="#<?php echo $rowPost['news_idx'];?>"><img src="<?php echo $post_list_img;?>" /></a></li>
			<?php
		}
	} else {
		if($i == 2) {
			$comingSoonImg = '/images/news/news_Postpage-Coming-Soon_ARS.jpg';
		} else if ($i==3) {
			$comingSoonImg = '/images/news/news_Postpage-Coming-Soon_inbrief.jpg';
		} else if ($i==4) {
			$comingSoonImg = '/images/news/news_Postpage-Coming-Soon_jujeonja.jpg';
		}
		?>
		<li class="post_<?php echo $i ?>"><a class="img" href="javascript:void(0);"><img src="<?php echo $comingSoonImg;?>"></a></li>
		<?php
	}
}
?>

