<?php
    $link = mysqli_connect("localhost", "root", "gees00409", "dbp");
    $query = "INSERT INTO bands (
      name, description, why_love, favorite_album_formed
    ) VALUES ('{$_POST['name']}', '{$_POST['description']}', '{$_POST['why_love']}', '{$_POST['favorite_album_formed']}')";

    $result = mysqli_query($link, $query);

    if($result == false){
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysqli_error($link));
    }
    else{
      echo '저장 완료! <a href="index.php"> 돌아가기 </a>';
    }
?>
