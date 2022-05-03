<?php
    $mail_per = "contacto@modian.tech";

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$mail_per";
    $to = "marcos.e.dituri@gmail.com";
    $subject = "Checking PHP mail";

    $message  =  file_get_contents ( "email_template.html" );    
    
    $headers = "From:" . $from. "\r\n"; 
    $headers .= "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    if(mail($to,$subject,$message, $headers)){
        echo "Mailcito enviado con exito.";
    } else {
        echo "Error";
    }
  
?>