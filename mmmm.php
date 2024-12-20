<?php
include("dbconn.php");
session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {
    header("Location:mmmm.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $discrip = isset($_POST['discrip']) ? $_POST['discrip'] : '';
    $theater = isset($_POST['theater']) ? $_POST['theater'] : '';

    // Handle file upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';

        // Ensure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $fileExtension;
        $uploadFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFilePath)) {
            $imagePath = $uploadFilePath;

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO movies (name, year, discrip, theater, img) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $year, $discrip, $theater, $imagePath);

            if ($stmt->execute()) {
                echo "<h2>Movie added successfully!</h2>";
            } else {
                echo "<h2>Error: " . $stmt->error . "</h2>";
            }

            $stmt->close();
        } else {
            echo "<h2>Error uploading the image.</h2>";
        }
    } else {
        echo "<h2>No image uploaded or upload error.</h2>";
    }
}

// Fetch movies from the database
$query = "SELECT * FROM movies";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>My Movie Watch List</title>
</head>
<body>
    <form id="film-form" action="filmadd.php" method="post" enctype="multipart/form-data">
        <div class="container mt-4">
            <h1 class="display-4 text-center">
                <i class="fas fa-film text-primary"></i> Cinaplex<span class="text-primary"></span>
            </h1>
            <div class="text-center mt-3">
                <a href="userpro.php" class="btn btn-primary">Go to Admin Panel</a>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="year">Release Year</label>
                <input type="number" id="year" name="year" class="form-control" max="2024" min="2000" required>
            </div>
            <div class="form-group">
                <label for="discrip">Description</label>
                <input type="text" id="discrip" name="discrip" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="theater">Theater</label>
                <input type="number" id="theater" name="theater" class="form-control" max="3" min="1" required>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-info btn-block">Add Movie</button>
        </div>
    </form>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Release Year</th>
                    <th>Description</th>
                    <th>Theater</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['year']); ?></td>
            <td><?php echo htmlspecialchars($row['discrip']); ?></td>
            <td><?php echo htmlspecialchars($row['theater']); ?></td>
            <td>
                <!-- Display Image with specific width and height -->
                <img src="uploads/<?php echo htmlspecialchars($row['img']); ?>" alt="Movie Image" style="width: 50px; height: 50px;">
            </td>
            <td>
                <!-- Edit and Remove buttons -->
                <form action="edit_movie.php" method="get" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </form>
                <form action="delete_movie.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
    <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
