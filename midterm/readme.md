---
title:  "중간고사"
date:   2020-11-02
author: 최은오
---

다양한 영화 관련 정보를 얻을 수 있는 Film World 웹페이지를 소개합니다.  
Film World에서는 아래와 같은 정보를 제공합니다.  
- 배우의 이름으로 해당 배우의 필모그래피를 볼 수 있습니다.  
- 15가지 장르 별 영화 정보를 볼 수 있습니다.
- 1975년부터 2018년까지 당해 가장 많은 수익을 얻은 영화들을 볼 수 있습니다.   

1. 개발 환경
    - MYSQL  
        Mysql Workbench라는 도구가 있다. 데이터베이스 설계부터 생성 및 조작 등을 GUI 환경에서 수행할 수 있도록 서비스를 제공하는 도구이다. kaggle에서 제공하는 데이터셋을 DB에 다운로드하는 방법을 찾아보던 중 Mysql Workbench에서 csv 파일을 가져와 데이터로 변환하는 방법이 있었고 이 방법을 사용하기 위해 이번 프로젝트의 데이터베이스로 Mysql을 사용하기로 결정했다.
    - Windows  
        Mysql Workbench를 사용해 csv 파일을 가져와 테이블 내 데이터로 저장하기까지의 과정이 GUI 환경에서 훨씬 간단할 것이라는 생각에 개발 환경으로 Windows를 선택하였다. 


2. 발견한 정보
    - 사용한 table
        - actor: 배우ID, 성, 이름 정보
        - film: 영화ID, 영화 제목, 소개, 개봉 연도
        - film_actor: 배우ID, 영화ID
        - category: 장르ID, 장르명
        - film_category: 영화ID, 장르ID
        - blockbusterss: 장르명, 영화제목, 제작사, 당해 순위, 수익


    - 검색한 배우가 촬영한 영화 목록 조회
        배우 테이블과 영화를 촬영한 배우 테이블(film_actor), 그리고 영화 테이블을 결합해 사용자가 입력한 이름의 배우가 촬영한 영화 목록을 조회할 수 있다.

    - 장르 별 영화 목록
        장르 테이블과 영화 장르 테이블, 그리고 영화 테이블을 결합해 15가지 장르 별 영화 목록을 조회할 수 있다.

    - kaggle의 데이터를 사용한 1975 - 2018년도 별 최대 수익을 얻은 영화 
        1975년부터 2018년까지 당해 가장 많은 수익을 낸 영화들을 살펴볼 수 있다. 년도는 사용자로부터 입력을 받는다.
3. [동작 화면 영상](https://youtu.be/H5eB23Kjwyw)