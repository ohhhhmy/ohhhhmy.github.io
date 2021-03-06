---
layout: post
title: 자바 배우기 1편 
date: 2021-03-14
author: OH
categories: JavaProgramming
---

### 막학기인데 자바를 듣기로 한 이유  

1. 백엔드 개발자를 꿈꾸는 사람으로서 자바는 국룰이라 생각해서. (그냥 개인적으로 배워도 상관 없지만 학교 수업을 듣는 의미가 있다고 생각한다.)
2. 동아리 선배님께서 자바 or 자바스크립트 알면 먹고 살 수 있다고 하신 말씀이 인상 깊어서.  
3. 인턴할 때 JSP 개발을 자바 배우면서 했기 때문에 어느정도 기초는 알고 있어서. 하지만 인터페이스같은 건 하나도 몰라서 이런걸 배우고 싶기 때문이다.  



### 지금까지 한 내용  

오늘로 2주차인데 교수님께서 3월 1일부터 강의를 딱 올려두셨기 때문에 강의 듣기 시작한지는 벌써 3주째다. 간단한 Hello World 찍기부터 식별자, 데이터 타입에 대해서는 생략하고 이번주 들은 강의 부터 정리하고자 한다.  몇 가지 기억에 남겨둘 것은  

-  `boolean t = true, f = false;` 이렇게 선언이 가능하다.  

- `var` 예약어가 있다(자바 10부터) -> 지역변수로만 사용이 가능함( = method 안에 있어야 함)  

  ```java
  var i = 1; //이건 됨
  var i = 1, j = 2 //이건 안됨
      
  var str = null;
  //이것도 안됨. null은 string 만이 아니라 모든 참조 타입에서 쓸 수 있어 타입을 추론할 수 없기 때문
  
  var oops;
  oops = 1;
  //이것도 안됨. 선언과 동시에 초기화해야 함.
  
  void test(var x){
      //do something
  }
  //이것도 안됨. var을 매개변수 자리에도 쓸 수 없음. 인수 타입 결정 위해 var 키워드 쓸 수 없다 이 말이다.
  ```



### 오늘 배운 내용

#### 1. 표준 입출력

​	**데이터 출력하기**  

 - println() - 출력하고 행 바꿈

 - print() - 내용 출력만

 - printf() - 포맷 지정해서 출력  

   ex. `System.out.printf("x = %d", x);`

   포맷의 종류는 ...

   - %d - 10진수
   - %o - 8진수
   - %x - 16진수
   - %s - 문자열
   - %f - 실수

**데이터 입력하기**

System.in -> 좀 복잡함;;;  

Scanner라는 클래스가 나오기 전에는 복잡하게 키보드로 데이터 입력받았음.  

~~교수님 왈 클래스를 교수님께서 만들어서 학생들한테 뿌리심...~~ 

Scanner 사용 위해 클래스 import -> `import java.util.Scanner;`  

사용은  

```java
Scanner in = new Scanner(System.in);

int x = in.i.nextInt(); // 정수 읽어서 변수 x에 대입
```

Question. 이렇게 받았는데 int 말고 다른거 입력하면 ? 에러 납니다.  



method 종류  

- next() - String 받음  

- nextLine() - String 받는데 한 행을 다 받음  
- nextInt() - int 받음  



Question. 만약에 %를 찍고 싶으면요? %% 로 찍으면 찍힙니다.  



#### 2. 연산자

※ JVM은 기본적으로 32비트 단위로 계산한다.  

```java
byte b1 = 1;
byte b2 = 2;

byte b3 = b1 + b2;
```

이렇게 하면 `System.out.println()` 하기도 전에 마지막 코드에 빨간줄이 그이는데  

바이트 = 8비트인데 반면 연산은 32비트 단위로 하기 때문에 b1과 b2를 32비트로 바꾼 후 계산을 한다. b1 + b2의 결과 3이 32비트(=정수)이기 때문에 data type이 byte인 b3에 결과값을 저장할 수 없는 것이다.  



연산자의 종류는 생략한다.  대신 기억에 남는 것  

* instanceof = 데이터 값을 비교하거나 데이터 타입을 비교  

- 삼항 연산자 java도 지원  

* ^ => XOR  

- 쇼트서킷 

  (조건식1) && (조건식2) 이면 조건식 1이 false일 때 조건식2의 값 상관없이 결과 false.  

  && 대신 ||일 때도 마찬가지로 (조건식1) || (조건식2) 일 때 조건식1이 true면 조건식 2의 값 상관없이 결과는 true.  

  그런데 &&나 || 대신 &, |로 쓰면 조건식1뿐 아니라 조건식2의 진릿값도 따져봄. (쇼트서킷 적용을 안한다 이 말이다)  

- 비트 연산자 / 시프트 연산자는 정수 타입에만 사용 .  

- 삼항 연산자도 쇼트서킷 로직 이용.  

  

#### 3. 제어문과 메서드

**제어문**

제어문은 if, if-else, if-else if-else 얘기여서 패쓰.  

점수 입력받아 학점 부여하는 프로그램은 if-else 배울 때 만들어보는게 국룰인 듯 하다.  







 











  







