<?php
require($_SERVER['DOCUMENT_ROOT'].'lib/include/global.inc.php');

$categoriName = 'MEMBERSHIP';
$pageName = 'MEMBERSHIP';
$pageNum = '5';
$subNum = '0';
$thirdNum = '0';
$pathType = 'a';

include(ROOT.'inc/config.php');
include(ROOT.'inc/link.php');
include(ROOT.'inc/top.php');
include(ROOT.'inc/header.php');
include(ROOT.'inc/spot_sub.php');
?>
  <section id="container_sub"  class="mt0">
    <div class="container_inner">
    <? include "../../../../inc/path.php"; ?> 
      <div class="dashSubArea">
        <h1 class="title1 content-mediaBox ">기본정보수정[패스워드 변경]</h1>
      	<section id="formMailArea"  class="content-mediaBox margin1">
           <div class="formMailType1 searchID">
                	<p class="sub_txt">새로운 패스워드 적용이 완료되었습니다. </p>
                  <div class="btn_bot">
                    <!-- a href="/member/modify.php" class="btn_pack samll2 black">수정</a -->
					<a href="/" id="btnSave" class="btn_pack samll2 black">Home</a>
                  </div><!-- //btn_bot -->
			</div>	
		</section>
      <!-- //dashSubArea -->
      
      
    </div><!-- //container_inner -->
    </div>
  </section><!-- //container_sub -->

<script src="/js/jquery.chkform.js"></script>
<?php
include_once(ROOT.'inc/footer.php');
include_once(ROOT.'inc/bot.php');
?>













