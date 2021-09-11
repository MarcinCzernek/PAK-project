<?php
  include_once 'login_process.php';
  include_once 'comment.php';
  $com = new Comment();
  if(empty($_SESSION['id'])):
    header('Location:login.php');
endif;
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="pliki_css/style.css">
    <meta charset="utf-8"/>
    <meta name="comment" content="napisz komentarz pod postem"/>
    <meta name="keywords" content="post, komentarz"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="author" content="Grupa PAK 65">
    <title>Dodaj komentarz</title>
    <style>
        .box{border: 6px solid #999;margin: 30px auto 0;padding: 20px;width: 1000px;height: 250px;overflow: scroll;}
        .box ul{margin: 0;padding: 0;list-style: none;}
        .box li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
        .box li:last-child{border-bottom: 0 dashed #ddd;}
        .box span{color: floralwhite;}
    </style>
</head>
<a href="logout_process.php"><div style="float:right"><button>Wyloguj się</button></div></a>
<!--style="background-color: slategrey"-->
<body style="background-color: white">
<h3>Chat społecznościowy z cenzurą niewłaściwych słów </h3>
   <div class="box">
       <ul>
           <?php
               $result = $com->index();
               while ($data = $result->fetch_assoc()) {
               ?>
               <?php $com->check($data['comment']) ?>
               <li><b><?php echo $data['name'];?><b> - <?php echo $data['comment'] ?> - <?php echo $com->dateFormat($data['comment_time']); ?></li>

               <?php } ?>

       </ul>
   </div><br><br>
<center>
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo "<span style='color:green;font-size:20px'>".$msg."</span>";
    }
    ?>
    <?php echo "<h1>Witaj ".$_SESSION['username']."!</h1>"?>

    <form action="post_comment.php" method="post"><br><br><br>
        <table>
            <tr>
                <td>Komentarz:</td>
                <td>
                    <textarea name="comment" rows="5" cols="30" placeholder="Napisz komentarz"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input style="width: 235px;height: 40px;" type="submit" name="submit" value="Wyślij"></td>
            </tr>
        </table>
    </form>
    <center>
</body>
</html>
