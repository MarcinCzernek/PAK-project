<?php

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "pak_login";

$con = mysqli_connect('sql8.freemysqlhosting.net',"sql8644297","YQuz12rqnt","sql8644297");

//Sprawdza połączenie
if(mysqli_connect_errno()){
    echo "Nie udało się połączyć z MySQL:". mysqli_connect_error();
}
?>
