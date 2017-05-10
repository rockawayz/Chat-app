<?php

session_start();

include_once '/sign/conn.php';

$user_one = $_SESSION['username'];

$query = mysqli_query($conn,
  "SELECT user_id, chat_id, username
  FROM chat, users
  WHERE CASE
  WHEN user_one = '$user_one'
  THEN user_two = user_id
  WHEN user_two = '$user_one'
  THEN user_one = user_id
  END
  AND (
    user_one = '$user_one'
    OR user_two = '$user_one'
  )
  Order by chat_id DESC Limit 10") or die(mysql_error());

  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $chat_id = $row['chat_id'];
    $user_id = $row['user_id'];
    $username = $row['username'];
    $chat_query = mysqli("SELECT chat_reply_id, time, reply FROM chat_reply WHERE chat_id_fk = '$chat_id' ORDER BY chat_reply_id DESC LIMIT 1") or die(mysql_error());
    $chat_row_id = $chat_row['chat_reply_id'];
    $reply = $chat_row['reply'];
    $time = $chat_row['time'];
  }
 ?>
