<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gyakorlat7');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $conn = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die('Adatbázis kapcsolódási hiba: ' . htmlspecialchars($e->getMessage()));
}
?>
