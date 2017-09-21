<?php
 $pageName = "Edit";
 $pageNum = "2";
 $subNum = "2";
 $thirdNum = "0";
?>
<? include "../../inc/link.php"; ?>
<? include "../../inc/top.php"; ?>
<? include "../../inc/header.php"; ?>
<? include "../../inc/side.php"; ?>
 <section id="container">
  <div class="container_inner">
    <? include "../../inc/path.php"; ?>
    <? include "../../inc/datepicker_setting.php"; ?>
     <article class="content">
	 <form name="fomnews" method="POST" action="?<?php echo PageUtil::_param_get('at=update');?>" enctype="multipart/form-data" onsubmit="return false;" >
	 <input type="hidden" name="addTbl" id="addTbl" value="1">
	 <input type="hidden" name="arrAddTbl" id="arrAddTbl" value="1">
	 <input type="hidden" name="mode" id="mode" value="<?php echo $mode ; ?>">
	 <input type="hidden" name="idx" id="idx" value="<?php echo $news_idx ; ?>">
	 <input type="hidden" name="old_news_main_up_file_name" id="news_main_up_file_name" value="<?php echo $News->attr['news_main_up_file_name'] ;?>">
	 <input type="hidden" name="old_news_main_ori_file_name" id="news_main_ori_file_name" value="<?php echo $News->attr['news_main_ori_file_name'] ;?>">
		<section class="section_box">
			<h1 class="title1">Category</h1>
			<div class="lst_table3">
			
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>기사 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody>
					  <tr>
						  <th scope="row">뉴스카테고리 선택</th>
						  <td>
							<div class="lst_check radio">
<?php
$Newstype = new Newstype();
$Newstype->setAttr("news_category_code", 1000000000);
$Newstype->setAttr("news_category_depth", 2);

$tmp = $Newstype->getList($dbh);
$list_cate = $tmp[0];
$i=0;
foreach($list_cate as $row_cate) { 
?>
								<span><label for="<?php echo($row_cate['news_category_name']);?>"><?php echo($row_cate['news_category_name']);?></label>
											<input type="radio" name="newsCate1" id="<?php echo($row_cate['news_category_name']);?>" value="<?php echo($row_cate['news_category_idx']);?>" id="newsCate_<?php echo($i);?>"
											<?php if($newsCate1==$row_cate['news_category_idx']){ echo 'checked';} ?> onclick="newsListImgInput(<?php echo($row_cate['news_category_idx']);?>);">
								</span>
<?php
	$i = $i+1;
}
$list_cate = null;
$tmp = null;
unset($list_cate);
unset($tmp);
?>
								<span><label for="news_main">news main</label>
											<input type="radio" name="newsCate1" id="news_main" value="1"
											<?php if($newsCate1==1){ echo 'checked';} ?> onclick="newsListImgInput(1);">
								</span>
								<br />
							</div>
						  </td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
<script>

