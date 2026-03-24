<?php
/*
 * dashboard.php
 * Student Dashboard for University Result Management
 */

// Start the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION['student_id'])) {
    header('Location: login.php'); // Redirect to login page
    exit;
}

// Include necessary files
include('database.php'); // Include your database connection file

// Function to fetch semesters
function getSemesters() {
    global $conn; // Use the global database connection
    $query = "SELECT * FROM semesters ORDER BY semester_id";
    $result = mysqli_query($conn, $query);
    $semesters = [];
    while($row = mysqli_fetch_assoc($result)) {
        $semesters[] = $row;
    }
    return $semesters;
}

// Fetch semesters for dropdown
$semesters = getSemesters();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to the Student Dashboard</h1>
    <form action="view_results.php" method="GET">
        <label for="semester">Select Semester:</label>
        <select name="semester" id="semester" required>
            <option value="">--Select Semester--</option>
            <?php foreach ($semesters as $semester): ?>
                <option value="<?php echo $semester['semester_id']; ?>"><?php echo $semester['semester_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="View Results">
    </form>
</body>
</html>