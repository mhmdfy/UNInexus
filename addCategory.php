<?php

require_once 'classes/Credentials.php';
require_once 'classes/Forum.php';

$credentials = new Credentials();
$forum = new Forum();
$credentials->confirm_member();

if($_POST && !empty($_POST['name']) && !empty($_POST['desc'])) {
  $msg = $forum->add_category($_POST['name'], $_POST['desc']);
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

    <title> UNInexus Post Question </title>

  </head>

  <body>

    <div id="wrapper">

      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>

      <div id="content">
      
        <h3>Add a category</h3>
        <?php 
        if($_SESSION['user_rank'] == 1)
        echo '
        <p> Add a category so people can find questions easily under them. People can only post questions under defined categories.</p>
      
        <div id="post">
        
          <form method="post" action="" class="question">

            Name: <br/>

            <input type="text" name="name"/><br/>

            Description: <br/>

            <input type="text" name="desc" class="long"/><br/>

            <input type="submit" class="button" value="Post" name="submit" />

          </form>

        </div> <!-- End #post -->';

        else
          echo '<p> Only admin can create categories </p>';
        ?>

        <?php if(isset($msg)) echo '<h4 class ="alert">' . $msg . '</h4>'; ?>

      </div> <!-- End #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

    </div> <!-- End #wrapper -->

  </body>

</html>
