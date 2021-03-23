---
layout: post
title: 컴퓨터 네트워크 실습 application Layer
date: 2021-03-17
author: OH
categories: ComputerNetworking
---

#### 오늘의 주제 : Application Layer  



**어플리케이션 계층**  

** 계층은 바로 밑의 계층을 활용해 구현함.  

** 어플리케이션 계층의 두 가지 paradigm : client - serer, peer-to-peer  



**네트워크 어플리케이션**  

네트워크를 필요로 하는 어플리케이션.  

WEB, SNS, Email, 여러 Game, Twitch, P2P, Skype, Zoom 등등...  



**네트워크 앱 만들기**  

구현을 한다면 일단  

1. end system에서 동작. 여러 곳에서 동시에.  
2. 각각의 host들은 네트워크 통해 통신



각각의 end system들은 모든 계층을 다 필요로 함.  application에서 physical까지.  

특히 application 계층 => host에서 구현을 해야 함.  



** host에만 application 계층을 구현함. packet switch, Router 등에 network core를 위한 프로그램을 제작하진 X  

** 어플 개발이나 전파가 쉬워짐. 사용할 수 있는 end system, 모바일이나 PC 등에 이를 대상으로 application을 만들기 때문에.  



**패러다임**  



1. Client - Server Paradigm

   - 서버

     - 항상 켜져있음.  
     - 영구적인 IP 주소를 가짐. 고정 IP 주소를 가짐. 변하면 접근하려는 IP 주소를 알기 어려우니까. 
     - 여러 클라이언트가 여러 요청을 하기에 서버가 데이터 센터 규모가 됨. 데이터 센터 정도의 규모가 가상의 서버가 되게 구축한다는 의미. 스케일링을 위함.

   - 클라이언트

     - 서버와 통신을 함

     - 간헐적으로 연결됨

     - IP 주소가 언제든 바뀔 수 있음.

     - 클라이언트끼리 직접 통신할 필요는 없음

     - 예시) HTTP, IMAP, FTP 

       

2. Peer-Peer Architecture

   - 서버가 항상 존재하는 것이 아님. 중간에 끊겼다가 다시 동작할 수 있음.
   - end system끼리 직접 소통함.
   - 서비스도 서버뿐 아니라 클라이언트 서로서로 제공함.
   - 클라이언트 - 서버가 언제든 바뀔 수 있음
   - self-scalability (스스로 스케일링이 가능)
   - peer들은 간헐적으로 연결되고 IP 주소가 달라질 수 있음 -> 관리가 복잡
   - 예시) P2P file sharing



**Processes Communicating**  

프로세스 : 실행 중인 프로그램.  하나의 호스트 안에서 동작하는 프로그램.  

하나의 호스트 안에서도 통신이 가능함. inter-prpcess communication (IPC)  

  

서로 다른 호스트의 프로세스끼리 메시지 교환해 통신할 수 있는 방법은?

클라이언트 프로세스 : 통신을 시작하는 쪽.  

서버 프로세스 : 연결되기를 기다리는 쪽.  



**Sockets**  

서로 메시지 교환하는 방법?  

socket을 활용해 메시지를 교환할 수 있음.  

socket = 일종의 API. 이를 사용해 application이 쉽게 다른 application과 메시지를 주고받을 수 있게 구현할 수 있음.  

socket은 문(door)임. 이 문을 통해 네트워크로 나갈 수 있다.  

메시지를 보내는 쪽 프로세스는 메시지를 문 밖에 갖다 놓음. (socket에 메시지를 보냄)  

밑의 transport 계층을 활용해 수신자 socket에 원하는 메시지를 보낼 수 있음.  

양쪽의 socket이 메시지를 주고받으려면 둘 다 관여를 해야 함.  



**Addressing processes**  

어디로 보내야 되는데??  

메시지를 보낼 목적지(주소) = unique해야 함.  

ex. 32비트 IP address가지고 host advice를 구분할 수 있음.  



Q. 어떤 host의 IP 주소만 알고 있으면 거기로 메시지 보낼 수 있나요?  

아님!!!  

host에서 프로세스 한 개만 돌아가지 않음. 여러 프로세스가 해당 host에서 돌아감. 그래서 어느 host로 갈지는 알 수 있지만 수많은 host의 네트워크 어플리케이션 중 어느 어플리케이션에 메시지를 전달해야 하는지 알 수 없음.  



so 식별자는 IP 주소뿐 아니라 **port number**를 사용함.  

어떤 network application에 메시지를 전달해야 하는지를 알기 위해.  

so 모든 네트워크 어플리케이션은 port number를 가지고 있어야 함.  

ex. HTTP 서버의 경우 port 80을 기본으로, mail 서버는 25를 기본으로 사용.  





ex. gaia.cs.umass.edu 웹 서버로 HTTP 메시지를 보내려면 : IP 주소 + port number를 알아야 한다 이 말이다.  





**어플리케이션 계층 프로토콜 정의**  

교환하려는 메시지에 메시지 종류를 정의해야 함.  

request인지 response인지 구분할 수 있어야 함.  

