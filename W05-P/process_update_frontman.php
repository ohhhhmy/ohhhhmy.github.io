<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    $filtered = array(
      'id' => mysqli_real_escape_string($db_link, $_POST['id']),
      'name' => mysqli_real_escape_string($db_link, $_POST['name']),
      'birth' => mysqli_real_escape_string($db_link, $_POST['birth'])
    );

    $query = "UPDATE frontman SET
     name = '{$filtered['name']}',
     birth = '{$filtered['birth']}' WHERE id='{$filtered['id']}'
     ";

    $result = mysqli_query($db_link, $query);

    if ($result == false) {
        echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        header('Location: frontman.php');
    }
