<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    $filtered = array(
      'id' => mysqli_real_escape_string($db_link, $_POST['id']),
      'name' => mysqli_real_escape_string($db_link, $_POST['name']),
      'description' => mysqli_real_escape_string($db_link, $_POST['description']),
      'why_love' => mysqli_real_escape_string($db_link, $_POST['why_love']),
      'favorite_album_formed' => mysqli_real_escape_string($db_link, $_POST['favorite_album_formed'])
    );

    $query = "UPDATE bands SET
     name = '{$filtered['name']}',
     description = '{$filtered['description']}',
     why_love = '{$filtered['why_love']}',
     favorite_album_formed = '{$filtered['favorite_album_formed']}' WHERE id='{$filtered['id']}'";

    $result = mysqli_multi_query($db_link, $query);

    if ($result == false) {
        echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        echo '수정 완료! <a href="index.php"> 돌아가기 </a>';
    }
