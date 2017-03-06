<div id="path">
<?php if ($subNum != "") {?>
        <h1><?=$position_title_sub?> / <?=$pageName?></h1>
        <p class="location"><a href="<?=$currentFolder?>">Home</a>   &frasl;   <a href="<?=$position_title_url?>"><?=$position_title?></a>   &frasl;   <a href="<?=$position_title_sub_url?>"><?=$position_title_sub?></a></p>
<?php }else{?>
        <h1><?=$position_title_sub?></h1>
        <p class="location"><a href="<?=$currentFolder?>">Home</a>   &frasl;   <a href="<?=$position_title_url?>"><?=$position_title?></a></p>
<?php }?>
      </div>