</script>
		<section class="section_box">
			<h1 class="title1">Info.</h1>
			<div class="lst_table3">
				<table summary="작가 등록(작가명 및 사진 ,학령 등을 입력하는 표)">
					<caption>작가 등록</caption>
					<colgroup>
					  <col class="th1">
					  <col>
					</colgroup>
					<tbody id="tbodyP">
						<tr>
						<th scope="row" >타이틀</th>
						<td >
						  <input name="title" type="text" class="inp_txt w390 " id="title" value="<?php echo $news_title; ?>" >
						</td>
					  </tr>
						<tr>
							<th scope="row" >기자명</th>
							<td >
							  <input name="reporter" type="text" class="inp_txt w390 " id="reporter" value="<?php echo $reporter_name; ?>" >   
							</td>
						</tr>
						<tr>
							<th scope="row" >출처</th>
							<td >
							  <input name="source" type="text" class="inp_txt w390" id="source" value="<?php echo (empty($source))? 'art1' : $source ;?>" title="출처 입력">   
							</td>
						</tr>
						<tr>
							<th scope="row" >입력일시</th>
							<td >
							  <span class="datapiker"><input name="cdate_d" type="text" class="inp_txt date" id="sd" value="<?php echo $cdate_d; ?>"></span>
							  <select name="cdate_h" id="cdate_h">
							  <?php 
							  for($i=1 ; $i <= 24 ; $i++){
							  ?>
								<option value="<?php echo sprintf("%02d",$i) ?>"><?php echo sprintf("%02d",$i) ?>시</option>
							  <?php
							  }
							  ?>
							 </select>
							 <select name="cdate_m" id="cdate_m">
							  <?php 
							  for($i=0 ; $i <= 6 ; $i++){
							  ?>
								<option value="<?php echo $i ?>0"><?php echo $i ?>0분</option>
							  <?php
							  }
							  ?>
							 </select>
							  * 미래의 시간으로 입력하시면 예약 노출 됩니다.
							</td>
						</tr>
						<!-- tr>
							<th scope="row" >워터마크</th>
							<td >
							  <div class="lst_check checkbox">
								  <span>
									<label for="water_s">워터마크 표시</label>
									<input type="checkbox" name="water_status" id="water_s"  value="Y" <?php if($water_status=='Y'  ){ echo 'checked';} ?>>
								  </span>
								  <br>* 워터마크를 선택하면 해당 기사에 올라가는 모든 이미지에 워터마크가 적용 됩니다..
								  <br>* 워터마크는 입력만 적용됩니다.  수정 시에는 해당 이미지를 삭제하고  다시 올린 후 저장하면 워터마크 적용이 가능합니다.
								</div>  
							</td>
						</tr -->
						<tr>
							<th scope="row" >Recent News</th>
							<td >
							  <div class="lst_check radio">
								  <span>
									<label for="expR">노출</label>
									<input type="radio" name="recent_status" id="expR"  value="Y" <?php if($recent_status=='Y' or $recent_status==''  ){ echo 'checked';} ?>>
								  </span>
								  <span>
									<label for="expR_n">비노출</label>
									<input type="radio" name="recent_status" id="expR_n" value="N" <?php if($recent_status=='N' ){ echo 'checked';} ?>>
								  </span>
								  * 같은 카테고리 내에 Recent News 는 한 개만 지정할 수 있습니다.
								</div>  
							</td>
						</tr>
						<tr>
							<th scope="row">노출여부</th>
							<td >
							 <div class="lst_check radio">
								  <span>
									<label for="exp">노출</label>
									<input type="radio" name="display_status" id="exp"  value="Y" <?php if($display_status=='Y' or$display_status=='' ){ echo 'checked';} ?>>
								  </span>
								  <span>
									<label for="exp_n">비노출</label>
									<input type="radio" name="display_status" id="exp_n" value="N" <?php if($display_status=='N'){ echo 'checked';} ?>>
								  </span>
								</div>
							</td>
						</tr>


						<tr id="newsmain_tr" >
							<th scope="row">목록 이미지 </th>
							<td >
							  <div class="photoUpload">
								<div class="photo"><span id="span-view-img"><?php if($News->attr['news_main_up_file_name']) echo '<img src=\''.newsUploadPath.$News->attr['news_main_up_file_name'].'\' width=112 >' ;?></span></div>
								<div class="cont clearfix">
									<p>
										<div class="lst_check radio">
										  <span>
											<label for="water_on">워터마크 표시</label>
											<input type="radio" name="water_status_main" id="water_on"  value="Y" <?php if($water_status=='Y'  ){ echo 'checked';} ?>>
										  </span>
										  <span>
											<label for="water_off">워터마크 안 함</label>
											<input type="radio" name="water_status_main" id="water_off" value="N" <?php if($display_status=='N'){ echo 'checked';} ?>>
										  </span>
										  <br>* 워터마크는 입력만 적용됩니다.  수정 시에는 해당 이미지를 삭제하고  다시 올린 후, 저장하면 워터마크 적용이 가능합니다.
										</div>  
									</p>
									<p>* (<span id="span_img_size_text">600px * 450px</span>) 1MB제한.</p>
									
								  <div class="fileinputs" >
									<input type="file" class="file" name="imgMainFile" />
								  </div>
								  <div class="lst_Upload">
									<!-- span class="tag" id="span-img"><?php echo $News->attr['news_main_ori_file_name'] ;?>
										<button onclick="deleteMainFile(<?php echo $News->attr['news_idx'] ;?>)">삭제</button>
									</span -->
									<?php		if(!empty($News->attr['news_main_ori_file_name']) ){  ?>
									<span class="tag" id="span-img"><?php echo $News->attr['news_main_ori_file_name'] ;?>
										<button onclick="deleteMainFile(<?php echo $News->attr['news_idx'] ;?>)">삭제</button>
									</span>
									<?php } ?>
								  </div>
								  <div class="lst_Upload">
								  </div>
								</div>
							  </div>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</section>

		<section class="section_box">
        <h1 class="title1">Paragraph 1</h1>
        <div class="lst_table3">


          <table summary="뉴스 단락 등록">
            <caption>뉴스 단락 등록</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
			
            <tbody id="tplus">