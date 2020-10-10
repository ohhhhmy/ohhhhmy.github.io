<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    if(isset($_GET['emp_no'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['emp_no']);
    }
    else{
        $filtered_id = mysqli_real_escape_string($link, $_POST['emp_no']);
    }

    $query = "SELECT * FROM employees WHERE emp_no='{$filtered_id}'";

    $result = mysqli_query($link, $query);
    if($result -> num_rows > 0){
        $row = mysqli_fetch_array($result);
        $form = '<form action="emp_delete_process.php" method="POST">
        <label> emp_no: </label>
        <input type="text" name="emp_no" value="'.$row['emp_no'].'" readonly>
        <br>
        <label> birth_date:(YYYY-MM-DD) </label>
        <input type="text" name="birth_date" value="'.$row['birth_date'].'" readonly>
        <br>
        <label> first_name: </label>
        <input type="text" name="first_name" value="'.$row['first_name'].'" readonly>
        <br>
        <label> last_name: </label>
        <input type="text" name="last_name" value="'.$row['last_name'].'" readonly>
        <br>
        <label> gender:(M or F) </label>
        <input type="text" name="gender" value="'.$row['gender'].'" readonly>
        <br>
        <label> hire_date:(YYYY-MM-DD) </label>
        <input type="text" name="hire_date" value="'.$row['hire_date'].'" readonly>
        <br>
        <input type="submit" value="Delete">
        </form>';
    } else{
        $form = '직원 정보가 없습니다.';
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
    <h2><a href="index.php"> 직원 관리 시스템 </a> | 직원 정보 삭제 </h2>
    <?= $form ?>
</body>
</html>