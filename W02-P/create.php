<?php
  $db_link = mysqli_connect("localhost", "root", "gees00409", "dbp");
  $query = 'SELECT * FROM bands';
  $result = mysqli_query($db_link, $query);

  $band_list = '';

  while($row = mysqli_fetch_array($result)){
    $band_list = $band_list."<li><a href=\"index.php?band_id={$row['id']}\"> {$row['name']} </a></li>";
  }

  $index = array(
    'name' => 'Welcome',
    'description' => '제가 좋아하는 밴드들을 소개합니다.',
    'why_love' => "여기선 제가 추천하는 곡들을 만나보실 수 있습니다.",
    'favorite_album_formed' => "가장 좋아하는 앨범이 발매된지 얼마나 지났을까요?"
  );
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
    <p><textarea name="description" placeholder="밴드를 소개해주세요."></textarea></p>
    <p><textarea name="why_love" placeholder="추천곡이 있다면?"></textarea></p>
    <p><input type="text" name="favorite_album_formed" placeholder="최애 앨범 발매일로부터 며칠?"></p>
    <p><input type="submit" value="SUBMIT"></p>
  </form>
</body>
</html>
