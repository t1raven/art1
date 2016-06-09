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

  <script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>

  <section id="container_sub">
    <div class="container_inner">
      <? include "../inc/path.php"; ?>
		<div class="tabBox">
			<ul>
				<li><a href="<?php echo $news_menu_brief ; ?>">In brief</a></li>
				<li><a href="<?php echo $news_menu_trend ; ?>">Trend</a></li>
				<li><a href="<?php echo $news_menu_people ; ?>">People</a></li>
				<li><a href="<?php echo $news_menu_world ; ?>">World</a></li>
				<li><a href="<?php echo $news_menu_trouble ; ?>">Trouble</a></li>
				<li><a href="<?php echo $news_menu_episode ; ?>">Episode</a></li>
				<li class="on"><a href="<?php echo $news_menu_community ; ?>">Community</a></li>
			</ul>
		</div>
          <section id="bbs_view_ty1"  class="write content-mediaBox margin1">


			  <div class="inner">

			<form name="writeFrm" method="post" action="?at=update">
			<input type="hidden" name="at" value="update">
			<input type="hidden" name="idx" id="idx" value="<?php echo $Bbs->attr['bbs_idx']; ?>">
			<input type="hidden" name="category" id="category" value="10">
			<!-- input type="hidden" name="code" id="code" value="<?php echo $Bbs->attr['bbs_code']; ?>" -->
			<input type="hidden" name="mode" value="<?php echo $mode; ?>">

                  <header class="header">
					<div class="bbs_write"><div class="lft">구분</div>
						<div class="rgh">
						<select  name="code" id="code" onchange="select_notice();" >
					  <?php if($user_level_code == 99 ) { ?>
                        <option value="notice"     <?php echo ($Bbs->attr['bbs_code'] == 'notice') ? 'selected' : NULL ; ?> >공지</option>
                      <?}?>
						<option value="learning"  <?php echo ($Bbs->attr['bbs_code'] == 'learning') ? 'selected' : NULL ; ?>>학술행사</option>
                        <option value="lecture"    <?php echo ($Bbs->attr['bbs_code'] == 'lecture') ? 'selected' : NULL ; ?>>강좌</option>
                        <option value="contest"   <?php echo ($Bbs->attr['bbs_code'] == 'contest') ? 'selected' : NULL  ; ?>>공모</option>
                        <option value="jobs"        <?php echo ($Bbs->attr['bbs_code'] == 'jobs') ? 'selected' : NULL ; ?>>구인구직</option>
                        <option value="exhibit"     <?php echo ($Bbs->attr['bbs_code'] == 'exhibit') ? 'selected' : NULL ; ?>>전시소식</option>
                        <option value="book"        <?php echo ($Bbs->attr['bbs_code'] == 'book') ? 'selected' : NULL ; ?>>도서</option>
                      </select>
					   <span id="span-notice" style="display:none;"><input type="checkbox" name="notice" id="notice" value="1" <?php echo ($Bbs->attr['notice'] == '1') ? 'checked' : NULL ; ?>> 상단노출 </span>
					</div></div>
					<div class="bbs_write"><div class="lft">제목</div><div class="rgh">  <input type="text" name="title" id="title" value="<?php echo str_replace('&#39;', "'", $Bbs->attr['bbs_title']); ?>" class="inp_txt wp80"></div></div>

                      <!-- input type="text" class="inp_txt wp80" -->


                  </header><!-- //header -->
                  <article class="content">
                    <div class="bbs_write"><div class="lft">본문</div>
					<div class="rgh">
						<div class="textarea">
                      <!-- textarea name="" id=""></textarea -->
                      <textarea name="content" id="content" rows="10" cols="100" style="width:100%; height:300px; display:none;"><?php echo str_replace('\\"', '"', htmlspecialchars_decode($Bbs->attr['bbs_content'])); ?></textarea>
                    </div></div></div>
                  </article><!-- //content -->

                   <article class="content">
                    <div class="textarea">

                      <?php  include_once('container.php'); ?>
                    </div>
                  </article><!-- //content -->


              </div><!-- //inner -->
          </section><!-- //bbs_view_ty1 -->
          <div class="btn_bot">
               <div class="rgh_group">
                  <!-- a href="#" class="btn_pack samll black">목록</a>
                  <a href="javascript:submitContents(this);" class="btn_pack samll black">저장</a>
				  <input type="button" onclick="submitContents(this);" value="목록" class="btn_pack samll black" />
				  <input type="button" onclick="submitContents(this);" value="서버로 내용 전송" class="btn_pack samll black" / -->

				  <button  type="button" onclick="location.href='?at=list';" class="btn_pack samll black" />목록</button>
				  <button  type="button" onclick="submitContents(this);" class="btn_pack samll black" />저장</button>
              </div>
          </div><!-- //btn_bot -->
		  </form>



    </b><!-- //container_inner -->
  </section><!-- //container_sub -->

<?php
echo ACTION_IFRAME;
?>



  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>

<script type="text/javascript">
function select_notice(){
	if($("#code option:selected").val()=="notice"){
		$("#span-notice").css("display","");
	}else{
		$("#notice").attr("checked", false);
		$("#span-notice").css("display","none");

	}
}

select_notice();

var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "content",
	sSkinURI: "/editor/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["content"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["content"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("content").value를 이용해서 처리하면 됩니다.

	try {
		$("#file_list option").attr("selected", true);
		if( $("#title").val()=="" ){ alert("제목을 입력하셔야 합니다."); $("#title").focus() ; return false;}
		//alert($("#content").val());
		if( $("#content").val()=="" || $("#content").val()=="<p>&nbsp;</p>" ){ alert("내용을 입력하셔야 합니다."); $("#content").focus() ; return false;}
		elClickedObj.form.target = "action_ifrm" ;
		elClickedObj.form.submit();
	} catch(e) {
		console.log(e);
	}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["content"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>
