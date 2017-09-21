<?php
   $pageName = "List";
   $pageNum = "2";
   $subNum = "1";
   $thirdNum = "0";
   ?>
<? include "../inc/link.php"; ?>
<? include "../inc/top.php"; ?>
<? include "../inc/header.php"; ?>
<? include "../inc/side.php"; ?>
<section id="container">
   <div class="container_inner">
      <? include "../inc/path.php"; ?>
      <? include "../inc/datepicker_setting.php"; ?>
      <article class="content">
         <section class="section_box">
            <h1 class="title1">BBS Type Management</h1>
            <!-- //bbsTop -->
            <div class="lst_table2 t-c">
               <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
                  <caption>학술대회 관리</caption>
                  <colgroup>
                     <!-- <col> -->
                     <col>
                     <col>
                     <col>
                  </colgroup>
                  <thead class="pad15" >
                     <tr>
                        <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                        <!--  <th><button class="check_listbox all">All</button></th> -->
                        <th scope="col" class="pad_10">No</th>
                        <th scope="col" class="pad_10">카테고리</th>
                        <th scope="col" class="pad_10">BBS skin type</th>
                     </tr>
                  </thead>
                  <tbody class="pad15">
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="0">
                           썸네일
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="1">
                           썸네일
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="0">
                           썸네일
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="1">
                           썸네일
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="0">
                           썸네일
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>6</td>
                        <td>In Brief</td>
                        <td>
                           <a class="pop_btn layerOpen" href="#bbsType"  data-bbs="1">
                           썸네일
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
   </div>
   </section>
   <section id="bbsType" class="layer_popup1 bbs_type">
   <header>
   <h1>BBS Type Selection</h1>
   <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
   <ul class="bbs_type_list">
   <li>
   <p class="tit">일반(Big)</p>
   <button class="img" data-bbs="0"><img src="<?=$currentFolder?>/images/news/img_bbs_big.jpg" alt="" /></button>
   </li>
   <li>
   <p class="tit">일반(Small)</p>
   <button class="img" data-bbs="0"><img src="<?=$currentFolder?>/images/news/img_bbs_big.jpg" alt="" /></button>
   </li>
   <li>
   <p class="tit">타일</p>
   <button class="img" data-bbs="2"><img src="<?=$currentFolder?>/images/news/img_bbs_tile.jpg" alt="" /></button>
   </li>
   <li>
   <p class="tit">썸네일</p>
   <button class="img" data-bbs="3"><img src="<?=$currentFolder?>/images/news/img_bbs_thumbnail.jpg" alt="" /></button>
   </li>
   <li>
   <p class="tit">갤러리</p>
   <button class="img" data-bbs="4"><img src="<?=$currentFolder?>/images/news/img_bbs_gallery.jpg" alt="" /></button>
   </li>
   </ul>
   </article> 
   </section>
   </article>
   </div> <!-- //container_inner -->
</section>
<!-- //container -->
<script type="text/javascript">
   var bbsType = ['일반(Big)','일반(Small)','타일','썸네일','갤러리'];
    $(".pop_btn").each(function(){
   	var ty = $(this).data("bbs");
   	$(this).text(bbsType[ty]);	
   });
   
   
   $(".layerOpen").click(function(){
   	var parentThis = $(this);
          $(".layer_popup1").css("display","none");
          var id = $(this).attr("href");
          var x = $(this).offset().left;
          var y = 30;
    	 $(".bbs_type_list > li").off().on("click",function(){
   
   		var ty = $(this).find(".img").data("bbs");
   		parentThis.text(bbsType[ty]);
   		 if(isie7 || isie8){
   			$(".layer_popup1").css({"display":"none"});
   		  }else{
   			$(".layer_popup1").stop().animate({"opacity":0},300,function(){
   			  $(this).css("display","none");
   			});
   		  }//if
   	});
         layerBoxOffset(id,x,y);
         return false;
      });
</script>
<? include "../inc/bot.php"; ?>