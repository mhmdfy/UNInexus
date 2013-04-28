<?php

require_once 'classes/Credentials.php';
require_once 'classes/Forum.php';

$credentials = new Credentials();
$forum = new Forum();
$credentials->confirm_member();

if($_POST && !empty($_POST['topic']) && !empty($_POST['content'])) {
  $msg = $forum->post_question($_POST['topic'], $_POST['content']);
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
      
        <h3>Post a question</h3>

        <p> If you have a question regarding anything that relates to the education in the United States you can post it here. Other students can answer your question throught their experience, and Admins might give you useful information about it or direct you to someone who can.</p>
      
        <div id="post">
        
          <form method="post" action="" class="question">

            Topic: <br/>

            <input type="text" name="topic"/><br/>

            Text: <br/>

            <textarea name="content"></textarea><br/>

            <input type="submit" class="button" value="Post" name="submit" />

          </form>

        </div> <!-- End #post -->

        <?php if(isset($msg)) echo '<h4 class ="alert">' . $msg . '</h4>'; ?>

      </div> <!-- End #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

    </div> <!-- End #wrapper -->

  </body>

</html>
