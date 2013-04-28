<div id="sidebar">

  <h3>Navigation</h3>
  <li><a href="index.php">Home</a></li>
  <li><a href="about.php">About Us</a></li>
  <li><a href="#">Links</a></li>
  <li><a href="#">Contact</a></li>

  <?php
  if($_SESSION['user_rank'] == 1){
    echo '<h3>Admin</h3>';
    echo '<li><a href="addCategory.php">Add Category</a></li>';
    echo '<li><a href="#">Add Video</a></li>';
  } 
  ?>

  <h3>Questions</h3>
  <li><a href="postQuestion.php">Post a Question</a></li>
  <li><a href="viewCategories.php">View Questions</a></li>

  <h3>Videos</h3>
  <li><a href="videos.php">View Videos</a></li>

</div> <!-- end #sidebar -->
