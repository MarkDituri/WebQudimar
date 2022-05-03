<?php

$host= $_SERVER["HTTP_HOST"];
if($host == "localhost"){
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_digicard_admin";
}

if($host == "modian.tech"){
    $db_server = "localhost";
    $db_user = "u878594977_mark";
    $db_pass = "SapoPepe1122";
    $db_name = "u878594977_digicard";
}

$connect = new mysqli("localhost", "$db_user", "$db_pass", "$db_name");

if ($connect->connect_errno) {
    die("error de conexión: " . $connect->connect_error);
} 

?>