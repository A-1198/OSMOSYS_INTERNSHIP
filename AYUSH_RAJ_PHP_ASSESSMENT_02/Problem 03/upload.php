<?php
$uploadDir = 'uploads/'; 
$allowedTypes = ['image/jpeg', 'image/png']; 
$maxFileSize = 5 * 1024 * 1024; 

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check if file type is allowed
    if (!in_array($file['type'], $allowedTypes)) {
        die("Error: Only JPG and PNG files are allowed.");
    }

    // Check if file size is within limit
    if ($file['size'] > $maxFileSize) {
        die("Error: File size exceeds the maximum limit of 5MB.");
    }

    // Generate a unique filename to prevent overwriting existing files
    $filename = uniqid() . '_' . basename($file['name']);

    // Move the uploaded file to the designated folder
    $destination = $uploadDir . $filename;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
} else {
    // Handle cases where the form is not submitted via POST method or file is not provided
    echo "Invalid request.";
}
?>
