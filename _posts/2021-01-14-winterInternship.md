1. 주간보고작성 기능을 마무리했습니다.  
   오늘은 프로젝트들 중 주간보고서를 사용하는 프로젝트들마다 PM과 투입명단의 사람들이 주간보고를 작성할 수 있는지 한 번 더 점검하였습니다. 주간보고를 작성할 프로젝트명을 클릭하면 이전에 작성한 주간보고 중 가장 최신의 것을 불러오는데, 몇몇 프로젝트들이 전에 작성한 보고를 불러오지 못하여 확인해봤습니다. 코드를 보니 쿼리문에 오류가 있는 것이 문제였습니다. 다음은 이전에 작성한 보고 중 가장 최신의 보고를 불러오는 쿼리입니다.  
   `select * from weekly_Report where 주차 = (select max(주차) from weekly_Report where 주차 < ?) and 프로젝트no=?`  
   해당 쿼리를 해석하면 weekly_Report에서 데이터를 가져올 건데 주차가 입력한 주차보다 작은 주차들 중 가장 큰 값이며 프로젝트 번호가 입력한 값인 데이터를 가져오라는 것입니다. 하지만 이 쿼리엔 문제가 있습니다.  예를 들어보겠습니다.  

   |      | 프로젝트1 | 프로젝트2 |
   | ---- | --------- | --------- |
   |      | 2020/12/4 | 2021/1/2  |

   이렇게 두 가지 프로젝트가 있다고 합시다. 프로젝트명 아래 적힌 숫자는 가장 최근에 작성한 주간보고의 주차입니다. weekly_Report에 들어가는 '주차' 데이터는 '2020/12/4'와 같은 문자열인데 일반적으로 생각하는 날짜가 아니라 2020년 12월 4째 주의 주간보고라는 의미입니다.  
   만약 프로젝트 1이 2021년 1월 3째주에 해당하는 주간보고를 작성한다면 주차에 들어가는 데이터는
   '2020/1/3' 이겠죠? 그럼 이제 프로젝트 1의 주간보고 작성을 위해 프로젝트 1을 클릭하면 2020/12/4에 작성한 데이터를 불러와야 합니다. 그게 가장 최신이니까요. 하지만 위에서 얘기한 쿼리문으로는 '2020/12/4'라는 주차 데이터를 불러올 수 없습니다. 쿼리문을 다시 한 번 보겠습니다.  
   `select * from weekly_Report where 주차 = (select max(주차) from weekly_Report where 주차 < ?) and 프로젝트no=?`   
   select max(주차) from weekly_Report where 주차 < '2021/1/3' 이런 식으로 주차를 계산하는 서브 쿼리에 값을 넣어 돌려보면 해당 쿼리는 weekly_Report에서 주차가 가장 최신인 값을 돌려주지 프로젝트1의 주간보고 중 가장 최신의 주차 데이터를 돌려주진 않습니다. 즉 서브쿼리에도 프로젝트 번호가 들어가야 한다는 것이죠.  
   `select * from weekly_Report where 주차 = (select max(주차) from weekly_Report where 주차 < ? and 프로젝트no=?) and 프로젝트no=?`  
   이렇게 해야 비로소 프로젝트 1의 주간보고들 중 주차가 가장 최신인 것을 계산하게 되고 주차가 가장 최신인 주간보고 데이터를 불러오게 되는 것입니다.  
   이 부분을 수정한 후에는 2020년 주간보고들을 조회할 때 고객사와 PM 칸에 null이 뜨는 프로젝트들이 몇 가지 있어 이 부분을 해결했습니다. 프로젝트들도 2020년에 하던 것이 2021년에도 진행되면 year가 각각 2020, 2021인 데이터를 갖는데 2020엔 있으나 2021은 없는 프로젝트들이 고객사와 PM에 null이 뜨는 것이어서 2020년의 주간보고들을 조회할 땐 select 박스에서 클릭한 년도를 조건으로 프로젝트들을 조회해 보여주는 방법으로 해결했습니다.  
   주간보고는 이것으로 마무리했습니다. 이제 주간보고를 사용하는 프로젝트는 PM과 투입명단의 사람들이 주간보고를 작성할 수 있습니다. 워후!  
2. PM이 되어 주간보고를 작성해야 하기에 이번주의 계획과 진행한 사항, 다음주 계획에 대해 정리하고 팀원들과 이야기를 나누는 시간을 가졌습니다. 내일은 실장님께서 말씀하신 수석 직급을 차장과 부장으로 나누는 작업을 하고 조직도의 내용을 엑셀로 export하는 방법을 연구해볼 예정입니다.  
3. 이번주도 곧 끝나갑니다. 힘을 내봅시다.