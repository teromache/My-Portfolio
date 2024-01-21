<?php
// File to be downloaded
$file_path = 'CV - WAN PUTERA NUR SYAFIQ.pdf';

// Check if the file exists
if (file_exists($file_path)) {
    
    // Set headers
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Content-Length: ' . filesize($file_path));

    // Read the file and output it to the browser
    readfile($file_path);
    exit;
} else {
    // File does not exist
    echo "File not found.";
}
?>
