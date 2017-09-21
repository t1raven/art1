<?php
 $pageName = "";
 $pageNum = "7";
 $subNum = "3";
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
        <h1 class="title1">List</h1>
        <div class="lst_table2 t-c">
          <table summary="참가자 관리의 결과 대한(all, 접수번호, 이름, 소속기관, 입금확인, 결제수단, 등록일, 등록취소) 정보를 확인하는 표">
            <caption>학술대회 관리</caption>
            <colgroup>
              <col class="chkbox">
              <col class="no_1">
              <col>
              <col>
              <col class="data">
              <col class="control1">
            </colgroup>
            <thead>
              <tr> <!-- btn_arrow_up.gif 상위 정렬 버튼 -->
                <th><button class="check_listbox all">All</button></th>
                <th scope="row">No</th>
                <th scope="row">금칙어</th>
                <th scope="row">등록일</th>
                <th scope="row">관리</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt"></label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td>
                <td>1</td>
                <td class="t-l">조땅콩</td>
                <td class="fc1">2014.07.24</td>
                <td>
                  <div class="user_td_control1">
                    <a href="#mainInfoPopup" class="layerOpen td-u fc_gray">수정</a>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>
			  <tr>
                <td>
                  <span class="check_listbox box">
                    <label for="pt"></label>
                    <input type="checkbox" id="b01020" name="" value=""></span>
                  </td>
                <td>2</td>
                <td class="t-l">조땅콩</td>
                <td class="fc1">2014.07.24</td>
                <td>
                  <div class="user_td_control1">
                    <a href="#mainInfoPopup" class="layerOpen td-u fc_gray">수정</a>
                    <button>삭제</button>
                  </div>
                </td>
              </tr>

             
            </tbody>
          </table>
        </div>
        <div class="bot_align">
          <div class="paginate">
            <a href="#" class="btn prev" onClick="">처음</a>
            <a href="#" class="btn prev2" onClick="">이전10페이지</a>
            <a href="#" class="num on" onClick="">1</a>
            <a href="#" class="num" onClick="">2</a>
            <a href="#" class="num" onClick="">3</a>
            <a href="#" class="num" onClick="">4</a>
            <a href="#" class="num" onClick="">5</a>
            <a href="#" class="num" onClick="">6</a>
            <a href="#" class="num" onClick="">7</a>
            <a href="#" class="num" onClick="">8</a>
            <a href="#" class="num" onClick="">9</a>
            <a href="#" class="num" onClick="">10</a>
            <a href="#" class="btn next2" onClick="">다음10페이지</a>
            <a href="#" class="btn next" onClick="">끝</a>
          </div>
          <div class="btn_right">
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Register</button>
            <button onClick="alert('준비중입니다.');" class="btn_pack1 ov-b gray small rato">Delete All</button>
          </div>
        </div>  
      </section>
     </article>
  </div> <!-- //container_inner -->
 </section> <!-- //container -->
 <section id="mainInfoPopup" class="layer_popup1">
 <header class="searchBox">
      <button class="close"><img src="<?=$currentFolder?>/images/btn/btn_close.gif" alt="닫기"></button>
   </header>
   <article class="cont">
      <h1>금칙어</h1>
       <p> <input name="" type="text" class="inp_txt w190" id="" value="조땅콩" > <button onclick="alert('준비중입니다.');" class="btn_pack1 ov-b small rato">Save</button></p>
   </article>
</section>
<script>
   $(function(){
    //레이어 팝업
   
   $(".layerOpen").click(function(){
   
        $(".layer_popup1").css("display","none");
   
        var id = $(this).attr("href");
   
        var x = $(this).offset().left;
   
        var y = $(this).offset().top-10;
   
        layerBoxOffset(id,x,y);
   
        return false;
   
   
   
    });
   
     // and / or 스위치 함수
   
      $("button.btn_switch").click(function(){
   
          var text = $(this).text();
   
          $(this).text((text == "AND") ? "OR":"AND");
   
          //$("#anor").val($(this).text());
   
      });
   
      LabelHidden(".inp_txt.lh");
   
      bbsCheckbox();
   
      checkListMotion();
   
       initFileUploads();
   
   
   
    })
   
</script>
<? include "../inc/bot.php"; ?>