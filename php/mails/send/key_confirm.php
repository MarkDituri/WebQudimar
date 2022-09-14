<?php
$base_url = "https:/modian.tech/php/mails/content/key/";
$mail_per = "contacto@modian.tech";

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "Qudimar"."<$mail_per>";
$to = "$strEmail";
$subject = "Hola $strNombre, tu cuenta fue creada";

$message = file_get_contents('mails/content/key/key_confirm.html');
$message = str_replace('$strNombre', $strNombre, $message);
$message = str_replace('$strEmail', $strEmail, $message);
$message = str_replace('$strNegocio', $strNegocio, $message);
$message = str_replace('$token', $token, $message);
$message = str_replace('$base_url', $base_url, $message);
$message = preg_replace('/\\\\/','', $message);

$headers = "From:" . $from. "\r\n"; 
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

if(mail($to,$subject,$message, $headers)){
    $resp_mail = true;    
} else {
    $resp_mail = false;
    return false;
}

