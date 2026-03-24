<?php

// Database configuration
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Code comments to help you understand the configuration.
?>