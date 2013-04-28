<?php

require 'classes/Credentials.php';
require_once 'classes/Forum.php';
$credentials = new Credentials();
$forum = new Forum();

$credentials->confirm_member();

?>

<!DOCTYPE html>

<html> 

  <head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <title>UNInexus Questions</title>

  </head>

  <body>

    <div id="wrapper">

      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>

      <div id="content">

        <?php 
        if(isset($_GET['id']))
          $forum->view_question($_GET['id']);
        else {
          echo '<script src="js/Header.js"></script>';
          echo '<script> redirect("viewCategories.php") </script>';
        }
        ?>

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

    </div> <!-- End #wrapper -->

  </body>

</html>
