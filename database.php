<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'turingclub_db');
define('DB_USER', 'your_username'); // To be updated
define('DB_PASS', 'your_password'); // To be updated

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
} 