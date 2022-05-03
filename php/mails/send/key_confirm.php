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


/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that


// date_default_timezone_set('Etc/UTC');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// require 'PHPMailer/exception.php';
// require 'PHPMailer/phpmailer.php';
// require 'PHPMailer/smpt.php';


// //Create a new PHPMailer instance
// $mail = new PHPMailer(true);
// $mail->SMTPOptions = array(
//     'ssl' => array(
//     'verify_peer' => false,
//     'verify_peer_name' => false,
//     'allow_self_signed' => true
//     )
// );
// //Tell PHPMailer to use SMTP
// $mail->isSMTP();
// //Enable SMTP debugging
// // 0 = off (for production use)
// // 1 = client messages
// // 2 = client and server messages
// $mail->SMTPDebug = 0;
// $Correo->Host = "smtp.gmail.com";
// $mail->Port = 587;
// $mail->SMTPAuth = true;
// $mail->Username = 'contacto@modian.tech';
// //Password to use for SMTP authentication
// $mail->Password = "Mark2020!!";
// //Set who the message is to be sent from
// $mail->setFrom('contacto@modian.tech', 'Bastet');
// //Set an alternative reply-to address
// $mail->addReplyTo('contacto@modian.tech', 'Bastet');
// //Set the subject line
// $mail->addAddress($strEmail, $strNombre);

// $mail->Subject = 'Hola, '.$strNombre.' tu videolyrc espera';
// //Read an HTML message body from an external file, convert referenced images to embedded,
// //convert HTML into a basic plain-text alternative body

// $body = file_get_contents('mails/content/key/key_confirm.html');
// $body = str_replace('$nombre', $strNombre, $body);
// $body = str_replace('$email', $strEmail, $body);
// $body = preg_replace('/\\\\/','', $body);

// //Replace the plain text body with one created manually
// $mail->MsgHTML($body);
// $mail->IsHTML(true); // send as HTML
// $mail->CharSet="utf-8"; // use utf-8 character encoding

// $mail->AltBody = 'This is a plain-text message body';
// //Attach an image file

// //send the message, check for errors
// if (!$mail->send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     header('Location: ../../gracias.php?nombre='.$nombre);
// }

