<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit;
}

include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Cambiar estado de la inscripción si se presiona el botón
if (isset($_POST['update_status'])) {
    $enrollment_id = $_POST['enrollment_id'];
    $new_status = 'confirmed'; // Estado actualizado

    // Actualizar el estado en la base de datos
    $update_sql = "UPDATE enrollments SET enrollment_status = '$new_status' WHERE enrollment_id = '$enrollment_id'";
    mysqli_query($con, $update_sql);
}

// Consultar los estudiantes matriculados
$sql = "SELECT 
            enrollments.enrollment_id AS enrollment_id,
            students.first_name, 
            students.last_name, 
            students.email, 
            students.cedula, 
            courses.course_name, 
            enrollments.enrollment_date, 
            enrollments.enrollment_status,
            parents_guardians.parent_first_name,
            parents_guardians.parent_last_name,
            parents_guardians.phone_number
        FROM enrollments
        JOIN students ON enrollments.student_id = students.student_id
        JOIN courses ON enrollments.course_id = courses.course_id 
        JOIN parents_guardians ON students.student_id = parents_guardians.student_id";

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
    <style>
        .search-box {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function searchTable() {
            let input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("studentsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Saltar la cabecera
                tr[i].style.display = "none"; // Ocultar todas las filas
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Mostrar la fila si hay coincidencia
                            break;
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Estudiantes Matriculados</h2>
        </div>
        
        <!-- Barra de búsqueda -->
        <div class="search-box">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Buscar por cualquier campo...">
        </div>

        <table class="table" id="studentsTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Cédula</th>
                    <th>Curso</th>
                    <th>Fecha de Inscripción</th>
                    <th>Estado de Inscripción</th>
                    <th>Nombre del representante</th>
                    <th>Apellido del representante</th>
                    <th>Número de Contacto</th>
                    <th>Acciones</th> <!-- Columna para las acciones -->
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
                        echo "<td>" . $row['parent_first_name'] . "</td>";
                        echo "<td>" . $row['parent_last_name'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>";

                        // Botón para cambiar el estado
                        if ($row['enrollment_status'] === 'pending') {
                            echo "<td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='enrollment_id' value='" . $row['enrollment_id'] . "'>
                                        <button type='submit' name='update_status'>Confirmar Pago</button>
                                    </form>
                                  </td>";
                        } else {
                            echo "<td>Confirmado</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No hay estudiantes matriculados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>  
    <a href="logout.php" class="submit">Cerrar Sesión</a>
</body>
</html>
