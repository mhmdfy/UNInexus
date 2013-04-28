<?php

require_once 'includes/constants.php';

class DBManager {

  private $mysqli;

  function __construct() {
    $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
      die('There was a problem connection to the database.');
  }

  function verify_user($user, $pwd) {

    $query = "SELECT *
              FROM users
              WHERE username = ? AND password = ?
              LIMIT 1";

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param('ss', $user, $pwd);
      $stmt->execute();
      $stmt->bind_result($id, $name, $pass, $isAdmin); 

      if($stmt->fetch()) {
        $stmt->close();

        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_rank'] = $isAdmin;
        return true;
      }
    }
  }

  function add_category($name, $desc) {

    $query = "INSERT INTO categories(name, description)
              VALUES (?, ?)";

    $name = $this->mysqli->real_escape_string($name);
    $desc = $this->mysqli->real_escape_string($desc);

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param('ss', 
                        $name, 
                        $desc);
      if($stmt->execute()) {
        $id = $this->mysqli->insert_id;
        $stmt->close();

        $_SESSION['cat_id'] = $id;
        return true;
      }
    }
  }

  function post_question($topic, $content, $category) {

    $query = "INSERT INTO questions(topic, content, user, category)
              VALUES (?, ?, ?, ?)";

    $one = 1;
    $topic = $this->mysqli->real_escape_string($topic);
    $content = $this->mysqli->real_escape_string($content);

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param('ssii', 
                        $topic, 
                        $content, 
                        $_SESSION['user_id'], 
                        $category);
      if($stmt->execute()){
        $id = $this->mysqli->insert_id;
        $stmt->close();

        $_SESSION['post_id'] = $id;
        return true;
      }
    }
  }

  function category_dropdown() {

    $query = "SELECT id, name, description FROM categories";

    if($result = $this->mysqli->query($query)) {

      while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
      }

      $result->free();
    }
  }

  function view_categories() {

    $query = "SELECT id, name, description FROM categories";

    if($result = $this->mysqli->query($query)) {

      while($row = $result->fetch_assoc()) {
        echo '<tr>';  
        echo '<td class="leftpart">';  
        echo '<h4><a href="viewCategories.php?id='. $row['id'] . '">' . $row['name'] . '</a></h4>';
        echo '<p>'. $row['description'] . '<p>';  
        echo '</td>';  
        //echo '<td class="rightpart">';
        //echo '<a href="topic.php?id=">Topic subject</a> at 10-10';  
        //echo '</td>';
        echo '</tr>';
      }
    }

    $result->free();
  }

  function view_category($id) {

    $query = "SELECT name FROM categories WHERE id = ?";

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param("i", $id);

      $stmt->bind_result($name);
      if($stmt->execute()) {

        if($stmt->fetch()) {
          echo '<h3>Questions under "' . $name . '" category</h3>';
          echo '<table border="1">';
          echo '<tr> <th>Topic</th></tr>';
          $ob = new DBManager();
          $ob->questions_in_category($id);
          echo '</table>';
        }
        $stmt->close();
      }
    }
  }

  function questions_in_category($cat_id) {

    $query = "SELECT id, topic FROM questions WHERE category = ?";

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param("i", $cat_id);

      $stmt->bind_result($id, $name);
      if($stmt->execute()) {

        while($stmt->fetch()) {
          echo '<tr>';
          echo '<td class="leftpart">';
          echo '<h4><a href=viewQuestion.php?id=' . $id . '>' . stripslashes($name) . '</p>';
          echo '</td>';
          echo '</tr>';
        }
        $stmt->close();
      }
    }
  }

  function view_question($id) {

    $query = "SELECT topic, content, user, category FROM questions WHERE id = ?";

    if($stmt = $this->mysqli->prepare($query)) {
      $stmt->bind_param("i", $id);

      $stmt->bind_result($topic, $content, $user_id, $cat_id);
      if($stmt->execute()) {

        if($stmt->fetch()) {
          echo '<h4><a href="viewCategories.php?id=' . $cat_id . '">back to category</a></h4>';
          echo '<h3 class="cetner">' . stripslashes($topic) . '<h3>';
          echo '<table>';
          echo '<tr><th>User</th><th>Post</th></tr>';
          echo '<tr><td>' . stripslashes($user_id) . '</td>';
          echo '<td>' . stripslashes($content) . '</td></tr>';
          echo '</table>';
        }
        $stmt->close();
      }
    }
  }
}
