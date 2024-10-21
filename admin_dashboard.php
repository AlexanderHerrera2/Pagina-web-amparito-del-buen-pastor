<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit;
}

include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Consultar los estudiantes matriculados
$sql = "SELECT 
            students.first_name, 
            students.last_name, 
            students.email, 
            students.cedula, 
            courses.course_name, 
            enrollments.enrollment_date, 
            enrollments.enrollment_status 
        FROM enrollments
        JOIN students ON enrollments.student_id = students.student_id
        JOIN courses ON enrollments.course_id = courses.course_id";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administración - Estudiantes Matriculados</title>
    <link rel="stylesheet" href="css/admin_dashboard.css" />
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
        <h2>Estudiantes Matriculados</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Cédula</th>
                    <th>Curso</th>
                    <th>Fecha de Inscripción</th>
                    <th>Estado de Inscripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['cedula'] . "</td>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td>" . $row['enrollment_date'] . "</td>";
                        echo "<td>" . $row['enrollment_status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay estudiantes matriculados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>  
    <a href="logout.php" class="submit">Cerrar Sesión</a>
          
</body>
</html>
