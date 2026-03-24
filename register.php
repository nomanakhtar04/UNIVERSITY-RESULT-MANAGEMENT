<?php

// Start the session for student registration
session_start();

// Include database connection file (replace 'db.php' with actual file name)
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Insert the registration details into the database
    $query = "INSERT INTO students (name, email, password) VALUES (?, ?, ?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $name, $email, password_hash($password, PASSWORD_DEFAULT));
    $stmt->execute();
    
    // Check if registration is successful
    if ($stmt->affected_rows > 0) {
        echo "Registration successful!";
    } else {
        echo "Registration failed! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>