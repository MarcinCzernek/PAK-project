<?php
  include_once 'comment.php';
  $com = new Comment();
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $comment = $_POST['cpmment'];

      if(empty($name) || empty($comment)) {
          echo "<span style='color: red;font-size:20px'>Field must not be empty !</span>";
      }else {
          $com->setData($name,$comment);
          if ($com->create()){
              header('Location: index.php?msg='.urlencode('Comment Posting Successfully'));
          }

      }
  }
?>