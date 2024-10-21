<?php
    $user="root";
    $pass="";
    $db="school_enrollment";
    $server="127.0.0.1";
    $port = 33065; 
 
    $con = mysqli_connect($server, $user, $pass, $db, $port);
    if(!$con) {
        die("Conexión fallida: " . mysqli_connect_error());
    } else {
        //echo "Conexión satisfactoria";
    }
    
?>