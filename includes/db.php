<?php
function conectar(): mysqli {
    $host = "127.0.0.1"; 
    $user = "root";
    $password = "";  
    $database = "proyecto"; 
    $port = "3306"; 
    $db= new mysqli($host,$user,$password,$database);
    if (!$db){
        echo 'error';
        exit;
    }
    return $db;
}
?>
