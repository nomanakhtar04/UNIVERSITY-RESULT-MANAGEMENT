<?php
// database.php

$host = 'localhost';
$dbname = 'university_results';
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

/**
 * Helper function to fetch all results
 *
 * @param string $query
 * @param array $params
 * @return array
 */
function fetchAllResults($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Helper function to fetch single result
 *
 * @param string $query
 * @param array $params
 * @return array|null
 */
function fetchSingleResult($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Helper function to execute a query
 *
 * @param string $query
 * @param array $params
 * @return bool
 */
function executeQuery($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    return $stmt->execute($params);
}
?>