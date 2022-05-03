<?php
$host = $_SERVER["HTTP_HOST"];
if($host == "localhost"){                            
    $base_url = "http://"."$host"."/webqudimar";                            
} else {
    $base_url = "https://"."$host";
}

?>