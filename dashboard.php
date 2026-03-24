<?php
session_start();

// Check if the username session variable is set
if (!isset($_SESSION['username'])) {
    die('Error: User not logged in.');
}

// Your existing code

// Example of handling missing semesters gracefully
$semesters = []; // Assume this gets populated from your database
if (empty($semesters)) {
    echo 'No semesters found.';
} else {
    foreach ($semesters as $semester) {
        // Display semester info
    }
}
?>