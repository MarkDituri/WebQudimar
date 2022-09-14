<?php
$host = $_SERVER["HTTP_HOST"];
if($host == "localhost"){                            
    $base_url = "http://"."$host"."/webqudimar";                            
} else {
    $base_url = "https://"."$host";
}
date_default_timezone_set('America/Argentina/Buenos_Aires');

function getHoy()
{
    // $hoy = date('20/11/2022');
    $hoy = date('d/m/Y');

    return $hoy;
}

function getHoyDB()
{
    // $hoyDB = date("2022-09-20");
    $hoyDB = date("Y-m-d");

    return $hoyDB;
}

?>