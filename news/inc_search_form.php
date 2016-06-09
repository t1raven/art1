			<section id="bbs_thumb_t5" class="content-mediaBox margin1">
                <header class="header">
                    <p class="total">총 <strong><span id="total_num"><?php echo number_format($total_cnt);?></span></strong>개의 글이 등록되었습니다.</p><!--타일형의 전체 갯수는  /news/__list.php 에서 처리-->
					 <p class="total"></p>
                    
					<?php
					if ($cate  != 15) {
					?>
					<form name="searchFrm"  action="?<?php echo $param;?>" method="get" onsubmit="return getSubmit()">
					<input type="hidden" name="at" value="list">
					<input type="hidden" name="subm" value="<?php echo $subm;?>">
					<div class="bbs_searchbox">
                        <span class="inp"><input type="text" name="word" id="word" title="검색어 입력" value="<?php echo $word;?>"></span>
                        <button class="btn btn_pack_tran">Search</button>
                    </div>
					</form>
					<?php
					}
					?>
                
				</header>

				<!-- ul -->

<script>
function getSubmit(){
	if($("#word").val()==""){
		alert("검색어를 입력하셔야 합니다.");
		return false;
	}
	//action="index.php?at=list&subm=<?php echo $subm;?>&<?php echo $param;?>"
}
</script>