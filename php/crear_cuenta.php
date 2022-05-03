<?php

include("conexion.php");
include("functions.php");

if($_POST){
    if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['celular']) || empty($_POST['negocio']) || empty($_POST['url_negocio']))				
    {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
    } else {            
        $strNombre = strClean($_POST['nombre']);
        $strEmail = strClean($_POST['email']);
        $intCelular = intval($_POST['celular']);
        $strNegocio= strClean($_POST['negocio']);
        $strURL = strClean($_POST['url_negocio']);        
        $request_producto = "";
  
        //Validar Email
        $sql = "SELECT email_user FROM restaurantes WHERE email_user = '$strEmail';";        

        if ($result = $connect->query($sql)) {            
            $row_cnt = $result->num_rows;        
            if ($row_cnt == 0) {
                // Validar URL
                $sql = "SELECT url FROM restaurantes WHERE url = '$strURL';";        

                if ($result = $connect->query($sql)) {            
                    $row_cnt = $result->num_rows;        
                    if ($row_cnt == 0) {
                        $request = 0;
                    } else {
                        $request = "URL_exist";
                    }                                                              
                  
                }   
            } else {
                $request = "mail_exist";
            }                                              
          
        }       
   
        
        // echo "request email: " .$request."\n";             
        // Enviar respuesta
        if($request === "mail_exist" )
        {
            // echo "Entro en mail exist\n";
            $arrResponse = array('status' => false, 'msg' => '¡Este mail ya esta en uso!', 'input' => 'email');
        } 
        if($request === "URL_exist") {
            // echo "Entro en URL exist\n";
            $arrResponse = array('status' => false, 'msg' => 'Esta URL esta en uso', 'input' => 'url_negocio');
        }
        if($request === 0) {
            // Setteando datos de guardado
            $codeIndex = GenerarCodeIndex();
            $token = generarToken(20);

            $sql = "INSERT INTO restaurantes (id_restaurante,                                    
                                        nombres,   
                                        identificacion,                                 
                                        telefono,
                                        email_user,
                                        password,
                                        token,
                                        rolid,
                                        url_logo,
                                        url,
                                        status) 
                VALUES (null, '$strNombre', '$codeIndex', '$intCelular', '$strEmail', '', '$token', 1,'portada.png', '$strURL', 0);";
            
            if($connect->query($sql) === true){
                $request = 0;
            } else {
                $request = 1;
            }
            // Enviar respuesta
            if($request > 0 )
            {
                $arrResponse = array('status' => false, 'msg' => '¡Ah ocurrido un error!.');
            } else {                           
                require ("mails/send/key_confirm.php");
                if($resp_mail === true){
                    $arrResponse = array("status" => true, "msg" => 'Datos Guardados');
                } else {
                    $arrResponse = array("status" => false, "msg" => 'Error en el envio de mail');
                }
           
            }            
        }
       
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
    }      
}
die();


function GenerarCodeIndex(){
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $ala_code = substr(str_shuffle($permitted_chars), 0, 5);
         
    $time = time();    
    $more_code = date("is", $time);
    
    $codeIndex = "$ala_code$more_code";
    
    return $codeIndex;
}

function generarToken($longitud)
{
    if ($longitud < 4) {
        $longitud = 4;
    }
 
    return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
}
?>
