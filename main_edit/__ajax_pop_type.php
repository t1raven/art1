
<section id="pop_edit" class="modal_type1">
    <div class="inner">
    	<div class="modal_header">
    		<div class="inner container">
				<h1>Contaents Type Setting</h1>
				<button class="modal_close" onclick="modalFn.hide($('#pop_edit'));">Close</button>
			</div>
    	</div>
        <div class="modal_content">
            <div class="inner">
                <div class="inner_cont type_setting">
                    <ul class="list w1h1">
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('spaceart1');">
                                <div class="img" style="background-image: url(/images/main_edit/type_spaceart1.jpg);"></div>
                                <div class="tit">Space art1</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('market_search');">
                                <div class="img" style="background-image: url(/images/main_edit/type_market.jpg);"></div>
                                <div class="tit">Market</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('galleries_search');">
                                <div class="img" style="background-image: url(/images/main_edit/type_galleries.jpg);"></div>
                                <div class="tit">Exhibitions</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('video');">
                                <div class="img" style="background-image: url(/images/main_edit/type_video.jpg);"></div>
                                <div class="tit">Video</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('mediaart1');">
                                <div class="img" style="background-image: url(/images/main_edit/type_mediaart1.jpg);"></div>
                                <div class="tit">Media art1</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('sns');">
                                <div class="img" style="background-image: url(/images/main_edit/type_sns.jpg);"></div>
                                <div class="tit">SNS</div>
                            </a>
                        </li>
                    </ul>
                    <ul class="list w2h1">
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('sns');">
                                <div class="img" style="background-image: url(/images/main_edit/type_sns.jpg);"></div>
                                <div class="tit">SNS</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('video');">
                                <div class="img" style="background-image: url(/images/main_edit/type_video.jpg);"></div>
                                <div class="tit">Video</div>
                            </a>
                        </li>
                    </ul>
                    <ul class="list w2h2">
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('market_search');">
                                <div class="img" style="background-image: url(/images/main_edit/type_market.jpg);"></div>
                                <div class="tit">Market</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="inner" onclick="mainEdit.next('video');">
                                <div class="img" style="background-image: url(/images/main_edit/type_video.jpg);"></div>
                                <div class="tit">Video</div>
                            </a>
                        </li>
                    </ul>
                    <script type="text/javascript">
                        if(mainEdit.data.size == 'w2h1'){
                            $('.type_setting .w2h1').css("display","block");
                        }else if(mainEdit.data.size == 'w2h2'){
                            $('.type_setting .w2h2').css("display","block");
                        }else{
                            $('.type_setting .w1h1').css("display","block");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>