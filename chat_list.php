<?php
// not functional
session_start();

include_once '/sign/conn.php';

$user_one = $_SESSION['username'];

$query = mysqli_query($conn,
  "SELECT user_id, chat_id, username FROM chat, users Order by chat_id") or die(mysql_error());

  if (mysqli_num_rows($query) > 0) {

    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      $chat_id = $row['chat_id'];
      $user_id = $row['user_id'];
      $username = $row['username'];

      echo "chat_id: " . $chat_id . " user_id: " . $user_id . " username: " . $username . "<br>";

    }
  } else {
    echo "No chat";
  }
?>
