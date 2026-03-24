<?php

// Start the session
session_start();

// Include the database configuration
include('db_config.php');

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    die('Access Denied');
}

// Get the result ID from the request
$result_id = $_GET['result_id'];

// Fetch the result from the database
$query = "SELECT * FROM results WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $result_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if(!$result) {
    die('Result not found');
}

// Load the PDF library
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Student Result');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,'Student Name: ' . $result['student_name']);
$pdf->Ln();
$pdf->Cell(40,10,'Course: ' . $result['course']);
$pdf->Ln();
$pdf->Cell(40,10,'Score: ' . $result['score']);

// Output the PDF to the browser
$pdf->Output('D', 'result_' . $result_id . '.pdf');
?>