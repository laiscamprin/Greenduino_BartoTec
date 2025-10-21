<?php
$con = mysqli_connect("localhost", "root", "1234", "greenduino_db");

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
