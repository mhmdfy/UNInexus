<?php
session_start();
require_once 'classes/Credentials.php';
$credentials = new Credentials();

if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
  $credentials->log_user_out();
}

if($_POST && !empty($_POST['user']) && !empty($_POST['pwd'])) {
  $msg = $credentials->validate_user($_POST['user'], $_POST['pwd']);
}

?>

<!DOCTYPE html> 

<html>

  <head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
 
    <title> UNInexus Login </title>

  </head>

  <body>

    <div id="login">

      <img src="img/Original_512.png" alt="UNInexus"/>

      <form method="post" action="" class="center">

        Username: <br/>

        <input type="text" name="user"/><br/>

        Password: <br/>

        <input type="password" name="pwd"/><br/>

        <input type="submit" class="button" value="Login" name="submit"/>

      </form>

      <?php if(isset($msg)) echo '<h4 class ="alert">' . $msg . '</h4>'; ?>

    </div>

  </body>

</html>
