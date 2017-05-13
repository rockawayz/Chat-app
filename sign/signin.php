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

        if (strlen($username) < 20  && $username != NULL ) {

          if (strlen($password) >= 8) {
            // remove escape string
            $username = mysqli_real_escape_string($conn, $username);
            $password = mysqli_real_escape_string($conn, $password);

            $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' LIMIT 1");
            $row = mysqli_fetch_array($query);
            $conn_password = $row['password'];

            if(md5($password) == $conn_password) {

              $_SESSION['username'] = $_POST['username'];
              $_SESSION['user_id'] = $row['user_id'];
              $result = "success";
              echo $result;
              
            } else {
                $result = "Invalid username or password. ";
                echo $result;

            }
          } else {
            $result = "Password must be longer than 8 characters";
            echo $result;
          }


        } else {
          $result = "Enter valid username which is less than 20 characters";
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
