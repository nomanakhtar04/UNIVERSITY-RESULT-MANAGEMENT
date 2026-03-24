<?php
// result.php

// Assuming you have a database connection already established

// Fetching student ID from URL parameters
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Prepare SQL to fetch student results
    $query = "SELECT * FROM results WHERE student_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$student_id]);

    // Fetch the results
    $result = $stmt->fetch(
        PDO::FETCH_ASSOC
    );

    if ($result) {
        echo "<h1>Results for Student ID: " . htmlspecialchars($result['student_id']) . "</h1>";
        echo "<p>Name: " . htmlspecialchars($result['name']) . "</p>";
        echo "<p>Grade: " . htmlspecialchars($result['grade']) . "</p>";
        echo "<p>Remarks: " . htmlspecialchars($result['remarks']) . "</p>";
    } else {
        echo "<p>No results found for this student.</p>";
    }
} else {
    echo "<p>No student ID provided.</p>";
}
?>
