<?php

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "pak_login";

$con = mysqli_connect('localhost',"root","","pak_login");

//Sprawdza połączenie
if(mysqli_connect_errno()){
    echo "Nie udało się połączyć z MySQL:". mysqli_connect_error();
}
?>