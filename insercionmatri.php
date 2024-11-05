<?php
include './conexion.php';

// Datos del estudiante
$nombresEstudiante = $_POST['nombresEstudiante'];
$apellidosEstudiante = $_POST['apellidosEstudiante'];
$fechaDeNacimiento = $_POST['fechaDeNacimiento'];
$genero = $_POST['genero'];
$direccionEstudiante = $_POST['direccionEstudiante'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$códigoPostal = $_POST['códigoPostal'];
$cedulaEstudiante = $_POST['cedulaEstudiante'];

// Datos del padre/representante
$nombresRepresentante = $_POST['nombresRepresentante'];
$apellidosRepresentante = $_POST['apellidosRepresentante'];
$correoRepresentante = $_POST['correoRepresentante'];
$telefono = $_POST['telefono'];
$relacionConElEstudiante = $_POST['relacionConElEstudiante']; 

// Datos del contacto de emergencia
$nombreContacto = $_POST['nombreContacto'];
$relacionContacto = $_POST['relacionContacto']; 
$telefonoContacto = $_POST['telefonoContacto'];

// Curso en el que se está inscribiendo
$idCurso = $_POST['idCurso'];

// Insertar datos en la tabla de estudiantes
$sql_students = "INSERT INTO estudiantes 
(nombresEstudiante, apellidosEstudiante, fechaDeNacimiento, genero, direccionEstudiante, ciudad,
estado, códigoPostal, cedulaEstudiante, estadoDeMatricula)
VALUES (
    '$nombresEstudiante', '$apellidosEstudiante', '$fechaDeNacimiento', '$genero', 
    '$direccionEstudiante', '$ciudad', '$estado', '$códigoPostal', '$cedulaEstudiante', 'pendiente'
)";

$res_sql_students = mysqli_query($con, $sql_students);

// Obtener el último ID de estudiante insertado
$last_student_id = mysqli_insert_id($con);

// Insertar datos en la tabla de representante
$sql_representantes = "INSERT INTO representante (
    nombresRepresentante, apellidosRepresentante, correoRepresentante, telefono, relacionConElEstudiante, idEstudiante
) VALUES (
    '$nombresRepresentante', '$apellidosRepresentante', '$correoRepresentante', '$telefono', 
    '$relacionConElEstudiante', '$last_student_id'
)";

$res_sql_parents_guardians = mysqli_query($con, $sql_representantes);

// Insertar datos en la tabla de contacto de emergencia
$sql_emergency_contacts = "INSERT INTO contacto_de_emergencia (
    nombreContacto, relacionContacto, telefonoContacto, idEstudiante
) VALUES (
    '$nombreContacto', '$relacionContacto', '$telefonoContacto', '$last_student_id'
)";

$res_sql_emergency_contacts = mysqli_query($con, $sql_emergency_contacts);

// Verificar si hay cupos disponibles para el curso antes de la inserción
$sql_check_cupos = "SELECT maxEstudiantes, estudiantesMatriculados FROM cursos WHERE idCurso = '$idCurso'";
$res_check_cupos = mysqli_query($con, $sql_check_cupos);
$row = mysqli_fetch_assoc($res_check_cupos);

$max_students = $row['maxEstudiantes'];
$enrolled_students = $row['estudiantesMatriculados'];

if ($enrolled_students >= $max_students) {
    die("No quedan cupos disponibles en este curso.");
}

// Verificar si el estudiante ya está inscrito en el curso
$sql_check_enrollment = "SELECT * FROM matriculas WHERE idEstudiante = '$last_student_id' AND idCurso = '$idCurso'";
$res_check_enrollment = mysqli_query($con, $sql_check_enrollment);

if (mysqli_num_rows($res_check_enrollment) > 0) {
    die("El estudiante ya está inscrito en este curso.");
}

// Insertar datos en la tabla de matrículas (enrollments)
$sql_matriculas = "INSERT INTO matriculas (
    idEstudiante, idCurso, fechaMatricula, estadoMatricula
) VALUES (
    '$last_student_id', '$idCurso', CURDATE(), 'pendiente'
)";

$res_sql_enrollments = mysqli_query($con, $sql_matriculas);

if(!$res_sql_students) {
    die("Error en la inserción de estudiante: " . mysqli_error($con));
}

if(!$res_sql_parents_guardians) {
    die("Error en la inserción de padre/tutor: " . mysqli_error($con));
}

if(!$res_sql_emergency_contacts) {
    die("Error en la inserción de contacto de emergencia: " . mysqli_error($con));
}

if(!$res_sql_enrollments) {
    die("Error en la inserción de matrícula: " . mysqli_error($con));
}

// Actualizar el número de estudiantes matriculados en el curso
$sql_update_cupos = "UPDATE cursos SET estudiantesMatriculados = estudiantesMatriculados + 1 WHERE idCurso = '$idCurso'";
mysqli_query($con, $sql_update_cupos);

// Mensaje de éxito si todo se guardó correctamente
echo 'Los datos se guardaron exitosamente en todas las tablas';

?>
