<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    $filtered = array(
      'name' => mysqli_real_escape_string($db_link, $_POST['name']),
      'description' => mysqli_real_escape_string($db_link, $_POST['description']),
      'why_love' => mysqli_real_escape_string($db_link, $_POST['why_love']),
      'favorite_album_formed' => mysqli_real_escape_string($db_link, $_POST['favorite_album_formed'])
    );

    $query = "INSERT INTO bands (
      name, description, why_love, favorite_album_formed
    ) VALUES ('{$filtered['name']}', '{$filtered['description']}', '{$filtered['why_love']}', '{$filtered['favorite_album_formed']}')";

    $result = mysqli_multi_query($db_link, $query);

    if ($result == false) {
        echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        echo '저장 완료! <a href="index.php"> 돌아가기 </a>';
    }
