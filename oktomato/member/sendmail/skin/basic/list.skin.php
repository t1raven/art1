<?php
if (!defined('OKTOMATO')) exit;

$pageName = 'Index';
$pageNum = '8';
$subNum = '3';
$thirdNum = '0';

include '../../inc/link.php';
include '../../inc/top.php';
include '../../inc/header.php';
include '../../inc/side.php';
?>
 <section id="container">
 <div class="container_inner">
    <?php include '../../inc/path.php'; ?>
    <?php include '../../inc/datepicker_setting.php'; ?>
     <article class="content">
	 <form name="searchFrm" method="get">
      <input type="hidden" name="at" value="<?php echo $at;?>">
      <section class="section_box">
        <h1 class="title1">Search Option</h1>
        <div class="lst_table3">
          <table summary="작가 검색">
            <caption>뉴스레터 검색</caption>
            <colgroup>
              <col class="th1">
              <col>
            </colgroup>
            <tbody>
              <tr>
                <th scope="row">검색</th>
                <td class="colbox">
                  <span class="col_td auto">
                    <label for="mail" class="pos">제목</label>
                    <input name="word" type="text" class="inp_txt lh w300" id="word" value="<?php echo $word;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">발송일</th>
                <td>
                  <span class="datapiker">
                    <input name="bdate" type="text" class="inp_txt date" id="bdate" value="<?php echo $bdate;?>">
                  </span> <span> ~ </span>
                  <span class="datapiker">
                    <input name="edate" type="text" class="inp_txt date" id="edate" value="<?php echo $edate;?>">
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">초기화</th>
                <td>
                  <div class="resetBox">
                    <?php if (!empty($word)):?><span class="searchtag" id="span-word"><?php echo $word;?><button type="button" onclick="deleteKeyword('word');">삭제</button></span><?php endif;?>
                    <?php if (!empty($bdate) && !empty($edate) ):?><span class="searchtag" id="span-bdate"><?php echo $bdate .'~'.$edate;?><button type="button" onclick="deleteKeyword('bdate');deleteKeyword('edate')">삭제</button></span><?php endif;?>
                    <button type="button" onclick="setReset();" class="reset">검색 초기화</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div> <!-- //lst_table3 -->
        <div class="btn_cen cen">
          <button type="button" onclick="getSearch(this.form);" class="btn_pack1 ov-b small rato">Search</button>
        </div>

      </section>
	  </form>

      <section class="section_box">
        <h1 class="title1">Search Result</h1>
        <section class="bbsTop">
          <p class="result">
            <strong>Result : </strong>
            <span class="fc_red"><?php echo number_format($total_cnt);?></span>
          </p>
          <div class="group_rgh">
             <p class="sort">
			 <strong><img src="<?php echo $currentFolder;?>/images/bg/bg_list2_<?php echo ($od === 0) ? 'off' : 'on';?>.jpg" alt="정렬"></strong>
              <button type="button" onclick="setOrder(0, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 0):?> class="on"<?php endif;?>>발송일순</button>
              / <button onclick="setOrder(1, <?php echo ($od === 1) ? 0:1;?>)"<?php if($sort === 1):?> class="on"<?php endif;?>>제목순</button>
            </p>
            <p class="align">
              <strong><img src="<?=$currentFolder?>/images/bg/bg_list.gif" alt="정렬"> </strong>
              <button type="button" onclick="setListSize(10);"<?php if($sz === 10):?> class="on"<?php endif;?>>10</button> /
              <button type="button" onclick="setListSize(15);"<?php if($sz === 15):?> class="on"<?php endif;?>>15</button> /
              <button type="button" onclick="setListSize(20);"<?php if($sz === 20):?> class="on"<?php endif;?>>20</button> /
              <button type="button" onclick="setListSize(25);"<?php if($sz === 25):?> class="on"<?php endif;?>>25</button> /
              <button type="button" onclick="setListSize(30);"<?php if($sz === 30):?> class="on"<?php endif;?>>30</button>
            </p>
          </div>
        </section> <!-- //bbsTop -->
        <div class="lst_table2 t-c">
          <table summary="뉴스레터 목록 표">
		  <form name="listFrm" method="post"  action="?at=delete"  target="action_ifrm">
		  <input type="hidden" name="mode" value="delete">
            <caption>뉴스레터 관리</caption>
            <colgroup>
              <col class="chkbox">
              <col class="no_1">
              <col>
              <col>
              <col>
              <col>
              <col>
              <col class="data">
              <col width="5%">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button type="button" class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">제목</th>
                <th scope="row">발송</th>
                <th scope="row">성공</th>
                <th scope="row">실패</th>
                <th scope="row">확인</th>
                <th scope="row">발송일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>
<?php if ($total_cnt > 0) : ?>
	<?php foreach($list as $row) : ?>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt">b01020</label>
                     <input type="checkbox" id="b01020" name="idxs[]" value="<?php echo $row['emailIdx'];?>">
                  </td>
                <td><?php echo($PAGE_UNCOUNT--);?></td>
                <td class="name"><a href="#" onclick="readPop(<?php echo $row['emailIdx'];?>);" class="fc_blue td-u"><?php echo $row['title'];?></a></td>
                <td><?php echo number_format($row['successCnt'] + $row['failCnt']); ?></td>
                <td><?php echo number_format($row['successCnt']); ?></td>
                <td><?php echo number_format($row['failCnt']); ?></td>
                <td><?php echo number_format($row['readCnt']); ?></td>
                <td><?php echo substr($row['createDate'],0,10); ?></td>
                <td>
                  <div class="user_td_control1">
                    <button type="button" onclick="deleteArticle(<?php echo $row['emailIdx'];?>);">삭제</button>
                  </div>
                </td>
              </tr>
	<?php endforeach; ?>
