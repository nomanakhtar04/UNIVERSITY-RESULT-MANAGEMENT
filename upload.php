<?php
// File: upload.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
        // Specify directory for uploads
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['pdf_file']['name']);
        $upload_file_path = $upload_dir . $file_name;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $upload_file_path)) {
            echo "File uploaded successfully: $file_name\n";
            // Note: Add parsing functionality here if needed
        } else {
            echo "Error moving the uploaded file.\n";
        }
    } else {
        echo "No file uploaded or an error occurred.\n";
    }
} else {
    echo "Invalid request.\n";
}
?>