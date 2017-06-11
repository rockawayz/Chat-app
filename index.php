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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Xplora | Chat and Share</title>
  </head>

  <body>

    <div class="container-fluid">

      <div class="row">

        <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 contacts">

          <div class="contacts-pane">
            <span id="username"><?php echo $_SESSION['username'] ?></span>
            <a href="signout.php">Sign out</a>

          </div>
          <div>

            <h1>Contacts</h1>

             <ul id="contacts">

             </ul>

          </div>

        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 chats">

          <div class="chats-pane">

          </div>

        </div>

      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/chat.js"></script>

  </body>
</html>
