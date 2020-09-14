<?php
  //날짜 계산을 위해 시간 Asia/Seoul로 설정
  date_default_timezone_set('Asia/Seoul');
  $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $query = 'SELECT * FROM bands';

  $result = mysqli_query($db_link, $query);
  $band_list = '';

  while($row = mysqli_fetch_array($result)){
    $band_list = $band_list."<li><a href=\"index.php?id={$row['id']}\"> {$row['name']} </a></li>";
  }

  $index = array(
    'name' => '제가 좋아하는 밴드의 이름을 알려드립니다.',
    'description' => '이곳에서는 밴드를 직접 소개합니다.',
    'why_love' => "여기선 제가 추천하는 곡들을 만나보실 수 있습니다.",
    'favorite_album_formed' => "가장 좋아하는 앨범의 발매일?",
  );

  $img = '/W02-P/static/just_rock.jpg';
  $how_long = '며칠 째 일까요?';


  if(isset($_GET['id'])) {
    $query = "SELECT * FROM bands WHERE id={$_GET['id']}";
    $result = mysqli_query($db_link, $query);
    $row = mysqli_fetch_array($result);
    //이미지 처리
    $img = '/W02-P/static/'.preg_replace("/\s+/", "", $row['name']).'.jpg';

    //앨범이 나온지 며칠 째인지를 의미하는 how_long을 구하기 위해 DateTime 객체 생성
    $start = new DateTime($row['favorite_album_formed']);
    $end = new DateTime();
    $how_long = date_diff($start, $end) -> days.'일 째';

    $index = array(
      'name' => $row['name'],
      'description' => $row['description'],
      'why_love' => $row['why_love'],
      'favorite_album_formed' => $row['favorite_album_formed']
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
  <p><a href="create.php"> 글 쓰러 가기 </a></p>
  <img src ="<?= $img ?>" width="500">
  <h3> 밴드명 : <?= $index['name'] ?> </h3>
  <p> 밴드 설명 : <?= $index['description'] ?></p>
  <p> 추천곡: <?= $index['why_love'] ?> </p>
  <p> 최애 앨범 발매일 : <?= $index['favorite_album_formed'] ?> </p>
  <p> 최애 앨범이 나온지 <?= $how_long ?> </p>
</body>
</html>
