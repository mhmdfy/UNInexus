<?php

require_once 'DBManager.php';

class Credentials {

  function validate_user($user, $pwd) {
    $mysql = New DBManager();

    if($mysql->verify_user($user, md5($pwd))) {
      $_SESSION['status'] = 'authorized';
      header("location: index.php");
    }
    else
      return "Please enter a correct username and password";
  }

  function log_user_out() {
    if(isset($_SESSION['status'])) {
      unset($_SESSION['status']);

      if(isset($_COOKIE[session_name()])) 
        setcookie(session_name(), '', time() - 1000);
      session_destroy();
    }
  }

  function confirm_Member() {
    session_start();
    if(!isset($_SESSION['status']) || $_SESSION['status'] !='authorized') {
      //header ("location: login.php");
      echo '<script src="js/Header.js"></script>';
      echo '<script> redirect("login.php") </script>';
    }
  }
}
