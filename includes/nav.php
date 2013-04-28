<div id="nav">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="#">Contact</a>
  <a href="login.php?status=loggedout">Log Out</a>
  <?php echo '<p> Welcome back ' . $_SESSION['user_name'] . '!</p>'; ?>
</div> <!-- end #nav -->
