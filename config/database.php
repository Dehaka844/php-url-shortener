<?php
// Configuración de la base de datos
$host = 'localhost';
$db   = 'url_shortener_db';
$user = 'root'; // Cambiar según tu entorno
$pass = '';     // Cambiar según tu entorno
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Creamos la conexión usando PDO (PHP Data Objects)
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // En un entorno real, registraríamos el error y mostraríamos un mensaje genérico
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión a la base de datos.']);
    exit;
}
