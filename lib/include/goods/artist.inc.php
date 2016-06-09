 <section id="mainInfoPopup" class="layer_popup1">
    <header class="searchBox">
        <input name="artist" type="text" class="inp_txt w190 searchPopup" id="artist" value="" >
        <button class="searchPopup" type="button" onclick="searchArtist();"><img src="/oktomato/images/btn/btn_search_off.jpg" alt="검색"></button>
        <button class="close"><img src="/oktomato/images/btn/btn_close.gif" alt="닫기"></button>
    </header>
     <article class="cont">
        <h1>검색결과</h1>
        <div class="scrollBox1" id="div-artist">
          <ul>
            <!--li><button type="button" onclick="setArtistInsert('')">서길동(1953) 서울대학교</button></li>
            <li class="rgh"><button>김길동(1988) 첼시 예술대학</button></li>
            <li><button>서길동(1953) 서울대학교</button></li>
            <li class="rgh"><button>박길동(1982) 서울대학교</button></li>
            <li><button>박길동(1943) 홍익대학교</button></li>
            <li class="rgh"><button>이길동(1984) 홍익대학교</button></li-->
          </ul>
        </div>
        <p>※ 검색결과가 없을 경우 신규 <span class="fc_blue td-u" onclick="createArtist();" style="cursor:pointer;">작가 등록</span></a>을 진행해 주십시오.</p>
     </article>
 </section>