<?php else : ?>
              <tr>
                <td colspan="9" height="50">자료가 존재하지 않습니다.</td>
              </tr>
<?php endif ; ?>

            </tbody>
			</form>
          </table>
        </div>
        <div class="bot_align">
          <?=$pageUtil->attr[pageHtml]?>
          <div class="btn_right">
            <button class="btn_pack1 ov-b small rato" onclick="location.href='?at=write'">Register</button>
			<?php if ($total_cnt > 0):?><button type="button" onclick="deleteAll();" class="btn_pack1 ov-b gray small rato">Delete All</button><?php endif;?>
          </div>
        </div>
      </section> <!-- //lst_table2 -->
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

 <section id="mainInfoPopup" class="layer_popup1">
	<header class="searchBox">
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
      <h1>뉴스레터 신청 이메일</h1>
       <p> <input name="modiEmail" type="text" class="inp_txt w190" id="modiEmail" value="abc@oktomato.net" > <button type="button" id="butEmailModi" class="btn_pack1 ov-b small rato">Save</button></p>
   </article>
</section>

  <?php echo ACTION_IFRAME;?>

<script type="text/javascript">
function deleteAll() {
	//return;
	if ($(":checkbox[name='idxs[]']:checked").length == 0) {
		alert("삭제하려는 것을 먼저 선택하여 주세요.");
	}
	else {
		if (confirm("선택한 것을 정말 삭제하겠습니까?")) {
			//document.listFrm.action="?at=delete";
			//document.listFrm.action = "?at=delete";
			document.listFrm.submit();
		}
	}
}

function deleteArticle(idx) {
	if (confirm("정말 삭제하겠습니까?")) {
		$.ajax({
			type:"POST",
			url:"__delete.php",
			dataType:"JSON",
			data:{"idx":idx},
			success: function(data) {
				if (data.cnt > 0) {
					alert("삭제되었습니다.");
					location.reload();
				}
				else{
					alert("삭제할 수 없습니다.");
				}
			},
			error: function(xhr, status, error) {
				alert("통신오류 입니다\r\n 다시 시도하여 주세요!");
			}
		});
	}
}

function setReset() {
	location.href='?at=list';
}

function setWrite() {
	location.href='write.php';
}

function deleteKeyword(v) {
	$("#"+v).val("");
	$("#span-"+v).remove();
}
function deleteKeywordRadio(v){
	$("input:radio[name='"+v+"']").removeAttr('checked');
	$("input:radio[name='"+v+"']:radio[value='']").attr('checked', true); // 원하는 값(Y)을 체크
}

function setListSize(sz) {
	location.href="?<?php echo $params;?>&sz="+sz;
}

function setOrder(sort, od) {
	location.href="?at=list&sort="+sort+"&od="+od;
}

function getSearch(f) {
	if ($("#bdate").val() != "" || $("#edate").val() != "") {
		if ($("#bdate").val() == "") {
			alert("시작일을 입력하세요.");
			$("#bdate").focus();
			return false;
		}
		if ($("#edate").val() == "") {
			alert("종료일을 입력하세요.");
			$("#edate").focus();
			return false;
		}
	}
	else {

	}

	f.submit();
}
var w = '';
function readPop(idx) {
	w = window.open("about:blank","_blank", 'location=no, directories=no, resizable=no, status=no, toolbar=no, menubar=no, width=830,height=650, left=0, top=0, scrollbars=no');
	$.ajax({
		url:'index.php',
		method:"GET",
		data:{"at":"read", "idx":idx},
		dataType: "html",
		success:eventSuccess,
		error: function(xhr, status, error) {alert(error);}
	});
	//window.open('index.php?at=read&idx='+idx,'','location=no, directories=no, resizable=no, status=no, toolbar=no, menubar=no, width=700,height=600, left=0, top=0, scrollbars=no');
}

function eventSuccess(data) {
	$(w.document).ready(function(){
		$(w.document).find('body').html(data);
		//$(w.document).html(data);
	});
	w.innerHTML = data;
}

$(".layerOpen").click(function(){
   var idx = $(this).data("idx"); //뉴스레터 idx
   var email = $(this).data("email"); //이메일
   $("#modiEmail").val(email)  ;

	$(".layer_popup1").css("display","none");
	var id = $(this).attr("href");
	var x = $(this).offset().left - 280;
	var y = $(this).offset().top-10;
	layerBoxOffset(id,x,y);

	$("#butEmailModi").off().on("click",function(){
		email = $("#modiEmail").val(); //이메일
		getModfyEmail(idx,email);
	});


	return false;
});

$(function(){
  LabelHidden(".inp_txt.lh");
  bbsCheckbox();
  checkListMotion();
  initFileUploads();
})
</script>
<?php
include '../../inc/bot.php';