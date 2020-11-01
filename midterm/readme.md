 ### 개발 환경 소개 : 내가 사용한 환경과 그 이유
 - 저는 MariaDB를 이용하여 데이터베이스를 사용했고, 서버 사이드 언어로 PHP, 리눅스 서버를 선택했습니다.
    그리고 HTML과 CSS를 사용하여 웹페이지를 꾸몄습니다.
    이러한 환경을 사용한 이유는 VSCode프로그램을 이용하면서 MariaDB와 리눅스의 편의성을 느끼게 됐고, 요즘 리눅스 서버 또한 일반 윈도우 서버에 뒤쳐지지 않아 프로젝트를 진행하는데 지장이 없을 것이라고 생각했습니다.


### 발견한 정보 3개 소개
- 저는 Grammy 어워즈에 대한 데이터베이스를 캐글에서 가져와 사용했습니다.
    이 데이터베이스에는 grammyAlbums, grammySongs, artistDf, billboardHot100 테이블이 들어있고, 제가 이용한 속성은 
    1. grammyAlbums - Award, GrammyYear, Genre, Album, Artist
    2. grammySongs - GrammyYear,Name,Artist
    3. artistDf - Artist,Followers,Genres,NumAlbums,Gender
    4. billboardHot100 - Artists,Name,Lyrics
    입니다.

    발견한 정보(데이터 분석한 정보)는
    1. 연도별로 데이터를 정렬하여 그래미 어워즈에 대한 정보를 출력하기
    2. 장르별로 데이터를 정렬하여 그래미 어워즈에 대한 정보 출력하기 (장르 선택은 사용자에게 맡긴다)
    3. 팔로워 많은 순으로 그래미 어워즈에서 수상한 아티스트, 성별 등으로 데이터를 정렬하여 출력하기/테이블 2개 조인
    4. 노래 제목을 입력하여 가사, 아티스트 등 노래에 대한 정보 출력하기/테이블 2개 조인

### 동작 화면 소개
-  https://youtu.be/ez3wyjJIY04