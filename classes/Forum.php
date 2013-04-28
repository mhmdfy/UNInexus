<?php

require_once 'DBManager.php';

class Forum {

  function post_question($topic, $content, $category) {
    $mysql = new DBManager();

    if($mysql->post_question($topic, $content, $category)) {
      //header("location: index.php?id=" . $_SESSION['post_id']);
      echo '<script src="js/Header.js"></script>';
      echo '<script> redirect("ViewQuestion.php?id=' . $_SESSION['post_id'] . '"") </script>';
    }
    else
      return 'Error posting question, possible duplication on topic';
  }

  function add_category($name, $desc) {
    $mysql = new DBManager();

    if($mysql->add_category($name, $desc)) {
      echo '<script src ="js/Header.js"></script>';
      echo '<script> redirect("index.php?id=' . $_SESSION['cat_id'] . '") </script>';
    }
    else
      return 'Error adding category';
  }

  function category_dropdown() {
    $mysql = new DBManager();

    echo '<select name="category" class="styled-select">';
    $mysql->category_dropdown();
    echo '</select><br/>';
  }

  function view_categories() {
    $mysql = new DBManager();

    echo '<table border="1">';
    echo '<tr> <th>Category</th></tr>';//' <th>Last topic</th> </tr>';
    $mysql->view_categories();
    echo '</table>';
  }

  function view_category($id) {
    $mysql = new DBManager();

    $mysql->view_category($id);
  }

  function view_question($id) {
    $mysql = new DBManager();

    $mysql->view_question($id);
  }
}
