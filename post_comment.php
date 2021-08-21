<?php
  include_once 'comment.php';
  $com = new Comment();
  $list = array('zjeb','idiota','kurwa','chuj','debil','szmata','wypierdalaj','spierdalaj','suko','dziwko');
  $replace = array('****','******','*****','****','*****','******','***********','**********','****','******');
  if(isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      if (isset($_POST['comment']) && !empty($_POST['comment'])){
          $comment = $_POST['comment'];
          $comment_new = str_ireplace($list,$replace,$comment);
      }

      if (empty($name) || empty($email) || empty($comment_new)) {
          echo "<span style='color: red;font-size:20px'>Field must not be empty !</span>";
      } else {
          $com->setData($name, $email, $comment_new);
          if ($com->create()) {
              header('Location: index.php?msg=' . urlencode('Comment Posting Successfully'));
          }


      }
  }

?>
