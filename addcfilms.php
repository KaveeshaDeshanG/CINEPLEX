<?php
include("dbconn.php");

// Assuming you've established $conn as your database connection

// Validate and sanitize input
$name = isset($_POST['name']) ? $_POST['name'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';
$discrip = isset($_POST['discrip']) ? $_POST['discrip'] : '';
$theater = isset($_POST['theater']) ? $_POST['theater'] : '';
// $img = isset($_POST['img']) ? $_POST['img'] : '';

if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    // Define upload directory
    $uploadDir = 'uploads/';

    // Ensure the directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Generate a unique file name for the uploaded image
    $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $fileName = uniqid() . '.' . $fileExtension;
    $uploadFilePath = $uploadDir . $fileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFilePath)) {
        $imagePath = $fileName; // Save only the file name in the database
    } else {
        echo "Error uploading the image.";
        exit;
    }
} else {
    echo "No image uploaded or upload error.";
    exit;
}


// Prepare and bind the SQL statement
$sql = "INSERT INTO cmovies (name, year, discrip, theater, img) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $year, $discrip, $theater, $imagePath);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: coming.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
