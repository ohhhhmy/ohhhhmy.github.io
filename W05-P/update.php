<?php
  $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = 'SELECT * FROM bands';

  $result = mysqli_query($db_link, $query);
  $band_list = '';

  while ($row = mysqli_fetch_array($result)) {
      $band_list = $band_list."<li><a href=\"index.php?id={$row['id']}\"> {$row['name']} </a></li>";
  }


  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($db_link, $_GET['id']);
      $query = "SELECT * FROM bands WHERE id={$filtered_id}";
      $result = mysqli_query($db_link, $query);
      $row = mysqli_fetch_array($result);
      $index = array(
      'name' => $row['name'],
      'description' => $row['description'],
      'why_love' => $row['why_love'],
      'favorite_album_formed' => $row['favorite_album_formed'],
    );
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> BANDS that I LOVE </title>
</head>
<body>
  <h1><a href="index.php"> ROCK WILL NEVER DIE </a></h1>
  <ul>
    <?= $band_list ?>
  </ul>
  <form action="process_update.php" method="POST">
    <input type="hidden" name="id" value="<?= $filtered_id ?>">
    <p> 밴드 이름 : <input type="text" name="name"value="<?= $index['name'] ?>"></p>
    <p> 밴드 소개 : <textarea name="description"><?= $index['description'] ?></textarea></p>
    <p> 좋아하는 곡 : <textarea name="why_love"><?= $index['why_love'] ?></textarea></p>
    <p> 좋아하는 앨범 발매일 : <input type="text" name="favorite_album_formed" value="<?= $index['favorite_album_formed'] ?>"></p>
    <p><input type="submit" value="SUBMIT"></p>
  </form>
  </form>
</body>
</html>
