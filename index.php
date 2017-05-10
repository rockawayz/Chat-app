<?php
 
  session_start();

  if (!isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('Location: sign');
  }

  include_once 'sign/conn.php';
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/master.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen" charset="utf-8">
    <title>Xplora | Chat and Share</title>
  </head>

  <body>

    <div class="container-fluid">

      <div class="row">

        <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 contacts">

          <div class="contacts-pane">
            <p>
              <?php echo $_SESSION['username']; ?>
            </p>
            <a href="signout.php">Sign out</a>

          </div>
          <div>

            <h1>Contacts</h1>

            <?php

            $query = mysqli_query($conn, "SELECT username FROM users");

            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                echo $row['username'] . "<hr>";
              }
            } else {
              echo "No contact";
            }

             ?>
          </div>

        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 chats">

          <div class="chats-pane">

          </div>

        </div>

      </div>

    </div>

  </body>
</html>
