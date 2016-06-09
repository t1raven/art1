 <section id="RecommendedListPopup" class="layer_popup1">
     <button class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
     <article class="cont">
        <h1>검색결과</h1>
        <div class="scrollBox2" id="div-referee">
          <ul>
            <?php foreach($refereeList as $row):?>
            <li><button type="button" onclick="setRefereeInsert('<?php echo $row['recommend_idx'];?>','<?php echo $row['referee'];?>');"><?php echo $row['referee'];?></button></li>
            <?php endforeach;?>
          </ul>
        </div>
        <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u" onclick="createReferee();" style="cursor:pointer;">추천인 등록</span>을 진행해 주십시오.</p>
     </article>
 </section>