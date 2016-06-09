<?php
if(empty($News->attr['file_code']) || substr($row['up_file_name'],0,4) !='http'){
	$img_src = newsUploadPath.$row['up_file_name']; //관리자에서 직접 입력한 경우 //이미지 명만 있다.
}else{
		$img_src =$row['up_file_name']; //파일로 업로드 한 경우 // 풀경로가 들어가 있다.
}

if ($row['img_or_video']=='img') {
	if (!empty($row['up_file_name'])) {
?>
					<div class="img" style="max-width:600px; text-align:center; margin:0 auto;">
						<span style="display:block; margin-bottom:15px; margin-top:15px;"><img style="max-width:100%;" src="<?php echo $img_src;?>" alt=""></span>
						<p style="margin-bottom:20px; "><?php echo $row['img_comment'];?></p>
					</div>
<?php
	}
}elseif($row['img_or_video']=='video'){
	if (!empty($row['video_url'])) {
		$aYtUrl = explode('/',htmlspecialchars_decode($row['video_url']));
		$youtubeCode = array_pop($aYtUrl);
?>
                    <p style="text-align:center;margin-bottom: 30px;">
					<div style="max-width:560px; margin:auto;margin-bottom:30px;">
						<div style="position: relative; padding-bottom: 56.25%; height: 0;  overflow: hidden;">
						<iframe src="//www.youtube.com/embed/<?php echo $youtubeCode?>" frameborder="0" allowfullscreen style="position: absolute; top:0; left: 0; width: 100%; height: 100%;"></iframe>
						<!-- <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $youtubeCode?>" frameborder="0" allowfullscreen ></iframe> -->
						</div>
					</div>
					</p>
<?php
	}
}
?>
                    <p style="text-align:left; font-size: 15px; line-height: 22px; max-width:800px; margin:0 auto;">
                      <?php echo nl2br(LIB_LIB::get_special_tag_arrays($row['new_paragraph_content'], array('a','b')));?>
                    </p>
<?php
//본문을 넣고 활성화할 태그를 배열로 넣는다.  (디비에 < :  &#60; ,  > : &#62; 로 변경되어 들어갔을때만 사용 가능)
// get_special_tag_arrays($str, $strip_tags) 
?>