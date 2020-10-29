<?php
 $link = mysqli_connect('localhost', 'root', 'gees00409', 'sakila');
 $filtered_name = mysqli_real_escape_string($link, $_POST['actor_name']);
 $query = "SELECT first_name, last_name, title, release_year, rating FROM actor
 JOIN film_actor ON actor.actor_id = film_actor.actor_id
 JOIN film ON film_actor.film_id = film.film_id WHERE actor.first_name like '%{$filtered_name}%'";

  $result = mysqli_query($link, $query);
  $philmos = '';
  if ($result -> num_rows > 0) {
      while ($row = mysqli_fetch_array($result)) {
          $philmos .= '<tr>';
          $philmos .= '<td>'.$row['first_name'].'</td>';
          $philmos .= '<td>'.$row['last_name'].'</td>';
          $philmos .= '<td>'.$row['title'].'</td>';
          $philmos .= '<td>'.$row['rating'].'</td>';
          $philmos .= '<td>'.$row['release_year'].'</td>';
          $philmos .= '</tr>';
      }
  } else {
      $philmos .= '<td colspan="6"> 검색 결과가 없습니다! </td>';
  }
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title> 영화 정보 조회 시스템 </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="nav">
    NavBar | <a href="main.php"> HOME </a>
  </div>
  <div id="philmo">
    검색하신 배우 <?= $filtered_name ?>의 필모그래피입니다.
  </div>
  <table class="table" border=2>
    <tr>
        <th> 이름 </th>
        <th> 성 </th>
        <th> 제목 </th>
        <th> 등급 </th>
        <th> 개봉 연도 </th>
    </tr>
    <?= $philmos ?>

  </table>
</body>
</html>
