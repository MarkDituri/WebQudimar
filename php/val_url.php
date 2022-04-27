<?php

include("conexion.php");
include("functions.php");

if($_POST){
    if(empty($_POST['email']) )				
    {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
    } else {            
        $strEmail = strClean($_POST['email']);

        // //Consultar base de datos
        // $sql = "SELECT email_user FROM restaurantes WHERE email_user = '$strEmail';";
        
        // if($connect->query($sql) === true){
        //     $request = 0;
        // } else {
        //     $request = 1;
        // }
    }
    
    $request = 0;
    // Enviar respuesta
    if($request > 0 )
    {
        $arrResponse = array('status' => false, 'msg' => '!La URL ya existe!');
    } else {
        $arrResponse = array("status" => true, "msg" => 'URL valido');
    }            
    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
}
die();

?>
