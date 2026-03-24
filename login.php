<?php
session_start();

// Include database connection
include('db_connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare('SELECT student_id FROM students WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['student_id'] = $row['student_id']; // Set student_id in session
        header('Location: dashboard.php');
        exit();
    } else {
        echo 'Invalid username or password';
    }
}
?>