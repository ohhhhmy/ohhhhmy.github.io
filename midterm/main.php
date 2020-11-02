<?php
  $link = mysqli_connect('localhost', 'root', 'gees00409', 'sakila');
  $query = 'select category_id, name from category';

  $result = mysqli_query($link, $query);
  $categories = '';
  while ($row = mysqli_fetch_array($result)) {
      $categories .= '<option value='.$row['category_id'].'>'.$row['name'].'</option>';
  }
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title> Film World </title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="nav">
      NavBar | <a href="main.php"> HOME </a>
    </div>
    <div>
      <div class="align-center">
        <h1 class="first_white" style="display:inline-block;"> Film World에서 </h1>

        <h1 calss="second_red" style="color : red; display:inline-block;"> 다양한 정보 </h1>

        <h1 class="first_white" style="display:inline-block;"> 를 찾아보세요. </h1>
      </div>
    </div>

    <form action="search_actor.php" method="POST">
      <div class="form">
      영화 배우 이름으로 필모그래피 검색:
        <input type="text" name="actor_name">
        <input type="submit" value="Search">
      </div>
    </form>

    <form action="films_by_category.php" method="POST">
      <div class="form">
        영화 살펴보기
        <select name="category">
        <?= $categories ?>
        </select>
        <input type="submit" value="GO!">
      </div>
    </form>

    <form action="highest_gross.php" method="POST">
      <div class="form">
        1975년부터 2018년까지 가장 많은 수익을 얻은 영화는?
        <input type="text" name="year" placeholder="1975 ~ 2018">
        <input type="submit" value="Search!">
    </div>
    </form>
    <div>
      Design by <a href="https://github.com/ohhhhmy"> MYOH </a>
    </div>
</body>
</html>
