<? include "../inc/config.php"; ?>
<?php
  $categoriName = "MemberShip";
  $pageName = "회원가입";
  $pageNum = "5";
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

      <section id="joinStep1Area" class="content-mediaBox">
         <h1>회원가입</h1>
         <div class="lft_group">
           <ul>
            <li>
             <label class="h" for="">이메일(아이디)</label>
             <input type="text" title="이메일(아이디) 입력" class="" name="user_id" id="user_id"  value="" />
            </li>
            <li>
             <label class="h" for="">이메일 확인</label>
             <input type="text" title="이메일 확인 입력" class="" name="user_id" id="user_id"  value="" />
            </li>
            <li>
             <label class="h" for="">비밀번호</label>
             <input type="text" title="비밀번호 입력" class="" name="user_id" id="user_id"  value="" />
            </li>
            <li>
             <label class="h" for="">비밀번호 확인</label>
             <input type="text" title="비밀번호 확인 입력" class="" name="user_id" id="user_id"  value="" />
            </li>
            <li>
             <label class="h" for="SMSsusin">SMS 수신동의</label>
             <div class="susin">
              <input type="radio" id="SMSsusin1"  name="SMSsusin" checked>
              <label for="SMSsusin1" class="mr">예</label>
              <input type="radio" id="SMSsusin2" name="SMSsusin">
              <label for="SMSsusin2">아니오</label>
             </div>
            </li>
            <li>
             <label class="h" for="">뉴스레터 수신동의</label>
             <div class="susin">
              <input type="radio" id="NEWSsusin1"  name="NEWSsusin" checked>
              <label for="NEWSsusin1" class="mr">예</label>
              <input type="radio" id="NEWSsusin2" name="NEWSsusin">
              <label for="NEWSsusin2">아니오</label>
             </div>
             
            </li>
           </ul>
         </div>

         <div class="rgh_group">
           <ul>
            <li><a href="#" class="btn_face_mo"><span class="lft">facebook으로 회원가입</span></a></li>
            <li><a href="#" class="btn_google_mo"><span class="lft">Google+으로 회원가입</span></a></li>
           </ul>
           <p class="info"><span class="space">페이스북/구글+ 정보를 통해</span>  회원가입이 가능합니다.</p>
         </div>

         <div class="bot_group">
            <div class="agreement">
             <p><input type="checkbox" class="" name="" id="" > 이용약관에 동의하시겠습니까? 약관 동의 내용을 보시려면 <a href="#" class="here">여기</a>를 클릭하세요</p>
             <p><input type="checkbox" class="" name="" id="" > 개인정보 취급방침에 동의하시겠습니까? 개입정보 취급방침 내용을 보시려면  <a href="#" class="here">여기</a> 클릭하세요</p>
            </div>
            <div class="btns">
             <button class="btnPack ov-g"><span>취소</span></button>
             <button class="btnPack ov-g"><span>완료</span></button>
            </div>
         </div>
        
      </section>
      

         
        <!-- <?php
        require_once('../lib/include/global.inc.php');
        $action = isset($_REQUEST['at']) ? $_REQUEST['at'] : 'write';
        include_once(JOIN_PREFIX.$action.SOURCE_EXT);
        ?> -->












      
      
    </div><!-- //container_inner -->
  </section><!-- //container_sub -->
  <? include "../inc/footer.php"; ?>
<? include "../inc/bot.php"; ?>













