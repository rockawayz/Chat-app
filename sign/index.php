<?php

  session_start();

  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header("Location: ../");
  }

 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Xplora | Get in</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="gradient"></div>
<div class="result"></div>

<div class="container">

  <div class="card"></div>
  <div class="card">
    <h1 class="title">Sign In</h1>

    <form method="post">
      <div class="input-container">
        <input type="text" id="username-si" required="required" name="username"/>
        <label for="text">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password-si" required="required" name="password"/>
        <label for="password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="button" id="go"><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>

  </div>

  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Sign Up
      <div class="close"></div>
    </h1>

    <form method="post">
      <div class="input-container">
        <input type="text" id="username-su" required="required" name="username"/>
        <label for="text">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password-su" required="required" name="password"/>
        <label for="password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="repassword-su" required="required" name="repassword"/>
        <label for="password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="button" id="start"><span>Start</span></button>
      </div>
    </form>

  </div>

</div>

  <script src="../js/jquery.js"></script>
  <script src="../js/index.js"></script>

</body>
</html>
