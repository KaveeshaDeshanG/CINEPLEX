<?php
// Include database connection
include("dbconn.php");

// Check if id is set and not empty
if(isset($_POST['id']) && !empty($_POST['id'])) { // Change here
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Change here
    
    // SQL query to delete the movie with the given ID
    $query = "DELETE FROM movies WHERE id = '$id'"; // Change here
    
    // Execute the query
    if(mysqli_query($conn, $query)) {
        // Movie deleted successfully
        echo "Movie deleted successfully.";
        header("Location:mmmm.php");
    } else {
        // Error occurred while deleting the movie
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Movie ID not provided or empty
    echo "Invalid movie ID.";
}
?>
