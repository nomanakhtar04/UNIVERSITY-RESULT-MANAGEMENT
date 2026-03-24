<?php
// Database configuration
$host = 'localhost';
$db = 'database_name';
$user = 'username';
$pass = 'password';

try {
    // PDO connection
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Better error handling
    error_log($e->getMessage()); // log the error
    echo "Database connection failed. Please try again later.";
    exit;
}