<?php
  $db_link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

  $query = 'SELECT * FROM frontman';
  $result = mysqli_query($db_link, $query);
  $frontman_info = '';


  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'birth' => htmlspecialchars(date_format(new DateTime($row['birth']), 'Y년 m월 d일'))
    );
      $frontman_info .= '<tr>';
      $frontman_info .= '<td>'.$filtered['id'].'</td>';
      $frontman_info .= '<td>'.$filtered['name'].'</td>';
      $frontman_info .= '<td>'.$filtered['birth'].'</td>';
      $frontman_info .= '<td><a href="frontman.php?id='.$filtered['id'].'">UPDATE</a></td>';
      $frontman_info .= '
      <td>
        <form action="process_delete_frontman.php" method="POST">
        <input type="hidden" name="id" value="'.$filtered['id'].'">
        <input type="submit" value="DELETE">
        </form>
      </td>';
      $frontman_info .= '</tr>';
  }

  $escaped = array(
    'name' => '',
    'birth' => ''
  );

  $form_action = 'process_create_frontman.php';
  $label_submit = 'Create Frontman';
  $form_id = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($db_link, $_GET['id']);
      settype($filtered_id, 'integer');

      $query = "SELECT * FROM frontman WHERE id={$filtered_id}";
      $result = mysqli_query($db_link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['birth'] = htmlspecialchars($row['birth']);

      $form_action = 'process_update_frontman.php';
      $label_submit = 'Update Frontman';
      $form_id = '<input type="hidden" name="id" value = "'.$_GET['id'].'">';
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
    <p><a href="index.php"> HOME </a></p>

    <table border="1">
      <tr>
        <th> ID </th>
        <th> NAME </th>
        <th> ♥ BIRTH ♥ </th>
        <th> UPDATE </th>
        <th> DELETE </th>
      </tr>
      <?= $frontman_info ?>
    </table>
    <br>
    <form action="<?= $form_action ?>" method="POST">
      <?= $form_id ?>
      <label for="fname"> NAME : </label>
      <br>
      <input type="text" id="name" name="name" placeholder="프론트맨 이름" value="<?= $escaped['name'] ?>">
      <br>
      <label for=""> BIRTH : </label>
      <br>
      <input type="text" id="birth" name="birth" placeholder="생일" value="<?= $escaped['birth'] ?>">
      <br>
      <br>
      <input type="submit" value="<?= $label_submit ?>">
    </form>
</body>
</html>
