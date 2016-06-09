					<div class="reply">
					<form method="post" action="comment_update.php"  target="action_ifrm" onSubmit="return writeReply('<?php echo $row_com['comment_idx']; ?>',this);" >
					<input type="hidden" name="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
					<input type="hidden" name="cidx" value="<?php echo $row_com['comment_idx']; ?>">
					<input type="hidden" name="mode" value="reply">
						<div class="inner">
							<p class="infor"><span class="writer"><?php echo explode("@",$row_com['user_id'])[0];?></span><span class="time"><?php echo substr($row_com['create_date'],0,16);?></span></p>
							<ul class="btn_list">
								<li class="reply_input_btn"><a href="#" onclick="return false;">댓글</a></li>
								<?php
								if ( Login::getLoginWriteLevel($Bbs->attr['user_idx']) ){  //관리자이거나 글쓴이 이면 수정 삭제 가능							
								?>
									<li><a href="javascript:articleDeleteComment(<?php echo $row_com['comment_idx']; ?>,<?php echo $row_com['origin_user_idx'];?>)">삭제</a></li>
									<!-- li><a href="#">수정</a></li -->
								<?
								}
								?>
							</ul>
							<div class="cont"> 
								<p><?php echo $row_com[comment_content];?></p>
							</div>
							<?php if($list_count > 0){ ?>
							<button type="button" class="btn_reply">답글 <?php echo $list_count ;?></button>
							<? } ?>
						</div>
						<div class="reply input">
							<div class="inner">
								<!-- p class="infor"><span class="writer">작성자명</span></p -->
								<div class="inputBox">
									<span class="input"><textarea name="com_content" id="com_content_<?php echo $row_com['comment_idx']; ?>" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
								</div>
							</div>
						</div>
					</form>
					</div>
					
<?php
		$i=0;

		//echo 		'list_count '.$list_count .'<br>';
		foreach($list_com_re as $row_re){
			if ($i == 0 ){
				echo '<div class="reply by" style="display:block;">';
			}
?>
					<div class="reply by1">
						<div class="inner">
							<p class="infor"><span class="writer"><?php echo explode("@",$row_re['user_id'])[0];?></span><span class="time"><?php echo substr($row_re['create_date'],0,16);?></span></p>
							<?php
							if ( Login::getLoginWriteLevel($Bbs->attr['user_idx']) ){  //관리자이거나 글쓴이 이면 수정 삭제 가능
							?>
							<ul class="btn_list">
								<li><a href="javascript:articleDeleteComment(<?php echo $row_re['comment_idx']; ?>,<?php echo $row_re['origin_user_idx'];?>)">삭제</a></li>
								<!-- li><a href="">수정</a></li -->
							</ul>
							<?
							}
							?>
							<div class="cont"> 
								<p><?php echo $row_re[comment_content];?></p>
							</div>
						</div>
					</div>


<?php
			$i ++;
			if ($list_count == $i ){
				echo '</div>';
			}
		}
?>