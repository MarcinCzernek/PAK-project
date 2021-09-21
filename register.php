<?php
   session_start();

if (isset($_POST['email']))
{
    $wszystko_OK=true;


    $nick = $_POST['nick'];


    if ((strlen($nick)<3) || (strlen($nick)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
    }
    if(ctype_alnum($nick) == false)
    {
        $wszystko_OK==false;
        $_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
    }


    $email = $_POST['email'];
    $safe_email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if((filter_var($safe_email, FILTER_VALIDATE_EMAIL)==false) || ($safe_email!=$email)){
        $wszystko_OK=false;
        $_SESSION['e_email']="Podaj poprawny adres email";
    }


    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if((strlen($haslo1)<8) || (strlen($haslo1)>20)){
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";

    }

    if($haslo1!=$haslo2){
        $wszystko_OK= false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);


    if(!isset($_POST['regulamin'])){
        $wszystko_OK=false;
        $_SESSION['e_regulamin']="Potwierdź akceptację";
    }


    $_SESSION['fr_nick'] = $nick;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
    include_once "db_log_connection.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try
    {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {

            $result = $connection->query("SELECT id FROM login WHERE email='$email'");

            if (!$result) throw new Exception($connection->error);

            $how_many_nicknames = $result->num_rows;
            if($how_many_nicknames>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
            }


            $result = $connection->query("SELECT id FROM login WHERE username='$nick'");

            if (!$result) throw new Exception($connection->error);

            $how_many_nicknames = $result->num_rows;
            if($how_many_nicknames>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_nick']="Istnieje już użytkownik o takim nicku! Wybierz inny.";
            }

            if ($wszystko_OK==true)
            {

                if ($connection->query("INSERT INTO login VALUES (NULL, '$nick', '$haslo_hash', '$email')"))
                {
                    $_SESSION['udanarejestracja']=true;
                    header('Location: login.php');
                }
                else
                {
                    throw new Exception($connection->error);
                }

            }

            $connection->close();
        }

    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
    }
  }
?>

<!DOCTYPE html >
<html lang="pl"">
<head>
    <link rel="stylesheet" type="text/css" href="pliki_css/loginstyle.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Zarejestruj się</title>
    <style>
        .error
        {
            color:red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <center>
<form method="post" class="form">
    <h3>Utwórz konto</h3>
    <div class="form-group">
        <label for="nick" class="form-label">Nazwa</label>
    <input type="text" class="form-control" id="nick" name="nick" placeholder="Nazwa" tabindex="1">
    <?php
    if(isset($_SESSION['e_nick']))
    {
     echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
     unset($_SESSION['e_nick']);
    }
    ?>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email" tabindex="2">
    <?php
    if(isset($_SESSION['e_email'])){
        echo'<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }
    ?>

    </div>
    <div class="form-group">
        <label for="haslo1" class="form-label">Twoje hasło:</label>
    <input type="password" class="form-control" id="pass" name="haslo1" placeholder="Hasło" tabindex="3" >
    <?php if (isset($_SESSION['e_haslo'])) {
        echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
        unset($_SESSION['e_haslo']);
    }
        ?>
    </div>
    <div class="form-group">
        <label for="haslo2" class="form-label">Powtórz hasło:</label>
    <input type="password" class="form-control" id="pass" name="haslo2" placeholder="Powtórz hasło" tabindex="4" >
    </div>
        <label>
            <input type="checkbox" name="regulamin"/>Akceptuję regulamin
        <label/>
            <?php
            if(isset($_SESSION['e_regulamin'])){
                echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                unset($_SESSION['e_regulamin']);
            }
            ?>
            <a href="website_regulations.html">Zobacz regulamin</a>
            <br/><br/>
            <div>
            <input type="submit" id="btn" class="btn" value="Zarejestruj się" name="Zarejestruj się"/>
            </div>
</form>
        <center>
</body>
</html>