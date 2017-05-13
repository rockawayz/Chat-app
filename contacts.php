<?php

include_once 'sign/conn.php';

$query = mysqli_query($conn, "SELECT username FROM users");

$i = 0;

if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
    $result[$i] = $row['username'];
    $i++;
  }
} else {
  $result = "No contact";
}
echo json_encode($result);

header('Content-Type: application/json');

 ?>
