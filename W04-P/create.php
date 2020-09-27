<?php
  $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = 'SELECT * FROM bands';
  $result = mysqli_query($db_link, $query);

  $band_list = '';

  while ($row = mysqli_fetch_array($result)) {
      $band_list = $band_list."<li><a href=\"index.php?id={$row['id']}\"> {$row['name']} </a></li>";
  }

  $query = 'SELECT * FROM frontman';
  $result = mysqli_query($db_link, $query);
  $select_form = '<select name="frontman_id">';
  while ($row = mysqli_fetch_array($result)) {
      $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> BANDS that I LOVE </title>
</head>
<body>
  <h1><a href="index.php"> ROCK WILL NEVER DIE </a></h1>
  <ol>
    <?= $band_list ?>
  </ol>
  <form action="process_create.php" method="POST">
    <p><input type="text" name="name" placeholder="밴드 이름은?"></p>
    <p><textarea name="description" placeholder="밴드 소개."></textarea></p>
    <p><textarea name="why_love" placeholder="추천곡?"></textarea></p>
    <p><input type="text" name="favorite_album_formed" placeholder="최애 앨범 발매일?"></p>
    <?= $select_form ?>
    <p><input type="submit" value="SUBMIT"></p>
  </form>
</body>
</html>
