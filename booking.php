<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $movie_id = isset($_POST['movie']) ? mysqli_real_escape_string($conn, $_POST['movie']) : '';
    $seat_numbers = isset($_POST['Numseats']) ? mysqli_real_escape_string($conn, $_POST['Numseats']) : '';
    $total_price = isset($_POST['total_price']) ? mysqli_real_escape_string($conn, $_POST['total_price']) : '';
    $filmName = isset($_POST['film_name']) ? mysqli_real_escape_string($conn, $_POST['film_name']) : '';

    // Validate inputs (add more validation if necessary)
    if (empty($movie_id) || empty($total_price)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Insert data into the database
    $insert_query = "INSERT INTO bookings (movie_id, seat_numbers, total_price, film_name) VALUES ('$movie_id', '$seat_numbers', '$total_price', '$filmName')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        echo "Booking successfully saved!";
        header("Location:payment.php");

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
