<?php
if(empty($News->attr['file_code']) || substr($row['up_file_name'],0,4) !='http'){
	$img_src = newsUploadPath.$row['up_file_name']; //�����ڿ��� ���� �Է��� ��� //�̹��� �� �ִ�.
}else{
		$img_src =$row['up_file_name']; //���Ϸ� ���ε� �� ��� // Ǯ��ΰ� �� �ִ�.
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
?>
                    <p style="text-align:center;margin-bottom: 30px;"><?php echo htmlspecialchars_decode($row['video_url']);?></p>
<?php
	}
}
?>
                    <p style="text-align:left; font-size: 15px; line-height: 22px; max-width:800px; margin:0 auto;">
                      <?php echo nl2br(LIB_LIB::get_special_tag_arrays($row['new_paragraph_content'], array('a','b')));?>
                    </p>
<?php
//������ �ְ� Ȱ��ȭ�� �±׸� �迭�� �ִ´�.  (��� < :  &#60; ,  > : &#62; �� ����Ǿ� �������� ��� ����)
// get_special_tag_arrays($str, $strip_tags) 
?>