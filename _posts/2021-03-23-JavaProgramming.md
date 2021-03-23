---
layout : post
title : 자바 배우기 2편- 메서드와 switch문
date : 2021-03-23
author : OH
categories : JavaProgramming
---

##### 반복문

for - 반복 횟수를 알 때 사용하면 간결하게 반복문 작성 가능  



##### 분기문에서 break

```java
out : while(){
	while(){
		break out;
	}
}
```



break 뒤에 out : label.  

label이 가리키고 있는 반복문을 벗어난다는 의미.  

****

##### Switch 문

기존 switch문은 낙하방식으로 콜론 case 라벨을 이용.  

JDK 14부턴 비낙하방식의 화살표 case 라벨 도입. switch 연산식이 가능.  



**콜론 라벨을 사용하는 기존 switch문**  

```java
switch(변수){
	case 상수1: //0개 이상의 실행문
	
	default : 
}
```

TIPS.  

- case 상수1 : case 라벨.  

- 실행문 : break가 없으면 계속해서 다음 case 실행. (낙하방식) 

- switch 변수로 정수 타입만 사용할 수 있었으나 JDK 7부터는 문자열, 열거 타입도 사용 가능.  



**개선된 switch문**  

break문의 누락으로 인한 오류 가능성, 깔끔하지 못하고 가독성 저하 ...  

변화한 점  

- 화살표 case 라벨
- switch 연산식
- 다중 case 라벨
- yield 예약어

예를 들어,  

```java
static void whoIsIt(String bio){
    String kind = "";
    switch(bio){
        case "호랑이":
        case "사자":
            kind = "포유류";
    		break;
        case "독수리":
        case "참새":
            kind = "조류";
    		break 
        case "고등어":
        case "연어":
            kind = "어류";
    		break;
        default:
           	System.out.print("헉! ");
            kind = "...";
    }
    System.out.printf("%s는 %s이다.\n", bio, kind);
}
```



이 switch문을 아래와 같이 개선할 수 있음.  



```java
static void whoIsIt(String bio){
    String kind = "";
    switch(bio){
        case "호랑이", "사자" -> kind = "포유류";
        case "독수리", "참새" -> kind = "조류";    
		case "고등어", "연어" -> kind = "어류";
        default -> {
            System.out.print("헉! ");
            kind = "...";
        }
    }        
    System.out.printf("%s는 %s이다.\n", bio, kind);
}
```

** 다중 case 라벨이 가능.  

** 화살표 다음에 실행할 문장이 옴. 기본적으로 한 개의 실행문만 쓸 수 있음. 또 비낙하방식이어서 해당 문장 실행하면 switch문 벗어남. break가 필요하지 X.  

** 실행문을 2개 이상 넣고 싶다면 실행문 자리에 중괄호를 써서 복합문으로 작성하면 된다.  



switch 연산식이란?  switch문을 변수에 대입해 사용 가능.  

```java
static void whoIsIt(String bio){
    String kind = switch(bio){
        case "호랑이", "사자" -> "포유류";
        case "독수리", "참새" -> "조류";    
		case "고등어", "연어" -> "어류";
        default -> {
            System.out.print("헉! ");
            yield "...";
        }
    };
    System.out.printf("%s는 %s이다.\n", bio, kind);
}
```

yield는 뒤에 있는 값을 return한다는 것. 즉 kind = "..."가 된다.  또 break를 포함하고 있어 실행 후 끝냄.  

아래와 같은 방법을 사용할 수도 있다.

```java
String kind = switch(bio){
    case "호랑이", "사자": // 다중 case 라벨이 가능. 
        yield 포유류";    // yield : 반환한다는 의미. 실행 후 break
    case "독수리", "참새":
        yield "조류";    
    case "고등어", "연어":
        yield "어류";
    default -> {
        System.out.print("헉! ");
        yield "...";
    }
};
```

Q. 기존 switch문에서는 블록이 아니더라도 yield 예약어를 사용할 수 있다는 말이 무슨 의미인지?  





**switch 연산식 사용시 주의사항**  

switch문이 연산식으로 사용될 때, 가능한 모든 값에 대해 일치하는 case 라벨이 없으면 오류 발생.  

=> switch 변수의 값에 해당하는 case가 없으면 오류가 난다는 뜻.  

(그러니 default를 만들어두어야 가능한 모든 값에 대해 오류 없이 실행 가능)  

****

##### Method

유사한 코드를 묶어 대표 이름을 내고 바뀌는 내용만 넣어주면 간결하게 나타낼 수 있지 않을까?  

- 중복 코드를 줄이고 코드를 재사용할 수 있다.
- 코드를 모듈화해  가독성 UP. 프로그램의 품질을 향상시킬 수 있다.



**method의 구조**  

```java
public static int sum(int i1, int i2) // header
```

- public : 접근 지정자
- static : 객체를 생성하지 않고 실행할 수 있음
- int : return type
- sum : method 이름



** 메서드 내에서 선언된 변수 : 지역 변수  



**method의 호출과 반환**  

method를 호출하면  제어가 method로 넘어가 method를 실행한다. return을 만나거나 실행이 끝나면 제어가 다시 돌아온다.  



**값 전달(call by value)**  

Java는 call by value를 사용한다.  

method 호출 시 인자값 -> 복사하여 method로 전달됨. (원본이 아니라 복사본이 전달)  



**method overloading**  

** method signature : 메서드 이름과 매개변수 개수, 데이터 타입, 순서를 의미  



메서드 이름은 같지만 메서드 시그니쳐가 다른 메서드를 정의하는 것 = method overloading  



max(3, 8)과 max(3, 5, 1), max(1.0, 2,0) => 이름이 같아도 세 method 모두 가능.  



** return type은 method overloading의 조건이 되지 않는다.  

** static method에서 static이 아닌 method 호출할 수 없다. (main에서 static 아닌 method 호출 불가능)  



*example*  

```java
public static int max(int n, int m){
	return (n > m) ? n : m;
}

public static double max(int n, double d){
	return (n > d)? n : d;
}

//순서도 오버로딩 가능 조건이 될 수 있다.
public static double max(double d, int n){
	return (d > n)? d : n;
}

public static int max(int i, int j, int k){
	return max(max(i, j), k);
}
```



  







   























