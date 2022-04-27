<?php

include("conexion.php");
include("functions.php");

if($_GET){

    if(empty($_GET['email']) )				
    {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
    } else {          
        $strEmail = strClean($_GET['email']);        
        //Consultar base de datos
        $sql = "SELECT email_user FROM restaurantes WHERE email_user = '$strEmail';";        

        if ($result = $connect->query($sql)) {            
            $row_cnt = $result->num_rows;        
            if ($row_cnt == 0) {
                $request = 0;
            } else {
                $request = 1;                
            }                                    
            $result->close();
        }
        // Enviar respuesta
        if($request > 0 )
        {
            $arrResponse = array('status' => false, 'msg' => '¡El correo ya existe!');
        } else {
            $arrResponse = array("status" => true, "msg" => 'Mail valido');
        }            
        echo json_encode($arrResponse);            
    }        
}
die();

?>
