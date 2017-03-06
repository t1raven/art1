<header id="header">
  <div class="header_inner">
    <h1><a href="<?=$currentFolder?>"><img src="/images/header/logo.jpg" alt="art1"></a></h1>
    <section class="gnb">
      <ul>
        <li class="home"><a href="<?=$web_site_url?>" target="_blank" class="a-Bg">홈페이지 바로가기</a></li>
        <li class="menu a-Bg">
          <a href="#userSetting" class="user a-Bg">Administrator Tool</a>
          <div id="userSetting" class="setting">
            <div class="inner">
              <ul>
                <li><a href="<?=$main_title_7th_url?>"><?=$main_title_7th?></a></li>
                <li><a href="<?=$main_title_8th_url?>"><?=$main_title_8th?></a></li>
                <li><a href="<?=$main_title_9th_url?>"><?=$main_title_9th?></a></li>
                <li class="last"><a href="/oktomato/member/logout.php"><span>Log Out</span></a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </section>
  </div>
</header>
<nav id="lnb">
  <div class="inner">
    <ul class="list">
      <li class="m1"><a href="<?=$main_title_1th_url?>"><?=$main_title_1th?></a></li>
      <li class="m2"><a href="<?=$main_title_2th_url?>"><?=$main_title_2th?></a></li>
      <li class="m3"><a href="<?=$main_title_3th_url?>"><?=$main_title_3th?></a></li>
      <li class="m4"><a href="<?=$main_title_4th_url?>"><?=$main_title_4th?></a></li>
      <li class="m5"><a href="<?=$main_title_5th_url?>"><?=$main_title_5th?></a></li>
      <li class="m6"><a href="<?=$main_title_6th_url?>"><?=$main_title_6th?></a></li>
    </ul>
  </div>
</nav>
<script>
$("#header .menu").find(".setting").css("display","none").end().find(".user").on("click",function(){
  if(isie7 || isie8){
    $(this).next().toggle();
  }else{
    $(this).toggleClass("on").next().fadeToggle(300);
  }
  return false;
});
</script>
