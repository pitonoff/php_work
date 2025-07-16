<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/Database.php';

use App\Database;

// Параметры подключения
$host = 'localhost';
$db   = 'testdb';
$user = 'root';
$pass = 'password';

try {
    $db = new Database($host, $db, $user, $pass);
    $pdo = $db->getConnection();

    // Пример запроса
    $stmt = $pdo->query("SELECT NOW() as current_time");
    $row = $stmt->fetch();

    echo "Current time from DB: " . $row['current_time'];
} catch (Throwable $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
