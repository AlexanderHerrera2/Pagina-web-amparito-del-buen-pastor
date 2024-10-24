<?php
include './conexion.php';

// Datos del estudiante (students)
$student_first_name = $_POST['student_first_name'];
$student_last_name = $_POST['student_last_name'];
$student_date_of_birth = $_POST['student_date_of_birth'];
$student_gender = $_POST['student_gender'];
$student_address = $_POST['student_address'];
$student_city = $_POST['student_city'];
$student_state = $_POST['student_state'];
$student_zip_code = $_POST['student_zip_code'];
$student_email = $_POST['student_email'];
$student_cedula = $_POST['student_cedula'];

// Datos del padre/tutor (parents_guardians)
$parent_first_name = $_POST['parent_first_name'];
$parent_last_name = $_POST['parent_last_name'];
$parent_email = $_POST['parent_email'];
$parent_phone_number = $_POST['parent_phone_number'];
$relationship_to_student = $_POST['relationship_to_student']; // Relación con el estudiante

// Datos del contacto de emergencia (emergency_contacts)
$emergency_contact_name = $_POST['emergency_contact_name'];
$emergency_contact_phone_number = $_POST['emergency_contact_phone_number'];
$relationship_to_student_emergency = $_POST['relationship_to_student_emergency']; // Relación con el estudiante

// Curso en el que se está inscribiendo (enrollments)
$course_id = $_POST['course_id']; // ID del curso 

//$course_name= $_GET['course_name'];

// 1. Insertar datos en la tabla de estudiantes (students)
$sql_students = "INSERT INTO students (
    first_name, last_name, date_of_birth, gender, address, city, state, zip_code, email, cedula, enrollment_status
) VALUES (
    '$student_first_name', '$student_last_name', '$student_date_of_birth', '$student_gender', 
    '$student_address', '$student_city', '$student_state', '$student_zip_code', '$student_email','$student_cedula', 'pending'
)";

$res_sql_students = mysqli_query($con, $sql_students);

// Obtener el último ID de estudiante insertado
$last_student_id = mysqli_insert_id($con);

// 2. Insertar datos en la tabla de padres/tutores (parents_guardians)
$sql_parents_guardians = "INSERT INTO parents_guardians (
    parent_first_name, parent_last_name, email, phone_number, relationship_to_student, student_id
) VALUES (
    '$parent_first_name', '$parent_last_name', '$parent_email', '$parent_phone_number', 
    '$relationship_to_student', '$last_student_id'
)";

$res_sql_parents_guardians = mysqli_query($con, $sql_parents_guardians);

// 3. Insertar datos en la tabla de contactos de emergencia (emergency_contacts)
$sql_emergency_contacts = "INSERT INTO emergency_contacts (
    contact_name, relationship_to_student, phone_number, student_id
) VALUES (
    '$emergency_contact_name', '$relationship_to_student_emergency', '$emergency_contact_phone_number', '$last_student_id'
)";

$res_sql_emergency_contacts = mysqli_query($con, $sql_emergency_contacts);

// 4. Insertar datos en la tabla de matrículas (enrollments)
$sql_enrollments = "INSERT INTO enrollments (
    student_id, course_id, enrollment_date, enrollment_status
) VALUES (
    '$last_student_id', '$course_id', (CURDATE()), 'pending'
)";

$res_sql_enrollments = mysqli_query($con, $sql_enrollments);

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

// 5. (Opcional) Verificar si todas las inserciones se realizaron correctamente
if ($res_sql_students && $res_sql_parents_guardians && $res_sql_emergency_contacts && $res_sql_enrollments) {
    echo 'Los datos se guardaron exitosamente en todas las tablas';
} else {
    echo 'Error al guardar la información';
}
// Verificar si hay cupos disponibles para el curso
$sql_check_cupos = "SELECT max_students, enrolled_students FROM courses WHERE course_id = '$course_id'";
$res_check_cupos = mysqli_query($con, $sql_check_cupos);
$row = mysqli_fetch_assoc($res_check_cupos);

$max_students = $row['max_students'];
$enrolled_students = $row['enrolled_students'];

if ($enrolled_students >= $max_students) {
    die("No quedan cupos disponibles en este curso.");
} else {
    // Si hay cupos disponibles, proceder con la inscripción
    $sql_enrollments = "INSERT INTO enrollments (student_id, course_id, enrollment_date, enrollment_status)
                        VALUES ('$last_student_id', '$course_id', CURDATE(), 'pending')";
    $res_sql_enrollments = mysqli_query($con, $sql_enrollments);

    // Actualizar el número de estudiantes matriculados en el curso
    $sql_update_cupos = "UPDATE courses SET enrolled_students = enrolled_students + 1 WHERE course_id = '$course_id'";
    mysqli_query($con, $sql_update_cupos);
}
// Verificar si el estudiante ya está inscrito en el curso
$sql_check_enrollment = "SELECT * FROM enrollments WHERE student_id = '$last_student_id' AND course_id = '$course_id'";
$res_check_enrollment = mysqli_query($con, $sql_check_enrollment);

if (mysqli_num_rows($res_check_enrollment) > 0) {
    die("El estudiante ya está inscrito en este curso.");
} else {
    // Verificar si hay cupos disponibles para el curso
    $sql_check_cupos = "SELECT max_students, enrolled_students FROM courses WHERE course_id = '$course_id'";
    $res_check_cupos = mysqli_query($con, $sql_check_cupos);
    $row = mysqli_fetch_assoc($res_check_cupos);

    $max_students = $row['max_students'];
    $enrolled_students = $row['enrolled_students'];

    if ($enrolled_students >= $max_students) {
        die("No quedan cupos disponibles en este curso.");
    } else {
        // Si hay cupos disponibles, proceder con la inscripción
        $sql_enrollments = "INSERT INTO enrollments (student_id, course_id, enrollment_date, enrollment_status)
                            VALUES ('$last_student_id', '$course_id', CURDATE(), 'pending')";
        $res_sql_enrollments = mysqli_query($con, $sql_enrollments);

        // Actualizar el número de estudiantes matriculados en el curso
        $sql_update_cupos = "UPDATE courses SET enrolled_students = enrolled_students + 1 WHERE course_id = '$course_id'";
        mysqli_query($con, $sql_update_cupos);
    }
}


?>
