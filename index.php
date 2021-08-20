<?php
  include_once 'comment.php';
  $com = new Comment();

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
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
        .box span{color: #888;}
    </style>
</head>
<body style="background-color: #0072B5">
   <div class="box">
       <ul>
           <?php
               $result = $com->index();
               while ($data = $result->fetch_assoc()) {
               ?>
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

    <form action="post_comment.php" method="post"><br><br><br>
        <table>
            <tr>
                <td>Your Name:</td>
                <td><input style="width: 230px;height: 30px;" type="" name="name" placeholder="Please enter your name"></td>
            </tr>
            <tr>
                <td>Your email:</td>
                <td><input style="width: 230px;height: 30px" type="" name="email" placeholder="Please enter your email"></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td>
                    <textarea name="comment" rows="5" cols="30" placeholder="Please enter your comment"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input style="width: 235px;height: 40px;" type="submit" name="submit" value="Post"></td>
            </tr>
        </table>
    </form>
    <center>
</body>
</html>
