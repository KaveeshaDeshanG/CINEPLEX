<?php
include("dbconn.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $movieId = mysqli_real_escape_string($conn, $_POST['movie']);
    $tickets = intval($_POST['tickets']); // Ensure tickets is an integer
    $totalPrice = floatval($_POST['total_price']); // Ensure total_price is a float

    // Validate inputs
    if ($tickets <= 0 || $totalPrice <= 0) {
        echo "Error: Invalid ticket or price.";
        exit();
    }

    // Retrieve movie name based on movie ID
    $movieNameQuery = "SELECT name FROM movies WHERE id = ?";
    $stmt = mysqli_prepare($conn, $movieNameQuery);
    mysqli_stmt_bind_param($stmt, "s", $movieId);
    mysqli_stmt_execute($stmt);
    $movieNameResult = mysqli_stmt_get_result($stmt);

    if ($movieNameResult && mysqli_num_rows($movieNameResult) > 0) {
        $movieNameRow = mysqli_fetch_assoc($movieNameResult);
        $movieName = $movieNameRow['name'];

        // Insert data into the database using prepared statements
        $insertQuery = "INSERT INTO tickets (movie_id, movie_name, tickets, total_price) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssdd", $movieId, $movieName, $tickets, $totalPrice);
        $insertResult = mysqli_stmt_execute($stmt);

        // Check if insertion was successful
        if ($insertResult) {
            echo "Ticket details saved successfully!";
        } else {
            echo "Error: Failed to save ticket details.";
        }
    } else {
        echo "Error: Movie not found!";
    }
} else {
    // Redirect back to the booking page if form is not submitted
    header("Location: booking_page.php?error=no_form_submission");
    exit();
}
?>
