<?php session_start();
if(empty($_SESSION['id'])):
    header('Location:login.php');
endif;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Wyloguj się</title>
</head>
<body>
<div style="width:150px;margin:auto;height:500px;margin-top:300px">

<?php include('db_log_connection.php');
session_destroy();
echo '<meta http-equiv="refresh" content="2;url=login.php">';
echo '<progress max="100"><strong>Progress: 60% done.</strong></progress><br>';
echo '<span class="itext">Wylogowuje się proszę czekać...</span>';
?>
</div>
</body>
</html>
