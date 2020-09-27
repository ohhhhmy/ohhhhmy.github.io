<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    $filtered = array(
      'name' => mysqli_real_escape_string($db_link, $_POST['name']),
      'birth' => mysqli_real_escape_string($db_link, $_POST['birth'])
    );

    $query = "INSERT INTO frontman (
      name, birth
    ) VALUES ('{$filtered['name']}', '{$filtered['birth']}')";

    $result = mysqli_query($db_link, $query);

    if ($result == false) {
        echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        header('Location: frontman.php');
    }
