<?php
  include_once 'db_log_connection.php';
  include_once 'comment.php';
  include_once 'login_process.php';
  $com = new Comment();
  $list = array('noob','kurde','głupi','głupek','zjeb','zjebie','idiota','idioto','spierdalaj','buc','bucu','chuj','chuju','debil','debilu','szmata','szmato','wypierdalaj','kurwa','kurwo','suko','dziwko');
  $replace = array('****','*****','*****','******','****','******','******','******','**********','***','****','****','*****','*****','******','******','******','***********','*****','******','****','******');
  $name = $_SESSION['username'];
  if(isset($_POST['submit'])) {
      $comment = $_POST['comment'];
      if (isset($_POST['comment']) && !empty($_POST['comment'])){
          $comment = $_POST['comment'];
          $comment_new = str_ireplace($list,$replace,$comment);
      }

      if (empty($name) || empty($comment_new)) {
          echo "<span style='color: red;font-size:20px'>Pole nie może być puste!</span>";
      } else {
          $com->setData($name, $comment_new);
          if ($com->create()) {
              header('Location: index.php?msg=' . urlencode('Pomyślnie opublikowano komentarz'));
          }
      }

  }

?>
