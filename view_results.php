<?php
// view_results.php

// Sample code to retrieve and display semester-specific results

// Assuming connection to the database is already established

function fetchResults($semester) {
    global $conn; // Assuming $conn is your database connection
    $sql = "SELECT * FROM results WHERE semester = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $semester);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_GET['semester'])) {
    $semester = $_GET['semester'];
    $results = fetchResults($semester);
} else {
    $results = [];
}

// Display results
if (!empty($results)) {
    echo '<h1>Results for Semester: ' . htmlspecialchars($semester) . '</h1>';
    echo '<table>';
    echo '<tr><th>Student ID</th><th>Name</th><th>Grade</th></tr>';
    foreach ($results as $result) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($result['student_id']) . '</td>';
        echo '<td>' . htmlspecialchars($result['name']) . '</td>';
        echo '<td>' . htmlspecialchars($result['grade']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No results found for Semester: ' . htmlspecialchars($semester) . '</p>';
}