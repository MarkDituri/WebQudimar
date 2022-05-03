<?php //Ejemplo curso PHP aprenderaprogramar.com



function GenerarCodeIndex(){
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $ala_code = substr(str_shuffle($permitted_chars), 0, 5);
         
    $time = time();    
    $more_code = date("is", $time);
    
    $codeIndex = "$ala_code$more_code";
    echo $codeIndex;

    return $codeIndex;
}

?>