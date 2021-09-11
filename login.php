<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="pliki_css/loginstyle.css">
 <title>Logowanie</title>
</head>
<body>
<div class="container">
<center>
    <div style="float: left"><a href="register.php">Rejestracja</a></div></a>
    <br/><br/>
   <h3>Nie jesteś zalogowany...</h3>
<form action="login_process.php" method="POST" class="form">
    <div class="form-group">
        <label for="username" class="form-label">Nazwa</label>
    <input type="text" class="form-control" id="user" name="username" placeholder="Login"tabindex="1" required>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Hasło</label>
    <input type="Password" class="form-control" id="pass" name="password" placeholder="Hasło" tabindex="2" required>
    </div>
    <div>
    <button type="submit" id="btn" class="btn" name="login">Zaloguj się</button>
    </div>
</form>
</center>
</body>
</html>
