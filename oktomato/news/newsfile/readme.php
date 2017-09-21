<?php
/*
머니투데이 파일로 뉴스 업로드 

1. 뉴스 텍스트 파일 저장 폴더에 ftp를 이용하여 파일을 업로드 한다.
2. 업로드 될 파일은 정확한 양식에 맞아야 한다. (정확한 양식은 샘플파일 확인 / 머니투데이에서 만들어서 주는 파일이기 때문에 그쪽의 양식을 따른다.)
3. 업로드 될 파일 경로
	/www/oktomato/news/newstxt
4. 파일을 업로드 하면
	/www/oktomato/news/newsfile/file_read.php 
	파일을 실행한다.

파일은 다음과 같은 로직으로 업로드 된다.
업로드된 파일명은  
DB  news_file_upload_txt 테이블에 목록이 저장된다.
저장된 목록에 있는 파일은 다시 불러오지 않는다.

파일을 하나 씩 읽어와
DB 의 news_main / news_paragraph 에 저장된다.

파일이 많을 경우 
DB 에 뉴스 데이터 기록 시 에러가 나는 부분이 있을 수 있기때문에 
newstxt 폴더에 파일을 쪼개서 업로드 하는 것이 좋다.
가령 파일 갯수가 10000 개일때 1000 개씩 넣고 업로드 후 삭제하고
다시 1000개 넣고 하는 것을 반복 하는 것이 좋다.
*/
?>