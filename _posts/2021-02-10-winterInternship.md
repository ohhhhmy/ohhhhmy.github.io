---
layout: post
title:  "오늘의 일지"
date:   2021-02-10
author: MYOH(최은오)
categories: WinterInternship
---

1. Jquery와 친해지길 바라

   교육관리에서 main에 있는 팀 별 달성률과 금액 정보를 가진 table에서 팀 이름을 클릭하면 해당 팀의 정보로 넘어가게끔 수정했습니다. jquery로 선택자를 지정할 때 너무나도 헷갈렸는데 이제는 어떻게 해야 하는지 감을 잡은 느낌입니다. 선택자의 class 값을 가져오려면 선택자.attr("class")로 가져오면 되고 클래스를 추가하거나 삭제하려면 addClass, removeClass를 사용하면 됩니다. 



2. disabled 썼다가 당황하게 된 이유

   며칠 전 프로젝트의 주간보고와 실적보고, 복사는 마스터만 바꿀 수 있게 해달라는 요구사항이 들어왔습니다. 주간보고나 실적보고는 단순하게 radio로 on off하여 저장하는데 이것을 어떻게 막을 수 있을까 생각했습니다. 아, 마스터 아래의 권한은 이 radio들을 disabled로 처리하면 되겠다!싶었습니다.

   ```html
   <form>
       <input type="radio" value="1" disabled>
       <input type="radio" value="0" disabled>
   </form>
   ```

   이런 식으로 말입니다. 그러면 버튼이 막혀 누를 수 없는 상태가 됩니다. 이렇게 하면 되겠지 싶었지만 저는 disabled의 특성을 제대로 알고 있지 않았고 결국 문제가 발생했습니다.

   수정 시 input으로 들어와야 할 주간보고, 실적보고, 복사의 데이터가 null로 들어오는 것이었습니다!!!  

   그렇습니다. disabled되어있는 input은 form을 submit할 때 기본적으로 전송되지 않습니다. 주간보고, 실적보고, 복사에 해당하는 value가 전송되지 않아 null이 뜬 것이고 그로 인해 오류가 발생하는 것이었습니다. 이 세 가지 요소를 disabled로 처리하면 안되는 것이었습니다. 

   그렇다면 radio 버튼을 누르지 못하게 할 방법은? 기본적으로 radio는 readonly도 먹지 않습니다. 

     ```html
   <form>
      	<input class="report" type="radio" value="1" readonly>
      	<input class="report" type="radio" value="0" readonly>
   </form>
     ```

   이렇게 해봤자 버튼은 잘만 눌립니다. 그렇다면? 방법은 radio에 onClick 이벤트를 연결하고 처리 함수에서 return false해주면 됩니다. 이렇게 말이죠.

   ```html
   <script>
   	$('.report').click(function(){return false;});
   </script>
   ```

   그러면 radio 버튼을 눌러도 눌리지 않습니다. 원하는 방식을 얻었습니다! 사실 사용자가 보기에는 disabled가 조금 더 "아 내가 수정 못하는구나"를 알기 쉽습니다. disabled는 회색으로 처리되어 아예 막혀있지만 위의 방식은 버튼만 눌리지 않을 뿐 수정이 가능할 때와 생긴건 똑같기 때문입니다.  

   결론적으로 disabled는 조심해야 합니다. 단순히 기존값을 변경하지 못하도록 처리하고자 한다면 한 번 더 생각해봐야 합니다. disabled 속성을 갖고 있는 input은 전송되지 않으니까요.

