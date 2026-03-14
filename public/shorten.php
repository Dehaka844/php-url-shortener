<?php
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longUrl = $_POST['url'] ?? '';

    // 1. Validar que sea una URL válida
    if (!filter_var($longUrl, FILTER_VALIDATE_URL)) {
        echo json_encode(['status' => 'error', 'message' => 'Por favor, introduce una URL válida.']);
        exit;
    }

    // 2. Generar un código corto único (6 caracteres)
    // Usamos un hash y tomamos una parte para asegurar brevedad
    $shortCode = substr(md5(uniqid(rand(), true)), 0, 6);

    try {
        // 3. Guardar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO urls (long_url, short_code) VALUES (?, ?)");
        $stmt->execute([$longUrl, $shortCode]);

        // 4. Construir la URL corta completa
        // Nota: En un entorno real, usarías tu dominio. Aquí usamos la ruta local.
        $baseUrl = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'] ) . "/redirect.php?c=";
        $shortUrl = $baseUrl . $shortCode;

        echo json_encode([
            'status' => 'success',
            'short_url' => $shortUrl
        ]);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error al guardar la URL en el sistema.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