메시지의 문법도 중요함. 어떤 필드? (ex. 헤더에 type은 0부터 4비트 ...)  

메시지의 semantics - 메시지의 의미. 헤더에 있는 type에 req, res라 적혀있진 않음.  한 비트로 표현이 가능(=> 각 비트가 어떤 의미 가지는지도 정의해야 함)  

메시지의 규칙 - 언제 send response를 어떻게 처리할지 등도 프로토콜에 정의되어 있어야 함.  

프로토콜에는 공개 / 비공개 프로톨이 있음.  

- 공개
  - RFCs로 공개된 것은 다 공개 프로토콜. 모든 사람들이 RFC에 접근 가능. 프로토콜이 공개되어 있고 모든 응용이 이를 따라 구현되면 서로 상호작용이 가능.
  - ex. HTTP, SMTP
- 사유(비공개)
  - Zoom, Skype 등
  - 자기들끼리만 통신 가능. 자기들이 필요한 것을 나름대로 정의해서 쓰는 것.



**계층들은 그 밑에 있는 계층을 활용해 구현한다고 했다**  

어플리케이션이 사용하는 transport service의 특징  

1. data integrity - 데이터를 전송하는데 100% 신뢰성있게 전송을 한다. 내가 보내는건 아무 손실 없이 100% 전송이 된다.  

   (ex. file transfer, web transactions -> 메시지 보냈는데 반대쪽에서 받지 못하면 큰 문제가 생길 수 있음. so 이런 어플리케이션들에게 data integrity를 제공해줘야 함. 물론 오디오, 비디오 앱 같은 건 약간의 손실 발생해도 문제 없음 => data integrity는 선택적)  

2. timing - 전화하거나 FPS 게임을 할 때는 굉장히 delay가 중요함. 전화하는데 말하는게 10초 뒤에 전달되거나 총을 쐈는데 내가 죽어있다? 어?  delay가 매우 중요. 시간적으로 메시지를 보냈을 때 어느 시간 안에 전송이 됨을 보장할 수 있어야 함.  

3. throughput - 대역폭. 어떤 앱들은 최소한의 대역폭을 제공해야 효율적인 경우가 있음.  넷플릭스를 시청할 때 버퍼링이 생겨 못보는 경우 있을 수 있는데 아무리 기다려도 계속 버퍼링... 하 개빡침. 이러면 안됨. 어느 정도의 대역폭을 보장해줘야 영상을 보거나 실시간으로 음악을 듣거나 할 수 있음. 이 또한 선택적(안필요한 앱들을 elastic app이라고도)  

4. security - 보안. encrytion, data integrity(데이터 깨지지 않게 보장) 등  



**Internet transport protocols services**  

- TCP
  - reliabe transport - 신뢰성 있게 전송한다. 보내면 loss 발생하지 않게 보장해줌
  - flow control - sender의 속도가 receiver의 속도를 넘어설 수 없음.
  - congestion control - 네트워크가 너무 복잡하면 sender를 throttle.
  - connection-oriented - 연결 지향성. 클라이언트 프로세스와 서버 프로세스가 통신하기 위해서는 항상 setup(= connection)이 필요하다. 연결이 먼저 필요하다.
  - not provide - timing이나 최소 throughtput 보장, security는 제공하지 않음. 필요하면 응용 계층에서 구현해야 됨.

- UDP
  - unreliable data transfer - 기본적으로 신뢰할 수 없음.
  - not provide - reliability, flow control, congestion control, timing, throughput 보장, security, connection setup 등 제공하지 않음.(connection setup 필요하지 않은건 장점. 바로 보내면 됨)



그럼 UDP 왜 있는거임? 기본적으로 성능이 굉장히 중요할 때 많이 씀.  

결국 reliable transport를 제공하려면 메시지를 보냈는데 일정 시간 답이 없음 반복해서 보낸다는지 행동을 취하는데 의도치 않은 패킷이 많이 생겨남 -> 쓸데없이 네트워크 대역폭 잡아먹음. 이와 달리 UDP는 정확히 내가 보내려는 데이터가 최소한 정보 가지고 전송이 되기에 트래픽이 덜 발생함. UDP 가지고 reliable transport 구현할 수도 있지만 어플리케이션마다 패킷 도착 순서까지 보장할 필요까진 없을 수 있음. so 어플리케이션 단에서 trade-off를 할 수 있는 것.  



**Securing TCP**  

Vanilla(=날것의, 기본) TCP & UDP sockets  

- no encryption
- 비밀번호 전송시 -> sniffing 당할 수 있음.  



그래서 등장한 것이 Transport Layer Security(TLS)  

- TCP 연결 시 encryption 제공
- data integrity(데이터 전송 시 깨지지 않게 보장)
- end-point authentication(호스트 속이지 못하도록)



** TLS는 transport 계층에서 새롭게 구현된 것이 아니라 TCP를 써서 어플리케이션 계층에 구현된 것임. 구현된 TSL 라이브러리 가져다 응용 구현하면, 라이브러리에서 제공하는 socket API 써서 구현하면 자동으로 socket으로 보내는 것이 encryption된다!  





