<?php
include './conexion.php';

// Datos del estudiante
$nombresEstudiante = $_POST['nombresEstudiante'];
$apellidosEstudiante = $_POST['apellidosEstudiante'];
$fechaDeNacimiento = $_POST['fechaDeNacimiento'];
$cedulaEstudiante = $_POST['cedulaEstudiante'];
$direccionEstudiante = $_POST['direccionEstudiante'];
$idCurso = $_POST['idCurso'];

// Datos del representante
$nombresRepresentante = $_POST['nombresRepresentante'];
$apellidosRepresentante = $_POST['apellidosRepresentante'];
$cedulaRepresentante = $_POST['cedulaRepresentante'];
$telefonoRepresentante = $_POST['telefonoRepresentante'];
$emailRepresentante = $_POST['emailRepresentante'];

// Datos del contacto de emergencia
$telefonoEmergencia = $_POST['telefonoEmergencia'];

// Datos de Facturación
$nombresApellidosFacturacion = $_POST['nombresApellidosFacturacion'];
$cedulaFacturacion = $_POST['cedulaFacturacion'];
$emailFacturacion = $_POST['emailFacturacion'];
$telefonoFacturacion = $_POST['telefonoFacturacion'];
$direccionFacturacion = $_POST['direccionFacturacion'];

// Verificar si el estudiante ya está registrado
$sql_check_student = "SELECT idEstudiante FROM estudiantes WHERE cedulaEstudiante = '$cedulaEstudiante'";
$res_check_student = mysqli_query($con, $sql_check_student);

if (mysqli_num_rows($res_check_student) > 0) {
    die("El estudiante ya está registrado en el sistema.");
}

// Insertar datos en la tabla de estudiantes
$sql_students = "INSERT INTO estudiantes (nombresEstudiante, apellidosEstudiante, fechaNacimiento, cedulaEstudiante, direccionEstudiante, idCurso, estadoMatricula)
VALUES ('$nombresEstudiante', '$apellidosEstudiante', '$fechaDeNacimiento', '$cedulaEstudiante', '$direccionEstudiante', '$idCurso', 'pendiente')";
$res_sql_students = mysqli_query($con, $sql_students);

if (!$res_sql_students) {
    die("Error en la inserción de estudiante: " . mysqli_error($con));
}

// Obtener el último ID de estudiante insertado
$last_student_id = mysqli_insert_id($con);

// Insertar datos en la tabla de representantes
$sql_representantes = "INSERT INTO representantes (nombresrepresentante, apellidosrepresentante, cedularepresentante, telefonorepresentante, email, idEstudiante)
VALUES ('$nombresRepresentante', '$apellidosRepresentante', '$cedulaRepresentante', '$telefonoRepresentante', '$emailRepresentante', '$last_student_id')";
$res_sql_representantes = mysqli_query($con, $sql_representantes);


if (!$res_sql_representantes) {
    die("Error en la inserción de representante: " . mysqli_error($con));
}

// Insertar datos en la tabla de contacto de emergencia
$sql_emergency_contacts = "INSERT INTO contactos_emergencia (telefonoEmergencia, idEstudiante)
VALUES ('$telefonoEmergencia', '$last_student_id')";
$res_sql_emergency_contacts = mysqli_query($con, $sql_emergency_contacts);

// Insertar datos en la tabla de Facturación
$sql_facturacion = "INSERT INTO facturacion (nombresApellidosFacturacion, cedulaFacturacion, emailFacturacion, telefonoFacturacion,direccionFacturacion, idEstudiante)
VALUES ('$nombresApellidosFacturacion', '$cedulaFacturacion', '$emailFacturacion', '$telefonoFacturacion', '$direccionFacturacion', '$last_student_id')";
$res_sql_facturacion = mysqli_query($con, $sql_facturacion);

if (!$res_sql_representantes) {
    die("Error en la inserción de representante: " . mysqli_error($con));
}

if (!$res_sql_emergency_contacts) {
    die("Error en la inserción de contacto de emergencia: " . mysqli_error($con));
}


if (!$res_sql_facturacion) {
    die("Error en la inserción en facturación: " . mysqli_error($con));
}

// Verificar cupos disponibles para el curso
$sql_check_cupos = "SELECT cupoMaximo, estudiantesInscritos FROM cursos WHERE idCurso = '$idCurso'";
$res_check_cupos = mysqli_query($con, $sql_check_cupos);
$row = mysqli_fetch_assoc($res_check_cupos);

if ($row['estudiantesInscritos'] >= $row['cupoMaximo']) {
    die("No quedan cupos disponibles en este curso.");
}

// Verificar si el estudiante ya está inscrito en el curso
$sql_check_enrollment = "SELECT * FROM matriculas WHERE idEstudiante = '$last_student_id' AND idCurso = '$idCurso'";
$res_check_enrollment = mysqli_query($con, $sql_check_enrollment);

if (mysqli_num_rows($res_check_enrollment) > 0) {
    die("El estudiante ya está inscrito en este curso.");
}

// Insertar datos en la tabla de matrículas
$sql_matriculas = "INSERT INTO matriculas (idEstudiante, idCurso, fechaMatricula, estado)
VALUES ('$last_student_id', '$idCurso', NOW(), 'pendiente')";
$res_sql_matriculas = mysqli_query($con, $sql_matriculas);

if (!$res_sql_matriculas) {
    die("Error en la inserción de matrícula: " . mysqli_error($con));
}

// Actualizar el número de estudiantes inscritos en el curso
$sql_update_cupos = "UPDATE cursos SET estudiantesInscritos = estudiantesInscritos + 1 WHERE idCurso = '$idCurso'";
mysqli_query($con, $sql_update_cupos);

// Mensaje de éxito
echo 'Los datos se guardaron exitosamente en todas las tablas.';
?>
