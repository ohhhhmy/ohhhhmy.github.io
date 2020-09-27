<?php
    $db_link = mysqli_connect("localhost", "root", "rootroot", "dbp");
    //id값 형 변환
    settype($_POST['id'], 'int');

    $filtered = array(
      'id' => mysqli_real_escape_string($db_link, $_POST['id'])
    );

    $query = "DELETE FROM bands WHERE id = '{$filtered['id']}'";

    $result = mysqli_multi_query($db_link, $query);
    if ($result == false) {
        echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($db_link));
    } else {
        echo '삭제 완료! <a href="index.php"> 돌아가기 </a>';
    }
