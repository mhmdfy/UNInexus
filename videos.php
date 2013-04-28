<?php

require 'classes/Credentials.php';
$credentials = new Credentials();

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

    <title>UNInexus Home</title>

  </head>

  <body>

    <div id="wrapper">

      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>

      <div id="content">

        <iframe width="560" height="315" 
          src="http://www.youtube.com/embed/qDUMyyOBriA" frameborder="0" allowfullscreen>
        </iframe>

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

    </div> <!-- End #wrapper -->

  </body>

</html>
