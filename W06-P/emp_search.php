<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    $filtered_name = mysqli_real_escape_string($link, $_POST['search']);

    $query = "SELECT * FROM employees WHERE first_name like '%{$filtered_name}%'";
    $result = mysqli_query($link, $query);
    
    $emp_search = '';
    if($result -> num_rows > 0){
        while($row = mysqli_fetch_array($result)){
            $emp_search .= '<tr>';
            $emp_search .= '<td>'.$row['emp_no'].'</td>';
            $emp_search .= '<td>'.$row['birth_date'].'</td>';
            $emp_search .= '<td>'.$row['first_name'].'</td>';
            $emp_search .= '<td>'.$row['last_name'].'</td>';
            $emp_search .= '<td>'.$row['gender'].'</td>';
            $emp_search .= '<td>'.$row['hire_date'].'</td>';
            $emp_search .= '</tr>';
        }
    }
    else{
        $emp_search .= '<td colspan="6">검색 결과가 없습니다!</td>';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php"> 직원 관리 시스템 </a> | 검색 결과 </h2>
    <table border="1">
        <tr>
            <th> emp_no </th>
            <th> birth_date </th>
            <th> first_name </th>
            <th> last_name </th>
            <th> gender </th>
            <th> hire_date </th>
        </tr>
        <tr>
            <?= $emp_search ?>
        </tr>
    </table>
</body>

</html>