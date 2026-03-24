<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="class_results.xls"');

// Sample data for class results
$results = [
    ['Student Name', 'Subject', 'Marks'],
    ['Alice', 'Mathematics', 85],
    ['Bob', 'Science', 90],
    ['Charlie', 'History', 78],
];

// Output the data in Excel format
$fp = fopen('php://output', 'w');
foreach ($results as $result) {
    fputcsv($fp, $result, '\t'); // Tab-separated values
}
fclose($fp); 
?>
