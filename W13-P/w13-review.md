---
layout: post
title:  "13주차 과제(W013-P) 회고"
date:   2020-11-30
author: MYOH(최은오)
categories: DBProgramming
---

이번 과제를 하며 느낀 개인적인 회고를 남긴다.  
과제 내용 요약 _"JSP로 직원 정보 조회 추가 삭제 페이지 만들기"_   
이번 시간에는 Oracle에 저장되어 있는 employees 데이터를 기반으로 JSP로 직원 정보를 조회하고 추가하고 삭제하는 웹 페이지를 제작해보았다.

1. 새로 배운 내용
    - Hello, JSP  
      Java Server PAge의 약자인 JSP는 html 내부에 자바 코드를 입력해 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어다. JSP 구성요소로는 클라이언트로 출력되는 컨텐츠인 템플릿 데이터와 서블릿 생성 시 특정 자바 코드로 바뀌는 태그인 JSP 전용 태그, 그리고 JSP 내장 객체가 있다. request, response, session등은 별도로 선언하지 않아도 사용이 가능하다.  
      컨트롤러로 서블릿/필터가 있고 View단으로는 JSP Pages, 그리고 Model로 JavaBeans가 있다. 이 세 가지가 서버 측을 이뤄 Data Source/DB와 데이터를 주고받는다.

2. 발생한 문제와 해결 과정
    - 해당 이클립스가 vm 버전이 맞지 않습니다.
        Eclipse Enterprise 버전을 설치하기 위해 .zip 파일을 다운로드 받았다. 그리고 압축을 풀어 eclipse 파일을 실행했다. 그런데...! version 1.8.0_261 of the jvm is not suitable for this product. version 11 or greater is required란 에러가 발생했다. 구글링을 통해 해당 오류에 대해 찾아보니 eclipse 폴더 내 eclipse.ini 파일에서  
        -Dosgi.requiredJavaVersion=11 부분을 11을 1.8로 바꾸면 된다는 것을 알게되었다. 그렇게 하면 이클립스가 실행이 되긴 하는데 dynamic web programming 폴더를 만들 수 없는 등(아예 존재하질 않음;;) 사용해야 하는 이클립스의 형태와 달랐다. 결국 Eclipse Installer를 통해 Enterprise 버전을 설치했고 정상적인 환경(?)에서 실습을 할 수 있었다.  
    - 톰캣아 어디있니?!  
        이 문제는 위에서 얘기한 문제와 같은 원인이었던 것이라 생각하는데 이클립스에서 톰캣 서버를 제어하기 위해 server runtime environments에서 tomcat 8.5를 추가하려고 하는데 tomcat 대신 geronimo라는 것만 있었다. 그래서 필요한 소프트웨어를 추가적으로 설치하기 위해 Web, XML, Java EE and OSGi Enterprise Development에서  Eclipse JST Server Adapters를 설치하려고 했다. 그런데 이럴 수가 이 파일도 눈에 보이지 않는 것이다... 조금 더 검색을 하다보니 Dynamic Web programming이 안보일 때 해결 방법으로 저 어댑터를 설치하는 것이 있기도 했다. 하지만 나는 이 소프트웨어 조차 보이지 않았고... 이클립스 인스톨러를 통해 설치했을 때에는 tomcat 8.5가 제대로 나왔기에 이 문제 역시 ~~허무하게~~ 해결되었다.
    - 오라클 실행이 안돼요!  
        OracleServiceXE를 실행하기 위해 startDB 파일을 실행하니 cmd가 열린 후 아무 반응을 하지 않았다.  
        교수님 컴퓨터 상으로는 start.... 이런 식으로 실행되고 있음을 보여주던데 내건 왜이러지??  
        startDB를 통하지 않고 cmd에서 net start OracleServiceXE 명령어로 실행하려고 하니 시스템 오류 5이(가) 생겼습니다. 액세스가 거부도었습니다란 오류가 발생했다. 해결 방법은 간단했다. cmd를 관리자 권한으로 실행하면 된다. ^^

3. 참고할 만한 내용  
    이번에는 설치부터 정말 많은 오류를 만나서 참고한 자료들이 많았다.  
    - [이클립스 서버 타입에 톰캣이 보이지 않는다면](https://m.blog.naver.com/PostView.nhn?blogId=hjinha2&logNo=221180700448&proxyReferer=https:%2F%2Fwww.google.com%2F)  
    - [JVM is not suitable for this product 해결방법](https://mindolsj-dev.tistory.com/3)  
    - [시스템 오류 5가 생겼습니다 문제 해결 방법](https://extrememanual.net/7419)  

4. 회고
  - 좋았던 점(+)  
    jsp하면 학교 포털이 생각난다. 로그인 페이지 url이 https://portal.sungshin.ac.kr/sso/login.jsp 이기 때문이다. 이번에 JSP로 웹 페이지를 제작해보면서 어떤 식으로 연결을 하고 데이터를 처리하는지 알 수 있었다. DB에 연결하고 쿼리를 던져 데이터를 처리하는 일련의 로직이 PHP와 비슷해 내용을 이해하기에도 쉬웠다. 설치부터 설정하는 과정은 너무나도 험난했지만...  
  - 아쉬웠던 점(-)  
    Data Source Explorer에서 새로운 Database Connection을 만들고자 했다. JAR List에서 ojdbc6 파일을 추가하고 Service Name은 xe이니 Connection URL을 jdbc:oracle:thin:@server:1521:xe로 설정하고 Port number는 1521, 유저 네임과 패스워드를 모두 잘 작성한 뒤 test connection을 시도했다. 그러나 Ping Failed 메시지가 나타났고 java.sql.SQLRecoverableException: IO 오류가 나타났다. 검색을 해보니 해결 방법으로  
    - 오라클 실행하기
    - 오라클 Listener 실행(or 새시작)하기
    - 방화벽 설정(1521 포트 번호 허용)
    - SID 이름 확인(listeer.ora 파일이나 tnsnames.ora 파일에서 SID 네임이 한글로 설정되어 있는 경우)  
    등이 나왔다. 모든 방법을 다 사용해보았다... 하지만 그럼에도 ping 테스트는 성공하지 않았고 아직까지 해결하지 못한 문제로 남아있다. 그동안 문제가 발생하면 거의 다 해결해냈는데 이 문제는 정말 모르겠다. 더 자료를 검색해볼 수밖에... 아쉬움이 크다.  
  - 새로 알게된 점(!)  
    1. Project Exporer 열기  
      이클립스의 이것저것을 만지다가 Project Explorer 창을 꺼버렸다. 다시 여는 방법은 window에서 show view -> package explorer를 클릭하면 된다.  
    2. ORA-00900, invalid SQL statement 오류는 SQL 문법에 문제가 있어 발생하는 경우가 많다. 잘 확인하자.  
    3. 인덱스에서 누락된 IN 또는 OUT 매개변수 오류는 sql문에서 ? 개수가 맞지 않아 발생하는 경우가 많다. ?의 개수를 잘 확인하자.  
    4. 자바 패키지는 고유한 이름이어야 한다. 전세계적으로 말이다! 고유 명수처럼 고유한 이름을 짓자.  
  - 과제 영상  
    이번 주 과제의 시뮬레이션 영상을 첨부한다.  
    [과제 영상 보러가기](https://youtu.be/wZu5MYCDuK8)