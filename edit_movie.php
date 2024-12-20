<?php
include("dbconn.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch movie details
    $query = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movie = $result->fetch_assoc();

    if (!$movie) {
        echo "Movie not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Handle form submission to update movie details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $discrip = $_POST['discrip'];
    $theater = $_POST['theater'];

    // Initialize image path (keep existing image by default)
    $imagePath = $movie['img'];

    // Handle image upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Directory for uploaded images
        $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $imagePath = uniqid() . '.' . $fileExtension; // Create a unique filename

        // Move the uploaded image to the uploads folder
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $imagePath)) {
            echo "Error uploading the image.";
            exit;
        }
    }

    // Update movie details in the database
    $query = "UPDATE movies SET name = ?, year = ?, discrip = ?, theater = ?, img = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $name, $year, $discrip, $theater, $imagePath, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Movie updated successfully!');</script>";
        header("Location: mmmm.php"); // Redirect back to the movie list
        exit;
    } else {
        echo "Error updating movie: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Edit Movie</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Movie</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($movie['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Release Year</label>
                <input type="number" id="year" name="year" class="form-control" value="<?php echo htmlspecialchars($movie['year']); ?>" max="2024" min="2000" required>
            </div>
            <div class="form-group">
                <label for="discrip">Description</label>
                <input type="text" id="discrip" name="discrip" class="form-control" value="<?php echo htmlspecialchars($movie['discrip']); ?>" required>
            </div>
            <div class="form-group">
                <label for="theater">Theater</label>
                <input type="number" id="theater" name="theater" class="form-control" value="<?php echo htmlspecialchars($movie['theater']); ?>" max="3" min="1" required>
            </div>
            <div class="form-group">
                <label for="img">Update Image</label>
                <input type="file" id="img" name="img" class="form-control" accept=".jpg, .jpeg, .png">
                <small>Current image: <img src="uploads/<?php echo htmlspecialchars($movie['img']); ?>" alt="Current Movie Image" style="width: 100px;"></small>
            </div>
            <button type="submit" class="btn btn-primary">Update Movie</button>
        </form>
    </div>
</body>
</html>
