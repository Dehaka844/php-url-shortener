<?php
require_once '../config/database.php';

// Obtener el código de la URL
$code = $_GET['c'] ?? '';

if (empty($code)) {
    die("Código no proporcionado.");
}

try {
    // Buscar la URL larga asociada al código
    $stmt = $pdo->prepare("SELECT long_url FROM urls WHERE short_code = ?");
    $stmt->execute([$code]);
    $result = $stmt->fetch();

    if ($result) {
        // Redirección HTTP 302 (Temporal) a la URL original
        header("Location: " . $result['long_url']);
        exit;
    } else {
        echo "<h1>404 - Enlace no encontrado</h1>";
        echo "<p>El código proporcionado no existe en nuestra base de datos.</p>";
    }

} catch (Exception $e) {
    die("Error al procesar la redirección.");
}
