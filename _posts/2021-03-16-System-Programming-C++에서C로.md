---
layout: post
title: System Programming 프로그램 컴파일과 실행
date: 2021-03-16
author: OH
categories: SystemProgramminig
---

### 주제 : C++에서 C로 ...

학교 커리큘럼상 C++만 배우고 C를 배우지 않아서 교수님께서 C에 대해 알려주셨다.



#### 1. IO  

C에서는 IO를 위해 함수를 쓴다.  



**File IO**

open  - file IO  - close 절차를 거친다.  

```c
#include <stdio.h>

int main(){
    char c;
    FILE *fpin, *fpout; 
    //FILE 타입의 pointer 변수 선언 FILE 타입은 헤더파일에서 정의한 타입임
    
    fpin = fopen(filename, "r"); //single quote 사용 불가능 
	fpout = fopen(filename, "w");
    //fopen()의 return value : file pointer 
    
    while((c = fgetc(fpin)) != EOF){ //fgetc() 글자 하나 가져오기
        fputc(c, fpout); // fputc() 글자 하나 출력. fpout에.
    	//마지막 글자까지 읽어서 더이상 읽을게 없으면
        //EOF를 return함.(= end of file)
    }
    //IO 끝났으니 file close. fclose() 인자는 file pointer
    fclose(fpout);
    fclose(fpin);
    
    return 0;
}
```



**이미 만들어져있는 File Pointer**

- stdin : 표준 입력. 키보드로 입력받음
- stdout : 표준 출력. 화면에 출력.
- stderr : 표준 오류. 화면에 출력함. 오류가 발생했음을 알려줌.



**표준 출력**  

```c
#include <stdio.h>

int main(){
    char c;
    FILE *fp;
    
    fp = fopen("data.txt", "r");
    
    while((c = fgetc(fp)) != EOF){
        fputf(c, stdout); //data.txt 파일에서 한 글자씩 읽어와 화면에 출력
    }
    fclose(fp);
    return 0;
}
```

stdin이나 stdout은 닫을 필요 없음. 기본적으로 만들어져있어서 그냥 쓰기만 하면 됨.  



**표준 입출력**  

```c
#include <stdio.h>

int main(){
    char c;
    
    while((c = fgetc(stdin)) != EOF){
        fputf(c, stdout); //data.txt 파일에서 한 글자씩 읽어와 화면에 출력
    }
    return 0;
}
```



fgetc() fputc() 대신 getchar() putchar() 함수 쓸 수도 있음.  

- getchar() - 표준 입력으로 읽어라  

- putchar() - 표준 출력으로 화면에 출력해라  



**한 라인 입출력**

```c
#include <stdio.h>

int main(){
    char s[256];
    FILE *fpin, *fpout; 
    
    fpin = fopen("data.txt", "r");
	fpout = fopen("result.txt", "w"); 
    
    while(fgets(s, 256, fpin) != NULL){ // 더이상 읽을게 없으면 null 반환
        fputs(s, fpout);
    }

    fclose(fpout);
    fclose(fpin);
    
    return 0;
}
```

라인 입출력은 fgets()와 fputs()를 쓴다.  

- fgets(배열이름, 크기, file pointer)

- fputs(내용, 출력할 곳)



**TIPS**  

** 배열의 크기를 초과할 경우 배열 크기만큼만 읽음.  

** fpout이나 fpin 대신 stdout stdin을 쓸 수 있다.  

** fgets() 대신 gets(), fputs() 대신 puts()를 사용할 수 있다. 대신 gets()나 puts()는 입력받을/출력할 내용을 담은 변수(위에서 쓴 배열 s 같은거)만 인자로 넣어주면 된다. 하지만 배열 크기를 인자로 주지 않기 때문에 배열 범위를 넘어서까지 읽어버려 메모리 문제가 발생할 수 있다. so 이 함수는 가급적 쓰지 말라고 컴파일러가 알려주기도 한다!  



**formatted input / output**  

- fprintf(file pointer, "출력할 내용", 출력할 내용 담은 변수) 

- fscanf(file pointer, "입력할 내용", 입력 내용 받을 변수)  



** 유의할 점

- fprintf() 나 fscanf()에서 "출력할 내용", "입력할 내용" 해당 내용의 형식을 지정해야 한다.    

  ex. fprintf(stdout, "학번 : %d\n", number);  

  ex. fscanf(stdin, "%d", &number);  

- fscanf() 에서 뭐는 & 쓰고 배열은 안쓰는 이유 : 배열 이름 is 배열의 시작 주소이기 때문에 & 넣으면 안됨. 어차피 주소다 이 말이야 

- printf()와 scanf()도 있는데 이건 file pointer 인자가 생략되어 있음. 표준 출력으로 출력해라, 표준 입력으로 입력받아라 의미.  



**형식 변환 문자**  

기억해야 할 것만 남긴다.  

- %s
  - 문자열
  - 출력 가능 data type : char 배열
- %lf
  - 실수
  - 출력 가능 data type : double



**그 외에**  

- 함수 오버로딩 불가능(함수 이름 다 달라야 함)
- default 인자 불가능
- class 정의 불가능
- 구조체가 곧 새로운 데이터 타입이 되는 C++에 반해 구조체가 곧 새로운 데이터 타입이 되는 것은 아님
  - 구조체 가지고 변수 선언하려면 `struct 구조체이름` 이렇게 `struct` 까지 붙여서 사용해야 함
  - 만약 구조체를 타입으로 사용하고 싶다면? 구조체 정의할 때 `struct 구조체이름` 대신 `typedef struct 구조체이름 `이렇게 사용해야 함



이번주 시스템 프로그래밍 수업 끝!  

vi 편집기 내용 배울 때 정말 재밌었다. 아 이제 알겠다~하는 그 쾌감... 쏘굳  



