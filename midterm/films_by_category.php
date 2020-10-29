<?php
  $link = mysqli_connect('localhost', 'root', 'gees00409', 'sakila');
  $query = "SELECT title, description, release_year FROM category
   JOIN film_category ON category.category_id = film_category.category_id
   JOIN film ON film_category.film_id = film.film_id WHERE film_category.category_id = '{$_POST['category']}' LIMIT 100";

   $films = '';
   $result = mysqli_query($link, $query);
   while ($row = mysqli_fetch_array($result)) {
       $films .= '<tr>';
       $films .= '<td>'.$row['title'].'</td>';
       $films .= '<td>'.$row['description'].'</td>';
       $films .= '<td>'.$row['release_year'].'</td>';
       $films .= '</tr>';
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
  <table class="table" border=2>
    <tr>
        <th> 제목 </th>
        <th> 소개 </th>
        <th> 개봉 연도 </th>
    </tr>
    <?= $films ?>

  </table>
</body>
</html>
