---
title:  "중간고사 회고"
date:   2020-11-02
author: 최은오
---

중간고사 과제에 대한 회고를 남긴다.

1. (+)
    이번 중간고사 과제를 하면서 kaggle의 존재를 알게 되었다! 생성된지 얼마 되지 않아 신선하고 흥미로운 주제의 데이터들을 많이 발견할 수 있었다. 다양하고도 최신의 데이터를 자유롭게 사용할 수 있는 서비스를 알게 되어 앞으로 데이터베이스 실습을 할 때 요긴하게 사용할 수 있겠다는 생각을 했다. 그동안 수행했던 과제처럼 내가 직접 주제를 선정해서 그런지 재미있게 개발할 수 있었다. 

    
2. (-) 
    처음 주제를 선정할 때에는 stack overflow에 등록된 질문과 답변 정보를 바탕으로 프로그래밍 지식인 서비스를 만들고자 하였다. 이를 위해 kaggle에서 Python과 관련된 stack overflow QnA 정보를 담은 데이터셋을 다운로드하여 Mysql Workbench에서 import하였다. 해당 csv 파일에는 column이 약 6만 개정도 있었는데 30분 동안 기다려도 아무런 진척이 없었다. 꽤나 오랜 시간을 기다렸음에도 진행이 되지 않아 이보다 작은 용량의 데이터셋을 사용해야겠다는 생각을 했고 나의 "지식인 (feat. stack overflow)" 프로젝트 대신 다른 주제로 프로젝트를 수행하기로 하였다. 이 점이 가장 아쉬웠다.  

3. (!)
    - css에서 특정 글자만 다른 색으로 설정하기 위해서는? inline-block을 사용합니다.
        ```
        <div>
            <h3> 안녕하세요 </h3>
            <h3> 마요 </h3>
            <h3> 입니다.</h3>
        </div>
        ```
        위와 같이 div 태그 안에 세 개의 h3이 있고 가운데 마요를 감싼 h3의 글자색만 변경을 하고 싶을 땐 세 개의 h3에 대해 diplay 값을 inline-block으로 설정하면 된다. 
    - kaggle에서 데이터셋 다운로드 받기
        여기서 Mysql Workbench를 사용할 때 데이터를 저장할 DB와 table은 이미 생성해놓은 상태임을 유의할 것!
        1. kaggle에서 데이터셋을 다운로드 받는 방법은 먼저 csv 파일을 다운받는다.
        2. Mysql Workbench에서 생성해둔 DB에서 tables에 대해 table data import wizard를 클릭한다.
        3. csv 파일을 가져온 후 생성될 데이터들의 field들을 확인한다. 필요없는 field라면 체크를 해제하면 된다.
        4. import를 시작한다.
        5. 끝날 때까지 인내의 시간을 가진다.  

            ※ import하는 과정에서 오류가 생길 수 있는데 field에 이름이 없거나 유효하지 않은 데이터여서 오류가 발생하는 경우가 많으니 생성될 field의 이름과 값들을 잘 확인해야 한다.