<?php
    $user="root";
    $pass="";
    $db="amparito";
    $server="127.0.0.1:33065";
 
    $con=mysqli_connect($server,$user,$pass,$db);
    if($con){
        echo "Conexión satisfactoria";
    }else{
        echo "Conexión fallida";
    }
?>