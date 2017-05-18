<?php

  include_once 'conn.php';
  session_start();

  //function to check if its an ajax request
  function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

  if (is_ajax()) {
    if (empty($_SESSION['username']) && empty($_SESSION['password'])) {

      if (isset($_POST['username']) && isset($_POST['password'])) {

        if (!empty($_POST['username']) || !empty($_POST['password'])) {
          // username and password sent from form
          $username = strip_tags($_POST['username']);
          $password = strip_tags($_POST['password']);

          $username = stripslashes($username);
          $password = stripslashes($password);

          if (strlen($username) < 20 && $username != NULL ) {

            if (strlen($password) >= 8) {
              // remove escape string
              $username = mysqli_real_escape_string($conn, $username);
              $password = mysqli_real_escape_string($conn, $password);

              //check if username is already taken
              $sql = "SELECT username FROM users WHERE username = '$username'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_num_rows($query);

              if ($result > 0) {
                $result = "Username is already taken";
                echo $result;

              } else {

                // inputing into db
                mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '".md5($password)."' ) ") or die (mysqli_error($conn)) ;
                //
                // //checking user_id for newly created user
                // $q_id = mysqli_query($conn, "SELECT user_id FROM `users` WHERE username = $username");
                // $row_id = mysqli_fetch_array($q_id);

                $_SESSION['username'] = $_POST['username'];
                // $_SESSION['user_id'] = $row_id['user_id'];

                $result = "success";
                echo $result;
              }

            } else {
              $result = "Password must be longer than 8 characters";
              echo $result;
            }


          } else {
            $result = "Input valid username which is less than 20 characters";
            echo $result;
          }

        } else {
          $result = "Fill all fields.";
          echo $result;
        }

      }
    } else {
      header("Location: index.php");
    }

  } else {
    header("Location: index.php");
  }


 ?>
