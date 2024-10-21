<?php
session_start();

// Aquí definirías las credenciales correctas
$admin_user = 'admin';
$admin_pass = 'admin123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['logged_in'] = true;
        header('Location: admin_dashboard.php'); // Redirigir al dashboard
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Administrador</title>
    <link rel="stylesheet" href="css/aut.css" />
</head>
<body>
<div class="login-container">

    <form method="post" action="">
    <h3>Iniciar Sesión</h3>

    <div class="form-item">
        <input type="text" name="username" placeholder="Usuario" required><br>
        </div>
        <div class="form-item">
        <input type="password" name="password" placeholder="Contraseña" required><br>
        </div>
        <div class="form-item">
        <button type="submit" class="submit">Iniciar Sesión</button>
        </div>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    </form>
    </div>
</body>
</html>
