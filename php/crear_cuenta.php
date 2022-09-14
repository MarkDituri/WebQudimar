<?php

include("conexion.php");
include("config.php");
include("functions.php");

if ($_POST) {
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['celular']) || empty($_POST['negocio'])) {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
    } else {
        $strNombre = strClean($_POST['nombre']);
        $strApellido = strClean($_POST['apellido']);
        $strNombreRest = strClean($_POST['negocio']);
        $strEmail = strClean($_POST['email']);
        $intCelular = intval($_POST['celular']);
        $strNegocio = strClean($_POST['negocio']);
        $request = 0;

        //Validar Email
        $sql = "SELECT email_user FROM restaurantes WHERE email_user = '$strEmail';";

        if ($result = $connect->query($sql)) {
            $row_cnt = $result->num_rows;
            if ($row_cnt != 0) {
                $request = "mail_exist";
            }
        }

        // Enviar respuesta
        if ($request === "mail_exist") {
            $arrResponse = array('status' => false, 'msg' => '¡Este mail ya esta en uso!', 'input' => 'email');
        }

        if ($request === 0) {
            // Setteando datos de guardado
            $codeIndex = GenerarCodeIndex();
            $token = generarToken(20);

            // Genera QR jpg (2 medidas)
            $qr_size_1 = file_get_contents("https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=https://modian.tech/menu/?key=$codeIndex");
            file_put_contents('../menu/admin/Assets/images/uploads/qr/qr_150x150_' . $codeIndex . '.jpg', $qr_size_1);
            $qr_size_2 = file_get_contents("https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://modian.tech/menu/?key=$codeIndex");
            file_put_contents('../menu/admin/Assets/images/uploads/qr/qr_200x200_' . $codeIndex . '.jpg', $qr_size_2);

            $sql = "INSERT INTO restaurantes (
                                    id_restaurante,                                    
                                    nombres,
                                    apellidos,
                                    identificacion,     
                                    nombre_rest,                            
                                    telefono,
                                    email_user,
                                    id_color,
                                    dark_mode,
                                    password,
                                    token,
                                    rolid,
                                    url_logo,                                        
                                    status,
                                    id_plan,
                                    id_admin
                                ) 
            VALUES (null, '$strNombre', '$strApellido', '$codeIndex', '$strNombreRest', '$intCelular', '$strEmail', 7, 0, '', '$token', 1,'portada.png', 0, 1, '');";
            // Si se inserto el restaurante
            if ($connect->query($sql) === true) {
                $selectID = "SELECT id_restaurante FROM restaurantes ORDER by id_restaurante DESC LIMIT 1";
                // Si trajo el ultimo ID, Insertar primer PAGO
                if ($result = $connect->query($selectID)) {
                    $extraido = mysqli_fetch_array($result);
                    $id_restaurante = $extraido['id_restaurante'];

                    $hoy = getHoyDB();                                                            
                    $fechaFin = date("Y-m-d", strtotime($hoy . "+ 30 days"));       
                    $fechaInicio = date("Y-m-d", strtotime($fechaFin . "- 30 days"));             
                    $fechaVen = date("Y-m-d", strtotime($fechaInicio . "+ 30 days"));                    
           
                    $sql = "INSERT INTO pagos (
                                            id_pago,
                                            status,
                                            fechaInicio,
                                            fechaVen,
                                            fechaFin,
                                            precio,
                                            activo,
                                            id_plan,
                                            id_restaurante
                                        ) 
                    VALUES (null, 1, '$fechaInicio', '$fechaVen', '$fechaFin', 0, 'si', 1, $id_restaurante);";

                    $fechaFinPago = date("Y-m-d", strtotime($fechaFin . "+ 30 days"));
                    $fechaVenPago = date("Y-m-d", strtotime($fechaFin . "+ 15 days"));
                    $fechaInicioPago = date("Y-m-d", strtotime($fechaFin));
                    // Verificar si guardo PAGO 1
                    if ($connect->query($sql) === true) {
                        $selectPlan = "SELECT precio, id_plan FROM planes WHERE id_plan = 2;";
                        // Seleccionar precio de plan actual
                        if ($result = $connect->query($selectPlan)) {
                            $extraido = mysqli_fetch_array($result);
                            $precio_plan = $extraido['precio'];
                        }

                        $sql = "INSERT INTO pagos (
                                                id_pago,
                                                status,
                                                fechaInicio,
                                                fechaVen,
                                                fechaFin,
                                                precio,
                                                activo,
                                                id_plan,
                                                id_restaurante
                                            ) 
                        VALUES (null, 0, '$fechaInicioPago', '$fechaVenPago', '$fechaFinPago', $precio_plan, 'si', 2, $id_restaurante);";

                        if ($connect->query($sql) === true) {
                            $request = 0;
                        }           
                    } else {
                        $request = 1;
                    }
                }
            } else {
                $request = 1;
            }

            // Enviar respuesta
            if ($request > 0) {
                $arrResponse = array('status' => false, 'msg' => '¡Ah ocurrido un error!.');
            } else {
                $arrResponse = array("status" => true, "msg" => 'Datos Guardados');
                //Enviar Mail
                require("mails/send/key_confirm.php");
                if ($resp_mail === true) {
                    $arrResponse = array("status" => true, "msg" => 'Datos Guardados');
                } else {
                    $arrResponse = array("status" => false, "msg" => 'Error en el envio de mail');
                }
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
die();

//Funciones
function GenerarCodeIndex()
{
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

