---
layout: post
title:  "sessionStorage 사용해보기"
date:   2021-02-09
author: MYOH(최은오)
categories: WinterInternship
---

1. sessionStorage를 사용해 보았습니다.

   A, B, C, D, E 다섯 개의 tab이 있는 웹 페이지가 있다고 합시다. 처음 이 웹 페이지에 들어오면 A tab의 내용을 기본으로 보여줍니다. tab 별로 각기 다른 정보를 보여주고 tab 위에 다른 페이지로 이동하는 버튼이 있습니다. 만약 B tab에 있는 내용을 보다가 다른 페이지로 이동하는 버튼을 눌러 그 페이지의 내용을 보다가 뒤로가기를 눌렀을 때, 내가 마지막으로 보고 있던 B tab의 내용이 뜨게 하려면 어떻게 해야할까요? 잠깐 이동했다가 다시 돌아왔을 때,  내가 보고있던 내용이 뜨게 하려면 어떻게 해야 할까요?? 구글에 검색해봤을 땐 cookie에 저장하라는 내용을 볼 수 있었습니다. 하지만 보고 있던 tab의 정보, 즉 tab에 해당하는 html 태그의 속성 정보를 기록하는데 cookie를 사용하자니 불편해보였습니다. 조금 더 검색해보니 web storage라는 것을 발견할 수 있었습니다. 클라이언트 단에서 사용자의 정보를 저장할 수 있는 간단한 방법이었습니다.

   web storage는 local storage와 session storage가 있는데 local의 경우 데이터를 삭제하지 않는 한 계속 저장하고 있고, session은 session이 연결되어 있는 동안 데이터를 저장합니다. 기본적으로 key - value 쌍으로 데이터를 저장합니다.

   제가 다루고 있는 시스템의 페이지에서는 다섯개의 tab이 있고 데이터를 조회할 특정 tab을 누르면 해당 tab에 해당하는 div에 current 클래스가 추가되고 current 클래스가 있는 tab의 내용을 보여주는 형식입니다. 여기서 다른 tab으로 이동한다면 기존의 tab의 div에서 current 클래스가 사라지고 새로 클릭한 tab의 div에 current 클래스가 생기는 것이죠. 자바스크립트를 이용해 클릭 이벤트를 사용해 동적으로 태그의 속성을 추가하고 삭제하는 것입니다. 결론은 다른 페이지로 이동할 경우 current 클래스가 있던 div의 정보를 저장하면 되는 겁니다. 이 정보는 영구적으로 저장할 필요 없다고 판단하여 sessionStorage를 사용하기로 하였습니다. 

   

   

   