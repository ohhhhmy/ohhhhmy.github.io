<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    settype($_POST['id'], 'int');

    $filtered = array(
      'id' => mysqli_real_escape_string($db_link, $_POST['id'])
    );

    $query = "DELETE FROM frontman WHERE id = '{$filtered['id']}'";

    $result = mysqli_multi_query($db_link, $query);
    if ($result == false) {
        echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        header('Location: frontman.php');
    }
