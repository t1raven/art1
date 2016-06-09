		  <div class="comentArea">

		  <form name="comment_frm" method="post" action="comment_update.php">
			<input type="hidden" name="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
				<div class="inputBox">
					<span class="input"><textarea name="com_content" id="com_content" cols="30" rows="10"></textarea></span><span class="btn"><button>댓글달기</button></span>
				</div>
		  </form>

				<div class="replyBox">
