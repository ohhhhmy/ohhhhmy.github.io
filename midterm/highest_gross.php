<?php
 $link = mysqli_connect('localhost', 'root', 'gees00409', 'sakila');
 $filtered_year = mysqli_real_escape_string($link, $_POST['year']);

 $query = "SELECT * FROM blockbusterss WHERE year='{$filtered_year}'";

  $result = mysqli_query($link, $query);
  $highest = '';
  if ($result -> num_rows > 0) {
      while ($row = mysqli_fetch_array($result)) {
          $highest .= '<tr>';
          $highest .= '<td>'.$row['title'].'</td>';
          $highest .= '<td>'.$row['Main_Genre'].'</td>';
          $highest .= '<td>'.$row['studio'].'</td>';
          $highest .= '<td>'.$row['rank_in_year'].'</td>';
          $highest .= '<td>'.$row['worldwide_gross'].'</td>';
          $highest .= '</tr>';
      }
  } else {
      $highest .= '<td colspan="6"> 검색 결과가 없습니다! </td>';
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
  <div id="h_gross">
    <?= $filtered_year ?> 년에 가장 많은 수익을 낸 영화는??
  </div>
  <table class="table" border=1>
    <tr>
        <th> 제목 </th>
        <th> 장르 </th>
        <th> 제작사 </th>
        <th> 당해 순위 </th>
        <th> $수익$ </th>
    </tr>
    <?= $highest ?>

  </table>
</body>
</html>
