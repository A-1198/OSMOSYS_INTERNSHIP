<?php

require_once 'Controller.php';

// Database credentials
$host = 'localhost';
$dbname = 'osmosys';
$username = 'root';
$password = '';

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $controller = new PracticeController($pdo);
/*
    $name = 'New Product';
    $description = 'Description of new product';
    $price = 35.99;
    // Insert a record
    $controller->insertRecord($name, $description,$price);*/

    //Update a record
    $id2=6;
    $name2 = 'bgtkyuk';
    $description2 = 'Description of new product';
    $price2 = 35.99;
    $controller->updateRecord($id2,$name2,$description2,$price2);


    //Delete a record
    $id3=5;
    $controller->DeleteRecord($id3);

    // Fetch all records
    $records = $controller->getAllRecords();

    // Display records
    require_once 'View.php';
    View::displayRecords($records);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Upload File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="file">Choose File:</label>
      <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png" />
      <br />
      <input type="submit" value="Upload" />
    </form>
</body>
</html>