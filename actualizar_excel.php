<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Configurar la conexión a la base de datos
$host = '127.0.0.1:33065';
$db = 'amparito';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Obtener los datos de la base de datos
$stmt = $pdo->query('SELECT * FROM tabla_representantes');
$representantes = $stmt->fetchAll();

$stmt = $pdo->query('SELECT * FROM tabla_estudiantes');
$estudiantes = $stmt->fetchAll();

// Crear el archivo Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Añadir datos de representantes
$sheet->setCellValue('A1', 'Representantes');
$sheet->fromArray(['Nombre', 'Apellido', 'Correo', 'Cédula', 'Dirección', 'Estado Civil', 'Teléfono'], NULL, 'A2');

$row = 3;
foreach ($representantes as $rep) {
    $sheet->setCellValue('A' . $row, $rep['nom_representante']);
    $sheet->setCellValue('B' . $row, $rep['apell_representante']);
    $sheet->setCellValue('C' . $row, $rep['correo_representante']);
    $sheet->setCellValue('D' . $row, $rep['cedula_representante']);
    $sheet->setCellValue('E' . $row, $rep['direccion_representante']);
    $sheet->setCellValue('F' . $row, $rep['estado_civil_representante']);
    $sheet->setCellValue('G' . $row, $rep['telefono_representante']);
    $row++;
}

// Añadir datos de estudiantes
$sheet->setCellValue('A' . $row, 'Estudiantes');
$sheet->fromArray(['Nombre', 'Apellido', 'Cédula', 'Fecha de Nacimiento', 'Dirección', 'Género', 'Curso'], NULL, 'A' . ($row + 1));

$row += 2;
foreach ($estudiantes as $est) {
    $sheet->setCellValue('A' . $row, $est['nom_estudiante']);
    $sheet->setCellValue('B' . $row, $est['apell_estudiante']);
    $sheet->setCellValue('C' . $row, $est['cedula_estudiante']);
    $sheet->setCellValue('D' . $row, $est['fecha_nac_estudiante']);
    $sheet->setCellValue('E' . $row, $est['direccion_estudiante']);
    $sheet->setCellValue('F' . $row, $est['genero_estudiante']);
    $sheet->setCellValue('G' . $row, $est['curso_estudiante']);
    $row++;
}

// Guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('datos.xlsx');

// Limpiar la tabla de auditoría
$pdo->exec('DELETE FROM audit_log');

echo 'Archivo Excel actualizado y tabla de auditoría limpiada.';
?>
