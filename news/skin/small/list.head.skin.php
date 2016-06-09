<? include "../inc/config.php"; ?>
<?php
  $categoriName = "NEWS";
  $pageName = "NEWS";
  $pageNum = "2";
  $subNum = "0";
  $thirdNum = "0";
  $pathType = "a";
?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?> 
<? include "../inc/spot_sub.php"; ?> 
  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?> 
		<? include "./inc_tap_menu.php"; ?> 
            <div class="content-mediaBox margin1">
                <section id="bbs_nomal_list" class="content-mediaBox">
                    <header class="header">
                        <p class="total">총 <strong><?php echo number_format($total_cnt);?></strong>개의 글이 등록되었습니다.</p>
                         <form name="searchFrm"  action=?<?php echo $param;?>" method="get" onsubmit="return getSubmit()">
						 <input type="hidden" name="at" value="list">
						 <input type="hidden" name="subm" value="<?php echo $subm;?>">
						<div class="bbs_searchbox">
                            <span class="inp"><input type="text" name="word" id="word" title="검색어 입력" value="<?php echo $word;?>"></span>
                            <button class="btn btn_pack_tran" >Search</button>
                        </div>
						</form>
                    </header>
                    <div class="bbs_table"  >
                        <table summary="no,제목,작성일,조회수에 관한 게시판입니다.">
                          <colgroup>
                            <col class="no mobileNone">
                            <col class="h">
                            <col class="data">
                            <col class="view mobileNone" >
                          </colgroup>
                            <thead>
                              <tr>
                                <th scope="col" class="mobileNone">NO</th>
                                <th scope="col">제목</th>
                                <th scope="col">작성일</th>
                                <th scope="col" class="mobileNone">조회수</th>
                              </tr>
                            </thead>  
                            <tbody>
<script>
function getSubmit(){
	/*
	if($("#word").val()==""){
		alert("검색어를 입력하셔야 합니다.");
		return false;
	}
	*/
	//action="index.php?at=list&subm=<?php echo $subm;?>&<?php echo $param;?>"
}
</script>