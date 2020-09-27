<?php
  //날짜 계산을 위해 시간 Asia/Seoul로 설정
  date_default_timezone_set('Asia/Seoul');
  $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = 'SELECT * FROM bands';

  $result = mysqli_query($db_link, $query);
  $band_list = '';

  while ($row = mysqli_fetch_array($result)) {
      $band_list = $band_list."<li><a href=\"index.php?id={$row['id']}\"> {$row['name']} </a></li>";
  }

  $index = array(
    'band_name' => '제가 좋아하는 밴드의 이름을 알려드립니다.',
    'description' => '밴드를 소개합니다.',
    'why_love' => "추천하는 곡을 소개합니다.",
    'favorite_album_formed' => "가장 좋아하는 앨범의 발매일?",
  );

  $img = '/W04-P/static/just_rock.jpg';
  $how_long = '며칠 째 일까요?';
  $update_link = '';
  $delete_link = '';
  $frontman = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($db_link, $_GET['id']);
      $query = "SELECT * FROM bands left join frontman on bands.frontman_id = frontman.id WHERE bands.id={$filtered_id}";
      $result = mysqli_query($db_link, $query);
      $row = mysqli_fetch_array($result);
      //이미지 처리
      $img = '/W04-P/static/'.preg_replace("/\s+/", "", $row[1]).'.jpg';

      //앨범이 나온지 며칠 째인지를 의미하는 how_long을 구하기 위해 DateTime 객체 생성
      $start = new DateTime($row['favorite_album_formed']);
      $end = new DateTime();
      $how_long = date_diff($start, $end) -> days.'일 째';

      $index['band_name'] = htmlspecialchars($row[1]);
      $index['description'] = htmlspecialchars($row['description']);
      $index['why_love'] = htmlspecialchars($row['why_love']);
      $index['favorite_album_formed'] = htmlspecialchars(date_format(new DateTime($row['favorite_album_formed']), 'Y년 m월 d일'));
      $index['name'] = htmlspecialchars($row['name']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'"> UPDATE! </a>';
      $delete_link = '
      <form action="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="DELETE!">
      </form>';

      $frontman = "<p> 프론트맨: {$index['name']}</p>";
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
  <a href="frontman.php"> register your lovely frontman. </a>
  <ul>
    <?= $band_list ?>
  </ul>
  <p><a href="create.php"> 글 쓰러 가기 </a></p>
  <p> <?= $update_link ?> </p>
  <p> <?= $delete_link ?> </p>

  <img src ="<?= $img ?>" width="500">
  <h3> 밴드명 : <?= $index['band_name'] ?> </h3>
  <p> 밴드 설명 : <?= $index['description'] ?></p>
  <p> 추천곡: <?= $index['why_love'] ?> </p>
  <?= $frontman ?>
  <p> 최애 앨범 발매일 : <?= $index['favorite_album_formed'] ?> </p>
  <p> 최애 앨범이 나온지 <?= $how_long ?> </p>
</body>
</html>
