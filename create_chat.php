<?php

session_start();

include_once '/sign/conn.php';

echo $_SESSION['username'] . " " . $_SESSION['user_id'];

$user_one = mysqli_real_escape_string($conn, $_SESSION['user_id']);
$user_two = mysqli_real_escape_string($conn, 7);

if ($user_one != $user_two) {
  $q = mysqli_query($conn, "SELECT chat_id FROM chat WHERE
  (user_one='$user_one' and user_two='$user_two') or (user_one='$user_two' and user_two='$user_one') ") or die(mysql_error());
  $time = time();

  if (mysqli_num_rows($q) == 0) {
    $query = mysqli_query($conn, "INSERT INTO chat (user_one,user_two,time) VALUES ('$user_one','$user_two','$time')") or die(mysql_error());

    $q = mysqli_query($conn, "SELECT chat_id FROM chat WHERE user_one = '$user_one' ORDER BY chat_id DESC limit 1");

    $v = mysqli_fetch_array($q);
    echo $v['chat_id'];

  } else {
    echo "Chat exist";
  }
} else {
  echo "Don't talk to yourself";
}




 ?>
