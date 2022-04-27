<?php


$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_digicard_admin";

$connect = new mysqli("localhost", "$db_user", "$db_pass", "$db_name");

if ($connect->connect_errno) {
    die("error de conexión: " . $connect->connect_error);
} 

?>