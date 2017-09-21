<?php
 $pageName = "";
 $pageNum = "7";
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
      <section class="section_box">
			<div class="admin_tab_list">
				<ul>
					<li <?php if($Provision->attr['provision_type']==1){ echo 'class="on" ';} ?>><a href="?at=write&idx=1">개인정보취급방침</a></li>
					<li <?php if($Provision->attr['provision_type']==2){ echo 'class="on" ';} ?>><a href="?at=write&idx=2">이용약관</a></li>
					<li <?php if($Provision->attr['provision_type']==3){ echo 'class="on" ';} ?>><a href="?at=write&idx=3">환불정책</a></li>
					<li <?php if($Provision->attr['provision_type']==4){ echo 'class="on" ';} ?>><a href="?at=write&idx=4">배송정책(작품)</a></li>
					<li <?php if($Provision->attr['provision_type']==5){ echo 'class="on" ';} ?>><a href="?at=write&idx=5">배송정책(상품)</a></li>
				</ul>
			</div>
      </section>
	  <section class="section_box">
            <form name="fomProv" method="POST" action="?at=update" onsubmit="return false;" >
			<input type="hidden" name="idx" value="<?php echo $Provision->attr['provision_idx']; ?>">
			<div class="lst_table3">
               <table summary="Sub Info.">
                  <caption>Sub Info.</caption>
                  <colgroup>
                     <col class="th1">
                     <col>
                  </colgroup>
                  <tbody>
                     <tr>
                        <th scope="row">내용 *</th>
                        <td>
                           <div class="textarea">
                              <textarea style="height:500px;"name="content"><?php echo htmlspecialchars_decode($Provision->attr['provision_content']); ?></textarea>
                           </div>
                        </td>
                     </tr>
                    
                  </tbody>
               </table>
            </div>
            <div class="bot_align">
              <div class="btn_right">
                <button type="button" id="btnSave" class="btn_pack1 ov-b small rato">Save</button>
              </div>
            </div>
			</form>
            <!-- //lst_table3 -->
         </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->

 <script>
	function chkForm(f){
		if(chkDefaultForm(f) ){
			alert(chkDefaultForm(f));
			//f.target = "action_ifrm";
			f.submit();
		}
	}
	$("#btnSave").click(function(){
		//chkForm(document.fomnews);
		//f.target = "action_ifrm";
		document.fomProv.submit();
	});
</script>

<? include "../../inc/bot.php"; ?>