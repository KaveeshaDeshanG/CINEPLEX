<?php
// Include your database connection file
include("dbconn.php");

// Fetch movies from the database
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

// Check if there are movies
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display movie details
        echo '<div class="movie-list-item">';
        echo '<img class="movie-list-item-img" src="uploads/' . $row["img"] . '" alt="' . $row["name"] . '">';
        echo '<span class="movie-list-item-title">' . $row["name"] . ' (' . $row["year"] . ')</span>';
        echo '<p class="movie-list-item-desc">' . $row["discrip"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No movies found.";
}

// Close the database connection
$conn->close();
?>
