<?php
include './conexion.php';


$representante_nombre = $_POST['representante_nombre'];
$representante_apellido = $_POST['representante_apellido'];
$representante_correo = $_POST['representante_correo'];
$representante_cedula = $_POST['representante_cedula'];
$representante_direccion = $_POST['representante_direccion'];
$representante_estado_civil = $_POST['representante_estado_civil'];
$representante_telefono = $_POST['representante_telefono'];


$estudiante_nombre = $_POST['estudiante_nombre'];
$estudiante_apellido = $_POST['estudiante_apellido'];
$estudiante_cedula = $_POST['estudiante_cedula'];
$estudiante_fecha_nacimiento = $_POST['estudiante_fecha_nacimiento'];
$estudiante_direccion = $_POST['estudiante_direccion'];
$estudiante_genero = $_POST['estudiante_genero'];
$estudiante_curso = $_POST['estudiante_curso'];


$sql_representantes = "INSERT INTO tabla_representantes (
    nom_representante, apell_representante, correo_representante, cedula_representante, 
    direccion_representante, estado_civil_representante, telefono_representante
) VALUES (
    '$representante_nombre', '$representante_apellido', '$representante_correo', '$representante_cedula', 
    '$representante_direccion', '$representante_estado_civil', '$representante_telefono'
)";

$res_sql_representantes = mysqli_query($con, $sql_representantes);


$sql_estudiantes = "INSERT INTO tabla_estudiantes (
    nom_estudiante, apell_estudiante, cedula_estudiante, fecha_nac_estudiante, 
    direccion_estudiante, genero_estudiante, curso_estudiante
) VALUES (
    '$estudiante_nombre', '$estudiante_apellido', '$estudiante_cedula', '$estudiante_fecha_nacimiento', 
    '$estudiante_direccion', '$estudiante_genero', '$estudiante_curso'
)";

$res_sql_estudiantes = mysqli_query($con, $sql_estudiantes);

if ($res_sql_representantes && $res_sql_estudiantes) {
    echo 'Los datos se guardaron exitosamente en ambas tablas';
} else {
    echo 'Error al guardar la información';
}

?>
